@extends('admin.layouts.app')

@section('title', 'Tambah Prestasi')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.achievements.index') }}" class="text-[10px] font-black text-slate-400 hover:text-indigo-600 transition-colors flex items-center gap-2 mb-4 uppercase tracking-[0.2em]">
        <i class="fa-solid fa-arrow-left-long text-sm"></i>
        Kembali ke Daftar
    </a>
    <h3 class="text-2xl font-black text-slate-800 tracking-tight leading-tight">Tambah Prestasi Baru</h3>
    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Catat pencapaian gemilang terbaru sekolah</p>
</div>

<div class="max-w-5xl" x-data="achievementForm()">
    <form action="{{ route('admin.achievements.store') }}" method="POST" enctype="multipart/form-data" @submit="loading = true">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Form Kiri -->
            <div class="lg:col-span-8 space-y-6">
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8">
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="md:col-span-3">
                                <label class="block text-[10px] font-black text-slate-700 mb-2 uppercase tracking-widest">Judul Prestasi <span class="text-rose-500">*</span></label>
                                <input type="text" name="title" value="{{ old('title') }}" 
                                       class="w-full bg-slate-50 border-slate-100 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 py-4 px-5 border transition-all font-bold text-slate-700 placeholder:text-slate-300 @error('title') border-rose-500 @enderror" 
                                       required placeholder="Contoh: Juara 1 Lomba Debat Bahasa Inggris">
                                @error('title')
                                    <p class="mt-2 text-[10px] text-rose-500 font-bold uppercase tracking-widest">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-700 mb-2 uppercase tracking-widest">Tahun <span class="text-rose-500">*</span></label>
                                <input type="text" name="year" value="{{ old('year', date('Y')) }}" 
                                       class="w-full bg-slate-50 border-slate-100 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 py-4 px-5 border transition-all font-bold text-slate-700 placeholder:text-slate-300 @error('year') border-rose-500 @enderror" 
                                       required placeholder="2024">
                                @error('year')
                                    <p class="mt-2 text-[10px] text-rose-500 font-bold uppercase tracking-widest">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-[10px] font-black text-slate-700 mb-2 uppercase tracking-widest">Deskripsi Prestasi</label>
                            <textarea name="description" rows="8" 
                                      class="w-full bg-slate-50 border-slate-100 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 py-4 px-5 border transition-all font-bold text-slate-700 placeholder:text-slate-300" 
                                      placeholder="Jelaskan detail mengenai kompetisi, penyelenggara, dan siapa yang meraih prestasi ini...">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Kanan (Upload) -->
            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8 flex flex-col items-center">
                    <h4 class="text-[10px] font-black text-slate-400 mb-6 uppercase tracking-widest">Foto / Sertifikat</h4>
                    
                    <div class="relative group w-full">
                        <div class="aspect-square rounded-[2rem] overflow-hidden border-4 border-slate-50 shadow-inner bg-slate-50 ring-1 ring-slate-100 relative">
                            <template x-if="imagePreview">
                                <img :src="imagePreview" class="w-full h-full object-cover">
                            </template>
                            <template x-if="!imagePreview">
                                <div class="w-full h-full flex items-center justify-center text-slate-200">
                                    <i class="fa-solid fa-trophy text-5xl"></i>
                                </div>
                            </template>
                            
                            <label for="image" class="absolute inset-0 bg-indigo-600/60 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center text-white cursor-pointer backdrop-blur-sm">
                                <i class="fa-solid fa-cloud-arrow-up text-2xl mb-2"></i>
                                <span class="text-[9px] font-black uppercase tracking-widest">Unggah Foto</span>
                            </label>
                        </div>
                        <input type="file" name="image" id="image" class="hidden" accept="image/*" @change="previewImage">
                    </div>

                    <div class="mt-6 text-center">
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-[0.15em] leading-relaxed">Format: JPG, PNG, WEBP<br>Maksimal: 3MB</p>
                    </div>

                    @error('image')
                        <p class="mt-4 text-[10px] text-rose-500 font-bold uppercase tracking-widest text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bg-indigo-950 rounded-[2rem] p-8 shadow-2xl shadow-indigo-100 text-white">
                    <button type="submit" 
                            :disabled="loading"
                            class="w-full bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-4 rounded-2xl transition-all font-black text-[10px] uppercase tracking-[0.2em] flex items-center justify-center gap-3 disabled:opacity-50 disabled:cursor-not-allowed group">
                        <template x-if="!loading">
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-floppy-disk group-hover:scale-110 transition-transform"></i>
                                <span>Simpan Prestasi</span>
                            </div>
                        </template>
                        <template x-if="loading">
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-circle-notch fa-spin"></i>
                                <span>Menyimpan...</span>
                            </div>
                        </template>
                    </button>
                    
                    <a href="{{ route('admin.achievements.index') }}" x-show="!loading" class="block w-full text-center mt-6 text-[9px] font-black text-indigo-400 hover:text-white transition-colors uppercase tracking-[0.2em]">
                        Batal & Kembali
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function achievementForm() {
    return {
        imagePreview: null,
        loading: false,
        previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.imagePreview = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    }
}
</script>
@endsection
