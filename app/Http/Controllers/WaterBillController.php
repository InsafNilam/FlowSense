<?php

namespace App\Http\Controllers;

use App\Http\Resources\WaterBillResource;
use App\Models\WaterBill;
use App\Http\Requests\StoreWaterBillRequest;
use App\Http\Requests\UpdateWaterBillRequest;
use Illuminate\Support\Facades\Gate;

class WaterBillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $response = Gate::inspect('viewAny', WaterBill::class);
        if ($response->allowed()) {
            if (auth()->user()->role == 'admin') {
                $water_bills = WaterBill::query()->paginate(10)->onEachSide(1);
            } else {
                $water_bills = WaterBill::query()->where('user_id', auth()->id())->paginate(10)->onEachSide(1);
            }
            $water_bills = WaterBill::query()->paginate(10)->onEachSide(1);
            $links = $water_bills->links();

            return view('water-bill.index', [
                'water_bills' => WaterBillResource::collection($water_bills),
                'links' => $links,
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
        $response = Gate::inspect('create', WaterBill::class);
        if ($response->allowed()) {
            return view('water-bill.create');
        } else {
            abort(403, $response->message());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWaterBillRequest $request)
    {
        //
        $response = Gate::inspect('create', WaterBill::class);
        if ($response->allowed()) {
            WaterBill::create($request->validated());
            return redirect()->route('water-bill.index')->with('success', 'Water bill created successfully');
        } else {
            abort(403, $response->message());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(WaterBill $waterBill)
    {
        //
        $response = Gate::inspect('view', $waterBill);
        if ($response->allowed()) {
            return view('water-bill.show', [
                'water_bill' => new WaterBillResource($waterBill),
            ]);
        } else {
            abort(403, $response->message());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WaterBill $waterBill)
    {
        //
        $response = Gate::inspect('update', $waterBill);
        if ($response->allowed()) {
            return view('water-bill.edit', [
                'water_bill' => $waterBill,
            ]);
        } else {
            abort(403, $response->message());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWaterBillRequest $request, WaterBill $waterBill)
    {
        //
        $response = Gate::inspect('update', $waterBill);
        if ($response->allowed()) {
            $waterBill->update($request->validated());
            return redirect()->route('water-bill.index')->with('success', 'Water bill updated successfully');
        } else {
            abort(403, $response->message());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WaterBill $waterBill)
    {
        //
        $response = Gate::inspect('delete', $waterBill);
        if ($response->allowed()) {
            $waterBill->delete();
            return redirect()->route('water-bill.index')->with('success', 'Water bill deleted successfully');
        } else {
            abort(403, $response->message());
        }
    }
}
