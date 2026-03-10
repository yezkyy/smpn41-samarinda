@extends('layouts.frontend')

@section('content')
    <div class="bg-indigo-900 py-16 text-center text-white">
        <h1 class="text-3xl md:text-5xl font-extrabold mb-4">{{ $gallery->title }}</h1>
        <p class="text-indigo-200 max-w-2xl mx-auto">{{ $gallery->description }}</p>
    </div>

    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($gallery->photos as $photo)
                <div class="relative overflow-hidden rounded-xl shadow-md group h-48 md:h-64 cursor-pointer" x-data="{ open: false }">
                    <img src="{{ asset('storage/' . $photo->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="Gallery Photo">
                    <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                </div>
                @endforeach
            </div>
            <div class="mt-12 text-center">
                <a href="{{ route('gallery.index') }}" class="inline-block bg-indigo-100 text-indigo-700 px-8 py-3 rounded-full font-bold hover:bg-indigo-200 transition">Kembali ke Daftar Galeri</a>
            </div>
        </div>
    </section>
@endsection
