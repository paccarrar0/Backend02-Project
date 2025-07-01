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
        $maintenances = $equipment->maintenances()->get();
        return view('admin/maintenances/index', compact('maintenances', 'equipment'));
    }

    public function create(Equipment $equipment)
    {
        return view('admin/maintenances/new', compact('equipment'));
    }

    public function store(Request $request, Equipment $equipment)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'status' => 'nullable|string|max:50',
        ]);

        try {
            $equipment->maintenances()->create($validated);
            return redirect()->route('maintenances.index', ['equipment' => $equipment->id])->with('success', 'Maintenance registered successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error registering maintenance!');
        }
    }

    public function edit(Equipment $equipment, Maintenance $maintenance)
    {
        return view('admin/maintenances/edit', compact('maintenance', 'equipment'));
    }

    public function update(Request $request, Equipment $equipment, Maintenance $maintenance)
    {
        if ($maintenance->equipment_id !== $equipment->id) {
            return redirect()->route('maintenances.index', $equipment)
                ->with('error', 'Maintenance does not belong to this equipment.');
        }

        $validated = $request->validate([
            'description' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
        ]);

        try {
            $maintenance->update($validated);
            return redirect()->route('maintenances.index', $equipment)
                ->with('success', 'Maintenance updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating maintenance!');
        }
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
