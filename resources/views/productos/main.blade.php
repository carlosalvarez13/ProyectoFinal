@extends("layouts.app")

@section("main")
    @if(Auth::user()->administrador == 1)   
    <x-nav-link>
    </x-nav-link>

    @else
    <x-nav-link-2>
    </x-nav-link-2>
    @endif
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-4 mb-4"  id="success-message">
            {{ session('success') }}
        </div>
    @endif


    @if(Auth::check() && Auth::user()->administrador == 1)
        <h1 class="flex justify-center text-4xl mt-6 text-sky-400/100">@lang("app.admin")</h1>
        
        <div class="bg-white border border-gray-200 rounded-lg shadow p-6 m-8">
            <section id="Projects" class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">
                @foreach($productos as $producto)
                <a href="{{ route('producto.info', ['id' => $producto->idPro]) }}" class="w-72 bg-blue-400 shadow-lg rounded-xl transition duration-500 hover:scale-105 hover:shadow-xl">
                    <div class="w-72 bg-blue-400 shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                        <img src="{{ asset("storage/imagenes/{$producto->FotPro}") }}" alt="Product" class="h-64 w-full object-cover rounded-t-xl" />
                        <div class="px-4 py-3 w-72">
                            <p class="text-lg font-bold text-white truncate block capitalize">{{ Str::limit($producto->NomPro, 13) }}</p>
                            {{ Str::limit($producto->DesPro, 38) }}
                            <div class="flex items-center"> 
                                <p class="text-lg font-semibold text-white cursor-auto my-3">{{ $producto->PrePro }}€</p>
                                <div class="ml-auto">
                                    <form action="{{ route("producto.editar", $producto) }}" method="post">
                                        @csrf
                                        <button class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                            @lang('app.btn_editar')
                                        </button>
                                    </form>
                                    <form action="{{ route("producto.borrar", $producto->idPro) }}" method="post" onsubmit="return confirmDelete(event)">
                                        @csrf
                                        <button class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                            @lang('app.btn_borrar')
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </section>
            <div class="flex justify-center mt-8">
                {{$productos->links()}}
            </div>
        </div>
        
        
        

    @else

        @empty($productos)
            @lang('app.vacio')
        @else
        
        
        <div class="bg-white border border-gray-200 rounded-lg shadow p-6 m-8">
            <section id="Projects" class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-10 gap-x-6 mt-10 mb-5">
                @foreach($productos as $producto)
                <a href="{{ route('producto.info', ['id' => $producto->idPro]) }}" class="w-72 bg-blue-400 shadow-lg rounded-xl transition duration-500 hover:scale-105 hover:shadow-xl">
                    <div class="w-72 bg-blue-400 shadow-lg rounded-xl transition duration-500 hover:scale-105 hover:shadow-xl">
                        <img src="{{ asset("storage/imagenes/{$producto->FotPro}") }}" alt="Product" class="h-64 w-full object-cover rounded-t-xl" />
                        <div class="p-4">
                            <p class="text-lg font-bold text-gray-800 truncate block capitalize">{{ Str::limit($producto->NomPro, 13) }}</p>
                            {{ Str::limit($producto->DesPro, 38) }}
                            <div class="flex items-center">
                                <div class="flex items-center mt-2.5 mb-5">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $producto->ValPro)
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <title>First star</title>
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        @else
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-100" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <title>First star</title>
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        @endif
                                    @endfor
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{ $producto->ValPro }}</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-3xl font-bold text-gray-900 dark:text-white">{{ $producto->PrePro }}€</span>
                                    <div class="flex items-center justify-between">
                                        <form action="{{ route('producto.guardar') }}" method="post" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            @csrf
                                            <input type="hidden" name="idPro" value="{{ $producto->idPro }}">
                                            <button type="submit" class="w-full">
                                                <div class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </section>
        </div>
        
        

    <div class="flex justify-center m-4">
        {{ $productos->appends(request()->query())->links() }}
    </div>
    
        @endempty

    @endif
        

    <script>
        setTimeout(function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 1500);
    </script>

@endsection