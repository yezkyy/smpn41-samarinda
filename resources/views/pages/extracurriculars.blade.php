@extends('layouts.frontend')

@section('content')
    <!-- Header Page -->
    <div class="bg-indigo-900 py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4">Ekstrakurikuler</h1>
            <p class="text-indigo-200 uppercase tracking-widest text-sm font-bold">Wadah Kreativitas & Bakat Siswa</p>
        </div>
    </div>

    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                @forelse($extracurriculars as $eskul)
                <div class="flex flex-col md:flex-row bg-gray-50 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300">
                    <div class="md:w-1/2 h-64 md:h-auto overflow-hidden">
                        <img src="{{ $eskul->image ? asset('storage/' . $eskul->image) : 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80' }}" 
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" alt="{{ $eskul->name }}">
                    </div>
                    <div class="md:w-1/2 p-8 flex flex-col justify-center">
                        <h3 class="text-2xl font-bold text-indigo-900 mb-4">{{ $eskul->name }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-6">
                            {{ $eskul->description ?: 'Kegiatan pembentukan karakter dan bakat siswa di SMP Negeri 41 Samarinda.' }}
                        </p>
                        <div class="flex items-center text-indigo-600 font-bold text-xs uppercase tracking-widest">
                            <span class="w-10 h-0.5 bg-indigo-600 mr-3"></span> Kegiatan Unggulan
                        </div>
                    </div>
                </div>
                @empty
                <p class="col-span-2 text-center text-gray-500 italic">Belum ada data ekstrakurikuler.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
