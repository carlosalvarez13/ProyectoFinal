@extends("layouts.app")

@section("main")
    @if(Auth::user()->administrador == 1)   
    <x-nav-link>
    </x-nav-link>

    @else
    <x-nav-link-2>
    </x-nav-link-2>
    @endif

    <div class="container mx-auto py-8">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="flex items-center justify-between px-6 py-4 bg-blue-500">
                <h1 class="text-2xl font-bold text-white">{{ $producto->NomPro }}</h1>
                <div class="flex items-center">
                    <span class="text-white mr-2">Valoración:</span>
                    <div class="flex items-center">
                        @for ($i = 0; $i < 5; $i++)
                            @if ($i < $producto->ValPro)
                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            @else
                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-100" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            @endif
                        @endfor
                        <span class="text-white ml-1">{{ $producto->ValPro }}</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row ">
                <div class="md:w-1/2">
                    <img src="{{ asset("storage/imagenes/{$producto->FotPro}") }}" alt="Product" class="w-full h-auto object-cover">
                </div>
                <div class="md:w-1/2 p-6">
                    <h2 class="text-xl font-semibold mb-4">Descripción</h2>
                    <p class="text-gray-600 mb-6">{{ $producto->DesPro }}</p>
                    <h2 class="text-xl font-semibold mb-4">Valorar el producto</h2>
                    <form action="" method="POST" class="mb-6">
                        @csrf
                        <input type="hidden" name="idUsu" value="{{ Auth::id() }}">
                        <input type="hidden" name="idPro" value="{{ $producto->idPro }}">

                        <textarea name="comment" rows="4" placeholder="Deja un comentario..." class="w-full p-2 border rounded-md resize-none focus:outline-none focus:ring focus:border-blue-500"></textarea>
                        <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star-rating input[type="radio"]');
            
            stars.forEach(function(star) {
                star.addEventListener('change', function() {
                    const selectedStars = document.querySelectorAll('.star-rating input[type="radio"]:checked');
                    selectedStars.forEach(function(selectedStar) {
                        selectedStar.parentNode.classList.add('selected');
                    });
                    
                    const unselectedStars = document.querySelectorAll('.star-rating input[type="radio"]:not(:checked)');
                    unselectedStars.forEach(function(unselectedStar) {
                        unselectedStar.parentNode.classList.remove('selected');
                    });
                });
            });
        });
    </script>
    
@endsection
