
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
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="featured-articles">
                <!-- Articles will be loaded here -->
            </div>
            
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
        // Sample data - replace with actual database calls
        const sampleArticles = [
            {
                id: 1,
                title: '10 Tren Teknologi yang Akan Mengubah Dunia di 2025',
                excerpt: 'Jelajahi teknologi revolusioner yang akan membentuk masa depan kita dalam beberapa tahun ke depan.',
                author: 'Ahmad Rizki',
                date: '2025-05-28',
                category: 'Teknologi',
                readTime: '8 menit',
                image: 'https://images.unsplash.com/photo-1518709268805-4e9042af2176?w=400&h=250&fit=crop',
                likes: 234,
                views: 1520
            },
            {
                id: 2,
                title: 'Panduan Lengkap Memulai Bisnis Online untuk Pemula',
                excerpt: 'Langkah demi langkah membangun bisnis online yang sukses dari nol hingga berkembang pesat.',
                author: 'Sari Dewi',
                date: '2025-05-27',
                category: 'Bisnis',
                readTime: '12 menit',
                image: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=250&fit=crop',
                likes: 189,
                views: 892
            },
            {
                id: 3,
                title: 'Resep Sehat dan Lezat untuk Hidup yang Lebih Baik',
                excerpt: 'Kumpulan resep makanan sehat yang mudah dibuat dan tentunya lezat untuk keluarga tercinta.',
                author: 'Chef Indira',
                date: '2025-05-26',
                category: 'Kuliner',
                readTime: '6 menit',
                image: 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=400&h=250&fit=crop',
                likes: 156,
                views: 743
            },
            {
                id: 4,
                title: 'Tips Produktivitas: Kelola Waktu Seperti Seorang Pro',
                excerpt: 'Strategi dan teknik manajemen waktu yang telah terbukti meningkatkan produktivitas kerja.',
                author: 'Bambang Sutrisno',
                date: '2025-05-25',
                category: 'Produktivitas',
                readTime: '10 menit',
                image: 'https://images.unsplash.com/photo-1611224923853-80b023f02d71?w=400&h=250&fit=crop',
                likes: 298,
                views: 1134
            },
            {
                id: 5,
                title: 'Destinasi Wisata Tersembunyi di Indonesia',
                excerpt: 'Temukan keindahan alam Indonesia yang belum banyak diketahui orang dan wajib dikunjungi.',
                author: 'Maya Sari',
                date: '2025-05-24',
                category: 'Travel',
                readTime: '7 menit',
                image: 'https://images.unsplash.com/photo-1539650116574-75c0c6d73611?w=400&h=250&fit=crop',
                likes: 412,
                views: 2156
            },
            {
                id: 6,
                title: 'Investasi Cerdas untuk Generasi Milenial',
                excerpt: 'Panduan investasi yang tepat untuk generasi muda dalam membangun kekayaan jangka panjang.',
                author: 'Andi Pratama',
                date: '2025-05-23',
                category: 'Keuangan',
                readTime: '15 menit',
                image: 'https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?w=400&h=250&fit=crop',
                likes: 267,
                views: 1089
            }
        ];

        // const sampleCategories = [
        //     { name: 'Teknologi', icon: '💻', count: 1250, color: 'from-blue-500 to-purple-500' },
        //     { name: 'Bisnis', icon: '💼', count: 892, color: 'from-green-500 to-teal-500' },
        //     { name: 'Lifestyle', icon: '🌟', count: 734, color: 'from-pink-500 to-rose-500' },
        //     { name: 'Kuliner', icon: '🍳', count: 567, color: 'from-orange-500 to-red-500' },
        //     { name: 'Travel', icon: '✈️', count: 423, color: 'from-cyan-500 to-blue-500' },
        //     { name: 'Kesehatan', icon: '🏥', count: 389, color: 'from-emerald-500 to-green-500' },
        //     { name: 'Edukasi', icon: '📚', count: 678, color: 'from-indigo-500 to-purple-500' },
        //     { name: 'Olahraga', icon: '⚽', count: 234, color: 'from-yellow-500 to-orange-500' }
        // ];

        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

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

        // Load articles
        function loadArticles() {
            const container = document.getElementById('featured-articles');
            
            sampleArticles.forEach(article => {
                const articleCard = `
                    <article class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 card-hover">
                        <div class="relative">
                            <img src="${article.image}" alt="${article.title}" class="w-full h-48 object-cover">
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-xl mb-3 text-gray-900 hover:text-blue-600 transition-colors cursor-pointer">${article.title}</h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">${article.excerpt}</p>
                            <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                <div class="flex items-center space-x-4">
                                    <span>${article.author}</span>
                                    <span>${article.readTime}</span>
                                </div>
                                <span>${new Date(article.date).toLocaleDateString('id-ID')}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors">
                                    Baca Selengkapnya
                                </button>
                            </div>
                        </div>
                    </article>
                `;
                container.innerHTML += articleCard;
            });
        }

        // Load categories
        function loadCategories() {
            const container = document.getElementById('categories');
            
            sampleCategories.forEach(category => {
                const categoryCard = `
                    <div class="group cursor-pointer">
                        <div class="bg-gradient-to-br ${category.color} p-6 rounded-xl text-white text-center hover:shadow-lg transition-all duration-300 transform group-hover:scale-105">
                            <div class="text-3xl mb-3">${category.icon}</div>
                            <h3 class="font-bold text-lg mb-2">${category.name}</h3>
                            <p class="text-sm opacity-90">${category.count} artikel</p>
                        </div>
                    </div>
                `;
                container.innerHTML += categoryCard;
            });
        }

        // Database integration functions
        const DatabaseAPI = {
            // Fetch articles from database
            async fetchArticles(limit = 6, category = null, featured = false) {
                try {
                    const params = new URLSearchParams({
                        limit: limit,
                        ...(category && { category }),
                        ...(featured && { featured: 'true' })
                    });
                    
                    // Replace with your actual API endpoint
                    // const response = await fetch(`/api/articles?${params}`);
                    // const data = await response.json();
                    
                    // For now, return sample data
                    return {
                        success: true,
                        data: sampleArticles.slice(0, limit),
                        total: sampleArticles.length
                    };
                } catch (error) {
                    console.error('Error fetching articles:', error);
                    return { success: false, error: error.message };
                }
            },

            // Fetch categories from database
            async fetchCategories() {
                try {
                    // Replace with your actual API endpoint
                    // const response = await fetch('/api/categories');
                    // const data = await response.json();
                    
                    // For now, return sample data
                    return {
                        success: true,
                        data: sampleCategories
                    };
                } catch (error) {
                    console.error('Error fetching categories:', error);
                    return { success: false, error: error.message };
                }
            },

            // Subscribe to newsletter
            async subscribeToNewsletter(email) {
                try {
                    // Replace with your actual API endpoint
                    // const response = await fetch('/api/newsletter/subscribe', {
                    //     method: 'POST',
                    //     headers: { 'Content-Type': 'application/json' },
                    //     body: JSON.stringify({ email })
                    // });
                    // const data = await response.json();
                    
                    // For now, return success
                    return {
                        success: true,
                        message: 'Successfully subscribed to newsletter'
                    };
                } catch (error) {
                    console.error('Error subscribing to newsletter:', error);
                    return { success: false, error: error.message };
                }
            }
        };

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            loadArticles();
            loadCategories();
        });
    </script>
</x-layout>