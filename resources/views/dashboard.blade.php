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

  <x-slot:title>Tulisin - Artikel Cerdas dengan Wawasan AI</x-slot:title>
  
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-700 text-white py-20">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Artikel Terbaik, Diperkaya <span class="text-yellow-300">Wawasan AI</span>
                </h1>
                <p class="text-xl mb-8 text-blue-100">
                    Jelajahi ribuan artikel berkualitas, dan gali lebih dalam setiap topik dengan asisten AI cerdas kami untuk pemahaman yang tak terbatas.
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

    <!-- [BARU] How It Works Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Membaca Jadi Lebih Cerdas</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Fitur AI kami membantu Anda memahami topik lebih dalam, hanya dengan 3 langkah mudah.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 md:gap-12 text-center">
                <!-- Step 1 -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center h-20 w-20 rounded-full bg-blue-100 mb-6">
                         <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">1. Baca Artikel</h3>
                    <p class="text-gray-600">Nikmati konten berkualitas tinggi yang ditulis oleh para ahli di bidangnya.</p>
                </div>
                <!-- Step 2 -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center h-20 w-20 rounded-full bg-blue-100 mb-6">
                        <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" /></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">2. Gunakan Asisten AI</h3>
                    <p class="text-gray-600">Ajukan pertanyaan, minta ringkasan, atau cari istilah sulit langsung di halaman artikel.</p>
                </div>
                <!-- Step 3 -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center h-20 w-20 rounded-full bg-blue-100 mb-6">
                        <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">3. Dapatkan Wawasan Baru</h3>
                    <p class="text-gray-600">Percepat proses belajar dan dapatkan pemahaman mendalam tentang topik yang Anda baca.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Articles -->
    <section id='artikel' class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Artikel Unggulan</h2>
                <p class="text-xl text-gray-600">Artikel terpopuler dan terbaru minggu ini</p>
            </div>
            
            @if($posts->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($posts->take(6) as $post)
                        <article class="group relative overflow-hidden rounded-xl bg-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 card-hover border border-gray-200">
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
                            
                            <div class="p-6 flex flex-col h-[240px]">
                                <h3 class="font-bold text-xl mb-3 text-gray-900 hover:text-blue-600 transition-colors cursor-pointer line-clamp-2">{{ $post->judul }}</h3>
                                <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($post->content, 120) }}</p>
                                <div class="mt-auto">
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

    <!-- Category -->
<section class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Topik yang Kami Bahas</h2>
          <p class="text-xl text-gray-600">Temukan ragam artikel sesuai minat Anda.</p>
      </div>
      <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 md:gap-6">
          @php
              $categories = [
                  ['name' => 'Teknologi', 'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>'],
                  ['name' => 'Bisnis', 'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'],
                  ['name' => 'Kesehatan', 'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>'],
                  ['name' => 'Gaya Hidup', 'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>'],
                  ['name' => 'Sains', 'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547a2 2 0 01-1.022.547m3.306-3.306a2 2 0 00.547 1.022l.477 2.387a6 6 0 00.517 3.86l.158.318a6 6 0 01.517 3.86l.21 4.54a2 2 0 00.547 1.806a2 2 0 01.547 1.022m-3.306-3.306a2 2 0 00-1.022-.547L4.54 14.79a6 6 0 00-3.86-.517l-.318-.158a6 6 0 01-3.86-.517l-4.54-.21a2 2 0 00-1.806-.547a2 2 0 01-1.022-.547m3.306 3.306a2 2 0 00-.547-1.022l-.477-2.387a6 6 0 00-.517-3.86l-.158-.318a6 6 0 01-.517-3.86l-.21-4.54a2 2 0 00-.547-1.806a2 2 0 01-.547-1.022"></path></svg>'],
                  ['name' => 'Lainnya', 'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>']
              ];
          @endphp

          @foreach ($categories as $category)
            <div class="flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-sm border border-gray-200 text-gray-700 hover:shadow-md transition-all duration-300 cursor-default">
                <div class="mb-3 text-blue-500">{!! $category['icon'] !!}</div>
                <span class="font-semibold">{{ $category['name'] }}</span>
            </div>
          @endforeach
      </div>
  </div>
</section>

    <!-- Testimoni -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Apa Kata Pembaca Kami</h2>
                <p class="text-xl text-gray-600">Ribuan orang telah mendapatkan wawasan baru bersama kami.</p>
            </div>
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gray-50 p-8 rounded-xl shadow-sm border border-gray-200">
                    <blockquote class="text-gray-700 text-lg mb-6">"Fitur asisten AI-nya benar-benar mengubah cara saya membaca. Saya bisa langsung bertanya tentang konsep yang tidak saya mengerti. Jenius!"</blockquote>
                    <div class="flex items-center">
                        <img class="h-12 w-12 rounded-full object-cover" src="https://i.pravatar.cc/150?u=a042581f4e29026704d" alt="Andi Pratama">
                        <div class="ml-4">
                            <p class="font-bold text-gray-900">Andi Pratama</p>
                            <p class="text-sm text-gray-500">Mahasiswa IT</p>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="bg-gray-50 p-8 rounded-xl shadow-sm border border-gray-200">
                    <blockquote class="text-gray-700 text-lg mb-6">"Koleksi artikelnya sangat lengkap dan berkualitas. Dari topik bisnis hingga teknologi, semua ada di sini. Sudah jadi sumber bacaan utama saya."</blockquote>
                    <div class="flex items-center">
                        <img class="h-12 w-12 rounded-full object-cover" src="https://i.pravatar.cc/150?u=a042581f4e29026705d" alt="Rina Sastro">
                        <div class="ml-4">
                            <p class="font-bold text-gray-900">Rina Sastro</p>
                            <p class="text-sm text-gray-500">Digital Marketer</p>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="bg-gray-50 p-8 rounded-xl shadow-sm border border-gray-200">
                    <blockquote class="text-gray-700 text-lg mb-6">"Saya suka desainnya yang bersih dan tanpa iklan mengganggu. Membuat pengalaman membaca sangat nyaman dan fokus."</blockquote>
                    <div class="flex items-center">
                        <img class="h-12 w-12 rounded-full object-cover" src="https://i.pravatar.cc/150?u=a042581f4e29026706d" alt="Budi Hartono">
                        <div class="ml-4">
                            <p class="font-bold text-gray-900">Budi Hartono</p>
                            <p class="text-sm text-gray-500">Pembaca Setia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- langganan -->
    <section class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-700 text-white py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Berlangganan Newsletter</h2>
            <p class="text-xl mb-8 text-blue-100">
                Dapatkan artikel terbaru dan paling cerdas langsung di email Anda setiap minggu.
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
                        <img src="{{ asset('storage/logo.png') }}" alt="" class="size-10">
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
                        <li><a href="/" class="hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="/posts" class="hover:text-white transition-colors">Trending</a></li>
                        <li><a href="/" class="hover:text-white transition-colors">Tentang Kami</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; 2025 Tulisin. Semua hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>
</x-layout>