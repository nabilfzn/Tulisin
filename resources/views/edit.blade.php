<h1>Edit Post</h1>
<form action="/posts/{{ $post->id }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="judul" value="{{ $post->judul }}" required><br>
    <textarea name="content" required>{{ $post->content }}</textarea><br>
    <button type="submit">Update</button>
</form>