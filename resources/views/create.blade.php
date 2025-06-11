<h1>Tambah Post</h1>
<form action="/posts" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="judul" placeholder="Judul" required><br>
    <textarea name="content" placeholder="konten" required></textarea><br>
    <input type="file" name="image" accept="image/*"><br>
    <button type="submit">Simpan</button>
</form>