@extends('admin.layouts.app')

@section('title', 'Dashboard Overview')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <!-- Berita -->
    <div class="group bg-white rounded-[2rem] shadow-sm hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 p-8 border border-slate-100">
        <div class="flex items-center justify-between mb-6">
            <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                <i class="fa-solid fa-newspaper text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Total Berita</p>
                <p class="text-3xl font-black text-slate-800 leading-none mt-1">{{ $stats['posts'] }}</p>
            </div>
        </div>
        <a href="{{ route('admin.posts.index') }}" class="flex items-center text-blue-600 text-xs font-black uppercase tracking-widest group/link">
            Kelola Berita 
            <i class="fa-solid fa-arrow-right ml-2 group-hover/link:translate-x-1 transition-transform"></i>
        </a>
    </div>

    <!-- Guru -->
    <div class="group bg-white rounded-[2rem] shadow-sm hover:shadow-xl hover:shadow-emerald-500/10 transition-all duration-300 p-8 border border-slate-100">
        <div class="flex items-center justify-between mb-6">
            <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                <i class="fa-solid fa-user-tie text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Total Guru</p>
                <p class="text-3xl font-black text-slate-800 leading-none mt-1">{{ $stats['teachers'] }}</p>
            </div>
        </div>
        <a href="{{ route('admin.teachers.index') }}" class="flex items-center text-emerald-600 text-xs font-black uppercase tracking-widest group/link">
            Kelola Data Guru 
            <i class="fa-solid fa-arrow-right ml-2 group-hover/link:translate-x-1 transition-transform"></i>
        </a>
    </div>

    <!-- Galeri -->
    <div class="group bg-white rounded-[2rem] shadow-sm hover:shadow-xl hover:shadow-purple-500/10 transition-all duration-300 p-8 border border-slate-100">
        <div class="flex items-center justify-between mb-6">
            <div class="w-14 h-14 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300">
                <i class="fa-solid fa-images text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Total Galeri</p>
                <p class="text-3xl font-black text-slate-800 leading-none mt-1">{{ $stats['galleries'] }}</p>
            </div>
        </div>
        <a href="{{ route('admin.galleries.index') }}" class="flex items-center text-purple-600 text-xs font-black uppercase tracking-widest group/link">
            Kelola Galeri 
            <i class="fa-solid fa-arrow-right ml-2 group-hover/link:translate-x-1 transition-transform"></i>
        </a>
    </div>
</div>

<!-- Welcome Message -->
<div class="mt-12 relative overflow-hidden bg-indigo-900 rounded-[3rem] p-12 text-white shadow-2xl shadow-indigo-200">
    <!-- Abstract Pattern -->
    <div class="absolute top-0 right-0 p-12 opacity-10">
        <i class="fa-solid fa-school text-[12rem] rotate-12"></i>
    </div>
    
    <div class="relative z-10 max-w-2xl">
        <h3 class="text-3xl font-black mb-6 leading-tight">Halo, Selamat Datang Kembali! 👋</h3>
        <p class="text-indigo-100 text-lg leading-relaxed mb-8 opacity-80 font-medium">
            Gunakan menu di samping kiri untuk mengelola konten website SMP Negeri 41 Samarinda. 
            Semua perubahan yang Anda buat akan langsung tampil di halaman depan website.
        </p>
        <div class="flex flex-wrap gap-4">
            <a href="/" target="_blank" class="px-6 py-3 bg-white text-indigo-900 rounded-2xl font-black text-sm uppercase tracking-widest hover:shadow-xl transition-all">
                <i class="fa-solid fa-globe mr-2"></i> Lihat Website
            </a>
            <a href="{{ route('admin.posts.create') }}" class="px-6 py-3 bg-indigo-600/50 text-white border border-indigo-400/30 backdrop-blur-md rounded-2xl font-black text-sm uppercase tracking-widest hover:bg-indigo-600 transition-all">
                <i class="fa-solid fa-plus mr-2"></i> Tulis Berita Baru
            </a>
        </div>
    </div>
</div>
@endsection
