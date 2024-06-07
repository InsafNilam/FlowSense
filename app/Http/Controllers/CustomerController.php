<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Gate;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $response = Gate::inspect('viewAny', Customer::class);
        if ($response->allowed()) {
            $customers = Customer::query()->paginate(10)->onEachSide(1);

            return view('customer.index', [
                'customers' => $customers,
            ]);
        } else {
            abort(403, $response->message());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $response = Gate::inspect('create', Customer::class);
        if ($response->allowed()) {
            return view('customer.create');
        } else {
            abort(403, $response->message());
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
        $response = Gate::inspect('create', Customer::class);
        if ($response->allowed()) {
            Customer::create($request->validated());
            return redirect()->route('customer.index')->with('success', 'Customer created successfully');
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
                'customer' => $customer,
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
