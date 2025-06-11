<x-layout>
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        @if($posts->count() > 0)
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    <article class="group relative overflow-hidden rounded-xl bg-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        @if ($post->image)
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ asset('storage/' . $post->image) }}" 
                                     alt="{{ $post->judul }}" 
                                     class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <div class="flex items-center text-xs text-gray-500 mb-3">
                                <time>{{ $post->created_at->diffForHumans() }}</time>
                                <span class="mx-2">•</span>
                                <span class="text-blue-600 font-medium">{{ $post->user->name }}</span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors duration-200">
                                {{ $post->judul }}
                            </h3>
                            
                            <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3">
                                {{ Str::limit($post->content, 120) }}
                            </p>
                            
                            <a href="/posts/{{ $post->id }}" 
                               class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors duration-200">
                                Read more
                                <svg class="ml-1 h-4 w-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">No articles yet</h3>
                <p class="mt-2 text-gray-500">Be the first to publish an article!</p>
            </div>
        @endif
    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
     <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-9">
                <div class="col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-xl">A</span>
                        </div>
                        <span class="text-2xl font-bold">Tulisin</span>
                    </div>
                    <p class="text-gray-400 mb-6 max-w-md">
                        Platform terbaik untuk menemukan artikel berkualitas dari berbagai topik menarik. 
                        Bergabunglah dengan ribuan pembaca lainnya.
                    </p>
                </div>
                <div>
                    <h4 class="font-semibold text-lg mb-4">Navigasi</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Kategori</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Trending</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Tentang Kami</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; 2025 ArticleHub. Semua hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>
</x-layout>