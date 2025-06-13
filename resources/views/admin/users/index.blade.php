<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User - Admin</title>
    <style>
        /* Gaya dasar untuk body */
        body {
            font-family: 'Inter', sans-serif;
            padding: 20px;
            background-color: #f3f4f6;
        }

        /* Gaya untuk container utama halaman */
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Gaya untuk judul halaman */
        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Gaya untuk pesan alert (sukses) */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        /* Gaya dasar untuk semua tombol */
        .btn {
            display: inline-block;
            padding: 8px 15px;
            margin-right: 5px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-size: 0.9em;
            transition: background-color 0.3s ease;
        }

        /* Gaya spesifik untuk tombol primary (biru) */
        .btn-primary { background-color: #007bff; }
        .btn-primary:hover { background-color: #0056b3; }

        /* Gaya spesifik untuk tombol success (hijau) */
        .btn-success { background-color: #28a745; }
        .btn-success:hover { background-color: #218838; }

        /* Gaya spesifik untuk tombol warning (kuning) */
        .btn-warning { background-color: #ffc107; color: #333; }
        .btn-warning:hover { background-color: #e0a800; }

        /* Gaya spesifik untuk tombol danger (merah) */
        .btn-danger { background-color: #dc3545; }
        .btn-danger:hover { background-color: #c82333; }

        /* Gaya untuk tabel daftar user */
        .table-users {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table-users th, .table-users td {
            border: 1px solid #e2e8f0;
            padding: 12px 15px;
            text-align: left;
        }
        .table-users th {
            background-color: #4a90e2;
            color: white;
            text-transform: uppercase;
            font-size: 0.9em;
        }
        .table-users tr:nth-child(even) { /* Gaya untuk baris genap */
            background-color: #f9fafb;
        }
        .table-users tr:hover { /* Gaya saat kursor di atas baris */
            background-color: #e6f0fa;
        }

        /* Gaya untuk teks di tengah */
        .text-center { text-align: center; }

        /* Mencegah tombol aksi terpecah baris */
        .actions-cell { white-space: nowrap; }

        /* Gaya untuk grup tombol di bagian atas tabel */
        .button-group {
            margin-bottom: 20px;
            text-align: right;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Daftar User</h1>

        {{-- Tampilkan pesan sukses jika tersedia (dari operasi tambah/edit/hapus) --}}
        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="button-group">
            {{-- Tombol untuk menambah user baru. Mengarah ke rute 'admin.users.create' --}}
            <a href="{{ route('admin.users.create') }}" class="btn btn-success">Tambah User Baru</a>
            {{-- Tombol untuk kembali ke dashboard admin. Mengarah ke rute 'admin.dashboard' --}}
            {{-- Jika rute 'admin.dashboard' tidak ada, kamu bisa hapus atau ganti dengan link langsung ke '/admin' --}}
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
        </div>


        @if($users->isEmpty())
            {{-- Tampilkan pesan ini jika tidak ada user terdaftar --}}
            <p class="text-center">Belum ada user yang terdaftar.</p>
        @else
            {{-- Tabel untuk menampilkan daftar user --}}
            <table class="table-users">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tanggal Daftar</th>
                        <th class="text-center">Aksi</th> {{-- Kolom untuk tombol Edit dan Hapus --}}
                    </tr>
                </thead>
                <tbody>
                    {{-- Melakukan perulangan (loop) untuk setiap user yang ada di variabel $users --}}
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- Memformat tanggal pendaftaran agar lebih mudah dibaca --}}
                            <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                            <td class="actions-cell text-center">
                                {{-- Tombol Edit: Mengarah ke form edit untuk user tertentu ($user->id) --}}
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Edit</a>

                               {{-- Form untuk tombol Hapus: Menggunakan method POST dengan @method('DELETE') karena browser tidak mendukung method DELETE langsung --}}
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                    @csrf {{-- Laravel security token (CSRF protection), wajib untuk semua form POST --}}
                                    @method('DELETE') {{-- Memberitahu Laravel bahwa ini adalah permintaan DELETE --}}
                                    {{-- Konfirmasi sebelum menghapus user --}}
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus user {{ $user->name }} ini?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
