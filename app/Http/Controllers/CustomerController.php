<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\WaterBillUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CustomerController extends Controller
{
    public function calculate(Request $request)
    {
        $range = WaterBillUnit::all();

        $unit = $request->input('units');
        $cost = $this->calculateTotalCost($unit, $range);

        return view('dashboard', compact('unit', 'cost'));
    }

    private function calculateTotalCost($units, $ranges)
    {
        $remainingUnits = $units;
        $totalCost = 0;

        foreach ($ranges as $range) {
            $rangeStart = $range['min_units'];
            $rangeEnd = $range['max_units'];
            $perUnitRate = $range['per_unit_rate'];
            $fixedRate = $range['fixed_rate'];

            if ($remainingUnits > 0) {
                $unitsInRange = min($remainingUnits, $rangeEnd - $rangeStart);
                $cost = ($unitsInRange * $perUnitRate) + $fixedRate;
                $totalCost += $cost;
                $remainingUnits -= $unitsInRange;
            }
        }

        return $totalCost;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $response = Gate::inspect('viewAny', Customer::class);
        if ($response->allowed()) {
            $customers = Customer::query()->paginate(10)->onEachSide(1);

            $links = $customers->links();

            return view('customer.index', [
                'customers' => CustomerResource::collection($customers),
                'links' => $links,
            ]);
        } else {
            abort(403, $response->message());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
        $response = Gate::inspect('view', $customer);
        if ($response->allowed()) {
            return view('customer.show', [
                'customer' => new CustomerResource($customer),
            ]);
        } else {
            abort(403, $response->message());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
        $response = Gate::inspect('update', $customer);
        if ($response->allowed()) {
            return view('customer.edit', [
                'customer' => $customer,
            ]);
        } else {
            abort(403, $response->message());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
        $response = Gate::inspect('update', $customer);
        if ($response->allowed()) {
            $customer->update($request->validated());
            return redirect()->route('customer.index')->with('success', 'Customer updated successfully');
        } else {
            abort(403, $response->message());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
        $response = Gate::inspect('delete', $customer);
        if ($response->allowed()) {
            $customer->delete();
            return redirect()->route('customer.index')->with('success', 'Customer deleted successfully');
        } else {
            abort(403, $response->message());
        }
    }
}
