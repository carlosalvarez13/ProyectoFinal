@extends("layouts.app")

@section("main")
<x-nav-link2>
</x-nav-link2>

<div class="container mx-auto p-8 bg-white shadow-xl mt-8">
    <div class="w-full h-64 bg-cover bg-center mb-6" style="background-image: url('{{ asset('imagenes/envios.png') }}');"></div>
    <h1 class="text-3xl font-bold text-blue-900 mb-6">@lang('app.shipping1')</h1>
    <p class="text-lg text-gray-700 mb-6">@lang('app.shipping2')</p>
    <p class="text-lg text-gray-700 mb-6">@lang('app.shipping3')</p>
    <p class="text-lg text-gray-700 mb-6">@lang('app.shipping4')</p>
    <p class="text-lg text-gray-700 mb-6">@lang('app.shipping5')</p>
    <p class="text-lg text-gray-700 mb-6">@lang('app.shipping6')</p>
    <p class="text-lg text-gray-700 mb-6">@lang('app.shipping7')</p>
    <p class="text-lg text-gray-700 mb-6">@lang('app.shipping8')</p>
</div>

@endsection