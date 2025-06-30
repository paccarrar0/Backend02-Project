@extends('layouts.application')

@section('content')
<div class="container mt-5">
  <form action="{{ route('equipments.update', $equipment->id) }}" method="POST" id="newEquipmentForm" novalidate class="mb-5 mt-1">
    @csrf
    @method('PUT')
    <div class="flex justify-between mb-4 mt-5 items-center">
      <h1 class="text-2xl font-bold">Edit Equipment</h1>
      <div class="w-10">
        <button type="submit" id="submitBtn" class="btn btn-primary btn-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
          Submit
        </button>
      </div>
    </div>

    <div class="mb-3">
      <label for="equipmentNameInput" class="block font-medium mb-1">Equipment Name</label>
      <input value="{{ old('equipment.name', $equipment->name) }}" name="equipment[name]" type="text" id="equipmentNameInput" class="w-full border rounded px-3 py-2" aria-describedby="nameHelp" />
    </div>

    <div class="mb-3">
      <label for="equipmentDescriptionInput" class="block font-medium mb-1">Description</label>
      <textarea name="equipment[description]" id="equipmentDescriptionInput" rows="12" required class="w-full border rounded px-3 py-2">{{ old('equipment.description', $equipment->description) }}</textarea>
    </div>

    <div class="mb-3">
      <label for="equipmentCategoryInput" class="block font-medium mb-1">Category</label>
      <input value="{{ old('equipment.category', $equipment->category) }}" name="equipment[category]" type="text" id="equipmentCategoryInput" class="w-full border rounded px-3 py-2" />
    </div>

    <div class="mb-3">
      <label class="block font-medium mb-2" id="equipmentStatusInput">Status</label>
      <div class="flex space-x-6">
        <label class="inline-flex items-center">
          <input type="radio" name="equipment[status]" value="available" class="form-radio" {{ old('equipment.status', $equipment->status) == 'available' ? 'checked' : '' }}>
          <span class="ml-2">Available</span>
        </label>
        <label class="inline-flex items-center">
          <input type="radio" name="equipment[status]" value="maintenance" class="form-radio" {{ old('equipment.status', $equipment->status) == 'maintenance' ? 'checked' : '' }}>
          <span class="ml-2">Maintenance</span>
        </label>
        <label class="inline-flex items-center">
          <input type="radio" name="equipment[status]" value="in_use" class="form-radio" {{ old('equipment.status', $equipment->status) == 'in_use' ? 'checked' : '' }}>
          <span class="ml-2">In Use</span>
        </label>
      </div>
    </div>

    <div class="mb-3">
      <label for="equipmentPriceInput" class="block font-medium mb-1">Rental Price</label>
      <input value="{{ old('equipment.rental_price', $equipment->rental_price) }}" name="equipment[rental_price]" type="text" id="equipmentPriceInput" class="w-full border rounded px-3 py-2" />
    </div>

    <div class="mb-3">
      <label for="equipmentLocationInput" class="block font-medium mb-1">Location</label>
      <input value="{{ old('equipment.location', $equipment->location) }}" name="equipment[location]" type="text" id="equipmentLocationInput" class="w-full border rounded px-3 py-2" />
    </div>
  </form>
</div>
@endsection