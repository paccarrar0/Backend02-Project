@extends('layouts.application')

@section('content')
<div class="max-w-4xl mx-auto py-10">
  <form action="{{ route('equipments.store') }}" method="POST" id="newEquipmentForm" novalidate class="space-y-6">
    @csrf

    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">New Equipment</h1>
      <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition">
        Submit
      </button>
    </div>

    <div>
      <label for="equipmentNameInput" class="block font-medium mb-1">Equipment Name</label>
      <input name="name" type="text" id="equipmentNameInput" required
        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
      <label for="equipmentDescriptionInput" class="block font-medium mb-1">Description</label>
      <textarea name="description" id="equipmentDescriptionInput" required
        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
    </div>

    <div>
      <label for="equipmentCategoryInput" class="block font-medium mb-1">Category</label>
      <input name="category" type="text" id="equipmentCategoryInput" required
        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
      <label class="block font-medium mb-1">Status</label>
      <div class="space-y-2">
        <label class="flex items-center space-x-2">
          <input type="radio" name="status" value="available" checked class="text-blue-600">
          <span>Available</span>
        </label>
        <label class="flex items-center space-x-2">
          <input type="radio" name="status" value="maintenance" class="text-blue-600">
          <span>Maintenance</span>
        </label>
        <label class="flex items-center space-x-2">
          <input type="radio" name="status" value="in_use" class="text-blue-600">
          <span>In Use</span>
        </label>
      </div>
    </div>

    <div>
      <label for="equipmentPriceInput" class="block font-medium mb-1">Rental Price</label>
      <input name="rental_price" type="text" id="equipmentPriceInput" required
        pattern="^\d+(\.\d{1,2})?$"
        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
      <label for="equipmentLocationInput" class="block font-medium mb-1">Location</label>
      <input name="location" type="text" id="equipmentLocationInput" required
        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
      <label for="equipmentSerialNumberInput" class="block font-medium mb-1">Serial Number</label>
      <input name="serial_number" type="text" id="equipmentSerialNumberInput" required
        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
  </form>
</div>
@endsection