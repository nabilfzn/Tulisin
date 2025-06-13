<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User Baru - Admin</title>
    <style>
        /* Basic styles for the body */
        body {
            font-family: 'Inter', sans-serif;
            padding: 20px;
            background-color: #f3f4f6;
        }

        /* Styles for the main container */
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Styles for the heading */
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Styles for form groups (label + input) */
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Ensures padding does not increase width */
        }

        /* Styles for the submit button */
        .btn-submit {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #218838;
        }

        /* Styles for the back button/link */
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }

        /* Styles for validation error messages */
        .error-message {
            color: #dc3545;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Tambah User Baru</h1>

        {{-- Display validation error messages if any --}}
        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form to add a new user. Action points to the 'store' route in UserController --}}
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf {{-- Required security token for all POST forms --}}

            <div class="form-group">
                <label for="name">Nama:</label>
                {{-- old('name') will repopulate the input if there was a previous validation error --}}
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                {{-- Display specific error message for 'name' field --}}
                @error('name') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                @error('password') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password:</label>
                {{-- This input will be matched against 'password' by the 'confirmed' validation rule --}}
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn-submit">Simpan User</button>
        </form>

        <a href="{{ route('admin.users.index') }}" class="btn-back">Kembali ke Daftar User</a>
    </div>
</body>
</html>
