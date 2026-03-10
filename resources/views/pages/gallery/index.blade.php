@extends('layouts.frontend')

@section('content')
    <div class="bg-indigo-900 py-16 text-center text-white">
        <h1 class="text-3xl md:text-5xl font-extrabold mb-4">Galeri Foto</h1>
        <p class="text-indigo-200">Dokumentasi Berbagai Kegiatan SMP Negeri 41 Samarinda</p>
    </div>

    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($galleries as $gallery)
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden group hover:shadow-xl transition-all duration-300">
                    <div class="relative h-56">
                        @if($gallery->photos->count() > 0)
                        <img src="{{ asset('storage/' . $gallery->photos->first()->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $gallery->title }}">
                        @else
                        <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400">No Image</div>
                        @endif
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                            <span class="text-white text-xs font-bold bg-indigo-600 px-2 py-1 rounded">{{ $gallery->photos->count() }} Foto</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl text-indigo-900 mb-2 leading-tight hover:text-indigo-600 transition">
                            <a href="{{ route('gallery.show', $gallery) }}">{{ $gallery->title }}</a>
                        </h3>
                        <p class="text-gray-500 text-sm line-clamp-2">{{ $gallery->description }}</p>
                        <a href="{{ route('gallery.show', $gallery) }}" class="inline-block mt-4 text-indigo-600 font-bold text-sm hover:translate-x-1 transition-transform">Lihat Galeri →</a>
                    </div>
                </div>
                @empty
                <p class="col-span-3 text-center py-12 text-gray-400">Belum ada galeri yang dipublikasikan.</p>
                @endforelse
            </div>
            <div class="mt-12">{{ $galleries->links() }}</div>
        </div>
    </section>
@endsection
