<?php

namespace App\Http\Controllers;

use App\Http\Resources\WaterBillUnitResource;
use App\Models\WaterBillUnit;
use App\Http\Requests\StoreWaterBillUnitRequest;
use App\Http\Requests\UpdateWaterBillUnitRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class WaterBillUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $response = Gate::inspect('viewAny', WaterBillUnit::class);
        if ($response->allowed()) {
            $water_bill_units = WaterBillUnit::query()->paginate(10)->onEachSide(1);
            $links = $water_bill_units->links();

            return view('water-bill-unit.index', [
                'water_bill_units' => WaterBillUnitResource::collection($water_bill_units),
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
        $response = Gate::inspect('create', WaterBillUnit::class);
        if ($response->allowed()) {
            return view('water-bill-unit.create');
        } else {
            abort(403, $response->message());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWaterBillUnitRequest $request)
    {
        //
        $response = Gate::inspect('create', WaterBillUnit::class);
        if ($response->allowed()) {
            $data = $request->validated();
            $data['created_by'] = Auth::id();
            $data['updated_by'] = Auth::id();

            WaterBillUnit::create($data);
            return redirect()->route('water-bill-unit.index')->with('success', 'Water bill unit created successfully');
        } else {
            abort(403, $response->message());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(WaterBillUnit $waterBillUnit)
    {
        //
        $response = Gate::inspect('view', $waterBillUnit);
        if ($response->allowed()) {
            return view('water-bill-unit.show', [
                'water_bill_unit' => new WaterBillUnitResource($waterBillUnit),
            ]);
        } else {
            abort(403, $response->message());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WaterBillUnit $waterBillUnit)
    {
        //
        $response = Gate::inspect('update', $waterBillUnit);
        if ($response->allowed()) {
            return view('water-bill-unit.edit', [
                'waterBillUnit' => $waterBillUnit,
            ]);
        } else {
            abort(403, $response->message());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWaterBillUnitRequest $request, WaterBillUnit $waterBillUnit)
    {
        //
        $response = Gate::inspect('update', $waterBillUnit);
        if ($response->allowed()) {
            $data = $request->validated();
            $data['updated_by'] = Auth::id();

            $waterBillUnit->update($data);
            return redirect()->route('water-bill-unit.index')->with('success', 'Water bill unit updated successfully');
        } else {
            abort(403, $response->message());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WaterBillUnit $waterBillUnit)
    {
        //
        $response = Gate::inspect('delete', $waterBillUnit);
        if ($response->allowed()) {
            $waterBillUnit->delete();
            return redirect()->route('water-bill-unit.index')->with('success', 'Water bill unit deleted successfully');
        } else {
            abort(403, $response->message());
        }
    }
}
