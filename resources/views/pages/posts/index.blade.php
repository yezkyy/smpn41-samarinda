@extends('layouts.frontend')

@section('content')
    <!-- Header Page -->
    <div class="relative bg-indigo-950 py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-indigo-500 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10 text-center">
            <span class="inline-block px-4 py-1.5 mb-6 text-[10px] font-black tracking-[0.3em] text-indigo-400 uppercase bg-white/5 backdrop-blur-md rounded-full" data-aos="fade-down">
                Update Terkini
            </span>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight" data-aos="fade-up" data-aos-delay="200">
                Berita & <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-blue-300">Pengumuman</span>
            </h1>
            <p class="text-indigo-100/60 max-w-2xl mx-auto text-lg md:text-xl leading-relaxed font-medium" data-aos="fade-up" data-aos-delay="400">
                Kumpulan informasi, kegiatan, dan prestasi terbaru dari SMP Negeri 41 Samarinda.
            </p>
        </div>
    </div>

    <!-- News Grid -->
    <section class="py-32 bg-white relative">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mb-20">
                @forelse($posts as $post)
                <div class="group bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100 flex flex-col" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                    <div class="relative overflow-hidden h-64">
                        <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80' }}" 
                             class="w-full h-full object-cover transition duration-700 group-hover:scale-110" 
                             alt="{{ $post->title }}">
                        <div class="absolute top-6 left-6">
                            <span class="px-4 py-2 bg-white/90 backdrop-blur-md rounded-xl text-indigo-900 text-[10px] font-black uppercase tracking-widest shadow-lg">
                                {{ $post->category }}
                            </span>
                        </div>
                    </div>
                    <div class="p-10 flex flex-col flex-grow">
                        <div class="flex items-center text-[10px] text-slate-400 mb-6 font-black uppercase tracking-widest">
                            <i class="fa-solid fa-calendar-day mr-2 text-indigo-600"></i>
                            {{ $post->created_at->format('d M Y') }}
                        </div>
                        <h3 class="text-2xl font-black mb-4 text-slate-900 line-clamp-2 leading-tight group-hover:text-indigo-600 transition">
                            <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                        </h3>
                        <p class="text-slate-500 text-base line-clamp-3 mb-8 leading-relaxed font-medium">
                            {{ strip_tags($post->content) }}
                        </p>
                        <div class="mt-auto">
                            <a href="{{ route('posts.show', $post->slug) }}" class="inline-flex items-center text-indigo-600 font-black uppercase tracking-[0.2em] text-[10px] group/link">
                                Selengkapnya
                                <span class="ml-2 w-8 h-px bg-indigo-100 group-hover/link:w-12 transition-all bg-indigo-600"></span>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-32 text-center bg-slate-50 rounded-[3rem] border-2 border-dashed border-slate-200" data-aos="fade-up">
                    <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm">
                        <i class="fa-solid fa-newspaper text-4xl text-slate-200"></i>
                    </div>
                    <p class="text-slate-400 text-xl font-bold italic">Maaf, saat ini belum ada berita terbaru.</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="flex justify-center" data-aos="fade-up">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection
