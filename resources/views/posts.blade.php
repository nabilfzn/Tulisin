<x-layout>
<x-slot:title> {{ $title }} </x-slot:title> 


@foreach ( $posts as $post )
<article class="py-8 max-w-screen-md border-b border-gray-300">
    <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['judul'] }}</h2>
    <div class="text-base text-gray-500">
        <a href="#">{{ $post['penulis'] }}</a> | 24 Oktober 2024
    </div>
    <p class="my-4 font-light">
        {{ Str::limit($post['content'], 150) }}
    </p>
    <a href="/posts/{{ $post['id'] }}" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a>
</article>
@endforeach

</x-layout>