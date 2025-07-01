@extends('layouts.application')

@section('content')
<div class="container mt-5 max-w-5xl mx-auto">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Maintenances</h1>
    <a href="{{ route('maintenances.create', $equipment) }}"
      class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition font-medium">
      New
    </a>
  </div>

  @if ($maintenances->isEmpty())
  <div class="bg-yellow-100 text-yellow-700 p-4 rounded mb-6" role="alert">
    No maintenances found.
  </div>
  @endif

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @foreach ($maintenances as $maintenance)
    <div class="bg-white rounded-lg shadow p-5 relative flex flex-col justify-between h-full">
      <div>
        <p class="text-gray-700 text-lg mb-2">{{ $maintenance->description }}</p>
        <p class="text-gray-500 font-medium">Status: <span class="capitalize">{{ $maintenance->status }}</span></p>
      </div>

      <div class="absolute bottom-4 right-4 flex space-x-3">
        <a href="{{ route('maintenances.edit', [$equipment, $maintenance]) }}"
          class="text-blue-600 hover:text-blue-800 p-2 rounded" aria-label="Edit maintenance">
          <i class="bi bi-pencil"></i>
        </a>

        <form action="{{ route('maintenances.destroy', [$equipment, $maintenance]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this maintenance?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-red-600 hover:text-red-800 p-2 rounded" aria-label="Delete maintenance">
            <i class="bi bi-trash3"></i>
          </button>
        </form>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection