@extends('admin.layouts.app')

@section('title', 'Daftar Guru & Staf')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row justify-between items-center gap-4">
    <div>
        <h3 class="text-2xl font-black text-slate-800 tracking-tight leading-tight">Guru & Staf</h3>
        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Manajemen Sumber Daya Manusia Sekolah</p>
    </div>
    <a href="{{ route('admin.teachers.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3.5 rounded-[1.25rem] transition-all duration-200 shadow-xl shadow-indigo-100 font-black text-xs uppercase tracking-widest">
        <i class="fa-solid fa-plus text-sm"></i>
        Tambah Guru/Staf
    </a>
</div>

<div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto overflow-y-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100">
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Profil</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">NIP & Identitas</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Bidang & Jabatan</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($teachers as $teacher)
                <tr class="hover:bg-slate-50/50 transition-colors group">
                    <td class="px-8 py-6">
                        <div class="flex items-center gap-4">
                            @if($teacher->photo)
                            <img src="{{ asset('storage/' . $teacher->photo) }}" class="w-14 h-14 object-cover rounded-2xl shadow-sm border-2 border-white ring-1 ring-slate-100">
                            @else
                            <div class="w-14 h-14 bg-indigo-50 text-indigo-400 flex items-center justify-center rounded-2xl border-2 border-white ring-1 ring-slate-100 shadow-sm">
                                <i class="fa-solid fa-user-tie text-2xl"></i>
                            </div>
                            @endif
                            <div class="flex flex-col">
                                <span class="text-sm font-black text-slate-800">{{ $teacher->name }}</span>
                                <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">Guru/Staf Aktif</span>
                            </div>
                        </div>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex flex-col gap-1.5">
                            <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-slate-50 text-slate-600 rounded-xl text-[11px] font-bold border border-slate-100 shadow-sm w-fit">
                                <i class="fa-solid fa-id-card text-slate-400 text-sm"></i>
                                {{ $teacher->nip ?: 'NIP Belum Diatur' }}
                            </div>
                            @if($teacher->phone)
                            <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-green-50 text-green-600 rounded-xl text-[11px] font-bold border border-green-100 shadow-sm w-fit">
                                <i class="fa-brands fa-whatsapp text-sm"></i>
                                {{ $teacher->phone }}
                            </div>
                            @endif
                        </div>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex flex-col">
                            <span class="text-sm font-black text-indigo-600">{{ $teacher->subject ?: 'Umum' }}</span>
                            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">{{ $teacher->position ?: 'Staf Pengajar' }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-6 text-right">
                        <div class="flex justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="{{ route('admin.teachers.edit', $teacher) }}" class="w-10 h-10 flex items-center justify-center bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition-all shadow-sm">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('admin.teachers.destroy', $teacher) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data guru ini?')" class="inline-block">
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
                                <i class="fa-solid fa-users-slash text-3xl text-slate-200"></i>
                            </div>
                            <h3 class="text-sm font-black text-slate-800 uppercase tracking-widest">Belum ada data guru</h3>
                            <p class="mt-2 text-[10px] text-slate-400 font-bold uppercase tracking-widest max-w-[200px] leading-relaxed">Mulai lengkapi direktori dengan menambahkan guru atau staf pertama Anda.</p>
                            <a href="{{ route('admin.teachers.create') }}" class="mt-6 text-indigo-600 hover:text-indigo-800 font-black text-[10px] uppercase tracking-widest flex items-center gap-2">
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
    
    @if($teachers->hasPages())
    <div class="px-8 py-6 border-t border-slate-50 bg-slate-50/30">
        {{ $teachers->links() }}
    </div>
    @endif
</div>
@endsection
