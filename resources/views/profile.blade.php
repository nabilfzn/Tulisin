<x-layout>
    
    <div class="bg-gray-50 min-h-screen">

    
        @auth
        <main class="container mx-auto max-w-5xl px-4 py-10">
            <!-- Profile Header Card -->
            <div class="mb-8 overflow-hidden rounded-2xl bg-white shadow-md">
                <div class="p-8">
                    <div class="flex flex-col items-center text-center sm:flex-row sm:items-start sm:text-left">
                        @php
                            // Gunakan UI Avatars yang dinamis jika tidak ada gambar, ini jauh lebih baik
                            $imageUrl = auth()->user()->image
                                ? asset('storage/' . auth()->user()->image)
                                : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=EBF4FF&color=4299E1&size=128';
                        @endphp
                        
                        <img src="{{ $imageUrl }}" alt="Foto Profil {{ auth()->user()->name }}" class="h-28 w-28 flex-shrink-0 rounded-full object-cover border-4 border-white shadow-lg sm:mr-8 mb-4 sm:mb-0">
                        
                        <div class="flex-grow">
                            <h1 class="text-3xl font-bold text-gray-900">{{ auth()->user()->name }}</h1>
                            <p class="mt-1 text-lg text-gray-600">{{ auth()->user()->email }}</p>
                            <p class="mt-2 text-sm text-gray-500">
                                Bergabung pada {{ auth()->user()->created_at->translatedFormat('d F Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabs Section with Alpine.js -->
            <div x-data="{ activeTab: 'artikel' }" class="rounded-2xl bg-white shadow-md">
                <!-- Tab Buttons -->
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8 px-6" aria-label="Tabs">
                        <button @click="activeTab = 'informasi'"
                                :class="{ 'border-indigo-500 text-indigo-600': activeTab === 'informasi', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'informasi' }"
                                class="whitespace-nowrap flex items-center gap-2 py-4 px-1 border-b-2 font-medium text-sm transition-colors focus:outline-none">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                                Informasi Pribadi
                        </button>
                        <button @click="activeTab = 'artikel'"
                                :class="{ 'border-indigo-500 text-indigo-600': activeTab === 'artikel', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'artikel' }"
                                class="whitespace-nowrap flex items-center gap-2 py-4 px-1 border-b-2 font-medium text-sm transition-colors focus:outline-none">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg>
                            Artikel Saya
                        </button>
                    </nav>
                </div>

                <!-- Tab Content Panels -->
                <div class="p-6">
                    <!-- Informasi Pribadi Panel -->
                    <div x-show="activeTab === 'informasi'" x-cloak class="space-y-6">
                         <h3 class="text-xl font-semibold text-gray-800">Ubah Informasi Pribadi</h3>
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6 max-w-lg">
                            @csrf
                            @method('patch')
    
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                                <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border" required>
                                @error('name')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2 border bg-gray-50" readonly>
                                @error('email')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                            </div>
                             <div>
                                <label for="image_upload" class="block text-sm font-medium text-gray-700">Ganti Foto Profil</label>
                                <input type="file" name="image" id="image_upload" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"/>
                                @error('image')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                            </div>
    
                            <div class="flex justify-start">
                                <button type="submit" class="inline-flex items-center gap-2 justify-center rounded-lg bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Artikel Saya Panel -->
                    <div x-show="activeTab === 'artikel'" x-cloak>
                        <div class="flex flex-col sm:flex-row justify-between sm:items-center mb-6 gap-4">
                            <h3 class="text-xl font-semibold text-gray-800">Daftar Artikel Saya ({{ $posts->count() }})</h3>
                            <a href="{{ url('/posts/create') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 transition">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                                Tulis Artikel Baru
                            </a>
                        </div>
                        <div class="overflow-x-auto rounded-lg border border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Artikel</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Diterbitkan</th>
                                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">Aksi</span></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($posts as $post)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ Str::limit($post->judul, 60) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex items-center justify-end space-x-4">
                                                <a href="/posts/{{ $post->id }}/edit" class="text-indigo-600 hover:text-indigo-800" title="Edit">
                                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/></svg>
                                                </a>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus">
                                                         <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-12 text-center text-sm text-gray-500">
                                            Anda belum menulis artikel apapun.
                                            <a href="{{ url('/posts/create') }}" class="mt-2 block font-semibold text-indigo-600 hover:underline">Mulai Tulis Sekarang</a>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @endauth
    </div>
</x-layout>