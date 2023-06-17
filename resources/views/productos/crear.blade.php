@extends("layouts.app")

@section("main")

<x-nav-link>
</x-nav-link>
    @csrf
    <h1 class="text-blue-700 text-4xl text-center mt-4">@lang('app.btn_crear')</h1> 
        <form class="bg-white p-6 rounded-lg shadow-md" action="{{ route("producto.guardarPro") }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
              <label class="block text-gray-700 font-bold mb-2" for="nombre" name="nombre">
                @lang('app.nombre')
              </label>
              <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="nombre"
                type="text"
                placeholder="Ingrese el nombre del producto"
                name="nombre"
                required
              />
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 font-bold mb-2" for="foto" name="foto">
                @lang('app.foto')
              </label>
              <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="foto"
                type="file" 
                name="foto"
              />
            </div>
            
            <div class="mb-4">
              <label class="block text-gray-700 font-bold mb-2" for="descripcion" name="descripcion" required>
                @lang('app.descripcion')
              </label>
              <textarea required
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="descripcion"
                placeholder="Ingrese la descripción del producto"
                name="descripcion"
              ></textarea>
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 font-bold mb-2" for="precio" name="precio" required>
                @lang('app.precio')
              </label>
              <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="precio"
                type="text"
                placeholder="Ingrese el precio del producto"
                name="precio"
                required
              />
            </div>
            </div>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    @lang('app.btn_crear')
                </button>
                <a href="{{ route("producto.listar") }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">@lang('app.btn_cancelar')</a>
        </form>
            

   @if ($errors->any())
    {{ $errors->first("numero") }}
   @endif

@endsection