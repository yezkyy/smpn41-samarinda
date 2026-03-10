@extends('layouts.frontend')

@section('content')
    <div class="bg-indigo-900 py-16 text-center text-white">
        <h1 class="text-3xl md:text-5xl font-extrabold mb-4 uppercase tracking-widest">Hubungi Kami</h1>
        <p class="text-indigo-200 uppercase tracking-widest text-sm font-bold">Layanan Informasi SMP Negeri 41 Samarinda</p>
    </div>

    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-16 max-w-6xl mx-auto">
                
                <!-- Info Section -->
                <div class="w-full lg:w-1/2 space-y-12">
                    <div>
                        <h2 class="text-3xl font-bold text-indigo-900 mb-6">Informasi Kontak</h2>
                        <p class="text-gray-600 leading-relaxed mb-8">
                            Kami siap melayani pertanyaan seputar pendaftaran, kurikulum, atau informasi umum lainnya mengenai SMP Negeri 41 Samarinda. Silakan hubungi kami melalui saluran berikut:
                        </p>
                        
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="bg-indigo-100 p-3 rounded-xl mr-4 text-indigo-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 uppercase tracking-wider text-xs mb-1">Alamat</h4>
                                    <p class="text-gray-600 text-sm">Jl. Ir. H. Nusyirwan Ismail, Kec. Samarinda Ulu, Kota Samarinda, Kalimantan Timur</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-indigo-100 p-3 rounded-xl mr-4 text-indigo-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 uppercase tracking-wider text-xs mb-1">Email</h4>
                                    <p class="text-gray-600 text-sm">smpnegeri41samarinda@gmail.com</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-indigo-100 p-3 rounded-xl mr-4 text-indigo-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 uppercase tracking-wider text-xs mb-1">Telepon / WhatsApp</h4>
                                    <p class="text-gray-600 text-sm">0823-8417-9874 / 0821-3651-5265</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-8 border-t border-gray-100">
                        <h4 class="font-bold text-gray-800 uppercase tracking-widest text-sm mb-6">Media Sosial</h4>
                        <div class="flex space-x-4 uppercase font-extrabold text-xs">
                            <span class="text-red-600">Youtube: Espadji TV</span>
                            <span class="text-pink-600">Instagram: smpn41_samarinda</span>
                        </div>
                    </div>
                </div>

                <!-- Map Section -->
                <div class="w-full lg:w-1/2">
                    <div class="bg-gray-200 rounded-3xl overflow-hidden h-[450px] lg:h-full shadow-2xl border-4 border-white">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59037.60228509152!2d117.17413829334951!3d-0.5233145817275151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df5d50535e09cb3%3A0xd2a10c214835574a!2sSekolah%20Menengah%20Pertama%20Negeri%2041%20Samarinda!5e1!3m2!1sid!2sid!4v1772950878655!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
