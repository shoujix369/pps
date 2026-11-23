<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk — {{ config('app.name', 'aspirasiMU') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        *, *::before, *::after {
            box-sizing: border-box;
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

    <div class="min-h-screen w-full flex flex-col lg:flex-row">
        <section class="w-full lg:w-[56%] bg-[#0D1117] text-white flex flex-col justify-between p-8 sm:p-14 lg:p-20">

            <header class="flex items-center justify-between">
                <a href="/" class="inline-flex items-center gap-3 no-underline text-white">
                    <span class="w-2.5 h-2.5 bg-[#FACC15] inline-block"></span>
                    <span class="text-xs font-bold tracking-[0.24em] uppercase text-white/90">
                        aspirasiMU
                    </span>
                </a>
                </span>
            </header>

            <div class="my-16 lg:my-0 max-w-lg">
                <h1 class="font-judul text-5xl sm:text-6xl xl:text-7xl font-normal leading-[1.04] tracking-tight text-white">
                    Suara nyata,<br>
                    perubahan <span class="italic text-[#FACC15]">dimulai</span>.
                </h1>

                <p class="font-teks mt-6 text-sm sm:text-base leading-relaxed text-white/65 max-w-md">
                    Ruang pengaduan dan aspirasi sekolah yang tenang, jelas, dan terarah untuk lingkungan belajar yang lebih baik.
                </p>
            </div>

            <footer class="flex flex-wrap items-center justify-between gap-4 text-xs text-white/45 pt-6 border-t border-white/10">
                <span>Akses terpadu: Siswa &middot; Petugas &middot; Admin</span>
                <span>&copy; {{ date('Y') }}</span>
            </footer>
        </section>

        <section class="w-full lg:w-[44%] bg-[#F4F5F7] flex items-center justify-center p-6 sm:p-10 lg:p-16">
            <div class="w-full max-w-md bg-white border border-black/10 p-7 sm:p-10">

                <div class="mb-8">
                    <span class="text-[11px] font-bold tracking-[0.22em] uppercase text-black/45 block mb-2">
                        PORTAL MASUK
                    </span>
                    <h2 class="font-judul text-4xl sm:text-5xl font-normal text-[#0D1117] leading-tight">
                        Masuk ke Akun
                    </h2>
                    <p class="font-teks mt-2 text-xs sm:text-sm text-[#525866]">
                        Gunakan email dan kata sandi yang telah terdaftar.
                    </p>
                </div>

                @if (session('status'))
                    <div class="mb-6 p-3.5 bg-amber-50 border-l-2 border-[#0D1117] text-xs text-[#0D1117]">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-[11px] font-bold tracking-[0.18em] uppercase text-[#0D1117] mb-2">
                            Alamat Email
                        </label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="nama@sekolah.sch.id"
                            class="w-full bg-[#FAFAFA] border border-black/15 px-4 py-3 text-sm text-[#0D1117] placeholder:text-black/30 focus:outline-none focus:border-[#0D1117] focus:bg-white transition"
                        />
                        @error('email')
                            <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-[11px] font-bold tracking-[0.18em] uppercase text-[#0D1117]">
                                Kata Sandi
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs text-[#525866] hover:text-[#0D1117] underline underline-offset-4">
                                    Lupa sandi?
                                </a>
                            @endif
                        </div>

                        <div class="relative flex items-center">
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Masukkan kata sandi"
                                class="w-full bg-[#FAFAFA] border border-black/15 pl-4 pr-20 py-3 text-sm text-[#0D1117] placeholder:text-black/30 focus:outline-none focus:border-[#0D1117] focus:bg-white transition"
                            />
                            <button
                                type="button"
                                onclick="togglePassword()"
                                class="absolute right-3 px-2 py-1 text-[10px] font-bold tracking-[0.16em] uppercase text-[#0D1117]/70 hover:text-[#0D1117] cursor-pointer"
                            >
                                <span id="toggleText">LIHAT</span>
                            </button>
                        </div>

                        @error('password')
                            <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-1">
                        <label for="remember_me" class="inline-flex items-center gap-2.5 cursor-pointer select-none">
                            <input
                                id="remember_me"
                                type="checkbox"
                                name="remember"
                                class="w-4 h-4 accent-[#0D1117] cursor-pointer"
                            />
                            <span class="text-xs text-[#525866]">Ingat sesi saya</span>
                        </label>
                    </div>

                    <div class="pt-2">
                        <button
                            type="submit"
                            class="w-full bg-[#0D1117] hover:bg-[#1E242D] text-white py-3.5 px-5 text-xs font-bold tracking-[0.22em] uppercase flex items-center justify-between transition cursor-pointer"
                        >
                            <span>Masuk</span>
                            <span>&rarr;</span>
                        </button>
                    </div>
                </form>
            </div>
        </section>

    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const label = document.getElementById('toggleText');
            if (input.type === 'password') {
                input.type = 'text';
                label.textContent = 'SEMBUNYI';
            } else {
                input.type = 'password';
                label.textContent = 'LIHAT';
            }
        }
    </script>
</body>
</html>

