<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Tulisin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" xintegrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0V4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom animation for alert dismissal */
        @keyframes fade-in-down {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-down {
            animation: fade-in-down 0.3s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white p-8 md:p-12 rounded-xl shadow-2xl w-full max-w-md transform transition-all duration-300 hover:scale-[1.01] border border-gray-200">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-2">Daftar Akun</h1>
            <p class="text-gray-600 text-lg">Buat Akun Baru untuk Tulisin</p>
        </div>

        <hr class="mb-6 border-gray-200">

        @if(session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6 animate-fade-in-down" role="alert">
            <strong class="font-semibold">Berhasil!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
        @endif

        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6 animate-fade-in-down" role="alert">
            <strong class="font-semibold">Opps!</strong>
            <span class="block sm:inline">Ada kesalahan dalam pengisian formulir.</span>
            <ul class="mt-2 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('actionregister') }}" method="post">
            @csrf
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-semibold text-gray-700">
                    <i class="fa fa-user mr-2"></i> Username
                </label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3.5 transition duration-200 ease-in-out" placeholder="Username" required value="{{ old('name') }}">
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-semibold text-gray-700">
                    <i class="fa fa-envelope mr-2"></i> Email
                </label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3.5 transition duration-200 ease-in-out" placeholder="nama@email.com" required value="{{ old('email') }}">
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6"> <label for="password" class="block mb-2 text-sm font-semibold text-gray-700">
                    <i class="fa fa-key mr-2"></i> Password
                </label>
                <div class="relative"> <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3.5 pr-10 transition duration-200 ease-in-out" placeholder="••••••••" required>
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                        <svg id="eye-open-icon" class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <svg id="eye-closed-icon" class="h-5 w-5 text-gray-500 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.879 10.121a3 3 0 11-4.242 4.242M10.121 13.879L5.636 18.364M18.364 5.636L13.879 10.121M16.121 16.121L21 21M3 3l3.5 3.5"></path>
                        </svg>
                    </button>
                </div>
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-base px-5 py-3.5 text-center transition duration-300 ease-in-out transform hover:-translate-y-0.5 shadow-lg hover:shadow-xl">
                <i class="fa fa-user-plus mr-2"></i> Register
            </button>
            <hr class="my-6 border-gray-200">
            <p class="text-sm text-center text-gray-600">
                Sudah punya akun? <a href="/" class="font-medium text-blue-600 hover:underline hover:text-blue-800 transition duration-200">Login Disini!</a>
            </p>
        </form>
    </div>

    {{-- Script untuk menghilangkan alert setelah beberapa detik dan fungsionalitas show/hide password --}}
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // Alert dismissal functionality
            const alertElementSuccess = document.querySelector('.bg-green-100');
            if (alertElementSuccess) {
                setTimeout(() => {
                    alertElementSuccess.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    alertElementSuccess.style.opacity = '0';
                    alertElementSuccess.style.transform = 'translateY(-10px)';
                    setTimeout(() => alertElementSuccess.remove(), 500);
                }, 5000);
            }

            const alertElementError = document.querySelector('.bg-red-100');
            if (alertElementError) {
                setTimeout(() => {
                    alertElementError.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    alertElementError.style.opacity = '0';
                    alertElementError.style.transform = 'translateY(-10px)';
                    setTimeout(() => alertElementError.remove(), 500);
                }, 5000);
            }

            // Show/Hide Password functionality
            const togglePassword = document.querySelector('#togglePassword');
            const passwordInput = document.querySelector('#password');
            const eyeOpenIcon = document.querySelector('#eye-open-icon');
            const eyeClosedIcon = document.querySelector('#eye-closed-icon');

            // Ensure elements exist before adding event listener
            if (togglePassword && passwordInput && eyeOpenIcon && eyeClosedIcon) {
                togglePassword.addEventListener('click', function () {
                    // Toggle the type attribute between 'password' and 'text'
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    // Toggle icon visibility
                    if (type === 'password') {
                        eyeOpenIcon.classList.remove('hidden');
                        eyeClosedIcon.classList.add('hidden');
                    } else {
                        eyeOpenIcon.classList.add('hidden');
                        eyeClosedIcon.classList.remove('hidden');
                    }
                });
            }
        });
    </script>
</body>
</html>
