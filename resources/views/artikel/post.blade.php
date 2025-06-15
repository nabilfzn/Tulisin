<x-layout>
<x-slot:title>{{ $post->judul }} | Tulisin</x-slot:title>

<div class="bg-gray-50 font-sans antialiased">
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-12">

            <div class="lg:col-span-2">
                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-lg mb-8">
                    <nav class="mb-6">
                        <a href="/posts" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-indigo-600">
                            <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                            Kembali ke Semua Artikel
                        </a>
                    </nav>
                    <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-gray-900 mb-6">{{ $post->judul }}</h1>
                    <div class="flex items-center space-x-4 border-t border-gray-200 pt-6">
                        @php
                            $userImageUrl = $post->user->image ? asset('storage/' . $post->user->image) : 'https://ui-avatars.com/api/?name=' . urlencode($post->user->name) . '&background=EBF4FF&color=4299E1';
                        @endphp
                        <img class="h-12 w-12 rounded-full object-cover" src="{{ $userImageUrl }}" alt="{{ $post->user->name }}">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $post->user->name }}</p>
                            <p class="text-sm text-gray-500">Diterbitkan pada {{ $post->created_at->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                </div>

                <article class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->judul }}" class="w-full h-64 sm:h-96 object-cover">
                    @endif
                    <div class="p-6 sm:p-8 lg:p-12">
                        <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
                            {!! nl2br(e($post->content)) !!}
                        </div>
                    </div>
                </article>
            </div>

            <aside class="lg:col-span-1 mt-12 lg:mt-0">
                <div class="lg:sticky lg:top-8 space-y-8">

                    <!-- Fitur Chatbot AI -->
                    <div id="ai-features" class="space-y-4 rounded-2xl bg-white p-6 shadow-lg border border-gray-200">
                        <!-- Sidebar -->
                        <div class="text-center">
                            <h2 class="text-2xl font-bold text-gray-800">Tulisin <span class="text-indigo-600">AI</span></h2>
                            <p class="mt-1 text-sm text-gray-500">Ajukan pertanyaan tentang artikel ini.</p>
                        </div>
                        
                        <!-- chat -->
                        <div class="space-y-3 pt-4 border-t border-gray-200">
                            <textarea id="questionInput" rows="4" placeholder="Contoh: Apa kesimpulan utama dari artikel ini?"
                                      class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border disabled:bg-gray-100"></textarea>
                            
                            <button id="askQuestionBtn"
                                    class="inline-flex w-full justify-center items-center gap-2 rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 disabled:bg-indigo-300 disabled:cursor-not-allowed">
                                <span id="askBtnText">Tanya Sekarang</span>
                            </button>
                        </div>
                        
                        <div id="answerResult" class="mt-3 hidden rounded-lg bg-gray-50 p-4 border border-gray-200">
                        </div>
                    </div>

                </div>
            </aside>
            
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {

    const postId = '{{ $post->id }}';
    const csrfToken = '{{ csrf_token() }}';

    const askQuestionBtn = document.getElementById('askQuestionBtn');
    const askBtnText = document.getElementById('askBtnText');
    const questionInput = document.getElementById('questionInput');
    const answerResultDiv = document.getElementById('answerResult');

    //loading
    const loadingSpinner = `
        <div class="flex items-center justify-center text-sm text-gray-500">
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>Sedang berpikir...</span>
        </div>`;
    
    // eventlistener
    askQuestionBtn.addEventListener('click', handleAskQuestion);

    questionInput.addEventListener('keydown', (event) => {
        if (event.key === 'Enter' && !event.shiftKey) {
            event.preventDefault();
            handleAskQuestion();
        }
    });

    async function handleAskQuestion() {        
        const question = questionInput.value.trim();
        setLoadingState(true);

        try {
            const response = await fetch(`/posts/${postId}/ask`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify({ question: question })
            });
            const data = await response.json();

            if (!response.ok) {
                throw new Error(data.error || 'Gagal mendapatkan jawaban.');
            }

            //markdown
            answerResultDiv.innerHTML = `<div class="prose prose-sm max-w-none">${marked.parse(data.jawaban)}</div>`;
            
        } catch (error) {
            answerResultDiv.innerHTML = `<p class="text-sm text-red-600">${error.message}</p>`;

        } finally {
            setLoadingState(false);
        }
    }
    
    // fungsi disable saat sendang loading
    function setLoadingState(loading) {
        isLoading = loading;
        
        askQuestionBtn.disabled = loading;
        questionInput.disabled = loading;
        askBtnText.textContent = loading ? 'Mencari...' : 'Tanya Sekarang';
        
        if (loading) {
            answerResultDiv.classList.remove('hidden');
            answerResultDiv.innerHTML = loadingSpinner;
        }
    }
});
</script>

</x-layout>