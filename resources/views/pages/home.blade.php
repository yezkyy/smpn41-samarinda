@extends('layouts.frontend')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[600px] flex items-center justify-center text-white overflow-hidden">
        <!-- Overlay with gradient for better text readability -->
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-900/80 to-black/60 z-10"></div>
        
        <!-- Hero Image with subtle zoom animation -->
        <img src="{{ asset('images/hero.jpg') }}" class="absolute inset-0 w-full h-full object-cover scale-105 animate-pulse-slow" alt="School Hero">
        
        <div class="container mx-auto px-4 relative z-20">
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-1.5 mb-6 text-xs font-bold tracking-widest text-white uppercase bg-indigo-600 rounded-full" data-aos="fade-down">
                    Pendidikan Berkarakter & Unggul
                </span>
                <h1 class="text-5xl md:text-7xl font-black mb-6 leading-[1.1]" data-aos="fade-right" data-aos-delay="200">
                    Mencetak Generasi <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-blue-300">Cerdas & Mandiri</span>
                </h1>
                <p class="text-lg md:text-xl mb-10 text-gray-200 max-w-2xl leading-relaxed opacity-90" data-aos="fade-right" data-aos-delay="400">
                    Selamat datang di SMP Negeri 41 Samarinda, tempat di mana potensi setiap siswa diasah untuk menjadi pribadi yang bertaqwa, kompetitif, dan siap menghadapi tantangan global.
                </p>
                <div class="flex flex-wrap gap-4" data-aos="fade-up" data-aos-delay="600">
                    <a href="/profil-sekolah" class="px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-bold transition-all shadow-lg shadow-indigo-500/30 hover:-translate-y-1">
                        Eksplorasi Profil
                    </a>
                    <a href="/kontak" class="px-8 py-4 bg-white/10 hover:bg-white/20 text-white backdrop-blur-md border border-white/30 rounded-2xl font-bold transition-all hover:-translate-y-1">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll Down Mouse -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 animate-bounce hidden md:block">
            <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center p-1">
                <div class="w-1.5 h-3 bg-white rounded-full"></div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <div class="relative z-30 -mt-16 container mx-auto px-4" data-aos="zoom-in" data-aos-delay="800">
        <div class="bg-white rounded-[2rem] shadow-2xl shadow-indigo-100 p-8 md:p-12 border border-gray-50">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12">
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-black text-indigo-900 mb-2">500+</div>
                    <div class="text-sm font-bold text-gray-400 uppercase tracking-widest">Siswa Aktif</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-black text-indigo-900 mb-2">40+</div>
                    <div class="text-sm font-bold text-gray-400 uppercase tracking-widest">Guru & Staf</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-black text-indigo-900 mb-2">15+</div>
                    <div class="text-sm font-bold text-gray-400 uppercase tracking-widest">Ekstrakurikuler</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-black text-indigo-900 mb-2">A</div>
                    <div class="text-sm font-bold text-gray-400 uppercase tracking-widest">Akreditasi</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sambutan Section -->
    <section class="py-32 bg-white overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-24">
                <div class="w-full lg:w-5/12 relative" data-aos="fade-right">
                    <!-- Decorative patterns -->
                    <div class="absolute -top-10 -left-10 w-40 h-40 bg-indigo-50 rounded-full blur-3xl opacity-60"></div>
                    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-blue-50 rounded-full blur-3xl opacity-60"></div>
                    
                    <div class="relative z-10 group">
                        <div class="absolute inset-0 bg-indigo-600 rounded-[3rem] rotate-3 group-hover:rotate-6 transition-transform duration-500 opacity-10"></div>
                        <img src="{{ asset('images/kepala-sekolah.jpg') }}" 
                             class="relative z-20 w-full rounded-[3rem] shadow-2xl object-cover aspect-[4/5]" 
                             alt="Kepala Sekolah">
                        
                        <!-- Floating Badge -->
                        <div class="absolute -bottom-8 -right-8 bg-white p-6 rounded-2xl shadow-xl z-30 border border-gray-50 hidden md:block" data-aos="zoom-in" data-aos-delay="400">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center text-white">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10.394 2.827a1 1 0 00-.788 0l-7 3a1 1 0 000 1.848l7 3a1 1 0 00.788 0l7-3a1 1 0 000-1.848l-7-3zM3.94 6.157L10 3.558l6.06 2.599-6.06 2.599-6.06-2.599zM16.5 10.743l-6.5 2.785-6.5-2.785v3.1l6.5 2.785 6.5-2.785v-3.1z"></path></svg>
                                </div>
                                <div>
                                    <div class="text-xs font-black text-gray-400 uppercase tracking-widest">Kepala Sekolah</div>
                                    <div class="text-indigo-900 font-bold">Visi 2024 - 2029</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="w-full lg:w-7/12" data-aos="fade-left">
                    <div class="inline-flex items-center space-x-3 mb-6">
                        <div class="h-px w-8 bg-indigo-600"></div>
                        <span class="text-indigo-600 font-black uppercase tracking-[0.2em] text-sm">Prakata</span>
                    </div>
                    
                    <h2 class="text-4xl md:text-5xl font-black mb-8 text-indigo-950 leading-tight">Sambutan <br>Kepala Sekolah</h2>
                    
                    <div class="space-y-6 text-gray-600 leading-relaxed text-lg mb-10">
                        <div class="font-bold text-indigo-900 border-l-4 border-indigo-600 pl-6 py-2 bg-indigo-50/50 rounded-r-2xl">
                            <p>Assalamu’alaikum Warahmatullahi Wabarakatuh,</p>
                            <p>Salam sejahtera bagi kita semua,</p>
                            <p>Om Swastiastu, Namo Buddhaya, Salam Kebajikan.</p>
                        </div>

                        <p>
                            Puji syukur kita panjatkan ke hadirat Tuhan Yang Maha Esa atas segala rahmat dan karunia-Nya, sehingga website resmi SMP Negeri 41 Samarinda dapat hadir sebagai sarana informasi dan komunikasi bagi seluruh warga sekolah maupun masyarakat luas.
                        </p>

                        <p>
                            Website sekolah ini kami hadirkan sebagai media untuk menyampaikan berbagai informasi mengenai profil SMP Negeri 41 Samarinda, kegiatan pembelajaran, prestasi siswa, program sekolah, serta berbagai aktivitas yang dilaksanakan oleh seluruh warga sekolah. Kami berharap website ini dapat menjadi jembatan komunikasi yang efektif antara sekolah dengan peserta didik, orang tua, alumni, serta masyarakat.
                        </p>

                        <p>
                            Kami mengucapkan terima kasih kepada semua pihak yang telah berkontribusi dalam pengembangan website SMP Negeri 41 Samarinda. Semoga kehadiran website ini dapat memberikan manfaat yang besar bagi kemajuan pendidikan serta mendukung terciptanya lingkungan belajar yang inovatif, kreatif, dan berdaya saing.
                        </p>

                        <p>
                            Akhir kata, kami mengharapkan kritik dan saran yang membangun demi penyempurnaan website ini di masa yang akan datang.
                        </p>

                        <p class="font-bold text-indigo-900">
                            Wassalamu’alaikum Warahmatullahi Wabarakatuh.
                        </p>
                    </div>

                    <div class="flex items-center space-x-6">
                        <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-600">
                            <i class="fa-solid fa-user-tie text-3xl"></i>
                        </div>
                        <div>
                            <p class="text-2xl font-black text-indigo-900 leading-none">Kepala Sekolah</p>
                            <p class="text-indigo-600 font-bold text-sm mt-2">SMP Negeri 41 Samarinda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values / Kenapa Kami? -->
    <section class="py-24 bg-gray-50 relative overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-indigo-600 font-black uppercase tracking-[0.2em] text-sm mb-4 block">Nilai Dasar</span>
                <h2 class="text-4xl font-black text-indigo-950 mb-6">Pilar Pendidikan Kami</h2>
                <p class="text-gray-500 text-lg">Empat landasan utama dalam mendidik dan membimbing siswa mencapai prestasi.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Value 1 -->
                <div class="bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-xl transition-all group hover:-translate-y-2 border border-white" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 mb-8 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h3 class="text-xl font-black text-indigo-900 mb-4 tracking-tight">Religius</h3>
                    <p class="text-gray-500 leading-relaxed">Membangun fondasi akhlak mulia dan ketakwaan kepada Tuhan Yang Maha Esa.</p>
                </div>
                <!-- Value 2 -->
                <div class="bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-xl transition-all group hover:-translate-y-2 border border-white" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mb-8 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.364-6.364l-.707-.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M12 13a3 3 0 100-6 3 3 0 000 6z"></path></svg>
                    </div>
                    <h3 class="text-xl font-black text-indigo-900 mb-4 tracking-tight">Cerdas</h3>
                    <p class="text-gray-500 leading-relaxed">Menumbuhkan daya pikir kritis, logis, dan inovatif dalam setiap pembelajaran.</p>
                </div>
                <!-- Value 3 -->
                <div class="bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-xl transition-all group hover:-translate-y-2 border border-white" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 mb-8 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-black text-indigo-900 mb-4 tracking-tight">Kompetitif</h3>
                    <p class="text-gray-500 leading-relaxed">Menyiapkan mental juara dan semangat pantang menyerah dalam segala bidang.</p>
                </div>
                <!-- Value 4 -->
                <div class="bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-xl transition-all group hover:-translate-y-2 border border-white" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-16 h-16 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 mb-8 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-black text-indigo-900 mb-4 tracking-tight">Mandiri</h3>
                    <p class="text-gray-500 leading-relaxed">Melahirkan pribadi yang tangguh, percaya diri, dan bertanggung jawab.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Terbaru Section -->
    <section class="py-32 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6" data-aos="fade-up">
                <div class="max-w-xl">
                    <div class="inline-flex items-center space-x-3 mb-6">
                        <div class="h-px w-8 bg-indigo-600"></div>
                        <span class="text-indigo-600 font-black uppercase tracking-[0.2em] text-sm">Update Terkini</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black text-indigo-950">Berita & Pengumuman</h2>
                </div>
                <a href="/berita" class="group flex items-center px-8 py-4 bg-gray-50 hover:bg-indigo-600 text-indigo-900 hover:text-white rounded-2xl font-bold transition-all duration-300">
                    Semua Berita
                    <svg class="ml-2 w-5 h-5 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($posts as $post)
                <a href="/berita/{{ $post->slug }}" class="group bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 flex flex-col" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="relative overflow-hidden h-64">
                        <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('images/news-placeholder.jpg') }}" 
                             class="w-full h-full object-cover transition duration-700 group-hover:scale-110" 
                             alt="{{ $post->title }}">
                        <div class="absolute top-6 left-6">
                            <span class="px-4 py-2 bg-white/90 backdrop-blur-md rounded-xl text-indigo-900 text-xs font-black uppercase tracking-widest shadow-lg">
                                {{ $post->category }}
                            </span>
                        </div>
                    </div>
                    <div class="p-10 flex flex-col flex-grow">
                        <div class="flex items-center text-sm text-gray-400 mb-6 font-bold uppercase tracking-widest">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $post->created_at->format('d M Y') }}
                        </div>
                        <h3 class="text-2xl font-black mb-4 text-indigo-950 line-clamp-2 leading-tight group-hover:text-indigo-600 transition">
                            {{ $post->title }}
                        </h3>
                        <p class="text-gray-500 text-lg line-clamp-3 mb-8 leading-relaxed">
                            {{ strip_tags($post->content) }}
                        </p>
                        <div class="mt-auto">
                            <div class="inline-flex items-center text-indigo-600 font-black uppercase tracking-[0.2em] text-xs group/link">
                                Baca Detail
                                <span class="ml-2 w-8 h-px bg-indigo-100 group-hover/link:w-12 transition-all bg-indigo-600"></span>
                            </div>
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-full py-20 text-center bg-gray-50 rounded-[3rem] border-2 border-dashed border-gray-200" data-aos="fade-up">
                    <p class="text-gray-400 text-xl font-bold italic">Belum ada berita terbaru saat ini.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Prestasi Section -->
    <section class="py-32 bg-indigo-950 text-white overflow-hidden relative">
        <!-- Abstract patterns -->
        <div class="absolute top-0 right-0 w-1/2 h-full bg-indigo-900/30 -skew-x-12 translate-x-1/4"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-20 gap-8 text-center md:text-left" data-aos="fade-up">
                <div>
                    <span class="text-indigo-400 font-black uppercase tracking-[0.3em] text-xs mb-4 block">Wall of Fame</span>
                    <h2 class="text-4xl md:text-5xl font-black">Prestasi Kebanggaan</h2>
                </div>
                <a href="/prestasi" class="px-8 py-4 bg-indigo-600 hover:bg-white hover:text-indigo-950 rounded-2xl font-bold transition-all">
                    Lihat Galeri Juara
                </a>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($achievements as $achievement)
                <div class="group relative overflow-hidden rounded-[2.5rem] h-[28rem] shadow-2xl transition-all duration-500 hover:-translate-y-2" data-aos="zoom-in" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <img src="{{ $achievement->image ? asset('storage/' . $achievement->image) : asset('images/achievement-placeholder.jpg') }}" 
                         class="w-full h-full object-cover transition duration-1000 group-hover:scale-110" 
                         alt="{{ $achievement->title }}">
                    
                    <!-- Overlay with dynamic gradient -->
                    <div class="absolute inset-0 bg-gradient-to-t from-indigo-950 via-indigo-950/20 to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                    
                    <div class="absolute inset-0 p-8 flex flex-col justify-end transform transition-transform duration-500 translate-y-4 group-hover:translate-y-0">
                        <span class="px-3 py-1 bg-white/10 backdrop-blur-md rounded-full text-indigo-300 text-[10px] font-black uppercase tracking-widest mb-4 inline-block w-fit">
                            Tahun {{ $achievement->year }}
                        </span>
                        <h4 class="text-2xl font-black leading-tight group-hover:text-indigo-400 transition-colors">
                            {{ $achievement->title }}
                        </h4>
                        <div class="h-1 w-0 group-hover:w-12 bg-indigo-500 transition-all duration-500 mt-4"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="bg-gradient-to-r from-indigo-600 to-blue-700 rounded-[3rem] p-12 md:p-24 text-center relative overflow-hidden shadow-2xl shadow-indigo-200" data-aos="zoom-out">
                <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none">
                    <div class="absolute top-1/2 left-1/4 w-96 h-96 bg-white rounded-full blur-3xl"></div>
                    <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-blue-300 rounded-full blur-3xl"></div>
                </div>
                
                <div class="relative z-10 max-w-3xl mx-auto">
                    <h2 class="text-4xl md:text-5xl font-black text-white mb-8 leading-tight">
                        Ayo Bergabung Bersama Keluarga Besar SMPN 41 Samarinda
                    </h2>
                    <p class="text-indigo-100 text-xl mb-12 opacity-90 leading-relaxed font-medium">
                        Wujudkan masa depan gemilang dengan pendidikan berkualitas dan lingkungan yang mendukung perkembangan setiap bakat.
                    </p>
                    <div class="flex flex-wrap justify-center gap-6">
                        <a href="/kontak" class="px-10 py-5 bg-white text-indigo-900 rounded-2xl font-black text-lg hover:shadow-2xl hover:-translate-y-1 transition-all">
                            Daftar Sekarang
                        </a>
                        <a href="/profil-sekolah" class="px-10 py-5 bg-indigo-900/30 text-white border border-indigo-400/30 backdrop-blur-md rounded-2xl font-black text-lg hover:bg-indigo-900/50 transition-all">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
