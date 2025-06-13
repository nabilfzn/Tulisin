<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna - Dashboard Artikel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7fafc; /* bg-gray-100 */
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        .tab-button.active {
            border-bottom-color: #4a5568; /* border-gray-700 */
            color: #2d3748; /* text-gray-800 */
            font-weight: 600;
        }
        /* Custom scrollbar for article list (optional) */
        .article-list::-webkit-scrollbar {
            width: 6px;
        }
        .article-list::-webkit-scrollbar-track {
            background: #edf2f7; /* bg-gray-200 */
            border-radius: 10px;
        }
        .article-list::-webkit-scrollbar-thumb {
            background: #a0aec0; /* bg-gray-400 */
            border-radius: 10px;
        }
        .article-list::-webkit-scrollbar-thumb:hover {
            background: #718096; /* bg-gray-500 */
        }
    </style>
</head>
<body class="text-gray-800">

  <x-navbar></x-navbar>
@auth
    <main class="container mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-700 mb-8">Profil Saya</h1>

        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            
            <div class="flex flex-col sm:flex-row items-center sm:items-start">
                <img src="https://placehold.co/120x120/E2E8F0/A0AEC0?text=Profil" alt="Foto Profil Besar" class="w-24 h-24 sm:w-32 sm:h-32 rounded-full object-cover border-4 border-indigo-200 shadow-md mb-4 sm:mb-0 sm:mr-6">
                <div class="text-center sm:text-left flex-grow">
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800">{{ auth()->user()->name }}</h2>
                    <p class="text-gray-600 text-lg">{{ auth()->user()->email }}</p>
                    <button class="text-sm text-indigo-600 bg-indigo-100 px-3 py-1 rounded-full inline-block mt-2" onclick="window.location.href='/save'">
                        Artikel Tersimpan
                    </button>
                </div>
            </div>
            
        </div>

        <div class="bg-white rounded-lg shadow-lg">
            <div class="border-b border-gray-200">
                <nav class="flex flex-wrap -mb-px px-6" aria-label="Tabs">
                    <button data-tab="informasiPribadi" class="tab-button whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none mr-8">
                        <i class="fas fa-user-edit mr-2"></i>Informasi Pribadi
                    </button>
                    <button data-tab="artikelSaya" class="tab-button active whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none mr-8">
                        <i class="fas fa-newspaper mr-2"></i>Artikel Saya
                    </button>
                </nav>
            </div>

            <div class="p-6">
                <div id="informasiPribadiContent" class="tab-content">
                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                        @csrf {{-- Tambahkan CSRF token untuk keamanan --}}
                        @method('patch') {{-- Tambahkan method spoofing untuk PATCH request --}}

                        <div>
                            <label for="fullName" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" name="name" id="fullName" value="{{ old('name', auth()->user()->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" required>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            {{-- Gunakan old() untuk mempertahankan input jika validasi gagal --}}
                            <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 sm:text-sm p-2" required>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <p class="text-xs text-gray-500">{{ auth()->user()->created_at->translatedFormat('d F Y') }}</p>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-150 ease-in-out">
                                <i class="fas fa-save mr-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>

                

                <div id="artikelSayaContent" class="tab-content active">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-semibold text-gray-700">Daftar Artikel ku</h3>
                        <a href="{{ url('/posts/create') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-150 ease-in-out inline-flex items-center">
                            <i class="fas fa-plus mr-2"></i>Tulis Artikel Baru
                        </a>
                    </div>
                    <div class="mb-4">
                        <input type="text" placeholder="Cari artikel..." class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="overflow-x-auto article-list max-h-[500px]">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Artikel</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            @foreach ( $posts as $post )
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $post['judul'] }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                        <a href="/posts/{{ $post['id'] }}/edit" class="text-indigo-600 hover:text-indigo-900" title="Edit"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" title="Hapus" style="background: none; border: none; padding: 0; cursor: pointer;">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
    
            </div>
        </div>
    </main>
@endauth

    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; <span id="currentYear"></span> Website Artikel. Semua Hak Cipta Dilindungi.</p>
            <p class="text-sm text-gray-400 mt-1">Dibuat dengan <i class="fas fa-heart text-red-500"></i> untuk Para Penulis</p>
        </div>
    </footer>

    <script>
        // User Menu Dropdown
        const userMenuButton = document.getElementById('userMenuButton');
        const userMenuDropdown = document.getElementById('userMenuDropdown');

        if (userMenuButton) {
            userMenuButton.addEventListener('click', () => {
                userMenuDropdown.classList.toggle('hidden');
            });
        }
        // Close dropdown if clicked outside
        document.addEventListener('click', (event) => {
            if (userMenuButton && userMenuDropdown && !userMenuButton.contains(event.target) && !userMenuDropdown.contains(event.target)) {
                userMenuDropdown.classList.add('hidden');
            }
        });

        // Mobile Menu
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }


        // Tab Functionality
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons and contents
                tabButtons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.setAttribute('aria-selected', 'false');
                });
                tabContents.forEach(content => {
                    content.classList.remove('active');
                });

                // Add active class to clicked button and corresponding content
                button.classList.add('active');
                button.setAttribute('aria-selected', 'true');
                const tabId = button.dataset.tab;
                document.getElementById(tabId + 'Content').classList.add('active');
            });
        });

        // Set current year in footer
        document.getElementById('currentYear').textContent = new Date().getFullYear();
    </script>

</body>
</html>
