@extends('layouts.application')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4">
  <h1 class="text-3xl font-bold text-gray-800 mb-8">Edit Equipment</h1>

  <form action="{{ route('equipments.update', $equipment->id) }}" method="POST" id="newEquipmentForm" novalidate class="space-y-6">
    @csrf
    @method('PUT')

    <div>
      <label for="equipmentNameInput" class="block font-medium text-gray-700 mb-1">Equipment Name</label>
      <input value="{{ old('name', $equipment->name) }}" name="name" type="text" id="equipmentNameInput" required
        class="w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500 transition">
    </div>

    <div>
      <label for="equipmentDescriptionInput" class="block font-medium text-gray-700 mb-1">Description</label>
      <textarea name="description" id="equipmentDescriptionInput" rows="5" required
        class="w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none">{{ old('description', $equipment->description) }}</textarea>
    </div>

    <div>
      <label for="equipmentCategoryInput" class="block font-medium text-gray-700 mb-1">Category</label>
      <input value="{{ old('category', $equipment->category) }}" name="category" type="text" id="equipmentCategoryInput" required
        class="w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500 transition">
    </div>

    <div>
      <label class="block font-medium text-gray-700 mb-2">Status</label>
      <div class="flex gap-6">
        <label class="flex items-center space-x-2">
          <input type="radio" name="status" value="available" class="text-blue-600 focus:ring-blue-500"
            {{ old('status', $equipment->status) === 'available' ? 'checked' : '' }}>
          <span>Available</span>
        </label>
        <label class="flex items-center space-x-2">
          <input type="radio" name="status" value="maintenance" class="text-blue-600 focus:ring-blue-500"
            {{ old('status', $equipment->status) === 'maintenance' ? 'checked' : '' }}>
          <span>Maintenance</span>
        </label>
        <label class="flex items-center space-x-2">
          <input type="radio" name="status" value="in_use" class="text-blue-600 focus:ring-blue-500"
            {{ old('status', $equipment->status) === 'in_use' ? 'checked' : '' }}>
          <span>In Use</span>
        </label>
      </div>
    </div>

    <div>
      <label for="equipmentPriceInput" class="block font-medium text-gray-700 mb-1">Rental Price</label>
      <input value="{{ old('rental_price', $equipment->rental_price) }}" name="rental_price" type="text" id="equipmentPriceInput"
        class="w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500 transition"
        placeholder="e.g. 120.00">
    </div>

    <div>
      <label for="equipmentLocationInput" class="block font-medium text-gray-700 mb-1">Location</label>
      <input value="{{ old('location', $equipment->location) }}" name="location" type="text" id="equipmentLocationInput"
        class="w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500 transition">
    </div>

    <div class="pt-4">
      <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition font-medium">
        Submit
      </button>
    </div>
  </form>
</div>
@endsection