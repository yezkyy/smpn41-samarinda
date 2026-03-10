@extends('layouts.frontend')

@section('content')
    <div class="bg-indigo-900 py-16 text-center text-white">
        <h1 class="text-3xl md:text-5xl font-extrabold mb-4">Download Dokumen</h1>
        <p class="text-indigo-200">Unduh berkas dan dokumen resmi SMP Negeri 41 Samarinda</p>
    </div>

    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 max-w-5xl">
            <div class="overflow-hidden bg-white shadow-xl rounded-2xl border border-gray-100">
                <table class="w-full text-left">
                    <thead class="bg-indigo-600 text-white uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-8 py-4">Nama Dokumen</th>
                            <th class="px-8 py-4">Keterangan</th>
                            <th class="px-8 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($documents as $doc)
                        <tr class="hover:bg-indigo-50 transition duration-150 group">
                            <td class="px-8 py-6">
                                <div class="flex items-center">
                                    <svg class="w-8 h-8 text-red-500 mr-4" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"></path></svg>
                                    <span class="font-bold text-indigo-900 text-sm">{{ $doc->title }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-sm text-gray-500 italic">{{ $doc->description ?: '-' }}</td>
                            <td class="px-8 py-6 text-center">
                                <a href="{{ asset('storage/' . $doc->file) }}" target="_blank" class="bg-indigo-600 text-white px-6 py-2 rounded-full text-xs font-bold hover:bg-indigo-700 transition shadow-md group-hover:scale-105 inline-block">Download</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-8 py-12 text-center text-gray-400 italic">Belum ada dokumen yang tersedia untuk diunduh.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-12">{{ $documents->links() }}</div>
        </div>
    </section>
@endsection
