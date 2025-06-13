<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // <-- BARIS INI HARUS ADA! Untuk mengimpor Model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Tambahkan ini jika kamu akan mengisi method store/update
use Illuminate\Validation\Rule; // Tambahkan ini jika kamu akan mengisi method update

class UserController extends Controller
{
    /**
     * Display a listing of the user resources.
     * Ini akan menampilkan daftar semua user dari database.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua data user dari database (tabel 'users')
        $users = User::all();

        // Mengirim data user ini ke tampilan (view) 'admin.users.index'
        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new user.
     * Saat ini kosong, perlu diisi untuk CRUD Create.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Kamu perlu mengisi ini untuk menampilkan form tambah user.
         return view('admin.users.create');
    }

    /**
     * Store a newly created user resource in storage.
     * Saat ini kosong, perlu diisi untuk CRUD Create.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Email harus unik di tabel users
            'password' => 'required|string|min:8|confirmed', // Password minimal 8 karakter dan harus dikonfirmasi
        ]);

        // Membuat user baru di database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Password harus di-hash untuk keamanan!
        ]);

        // Redirect kembali ke halaman daftar user dengan pesan sukses
        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan!');
    }

    /**
     * Display the specified user resource.
     * Saat ini kosong, biasanya tidak digunakan terpisah untuk CRUD dasar.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified user resource.
     * Saat ini kosong, perlu diisi untuk CRUD Update.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        // Temukan user berdasarkan ID. Jika tidak ditemukan, Laravel akan otomatis menampilkan error 404.
        $user = User::findOrFail($id);
        // Kirim data user yang ditemukan ke tampilan 'admin.users.edit'
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified user resource in storage.
     * Saat ini kosong, perlu diisi untuk CRUD Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        // Temukan user yang akan diperbarui.
        $user = User::findOrFail($id);

        // Validasi data yang masuk dari form.
        $request->validate([
            'name' => 'required|string|max:255',
            // Email harus unik, kecuali untuk user yang sedang diedit ($user->id)
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed', // Password opsional (nullable), bisa kosong jika tidak diubah, minimal 8 karakter dan harus dikonfirmasi
        ]);

        // Perbarui atribut nama dan email user.
        $user->name = $request->name;
        $user->email = $request->email;

        // Jika password diisi di form (tidak kosong), maka hash password baru dan perbarui.
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save(); // Simpan perubahan ke database.

        // Redirect kembali ke halaman daftar user dengan pesan sukses.
        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui!');
    }

    /**
     * Remove the specified user resource from storage.
     * Ini akan menghapus user dari database.
     *
     * @param  string  $id  ID dari user yang ingin dihapus
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified user resource from storage.
     * Saat ini kosong, perlu diisi untuk CRUD Delete.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
     {
        // Temukan user yang akan dihapus. Jika tidak ditemukan, Laravel akan menampilkan error 404.
        $user = User::findOrFail($id);
        // Hapus user dari database.
        $user->delete();

        // Redirect kembali ke halaman daftar user dengan pesan sukses.
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus!');
    }
}
