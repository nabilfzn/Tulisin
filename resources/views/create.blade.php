<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Post</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            width: 100%;
            max-width: 500px;
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        }

        h1 {
            color: #2d3748;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
            position: relative;
        }

        h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            color: #4a5568;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-wrapper {
            position: relative;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            color: #2d3748;
            background: white;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        input[type="text"]:focus, textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
            font-family: inherit;
        }

        .file-input-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        input[type="file"] {
            position: absolute;
            left: -9999px;
            opacity: 0;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            padding: 16px 20px;
            border: 2px dashed #cbd5e0;
            border-radius: 12px;
            background: #f7fafc;
            color: #4a5568;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .file-input-label:hover {
            border-color: #667eea;
            background: #edf2f7;
            color: #667eea;
        }

        .file-input-label svg {
            width: 24px;
            height: 24px;
        }

        .file-name {
            margin-top: 8px;
            font-size: 14px;
            color: #667eea;
            font-weight: 500;
        }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 480px) {
            .form-container {
                padding: 30px 20px;
                margin: 10px;
            }

            h1 {
                font-size: 24px;
            }

            input[type="text"], textarea {
                padding: 14px 16px;
                font-size: 15px;
            }

            .submit-btn {
                padding: 14px;
                font-size: 15px;
            }
        }

        /* Animation */
        .form-container {
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-group {
            animation: fadeIn 0.6s ease-out;
            animation-fill-mode: both;
        }

        .form-group:nth-child(2) { animation-delay: 0.1s; }
        .form-group:nth-child(3) { animation-delay: 0.2s; }
        .form-group:nth-child(4) { animation-delay: 0.3s; }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Tambah Post</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="judul">Judul</label>
                <div class="input-wrapper">
                    <input type="text" id="judul" name="judul" placeholder="Masukkan judul post..." required>
                </div>
            </div>

            <div class="form-group">
                <label for="content">Konten</label>
                <div class="input-wrapper">
                    <textarea id="content" name="content" placeholder="Tulis konten post Anda di sini..." required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="image">Gambar</label>
                <div class="file-input-wrapper">
                    <input type="file" id="image" name="image" accept="image/*" onchange="updateFileName(this)">
                    <label for="image" class="file-input-label">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                            <circle cx="8.5" cy="8.5" r="1.5"/>
                            <polyline points="21,15 16,10 5,21"/>
                        </svg>
                        <span>Pilih Gambar</span>
                    </label>
                    <div id="fileName" class="file-name" style="display: none;"></div>
                </div>
            </div>

            <button type="submit" class="submit-btn">Simpan Post</button>
        </form>
    </div>

    <script>
        function updateFileName(input) {
            const fileName = document.getElementById('fileName');
            if (input.files && input.files[0]) {
                fileName.textContent = input.files[0].name;
                fileName.style.display = 'block';
            } else {
                fileName.style.display = 'none';
            }
        }

        // Form validation and submission
        document.querySelector('form').addEventListener('submit', function(e) {
            const judul = document.getElementById('judul').value.trim();
            const content = document.getElementById('content').value.trim();
            
            if (!judul) {
                e.preventDefault();
                alert('Judul harus diisi!');
                document.getElementById('judul').focus();
                return false;
            }
            
            if (!content) {
                e.preventDefault();
                alert('Konten harus diisi!');
                document.getElementById('content').focus();
                return false;
            }
            
            // Show loading state
            const submitBtn = document.querySelector('.submit-btn');
            submitBtn.innerHTML = 'Menyimpan...';
            submitBtn.disabled = true;
        });
        document.querySelectorAll('input, textarea').forEach(element => {
            element.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            element.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>