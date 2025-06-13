<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post; // Import Model Post untuk berinteraksi dengan tabel 'posts'
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Digunakan untuk membuat slug dari judul
use Illuminate\Support\Facades\Storage; // Import Storage facade untuk mengelola file

class PostController extends Controller
{
    /**
     * Menampilkan daftar semua post.
     * Ini adalah halaman utama untuk manajemen post.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua data post dari database (tabel 'posts')
        // orderBy('created_at', 'desc') untuk mengurutkan dari yang terbaru
        $posts = Post::orderBy('created_at', 'desc')->get();

        // Mengirim data post ini ke tampilan (view) 'admin.posts.index'
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Menampilkan form kosong untuk membuat post baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Tampilkan tampilan (view) yang berisi form untuk menambah post baru
        return view('admin.posts.create');
    }

    /**
     * Menyimpan data post baru yang dikirim dari form 'create' ke database.
     * Termasuk logika upload gambar.
     *
     * @param  \Illuminate\Http\Request  $request  Objek yang berisi data dari form
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Lakukan validasi terhadap data yang diterima dari form.
        $request->validate([
            'judul' => 'required|string|max:255|unique:posts', // Judul wajib, unik di tabel posts
            'content' => 'required|string', // Konten wajib
            'image' => 'nullable|image|file|max:2048', // Gambar opsional, harus berupa gambar, file, max 2MB
        ]);

        // Buat slug dari judul. Slug adalah versi ramah URL dari judul (misal: "Judul Saya" jadi "judul-saya")
        $slug = Str::slug($request->judul);

        $imagePath = null; // Inisialisasi path gambar kosong

        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            // Simpan gambar ke folder 'post-images' di disk 'public'
            // dan dapatkan path-nya (contoh: 'post-images/namafileunik.jpg')
            $imagePath = $request->file('image')->store('post-images', 'public');
        }

        // Buat record post baru di database.
        Post::create([
            'judul' => $request->judul,
            'slug' => $slug, // Simpan slug
            'content' => $request->content,
            'image_path' => $imagePath, // Simpan path gambar ke kolom 'image_path'
            // Jika ada user_id atau author_id, bisa ditambahkan di sini,
            // contoh: 'user_id' => auth()->id(),
        ]);

        // Setelah berhasil, arahkan kembali (redirect) ke halaman daftar post
        // dan sertakan pesan sukses.
        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail satu post. (Opsional untuk CRUD dasar)
     * Kita tidak akan menggunakannya secara terpisah, biasanya detail digabung dengan halaman edit.
     *
     * @param  \App\Models\Post  $post  Objek post yang otomatis ditemukan oleh Laravel (Route Model Binding)
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // return view('admin.posts.show', compact('post'));
    }

    /**
     * Menampilkan form untuk mengedit post yang sudah ada.
     * Form ini akan diisi dengan data post yang saat ini.
     *
     * @param  \App\Models\Post  $post  Objek post yang otomatis ditemukan oleh Laravel
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // Kirim data post yang ingin diedit ke tampilan 'admin.posts.edit'
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Memperbarui data post yang sudah ada di database.
     * Data diambil dari form edit dan objek post yang dikirim melalui URL.
     * Termasuk logika update gambar (hapus lama, simpan baru).
     *
     * @param  \Illuminate\Http\Request  $request  Objek yang berisi data dari form
     * @param  \App\Models\Post  $post  Objek post yang otomatis ditemukan oleh Laravel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Lakukan validasi data yang masuk.
        $request->validate([
            // Judul harus unik, kecuali untuk post yang sedang diedit
            'judul' => 'required|string|max:255|unique:posts,judul,' . $post->id,
            'content' => 'required|string',
            'image' => 'nullable|image|file|max:2048', // Gambar opsional untuk update
        ]);

        // Buat slug baru jika judul berubah
        $slug = Str::slug($request->judul);

        $updateData = [
            'judul' => $request->judul,
            'slug' => $slug,
            'content' => $request->content,
        ];

        // Cek apakah ada file gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($post->image_path && Storage::disk('public')->exists($post->image_path)) {
                Storage::disk('public')->delete($post->image_path);
            }
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('post-images', 'public');
            $updateData['image_path'] = $imagePath;
        }
        // Jika tidak ada gambar baru diunggah, tapi kolom gambar sebelumnya ada, dan user mungkin ingin menghapusnya (jika ada checkbox "hapus gambar")
        // Untuk sederhana, jika tidak ada gambar baru, biarkan image_path yang lama.
        // Jika Anda ingin fitur hapus gambar tanpa upload baru, Anda bisa menambahkan checkbox di form edit.

        // Perbarui post dengan data yang telah disiapkan.
        $post->update($updateData); // Menggunakan method update() dari Eloquent

        // Arahkan kembali ke halaman daftar post dengan pesan sukses.
        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil diperbarui!');
    }

    /**
     * Menghapus post dari database.
     * Termasuk logika hapus gambar terkait.
     *
     * @param  \App\Models\Post  $post  Objek post yang otomatis ditemukan oleh Laravel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Hapus gambar terkait jika ada
        if ($post->image_path && Storage::disk('public')->exists($post->image_path)) {
            Storage::disk('public')->delete($post->image_path);
        }

        // Hapus post dari database.
        $post->delete();

        // Arahkan kembali ke halaman daftar post dengan pesan sukses.
        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil dihapus!');
    }
}
