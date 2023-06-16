@extends("layouts.app")

@section("main")
<x-nav-link>
</x-nav-link>

<div class="container mx-auto p-8 bg-white shadow-xl mt-8">
    <h1 class="text-3xl font-bold text-blue-900 mb-6">@lang('app.bCosta')</h1>
    <p class="text-lg text-gray-700 mb-6">@lang('app.about1')</p>
    <p class="text-lg text-gray-700 mb-6">@lang('app.about2')</p>
    <p class="text-lg text-gray-700 mb-6">@lang('app.about3')</p>
    <p class="text-lg text-gray-700 mb-6">@lang('app.about4')</p>
    <p class="text-lg text-gray-700 mb-6">@lang('app.about5')</p>
    <p class="text-lg text-gray-700 mb-6">@lang('app.about6')</p>
    <p class="text-lg text-gray-700 mb-6">@lang('app.about7')</p>
    <div class="w-full h-96 bg-contain bg-center bg-no-repeat mb-6" style="background-image: url('{{ asset('imagenes/about.jpg') }}');"></div>
  </div>

@endsection