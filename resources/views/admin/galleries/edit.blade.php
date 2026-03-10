@extends('admin.layouts.app')

@section('title', 'Kelola Galeri: ' . $gallery->title)

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <a href="{{ route('admin.galleries.index') }}" class="text-[11px] font-bold text-slate-400 hover:text-indigo-600 transition-colors flex items-center gap-2 mb-2 w-fit uppercase tracking-widest">
            <i class="fa-solid fa-arrow-left-long"></i>
            Kembali ke Daftar
        </a>
        <h3 class="text-2xl font-black text-slate-800 tracking-tight">Kelola Galeri</h3>
    </div>
    
    <div class="inline-flex items-center gap-3 px-5 py-2.5 bg-indigo-50 border border-indigo-100 rounded-2xl text-indigo-700 font-bold text-xs uppercase tracking-wider shadow-sm">
        <i class="fa-solid fa-images text-sm"></i>
        Total {{ count($gallery->photos) }} Foto
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8" x-data="galleryEdit()">
    
    <!-- Bagian Kiri: Informasi Galeri (4 kolom) -->
    <div class="lg:col-span-4 space-y-6">
        <div class="bg-white rounded-[2rem] shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-8">
                <h4 class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-6 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-xl bg-slate-50 flex items-center justify-center text-slate-400">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </span>
                    Informasi Galeri
                </h4>
                
                <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="space-y-6" @submit="loading = true">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class="block text-[11px] font-black text-slate-700 mb-2 uppercase tracking-wider">Judul Galeri</label>
                        <input type="text" name="title" value="{{ old('title', $gallery->title) }}" 
                               class="w-full bg-slate-50 border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 p-3.5 border transition-all font-semibold @error('title') border-rose-500 @enderror" required>
                        @error('title')
                            <p class="mt-2 text-[10px] text-rose-500 font-bold uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-[11px] font-black text-slate-700 mb-2 uppercase tracking-wider">Deskripsi Galeri</label>
                        <textarea name="description" rows="5" 
                                  class="w-full bg-slate-50 border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 p-3.5 border transition-all font-medium leading-relaxed">{{ old('description', $gallery->description) }}</textarea>
                    </div>

                    <div class="pt-6 border-t border-slate-50">
                        <label class="block text-[11px] font-black text-indigo-600 mb-4 uppercase tracking-[0.2em] flex items-center gap-2">
                            <i class="fa-solid fa-circle-plus"></i>
                            Tambah Foto Baru
                        </label>
                        
                        <div class="relative group">
                            <input type="file" name="images[]" id="images-new" multiple accept="image/*"
                                   @change="handleFileSelect"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            <div class="border-2 border-dashed border-indigo-100 rounded-2xl p-6 flex flex-col items-center justify-center text-center transition-all group-hover:border-indigo-400 group-hover:bg-indigo-50/50 bg-indigo-50/20">
                                <div class="w-12 h-12 bg-white text-indigo-600 rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform shadow-sm">
                                    <i class="fa-solid fa-cloud-arrow-up text-lg"></i>
                                </div>
                                <span class="text-[10px] font-black text-indigo-600 uppercase tracking-widest">Pilih File (Maks 5MB)</span>
                            </div>
                        </div>
                        
                        @error('images.*')
                            <p class="mt-2 text-[10px] text-rose-500 font-bold uppercase">{{ $message }}</p>
                        @enderror
                        
                        <!-- Pratinjau Foto Baru -->
                        <template x-if="previews.length > 0">
                            <div class="mt-4 space-y-3 animate-fadeIn">
                                <div class="flex justify-between items-center">
                                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Siap Upload (<span x-text="previews.length"></span>)</span>
                                    <button type="button" @click="clearPreviews()" class="text-[10px] font-bold text-rose-500 uppercase tracking-widest">Batal</button>
                                </div>
                                <div class="grid grid-cols-4 gap-2">
                                    <template x-for="(src, index) in previews" :key="index">
                                        <div class="relative aspect-square rounded-lg overflow-hidden border border-indigo-100 bg-slate-100">
                                            <img :src="src" class="w-full h-full object-cover">
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div class="pt-6">
                        <button type="submit" 
                                :disabled="loading"
                                class="w-full bg-indigo-600 text-white hover:bg-indigo-700 px-6 py-4 rounded-2xl transition-all font-black text-xs uppercase tracking-[0.2em] shadow-lg shadow-indigo-200 flex items-center justify-center gap-3 disabled:opacity-50 disabled:cursor-not-allowed">
                            <template x-if="!loading">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-floppy-disk"></i>
                                    <span>Simpan Perubahan</span>
                                </div>
                            </template>
                            <template x-if="loading">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-circle-notch fa-spin"></i>
                                    <span>Menyimpan...</span>
                                </div>
                            </template>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bagian Kanan: Grid Foto (8 kolom) -->
    <div class="lg:col-span-8 space-y-6">
        <div class="bg-white rounded-[2rem] shadow-sm border border-slate-200 overflow-hidden h-full">
            <div class="p-8">
                <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-50">
                    <h4 class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] flex items-center gap-3">
                        <span class="w-8 h-8 rounded-xl bg-slate-50 flex items-center justify-center text-slate-400">
                            <i class="fa-solid fa-grid-2"></i>
                        </span>
                        Daftar Foto Saat Ini
                    </h4>
                </div>
                
                @if(count($gallery->photos) > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($gallery->photos as $photo)
                    <div class="relative group rounded-[1.5rem] overflow-hidden shadow-sm border border-slate-100 aspect-square bg-slate-50 group">
                        <img src="{{ asset('storage/' . $photo->image) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
                        
                        <!-- Overlay Hapus -->
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col justify-end p-4">
                            <form action="{{ route('admin.galleries.photo.destroy', $photo) }}" method="POST" onsubmit="return confirm('Hapus foto ini dari galeri?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="w-full bg-rose-500 hover:bg-rose-600 text-white py-2.5 rounded-xl shadow-lg transition-all duration-200 font-bold text-[10px] uppercase tracking-widest flex items-center justify-center gap-2">
                                    <i class="fa-solid fa-trash-can"></i>
                                    Hapus Foto
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="py-24 flex flex-col items-center justify-center text-center">
                    <div class="w-24 h-24 bg-slate-50 rounded-[2rem] flex items-center justify-center mb-6 border border-slate-100 shadow-inner">
                        <i class="fa-solid fa-image-slash text-3xl text-slate-200"></i>
                    </div>
                    <h4 class="text-sm font-black text-slate-800 uppercase tracking-widest">Belum ada foto</h4>
                    <p class="text-[11px] text-slate-400 mt-2 max-w-[200px] font-bold uppercase tracking-wider leading-relaxed">Galeri ini masih kosong. Silakan unggah foto baru.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
function galleryEdit() {
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
        clearPreviews() {
            this.previews = [];
            document.getElementById('images-new').value = '';
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
