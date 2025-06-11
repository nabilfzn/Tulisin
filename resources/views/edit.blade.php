<h1>Edit Post</h1>
<form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="judul" value="{{ $post->judul }}" required><br>
    <textarea name="content" required>{{ $post->content }}</textarea><br>

    @if($post->image)
        <p>Gambar saat ini:</p>
        <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar Post" style="max-width: 200px;"><br>
    @endif

    <input type="file" name="image" accept="image/*"><br>
    <button type="submit">Update</button>
</form>