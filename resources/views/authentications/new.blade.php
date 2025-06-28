@extends('layouts.login')

@section('content')
<form action="{{ route('authenticate') }}" method="POST" class="space-y-6">
  @csrf
  <div>
    <label for="user_email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
    <div class="flex items-center border border-gray-300 rounded-md shadow-sm">
      <span class="px-3 text-gray-500 bg-gray-100 rounded-l-md border-r">
        <i class="bi bi-envelope-at"></i>
      </span>
      <input id="user_email" name="email" type="text" placeholder="Email" value="{{ old('email') }}"
        class="w-full px-3 py-2 rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-500"
        aria-label="Email" aria-describedby="basic-addon1">
    </div>
  </div>

  <div>
    <label for="user_password" class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
    <div class="flex items-center border border-gray-300 rounded-md shadow-sm">
      <span class="px-3 text-gray-500 bg-gray-100 rounded-l-md border-r">
        <i class="bi bi-key"></i>
      </span>
      <input id="user_password" name="password" type="password" placeholder="Senha"
        class="w-full px-3 py-2 rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-500"
        aria-label="Password" aria-describedby="basic-addon2">
    </div>
  </div>

  <div class="w-1/2 mx-auto">
    <input type="submit" value="Entrar"
      class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md cursor-pointer transition duration-200">
  </div>
</form>
@endsection