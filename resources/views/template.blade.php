<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Templates - Photobooth</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Quicksand:wght@600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .font-brand {
            font-family: 'Quicksand', sans-serif;
        }
        @keyframes float-gentle {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-4px) rotate(3deg); }
        }
        .animate-float {
            animation: float-gentle 3.5s ease-in-out infinite;
        }

        @keyframes drawPulse {
            0%, 100% { opacity: 0.85; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.04) rotate(-1deg); }
        }
        .animate-draw {
            animation: drawPulse 2.8s ease-in-out infinite;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-[#FFF8EE] via-[#FFF0F3] to-[#FFEBF2] min-h-screen text-[#6E4B4B] antialiased selection:bg-pink-300 selection:text-pink-900">

    <!-- Top Glow Bar -->
    <div class="h-1.5 bg-gradient-to-r from-amber-300 via-rose-300 to-pink-300 w-full"></div>

    <!-- Navbar -->
    <nav class="bg-white/70 backdrop-blur-md border-b border-pink-100/80 sticky top-0 z-30 shadow-sm shadow-pink-500/5">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="w-10 h-10 rounded-2xl bg-white border border-pink-200/80 flex items-center justify-center text-lg hover:bg-pink-50 transition text-[#8C3A49]">
                    ←
                </a>
                <div>
                    <h1 class="font-bold font-brand text-lg text-[#8C3A49] leading-none">Photobooth</h1>
                    <span class="text-xs text-[#A57878]">Template Collection</span>
                </div>
            </div>

            <!-- Upload Button -->
            <button class="px-4 py-2 rounded-2xl bg-gradient-to-r from-[#FFAAA6] to-[#FF8E9E] text-white text-xs md:text-sm font-bold shadow-md shadow-rose-200/60 hover:opacity-95 hover:scale-105 active:scale-95 transition-all flex items-center gap-2">
                <span>✨</span> Upload Template Baru
            </button>

        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 py-10">

        <!-- Title & Filter Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8">
            <div>
                <h2 class="text-3xl font-extrabold text-[#8C3A49] font-brand tracking-tight">
                    Pilih Template Frame
                </h2>
                <p class="text-[#A57878] text-sm mt-1">
                    Pilih efek ikan berenang, coret-coret langsung di kamera preview, atau desain retro favoritmu.
                </p>
            </div>

            <!-- Category Pills -->
            <div class="flex flex-wrap gap-2">
                <button class="px-4 py-2 rounded-full text-xs font-bold bg-[#8C3A49] text-white shadow-sm shadow-pink-300/40">
                    Semua
                </button>
                <button class="px-4 py-2 rounded-full text-xs font-bold bg-white/80 text-[#8C3A49] hover:bg-pink-100/60 border border-pink-200/60 transition">
                    🐠 Animated Overlay
                </button>
                <button class="px-4 py-2 rounded-full text-xs font-bold bg-white/80 text-[#8C3A49] hover:bg-pink-100/60 border border-pink-200/60 transition">
                    🎨 Interactive Doodle
                </button>
                <button class="px-4 py-2 rounded-full text-xs font-bold bg-white/80 text-[#8C3A49] hover:bg-pink-100/60 border border-pink-200/60 transition">
                    ✨ Y2K Retro
                </button>
            </div>
        </div>

        <!-- Template Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Card 1: FRAME IKAN (Aquarium Floating Fish - Live Animated) -->
            <div class="group bg-white/90 backdrop-blur-sm rounded-3xl p-4 border-2 border-sky-300 shadow-md shadow-sky-200/50 hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between relative overflow-hidden">
                <span class="absolute top-6 right-6 z-20 px-2.5 py-1 rounded-full text-[10px] font-bold bg-sky-100 text-sky-700 border border-sky-200 flex items-center gap-1 shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-sky-500 animate-ping"></span> 🐠 Animated
                </span>

                <!-- Preview Area -->
                <div class="relative w-full aspect-[3/4] bg-gradient-to-b from-sky-100 via-teal-50 to-pink-100 rounded-2xl border border-sky-200/80 p-3.5 flex flex-col items-center justify-between overflow-hidden">
                    <span class="absolute top-8 left-3 text-sm opacity-60 animate-bounce">🫧</span>
                    <span class="absolute bottom-12 right-4 text-xs opacity-70 animate-pulse">🫧</span>
                    <div class="absolute top-1/3 -right-2 text-2xl animate-float pointer-events-none drop-shadow-md">
                        🐠
                    </div>
                    <div class="absolute bottom-6 -left-1 text-xl animate-float pointer-events-none drop-shadow-md" style="animation-delay: 1.5s;">
                        🐟
                    </div>

                    <!-- 3 Cut Grid Photo -->
                    <div class="w-full flex flex-col items-center gap-2 z-10 my-auto">
                        <div class="w-24 h-14 bg-white/90 rounded-lg shadow-sm border border-dashed border-sky-300 flex items-center justify-center text-[11px] text-sky-700 font-medium">Foto 1</div>
                        <div class="w-24 h-14 bg-white/90 rounded-lg shadow-sm border border-dashed border-sky-300 flex items-center justify-center text-[11px] text-sky-700 font-medium">Foto 2</div>
                        <div class="w-24 h-14 bg-white/90 rounded-lg shadow-sm border border-dashed border-sky-300 flex items-center justify-center text-[11px] text-sky-700 font-medium">Foto 3</div>
                    </div>

                    <!-- Bottom Watermark Label -->
                    <div class="z-10 text-[9px] font-bold tracking-widest text-sky-800 uppercase bg-white/60 px-2 py-0.5 rounded-full">
                        🫧 Undersea Fish Booth
                    </div>
                </div>

                <!-- Info & Action -->
                <div class="mt-4">
                    <h3 class="font-bold text-[#7A3644] text-sm flex items-center gap-1.5">
                        Aquarium Swimming Fish
                    </h3>
                    <p class="text-[11px] text-[#A57878] mt-0.5">Efek ikan berenang lewat di depan kamera</p>
                    
                    <div class="mt-4">
                        <a href="{{ route('photobooth.index') }}" class="w-full py-2.5 rounded-xl bg-gradient-to-r from-sky-400 to-teal-400 text-white text-xs font-bold shadow-md shadow-sky-300/40 hover:opacity-95 flex items-center justify-center gap-1.5 transition-all">
                            <span>📷</span> Pakai Frame Ikan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 2: FRAME CORET-CORET (Interactive Doodle Mirror Cam) -->
            <div class="group bg-white/90 backdrop-blur-sm rounded-3xl p-4 border-2 border-rose-300 shadow-md shadow-rose-200/50 hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between relative overflow-hidden">
                <span class="absolute top-6 right-6 z-20 px-2.5 py-1 rounded-full text-[10px] font-bold bg-rose-100 text-rose-700 border border-rose-200 flex items-center gap-1 shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500 animate-pulse"></span> 🎨 Interactive
                </span>

                <!-- Preview Area with Doodle Illustrations -->
                <div class="relative w-full aspect-[3/4] bg-gradient-to-b from-[#FFF5F7] via-[#FFF0F4] to-[#FFE4EC] rounded-2xl border border-rose-200/90 p-3.5 flex flex-col items-center justify-between overflow-hidden">
                    
                    <!-- Doodle Floating Visuals -->
                    <span class="absolute top-3 left-3 text-lg -rotate-12 animate-draw">✏️</span>
                    <span class="absolute top-4 right-14 text-sm text-pink-500 font-extrabold rotate-6">~♥~</span>
                    <span class="absolute bottom-14 left-4 text-xs font-bold text-amber-500 -rotate-6">★ xoxo</span>
                    <span class="absolute bottom-12 right-3 text-base animate-bounce">🖍️</span>

                    <!-- Decorative Hand-drawn SVG doodle lines -->
                    <svg class="absolute inset-0 w-full h-full pointer-events-none opacity-40" viewBox="0 0 100 100" fill="none" stroke="#EA7C8F" stroke-width="1.8" stroke-linecap="round">
                        <path d="M 12,22 Q 22,14 32,24 T 52,20" />
                        <path d="M 68,78 Q 78,88 88,76" />
                    </svg>

                    <!-- 3 Cut Grid Photo with Doodle Accent Borders -->
                    <div class="w-full flex flex-col items-center gap-2 z-10 my-auto">
                        <div class="w-24 h-14 bg-white/95 rounded-lg shadow-sm border-2 border-pink-300 flex flex-col items-center justify-center text-[10px] text-rose-500 font-bold relative">
                            <span>Foto 1</span>
                            <span class="text-[8px] text-pink-400 font-normal">✎ doodle</span>
                        </div>
                        <div class="w-24 h-14 bg-white/95 rounded-lg shadow-sm border-2 border-amber-300 flex flex-col items-center justify-center text-[10px] text-amber-600 font-bold relative">
                            <span>Foto 2</span>
                            <span class="text-[8px] text-amber-400 font-normal">✎ doodle</span>
                        </div>
                        <div class="w-24 h-14 bg-white/95 rounded-lg shadow-sm border-2 border-sky-300 flex flex-col items-center justify-center text-[10px] text-sky-600 font-bold relative">
                            <span>Foto 3</span>
                            <span class="text-[8px] text-sky-400 font-normal">✎ doodle</span>
                        </div>
                    </div>

                    <!-- Bottom Watermark Label -->
                    <div class="z-10 text-[9px] font-bold tracking-widest text-rose-700 uppercase bg-white/80 px-2 py-0.5 rounded-full border border-rose-200/50">
                        🎨 Doodle Mirror Booth
                    </div>
                </div>

                <!-- Info & Action -->
                <div class="mt-4">
                    <h3 class="font-bold text-[#7A3644] text-sm flex items-center gap-1.5">
                        Doodle Mirror Cam
                    </h3>
                    <p class="text-[11px] text-[#A57878] mt-0.5">Bebas gambar & coret-coret di atas kamera</p>
                    
                    <div class="mt-4">
                        <a href="{{ route('photobooth.doodle') }}" class="w-full py-2.5 rounded-xl bg-gradient-to-r from-[#FFAAA6] via-[#FF8E9E] to-[#EA7C8F] text-white text-xs font-bold shadow-md shadow-rose-300/40 hover:opacity-95 flex items-center justify-center gap-1.5 transition-all">
                            <span>🎨</span> Coret di Kamera
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3: FRAME Y2K RETRO STARS -->
            <div class="group bg-white/85 backdrop-blur-sm rounded-3xl p-4 border border-pink-100 shadow-sm hover:shadow-xl hover:shadow-pink-200/50 hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between relative overflow-hidden">
                <span class="absolute top-6 right-6 z-20 px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-200 flex items-center gap-1 shadow-sm">
                    ⭐ Y2K Retro
                </span>

                <!-- Preview Area -->
                <div class="relative w-full aspect-[3/4] bg-gradient-to-br from-[#FFF5DC] via-[#FFEBE1] to-[#FFF0F5] rounded-2xl border border-amber-200/70 p-3.5 flex flex-col items-center justify-between">
                    
                    <span class="absolute top-2 right-2 text-xs">✨</span>
                    <span class="absolute bottom-2 left-2 text-xs">💫</span>

                    <!-- 4 Box Postcard Grid -->
                    <div class="grid grid-cols-2 gap-1.5 w-full my-auto z-10">
                        <div class="h-16 bg-white/90 rounded-lg border border-dashed border-amber-300 flex items-center justify-center text-[10px] text-amber-700 font-medium">1</div>
                        <div class="h-16 bg-white/90 rounded-lg border border-dashed border-amber-300 flex items-center justify-center text-[10px] text-amber-700 font-medium">2</div>
                        <div class="h-16 bg-white/90 rounded-lg border border-dashed border-amber-300 flex items-center justify-center text-[10px] text-amber-700 font-medium">3</div>
                        <div class="h-16 bg-white/90 rounded-lg border border-dashed border-amber-300 flex items-center justify-center text-[10px] text-amber-700 font-medium">4</div>
                    </div>

                    <div class="z-10 text-[9px] font-bold tracking-widest text-amber-800 uppercase bg-white/60 px-2 py-0.5 rounded-full">
                        ⭐ 4-Cut Retro Postcard
                    </div>
                </div>

                <!-- Info & Action -->
                <div class="mt-4">
                    <h3 class="font-bold text-[#7A3644] text-sm">Butter Star Y2K</h3>
                    <p class="text-[11px] text-[#A57878] mt-0.5">Layout 4 Grid Postcard • Warm Nostalgia</p>
                    
                    <div class="mt-4">
                        <a href="{{ route('photobooth.index') }}" class="w-full py-2.5 rounded-xl bg-white border border-pink-200 text-[#8C3A49] text-xs font-bold hover:bg-[#FFAAA6] hover:text-white hover:border-[#FFAAA6] flex items-center justify-center transition-all">
                            Gunakan Frame
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 4: Add New Template Placeholder -->
            <a href="#" class="group border-2 border-dashed border-pink-200/90 hover:border-[#FFAAA6] bg-white/40 hover:bg-white/80 rounded-3xl p-6 flex flex-col items-center justify-center text-center transition-all duration-300 min-h-[300px]">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-amber-100 to-pink-200 flex items-center justify-center text-2xl text-[#8C3A49] group-hover:scale-110 shadow-sm transition-transform mb-3">
                    +
                </div>
                <h3 class="font-bold text-[#7A3644] text-sm">Buat Frame Custom</h3>
                <p class="text-xs text-[#A57878] mt-1 max-w-[180px]">Upload frame PNG transparan atau stiker buatanmu.</p>
            </a>

        </div>

    </main>

</body>
</html>