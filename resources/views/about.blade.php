<x-layout>
    <style>
        :root {
            --color-accent-start: #3b82f6; /* Blue 500 */
            --color-accent-end: #8b5cf6; /* Violet 500 */
            --color-icon: #6366f1; /* Indigo 500 */
            --color-text-muted: #6b7280; /* Gray 500 */
        }
        .gradient-text {
            background: linear-gradient(90deg, var(--color-accent-start), var(--color-accent-end));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent; /* Fallback */
        }
        .icon-accent {
            color: var(--color-icon);
        }
        .team-card {
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }
        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border-color: var(--color-accent-start);
        }
    </style>

    <!-- Hero Section -->
    <section class="bg-gray-50 py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
                Membuka Wawasan Baru, <span class="gradient-text">Satu Artikel pada Satu Waktu</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
                Tulisin lahir dari keyakinan bahwa pengetahuan harus mudah diakses dan dipahami. Kami bukan hanya platform untuk membaca, tetapi sebuah ruang untuk belajar, bertanya, dan menemukan pemahaman yang lebih dalam dengan bantuan teknologi cerdas.
            </p>
        </div>
    </section>

    <!-- Our Mission, Vision, and Values -->
    <section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Misi Kami -->
                <div class="text-center">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 mx-auto mb-5">
                         <svg class="w-8 h-8 icon-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Misi Kami</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Menyajikan artikel berkualitas tinggi dan menyediakan alat bantu AI untuk membuat proses belajar menjadi lebih cepat, efektif, dan menyenangkan.
                    </p>
                </div>
                <!-- Visi Kami -->
                <div class="text-center">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 mx-auto mb-5">
                        <svg class="w-8 h-8 icon-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Visi Kami</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Menjadi platform rujukan utama di Indonesia bagi siapa saja yang haus akan pengetahuan dan ingin belajar dengan cara yang lebih cerdas.
                    </p>
                </div>
                <!-- Nilai Kami -->
                <div class="text-center">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 mx-auto mb-5">
                        <svg class="w-8 h-8 icon-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Nilai Kami</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Berpegang pada rasa ingin tahu (curiosity), kualitas konten, inovasi teknologi, dan semangat untuk berbagi ilmu.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="bg-gray-50 py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Tim di Balik Tulisin</h2>
                <p class="text-lg md:text-xl text-gray-600">Sebuah proyek dari semangat dan kolaborasi.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Team Member 1 -->
                <div class="team-card bg-white rounded-xl p-8 flex flex-col items-center text-center">
                    <img class="h-24 w-24 rounded-full object-cover mb-4" src="{{asset('storage/nabil.jpg')}}" alt="Foto Ahmad Nabil Fauzan Abdillah">
                    <h3 class="text-xl font-bold text-gray-900">Ahmad Nabil Fauzan Abdillah</h3>
                    <p class="font-semibold gradient-text mb-3">Developer</p>
                    <p class="text-gray-600">Pelajar Kelas 11 jurusan Sistem Informasi Jaringan & Aplikasi (SIJA) di SMK Telkom Sidoarjo, dengan passion pada pengembangan backend dan arsitektur sistem.</p>
                </div>

                <!-- Team Member 2 -->
                <div class="team-card bg-white rounded-xl p-8 flex flex-col items-center text-center">
                    <img class="h-24 w-24 rounded-full object-cover mb-4" src="{{asset('storage/firman.jpg')}}" alt="Foto Ahmad Nabil Fauzan Abdillah">
                    <h3 class="text-xl font-bold text-gray-900">Miftah Nur Firmansyah</h3>
                    <p class="font-semibold gradient-text mb-3">Developer</p>
                    <p class="text-gray-600">Pelajar Kelas 11 jurusan Sistem Informasi Jaringan & Aplikasi (SIJA) di SMK Telkom Sidoarjo, yang berfokus pada desain antarmuka dan pengalaman pengguna yang intuitif.</p>
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
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="{{ asset('storage/logo.png') }}" alt="" class="size-10">
                        <span class="text-2xl font-bold">Tulisin</span>
                    </div>
                        <span class="text-2xl font-bold">Tulisin</span>
                    </div>
                    <p class="text-gray-400 mb-6 max-w-md">
                        Platform untuk menemukan artikel berkualitas dan memperdalam pemahaman dengan bantuan teknologi AI cerdas.
                    </p>
                </div>
                <div>
                    <h4 class="font-semibold text-lg mb-4">Navigasi</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="/" class="hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="/posts" class="hover:text-white transition-colors">Semua Artikel</a></li>
                        <li><a href="/about" class="hover:text-white transition-colors">Tentang Kami</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                 {{-- Menggunakan tahun dinamis --}}
                <p>© {{ date('Y') }} Tulisin. Semua hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>
</x-layout>