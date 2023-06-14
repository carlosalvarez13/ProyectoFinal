@extends("layouts.app")

@section("main")
    @if(Auth::user()->administrador == 1)   
        <x-nav-link></x-nav-link>
    @else
        <x-nav-link-2></x-nav-link-2>
    @endif

    @if($valoraciones->isEmpty())
        <div class="flex justify-center items-center bg-blue-300">
            <p class="text-white text-2xl m-8">@lang('app.vacioP')</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 m-8">
            @foreach ($valoraciones as $valoracion)
                <div class="bg-blue-300 rounded-lg p-4">
                    <p class="text-gray-800 font-bold mb-2">{{ $valoracion->usuario->name }}</p>
                    <hr class="border border-black">
                    <div class="flex items-center">
                        <p class="text-gray-800">@lang('app.puntuacion')</p>
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $valoracion->puntuacion)
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
                    </div>

                    @if ($valoracion->comentario != null)
                        <p class="text-gray-800">@lang('app.comentario')</p>
                    @endif
                    <p class="text-gray-800">{{ $valoracion->comentario }}</p>
                    <p class="text-gray-500 text-sm mt-2">{{ $valoracion->created_at->format('Y-m-d') }}</p>
                </div>
            @endforeach
        </div>
    @endif

    <div class="flex justify-center mt-9">
        {{ $valoraciones->links() }}
    </div>
@endsection
