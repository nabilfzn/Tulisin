<x-layout>
    <x-slot:title>Tambah Artikel Baru</x-slot:title>
    
    <!-- Bagian utama halaman dengan latar belakang abu-abu muda -->
    <div class="bg-gray-100 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        
        <!-- Kontainer Form -->
        <div class="max-w-2xl w-full space-y-8 bg-white p-8 sm:p-10 rounded-2xl shadow-lg">
            
            <!-- Header Form -->
            <div>
                <h1 class="text-3xl font-bold text-gray-900">
                    Tambah Artikel Baru
                </h1>
                <p class="mt-2 text-gray-600">
                    Isi detail di bawah ini untuk menerbitkan artikel baru.
                </p>
            </div>
            
            <!-- Form -->
            <form action="/posts" method="POST" enctype="multipart/form-data" class="mt-8 space-y-6">
                @csrf

                <!-- Field Judul -->
                <div>
                    <label for="judul" class="block text-sm font-medium text-gray-700">
                        Judul
                    </label>
                    <div class="mt-1">
                        {{-- Helper `old()` akan mengisi kembali field ini jika validasi gagal --}}
                        <input type="text" id="judul" name="judul" required 
                               value="{{ old('judul') }}"
                               placeholder="Contoh: 10 Tren Teknologi Terbaru"
                               class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-3 border">
                    </div>
                    @error('judul')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Field Konten -->
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">
                        Konten
                    </label>
                    <div class="mt-1">
                        {{-- Untuk textarea, `old()` ditempatkan di dalam tag --}}
                        <textarea id="content" name="content" rows="10" required 
                                  placeholder="Tuliskan isi artikel Anda di sini..."
                                  class="block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-3">{{ old('content') }}</textarea>
                    </div>
                    @error('content')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input File Gambar -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Gambar Artikel</label>
                    <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload sebuah file</span>
                                    <input id="image" name="image" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">atau seret dan lepas</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                PNG, JPG, GIF hingga 2MB
                            </p>
                        </div>
                    </div>
                     @error('image')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div>
                    <button type="submit" 
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        Simpan Artikel
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>