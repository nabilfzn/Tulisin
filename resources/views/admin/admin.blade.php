<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body { font-family: 'Inter', sans-serif; padding: 20px; background-color: #f3f4f6; text-align: center; }
        h1 { color: #333; margin-bottom: 30px; }
        .button-link {
            display: inline-block;
            padding: 12px 25px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 1.1em;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .button-link:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Selamat Datang di Panel Admin!</h1>
    <p>Pilih menu yang ingin kamu kelola:</p>

    {{-- Tombol untuk menuju ke halaman pengelolaan user --}}
    <a href="{{ route('admin.users.index') }}" class="button-link">Kelola Data User</a>

    <!-- Kamu bisa tambahkan link ke pengelolaan post di sini nanti -->

</body>
</html>
