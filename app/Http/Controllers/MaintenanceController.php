<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MaintenanceController extends Controller
{
    public function index(Request $request, Equipment $equipment)
    {
        $maintenances = $equipment->maintenances()->paginate(10);

        return view('maintenances.index', compact('maintenances', 'equipment'));
    }

    public function create(Equipment $equipment)
    {
        return view('maintenances.create', compact('equipment'));
    }

    public function store(Request $request, Equipment $equipment)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'status' => 'nullable|string|max:50',
        ]);

        $maintenance = $equipment->maintenances()->create($validated);

        if ($maintenance) {
            Session::flash('success', 'Maintenance created successfully');
            return redirect()->route('maintenances.index', $equipment);
        }

        Session::flash('danger', 'Failed to create maintenance');
        return redirect()->route('maintenances.create', $equipment)->withInput();
    }

    public function edit(Equipment $equipment, Maintenance $maintenance)
    {
        return view('maintenances.edit', compact('maintenance', 'equipment'));
    }

    public function update(Request $request, Equipment $equipment, Maintenance $maintenance)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'status' => 'nullable|string|max:50',
        ]);

        if ($maintenance->update($validated)) {
            Session::flash('success', 'Maintenance updated successfully');
            return redirect()->route('maintenances.index', $equipment);
        }

        Session::flash('danger', 'Failed to update maintenance');
        return redirect()->route('maintenances.edit', [$equipment, $maintenance])->withInput();
    }

    public function destroy(Equipment $equipment, Maintenance $maintenance)
    {
        if ($maintenance->delete()) {
            Session::flash('success', 'Maintenance deleted successfully');
        } else {
            Session::flash('danger', 'Failed to delete maintenance');
        }

        return redirect()->route('maintenances.index', $equipment);
    }
}
