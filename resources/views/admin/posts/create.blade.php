@extends('admin.layouts.app')

@section('title', 'Tulis Berita Baru')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center text-sm font-bold text-indigo-600 hover:text-indigo-700 transition-colors group">
        <i class="fa-solid fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
        Kembali ke Daftar Berita
    </a>
</div>

<div class="max-w-5xl">
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Main Content Area -->
            <div class="lg:col-span-8 space-y-6">
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8 md:p-10">
                    <div class="space-y-6">
                        <!-- Judul -->
                        <div class="space-y-2">
                            <label class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Judul Berita</label>
                            <input type="text" name="title" value="{{ old('title') }}" 
                                class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-indigo-600 focus:bg-white rounded-2xl outline-none transition-all font-bold text-slate-700 placeholder:text-slate-300 text-lg"
                                placeholder="Masukkan judul berita yang menarik..." required>
                        </div>

                        <!-- Konten -->
                        <div class="space-y-2">
                            <label class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Isi Konten</label>
                            <textarea name="content" rows="15" 
                                class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-indigo-600 focus:bg-white rounded-2xl outline-none transition-all font-medium text-slate-600 placeholder:text-slate-300 leading-relaxed"
                                placeholder="Tuliskan isi berita secara lengkap di sini..." required>{{ old('content') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Options -->
            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8">
                    <h4 class="text-sm font-black text-slate-800 uppercase tracking-widest mb-6 flex items-center">
                        <i class="fa-solid fa-gear mr-2 text-indigo-600"></i>
                        Pengaturan
                    </h4>
                    
                    <div class="space-y-6">
                        <!-- Kategori Custom Dropdown -->
                        <div class="space-y-2" x-data="{ 
                            open: false, 
                            value: 'Berita',
                            options: ['Berita', 'Pengumuman', 'Agenda']
                        }">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Kategori</label>
                            <input type="hidden" name="category" :value="value">
                            <div class="relative">
                                <button type="button" @click="open = !open" 
                                    class="w-full flex items-center justify-between px-4 py-3 bg-slate-50 border-2 border-transparent hover:border-indigo-100 rounded-xl transition-all text-left">
                                    <span class="font-bold text-slate-700 text-sm" x-text="value"></span>
                                    <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 transition-transform duration-300" :class="open ? 'rotate-180' : ''"></i>
                                </button>
                                
                                <div x-show="open" @click.away="open = false" x-cloak
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    class="absolute z-50 w-full mt-2 bg-white rounded-2xl shadow-2xl border border-slate-100 p-2 overflow-hidden">
                                    <template x-for="option in options" :key="option">
                                        <button type="button" @click="value = option; open = false"
                                            class="w-full flex items-center px-4 py-2.5 rounded-xl text-sm font-bold transition-all text-left group"
                                            :class="value === option ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50'">
                                            <span x-text="option"></span>
                                            <i x-show="value === option" class="fa-solid fa-check ml-auto text-[10px]"></i>
                                        </button>
                                    </template>
                                </div>
                            </div>
                        </div>

                        <!-- Status Custom Dropdown -->
                        <div class="space-y-2" x-data="{ 
                            open: false, 
                            value: 'published',
                            get label() { return this.value === 'published' ? 'Langsung Terbitkan' : 'Simpan Draft' }
                        }">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Status Publikasi</label>
                            <input type="hidden" name="status" :value="value">
                            <div class="relative">
                                <button type="button" @click="open = !open" 
                                    class="w-full flex items-center justify-between px-4 py-3 bg-slate-50 border-2 border-transparent hover:border-indigo-100 rounded-xl transition-all text-left">
                                    <span class="font-bold text-slate-700 text-sm" x-text="label"></span>
                                    <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 transition-transform duration-300" :class="open ? 'rotate-180' : ''"></i>
                                </button>
                                
                                <div x-show="open" @click.away="open = false" x-cloak
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    class="absolute z-50 w-full mt-2 bg-white rounded-2xl shadow-2xl border border-slate-100 p-2 overflow-hidden">
                                    
                                    <button type="button" @click="value = 'published'; open = false"
                                        class="w-full flex items-center px-4 py-2.5 rounded-xl text-sm font-bold transition-all text-left"
                                        :class="value === 'published' ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50'">
                                        <span>Langsung Terbitkan</span>
                                        <i x-show="value === 'published'" class="fa-solid fa-check ml-auto text-[10px]"></i>
                                    </button>

                                    <button type="button" @click="value = 'draft'; open = false"
                                        class="w-full flex items-center px-4 py-2.5 rounded-xl text-sm font-bold transition-all text-left"
                                        :class="value === 'draft' ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50'">
                                        <span>Simpan Draft</span>
                                        <i x-show="value === 'draft'" class="fa-solid fa-check ml-auto text-[10px]"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <hr class="border-slate-50">

                        <!-- Thumbnail -->
                        <div class="space-y-4" x-data="{ photoPreview: null }">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Gambar Sampul</label>
                            
                            <!-- Preview Box -->
                            <div class="relative w-full h-48 bg-slate-50 rounded-2xl overflow-hidden border-2 border-dashed border-slate-200 flex items-center justify-center group">
                                <template x-if="photoPreview">
                                    <img :src="photoPreview" class="w-full h-full object-cover">
                                </template>
                                <template x-if="!photoPreview">
                                    <div class="text-center p-6">
                                        <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-300 mb-2"></i>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Pilih Foto</p>
                                    </div>
                                </template>
                                
                                <!-- File Input Overlay -->
                                <input type="file" name="thumbnail" class="absolute inset-0 opacity-0 cursor-pointer z-10" 
                                    @change="const file = $event.target.files[0]; if (file) { const reader = new FileReader(); reader.onload = (e) => { photoPreview = e.target.result; }; reader.readAsDataURL(file); }">
                            </div>
                            <p class="text-[10px] text-slate-400 text-center italic">Format: JPG, PNG (Max. 2MB)</p>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-black py-5 rounded-2xl shadow-xl shadow-indigo-600/20 transition-all hover:-translate-y-1 active:scale-[0.98] uppercase tracking-[0.2em] text-xs">
                    <i class="fa-solid fa-paper-plane mr-2"></i>
                    Simpan Berita
                </button>
                <a href="{{ route('admin.posts.index') }}" class="block w-full text-center py-4 text-slate-400 hover:text-slate-600 font-bold text-xs uppercase tracking-widest transition-colors">
                    Batalkan
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
