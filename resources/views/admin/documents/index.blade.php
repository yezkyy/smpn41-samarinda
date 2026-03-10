@extends('admin.layouts.app')

@section('title', 'Manajemen Dokumen')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row justify-between items-center gap-4">
    <div>
        <h3 class="text-2xl font-black text-slate-800 tracking-tight leading-tight">Pusat Dokumen</h3>
        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Kelola berkas publik, formulir, dan unduhan sekolah</p>
    </div>
    <a href="{{ route('admin.documents.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3.5 rounded-[1.25rem] transition-all duration-200 shadow-xl shadow-indigo-100 font-black text-xs uppercase tracking-widest">
        <i class="fa-solid fa-cloud-arrow-up text-sm"></i>
        Upload Dokumen
    </a>
</div>

<div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto overflow-y-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100">
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Tipe</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Informasi Dokumen</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Keterangan</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($documents as $doc)
                <tr class="hover:bg-slate-50/50 transition-colors group">
                    <td class="px-8 py-6">
                        @php
                            $ext = pathinfo($doc->file, PATHINFO_EXTENSION);
                            $icon = 'fa-file-lines';
                            $color = 'text-slate-400 bg-slate-50';
                            
                            if(in_array($ext, ['pdf'])) { $icon = 'fa-file-pdf'; $color = 'text-rose-500 bg-rose-50'; }
                            elseif(in_array($ext, ['doc', 'docx'])) { $icon = 'fa-file-word'; $color = 'text-blue-500 bg-blue-50'; }
                            elseif(in_array($ext, ['xls', 'xlsx'])) { $icon = 'fa-file-excel'; $color = 'text-emerald-500 bg-emerald-50'; }
                            elseif(in_array($ext, ['zip', 'rar'])) { $icon = 'fa-file-zipper'; $color = 'text-amber-500 bg-amber-50'; }
                        @endphp
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center {{ $color }} border border-white shadow-sm ring-1 ring-slate-100 ring-offset-2 transition-transform group-hover:scale-110">
                            <i class="fa-solid {{ $icon }} text-xl"></i>
                        </div>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex flex-col">
                            <span class="text-sm font-black text-slate-800 tracking-tight group-hover:text-indigo-600 transition-colors">{{ $doc->title }}</span>
                            <div class="flex items-center gap-3 mt-1">
                                <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">{{ strtoupper($ext) }} File</span>
                                <span class="w-1 h-1 rounded-full bg-slate-200"></span>
                                <a href="{{ asset('storage/' . $doc->file) }}" target="_blank" class="text-[9px] font-black text-indigo-500 uppercase tracking-widest hover:underline">Download Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td class="px-8 py-6">
                        <p class="text-[11px] text-slate-500 font-medium leading-relaxed max-w-xs">{{ $doc->description ?: 'Tidak ada keterangan.' }}</p>
                    </td>
                    <td class="px-8 py-6 text-right">
                        <div class="flex justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="{{ route('admin.documents.edit', $doc) }}" class="w-10 h-10 flex items-center justify-center bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition-all shadow-sm">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('admin.documents.destroy', $doc) }}" method="POST" onsubmit="return confirm('Hapus dokumen ini?')" class="inline-block">
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
                                <i class="fa-solid fa-folder-open text-3xl text-slate-200"></i>
                            </div>
                            <h3 class="text-sm font-black text-slate-800 uppercase tracking-widest">Belum ada dokumen</h3>
                            <p class="mt-2 text-[10px] text-slate-400 font-bold uppercase tracking-widest max-w-[200px] leading-relaxed">Kelola formulir pendaftaran, brosur, atau berkas publik lainnya.</p>
                            <a href="{{ route('admin.documents.create') }}" class="mt-6 text-indigo-600 hover:text-indigo-800 font-black text-[10px] uppercase tracking-widest flex items-center gap-2">
                                Upload Sekarang
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($documents->hasPages())
    <div class="px-8 py-6 border-t border-slate-50 bg-slate-50/30">
        {{ $documents->links() }}
    </div>
    @endif
</div>
@endsection
