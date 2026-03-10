@extends('admin.layouts.app')

@section('title', 'Tambah Guru/Staf')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.teachers.index') }}" class="text-[10px] font-black text-slate-400 hover:text-indigo-600 transition-colors flex items-center gap-2 mb-4 uppercase tracking-[0.2em]">
        <i class="fa-solid fa-arrow-left-long text-sm"></i>
        Kembali ke Daftar
    </a>
    <h3 class="text-2xl font-black text-slate-800 tracking-tight leading-tight">Tambah Personel Baru</h3>
    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Lengkapi informasi biodata guru atau staf sekolah</p>
</div>

<div class="max-w-6xl" x-data="teacherForm()">
    <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data" @submit="loading = true">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Form Kiri -->
            <div class="lg:col-span-8 space-y-6">
                <!-- Data Pribadi -->
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8">
                    <h4 class="text-xs font-black text-slate-800 uppercase tracking-widest mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-user text-indigo-500"></i>
                        Data Pribadi
                    </h4>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-[10px] font-black text-slate-700 mb-2 uppercase tracking-widest">Nama Lengkap <span class="text-rose-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" 
                                   class="w-full bg-slate-50 border-slate-100 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 py-4 px-5 border transition-all font-bold text-slate-700 placeholder:text-slate-300 @error('name') border-rose-500 @enderror" 
                                   required placeholder="Contoh: Wiwiek Herlinda, S.Pd, M.Pd">
                            @error('name')
                                <p class="mt-2 text-[10px] text-rose-500 font-bold uppercase tracking-widest">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-[10px] font-black text-slate-700 mb-2 uppercase tracking-widest">Tempat, Tanggal Lahir</label>
                                <input type="text" name="birth_place_date" value="{{ old('birth_place_date') }}" 
                                       class="w-full bg-slate-50 border-slate-100 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 py-4 px-5 border transition-all font-bold text-slate-700 placeholder:text-slate-300" 
                                       placeholder="Contoh: Samarinda, 2 Oktober 1978">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-700 mb-2 uppercase tracking-widest">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" 
                                       class="w-full bg-slate-50 border-slate-100 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 py-4 px-5 border transition-all font-bold text-slate-700 placeholder:text-slate-300 @error('email') border-rose-500 @enderror" 
                                       placeholder="Contoh: wiwiek@guru.smp.belajar.id">
                                @error('email')
                                    <p class="mt-2 text-[10px] text-rose-500 font-bold uppercase tracking-widest">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-[10px] font-black text-slate-700 mb-2 uppercase tracking-widest">No. HP / WA</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" 
                                       class="w-full bg-slate-50 border-slate-100 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 py-4 px-5 border transition-all font-bold text-slate-700 placeholder:text-slate-300" 
                                       placeholder="Contoh: 0812-3456-7890">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-700 mb-2 uppercase tracking-widest">Media Sosial</label>
                                <input type="text" name="social_media" value="{{ old('social_media') }}" 
                                       class="w-full bg-slate-50 border-slate-100 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 py-4 px-5 border transition-all font-bold text-slate-700 placeholder:text-slate-300" 
                                       placeholder="Instagram: @username, FB: Name">
                            </div>
                        </div>

                        <div>
                            <label class="block text-[10px] font-black text-slate-700 mb-2 uppercase tracking-widest">Alamat Lengkap</label>
                            <textarea name="address" rows="3" 
                                      class="w-full bg-slate-50 border-slate-100 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 py-4 px-5 border transition-all font-bold text-slate-700 placeholder:text-slate-300">{{ old('address') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Kepegawaian & Riwayat -->
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8">
                    <h4 class="text-xs font-black text-slate-800 uppercase tracking-widest mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-briefcase text-indigo-500"></i>
                        Kepegawaian & Riwayat
                    </h4>
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-[10px] font-black text-slate-700 mb-2 uppercase tracking-widest">NIP</label>
                                <input type="text" name="nip" value="{{ old('nip') }}" 
                                       class="w-full bg-slate-50 border-slate-100 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 py-4 px-5 border transition-all font-bold text-slate-700 placeholder:text-slate-300" 
                                       placeholder="NIP Pegawai">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-700 mb-2 uppercase tracking-widest">Mata Pelajaran</label>
                                <input type="text" name="subject" value="{{ old('subject') }}" 
                                       class="w-full bg-slate-50 border-slate-100 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 py-4 px-5 border transition-all font-bold text-slate-700 placeholder:text-slate-300" 
                                       placeholder="Contoh: IPA Biologi">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-700 mb-2 uppercase tracking-widest">Jabatan</label>
                                <input type="text" name="position" value="{{ old('position') }}" 
                                       class="w-full bg-slate-50 border-slate-100 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 py-4 px-5 border transition-all font-bold text-slate-700 placeholder:text-slate-300" 
                                       placeholder="Contoh: Guru Madya">
                            </div>
                        </div>

                        <div>
                            <label class="block text-[10px] font-black text-slate-700 mb-2 uppercase tracking-widest">Riwayat Pendidikan</label>
                            <textarea name="education_history" rows="5" 
                                      class="w-full bg-slate-50 border-slate-100 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 py-4 px-5 border transition-all font-bold text-slate-700 placeholder:text-slate-300"
                                      placeholder="Sebutkan riwayat pendidikan (satu per baris)...">{{ old('education_history') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-[10px] font-black text-slate-700 mb-2 uppercase tracking-widest">Riwayat Pekerjaan</label>
                            <textarea name="employment_history" rows="5" 
                                      class="w-full bg-slate-50 border-slate-100 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 py-4 px-5 border transition-all font-bold text-slate-700 placeholder:text-slate-300"
                                      placeholder="Sebutkan riwayat pekerjaan (satu per baris)...">{{ old('employment_history') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Pesan Motivasi -->
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8">
                    <h4 class="text-xs font-black text-slate-800 uppercase tracking-widest mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-quote-left text-indigo-500"></i>
                        Pesan Motivasi
                    </h4>
                    <div>
                        <textarea name="motivation_message" rows="4" 
                                  class="w-full bg-slate-50 border-slate-100 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 py-4 px-5 border transition-all font-bold text-slate-700 placeholder:text-slate-300 italic"
                                  placeholder="Tuliskan pesan motivasi atau kutipan favorit...">{{ old('motivation_message') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Form Kanan (Upload) -->
            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8 flex flex-col items-center sticky top-8">
                    <h4 class="text-[10px] font-black text-slate-400 mb-6 uppercase tracking-widest">Foto Profil</h4>
                    
                    <div class="relative group">
                        <div class="w-40 h-40 rounded-[2.5rem] overflow-hidden border-4 border-slate-50 shadow-inner bg-slate-50 ring-1 ring-slate-100 relative">
                            <template x-if="photoPreview">
                                <img :src="photoPreview" class="w-full h-full object-cover">
                            </template>
                            <template x-if="!photoPreview">
                                <div class="w-full h-full flex items-center justify-center text-slate-200">
                                    <i class="fa-solid fa-user-tie text-5xl"></i>
                                </div>
                            </template>
                            
                            <label for="photo" class="absolute inset-0 bg-indigo-600/60 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center text-white cursor-pointer backdrop-blur-sm">
                                <i class="fa-solid fa-camera text-2xl mb-2"></i>
                                <span class="text-[9px] font-black uppercase tracking-widest">Ganti Foto</span>
                            </label>
                        </div>
                        <input type="file" name="photo" id="photo" class="hidden" accept="image/*" @change="previewImage">
                    </div>

                    <div class="mt-6 text-center">
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-[0.15em] leading-relaxed">Format: JPG, PNG<br>Maksimal: 3MB<br>Rasio 1:1 disarankan</p>
                    </div>

                    @error('photo')
                        <p class="mt-4 text-[10px] text-rose-500 font-bold uppercase tracking-widest text-center">{{ $message }}</p>
                    @enderror

                    <div class="w-full border-t border-slate-50 mt-8 pt-8">
                        <div class="bg-indigo-950 rounded-[2rem] p-6 shadow-2xl shadow-indigo-100 text-white w-full">
                            <button type="submit" 
                                    :disabled="loading"
                                    class="w-full bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-4 rounded-2xl transition-all font-black text-[10px] uppercase tracking-[0.2em] flex items-center justify-center gap-3 disabled:opacity-50 disabled:cursor-not-allowed group">
                                <template x-if="!loading">
                                    <div class="flex items-center gap-3">
                                        <i class="fa-solid fa-floppy-disk group-hover:scale-110 transition-transform"></i>
                                        <span>Simpan Data</span>
                                    </div>
                                </template>
                                <template x-if="loading">
                                    <div class="flex items-center gap-3">
                                        <i class="fa-solid fa-circle-notch fa-spin"></i>
                                        <span>Menyimpan...</span>
                                    </div>
                                </template>
                            </button>
                            
                            <a href="{{ route('admin.teachers.index') }}" x-show="!loading" class="block w-full text-center mt-6 text-[9px] font-black text-indigo-400 hover:text-white transition-colors uppercase tracking-[0.2em]">
                                Batal & Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function teacherForm() {
    return {
        photoPreview: null,
        loading: false,
        previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    }
}
</script>
@endsection
