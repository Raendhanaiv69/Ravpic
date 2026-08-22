<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mawsnapbooth ✨ - Viral Aesthetic Photobooth</title>

    <!-- Google Font: Plus Jakarta Sans & Quicksand -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Quicksand:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .font-brand {
            font-family: 'Quicksand', sans-serif;
        }
        @keyframes float-badge {
            0%, 100% { transform: translateY(0px) rotate(-2deg); }
            50% { transform: translateY(-5px) rotate(2deg); }
        }
        .animate-float {
            animation: float-badge 3s ease-in-out infinite;
        }
        @keyframes pulse-glow {
            0%, 100% { opacity: 0.6; transform: scale(1); }
            50% { opacity: 0.9; transform: scale(1.08); }
        }
        .animate-glow {
            animation: pulse-glow 4s ease-in-out infinite;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-[#FFF8EE] via-[#FFF0F3] to-[#FFEBF2] min-h-screen text-[#6E4B4B] antialiased selection:bg-pink-300 selection:text-pink-900 flex flex-col justify-between">

    <!-- Top Accent Bar -->
    <div class="h-1.5 bg-gradient-to-r from-amber-300 via-rose-300 to-pink-400 w-full shrink-0"></div>

    <!-- Header Navbar -->
    <nav class="bg-white/70 backdrop-blur-md border-b border-pink-100/80 sticky top-0 z-30 shadow-sm shadow-pink-500/5">
        <div class="max-w-7xl mx-auto px-6 py-3.5 flex justify-between items-center">
            
            <!-- Logo -->
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-amber-200 via-rose-200 to-pink-300 flex items-center justify-center text-xl shadow-inner border border-white/60 group-hover:scale-105 transition-transform">
                    📸
                </div>
                <div>
                    <h1 class="text-xl font-bold font-brand tracking-tight bg-gradient-to-r from-[#8C3A49] to-[#D96B82] bg-clip-text text-transparent leading-none">
                        mawsnapbooth ✨
                    </h1>
                    <span class="text-[10px] text-[#A57878] font-bold tracking-wider uppercase">Made For Your FOMO</span>
                </div>
            </a>

            <!-- Right Nav Badges & CTA -->
            <div class="flex items-center gap-2.5">
                <!-- Instagram Link Developer -->
                <a href="https://instagram.com/raemiv_" target="_blank" rel="noopener noreferrer" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-pink-50 text-[#8C3A49] border border-pink-200 text-xs font-bold hover:bg-pink-100/80 hover:scale-105 transition-all shadow-sm">
                    <span>📸</span> @raemiv_
                </a>

                <a href="{{ route('templates.index') }}" class="px-4 py-2 rounded-xl bg-gradient-to-r from-[#FFAAA6] via-[#FF8E9E] to-[#EA7C8F] text-white text-xs md:text-sm font-bold shadow-md shadow-rose-300/40 hover:opacity-95 active:scale-95 transition-all flex items-center gap-1.5">
                    <span>⚡</span> Gas Foto
                </a>
            </div>

        </div>
    </nav>

    <!-- Main Workspace -->
    <main class="max-w-7xl mx-auto px-6 py-8 w-full">

        <!-- Hero Banner Gen-Z Vibe -->
        <div class="relative w-full rounded-3xl bg-gradient-to-r from-rose-400 via-pink-400 to-amber-300 p-8 md:p-12 mb-10 overflow-hidden shadow-xl shadow-rose-300/30 text-white flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/20 rounded-full blur-2xl pointer-events-none animate-glow"></div>
            <div class="absolute top-4 left-6 text-3xl opacity-30 select-none">🫧</div>
            <div class="absolute bottom-4 right-1/2 text-2xl opacity-40 select-none">✨</div>

            <div class="relative z-10 max-w-xl text-center md:text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/25 backdrop-blur-md border border-white/40 text-xs font-extrabold tracking-wide mb-3 animate-float">
                    <span>👾</span> Dibuat oleh developer introvert yang fomo
                </div>
                <h2 class="text-3xl md:text-5xl font-extrabold font-brand tracking-tight leading-tight drop-shadow-sm">
                    Abadikan Momen Lucu Bareng Bestie! 🫶
                </h2>
                <p class="mt-3 text-sm md:text-base text-pink-50 font-medium leading-relaxed">
                    Nggak perlu antre di mall! Cobain filter aquarium ikan mas berenang atau coret-coret gemas langsung di atas kamera kamu secara gratis.
                </p>
                <div class="mt-6 flex flex-wrap items-center justify-center md:justify-start gap-3">
                    <a href="{{ route('templates.index') }}" class="px-6 py-3 rounded-2xl bg-white text-[#8C3A49] font-extrabold text-sm shadow-lg hover:bg-pink-50 hover:scale-105 active:scale-95 transition-all flex items-center gap-2">
                        <span>✨</span> Mulai Pilih Frame
                    </a>
                    <a href="{{ route('gallery.index') }}" class="px-5 py-3 rounded-2xl bg-white/20 backdrop-blur-sm border border-white/50 text-white font-bold text-sm hover:bg-white/30 transition-all flex items-center gap-1.5">
                        <span>🖼️</span> Buka Galeri
                    </a>
                </div>
            </div>

            <!-- Sticker Graphic Floating -->
            <div class="relative z-10 flex gap-3 select-none">
                <div class="bg-white/90 backdrop-blur-md p-3 rounded-2xl shadow-xl rotate-3 border border-pink-100 flex flex-col items-center">
                    <span class="text-4xl">🐠</span>
                    <span class="text-[10px] font-extrabold text-rose-500 mt-1">#AquariumVibe</span>
                </div>
                <div class="bg-white/90 backdrop-blur-md p-3 rounded-2xl shadow-xl -rotate-6 border border-pink-100 flex flex-col items-center mt-6">
                    <span class="text-4xl">🎨</span>
                    <span class="text-[10px] font-extrabold text-pink-600 mt-1">#DoodleMirror</span>
                </div>
            </div>
        </div>

        <!-- Section: Frame Viral Paling Hits -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-2xl font-extrabold text-[#8C3A49] font-brand tracking-tight flex items-center gap-2">
                    <span>🌟</span> Frame Viral Paling FYP
                </h3>
                <p class="text-xs text-[#A57878] mt-0.5">Template paling rame dipakai buat konten estetik & bestie vibes.</p>
            </div>
            <a href="{{ route('templates.index') }}" class="text-xs font-bold text-[#E26D85] hover:underline flex items-center gap-1">
                Lihat Semua <span>→</span>
            </a>
        </div>

        <!-- Viral Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Card Viral 1: Aquarium Fish -->
            <div class="group bg-white/90 backdrop-blur-sm rounded-3xl p-5 border-2 border-sky-200 shadow-md shadow-sky-200/40 hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col sm:flex-row gap-5 items-center">
                <div class="w-full sm:w-40 aspect-square rounded-2xl bg-gradient-to-br from-sky-100 via-teal-50 to-pink-100 border border-sky-200 flex flex-col items-center justify-center relative overflow-hidden shrink-0">
                    <span class="absolute top-2 right-2 text-xs">🫧</span>
                    <span class="text-5xl animate-bounce">🐠</span>
                    <span class="text-[10px] font-bold text-sky-700 bg-white/80 px-2 py-0.5 rounded-full mt-2">Live Animated</span>
                </div>
                <div class="flex flex-col justify-between w-full">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-sky-100 text-sky-700 border border-sky-200">
                                🔥 100k+ Slay
                            </span>
                            <span class="text-[11px] text-amber-500 font-bold">★★★★★</span>
                        </div>
                        <h4 class="text-lg font-bold text-[#7A3644] group-hover:text-sky-600 transition-colors">
                            Aquarium Swimming Fish 1:1
                        </h4>
                        <p class="text-xs text-[#A57878] mt-1 leading-relaxed">
                            Ikan-ikan lucu berenang bebas melintasi kamera saat kamu pose. Hasil photostrip 3-cut otomatis auto cute!
                        </p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('photobooth.index') }}" class="w-full py-2.5 rounded-xl bg-gradient-to-r from-sky-400 to-teal-400 text-white text-xs font-bold shadow-md shadow-sky-300/40 hover:opacity-95 flex items-center justify-center gap-1.5 transition-all">
                            <span>📷</span> Gas Foto Aquarium
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card Viral 2: Doodle Mirror -->
            <div class="group bg-white/90 backdrop-blur-sm rounded-3xl p-5 border-2 border-rose-200 shadow-md shadow-rose-200/40 hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col sm:flex-row gap-5 items-center">
                <div class="w-full sm:w-40 aspect-square rounded-2xl bg-gradient-to-br from-[#FFF5F7] via-[#FFF0F4] to-[#FFE4EC] border border-rose-200 flex flex-col items-center justify-center relative overflow-hidden shrink-0">
                    <span class="absolute top-2 left-2 text-xs">✏️</span>
                    <span class="text-5xl animate-pulse">🎨</span>
                    <span class="text-[10px] font-bold text-rose-700 bg-white/80 px-2 py-0.5 rounded-full mt-2">Mirror Doodle</span>
                </div>
                <div class="flex flex-col justify-between w-full">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-rose-100 text-rose-700 border border-rose-200">
                                💖 Trending Now
                            </span>
                            <span class="text-[11px] text-amber-500 font-bold">★★★★★</span>
                        </div>
                        <h4 class="text-lg font-bold text-[#7A3644] group-hover:text-rose-600 transition-colors">
                            Doodle Mirror Cam
                        </h4>
                        <p class="text-xs text-[#A57878] mt-1 leading-relaxed">
                            Bebas gambar teks estetik, love, atau coretan ekspresif langsung di cermin kamera sebelum jepret.
                        </p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('photobooth.doodle') }}" class="w-full py-2.5 rounded-xl bg-gradient-to-r from-[#FFAAA6] via-[#FF8E9E] to-[#EA7C8F] text-white text-xs font-bold shadow-md shadow-rose-300/40 hover:opacity-95 flex items-center justify-center gap-1.5 transition-all">
                            <span>🎨</span> Coret di Kamera
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <!-- Footer -->
    <footer class="mt-12 py-6 border-t border-pink-100 bg-white/40 text-center">
        <p class="text-xs text-[#A57878] font-medium flex items-center justify-center gap-1 flex-wrap">
            Dibuat dengan 💖 oleh <a href="https://instagram.com/raemiv_" target="_blank" rel="noopener noreferrer" class="font-bold text-rose-500 hover:underline">@raemiv_</a> karena fomo photobooth viral • <span class="font-bold text-[#8C3A49]">mawsnapbooth</span>
        </p>
    </footer>

</body>
</html>