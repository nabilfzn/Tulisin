<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun | Tulisin</title>
    @vite('resources/css/app.css') {{-- Atau link CDN Tailwind --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100 font-sans text-gray-900">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="w-full max-w-md space-y-8">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-indigo-600">
                    Buat Akun Tulisin
                </h1>
                <p class="mt-2 text-gray-600">
                    Satu langkah lagi untuk mulai membaca dan menulis artikel.
                </p>
            </div>
            
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
                
                @if(session('message'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-cloak
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                     class="flex items-start gap-4 rounded-lg border border-green-200 bg-green-50 p-4 mb-6" role="alert">
                    <svg class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <div>
                        <strong class="font-medium text-green-800">Berhasil!</strong>
                        <p class="text-sm text-green-700">{{ session('message') }}</p>
                    </div>
                </div>
                @endif
                
                @if ($errors->any())
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 10000)" x-show="show" x-cloak
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                     class="flex items-start gap-4 rounded-lg border border-red-200 bg-red-50 p-4 mb-6" role="alert">
                     <svg class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" /></svg>
                    <div>
                        <strong class="font-medium text-red-800">Terjadi Kesalahan</strong>
                        <ul class="mt-1 list-disc list-inside text-sm text-red-700">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                @endif


                <form action="{{ route('actionregister') }}" method="post" class="space-y-6">
                    @csrf
                    <!-- Username -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" name="name" id="name" 
                               class="mt-1 block w-full rounded-lg border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border"
                               placeholder="Contoh: ahmadnabil" required value="{{ old('name') }}">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" 
                               class="mt-1 block w-full rounded-lg border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border"
                               placeholder="nama@email.com" required value="{{ old('email') }}">
                    </div>

                    <!-- Password -->
                    <div x-data="{ showPassword: false }">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-1 relative">
                            <input :type="showPassword ? 'text' : 'password'" name="password" id="password"
                                   class="block w-full rounded-lg border-gray-300 p-3 pr-10 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border"
                                   placeholder="••••••••" required>
                            <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700" title="Toggle Password Visibility">
                                <!-- Mata Tertutup -->
                                <svg x-show="showPassword" x-cloak class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.243 4.243L6.228 6.228" /></svg>
                                <!-- Mata Terbuka -->
                                <svg x-show="!showPassword" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.432 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            </button>
                        </div>
                    </div>
                    
                    <div>
                        <button type="submit" 
                                class="flex w-full justify-center rounded-lg bg-indigo-600 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-colors">
                            Daftar
                        </button>
                    </div>
                </form>

                <div class="mt-8 text-center text-sm text-gray-600">
                    <p>
                        Sudah punya akun?
                        <a href="{{ url('/') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Masuk di sini
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>