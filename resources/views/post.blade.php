<x-layout>
<x-slot:title> {{ $title }} </x-slot:title> 

<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
<article class="py-8 max-w-screen-md ">
    <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['judul'] }}</h2>
    <div class="text-base text-gray-500">
        <a href="#">{{ $post->user->name }}</a> | {{ $post->created_at->diffForHumans() }}
    </div>
    <p class="my-4 font-light">
        {{ $post['content'] }}
    </p>
    <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back</a>
</article>
</div>
</x-layout>