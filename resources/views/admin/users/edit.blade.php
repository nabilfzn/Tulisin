<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Gaya dasar untuk body */
        body {
            font-family: 'Inter', sans-serif;
            padding: 20px;
            background-color: #e0f2f7; /* Warna latar belakang lebih lembut */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Pastikan tinggi minimum view height */
            margin: 0;
        }

        /* Gaya untuk container utama halaman */
        .container {
            max-width: 600px;
            width: 95%; /* Lebih responsif */
            background-color: #ffffff; /* Latar putih bersih */
            padding: 30px;
            border-radius: 12px; /* Sudut lebih membulat */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); /* Bayangan lebih dalam */
            border: 1px solid #e0e0e0; /* Border tipis */
        }

        /* Gaya untuk judul halaman */
        h1 {
            color: #2c3e50; /* Warna teks gelap */
            text-align: center;
            margin-bottom: 35px;
            font-weight: 700; /* Lebih tebal */
            font-size: 2.2em; /* Ukuran font lebih besar */
            letter-spacing: -0.5px; /* Spasi antar huruf */
        }

        /* Gaya untuk grup form (label + input) */
        .form-group {
            margin-bottom: 20px; /* Spasi antar grup lebih besar */
        }
        .form-group label {
            display: block;
            margin-bottom: 8px; /* Spasi antara label dan input */
            font-weight: 600; /* Lebih tebal */
            color: #34495e; /* Warna teks label */
            font-size: 1.05em;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 12px 15px; /* Padding lebih besar */
            border: 1px solid #dcdcdc; /* Border abu-abu lembut */
            border-radius: 8px; /* Sudut membulat */
            box-sizing: border-box;
            font-size: 1em;
            color: #333;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-group input[type="text"]:focus,
        .form-group input[type="email"]:focus,
        .form-group input[type="password"]:focus {
            border-color: #3498db; /* Border biru saat fokus */
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2); /* Efek bayangan saat fokus */
            outline: none; /* Hilangkan outline default browser */
        }

        /* Gaya untuk tombol submit */
        .btn-submit {
            display: block;
            width: 100%;
            padding: 14px;
            background-color: #3498db; /* Warna biru cerah */
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.2em;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(52, 152, 219, 0.3); /* Bayangan tombol */
        }
        .btn-submit:hover {
            background-color: #2980b9; /* Warna biru lebih gelap saat hover */
            transform: translateY(-2px); /* Efek angkat saat hover */
            box-shadow: 0 6px 15px rgba(52, 152, 219, 0.4);
        }
        .btn-submit:active {
            transform: translateY(0); /* Kembali ke posisi semula saat diklik */
            box-shadow: 0 2px 5px rgba(52, 152, 219, 0.3);
        }

        /* Gaya untuk tombol kembali/link */
        .btn-back {
            display: inline-block;
            margin-top: 25px;
            padding: 10px 20px;
            background-color: #7f8c8d; /* Warna abu-abu */
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-weight: 500;
        }
        .btn-back:hover {
            background-color: #6c7a89;
            transform: translateY(-1px);
        }

        /* Gaya untuk pesan error validasi */
        .error-message {
            color: #e74c3c; /* Warna merah cerah untuk error */
            font-size: 0.9em;
            margin-top: 5px;
            font-weight: 500;
        }

        /* Gaya untuk kotak error validasi keseluruhan */
        .validation-errors {
            background-color: #fce4e4; /* Latar merah muda */
            color: #c0392b; /* Teks merah gelap */
            border: 1px solid #efb3b3; /* Border merah muda */
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-size: 0.95em;
        }
        .validation-errors ul {
            list-style: none; /* Hilangkan bullet point */
            padding: 0;
            margin: 0;
        }
        .validation-errors li {
            margin-bottom: 5px;
        }
        .validation-errors li:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit User: {{ $user->name }}</h1> {{-- Menampilkan nama user yang sedang diedit --}}

        {{-- Menampilkan pesan error validasi jika ada --}}
        @if ($errors->any())
            <div class="validation-errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form untuk mengedit user. Action mengarah ke rute 'update' di UserController dengan ID user --}}
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf {{-- Token keamanan wajib --}}
            @method('PUT') {{-- Memberitahu Laravel ini adalah request PUT untuk update --}}

            <div class="form-group">
                <label for="name">Nama:</label>
                {{-- Mengisi input dengan data user saat ini ($user->name) atau old() jika validasi gagal --}}
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password (kosongkan jika tidak ingin mengubah):</label>
                <input type="password" id="password" name="password"> {{-- Tidak required, karena boleh kosong --}}
                @error('password') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>

            <button type="submit" class="btn-submit">Perbarui User</button>
        </form>

        <a href="{{ route('admin.users.index') }}" class="btn-back">Kembali ke Daftar User</a>
    </div>
</body>
</html>
