@extends("layouts.app")

@section("main")
    <x-nav-link2>
    </x-nav-link2>
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-blue-500 rounded p-6 shadow-md">
        <h1 class="text-2xl font-bold mb-4">@lang('app.DetallesUsu')</h1>
        <div class="mb-4">
            <label for="name" class="block font-medium text-gray-900">@lang('app.nombre')</label>
            <input type="text" id="name" class="w-full bg-gray-100 border border-gray-300 px-4 py-2 rounded" readonly value="{{$usuario->name}}">
        </div>
        <div class="mb-4">
            <label for="email" class="block font-medium text-gray-900">Email:</label>
            <input type="email" id="email" class="w-full bg-gray-100 border border-gray-300 px-4 py-2 rounded" readonly value="{{$usuario->email}}">
        </div>
        </div>
    </div>



@endsection