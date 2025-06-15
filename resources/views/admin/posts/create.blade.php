<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Post Baru - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; padding: 20px; background-color: #e0f2f7; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .container { max-width: 600px; width: 95%; background-color: white; padding: 30px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); border: 1px solid #e0e0e0; }
        h1 { color: #2c3e50; text-align: center; margin-bottom: 35px; font-weight: 700; font-size: 2.2em; letter-spacing: -0.5px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #34495e; font-size: 1.05em; }
        .form-group input[type="text"],
        .form-group input[type="file"], 
        .form-group textarea { 
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #dcdcdc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1em;
            color: #333;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-group input[type="file"] {
            padding-top: 8px;
            padding-bottom: 8px;
        }
        .form-group textarea {
            min-height: 150px; 
            resize: vertical;
        }
        .form-group input[type="text"]:focus,
        .form-group input[type="file"]:focus, 
        .form-group textarea:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
            outline: none;
        }
        .btn-submit {
            display: block;
            width: 100%;
            padding: 14px;
            background-color: #2ecc71; 
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.2em;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(46, 204, 113, 0.3);
        }
        .btn-submit:hover { background-color: #27ae60; transform: translateY(-2px); box-shadow: 0 6px 15px rgba(46, 204, 113, 0.4); }
        .btn-submit:active { transform: translateY(0); box-shadow: 0 2px 5px rgba(46, 204, 113, 0.3); }
        .btn-back {
            display: inline-block;
            margin-top: 25px;
            padding: 10px 20px;
            background-color: #7f8c8d;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-weight: 500;
        }
        .btn-back:hover { background-color: #6c7a89; transform: translateY(-1px); }
        .error-message { color: #e74c3c; font-size: 0.9em; margin-top: 5px; font-weight: 500; }
        .validation-errors {
            background-color: #fce4e4; color: #c0392b; border: 1px solid #efb3b3; padding: 15px; border-radius: 8px; margin-bottom: 25px; font-size: 0.95em;
        }
        .validation-errors ul { list-style: none; padding: 0; margin: 0; }
        .validation-errors li { margin-bottom: 5px; }
        .validation-errors li:last-child { margin-bottom: 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Post Baru</h1>

        
        @if ($errors->any())
            <div class="validation-errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf 

            <div class="form-group">
                <label for="judul">Judul Post:</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul') }}" required>
                @error('judul') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="image">Gambar Post (Opsional):</label>
                <input type="file" id="image" name="image" accept="image/*"> 
                @error('image') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="content">Konten Post:</label>
                <textarea id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
                @error('content') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn-submit">Simpan Post</button>
        </form>

        <a href="{{ route('admin.posts.index') }}" class="btn-back">Kembali ke Daftar Post</a>
    </div>
</body>
</html>
