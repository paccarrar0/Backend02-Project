@extends('layouts.application')

@section('content')
<div class="container mt-5">
  <div class="bg-white shadow rounded">
    <div class="border-b px-6 py-4">
      <h2 class="text-2xl font-semibold">Equipment Details</h2>
    </div>

    <div class="p-6">
      <h3 class="text-xl font-semibold mb-4">{{ $equipment->name }}</h3>
      <div class="space-y-2 text-gray-700">
        <p><strong>Description:</strong> {{ $equipment->description }}</p>
        <p><strong>Category:</strong> {{ $equipment->category }}</p>
        <p><strong>Status:</strong> {{ $equipment->status }}</p>
        <p><strong>Rental Price:</strong> ${{ number_format($equipment->rental_price, 2) }}</p>
        <p><strong>Location:</strong> {{ $equipment->location }}</p>
        <p><strong>Serial Number:</strong> {{ $equipment->serial_number }}</p>
      </div>
    </div>

    <div class="border-t px-6 py-4 text-right">
      <a href="{{ route('equipments.index') }}" class="inline-block px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
        Back to List
      </a>
    </div>
  </div>
</div>
@endsection