<x-layout>
    <x-slot:title>Edit Post: {{ $post->judul }}</x-slot:title>
    
    <!-- Bagian utama halaman dengan latar belakang abu-abu muda -->
    <div class="bg-gray-100 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        
        <!-- Kontainer Form -->
        <div class="max-w-3xl w-full space-y-8 bg-white p-8 sm:p-10 rounded-2xl shadow-lg">
            
            <!-- Header Form -->
            <div>
                <h1 class="text-3xl font-bold text-gray-900">
                    Edit Artikel
                </h1>
                <p class="mt-2 text-gray-600">
                    Perbarui judul, konten, atau gambar untuk artikel ini.
                </p>
            </div>
            
            <!-- Form -->
            <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data" class="mt-8 space-y-6">
                @csrf
                @method('PUT')

                <!-- Field Judul -->
                <div>
                    <label for="judul" class="block text-sm font-medium text-gray-700">
                        Judul
                    </label>
                    <div class="mt-1">
                        <input type="text" id="judul" name="judul" required 
                               value="{{ old('judul', $post->judul) }}"
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
                        <textarea id="content" name="content" rows="10" required 
                                  class="block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-3">{{ old('content', $post->content) }}</textarea>
                    </div>
                    @error('content')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bagian Gambar -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Preview Gambar Saat Ini -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Gambar Saat Ini</label>
                        <div class="mt-2">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar saat ini" class="rounded-lg object-cover w-full h-48 border border-gray-200">
                            @else
                                <div class="flex items-center justify-center w-full h-48 bg-gray-100 rounded-lg border border-gray-200">
                                    <p class="text-sm text-gray-500">Tidak ada gambar</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Input File Gambar Baru -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Ganti Gambar (Opsional)</label>
                        <div class="mt-2 flex items-center justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg h-48">
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
                                    PNG, JPG, GIF hingga 10MB
                                </p>
                            </div>
                        </div>
                         @error('image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div>
                    <button type="submit" 
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        Update Artikel
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>