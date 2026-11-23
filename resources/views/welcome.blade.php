<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'aspirasiMU') }} — Sistem Pengaduan Sekolah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }
        html {
            scroll-behavior: smooth;
        }
        body {
            margin: 0;
            font-family: 'LINESeedJP', system-ui, -apple-system, sans-serif;
            background-color: #F4F5F7;
            color: #0D1117;
        }
        .font-judul {
            font-family: 'Cormorant Garamond', Georgia, serif;
        }
        .font-teks {
            font-family: 'LINESeedJP', system-ui, -apple-system, sans-serif;
        }
    </style>
</head>
<body class="font-teks antialiased bg-[#F4F5F7] text-[#0D1117]">

    <header class="w-full bg-[#0D1117] text-white border-b border-white/10">
        <div class="max-w-6xl mx-auto px-6 sm:px-10 h-20 flex items-center justify-between gap-6">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3 no-underline text-white">
                <span class="w-2.5 h-2.5 bg-[#FACC15] inline-block"></span>
                <span class="text-xs font-bold tracking-[0.24em] uppercase text-white">
                    aspirasiMU
                </span>
            </a>

            <nav class="hidden md:flex items-center gap-8 text-xs tracking-[0.14em] uppercase text-white/70">
                <a href="#tentang" class="hover:text-white transition no-underline text-white/70">Tentang</a>
                <a href="#alur" class="hover:text-white transition no-underline text-white/70">Alur Kerja</a>
                <a href="#peran" class="hover:text-white transition no-underline text-white/70">Peran</a>
            </nav>

            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-4 py-2.5 bg-[#FACC15] text-[#0D1117] text-xs font-bold tracking-[0.18em] uppercase no-underline hover:bg-amber-300 transition">
                        Dasbor &rarr;
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2.5 bg-[#FACC15] text-[#0D1117] text-xs font-bold tracking-[0.18em] uppercase no-underline hover:bg-amber-300 transition">
                        Masuk &rarr;
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <section class="w-full bg-[#0D1117] text-white">
        <div class="max-w-6xl mx-auto px-6 sm:px-10 py-20 sm:py-28 lg:py-32 grid grid-cols-1 lg:grid-cols-12 gap-12 items-end">

            <div class="lg:col-span-8">
                <p class="text-xs font-bold tracking-[0.22em] uppercase text-[#FACC15] mb-5">
                    Layanan Pengaduan &amp; Aspirasi Sekolah
                </p>

                <h1 class="font-judul text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-normal leading-[1.02] tracking-tight text-white">
                    Ruang dengar untuk<br>
                    lingkungan <span class="italic text-[#FACC15]">sekolah</span>.
                </h1>

                <p class="font-teks mt-7 text-sm sm:text-base leading-relaxed text-white/70 max-w-xl">
                    Sampaikan laporan fasilitas, kendala kegiatan belajar, maupun aspirasi harian secara terstruktur agar setiap suara mendapat tindak lanjut yang jelas.
                </p>

                <div class="mt-9 flex flex-wrap items-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center gap-3 px-6 py-3.5 bg-[#FACC15] text-[#0D1117] text-xs font-bold tracking-[0.2em] uppercase no-underline hover:bg-amber-300 transition">
                            <span>Buka Dasbor</span>
                            <span>&rarr;</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center gap-3 px-6 py-3.5 bg-[#FACC15] text-[#0D1117] text-xs font-bold tracking-[0.2em] uppercase no-underline hover:bg-amber-300 transition">
                            <span>Masuk ke Portal</span>
                            <span>&rarr;</span>
                        </a>
                    @endauth

                    <a href="#alur" class="inline-flex items-center gap-2 px-5 py-3.5 border border-white/20 text-xs font-bold tracking-[0.18em] uppercase text-white/85 no-underline hover:border-white/50 transition">
                        <span>Pelajari Alur</span>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-4 border-t lg:border-t-0 lg:border-l border-white/15 pt-8 lg:pt-0 lg:pl-8">
                <span class="text-[11px] font-bold tracking-[0.2em] uppercase text-white/45 block mb-3">
                    AKSES TERKELOLA
                </span>
                <h2 class="font-judul text-3xl sm:text-4xl font-normal text-white leading-snug">
                    Satu pintu untuk tiga peran utama.
                </h2>
                <p class="font-teks mt-3 text-xs sm:text-sm leading-relaxed text-white/60">
                    Akun dikelola langsung oleh pihak sekolah sehingga pelaporan tetap tertib dan dapat dipertanggungjawabkan.
                </p>
            </div>

        </div>
    </section>
    <section id="tentang" class="w-full bg-[#F4F5F7] border-b border-black/10">
        <div class="max-w-6xl mx-auto px-6 sm:px-10 py-20 sm:py-24 grid grid-cols-1 lg:grid-cols-12 gap-10">
            <div class="lg:col-span-4">
                <span class="text-[11px] font-bold tracking-[0.22em] uppercase text-black/45 block mb-2">
                    01 / TENTANG SISTEM
                </span>
                <h2 class="font-judul text-4xl sm:text-5xl font-normal text-[#0D1117] leading-tight">
                    Lebih rapi daripada catatan terpisah.
                </h2>
            </div>

            <div class="lg:col-span-8 max-w-2xl">
                <p class="font-teks text-sm sm:text-base leading-relaxed text-[#3D434D]">
                    Banyak keluhan di sekolah berhenti hanya sebagai obrolan singkat atau pesan yang mudah terlewat. Melalui portal ini, setiap pengaduan tercatat dengan detail yang jelas, mudah dipantau statusnya, dan ditangani oleh petugas yang sesuai.
                </p>
                <p class="font-teks mt-4 text-sm sm:text-base leading-relaxed text-[#3D434D]">
                    Fokus utamanya sederhana, yakni komunikasi terbuka antara siswa, petugas lapangan, dan administrasi sekolah tanpa proses yang berbelit.
                </p>
            </div>
        </div>
    </section>

    <section id="alur" class="w-full bg-[#F4F5F7] border-b border-black/10">
        <div class="max-w-6xl mx-auto px-6 sm:px-10 py-20 sm:py-24">
            <div class="max-w-xl mb-14">
                <span class="text-[11px] font-bold tracking-[0.22em] uppercase text-black/45 block mb-2">
                    02 / ALUR KERJA
                </span>
                <h2 class="font-judul text-4xl sm:text-5xl font-normal text-[#0D1117] leading-tight">
                    Langkah jelas dari laporan hingga selesai.
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="border-t border-black/20 pt-6">
                    <span class="text-xs font-bold tracking-[0.2em] text-[#0D1117]/50 block mb-3">
                        TAHAP 01
                    </span>
                    <h3 class="font-judul text-3xl font-normal text-[#0D1117]">
                        Pengajuan Laporan
                    </h3>
                    <p class="font-teks mt-3 text-sm leading-relaxed text-[#525866]">
                        Siswa menuliskan detail pengaduan atau aspirasi beserta lokasi dan keterangan yang diperlukan.
                    </p>
                </div>

                <div class="border-t border-black/20 pt-6">
                    <span class="text-xs font-bold tracking-[0.2em] text-[#0D1117]/50 block mb-3">
                        TAHAP 02
                    </span>
                    <h3 class="font-judul text-3xl font-normal text-[#0D1117]">
                        Peninjauan &amp; Tindak Lanjut
                    </h3>
                    <p class="font-teks mt-3 text-sm leading-relaxed text-[#525866]">
                        Admin dan petugas memverifikasi laporan, memperbarui status penanganan, serta memberikan tanggapan.
                    </p>
                </div>

                <div class="border-t border-black/20 pt-6">
                    <span class="text-xs font-bold tracking-[0.2em] text-[#0D1117]/50 block mb-3">
                        TAHAP 03
                    </span>
                    <h3 class="font-judul text-3xl font-normal text-[#0D1117]">
                        Pemantauan &amp; Arsip
                    </h3>
                    <p class="font-teks mt-3 text-sm leading-relaxed text-[#525866]">
                        Setiap perkembangan tercatat rapi sehingga riwayat penanganan dapat dipantau dan direkap.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="peran" class="w-full bg-white border-b border-black/10">
        <div class="max-w-6xl mx-auto px-6 sm:px-10 py-20 sm:py-24">
            <div class="max-w-xl mb-14">
                <span class="text-[11px] font-bold tracking-[0.22em] uppercase text-black/45 block mb-2">
                    03 / PERAN PENGGUNA
                </span>
                <h2 class="font-judul text-4xl sm:text-5xl font-normal text-[#0D1117] leading-tight">
                    Tanggung jawab terbagi sesuai peran.
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div>
                    <h3 class="font-judul text-3xl font-normal text-[#0D1117]">Siswa</h3>
                    <p class="font-teks mt-2 text-sm leading-relaxed text-[#525866]">
                        Mengirimkan pengaduan atau aspirasi baru dan memantau progres penyelesaiannya.
                    </p>
                </div>

                <div>
                    <h3 class="font-judul text-3xl font-normal text-[#0D1117]">Petugas</h3>
                    <p class="font-teks mt-2 text-sm leading-relaxed text-[#525866]">
                        Menangani laporan di lapangan, memperbarui status proses, dan menuliskan catatan tindak lanjut.
                    </p>
                </div>

                <div>
                    <h3 class="font-judul text-3xl font-normal text-[#0D1117]">Admin</h3>
                    <p class="font-teks mt-2 text-sm leading-relaxed text-[#525866]">
                        Mengatur data pengguna, mengawasi alur pengaduan, dan mengelola rekapitulasi sistem.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <footer class="w-full bg-[#0D1117] text-white">
        <div class="max-w-6xl mx-auto px-6 sm:px-10 py-16 sm:py-20 flex flex-col sm:flex-row sm:items-center justify-between gap-8 border-b border-white/10">
            <div>
                <h2 class="font-judul text-4xl sm:text-5xl font-normal text-white leading-tight">
                    Siap mengakses portal?
                </h2>
                <p class="font-teks mt-2 text-sm text-white/60">
                    Masuk menggunakan akun sekolah Anda untuk mulai menggunakan layanan.
                </p>
            </div>

            <div>
                @auth
                    <a href="{{ url('/dashboard') }}" class="inline-flex items-center gap-3 px-6 py-3.5 bg-[#FACC15] text-[#0D1117] text-xs font-bold tracking-[0.2em] uppercase no-underline hover:bg-amber-300 transition">
                        <span>Ke Dasbor</span>
                        <span>&rarr;</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-3 px-6 py-3.5 bg-[#FACC15] text-[#0D1117] text-xs font-bold tracking-[0.2em] uppercase no-underline hover:bg-amber-300 transition">
                        <span>Masuk Sekarang</span>
                        <span>&rarr;</span>
                    </a>
                @endauth
            </div>
        </div>

        <div class="max-w-6xl mx-auto px-6 sm:px-10 py-6 flex flex-wrap items-center justify-between gap-4 text-xs text-white/45">
            <span>aspirasiMU &middot; Sistem Pengaduan Sekolah</span>
            <span>&copy; {{ date('Y') }}</span>
        </div>
    </footer>

</body>
</html>