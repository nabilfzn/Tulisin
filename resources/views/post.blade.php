<x-layout>
<x-slot:title>{{ $title }}</x-slot:title> 

<div class="min-h-screen bg-gray-50">
    <!-- Article Header -->
    <div class="bg-white shadow-sm">
        <div class="mx-auto max-w-4xl px-4 py-8 sm:px-6 lg:px-8">
            <nav class="mb-6">
                <a href="/posts" class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700 transition-colors duration-200">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Back to Articles
                </a>
            </nav>
            
            <header class="text-center">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl mb-6">
                    {{ $post->judul }}
                </h1>
                
                <div class="flex items-center justify-center space-x-4 text-gray-600 mb-8">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-blue-600 flex items-center justify-center mr-3">
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
                        {{ $post->content }}
                    </div>
                </div>
                
                <!-- Article Footer -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <span class="text-sm text-gray-500">Published on</span>
                            <time class="text-sm font-medium text-gray-900">
                                {{ $post->created_at->format('F j, Y') }}
                            </time>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <!-- Share buttons (optional) -->
                            <button class="p-2 text-gray-400 hover:text-blue-600 transition-colors duration-200">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </article>

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