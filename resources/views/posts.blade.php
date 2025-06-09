<x-layout>
<x-slot:title> </x-slot:title> 
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        @foreach ($posts as $post)
        <article class="py-8 max-w-screen-md border-b border-gray-300">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['judul'] }}</h2>
            <div class="text-base text-gray-500">
                <a href="#">{{ $post->user->name }}</a> | {{ $post->created_at->diffForHumans() }}
            </div>
            <p class="my-4 font-light">
                {{ Str::limit($post['content'], 150) }}
            </p>
            <a href="/posts/{{ $post['id'] }}" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a>
        </article>
        @endforeach
    </div>
</x-layout>