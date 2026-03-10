<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - SMPN 41 Samarinda</title>
    
    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .login-gradient {
            background: radial-gradient(circle at top right, #4f46e5, transparent),
                        radial-gradient(circle at bottom left, #1e1b4b, #0f172a);
        }
    </style>
</head>
<body class="login-gradient min-h-screen flex items-center justify-center p-4 overflow-hidden relative">
    
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-[10%] left-[5%] w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-[10%] right-[5%] w-96 h-96 bg-blue-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s"></div>
    </div>

    <div class="w-full max-w-md relative z-10" data-aos="zoom-in">
        <!-- Back to Website -->
        <a href="/" class="inline-flex items-center text-indigo-300 hover:text-white mb-8 transition-colors group">
            <i class="fa-solid fa-arrow-left-long mr-2 group-hover:-translate-x-1 transition-transform"></i>
            <span class="text-sm font-bold uppercase tracking-widest">Kembali ke Beranda</span>
        </a>

        <!-- Login Card -->
        <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-black/50 overflow-hidden border border-white/10">
            <div class="p-10 md:p-12">
                <!-- Brand -->
                <div class="text-center mb-10">
                    <div class="inline-flex p-4 bg-indigo-50 rounded-[2rem] mb-6 shadow-inner">
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo SMPN 41" class="w-16 h-16 object-contain">
                    </div>
                    <h1 class="text-3xl font-black text-slate-900 tracking-tight">Admin <span class="text-indigo-600">Portal</span></h1>
                    <p class="text-slate-400 text-sm mt-2 font-medium tracking-wide">SMP NEGERI 41 SAMARINDA</p>
                </div>

                @if ($errors->any())
                    <div class="bg-rose-50 border border-rose-100 text-rose-600 p-4 rounded-2xl mb-8 flex items-start animate-fade-in">
                        <i class="fa-solid fa-circle-exclamation mt-1 mr-3"></i>
                        <ul class="text-xs font-bold leading-relaxed">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Email Address</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                                class="w-full pl-12 pr-5 py-4 bg-slate-50 border-2 border-transparent focus:border-indigo-600 focus:bg-white rounded-2xl outline-none transition-all font-bold text-slate-700 placeholder:text-slate-300"
                                placeholder="nama@email.com">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <label for="password" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Password</label>
                        </div>
                        <div class="relative group" x-data="{ show: false }">
                            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            <input :type="show ? 'text' : 'password'" name="password" id="password" required
                                class="w-full pl-12 pr-14 py-4 bg-slate-50 border-2 border-transparent focus:border-indigo-600 focus:bg-white rounded-2xl outline-none transition-all font-bold text-slate-700 placeholder:text-slate-300"
                                placeholder="••••••••">
                            <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-5 flex items-center text-slate-400 hover:text-indigo-600 transition-colors">
                                <i class="fa-solid" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-blue-700 hover:from-indigo-700 hover:to-blue-800 text-white font-black py-4 rounded-2xl shadow-xl shadow-indigo-200 transition-all hover:-translate-y-1 active:scale-[0.98] uppercase tracking-[0.2em] text-sm">
                            Masuk Sekarang
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Footer Login -->
            <div class="bg-slate-50 p-6 text-center border-t border-slate-100">
                <p class="text-xs text-slate-400 font-bold uppercase tracking-widest">
                    &copy; {{ date('Y') }} Sistem Informasi Sekolah
                </p>
            </div>
        </div>
    </div>

    <!-- AOS Script -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>
</html>
