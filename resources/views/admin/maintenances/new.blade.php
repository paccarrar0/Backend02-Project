@extends('layouts.application')

@section('content')
<div class="max-w-3xl mx-auto mt-10 px-4">
  <form action="{{ route('maintenances.store', ['equipment' => $equipment->id]) }}" method="POST" id="newMaintenanceForm" novalidate class="space-y-6">
    @csrf

    <div class="flex justify-between items-center">
      <h1 class="text-2xl font-bold text-gray-800">New Maintenance</h1>
      <button type="submit" id="newSubmitBtn" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition font-medium">
        Submit
      </button>
    </div>

    <div>
      <label for="maintenanceDescriptionInput" class="block font-medium text-gray-700 mb-2">Maintenance Description</label>
      <textarea name="description" id="maintenanceDescriptionInput" required
        class="w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none"></textarea>
    </div>

    <div>
      <label class="block font-medium text-gray-700 mb-2">Status</label>
      <div class="flex gap-8">
        <label class="flex items-center space-x-2">
          <input type="radio" name="status" value="pending" checked class="text-blue-600 focus:ring-blue-500">
          <span>Pending</span>
        </label>
        <label class="flex items-center space-x-2">
          <input type="radio" name="status" value="in_progress" class="text-blue-600 focus:ring-blue-500">
          <span>In Progress</span>
        </label>
        <label class="flex items-center space-x-2">
          <input type="radio" name="status" value="completed" class="text-blue-600 focus:ring-blue-500">
          <span>Completed</span>
        </label>
      </div>
    </div>
  </form>
</div>
@endsection