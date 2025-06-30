@extends('layouts.application')

@section('content')
<div class="container mt-5">
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Maintenances</h1>
    <div class="w-10">
      <a href="{{ route('maintenances.new', ['id' => $equipment->id]) }}" class="btn btn-primary btn-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        New
      </a>
    </div>
  </div>

  <div class="maintenance-list mt-1 flex justify-center">
    @if ($maintenances->isEmpty())
      <div class="w-full">
        <div class="bg-yellow-100 text-yellow-700 p-4 rounded" role="alert">
          No maintenances found.
        </div>
      </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 w-full">
      @foreach ($maintenances as $maintenance)
        <div class="border border-opacity-25 rounded mb-3 relative">
          <div class="p-4">
            <p class="text-gray-500 text-lg">{{ $maintenance->description }}</p>
            <p class="text-gray-500 text-lg">Status: {{ $maintenance->status }}</p>
          </div>
          <div class="absolute bottom-2 right-2 flex space-x-2">
            <a href="{{ route('maintenances.edit', ['id' => $maintenance->id, 'equipment_id' => $equipment->id]) }}" class="text-blue-600 hover:text-blue-800 p-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 11l3 3 7-7-3-3-7 7z" />
              </svg>
            </a>
            <form action="{{ route('maintenances.destroy', ['id' => $maintenance->id, 'equipment_id' => $equipment->id]) }}" method="POST" class="m-0 p-0" onsubmit="return confirm('Are you sure?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-600 hover:text-red-800 p-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-6 6-6-6" />
                </svg>
              </button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection