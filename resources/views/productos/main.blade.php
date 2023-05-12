@extends("layouts.app")

@section("main")

    @if(Auth::user()->administrador == 1)
        <h1 class="flex justify-center text-4xl mt-6 text-sky-400/100">@lang("app.admin")</h1>
        <div class="flex justify-center items-center ">
            <div class="grid grid-cols-3 ">
                @foreach($productos as $producto)
                <div class="flex justify-center p-7 ">
                    <div
                      class="flex flex-col rounded-lg bg-white shadow-lg dark:bg-neutral-700 md:max-w-xl md:flex-row">
                      <img
                        class="h-96 w-full rounded-t-lg object-cover md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                        src="{{ $producto->FotPro }}"
                        alt="" />
                      <div class="flex flex-col justify-start p-6">
                        <h5
                          class="mb-2 text-xl font-medium text-neutral-800 dark:text-neutral-50">
                          {{ $producto-> NomPro}}
                        </h5>
                        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                          {{ $producto-> DesPro}}
                        </p>

                        <h5
                            class="mb-2 text-xl font-medium text-neutral-800 dark:text-neutral-50">
                            {{ $producto-> PrePro}}€
                        </h5>
                        <div>
                            <form action="{{ route("producto.editar", $producto) }}" method="post">@csrf<button  class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">@lang('app.btn_editar')</button></form>
                            <form action="{{ route("producto.borrar", $producto->idPro) }}" method="post" >@csrf<button class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">@lang('app.btn_borrar')</button></form>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
            </div>         
    </div>
    @else

        @empty($productos)
            @lang('app.vacio')
        @else
        
        <div class="flex justify-center items-center">
                <div class="grid grid-cols-3 ">
                    @foreach($productos as $producto)
                            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-5 my-5">
                                <a href="#">
                                    <img class="p-8 rounded-t-lg" src={{ $producto->FotPro }} alt="product image" />
                                </a>
                                <div class="px-5 pb-5">
                                    <a href="#">
                                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $producto->NomPro }}</h5>
                                    </a>
                                    <div class="flex items-center mt-2.5 mb-5">
                                        @for ($i = 0; $i < 5; $i++)
                                        @if ($i<$producto->ValPro)
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>

                                        @else
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-100" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        @endif
                                        @endfor
                                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{ $producto->ValPro }}</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-3xl font-bold text-gray-900 dark:text-white">{{ $producto->PrePro }}€</span>
                                        <form  action="{{ route("carrito.agregar", $producto->idPro) }}" method="post" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">@csrf<button>@lang('app.add')</button></form>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>         
        </div>

        @endempty

    @endif
        
    <footer class="p-4 bg-white  shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© <a href="#" class="hover:underline">Carlos Álvarez Moreno</a>
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6 ">@lang('app.About')</a>
            </li>
            <li>
                <a href="#" class="hover:underline">@lang('app.Contacto')</a>
            </li>
        </ul>
    </footer>

   

@endsection