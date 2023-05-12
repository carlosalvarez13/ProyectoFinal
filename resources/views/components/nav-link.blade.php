<body class="font-sans antialiased">
    <div class="min-h-screen">
        <nav class="bg-blue-600">
            <div class=" mx-auto px-2 sm:px-2 lg:px-1">
                <div class="flex items-center justify-between h-16 w-full lg:w-auto">
                    <div class="flex-shrink-0 pl-6">
                        <a href="{{ route('producto.listar') }}" class="font-bold text-white" aria-label="CostaClima Home">CostaClima</a>
                    </div>
                    <div class="hidden md:block">
                        
                        <div class="ml-10 flex items-center space-x-4">
                            <form action="{{ route("producto.crear") }}" method="get">
                                @csrf
                                <button class="px-3 py-2 hover:text-gray-100">@lang("app.btn_crear")</button>
                            </form>
                            <form action="{{ route("logout") }}" method="post">
                                @csrf
                                <button class="px-3 py-2 hover:text-gray-100">@lang("app.btn_salir")</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        
</body>