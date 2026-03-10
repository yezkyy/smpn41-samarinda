@extends('layouts.frontend')

@section('content')
    <!-- Header Page -->
    <div class="bg-indigo-900 py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4">Guru & Staf</h1>
            <p class="text-indigo-200">Tenaga pengajar profesional SMP Negeri 41 Samarinda</p>
        </div>
    </div>

    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse($teachers as $teacher)
                <a href="{{ route('teachers.show', $teacher) }}" class="bg-white p-6 rounded-2xl shadow-sm text-center group hover:shadow-xl transition-all duration-300 border border-transparent hover:border-indigo-100 flex flex-col items-center">
                    <div class="relative mb-6">
                        <div class="w-32 h-32 md:w-40 md:h-40 mx-auto rounded-full overflow-hidden border-4 border-white shadow-md group-hover:border-indigo-600 transition-colors bg-slate-100 flex items-center justify-center">
                            @if($teacher->photo)
                                <img src="{{ asset('storage/' . $teacher->photo) }}" class="w-full h-full object-cover" alt="{{ $teacher->name }}">
                            @else
                                <i class="fa-solid fa-user-tie text-5xl text-slate-300"></i>
                            @endif
                        </div>
                    </div>
                    <h3 class="font-bold text-lg text-indigo-900 mb-1 leading-tight group-hover:text-indigo-600 transition-colors">{{ $teacher->name }}</h3>
                    <p class="text-indigo-600 text-sm font-semibold mb-2">{{ $teacher->subject ?: 'Staf Sekolah' }}</p>
                    <p class="text-gray-400 text-[10px] uppercase font-bold tracking-widest border-t border-gray-50 pt-2 w-full">{{ $teacher->position ?: 'Guru Pengajar' }}</p>
                </a>
                @empty
                <p class="col-span-4 text-center text-gray-500 italic">Belum ada data guru.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
