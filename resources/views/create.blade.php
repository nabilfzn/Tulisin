<h1>Tambah Post</h1>
<form action="/posts" method="POST">
    @csrf
    <input type="text" name="judul" placeholder="Judul" required><br>
    <textarea name="content" placeholder="konten" required></textarea><br>
    <button type="submit">Simpan</button>
</form>
