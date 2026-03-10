@extends('admin.layouts.app')

@section('title', 'Tambah Galeri Baru')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.galleries.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 transition-colors flex items-center gap-2 mb-2 w-fit">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
        Kembali ke Daftar Galeri
    </a>
    <h3 class="text-2xl font-bold text-gray-800 tracking-tight">Tambah Galeri Baru</h3>
    <p class="text-sm text-gray-500 mt-1">Buat album galeri baru dan unggah foto-foto kegiatan.</p>
</div>

<div class="max-w-5xl" x-data="galleryUpload()">
    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" @submit="loading = true">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form Kiri -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 tracking-wide uppercase text-[11px]">Judul Galeri <span class="text-rose-500">*</span></label>
                            <input type="text" name="title" value="{{ old('title') }}" 
                                   class="w-full bg-slate-50 border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 py-3 px-4 border transition-all @error('title') border-rose-500 @enderror" 
                                   required placeholder="Contoh: Perayaan HUT RI Ke-79 di Sekolah">
                            @error('title')
                                <p class="mt-2 text-xs text-rose-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 tracking-wide uppercase text-[11px]">Deskripsi Singkat</label>
                            <textarea name="description" rows="5" 
                                      class="w-full bg-slate-50 border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 py-3 px-4 border transition-all" 
                                      placeholder="Ceritakan secara singkat tentang kegiatan dalam galeri ini...">{{ old('description') }}</textarea>
                            <p class="mt-2 text-[10px] text-slate-400 font-medium uppercase tracking-wider">Opsional. Deskripsi ini akan tampil di bawah judul galeri.</p>
                        </div>
                    </div>
                </div>

                <!-- Preview Grid -->
                <template x-if="previews.length > 0">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8 animate-fadeIn">
                        <div class="flex justify-between items-center mb-6">
                            <h4 class="text-sm font-bold text-slate-800 flex items-center gap-2">
                                <i class="fa-solid fa-images text-indigo-500"></i>
                                Pratinjau Foto (<span x-text="previews.length"></span>)
                            </h4>
                            <button type="button" @click="clearPreviews()" class="text-xs font-bold text-rose-500 hover:text-rose-700 transition-colors uppercase tracking-widest">Hapus Semua</button>
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                            <template x-for="(src, index) in previews" :key="index">
                                <div class="relative aspect-square rounded-xl overflow-hidden border border-slate-100 shadow-sm group bg-slate-50">
                                    <img :src="src" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <button type="button" @click="removePreview(index)" class="bg-white/20 hover:bg-rose-500 text-white p-2 rounded-full transition-all backdrop-blur-md">
                                            <i class="fa-solid fa-trash-can text-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Form Kanan (Upload) -->
            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                    <h4 class="text-sm font-bold text-slate-800 mb-4 pb-4 border-b border-slate-50 flex items-center gap-2">
                        <i class="fa-solid fa-cloud-arrow-up text-indigo-500"></i>
                        Upload Media
                    </h4>
                    
                    <div class="relative group">
                        <input type="file" name="images[]" id="images" multiple accept="image/*"
                               @change="handleFileSelect"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        <div class="border-2 border-dashed border-slate-200 rounded-2xl p-8 flex flex-col items-center justify-center text-center transition-all group-hover:border-indigo-400 group-hover:bg-indigo-50/30">
                            <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-sm">
                                <i class="fa-solid fa-file-image text-2xl"></i>
                            </div>
                            <span class="text-sm font-bold text-indigo-600">Pilih Foto</span>
                            <span class="text-[10px] text-slate-400 font-medium uppercase mt-2 leading-relaxed">PNG, JPG up to 5MB<br>Pilih banyak sekaligus</span>
                        </div>
                    </div>

                    @error('images.*')
                        <p class="mt-2 text-xs text-rose-500 font-medium">{{ $message }}</p>
                    @enderror

                    <div class="mt-6 bg-slate-50 rounded-xl p-4 border border-slate-100">
                        <div class="flex gap-3">
                            <div class="flex-shrink-0 w-8 h-8 bg-white rounded-lg flex items-center justify-center text-indigo-500 shadow-sm">
                                <i class="fa-solid fa-lightbulb text-xs"></i>
                            </div>
                            <p class="text-[10px] text-slate-500 font-medium leading-relaxed uppercase tracking-wider">
                                Tips: Gunakan tombol Ctrl (Windows) atau Cmd (Mac) untuk memilih lebih dari satu foto sekaligus.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-indigo-900 rounded-2xl p-6 shadow-xl shadow-indigo-200 text-white">
                    <h4 class="text-sm font-bold mb-2">Siap untuk publikasi?</h4>
                    <p class="text-[11px] text-indigo-200 leading-relaxed mb-6">Pastikan semua informasi sudah benar sebelum menyimpan galeri ini.</p>
                    
                    <button type="submit" 
                            :disabled="loading"
                            class="w-full bg-white text-indigo-900 hover:bg-indigo-50 px-6 py-4 rounded-xl transition-all shadow-lg font-black text-xs uppercase tracking-[0.2em] flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                        <template x-if="!loading">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-paper-plane"></i>
                                <span>Simpan Galeri</span>
                            </div>
                        </template>
                        <template x-if="loading">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-notch fa-spin"></i>
                                <span>Sedang Menyimpan...</span>
                            </div>
                        </template>
                    </button>
                    
                    <a href="{{ route('admin.galleries.index') }}" x-show="!loading" class="block w-full text-center mt-4 text-[10px] font-bold text-indigo-300 hover:text-white transition-colors uppercase tracking-[0.2em]">
                        Batal & Kembali
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function galleryUpload() {
    return {
        previews: [],
        loading: false,
        handleFileSelect(event) {
            const files = event.target.files;
            if (!files) return;
            
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (!file.type.startsWith('image/')) continue;
                
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.previews.push(e.target.result);
                };
                reader.readAsDataURL(file);
            }
        },
        removePreview(index) {
            this.previews.splice(index, 1);
        },
        clearPreviews() {
            this.previews = [];
            document.getElementById('images').value = '';
        }
    }
}
</script>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fadeIn {
    animation: fadeIn 0.4s ease-out forwards;
}
</style>
@endsection
