<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage; // Pastikan ini diimpor!

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Aturan validasi untuk gambar
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // --- Logika untuk menyimpan gambar yang diperbarui ---
        if ($request->hasFile('image')) { // Cek apakah ada file 'image' yang diunggah
            // Hapus gambar lama jika ada dan bukan gambar default (opsional tapi disarankan)
            // Asumsi: Anda menyimpan path relatif di database (misal: 'profile_images/namafile.jpg')
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }

            // Simpan gambar baru ke direktori 'profile_images' di public disk
            // store() akan mengembalikan path relatif ke file yang disimpan
            $imagePath = $request->file('image')->store('profile_images', 'public');

            // Simpan path gambar ke kolom 'image' di database
            $user->image = $imagePath;
        }
        // --- Akhir logika gambar ---

        $user->save();

        // Mengarahkan ke rute 'profile'. Pastikan rute ini ada dan mengarahkan ke tampilan profil yang benar.
        // Jika rute 'profile' adalah GET route untuk menampilkan profil, ini sudah benar.
        return redirect()->route('profile')->with('success', 'Profil berhasil diupdate.');
    }
}