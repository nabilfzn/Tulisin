<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Post - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; padding: 20px; background-color: #f3f4f6; }
        .container { max-width: 1000px; margin: 0 auto; background-color: white; padding: 25px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); }
        h1 { color: #333; margin-bottom: 20px; text-align: center; }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
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
        .btn-primary { background-color: #007bff; }
        .btn-primary:hover { background-color: #0056b3; }
        .btn-success { background-color: #28a745; }
        .btn-success:hover { background-color: #218838; }
        .btn-warning { background-color: #ffc107; color: #333; }
        .btn-warning:hover { background-color: #e0a800; }
        .btn-danger { background-color: #dc3545; }
        .btn-danger:hover { background-color: #c82333; }
        .table-posts { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table-posts th, .table-posts td { border: 1px solid #e2e8f0; padding: 12px 15px; text-align: left; vertical-align: top; }
        .table-posts th { background-color: #4a90e2; color: white; text-transform: uppercase; font-size: 0.9em; }
        .table-posts tr:nth-child(even) { background-color: #f9fafb; }
        .table-posts tr:hover { background-color: #e6f0fa; }
        .text-center { text-align: center; }
        .actions-cell { white-space: nowrap; }
        .button-group { margin-bottom: 20px; text-align: right; }
        .post-image {
            width: 80px;
            height: 80px;
            object-fit: cover; 
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .no-image-placeholder { 
            display: flex;
            align-items: center;
            justify-content: center;
            width: 80px;
            height: 80px;
            background-color: #e9ecef;
            color: #6c757d;
            border-radius: 4px;
            font-size: 0.8em;
            text-align: center;
            border: 1px dashed #ced4da;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Post</h1>


        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="button-group">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Tambah Post Baru</a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
        </div>

        @if($posts->isEmpty())
            <p class="text-center">Belum ada post yang ditambahkan.</p>
        @else
            <table class="table-posts">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Gambar</th> 
                        <th>Judul</th> 
                        <th>Konten</th>
                        <th>Tanggal Dibuat</th>
                        <th class="text-center">Aksi</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="post-image">
                                @else
                                    <div class="no-image-placeholder">Tidak Ada Gambar</div>
                                @endif
                            </td>
                            <td>{{ $post->judul }}</td> 
                            <td>{{ Str::limit($post->content, 100) }}</td> 
                            <td>{{ $post->created_at->format('d M Y H:i') }}</td>
                            <td class="actions-cell text-center">
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>

                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                    @csrf 
                                    @method('DELETE') 
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus post ini?');">Hapus</button>
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
