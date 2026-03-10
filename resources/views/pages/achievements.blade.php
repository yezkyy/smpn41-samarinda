@extends('layouts.frontend')

@section('content')
    <div class="bg-indigo-900 py-16 text-center text-white">
        <h1 class="text-3xl md:text-5xl font-extrabold mb-4">Prestasi Siswa</h1>
        <p class="text-indigo-200 uppercase tracking-widest text-sm font-bold">Kebanggaan SMP Negeri 41 Samarinda</p>
    </div>

    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($achievements as $prestasi)
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition duration-500 group border border-gray-100">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ $prestasi->image ? asset('storage/' . $prestasi->image) : 'https://images.unsplash.com/photo-1523240715632-997f023960ec?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80' }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="{{ $prestasi->title }}">
                        <div class="absolute top-4 right-4 bg-yellow-400 text-indigo-900 font-extrabold px-4 py-1 rounded-full text-sm shadow-md">
                            {{ $prestasi->year }}
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-xl font-extrabold text-indigo-900 mb-4 leading-tight group-hover:text-indigo-600 transition">{{ $prestasi->title }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ $prestasi->description }}</p>
                    </div>
                </div>
                @empty
                <p class="col-span-3 text-center py-12 text-gray-400 italic">Belum ada data prestasi yang diunggah.</p>
                @endforelse
            </div>
            <div class="mt-12">{{ $achievements->links() }}</div>
        </div>
    </section>
@endsection
