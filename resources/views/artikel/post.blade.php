<x-layout>
<x-slot:title>  </x-slot:title>

<div class="min-h-screen bg-gray-50 font-sans antialiased">
    <!-- Article Header -->
    <div class="bg-white shadow-sm rounded-b-xl">
        <div class="mx-auto max-w-4xl px-4 py-8 sm:px-6 lg:px-8">
            <nav class="mb-6">
                <a href="/posts" class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700 transition-colors duration-200 rounded-md p-1">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Kembali ke Semua Artikel
                </a>
            </nav>

            <header class="text-center">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl mb-6 leading-tight">
                    {{ $post->judul }}
                </h1>

                <div class="flex items-center justify-center space-x-4 text-gray-600 mb-8">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-blue-600 flex items-center justify-center mr-3 shadow-md">
                            <span class="text-sm font-medium text-white">
                                {{ substr($post->user->name, 0, 1) }}
                            </span>
                        </div>
                        <div class="text-left">
                            <p class="font-medium text-gray-900">{{ $post->user->name }}</p>
                            <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    </div>

    <!-- Article Content -->
    <div class="mx-auto max-w-4xl px-4 py-8 sm:px-6 lg:px-8">
        <article class="bg-white rounded-xl shadow-lg overflow-hidden">
            @if ($post->image)
                <div class="relative h-96 overflow-hidden">
                    <img src="{{ asset('storage/' . $post->image) }}"
                         alt="{{ $post->judul }}"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                </div>
            @endif

            <div class="p-8 lg:p-12">
                <div class="prose prose-lg max-w-none">
                    <div class="text-gray-700 leading-relaxed whitespace-pre-line text-lg">
                        {!! $post->content !!}
                    </div>
                </div>

                <!-- Article Footer -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <span class="text-sm text-gray-500">Diterbitkan pada</span>
                            <time class="text-sm font-medium text-gray-900">
                                {{ $post->created_at->format('F j, Y') }}
                            </time>
                        </div>

                        <div class="flex items-center space-x-4">
                            <!-- Share buttons (optional) -->
                            <button class="p-2 text-gray-400 hover:text-blue-600 transition-colors duration-200 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <!-- Gemini AI Features Section -->
        <div class="mt-12 p-8 bg-white rounded-xl shadow-lg border border-gray-200">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Tanya AI Tentang Artikel Ini</h2>

            <!-- Ringkasan Artikel -->
            <div class="mb-8">
                <button
                    id="getSummaryBtn"
                    class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-all duration-200 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2"
                >
                    Apa Maksud dari Artikel Ini?
                </button>
                <div id="summaryResult" class="mt-4 p-4 bg-blue-50 text-blue-800 rounded-lg border border-blue-200 hidden">
                    <p class="font-semibold mb-2">Ringkasan:</p>
                    <div id="summaryText"></div>
                    <div id="summaryLoading" class="hidden flex items-center text-sm">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Memuat ringkasan...
                    </div>
                </div>
            </div>

            <!-- Tanya Jawab -->
            <div>
                <h3 class="text-xl font-semibold mb-4 text-gray-800">Ajukan Pertanyaan Anda</h3>
                <div class="flex flex-col sm:flex-row gap-3">
                    <input
                        type="text"
                        id="questionInput"
                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm transition-all duration-200"
                        placeholder="Contoh: Apa tujuan utama penulis artikel ini?"
                    >
                    <button
                        id="askQuestionBtn"
                        class="px-6 py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition-all duration-200 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2"
                    >
                        Tanya
                    </button>
                </div>
                <div id="answerResult" class="mt-4 p-4 bg-indigo-50 text-indigo-800 rounded-lg border border-indigo-200 hidden">
                    <p class="font-semibold mb-2">Jawaban:</p>
                    <div id="answerText"></div>
                    <div id="answerLoading" class="hidden flex items-center text-sm">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Mencari jawaban...
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script> {{-- Tambahkan ini untuk marked.js --}}
        <script>
            // Debugging: Cek apakah script ini berjalan
            console.log("Script AI Artikel Dimulai.");

            // Mendapatkan ID artikel langsung dari URL
            const pathSegments = window.location.pathname.split('/');
            const postId = pathSegments[pathSegments.length - 1];
            console.log("Nilai postId dari URL:", postId);

            const csrfToken = "{{ csrf_token() }}";
            console.log("CSRF Token:", csrfToken);

            // Elemen UI untuk ringkasan
            const getSummaryBtn = document.getElementById('getSummaryBtn');
            const summaryResultDiv = document.getElementById('summaryResult');
            const summaryTextDiv = document.getElementById('summaryText');
            const summaryLoadingDiv = document.getElementById('summaryLoading');

            // Elemen UI untuk tanya jawab
            const questionInput = document.getElementById('questionInput');
            const askQuestionBtn = document.getElementById('askQuestionBtn');
            const answerResultDiv = document.getElementById('answerResult');
            const answerTextDiv = document.getElementById('answerText');
            const answerLoadingDiv = document.getElementById('answerLoading');

            // Fungsi untuk menampilkan pesan toast/notifikasi (pengganti alert)
            function showNotification(message, type = 'info') {
                const notificationContainer = document.createElement('div');
                notificationContainer.className = `fixed bottom-4 right-4 p-4 rounded-lg shadow-xl text-white ${
                    type === 'error' ? 'bg-red-600' :
                    type === 'success' ? 'bg-green-600' : 'bg-gray-800'
                } transition-all duration-300 transform translate-y-full opacity-0 z-50`;
                notificationContainer.innerText = message;
                document.body.appendChild(notificationContainer);

                // Animate in
                setTimeout(() => {
                    notificationContainer.classList.remove('translate-y-full', 'opacity-0');
                    notificationContainer.classList.add('translate-y-0', 'opacity-100');
                }, 100);

                // Animate out after 3 seconds
                setTimeout(() => {
                    notificationContainer.classList.remove('translate-y-0', 'opacity-100');
                    notificationContainer.classList.add('translate-y-full', 'opacity-0');
                    notificationContainer.addEventListener('transitionend', () => notificationContainer.remove());
                }, 3000);
            }

            // Event listener untuk tombol "Apa Maksud dari Artikel Ini?"
            getSummaryBtn.addEventListener('click', async () => {
                if (isNaN(Number(postId)) || !postId) {
                    showNotification('ID Artikel tidak valid. Fitur AI tidak dapat digunakan.', 'error');
                    console.error('Error: postId is invalid for summary request. Value:', postId);
                    return;
                }

                summaryResultDiv.classList.remove('hidden');
                summaryTextDiv.innerHTML = '';
                summaryLoadingDiv.classList.remove('hidden');

                try {
                    const response = await fetch(`/api/articles/${postId}/summary`);
                    const data = await response.json();

                    if (response.ok) {
                        // KOREKSI: Gunakan marked.parse() untuk merender Markdown menjadi HTML
                        summaryTextDiv.innerHTML = marked.parse(data.summary);
                        summaryLoadingDiv.classList.add('hidden');
                    } else {
                        summaryTextDiv.innerHTML = 'Gagal mendapatkan ringkasan: ' + (data.error || 'Terjadi kesalahan.');
                        summaryLoadingDiv.classList.add('hidden');
                        showNotification('Gagal mendapatkan ringkasan.', 'error');
                    }
                } catch (error) {
                    console.error('Error fetching summary:', error);
                    summaryTextDiv.innerHTML = 'Terjadi kesalahan jaringan atau server.';
                    summaryLoadingDiv.classList.add('hidden');
                    showNotification('Terjadi kesalahan jaringan atau server.', 'error');
                }
            });

            // Event listener untuk tombol "Tanya"
            askQuestionBtn.addEventListener('click', async () => {
                const question = questionInput.value.trim();

                if (!question) {
                    showNotification('Silakan masukkan pertanyaan Anda.', 'info');
                    return;
                }

                if (isNaN(Number(postId)) || !postId) {
                    showNotification('ID Artikel tidak valid. Fitur AI tidak dapat digunakan.', 'error');
                    console.error('Error: postId is invalid for ask question request. Value:', postId);
                    return;
                }

                answerResultDiv.classList.remove('hidden');
                answerTextDiv.innerHTML = '';
                answerLoadingDiv.classList.remove('hidden');

                try {
                    const response = await fetch(`/api/articles/${postId}/ask`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({ question: question })
                    });
                    const data = await response.json();

                    if (response.ok) {
                        // KOREKSI: Gunakan marked.parse() untuk merender Markdown menjadi HTML
                        answerTextDiv.innerHTML = marked.parse(data.answer);
                        answerLoadingDiv.classList.add('hidden');
                        questionInput.value = '';
                    } else {
                        answerTextDiv.innerHTML = 'Gagal mendapatkan jawaban: ' + (data.error || 'Terjadi kesalahan.');
                        answerLoadingDiv.classList.add('hidden');
                        showNotification('Gagal mendapatkan jawaban.', 'error');
                    }
                } catch (error) {
                    console.error('Error fetching answer:', error);
                    answerTextDiv.innerHTML = 'Terjadi kesalahan jaringan atau server.';
                    answerLoadingDiv.classList.add('hidden');
                    showNotification('Terjadi kesalahan jaringan atau server.', 'error');
                }
            });
        </script>

        <!-- Navigation -->
        <div class="mt-8 flex justify-center">
            <a href="/posts"
               class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to All Articles
            </a>
        </div>
    </div>
</div>
</x-layout>
