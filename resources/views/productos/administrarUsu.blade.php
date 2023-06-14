@extends("layouts.app")

@section("main")

    <x-nav-link>
    </x-nav-link>
  <main class="max-w-7xl mx-auto py-8 px-8">
    <h2 class="text-2xl font-bold mb-4">@lang('app.usuarios')</h2>

    <div class="flex justify-between items-center mb-4">
      <form action="{{ route('admin.buscarUsu') }}" method="GET">
        <input type="text" name="keyword" placeholder="@lang('app.buscarUsuarios')" class="border border-gray-300 py-2 px-4 rounded" value="{{ request('keyword') }}">
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded ml-2">@lang('app.buscar')</button>
      </form>
    </div>
    <table class="w-full">
        <thead>
          <tr>
            <th class="py-2 px-4 bg-blue-500 text-white font-medium text-left">@lang('app.nombre')</th>
            <th class="py-2 px-4 bg-blue-500 text-white font-medium text-left">email</th>
            <th class="py-2 px-4 bg-blue-500 text-white font-medium text-left">@lang('app.btn_borrar')</th>
          </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
          <tr>
            <td class="py-2 px-4 border-b border-gray-300 text-left">{{$usuario->name}}</td>
            <td class="py-2 px-4 border-b border-gray-300 text-left">{{$usuario->email}}</td>
            <td class="py-2 px-4 border-b border-gray-300 text-left">
              <a href="{{ route("admin.borrar", $usuario->idUsu) }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-red-500">
                <path d="M3 6h18M6 6V4a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v2M19 6V21a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6h14z"/>
                <path d="M10 11v6M14 11v6"/>
              </svg>
              </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="flex justify-center mt-9">
        {{ $usuarios->links() }}
      </div>
      


@endsection