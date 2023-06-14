<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex h-screen w-full items-center justify-center bg-gray-900 bg-cover bg-no-repeat" style="background-image:url('{{ asset('imagenes/login.jpg') }}')">
        <div class="rounded-xl bg-gray-800 bg-opacity-50 px-16 py-10 shadow-lg backdrop-blur-md max-sm:px-8">
            <div class="text-white">
                <div class="mb-8 flex flex-col items-center">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                    <h1 class="mb-2 text-2xl">CostaClima</h1>
                </div>

                <form method="POST" action="{{ route('register') }}" class="mt-4">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <input id="name" class="rounded-xl border-yellow-500 bg-blue-400 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" type="text" name="name" :value="old('name')" placeholder="{{ __('Name') }}" required autofocus autocomplete="name" />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-4">
                        <input id="email" class="rounded-xl border-yellow-500 bg-blue-400 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" type="email" name="email" :value="old('email')" placeholder="{{ __('example@mail.com') }}" required autocomplete="username" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <input id="password" class="rounded-xl border-yellow-500 bg-blue-400 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" type="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <input id="password_confirmation" class="rounded-xl border-yellow-500 bg-blue-400 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password" />
                    </div>
                    
                    <div class="flex justify-center">
                        <button type="submit" class="rounded-3xl bg-yellow-400 bg-opacity-50 px-10 py-2 text-white shadow-xl backdrop-blur-md transition-colors duration-300 hover:bg-yellow-600">
                            @lang('app.registrarse')
                        </button>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            @lang('app.registrado')
                        </a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
