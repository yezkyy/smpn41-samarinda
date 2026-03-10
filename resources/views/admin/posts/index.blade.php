@extends('admin.layouts.app')

@section('title', 'Manajemen Berita')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h3 class="text-2xl font-black text-slate-800">Daftar Berita</h3>
        <p class="text-sm text-slate-500 font-medium">Kelola semua artikel, berita, dan pengumuman sekolah.</p>
    </div>
    <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center justify-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-bold transition-all shadow-lg shadow-indigo-600/20 group">
        <i class="fa-solid fa-plus mr-2 group-hover:rotate-90 transition-transform"></i>
        Tambah Berita Baru
    </a>
</div>

<div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-100">
                    <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Informasi Berita</th>
                    <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Kategori</th>
                    <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Status</th>
                    <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Tanggal</th>
                    <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase tracking-[0.2em] text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($posts as $post)
                <tr class="hover:bg-slate-50/50 transition-colors group">
                    <td class="px-8 py-5">
                        <div class="flex items-center space-x-4">
                            <div class="relative flex-shrink-0">
                                @if($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" class="w-16 h-12 object-cover rounded-xl shadow-sm group-hover:shadow-md transition-shadow">
                                @else
                                <div class="w-16 h-12 bg-slate-100 rounded-xl flex items-center justify-center text-slate-400">
                                    <i class="fa-solid fa-image text-lg"></i>
                                </div>
                                @endif
                            </div>
                            <div class="max-w-xs md:max-w-md lg:max-w-lg">
                                <h4 class="text-sm font-black text-slate-700 line-clamp-1 group-hover:text-indigo-600 transition-colors">{{ $post->title }}</h4>
                                <p class="text-xs text-slate-400 mt-1 font-medium">Oleh: Admin Sekolah</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-8 py-5 text-sm">
                        <span class="inline-flex items-center px-3 py-1 bg-indigo-50 text-indigo-600 rounded-full text-[10px] font-black uppercase tracking-widest">
                            {{ $post->category }}
                        </span>
                    </td>
                    <td class="px-8 py-5">
                        @if($post->status == 'published')
                        <span class="inline-flex items-center text-emerald-600 text-xs font-bold">
                            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full mr-2 animate-pulse"></span>
                            Published
                        </span>
                        @else
                        <span class="inline-flex items-center text-slate-400 text-xs font-bold">
                            <span class="w-1.5 h-1.5 bg-slate-300 rounded-full mr-2"></span>
                            Draft
                        </span>
                        @endif
                    </td>
                    <td class="px-8 py-5">
                        <div class="text-xs font-bold text-slate-500 uppercase tracking-wider">
                            {{ $post->created_at->format('d M Y') }}
                        </div>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex justify-end items-center space-x-2">
                            <a href="{{ route('admin.posts.edit', $post) }}" 
                               class="w-9 h-9 flex items-center justify-center rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all shadow-sm"
                               title="Edit Berita">
                                <i class="fa-solid fa-pen-to-square text-xs"></i>
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        class="w-9 h-9 flex items-center justify-center rounded-xl bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white transition-all shadow-sm"
                                        title="Hapus Berita">
                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-8 py-20 text-center">
                        <div class="flex flex-col items-center">
                            <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center text-slate-200 mb-4">
                                <i class="fa-solid fa-newspaper text-4xl"></i>
                            </div>
                            <p class="text-slate-400 font-bold italic">Belum ada berita yang diterbitkan.</p>
                            <a href="{{ route('admin.posts.create') }}" class="mt-4 text-indigo-600 font-black text-xs uppercase tracking-widest hover:underline">Buat Berita Pertama Sekarang</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($posts->hasPages())
    <div class="px-8 py-6 bg-slate-50/50 border-t border-slate-100">
        {{ $posts->links() }}
    </div>
    @endif
</div>
@endsection
