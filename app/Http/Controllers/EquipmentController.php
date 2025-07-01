<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Models\Equipment;
use Illuminate\Support\Facades\Session;

class EquipmentController extends Controller
{
    public function index()
    {
        return view('admin/equipments/index', [
            'equipments' => Equipment::all()
        ]);
    }

    public function create()
    {
        return view('admin/equipments/create');
    }

    public function store(StoreEquipmentRequest $request)
    {
        $data = $request->validated();

        try {
            Equipment::create($data);
            return redirect()->route('equipments.index')->with('success', 'Equipment registered successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error registering equipment!');
        }
    }

    public function show(Equipment $equipment)
    {
        return view('admin/equipments/show', [
            'equipment' => $equipment
        ]);
    }

    public function edit(Equipment $equipment)
    {
        return view('admin/equipments/edit', [
            'equipment' => $equipment
        ]);
    }

    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        $data = $request->validated();

        try {
            $equipment->update($data);
            return redirect()->route('equipments.index')->with('success', 'Equipment updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating equipment!');
        }
    }

    public function destroy(Equipment $equipment)
    {
        try {
            $equipment->delete();
            return redirect()->route('equipments.index')->with('success', 'Equipment deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('equipments.index')->with('error', 'Error deleting equipment!');
        }
    }
}
