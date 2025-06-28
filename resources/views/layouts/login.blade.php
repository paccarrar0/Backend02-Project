<!DOCTYPE html>
<html lang="pt-br">

@include('shared/head')

<body class="min-h-screen flex items-center justify-center bg-gray-100">

  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <div class="mb-6 text-center">
      <div class="mb-5">
        @include('components.flash-message')
      </div>

      <div class="flex items-center justify-center gap-2 border-b pb-4 border-blue-500 mb-4">
        <i class="bi bi-building-gear text-3xl text-blue-600"></i>
        <h2 class="text-2xl font-bold text-blue-600">ERMS</h2>
      </div>

      <h4 class="text-lg font-semibold mb-4">
        Login
      </h4>

      @yield('content')

    </div>
  </div>

</body>

<script>
  document.querySelectorAll(".close-alert").forEach(function(button) {
    button.addEventListener("click", function() {
      const alert = button.closest(".alert-box");
      if (alert) {
        alert.remove();
      }
    });
  });
</script>

</html>