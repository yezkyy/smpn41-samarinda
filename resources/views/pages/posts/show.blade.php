@extends('layouts.frontend')

@section('content')
    <!-- Detail Header -->
    <div class="relative bg-indigo-950 py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-indigo-500 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10 text-center">
            <span class="inline-block px-4 py-1.5 mb-6 text-[10px] font-black tracking-[0.3em] text-indigo-400 uppercase bg-white/5 backdrop-blur-md rounded-full" data-aos="fade-down">
                {{ $post->category }}
            </span>
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-white mb-8 leading-tight max-w-5xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                {{ $post->title }}
            </h1>
            <div class="flex items-center justify-center space-x-6 text-indigo-200/60 font-bold uppercase tracking-widest text-[10px]" data-aos="fade-up" data-aos-delay="400">
                <span class="flex items-center">
                    <i class="fa-solid fa-calendar-day mr-2"></i>
                    {{ $post->created_at->format('d M Y') }}
                </span>
                <span class="w-1.5 h-1.5 bg-indigo-500/30 rounded-full"></span>
                <span class="flex items-center">
                    <i class="fa-solid fa-user mr-2"></i>
                    Admin Sekolah
                </span>
            </div>
        </div>
    </div>

    <section class="py-24 bg-white relative">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-16">
                <!-- Content Area -->
                <div class="w-full lg:w-2/3" data-aos="fade-right">
                    @if($post->thumbnail)
                    <div class="mb-16 rounded-[2.5rem] overflow-hidden shadow-2xl shadow-indigo-100 group">
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-1000" alt="{{ $post->title }}">
                    </div>
                    @endif

                    <div class="prose prose-indigo prose-xl max-w-none text-slate-600 leading-relaxed font-medium">
                        {!! nl2br($post->content) !!}
                    </div>

                    <!-- Share Section -->
                    <div class="mt-20 pt-12 border-t border-slate-50 flex flex-col md:flex-row md:items-center md:justify-between gap-8">
                        <div>
                            <h4 class="text-sm font-black text-slate-800 uppercase tracking-widest mb-2">Bagikan Berita</h4>
                            <p class="text-slate-400 text-xs font-bold">Sebarkan informasi ini melalui sosial media.</p>
                        </div>
                        <div class="flex space-x-4">
                            <a href="#" class="w-12 h-12 bg-slate-50 text-slate-400 rounded-2xl flex items-center justify-center hover:bg-indigo-600 hover:text-white hover:-translate-y-1 transition-all duration-300">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-slate-50 text-slate-400 rounded-2xl flex items-center justify-center hover:bg-sky-500 hover:text-white hover:-translate-y-1 transition-all duration-300">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-slate-50 text-slate-400 rounded-2xl flex items-center justify-center hover:bg-green-500 hover:text-white hover:-translate-y-1 transition-all duration-300">
                                <i class="fa-brands fa-whatsapp text-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Area -->
                <div class="w-full lg:w-1/3" data-aos="fade-left">
                    <div class="sticky top-32 space-y-12">
                        <!-- Search / Category Placeholder -->
                        <div class="bg-slate-50 rounded-[2.5rem] p-10 border border-slate-100">
                            <h3 class="text-lg font-black text-slate-800 mb-8 uppercase tracking-widest flex items-center">
                                <span class="w-8 h-1 bg-indigo-600 mr-4 rounded-full"></span>
                                Berita Terbaru
                            </h3>
                            
                            <div class="space-y-8">
                                @foreach($latest_posts as $latest)
                                <a href="{{ route('posts.show', $latest->slug) }}" class="flex gap-6 group">
                                    <div class="w-20 h-20 bg-slate-200 rounded-2xl overflow-hidden flex-shrink-0 shadow-sm group-hover:shadow-md transition-all">
                                        <img src="{{ $latest->thumbnail ? asset('storage/' . $latest->thumbnail) : 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=200&q=80' }}" 
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="{{ $latest->title }}">
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h4 class="text-sm font-black text-slate-800 line-clamp-2 group-hover:text-indigo-600 transition leading-snug">
                                            {{ $latest->title }}
                                        </h4>
                                        <span class="text-[10px] text-slate-400 font-bold uppercase mt-2 tracking-widest">
                                            {{ $latest->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                </a>
                                @endforeach
                            </div>

                            <a href="/berita" class="mt-12 block w-full text-center py-4 bg-white hover:bg-indigo-600 text-indigo-600 hover:text-white rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] transition-all border border-indigo-50 shadow-sm hover:shadow-xl hover:shadow-indigo-100">
                                Lihat Semua Berita
                            </a>
                        </div>

                        <!-- CTA Section / About School -->
                        <div class="bg-indigo-900 rounded-[2.5rem] p-10 text-white relative overflow-hidden shadow-2xl shadow-indigo-200">
                            <div class="absolute top-0 right-0 p-8 opacity-10">
                                <i class="fa-solid fa-school text-8xl"></i>
                            </div>
                            <h4 class="text-xl font-black mb-4 relative z-10">Kenali SMPN 41</h4>
                            <p class="text-indigo-200/80 text-sm font-medium mb-8 relative z-10 leading-relaxed">Pelajari lebih lanjut tentang visi, misi, dan program unggulan kami.</p>
                            <a href="/profil-sekolah" class="inline-block w-full bg-white text-indigo-900 font-black text-xs py-4 rounded-xl hover:shadow-xl transition-all relative z-10 text-center uppercase tracking-widest">Eksplorasi Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
