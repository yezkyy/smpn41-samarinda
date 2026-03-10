@extends('layouts.frontend')

@section('content')
    <!-- Hero Section with Immersive Image -->
    <section class="relative h-[500px] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/profile-hero.jpg') }}" class="w-full h-full object-cover scale-110 blur-[2px]" alt="School Background">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-950 via-indigo-950/80 to-transparent"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl" data-aos="fade-right">
                <span class="inline-flex items-center px-4 py-1.5 mb-6 text-xs font-black tracking-[0.3em] text-indigo-400 uppercase bg-white/10 backdrop-blur-md rounded-full">
                    <span class="w-2 h-2 bg-indigo-400 rounded-full mr-3 animate-pulse"></span>
                    Mengenal Kami
                </span>
                <h1 class="text-5xl md:text-7xl font-black text-white mb-6 leading-tight">
                    Dedikasi Untuk <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-300 to-blue-200">Masa Depan</span>
                </h1>
                <p class="text-indigo-100/80 text-lg md:text-xl leading-relaxed font-medium opacity-90">
                    Perjalanan panjang SMP Negeri 41 Samarinda dalam membentuk karakter dan mencetak prestasi gemilang di setiap generasi.
                </p>
            </div>
        </div>
    </section>

    <!-- Visionary Pillars Section -->
    <section class="py-32 bg-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-gray-50 -skew-x-12 translate-x-1/2"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col lg:flex-row gap-20 items-center">
                <div class="w-full lg:w-1/2" data-aos="fade-right">
                    <div class="relative">
                        <div class="absolute -top-10 -left-10 w-32 h-32 bg-indigo-600/5 rounded-full blur-3xl"></div>
                        <h2 class="text-4xl md:text-5xl font-black text-indigo-950 mb-8 leading-tight">Visi Strategis <br>Sekolah</h2>
                        <div class="bg-indigo-900 rounded-[3rem] p-10 md:p-16 text-white shadow-2xl shadow-indigo-200 relative overflow-hidden group">
                            <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:rotate-12 transition-transform duration-700">
                                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 20 20"><path d="M10.394 2.827a1 1 0 00-.788 0l-7 3a1 1 0 000 1.848l7 3a1 1 0 00.788 0l7-3a1 1 0 000-1.848l-7-3zM3.94 6.157L10 3.558l6.06 2.599-6.06 2.599-6.06-2.599zM16.5 10.743l-6.5 2.785-6.5-2.785v3.1l6.5 2.785 6.5-2.785v-3.1z"></path></svg>
                            </div>
                            <p class="text-2xl md:text-3xl font-bold uppercase tracking-tight leading-relaxed relative z-10">
                                "TERWUJUDNYA PESERTA DIDIK YANG BERIMAN, CERDAS, TERAMPIL, DAN MANDIRI YANG BERWAWASAN LINGKUNGAN"
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="w-full lg:w-1/2" data-aos="fade-left">
                    <h3 class="text-2xl font-black text-indigo-900 mb-8 uppercase tracking-widest flex items-center">
                        <span class="w-12 h-1 bg-indigo-600 mr-4 rounded-full"></span>
                        Misi Kami
                    </h3>
                    <div class="space-y-6">
                        @php
                            $misi = [
                                "Menumbuhkan nilai - nilai keimanan dan ketaqwaan sesuai dengan ajaran agama.",
                                "Mengoptimalkan proses pembelajaran yang aktif, kreatif dan menyenangkan.",
                                "Membina kemandirian melalui kegiatan pembiasaan dan pengembangan diri.",
                                "Menjalin kerjasama antar warga sekolah dan lembaga yang terkait.",
                                "Meningkatkan penghijauan lingkungan sekolah."
                            ];
                        @endphp
                        @foreach($misi as $item)
                        <div class="flex items-start p-6 rounded-3xl hover:bg-white hover:shadow-xl hover:shadow-indigo-50 transition-all duration-300 group border border-transparent hover:border-indigo-50">
                            <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-xl flex-shrink-0 flex items-center justify-center font-black group-hover:bg-indigo-600 group-hover:text-white transition-all mr-6">
                                0{{ $loop->iteration }}
                            </div>
                            <p class="text-gray-600 text-lg font-medium leading-relaxed group-hover:text-indigo-900 transition-colors">
                                {{ $item }}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- History with Storytelling Layout -->
    <section class="py-32 bg-gray-50 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-20">
                <div class="w-full lg:w-1/2 order-2 lg:order-1" data-aos="fade-right">
                    <div class="inline-flex items-center space-x-3 mb-6">
                        <div class="h-px w-8 bg-indigo-600"></div>
                        <span class="text-indigo-600 font-black uppercase tracking-[0.2em] text-sm">Rekam Jejak</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black text-indigo-950 mb-10 leading-tight">Sejarah & <br>Latar Belakang</h2>
                    <div class="space-y-6 text-gray-600 text-lg leading-relaxed font-medium">
                        <p>
                            SMP Negeri 41 Samarinda merupakan salah satu sekolah menengah pertama yang berdiri di jantung kota Samarinda. Berawal dari keinginan pemerintah daerah untuk memperluas akses pendidikan berkualitas bagi masyarakat sekitar Samarinda Ulu, sekolah ini terus berkembang menjadi institusi pendidikan yang membanggakan.
                        </p>
                        <p class="p-8 bg-white rounded-3xl border-l-8 border-indigo-600 italic shadow-sm">
                            "Membangun sekolah ini bukan hanya tentang mendirikan bangunan fisik, tetapi tentang menciptakan ekosistem di mana setiap anak berani bermimpi."
                        </p>
                        <p>
                            Dengan fasilitas yang terus ditingkatkan dan kurikulum yang inovatif, SMPN 41 berkomitmen untuk menjadi garda terdepan dalam mencetak generasi masa depan yang tangguh menghadapi tantangan zaman.
                        </p>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 order-1 lg:order-2" data-aos="fade-left">
                    <div class="relative">
                        <div class="absolute -top-6 -right-6 w-full h-full border-2 border-dashed border-indigo-200 rounded-[4rem]"></div>
                        <img src="{{ asset('images/sejarah-sekolah.jpg') }}" class="relative z-10 w-full rounded-[4rem] shadow-2xl grayscale hover:grayscale-0 transition-all duration-1000" alt="Sejarah Sekolah">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Detailed Identity Section -->
    <section class="py-32 bg-indigo-950 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="grid grid-cols-10 h-full">
                @for($i=0; $i<10; $i++)
                <div class="border-r border-white/20"></div>
                @endfor
            </div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-20" data-aos="fade-up">
                <h2 class="text-4xl font-black mb-4">Profil Sekolah</h2>
                <div class="h-1.5 w-24 bg-indigo-500 mx-auto rounded-full mb-6"></div>
                <p class="text-indigo-200/60 font-bold uppercase tracking-widest text-sm">Dokumentasi Pokok Pendidikan</p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Info Cards -->
                <div class="lg:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-6" data-aos="fade-right">
                    @php
                        $profil = [
                            ['label' => 'Nama Sekolah', 'value' => 'SMP Negeri 41 Samarinda', 'icon' => 'fa-school'],
                            ['label' => 'NPSN', 'value' => '30405607', 'icon' => 'fa-fingerprint'],
                            ['label' => 'NSS', 'value' => '201166002213', 'icon' => 'fa-id-card'],
                            ['label' => 'NIS', 'value' => '201040', 'icon' => 'fa-id-badge'],
                            ['label' => 'Akreditasi', 'value' => 'B (Baik)', 'icon' => 'fa-certificate'],
                            ['label' => 'Email Resmi', 'value' => 'smpnegeri41samarinda@gmail.com', 'icon' => 'fa-envelope'],
                        ];
                    @endphp
                    @foreach($profil as $item)
                    <div class="bg-white/5 backdrop-blur-md p-8 rounded-[2rem] border border-white/10 hover:bg-white/10 transition-all duration-300 group">
                        <div class="flex items-center gap-6">
                            <div class="w-12 h-12 bg-indigo-500 rounded-2xl flex items-center justify-center text-white group-hover:scale-110 transition-transform">
                                <i class="fa-solid {{ $item['icon'] }} text-lg"></i>
                            </div>
                            <div>
                                <div class="text-[10px] font-black text-indigo-400 uppercase tracking-widest mb-1">{{ $item['label'] }}</div>
                                <div class="text-lg font-bold">{{ $item['value'] }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Full Width Address -->
                    <div class="md:col-span-2 bg-white/5 backdrop-blur-md p-8 rounded-[2.5rem] border border-white/10 hover:bg-white/10 transition-all duration-300 group">
                        <div class="flex items-start gap-6">
                            <div class="w-12 h-12 bg-indigo-500 rounded-2xl flex items-center justify-center text-white group-hover:scale-110 transition-transform flex-shrink-0">
                                <i class="fa-solid fa-location-dot text-lg"></i>
                            </div>
                            <div>
                                <div class="text-[10px] font-black text-indigo-400 uppercase tracking-widest mb-1">Alamat Lengkap</div>
                                <div class="text-lg font-bold leading-relaxed text-indigo-100">
                                    Jl. Serindit No. 1, Perumahan Sambutan Idaman Permai, Sambutan, Kec. Sambutan, Kota Samarinda - 75115
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Info (Contact & Social) -->
                <div class="lg:col-span-4 space-y-6" data-aos="fade-left">
                    <div class="bg-indigo-600 rounded-[2.5rem] p-10 shadow-2xl shadow-indigo-900/50">
                        <h4 class="text-xl font-black mb-8 border-b border-indigo-400/30 pb-4">Hubungi Kami</h4>
                        <div class="space-y-6">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="text-sm font-bold">0823 8417 9874</div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="text-sm font-bold">0821 3651 5265</div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white/5 backdrop-blur-md p-10 rounded-[2.5rem] border border-white/10">
                        <h4 class="text-xl font-black mb-8 border-b border-white/10 pb-4 text-indigo-400">Media Sosial</h4>
                        <div class="space-y-6">
                            <a href="#" class="flex items-center gap-4 group">
                                <div class="w-10 h-10 bg-rose-500/20 text-rose-500 rounded-xl flex items-center justify-center group-hover:bg-rose-500 group-hover:text-white transition-all">
                                    <i class="fa-brands fa-instagram text-xl"></i>
                                </div>
                                <span class="text-sm font-bold text-gray-300 group-hover:text-white">@smpn41_samarinda</span>
                            </a>
                            <a href="#" class="flex items-center gap-4 group">
                                <div class="w-10 h-10 bg-red-600/20 text-red-600 rounded-xl flex items-center justify-center group-hover:bg-red-600 group-hover:text-white transition-all">
                                    <i class="fa-brands fa-youtube text-xl"></i>
                                </div>
                                <span class="text-sm font-bold text-gray-300 group-hover:text-white">espadji tv</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4 text-center">
            <div class="max-w-4xl mx-auto" data-aos="zoom-out">
                <h2 class="text-4xl md:text-5xl font-black text-indigo-950 mb-8 leading-tight">Bersiap Untuk Masa Depan Yang Lebih Cerah?</h2>
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="/guru" class="px-10 py-5 bg-indigo-600 text-white rounded-2xl font-black text-lg hover:shadow-2xl hover:-translate-y-1 transition-all">
                        Lihat Staff Pengajar
                    </a>
                    <a href="/kontak" class="px-10 py-5 bg-gray-100 text-indigo-950 rounded-2xl font-black text-lg hover:bg-gray-200 transition-all">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
