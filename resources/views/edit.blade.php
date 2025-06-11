<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            width: 100%;
            max-width: 600px;
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
            background: linear-gradient(90deg, #f093fb 0%, #f5576c 50%, #4facfe 100%);
        }

        h1 {
            color: #2d3748;
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 35px;
            text-align: center;
            position: relative;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        h1::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #f093fb 0%, #f5576c 50%, #4facfe 100%);
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 28px;
            position: relative;
        }

        .form-group label {
            display: block;
            color: #4a5568;
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .input-wrapper {
            position: relative;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 18px 24px;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            font-size: 16px;
            color: #2d3748;
            background: rgba(255, 255, 255, 0.9);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: inherit;
            backdrop-filter: blur(10px);
        }

        input[type="text"]:focus, textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 1);
        }

        textarea {
            resize: vertical;
            min-height: 140px;
            font-family: inherit;
            line-height: 1.6;
        }

        /* Current Image Preview */
        .current-image {
            margin-bottom: 20px;
            text-align: center;
        }

        .current-image p {
            color: #4a5568;
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .image-preview {
            position: relative;
            display: inline-block;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .image-preview:hover {
            transform: scale(1.05);
        }

        .image-preview img {
            max-width: 250px;
            max-height: 200px;
            object-fit: cover;
            border-radius: 16px;
            display: block;
        }

        .image-preview::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 0%, rgba(102, 126, 234, 0.1) 100%);
            border-radius: 16px;
        }

        /* File Input */
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
            gap: 15px;
            padding: 18px 24px;
            border: 2px dashed #cbd5e0;
            border-radius: 16px;
            background: rgba(247, 250, 252, 0.8);
            color: #4a5568;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 600;
            backdrop-filter: blur(10px);
        }

        .file-input-label:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.05);
            color: #667eea;
            transform: translateY(-2px);
        }

        .file-input-label svg {
            width: 24px;
            height: 24px;
        }

        .file-name {
            margin-top: 10px;
            font-size: 14px;
            color: #667eea;
            font-weight: 600;
            text-align: center;
        }

        .submit-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 16px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase;
            letter-spacing: 1px;
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
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .submit-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .form-container {
                padding: 30px 24px;
                margin: 10px;
                border-radius: 20px;
            }

            h1 {
                font-size: 28px;
            }

            input[type="text"], textarea {
                padding: 16px 20px;
                font-size: 15px;
            }

            .submit-btn {
                padding: 16px;
                font-size: 15px;
            }

            .image-preview img {
                max-width: 200px;
                max-height: 150px;
            }
        }

        /* Animations */
        .form-container {
            animation: slideUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .form-group {
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: both;
        }

        .form-group:nth-child(2) { animation-delay: 0.1s; }
        .form-group:nth-child(3) { animation-delay: 0.2s; }
        .form-group:nth-child(4) { animation-delay: 0.3s; }
        .form-group:nth-child(5) { animation-delay: 0.4s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .image-preview {
            animation: imageAppear 0.8s ease-out 0.3s both;
        }

        @keyframes imageAppear {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Edit Post</h1>
        <form action="/posts/1" method="POST" enctype="multipart/form-data">
            <!-- Laravel directives: @csrf @method('PUT') -->
            
            <div class="form-group">
                <label for="judul">Judul</label>
                <div class="input-wrapper">
                    <input type="text" id="judul" name="judul" value="Contoh Judul Post" placeholder="Masukkan judul post..." required>
                </div>
            </div>

            <div class="form-group">
                <label for="content">Konten</label>
                <div class="input-wrapper">
                    <textarea id="content" name="content" placeholder="Tulis konten post Anda di sini..." required>Ini adalah contoh konten post yang akan diedit. Anda bisa mengubah teks ini sesuai kebutuhan.</textarea>
                </div>
            </div>

            <div class="form-group">
                <label>Gambar Saat Ini</label>
                <div class="current-image">
                    <p>Preview gambar saat ini:</p>
                    <div class="image-preview">
                        <img src="https://via.placeholder.com/250x200/667eea/ffffff?text=Current+Image" alt="Gambar Post">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="image">Gambar Baru (Opsional)</label>
                <div class="file-input-wrapper">
                    <input type="file" id="image" name="image" accept="image/*" onchange="updateFileName(this)">
                    <label for="image" class="file-input-label">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/>
                            <circle cx="12" cy="13" r="3"/>
                        </svg>
                        <span>Pilih Gambar Baru</span>
                    </label>
                    <div id="fileName" class="file-name" style="display: none;"></div>
                </div>
            </div>

            <button type="submit" class="submit-btn">Update Post</button>
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
            submitBtn.innerHTML = 'Memperbarui...';
            submitBtn.disabled = true;
        });

        // Add smooth focus transitions
        document.querySelectorAll('input, textarea').forEach(element => {
            element.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            element.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Image preview with enhanced hover effect
        document.querySelector('.image-preview').addEventListener('mouseenter', function() {
            this.style.filter = 'brightness(1.1) contrast(1.1)';
        });

        document.querySelector('.image-preview').addEventListener('mouseleave', function() {
            this.style.filter = 'brightness(1) contrast(1)';
        });
    </script>
</body>
</html>