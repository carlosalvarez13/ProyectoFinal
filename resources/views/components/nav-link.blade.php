<body class="font-sans antialiased">
    <section class="relative mx-auto">
        <nav class="flex justify-between bg-blue-900 text-white w-full">
          <div class="px-5 xl:px-12 py-6 flex w-full items-center">
            <a class="text-3xl font-bold font-heading" href="{{ route('producto.listar') }}">
              CostaClima
            </a>

            <ul class=" md:flex px-4 mx-auto font-semibold font-heading space-x-12">
            </ul>
            <div class="relative  md:block mr-8">
              <form action="{{ route('search') }}" method="GET">
                <div class="relative md:block mr-8">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                      </svg>
                    </div>
                    <input type="text" name="query" id="search-navbar" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-100 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-200 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="@lang("app.buscar")">
                  </div>
                </div>
            </form>
            <div class=" xl:flex items-center space-x-5 items-center">
                <form action="{{ route("producto.crear") }}" method="get">
                    @csrf
                    <button class="px-3 py-2 hover:text-gray-100">@lang("app.btn_crear")</button>
                </form>
                <div class="relative" onmouseover="openDropdown()" onmouseout="closeDropdown()">
                  <a class="flex items-center hover:text-gray-200" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </a>
                  <div id="dropdown" class="absolute right-0   bg-white rounded-md shadow-lg" style="display: none;">
                    <form action="{{ route("admin.administrar") }}" method="get" class="hover:bg-gray-200">
                      @csrf
                      <button class="block px-4 py-2 text-gray-800">@lang("app.usuario")</button>
                    </form>
                    <form action="{{ route("logout") }}" method="post" class="hover:bg-gray-200">
                      @csrf
                      <button class="block px-4 py-2 text-gray-800">@lang("app.btn_salir")</button>
                    </form>
                  </div>
                </div>
              
            </div>
          </div>
          
        </div>
          
        </nav>
        
      </section>

      <script>
          function openDropdown() {
            var dropdown = document.getElementById('dropdown');
            dropdown.style.display = 'block';
          }
                
          function closeDropdown() {
              var dropdown = document.getElementById('dropdown');
              dropdown.style.display = 'none';
            }
      </script>
</body>