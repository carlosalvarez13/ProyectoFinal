@extends("layouts.app")

@section("main")
    <x-nav-link2>
    </x-nav-link2>
    <div class="flex justify-center items-center mt-2">
        <div class="grid grid-cols-1">
            @if($productosCarrito->isEmpty())
                <div class="flex justify-center items-center h-9 bg-red-200">
                    <p class="text-2xl text-gray-800">@lang('app.vacioC')</p>
                </div>
            @else
                @foreach($productosCarrito as $producto)
                    <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-5 my-2">
                        <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <img class="object-cover w-full rounded-t-lg h-100 md:w-60 md:rounded-none md:rounded-l-lg mr-8" src="{{ asset("storage/imagenes/{$producto->producto->FotPro}") }}" alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $producto->producto->NomPro }}</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($producto->producto->DesPro, 60) }}</p>
                                <div class="flex items-center mt-2.5 mb-5">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $producto->producto->ValPro)
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
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{ $producto->producto->PrePro }}€</span>
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 mr-2">x{{ $producto->cantidad }}</span>
                                    <form action="{{ route('producto.cBorrar', ['id' => $producto->idPro]) }}" method="POST">
                                        @csrf
                                        <button class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">@lang('app.btn_borrar')</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="flex justify-center m-5">
                    <div class="bg-blue-300 p-4 rounded-lg">
                        <p class="text-xl text-gray-800">@lang('app.totalC'): {{ $productosCarrito->sum(function ($producto) { return $producto->producto->PrePro * $producto->cantidad; }) }}€</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
