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
            return redirect()->route('equipments.index')->with('success', 'Equipamento cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar equipamento!');
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
            return redirect()->route('equipments.index')->with('success', 'Equipamento atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar equipamento!');
        }
    }

    public function destroy(Equipment $equipment)
    {
        try {
            $equipment->delete();
            return redirect()->route('equipments.index')->with('success', 'Equipamento excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('equipments.index')->with('error', 'Erro ao excluir equipamento!');
        }
    }
}
