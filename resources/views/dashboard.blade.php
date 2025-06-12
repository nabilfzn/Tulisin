@push('head')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
    .card-hover:hover { transform: translateY(-4px); }
    .gradient-text { 
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
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
@endpush

<x-layout>

  <x-slot:title></x-slot:title>
  
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-700 text-white py-20">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Temukan Artikel <span class="text-yellow-300">Terbaik</span> untuk Anda
                </h1>
                <p class="text-xl mb-8 text-blue-100">
                    Jelajahi ribuan artikel berkualitas dari berbagai topik menarik. 
                    Mulai dari teknologi, bisnis, hingga lifestyle.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                  <button onclick="document.getElementById('artikel').scrollIntoView({ behavior: 'smooth' })"
                          class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                      Mulai Membaca
                  </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-3xl md:text-4xl font-bold gradient-text mb-2">5000+</div>
                    <div class="text-gray-600">Artikel</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-bold gradient-text mb-2">50K+</div>
                    <div class="text-gray-600">Pembaca</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-bold gradient-text mb-2">25+</div>
                    <div class="text-gray-600">Kategori</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-bold gradient-text mb-2">4.9/5</div>
                    <div class="text-gray-600">Rating</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Articles -->
    <section id='artikel' class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Artikel Unggulan</h2>
                <p class="text-xl text-gray-600">Artikel terpopuler dan terbaru minggu ini</p>
            </div>
            
            @if($posts->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($posts->take(6) as $post)
                        <article class="group relative overflow-hidden rounded-xl bg-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 card-hover">
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
                                <h3 class="font-bold text-xl mb-3 text-gray-900 hover:text-blue-600 transition-colors cursor-pointer line-clamp-2">{{ $post->judul }}</h3>
                                <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($post->content, 120) }}</p>
                                <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                    <div class="flex items-center space-x-4">
                                        <span>{{ $post->user->name }}</span>
                                        <span>{{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <a href="/posts/{{ $post->id }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada artikel</h3>
                    <p class="mt-2 text-gray-500">Jadilah yang pertama untuk menerbitkan artikel!</p>
                </div>
            @endif
            
            <div class="text-center mt-12">
                <button onclick="window.location.href='/posts'" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                    Lihat Semua Artikel
                </button>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-700 text-white py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Berlangganan Newsletter</h2>
            <p class="text-xl mb-8 text-blue-100">
                Dapatkan artikel terbaru langsung di email Anda setiap minggu
            </p>
            <div class="max-w-md mx-auto">
                <div class="flex flex-col sm:flex-row gap-4" id="newsletter-form">
                    <input type="email" id="email-input" placeholder="Masukkan email Anda" 
                           class="flex-1 px-4 py-3 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-white">
                    <button onclick="subscribeNewsletter()" 
                            class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Berlangganan
                    </button>
                </div>
                <div id="newsletter-success" class="hidden bg-white bg-opacity-20 rounded-lg p-4 mt-4">
                    <div class="text-xl mb-2">🎉</div>
                    <p>Terima kasih! Anda telah berlangganan newsletter kami.</p>
                </div>
            </div>
        </div>
    </section>

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

    <script>
        // Newsletter subscription
        function subscribeNewsletter() {
            const email = document.getElementById('email-input').value;
            if (email) {
                document.getElementById('newsletter-form').classList.add('hidden');
                document.getElementById('newsletter-success').classList.remove('hidden');
                
                // Here you would typically send the email to your backend
                // Example: await subscribeToNewsletter(email);
            }
        }
    </script>
</x-layout>