@extends('admin.layouts.app')

@section('title', 'Daftar Prestasi')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row justify-between items-center gap-4">
    <div>
        <h3 class="text-2xl font-black text-slate-800 tracking-tight leading-tight">Prestasi Sekolah</h3>
        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Dokumentasi capaian dan penghargaan siswa & sekolah</p>
    </div>
    <a href="{{ route('admin.achievements.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3.5 rounded-[1.25rem] transition-all duration-200 shadow-xl shadow-indigo-100 font-black text-xs uppercase tracking-widest">
        <i class="fa-solid fa-trophy text-sm"></i>
        Tambah Prestasi
    </a>
</div>

<div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto overflow-y-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100">
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Visual</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Tahun</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Pencapaian</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($achievements as $achievement)
                <tr class="hover:bg-slate-50/50 transition-colors group">
                    <td class="px-8 py-6">
                        @if($achievement->image)
                        <img src="{{ asset('storage/' . $achievement->image) }}" class="w-20 h-14 object-cover rounded-xl shadow-sm border-2 border-white ring-1 ring-slate-100">
                        @else
                        <div class="w-20 h-14 bg-slate-100 text-slate-300 flex items-center justify-center rounded-xl border-2 border-white ring-1 ring-slate-100 shadow-sm">
                            <i class="fa-solid fa-award text-xl"></i>
                        </div>
                        @endif
                    </td>
                    <td class="px-8 py-6">
                        <span class="inline-flex items-center px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg text-xs font-black tracking-widest">{{ $achievement->year }}</span>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex flex-col">
                            <span class="text-sm font-black text-slate-800 tracking-tight">{{ $achievement->title }}</span>
                            <p class="text-[11px] text-slate-500 font-medium leading-relaxed mt-1 max-w-sm">{{ Str::limit($achievement->description, 100) }}</p>
                        </div>
                    </td>
                    <td class="px-8 py-6 text-right">
                        <div class="flex justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="{{ route('admin.achievements.edit', $achievement) }}" class="w-10 h-10 flex items-center justify-center bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition-all shadow-sm">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('admin.achievements.destroy', $achievement) }}" method="POST" onsubmit="return confirm('Hapus data prestasi ini?')" class="inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" class="w-10 h-10 flex items-center justify-center bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition-all shadow-sm">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-8 py-24">
                        <div class="flex flex-col items-center justify-center text-center">
                            <div class="w-20 h-20 bg-slate-50 rounded-[2.5rem] flex items-center justify-center mb-6 shadow-inner border border-slate-100">
                                <i class="fa-solid fa-award text-3xl text-slate-200"></i>
                            </div>
                            <h3 class="text-sm font-black text-slate-800 uppercase tracking-widest">Belum ada data prestasi</h3>
                            <p class="mt-2 text-[10px] text-slate-400 font-bold uppercase tracking-widest max-w-[200px] leading-relaxed">Mulai dokumentasikan prestasi gemilang siswa dan sekolah.</p>
                            <a href="{{ route('admin.achievements.create') }}" class="mt-6 text-indigo-600 hover:text-indigo-800 font-black text-[10px] uppercase tracking-widest flex items-center gap-2">
                                Tambah Sekarang
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($achievements->hasPages())
    <div class="px-8 py-6 border-t border-slate-50 bg-slate-50/30">
        {{ $achievements->links() }}
    </div>
    @endif
</div>
@endsection
