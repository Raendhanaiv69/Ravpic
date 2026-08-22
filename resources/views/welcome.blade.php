<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photobooth Dashboard</title>

    <!-- Google Font: Plus Jakarta Sans & Quicksand -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Quicksand:wght@600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .font-brand {
            font-family: 'Quicksand', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-[#FFF8EE] via-[#FFF0F3] to-[#FFEBF2] min-h-screen text-[#6E4B4B] antialiased selection:bg-pink-300 selection:text-pink-900">

    <!-- Top Glow Bar -->
    <div class="h-1.5 bg-gradient-to-r from-amber-300 via-rose-300 to-pink-300 w-full"></div>

    <!-- Navbar -->
    <nav class="bg-white/70 backdrop-blur-md border-b border-pink-100/80 sticky top-0 z-30 shadow-sm shadow-pink-500/5">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            
            <!-- Logo -->
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-amber-200 via-rose-200 to-pink-300 flex items-center justify-center text-xl shadow-inner border border-white/60 group-hover:scale-105 transition-transform">
                    📸
                </div>
                <span class="text-xl font-bold font-brand tracking-tight bg-gradient-to-r from-[#A34343] to-[#D96B82] bg-clip-text text-transparent">
                    Photobooth
                </span>
            </a>

            <div class="flex items-center gap-2">
                <span class="text-xs font-semibold px-3 py-1 rounded-full bg-pink-50 text-[#C25E71] border border-pink-200/60 shadow-sm">
                    ✨ Photo Booth App
                </span>
            </div>

        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 py-10">

        <!-- Header Title -->
        <div class="text-center mb-10">
            <h1 class="text-3xl md:text-4xl font-extrabold text-[#8C3A49] font-brand tracking-tight">
                Dashboard
            </h1>
            <p class="text-[#A57878] text-sm md:text-base mt-1.5 font-medium">
                Kelola dan abadikan setiap momen manismu di sini.
            </p>
        </div>

        <!-- Menu Action Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Take Photo -->
            <a href="{{ route('photobooth.index') }}" class="group relative bg-white/85 backdrop-blur-sm rounded-3xl p-6 border border-pink-100/90 shadow-sm hover:shadow-xl hover:shadow-pink-200/50 hover:-translate-y-1.5 transition-all duration-300 overflow-hidden flex flex-col justify-between">
                <div class="absolute -top-6 -right-6 w-24 h-24 bg-gradient-to-br from-amber-100 to-pink-100 rounded-full blur-sm -z-0 group-hover:scale-125 transition-transform duration-500"></div>

                <div class="relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#FFE79A] via-[#FFAAA6] to-[#FF8E9E] flex items-center justify-center text-2xl shadow-md shadow-pink-200/60 mb-5 group-hover:scale-110 transition-transform">
                        📷
                    </div>
                    <h2 class="text-lg font-bold text-[#7A3644] group-hover:text-[#D9536F] transition-colors">
                        Take Photo
                    </h2>
                    <p class="text-[#A57878] text-xs mt-2 leading-relaxed font-normal">
                        Mulai sesi foto baru menggunakan kamera laptop atau webcam.
                    </p>
                </div>

                <div class="relative z-10 mt-6 flex items-center text-xs font-bold text-[#E26D85] gap-1 group-hover:gap-2 transition-all">
                    Buka Kamera <span>→</span>
                </div>
            </a>

            <!-- Gallery -->
            <a href="{{ route('gallery.index') }}" class="group relative bg-white/85 backdrop-blur-sm rounded-3xl p-6 border border-pink-100/90 shadow-sm hover:shadow-xl hover:shadow-pink-200/50 hover:-translate-y-1.5 transition-all duration-300 overflow-hidden flex flex-col justify-between">
                <div class="absolute -top-6 -right-6 w-24 h-24 bg-gradient-to-br from-rose-100 to-amber-100 rounded-full blur-sm -z-0 group-hover:scale-125 transition-transform duration-500"></div>

                <div class="relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#FFD1DC] via-[#FFABAB] to-[#FFC3A0] flex items-center justify-center text-2xl shadow-md shadow-rose-200/60 mb-5 group-hover:scale-110 transition-transform">
                        🖼️
                    </div>
                    <h2 class="text-lg font-bold text-[#7A3644] group-hover:text-[#D9536F] transition-colors">
                        Gallery
                    </h2>
                    <p class="text-[#A57878] text-xs mt-2 leading-relaxed font-normal">
                        Lihat arsip hasil jepretan dan unduh foto strip kamu.
                    </p>
                </div>

                <div class="relative z-10 mt-6 flex items-center text-xs font-bold text-[#E26D85] gap-1 group-hover:gap-2 transition-all">
                    Lihat Galeri <span>→</span>
                </div>
            </a>

            <!-- Templates -->
            <a href="{{ route('templates.index') }}" class="group relative bg-white/85 backdrop-blur-sm rounded-3xl p-6 border border-pink-100/90 shadow-sm hover:shadow-xl hover:shadow-pink-200/50 hover:-translate-y-1.5 transition-all duration-300 overflow-hidden flex flex-col justify-between">
                <div class="absolute -top-6 -right-6 w-24 h-24 bg-gradient-to-br from-amber-100 to-rose-100 rounded-full blur-sm -z-0 group-hover:scale-125 transition-transform duration-500"></div>

                <div class="relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#FFE3A8] via-[#FFC7A2] to-[#FF9EAA] flex items-center justify-center text-2xl shadow-md shadow-amber-200/60 mb-5 group-hover:scale-110 transition-transform">
                        🎨
                    </div>
                    <h2 class="text-lg font-bold text-[#7A3644] group-hover:text-[#D9536F] transition-colors">
                        Templates
                    </h2>
                    <p class="text-[#A57878] text-xs mt-2 leading-relaxed font-normal">
                        Pilih & rancang frame foto lucu serta stiker aesthetic.
                    </p>
                </div>

                <div class="relative z-10 mt-6 flex items-center text-xs font-bold text-[#E26D85] gap-1 group-hover:gap-2 transition-all">
                    Pilih Frame <span>→</span>
                </div>
            </a>

            <!-- Settings -->
            <a href="{{ route('settings.index') }}" class="group relative bg-white/85 backdrop-blur-sm rounded-3xl p-6 border border-pink-100/90 shadow-sm hover:shadow-xl hover:shadow-pink-200/50 hover:-translate-y-1.5 transition-all duration-300 overflow-hidden flex flex-col justify-between">
                <div class="absolute -top-6 -right-6 w-24 h-24 bg-gradient-to-br from-pink-100 to-amber-100 rounded-full blur-sm -z-0 group-hover:scale-125 transition-transform duration-500"></div>

                <div class="relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#FFE9B1] via-[#FFA8B6] to-[#EA7C8F] flex items-center justify-center text-2xl shadow-md shadow-pink-200/60 mb-5 group-hover:scale-110 transition-transform">
                        ⚙️
                    </div>
                    <h2 class="text-lg font-bold text-[#7A3644] group-hover:text-[#D9536F] transition-colors">
                        Settings
                    </h2>
                    <p class="text-[#A57878] text-xs mt-2 leading-relaxed font-normal">
                        Pengaturan timer kamera, filter, cetak dan printer.
                    </p>
                </div>

                <div class="relative z-10 mt-6 flex items-center text-xs font-bold text-[#E26D85] gap-1 group-hover:gap-2 transition-all">
                    Atur Sistem <span>→</span>
                </div>
            </a>

        </div>

        <!-- Overview / Statistics -->
        <div class="mt-10">
            <h2 class="text-xl font-bold text-[#8C3A49] font-brand mb-4 flex items-center gap-2">
                <span>🌸</span> Overview
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Stat 1 -->
                <div class="relative bg-white/85 backdrop-blur-sm rounded-3xl p-6 border border-pink-100/90 shadow-sm overflow-hidden">
                    <div class="absolute -bottom-4 -left-4 w-20 h-20 bg-amber-100/50 rounded-full blur-lg"></div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-[#B87A86]">Total Photos</p>
                    <p class="text-4xl font-extrabold text-[#7A3644] font-brand mt-2">128</p>
                    <span class="inline-block mt-2 text-xs font-semibold text-rose-500 bg-rose-50 px-2.5 py-1 rounded-full border border-rose-200/50">
                        📸 Jepretan tersimpan
                    </span>
                </div>

                <!-- Stat 2 -->
                <div class="relative bg-white/85 backdrop-blur-sm rounded-3xl p-6 border border-pink-100/90 shadow-sm overflow-hidden">
                    <div class="absolute -bottom-4 -right-4 w-20 h-20 bg-pink-100/50 rounded-full blur-lg"></div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-[#B87A86]">Templates</p>
                    <p class="text-4xl font-extrabold text-[#7A3644] font-brand mt-2">8</p>
                    <span class="inline-block mt-2 text-xs font-semibold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-full border border-amber-200/50">
                        🎨 Frame aktif
                    </span>
                </div>

                <!-- Stat 3 -->
                <div class="relative bg-white/85 backdrop-blur-sm rounded-3xl p-6 border border-pink-100/90 shadow-sm overflow-hidden">
                    <div class="absolute -bottom-4 -left-4 w-20 h-20 bg-rose-100/50 rounded-full blur-lg"></div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-[#B87A86]">Sessions</p>
                    <p class="text-4xl font-extrabold text-[#7A3644] font-brand mt-2">24</p>
                    <span class="inline-block mt-2 text-xs font-semibold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-200/50">
                        ✨ Sesi hari ini
                    </span>
                </div>

            </div>
        </div>

    </main>

</body>
</html>