<!-- Top Bar -->
<div class="bg-indigo-900 text-white py-2 hidden md:block">
    <div class="container mx-auto px-4 flex justify-between items-center text-xs">
        <div class="flex space-x-4">
            <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg> smpnegeri41samarinda@gmail.com</span>
            <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg> 0823-8417-9874</span>
        </div>
        <div class="flex space-x-4 uppercase tracking-widest font-bold">
            <span>Espadji TV</span>
            <span>smpn41_samarinda</span>
        </div>
    </div>
</div>

<!-- Navigation -->
<nav class="bg-white/90 backdrop-blur-md shadow-sm sticky top-0 z-50 transition-all duration-300 border-b border-gray-100" 
     x-data="{ mobileOpen: false, scrolled: false }" 
     @scroll.window="scrolled = (window.pageYOffset > 20) : true : false">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-20 transition-all duration-300" :class="scrolled ? 'h-16' : 'h-24'">
            <a href="/" class="flex items-center space-x-3 group">
                <div class="bg-white p-1 rounded-xl shadow-sm group-hover:shadow-md transition-shadow">
                    <img src="{{ asset('assets/logo.png') }}" alt="Logo SMPN 41" class="w-10 h-10 md:w-12 md:h-12 transition-all" :class="scrolled ? 'w-10 h-10' : 'w-12 h-12'">
                </div>
                <div class="hidden sm:block">
                    <span class="block text-lg font-black text-indigo-900 leading-none tracking-tight">SMPN 41</span>
                    <span class="block text-[10px] text-indigo-600 uppercase font-bold tracking-[0.2em] mt-1">Samarinda</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-1">
                <a href="/" class="px-4 py-2 rounded-full text-sm font-bold uppercase tracking-wide transition-all {{ request()->routeIs('home') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:text-indigo-600 hover:bg-gray-50' }}">
                    Beranda
                </a>
                
                <!-- Dropdown Profil -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="px-4 py-2 rounded-full text-sm font-bold uppercase tracking-wide transition-all flex items-center {{ request()->routeIs('profile', 'teachers.index', 'extracurriculars.index') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:text-indigo-600 hover:bg-gray-50' }}">
                        Profil <svg class="w-4 h-4 ml-1 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         class="absolute top-full left-0 w-56 bg-white shadow-2xl rounded-2xl border border-gray-100 py-3 mt-1 overflow-hidden"
                         style="display: none;">
                        <a href="/profil-sekolah" class="block px-6 py-2.5 text-sm font-semibold text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition">Profil Sekolah</a>
                        <a href="/guru" class="block px-6 py-2.5 text-sm font-semibold text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition">Guru & Staf</a>
                        <a href="/ekstrakurikuler" class="block px-6 py-2.5 text-sm font-semibold text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition">Ekstrakurikuler</a>
                    </div>
                </div>

                <a href="/berita" class="px-4 py-2 rounded-full text-sm font-bold uppercase tracking-wide transition-all {{ request()->routeIs('posts.*') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:text-indigo-600 hover:bg-gray-50' }}">
                    Berita
                </a>
                <a href="/galeri" class="px-4 py-2 rounded-full text-sm font-bold uppercase tracking-wide transition-all {{ request()->routeIs('gallery.*') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:text-indigo-600 hover:bg-gray-50' }}">
                    Galeri
                </a>
                <a href="/prestasi" class="px-4 py-2 rounded-full text-sm font-bold uppercase tracking-wide transition-all {{ request()->routeIs('achievements.index') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:text-indigo-600 hover:bg-gray-50' }}">
                    Prestasi
                </a>
                <a href="/download" class="px-4 py-2 rounded-full text-sm font-bold uppercase tracking-wide transition-all {{ request()->routeIs('documents.index') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:text-indigo-600 hover:bg-gray-50' }}">
                    Dokumen
                </a>
                <a href="/kontak" class="px-4 py-2 rounded-full text-sm font-bold uppercase tracking-wide transition-all {{ request()->routeIs('contact') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:text-indigo-600 hover:bg-gray-50' }}">
                    Kontak
                </a>
                
                <div class="pl-4 ml-4 border-l border-gray-200">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-6 py-2.5 text-sm font-bold text-white bg-gradient-to-r from-indigo-600 to-indigo-700 rounded-full hover:from-indigo-700 hover:to-indigo-800 transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5 group">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-2.5 text-sm font-bold text-white bg-gradient-to-r from-indigo-600 to-indigo-700 rounded-full hover:from-indigo-700 hover:to-indigo-800 transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5 group">
                            <svg class="w-4 h-4 mr-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Login
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Mobile Toggle -->
            <button @click="mobileOpen = !mobileOpen" class="lg:hidden p-2 rounded-xl bg-gray-50 text-indigo-900 transition-colors" :class="mobileOpen ? 'bg-indigo-100' : ''">
                <svg class="w-6 h-6" x-show="!mobileOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                <svg class="w-6 h-6" x-show="mobileOpen" x-cloak fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div x-show="mobileOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-x-full"
         x-transition:enter-end="opacity-100 translate-x-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-x-0"
         x-transition:leave-end="opacity-0 translate-x-full"
         class="fixed inset-0 z-[60] bg-white lg:hidden overflow-y-auto"
         style="display: none;">
        <div class="p-6">
            <div class="flex justify-between items-center mb-12">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="w-12 h-12">
                <button @click="mobileOpen = false" class="p-2 bg-gray-100 rounded-full">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <div class="flex flex-col space-y-1">
                <a href="/" class="px-4 py-4 text-2xl font-black text-indigo-900 border-b border-gray-50">Beranda</a>
                <div x-data="{ open: false }" class="border-b border-gray-50">
                    <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-4 text-2xl font-black text-indigo-900">
                        Profil <svg class="w-6 h-6 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" x-collapse class="bg-gray-50 rounded-2xl mb-2">
                        <a href="/profil-sekolah" class="block px-8 py-3 font-bold text-gray-600">Profil Sekolah</a>
                        <a href="/guru" class="block px-8 py-3 font-bold text-gray-600">Guru & Staf</a>
                        <a href="/ekstrakurikuler" class="block px-8 py-3 font-bold text-gray-600">Ekstrakurikuler</a>
                    </div>
                </div>
                <a href="/berita" class="px-4 py-4 text-2xl font-black text-indigo-900 border-b border-gray-50">Berita</a>
                <a href="/galeri" class="px-4 py-4 text-2xl font-black text-indigo-900 border-b border-gray-50">Galeri</a>
                <a href="/prestasi" class="px-4 py-4 text-2xl font-black text-indigo-900 border-b border-gray-50">Prestasi</a>
                <a href="/download" class="px-4 py-4 text-2xl font-black text-indigo-900 border-b border-gray-50">Dokumen</a>
                <a href="/kontak" class="px-4 py-4 text-2xl font-black text-indigo-900 border-b border-gray-50">Kontak</a>
            </div>

            <div class="mt-12 px-4">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center justify-center w-full px-6 py-4 text-lg font-bold text-white bg-gradient-to-r from-indigo-600 to-indigo-700 rounded-2xl shadow-lg shadow-indigo-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Dashboard Admin
                    </a>
                @else
                    <a href="{{ route('login') }}" class="flex items-center justify-center w-full px-6 py-4 text-lg font-bold text-white bg-gradient-to-r from-indigo-600 to-indigo-700 rounded-2xl shadow-lg shadow-indigo-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Login Administrator
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
