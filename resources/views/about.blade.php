<x-layout>
    <x-slot:title>Tentang Kami</x-slot:title>

    <style>
        :root {
            --color-accent-start: #7f5af0;
            --color-accent-end: #0ea5e9;
            --color-icon: #6366f1;
            --color-text-muted: #6b7280;
        }
        .gradient-text {
            background: linear-gradient(90deg, var(--color-accent-start), var(--color-accent-end));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }
        .icon-accent {
            stroke: var(--color-icon);
            color: var(--color-icon);
        }
        article {
            border: 1px solid #e0e7ff;
            box-shadow: 0 4px 10px rgba(111, 66, 193, 0.1);
            transition: box-shadow 0.3s ease, border-color 0.3s ease;
        }
        article:hover {
            box-shadow: 0 8px 20px rgba(111, 66, 193, 0.25);
            border-color: #7f5af0;
        }
        p {
            color: var(--color-text-muted);
        }
    </style>

    <section class="bg-white min-h-screen py-16 px-6 sm:px-12 lg:px-24 flex flex-col items-center">
        <div class="max-w-5xl w-full text-center">
            <h1 class="text-5xl font-extrabold mb-6 leading-tight gradient-text">
                Dibangun Dengan Passion, Disampaikan Dengan Keunggulan
            </h1>
            <p class="text-lg max-w-3xl mx-auto mb-16">
                Kami berkomitmen untuk menciptakan pengalaman web berkualitas tinggi yang memberdayakan pengembang dan memuaskan pengguna. 
                Tim kami menggabungkan kreativitas, teknologi, dan inovasi untuk menghadirkan produk yang menonjol.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <article class="bg-white rounded-xl p-8 flex flex-col items-center text-center">
                    <svg class="w-12 h-12 mb-4 icon-accent" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" viewBox="0 0 24 24" focusable="false" >
                        <path d="M12 2L2 12h3v8h6v-6h2v6h6v-8h3z"/>
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">Misi Kami</h2>
                    <p class="leading-relaxed">
                        Memberdayakan pengembang dengan alat yang indah dan kuat untuk menyelesaikan masalah dunia nyata dengan mudah.
                    </p>
                </article>

                <article class="bg-white rounded-xl p-8 flex flex-col items-center text-center">
                    <svg class="w-12 h-12 mb-4 icon-accent" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 6v6l4 2" />
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">Visi Kami</h2>
                    <p class="leading-relaxed">
                        Menjadi sumber terkemuka untuk komponen UI inovatif dan mudah digunakan bagi komunitas pengembang di seluruh dunia.
                    </p>
                </article>

                <article class="bg-white rounded-xl p-8 flex flex-col items-center text-center">
                    <svg class="w-12 h-12 mb-4 icon-accent" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false" viewBox="0 0 24 24">
                        <path d="M12 19l7-7-7-7-7 7 7 7z" />
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">Nilai-Nilai Kami</h2>
                    <p class="leading-relaxed">
                        Kualitas, transparansi, dan pengembangan yang didorong oleh komunitas membentuk segala sesuatu yang kami ciptakan.
                    </p>
                </article>
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
</x-layout>

