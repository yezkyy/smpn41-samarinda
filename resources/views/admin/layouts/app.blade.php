<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - SMP Negeri 41 Samarinda</title>
    
    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 overflow-hidden">
    <div class="flex h-screen overflow-hidden" x-data="{ sidebarOpen: true, userMenuOpen: false }">
        
        <!-- Sidebar -->
        <aside class="relative bg-indigo-950 text-white transition-all duration-300 ease-in-out z-50 shadow-2xl" 
               :class="{ 'w-72': sidebarOpen, 'w-20': !sidebarOpen }">
            
            <!-- Logo Section -->
            <div class="h-20 flex items-center px-5 border-b border-indigo-900/50">
                <div class="flex items-center space-x-3 overflow-hidden">
                    <div class="bg-white p-1.5 rounded-xl shadow-lg flex-shrink-0">
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="w-8 h-8">
                    </div>
                    <div class="transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible w-0'">
                        <span class="block font-black text-sm tracking-wider uppercase leading-none">SMPN 41</span>
                        <span class="block text-[10px] text-indigo-400 font-bold tracking-[0.2em] mt-1">SAMARINDA</span>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-grow py-6 px-4 space-y-2 overflow-y-auto overflow-x-hidden custom-scrollbar max-h-[calc(100vh-160px)]">
                
                <p class="px-4 mb-2 text-[10px] font-black text-indigo-500 uppercase tracking-[0.2em]" x-show="sidebarOpen" x-transition>Main Menu</p>
                
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center p-3 rounded-2xl transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-indigo-300/70 hover:bg-white/5 hover:text-white' }}">
                    <div class="w-6 h-6 flex items-center justify-center mr-3 flex-shrink-0">
                        <i class="fa-solid fa-chart-pie text-lg"></i>
                    </div>
                    <span class="font-bold text-sm whitespace-nowrap tracking-wide transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible w-0'">Dashboard</span>
                </a>

                <!-- Content Group -->
                <p class="px-4 mb-2 pt-4 text-[10px] font-black text-indigo-500 uppercase tracking-[0.2em]" x-show="sidebarOpen" x-transition>Informasi</p>

                <!-- Berita -->
                <a href="{{ route('admin.posts.index') }}" 
                   class="flex items-center p-3 rounded-2xl transition-all duration-200 group {{ request()->is('admin/posts*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-indigo-300/70 hover:bg-white/5 hover:text-white' }}">
                    <div class="w-6 h-6 flex items-center justify-center mr-3 flex-shrink-0">
                        <i class="fa-solid fa-newspaper text-lg"></i>
                    </div>
                    <span class="font-bold text-sm whitespace-nowrap tracking-wide transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible w-0'">Berita & Update</span>
                </a>

                <!-- Galeri -->
                <a href="{{ route('admin.galleries.index') }}" 
                   class="flex items-center p-3 rounded-2xl transition-all duration-200 group {{ request()->is('admin/galleries*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-indigo-300/70 hover:bg-white/5 hover:text-white' }}">
                    <div class="w-6 h-6 flex items-center justify-center mr-3 flex-shrink-0">
                        <i class="fa-solid fa-images text-lg"></i>
                    </div>
                    <span class="font-bold text-sm whitespace-nowrap tracking-wide transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible w-0'">Galeri Foto</span>
                </a>

                <!-- Guru -->
                <a href="{{ route('admin.teachers.index') }}" 
                   class="flex items-center p-3 rounded-2xl transition-all duration-200 group {{ request()->is('admin/teachers*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-indigo-300/70 hover:bg-white/5 hover:text-white' }}">
                    <div class="w-6 h-6 flex items-center justify-center mr-3 flex-shrink-0">
                        <i class="fa-solid fa-user-tie text-lg"></i>
                    </div>
                    <span class="font-bold text-sm whitespace-nowrap tracking-wide transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible w-0'">Guru & Staf</span>
                </a>

                <!-- Ekstrakurikuler -->
                <a href="{{ route('admin.extracurriculars.index') }}" 
                   class="flex items-center p-3 rounded-2xl transition-all duration-200 group {{ request()->is('admin/extracurriculars*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-indigo-300/70 hover:bg-white/5 hover:text-white' }}">
                    <div class="w-6 h-6 flex items-center justify-center mr-3 flex-shrink-0">
                        <i class="fa-solid fa-basketball text-lg"></i>
                    </div>
                    <span class="font-bold text-sm whitespace-nowrap tracking-wide transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible w-0'">Ekstrakurikuler</span>
                </a>

                <!-- Prestasi -->
                <a href="{{ route('admin.achievements.index') }}" 
                   class="flex items-center p-3 rounded-2xl transition-all duration-200 group {{ request()->is('admin/achievements*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-indigo-300/70 hover:bg-white/5 hover:text-white' }}">
                    <div class="w-6 h-6 flex items-center justify-center mr-3 flex-shrink-0">
                        <i class="fa-solid fa-trophy text-lg"></i>
                    </div>
                    <span class="font-bold text-sm whitespace-nowrap tracking-wide transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible w-0'">Prestasi</span>
                </a>

                <!-- Dokumen -->
                <a href="{{ route('admin.documents.index') }}" 
                   class="flex items-center p-3 rounded-2xl transition-all duration-200 group {{ request()->is('admin/documents*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-indigo-300/70 hover:bg-white/5 hover:text-white' }}">
                    <div class="w-6 h-6 flex items-center justify-center mr-3 flex-shrink-0">
                        <i class="fa-solid fa-file-invoice text-lg"></i>
                    </div>
                    <span class="font-bold text-sm whitespace-nowrap tracking-wide transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible w-0'">Dokumen</span>
                </a>
            </nav>

            <!-- Bottom Profile / Sidebar Collapse -->
            <div class="absolute bottom-0 w-full bg-indigo-950 border-t border-indigo-900/50 p-4">
                <button @click="sidebarOpen = !sidebarOpen" 
                        class="w-full flex items-center p-3 rounded-xl hover:bg-white/5 transition-all text-indigo-400 hover:text-white">
                    <div class="w-6 h-6 flex items-center justify-center mr-3 flex-shrink-0">
                        <i class="fa-solid" :class="sidebarOpen ? 'fa-angles-left' : 'fa-angles-right'"></i>
                    </div>
                    <span class="font-bold text-xs uppercase tracking-widest transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible w-0'">Sembunyikan</span>
                </button>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col h-screen overflow-hidden">
            
            <!-- Topbar -->
            <header class="h-20 bg-white shadow-sm border-b border-slate-100 px-8 flex justify-between items-center z-40">
                <div class="flex items-center">
                    <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden mr-4 text-slate-500">
                        <i class="fa-solid fa-bars-staggered text-xl"></i>
                    </button>
                    <div class="flex flex-col">
                        <h2 class="text-xl font-black text-slate-800 leading-tight">@yield('title', 'Dashboard')</h2>
                        <div class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">Admin Management System</div>
                    </div>
                </div>

                <div class="flex items-center space-x-6">
                    <!-- User Menu -->
                    <div class="relative" x-data="{ open: false }" @click.away="open = false">
                        <button @click="open = !open" class="flex items-center group transition-all">
                            <div class="text-right mr-4 hidden sm:block">
                                <span class="block text-sm font-black text-slate-800 leading-none">{{ Auth::user()->name ?? 'Administrator' }}</span>
                                <span class="block text-[10px] text-indigo-600 font-bold uppercase tracking-wider mt-1">Super Admin</span>
                            </div>
                            <div class="relative">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Admin') }}&color=7F9CF5&background=EBF4FF" 
                                     class="w-11 h-11 rounded-2xl shadow-md group-hover:shadow-lg transition-all border-2 border-white" alt="Profile">
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></div>
                            </div>
                        </button>

                        <!-- User Dropdown -->
                        <div x-show="open" 
                             x-cloak
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 translate-y-2"
                             class="absolute right-0 mt-3 w-56 bg-white shadow-2xl rounded-[2rem] border border-slate-100 py-4 z-[60]">
                            <div class="px-6 py-2 mb-2 border-b border-slate-50 pb-4">
                                <span class="block text-xs text-slate-400 font-bold uppercase tracking-widest">Akun Anda</span>
                            </div>
                            <div class="px-4 mt-2">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center justify-center p-3 bg-rose-50 hover:bg-rose-100 text-rose-600 rounded-2xl font-black text-xs uppercase tracking-widest transition-all">
                                        <i class="fa-solid fa-power-off mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-8 custom-scrollbar">
                @if(session('success'))
                <div x-data="{ show: true }" 
                     x-show="show" 
                     x-init="setTimeout(() => show = false, 5000)"
                     x-transition
                     class="bg-indigo-600 text-white px-6 py-4 rounded-[1.5rem] shadow-xl shadow-indigo-200 flex items-center justify-between mb-8">
                    <div class="flex items-center">
                        <i class="fa-solid fa-circle-check mr-3 text-xl"></i>
                        <span class="font-bold tracking-wide">{{ session('success') }}</span>
                    </div>
                    <button @click="show = false" class="opacity-70 hover:opacity-100">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                @endif

                @if(session('error'))
                <div x-data="{ show: true }" 
                     x-show="show" 
                     x-init="setTimeout(() => show = false, 5000)"
                     x-transition
                     class="bg-rose-500 text-white px-6 py-4 rounded-[1.5rem] shadow-xl shadow-rose-200 flex items-center justify-between mb-8">
                    <div class="flex items-center">
                        <i class="fa-solid fa-circle-exclamation mr-3 text-xl"></i>
                        <span class="font-bold tracking-wide">{{ session('error') }}</span>
                    </div>
                    <button @click="show = false" class="opacity-70 hover:opacity-100">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #cbd5e1;
        }
    </style>
</body>
</html>
