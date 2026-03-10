@extends('admin.layouts.app')

@section('title', 'Edit Dokumen')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.documents.index') }}" class="text-[10px] font-black text-slate-400 hover:text-indigo-600 transition-colors flex items-center gap-2 mb-4 uppercase tracking-[0.2em]">
        <i class="fa-solid fa-arrow-left-long text-sm"></i>
        Kembali ke Daftar
    </a>
    <h3 class="text-2xl font-black text-slate-800 tracking-tight leading-tight">Perbarui Informasi Dokumen</h3>
    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Mengubah data untuk {{ $document->title }}</p>
</div>

<div class="max-w-4xl" x-data="docForm()">
    <form action="{{ route('admin.documents.update', $document) }}" method="POST" enctype="multipart/form-data" @submit="loading = true">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Form Kiri -->
            <div class="lg:col-span-8 space-y-6">
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-[10px] font-black text-slate-700 mb-2 uppercase tracking-widest">Judul Dokumen <span class="text-rose-500">*</span></label>
                            <input type="text" name="title" value="{{ old('title', $document->title) }}" 
                                   class="w-full bg-slate-50 border-slate-100 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 py-4 px-5 border transition-all font-bold text-slate-700 placeholder:text-slate-300 @error('title') border-rose-500 @enderror" 
                                   required placeholder="Contoh: Formulir Pendaftaran Siswa Baru 2024">
                            @error('title')
                                <p class="mt-2 text-[10px] text-rose-500 font-bold uppercase tracking-widest">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-[10px] font-black text-slate-700 mb-2 uppercase tracking-widest">Keterangan Singkat</label>
                            <textarea name="description" rows="5" 
                                      class="w-full bg-slate-50 border-slate-100 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 py-4 px-5 border transition-all font-bold text-slate-700 placeholder:text-slate-300" 
                                      placeholder="Jelaskan isi atau kegunaan dari dokumen ini...">{{ old('description', $document->description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Kanan (Upload) -->
            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8 flex flex-col items-center">
                    <h4 class="text-[10px] font-black text-slate-400 mb-6 uppercase tracking-widest">Berkas Dokumen</h4>
                    
                    <div class="relative group w-full">
                        <label for="file" class="cursor-pointer block">
                            <div class="border-2 border-dashed border-slate-200 rounded-[2rem] p-8 flex flex-col items-center justify-center text-center transition-all group-hover:border-indigo-400 group-hover:bg-indigo-50/30 group-hover:scale-[1.02]">
                                <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-4 transition-all shadow-sm">
                                    <i class="fa-solid fa-file-shield text-2xl"></i>
                                </div>
                                <span class="text-[10px] font-black text-indigo-600 uppercase tracking-widest" x-text="fileName || 'Ganti Berkas'"></span>
                                <span class="text-[9px] text-slate-400 font-bold uppercase mt-2 leading-relaxed text-center">Biarkan kosong jika tidak diubah<br>Maks: 10MB</span>
                            </div>
                        </label>
                        <input type="file" name="file" id="file" class="hidden" @change="handleFileSelect">
                    </div>

                    @if($document->file)
                    <div class="mt-6 w-full p-4 bg-slate-50 rounded-2xl border border-slate-100 flex items-center gap-3">
                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-indigo-500 shadow-sm">
                            <i class="fa-solid fa-file-lines"></i>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <span class="text-[10px] font-black text-slate-700 truncate uppercase tracking-tight">Berkas Saat Ini</span>
                            <a href="{{ asset('storage/' . $document->file) }}" target="_blank" class="text-[9px] font-bold text-indigo-500 hover:underline uppercase tracking-widest">Lihat File</a>
                        </div>
                    </div>
                    @endif

                    @error('file')
                        <p class="mt-4 text-[10px] text-rose-500 font-bold uppercase tracking-widest text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bg-indigo-950 rounded-[2rem] p-8 shadow-2xl shadow-indigo-100 text-white">
                    <button type="submit" 
                            :disabled="loading"
                            class="w-full bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-4 rounded-2xl transition-all font-black text-[10px] uppercase tracking-[0.2em] flex items-center justify-center gap-3 disabled:opacity-50 disabled:cursor-not-allowed group">
                        <template x-if="!loading">
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-floppy-disk group-hover:scale-110 transition-transform text-sm"></i>
                                <span>Simpan Perubahan</span>
                            </div>
                        </template>
                        <template x-if="loading">
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-circle-notch fa-spin"></i>
                                <span>Menyimpan...</span>
                            </div>
                        </template>
                    </button>
                    
                    <a href="{{ route('admin.documents.index') }}" x-show="!loading" class="block w-full text-center mt-6 text-[9px] font-black text-indigo-400 hover:text-white transition-colors uppercase tracking-[0.2em]">
                        Batal & Kembali
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function docForm() {
    return {
        fileName: '',
        loading: false,
        handleFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                this.fileName = file.name;
            }
        }
    }
}
</script>
@endsection
