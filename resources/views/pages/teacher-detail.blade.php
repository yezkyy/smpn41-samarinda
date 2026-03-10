@extends('layouts.frontend')

@section('content')
    <!-- Header Page -->
    <div class="bg-indigo-900 pt-20 pb-32">
        <div class="container mx-auto px-4">
            <a href="{{ route('teachers.index') }}" class="inline-flex items-center text-indigo-200 hover:text-white mb-8 transition-colors">
                <i class="fa-solid fa-arrow-left mr-2"></i>
                Kembali ke Daftar Guru
            </a>
        </div>
    </div>

    <div class="container mx-auto px-4 -mt-24 mb-20">
        <div class="max-w-5xl mx-auto">
            <div class="bg-white rounded-[2.5rem] shadow-xl overflow-hidden border border-gray-100">
                <div class="grid grid-cols-1 lg:grid-cols-12">
                    <!-- Sidebar Profil -->
                    <div class="lg:col-span-4 bg-slate-50 p-8 md:p-12 flex flex-col items-center border-r border-gray-100">
                        <div class="w-48 h-48 md:w-56 md:h-56 rounded-[3rem] overflow-hidden border-8 border-white shadow-lg mb-8 ring-1 ring-slate-200 bg-slate-100 flex items-center justify-center">
                            @if($teacher->photo)
                                <img src="{{ asset('storage/' . $teacher->photo) }}" class="w-full h-full object-cover" alt="{{ $teacher->name }}">
                            @else
                                <i class="fa-solid fa-user-tie text-7xl text-slate-300"></i>
                            @endif
                        </div>
                        
                        <h2 class="text-2xl font-black text-indigo-900 text-center leading-tight mb-2">{{ $teacher->name }}</h2>
                        <div class="inline-flex items-center px-4 py-1.5 bg-indigo-600 text-white rounded-full text-xs font-bold uppercase tracking-widest mb-6">
                            {{ $teacher->position ?: 'Guru Pengajar' }}
                        </div>

                        <div class="w-full space-y-4">
                            @if($teacher->nip)
                            <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm">
                                <span class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-1">NIP</span>
                                <span class="text-sm font-bold text-gray-700">{{ $teacher->nip }}</span>
                            </div>
                            @endif

                            @if($teacher->email)
                            <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm">
                                <span class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-1">Email</span>
                                <a href="mailto:{{ $teacher->email }}" class="text-sm font-bold text-indigo-600 hover:underline break-words">{{ $teacher->email }}</a>
                            </div>
                            @endif

                            @if($teacher->phone)
                            <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm">
                                <span class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-1">Kontak</span>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $teacher->phone) }}" target="_blank" class="text-sm font-bold text-emerald-600 flex items-center gap-2">
                                    <i class="fa-brands fa-whatsapp text-lg"></i>
                                    {{ $teacher->phone }}
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div class="lg:col-span-8 p-8 md:p-12 lg:p-16">
                        @if($teacher->motivation_message)
                        <div class="relative mb-12 italic">
                            <i class="fa-solid fa-quote-left text-indigo-100 text-6xl absolute -top-6 -left-4 -z-0"></i>
                            <p class="relative z-10 text-xl md:text-2xl text-slate-600 leading-relaxed font-medium">
                                "{{ $teacher->motivation_message }}"
                            </p>
                        </div>
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                            <div>
                                <h4 class="text-[11px] font-black text-indigo-600 uppercase tracking-[0.2em] mb-4 flex items-center gap-3">
                                    <span class="w-8 h-8 rounded-xl bg-indigo-50 flex items-center justify-center">
                                        <i class="fa-solid fa-calendar-day"></i>
                                    </span>
                                    Tempat, Tgl Lahir
                                </h4>
                                <p class="text-gray-700 font-bold ml-11">{{ $teacher->birth_place_date ?: '-' }}</p>
                            </div>
                            <div>
                                <h4 class="text-[11px] font-black text-indigo-600 uppercase tracking-[0.2em] mb-4 flex items-center gap-3">
                                    <span class="w-8 h-8 rounded-xl bg-indigo-50 flex items-center justify-center">
                                        <i class="fa-solid fa-book-open"></i>
                                    </span>
                                    Mata Pelajaran
                                </h4>
                                <p class="text-gray-700 font-bold ml-11">{{ $teacher->subject ?: 'Umum / Staf' }}</p>
                            </div>
                        </div>

                        <div class="mb-12">
                            <h4 class="text-[11px] font-black text-indigo-600 uppercase tracking-[0.2em] mb-4 flex items-center gap-3">
                                <span class="w-8 h-8 rounded-xl bg-indigo-50 flex items-center justify-center">
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                                Alamat
                            </h4>
                            <p class="text-gray-700 font-medium leading-relaxed ml-11">{{ $teacher->address ?: '-' }}</p>
                        </div>

                        <div class="space-y-12">
                            @if($teacher->education_history)
                            <div>
                                <h4 class="text-[11px] font-black text-indigo-600 uppercase tracking-[0.2em] mb-6 flex items-center gap-3">
                                    <span class="w-8 h-8 rounded-xl bg-indigo-50 flex items-center justify-center">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                    </span>
                                    Riwayat Pendidikan
                                </h4>
                                <div class="ml-11 border-l-2 border-indigo-50 pl-8 space-y-6">
                                    @foreach(explode("\n", $teacher->education_history) as $history)
                                        @if(trim($history))
                                        <div class="relative">
                                            <div class="absolute -left-[41px] top-1.5 w-4 h-4 rounded-full bg-white border-4 border-indigo-500 shadow-sm"></div>
                                            <p class="text-gray-700 font-medium">{{ $history }}</p>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            @if($teacher->employment_history)
                            <div>
                                <h4 class="text-[11px] font-black text-indigo-600 uppercase tracking-[0.2em] mb-6 flex items-center gap-3">
                                    <span class="w-8 h-8 rounded-xl bg-indigo-50 flex items-center justify-center">
                                        <i class="fa-solid fa-briefcase"></i>
                                    </span>
                                    Riwayat Pekerjaan
                                </h4>
                                <div class="ml-11 border-l-2 border-indigo-50 pl-8 space-y-6">
                                    @foreach(explode("\n", $teacher->employment_history) as $history)
                                        @if(trim($history))
                                        <div class="relative">
                                            <div class="absolute -left-[41px] top-1.5 w-4 h-4 rounded-full bg-white border-4 border-indigo-500 shadow-sm"></div>
                                            <p class="text-gray-700 font-medium">{{ $history }}</p>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
