@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-primary overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 relative z-10 text-white">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <div class="inline-flex items-center px-4 py-2 bg-blue-700/50 rounded-full text-sm font-semibold tracking-wide border border-blue-500/30">
                        <span class="mr-2 uppercase">Selamat Datang di</span>
                    </div>
                    <h1 class="text-4xl md:text-6xl font-extrabold leading-tight tracking-tight">
                        Website Resmi <br>
                        <span class="text-accent italic">SMP Negeri 41</span> Samarinda
                    </h1>
                    <p class="text-lg text-blue-100 max-w-lg leading-relaxed">
                        Mencetak generasi yang beriman, cerdas, terampil, mandiri, dan berwawasan lingkungan melalui pendidikan berkualitas di Kota Samarinda.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-4">
                        <a href="#" class="px-8 py-4 bg-accent hover:bg-accent-dark text-primary font-bold rounded-xl transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">Mulai Menjelajah</a>
                        <a href="#" class="px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-xl backdrop-blur-sm border border-white/20 transition-all">Profil Sekolah</a>
                    </div>
                </div>
                <div class="hidden md:block relative">
                    <div class="aspect-square bg-blue-600/30 rounded-3xl transform rotate-3 absolute inset-0 -z-10 blur-2xl"></div>
                    <div class="bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl shadow-2xl overflow-hidden aspect-[4/3] border-4 border-white/10 group">
                        <div class="w-full h-full bg-blue-500/20 flex items-center justify-center text-8xl text-white/20">
                            <i class="fa-solid fa-school group-hover:scale-110 transition-transform duration-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Decorative Background Element -->
        <div class="absolute -bottom-12 -left-12 w-96 h-96 bg-accent/10 rounded-full blur-3xl"></div>
    </section>

    <!-- Moto Sekolah Section -->
    <section class="py-12 bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-50 rounded-3xl p-8 md:p-12 border border-gray-100 shadow-sm">
                <div class="text-center space-y-4 max-w-3xl mx-auto">
                    <h2 class="text-primary font-bold text-2xl uppercase tracking-widest italic">ESPADJI</h2>
                    <p class="text-3xl md:text-4xl font-extrabold text-gray-800 leading-tight">
                        "Beriman, Cerdas, Terampil, Mandiri, Berwawasan Lingkungan"
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sambutan Kepala Sekolah -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="relative order-2 md:order-1">
                    <div class="aspect-[3/4] bg-gray-100 rounded-2xl overflow-hidden shadow-2xl relative group">
                        <div class="absolute inset-0 bg-primary/10 group-hover:bg-primary/5 transition-colors duration-500"></div>
                        <div class="w-full h-full flex items-center justify-center text-primary/20 text-9xl">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-black/80 to-transparent text-white">
                            <h3 class="text-2xl font-bold">Ismit Anwar, M.Pd</h3>
                            <p class="text-accent font-medium">Kepala Sekolah SMPN 41 Samarinda</p>
                        </div>
                    </div>
                    <div class="absolute -top-6 -right-6 w-32 h-32 bg-accent rounded-full -z-10 blur-xl opacity-50"></div>
                </div>
                <div class="space-y-8 order-1 md:order-2">
                    <div class="space-y-4">
                        <span class="text-primary font-bold uppercase tracking-wider text-sm flex items-center">
                            <span class="w-8 h-px bg-primary mr-3"></span> Sambutan Hangat
                        </span>
                        <h2 class="text-4xl font-extrabold text-gray-900 leading-tight">Mewujudkan Sekolah Impian Bersama Kita</h2>
                    </div>
                    <div class="text-gray-600 leading-relaxed space-y-6 text-lg">
                        <p>
                            Assalamu'alaikum Warahmatullahi Wabarakatuh, Salam Sejahtera bagi kita semua. Selamat datang di portal digital SMP Negeri 41 Samarinda.
                        </p>
                        <p>
                            Melalui website ini, kami berkomitmen untuk menyediakan informasi transparan dan inspiratif mengenai perjalanan pendidikan putra-putri kita. Kami mengundang seluruh elemen masyarakat untuk berkolaborasi dalam mencetak generasi unggul yang berkarakter.
                        </p>
                    </div>
                    <div class="pt-4">
                        <a href="#" class="inline-flex items-center text-primary font-bold hover:translate-x-2 transition-transform">
                            Baca Selengkapnya <i class="fa-solid fa-arrow-right ml-3"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News / Berita Terbaru -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-16">
                <div class="space-y-4">
                    <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight">Berita & Pengumuman</h2>
                    <p class="text-gray-500 max-w-lg">Ikuti perkembangan terbaru kegiatan akademik dan non-akademik di SMPN 41 Samarinda.</p>
                </div>
                <a href="#" class="hidden md:flex items-center text-primary font-bold group">
                    Lihat Semua <i class="fa-solid fa-circle-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <!-- Placeholder Berita -->
            <div class="grid md:grid-cols-3 gap-8">
                @for ($i = 1; $i <= 3; $i++)
                    <article class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-gray-100 group">
                        <div class="aspect-video bg-gray-100 flex items-center justify-center relative">
                            <i class="fa-solid fa-image text-4xl text-gray-300"></i>
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-primary text-white text-xs font-bold rounded-lg uppercase tracking-wider">Berita</span>
                            </div>
                        </div>
                        <div class="p-8 space-y-4">
                            <div class="flex items-center text-xs text-gray-400 font-medium">
                                <i class="fa-regular fa-calendar-check mr-2"></i> {{ date('d M Y') }}
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-primary transition-colors line-clamp-2 leading-snug">
                                Judul Berita Utama Terkait Kegiatan di SMPN 41 Samarinda {{ $i }}
                            </h3>
                            <p class="text-gray-500 text-sm line-clamp-3 leading-relaxed">
                                Deskripsi singkat berita untuk memberikan gambaran isi konten kepada pembaca agar tertarik klik selengkapnya...
                            </p>
                            <div class="pt-4">
                                <a href="#" class="text-primary font-bold text-sm inline-flex items-center hover:translate-x-1 transition-transform">
                                    Baca Selengkapnya <i class="fa-solid fa-chevron-right ml-2 text-[10px]"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @endfor
            </div>
        </div>
    </section>

    <!-- Identitas Sekolah Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-primary rounded-[3rem] p-8 md:p-16 shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full blur-3xl -mr-20 -mt-20"></div>
                <div class="relative z-10 grid lg:grid-cols-3 gap-16 items-center">
                    <div class="lg:col-span-1 space-y-6">
                        <h2 class="text-4xl font-extrabold text-white leading-tight">Identitas <br> <span class="text-accent">Sekolah</span></h2>
                        <p class="text-blue-100 leading-relaxed">Informasi legalitas dan akreditasi SMP Negeri 41 Samarinda.</p>
                    </div>
                    <div class="lg:col-span-2 grid grid-cols-2 md:grid-cols-4 gap-8">
                        <div class="bg-white/10 backdrop-blur-sm p-6 rounded-2xl border border-white/10 text-center space-y-2">
                            <div class="text-accent text-3xl font-bold">2011</div>
                            <div class="text-white text-xs uppercase font-bold tracking-widest opacity-80">NSS</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm p-6 rounded-2xl border border-white/10 text-center space-y-2">
                            <div class="text-accent text-3xl font-bold">3040</div>
                            <div class="text-white text-xs uppercase font-bold tracking-widest opacity-80">NPSN</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm p-6 rounded-2xl border border-white/10 text-center space-y-2">
                            <div class="text-accent text-3xl font-bold">B</div>
                            <div class="text-white text-xs uppercase font-bold tracking-widest opacity-80">Akreditasi</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm p-6 rounded-2xl border border-white/10 text-center space-y-2">
                            <div class="text-accent text-3xl font-bold">2010</div>
                            <div class="text-white text-xs uppercase font-bold tracking-widest opacity-80">NIS</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
