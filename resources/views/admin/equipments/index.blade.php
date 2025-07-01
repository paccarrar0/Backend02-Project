@extends('layouts.application')

@section('content')
<div class="container mx-auto px-4 py-6">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Equipments</h1>
    <a href="{{ route('equipments.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-medium">
      New
    </a>
  </div>

  @if ($equipments->isEmpty())
  <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded-md mb-6">
    <span class="font-medium">No equipments found.</span>
  </div>
  @endif

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($equipments as $item)
    <div class="bg-white rounded-xl shadow p-5 flex flex-col justify-between h-full">
      <div>
        <h2 class="text-lg font-semibold text-gray-800">{{ $item->name }}</h2>
        <p class="text-sm text-gray-500">{{ $item->category }}</p>
        <p class="text-md font-medium text-gray-700 mt-2">${{ $item->rental_price }}/day</p>
      </div>

      <div class="flex justify-end items-center gap-3 mt-4">
        <a href="{{ route('maintenances.index', $item->id) }}" class="text-gray-500 hover:text-blue-600" title="Maintenances">
          <i class="bi bi-wrench"></i>
        </a>
        <a href="{{ route('equipments.show', $item->id) }}" class="text-gray-500 hover:text-blue-600" title="Details">
          <i class="bi bi-search"></i>
        </a>
        <a href="{{ route('equipments.edit', $item->id) }}" class="text-gray-500 hover:text-blue-600" title="Edit">
          <i class="bi bi-pencil"></i>
        </a>
        <form action="{{ route('equipments.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this equipment?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-gray-500 hover:text-red-600" title="Delete">
            <i class="bi bi-trash3"></i>
          </button>
        </form>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection