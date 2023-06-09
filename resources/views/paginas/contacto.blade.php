@extends("layouts.app")

@section("main")
<x-nav-link2>
</x-nav-link2>

<div class="h-screen flex items-center justify-center">
  <div class="max-w-3xl bg-white p-8 rounded-lg shadow-lg flex border-2 border-blue-500">
    <div class="w-1/2 rounded-lg p-4">
      <h1 class="text-2xl text-blue-600 font-semibold mb-6">Contacto</h1>
      <form method="post">
        @csrf
        <div class="mb-4">
          <label for="nombre" class="block font-medium text-gray-800">Nombre:</label>
          <input type="text" id="nombre" name="nombre" required class="w-full border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-4">
          <label for="email" class="block font-medium text-gray-800">Email:</label>
          <input type="email" id="email" name="email" required class="w-full border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-4">
          <label for="mensaje" class="block font-medium text-gray-800">Mensaje:</label>
          <textarea id="mensaje" name="mensaje" required class="w-full border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-colors duration-300">
          Enviar
        </button>
      </form>
    </div>
    <div class="w-1/2 flex items-center justify-center">
      <div class="w-4/5">
        <img src="{{ asset('imagenes/contacto.jpg') }}" alt="Foto de contacto" class="rounded-lg">
        <div class="mt-4">
          <h3 class="text-lg font-semibold text-gray-800">Información de Contacto</h3>
          <p class="text-gray-600 mt-2">Teléfono: +123456789</p>
          <p class="text-gray-600">Correo: contacto@empresa.com</p>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection