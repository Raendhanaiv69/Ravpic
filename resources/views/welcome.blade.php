<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>mawsnapbooth ✨</title>

    <meta name="google-site-verification" content="KJaWdrAeSYnkjLKbFwfL_SdFW3lh-ImMOcKUjse2PkA" />

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
                {{-- <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-amber-200 via-rose-200 to-pink-300 flex items-center justify-center text-xl shadow-inner border border-white/60 group-hover:scale-105 transition-transform">
                    📸
                </div> --}}
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
               

                <a href="{{ route('templates.index') }}" class="px-4 py-2 rounded-xl bg-gradient-to-r from-[#FFAAA6] via-[#FF8E9E] to-[#EA7C8F] text-white text-xs md:text-sm font-bold shadow-md shadow-rose-300/40 hover:opacity-95 active:scale-95 transition-all flex items-center gap-1.5">
                    <span></span> Gow foto
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
                    Abadikan Momen Lucu Bareng Bestie!
                </h2>
                <p class="mt-3 text-sm md:text-base text-pink-50 font-medium leading-relaxed">
                    Nggak perlu antre di mall! Cobain filter aquarium ikan berenang, cetak koran, atau karcis bioskop langsung di browser kamu secara gratis.
                </p>
                <div class="mt-6 flex flex-wrap items-center justify-center md:justify-start gap-3">
                    <a href="{{ route('templates.index') }}" class="px-6 py-3 rounded-2xl bg-white text-[#8C3A49] font-extrabold text-sm shadow-lg hover:bg-pink-50 hover:scale-105 active:scale-95 transition-all flex items-center gap-2">
                        <span>✨</span> Mulai Pilih Frame
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
                    <span class="text-4xl">🎟️</span>
                    <span class="text-[10px] font-extrabold text-pink-600 mt-1">#CinemaTicket</span>
                </div>
            </div>
        </div>

        <!-- Section: Frame Viral Paling Hits -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-2xl font-extrabold text-[#8C3A49] font-brand tracking-tight flex items-center gap-2">
                    <span>🌟</span> Frame Viral Paling FYP
                </h3>
            </div>
            <a href="{{ route('templates.index') }}" class="text-xs font-bold text-[#E26D85] hover:underline flex items-center gap-1">
                Lihat Semua <span>→</span>
            </a>
        </div>

        <!-- Viral Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">

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
                            Aquarium Coral Waves 2x2
                        </h4>
                        <p class="text-xs text-[#A57878] mt-1 leading-relaxed">
                            Ikan neon berenang bebas melintasi kamera dengan hiasan ombak dan terumbu karang estetik.
                        </p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('photobooth.index') }}" class="w-full py-2.5 rounded-xl bg-gradient-to-r from-sky-400 to-teal-400 text-white text-xs font-bold shadow-md shadow-sky-300/40 hover:opacity-95 flex items-center justify-center gap-1.5 transition-all">
                            <span>📷</span> Gas Foto Aquarium
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card Viral 2: Cinema Ticket Stub -->
            <div class="group bg-white/90 backdrop-blur-sm rounded-3xl p-5 border-2 border-red-200 shadow-md shadow-red-200/40 hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col sm:flex-row gap-5 items-center">
                <div class="w-full sm:w-40 aspect-square rounded-2xl bg-gradient-to-br from-red-100 via-rose-50 to-amber-100 border border-red-200 flex flex-col items-center justify-center relative overflow-hidden shrink-0">
                    <span class="absolute top-2 left-2 text-xs">🎟️</span>
                    <span class="text-5xl animate-pulse">🎬</span>
                    <span class="text-[10px] font-bold text-red-700 bg-white/80 px-2 py-0.5 rounded-full mt-2">Ticket Stub</span>
                </div>
                <div class="flex flex-col justify-between w-full">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-red-100 text-red-700 border border-red-200">
                                💖 Trending Now
                            </span>
                            <span class="text-[11px] text-amber-500 font-bold">★★★★★</span>
                        </div>
                        <h4 class="text-lg font-bold text-[#7A3644] group-hover:text-red-600 transition-colors">
                            Cinema Ticket Stub Pass
                        </h4>
                        <p class="text-xs text-[#A57878] mt-1 leading-relaxed">
                            Frame karcis bioskop vintage 3-cut lengkap dengan barcode, stub sobekan, dan timestamp film.
                        </p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('photobooth.cinema') }}" class="w-full py-2.5 rounded-xl bg-gradient-to-r from-red-500 via-rose-500 to-amber-500 text-white text-xs font-bold shadow-md shadow-red-300/40 hover:opacity-95 flex items-center justify-center gap-1.5 transition-all">
                            <span>🎟️</span> Cetak Tiket Bioskop
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- SECTION: Kotak Saran & Pesan (Bisa Nama Samaran / Bebas) -->
        <div class="relative w-full rounded-3xl bg-white/90 backdrop-blur-md p-6 sm:p-10 border-2 border-pink-200/80 shadow-xl shadow-rose-200/30 overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-br from-pink-200/40 to-amber-100/40 rounded-full blur-2xl pointer-events-none"></div>

            <div class="relative z-10 max-w-2xl mx-auto">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-pink-100 text-[#8C3A49] text-xs font-extrabold tracking-wide mb-2">
                        <span>💌</span> Anonymous / Secret Message Box
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-extrabold font-brand text-[#8C3A49]">
                        Kirim Pesan, Ide Frame & Kritik
                    </h3>
                    <p class="text-xs sm:text-sm text-[#A57878] mt-1 leading-relaxed">
                        Punya ide tema frame baru, nemu error/bug, atau mau kirim pesan semangat? Tulis di bawah, pesanmu bakal langsung terkirim otomatis ke Telegram developer!
                    </p>
                </div>

                <form id="feedbackForm" onsubmit="submitFeedback(event)" class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Nama Pengirim (Bebas / Samaran) -->
                        <div>
                            <label class="block text-xs font-bold text-[#7A3644] mb-1.5">
                                 Nama Kamu <span class="font-normal text-[10px] text-[#A57878]">(Bebas / Boleh Ngarang)</span>:
                            </label>
                            <input type="text" id="fbSenderName" placeholder="Contoh: Secret Bestie / Anonim" class="w-full px-4 py-3 rounded-2xl border border-pink-200 text-xs sm:text-sm font-semibold text-[#6E4B4B] placeholder:text-[#C29E9E] bg-pink-50/40 focus:outline-none focus:ring-2 focus:ring-rose-300 transition-all">
                        </div>

                        <!-- Pilihan Kategori -->
                        <div>
                            <label class="block text-xs font-bold text-[#7A3644] mb-1.5"> Kategori Pesan:</label>
                            <select id="fbCategory" required class="w-full px-4 py-3 rounded-2xl border border-pink-200 text-xs sm:text-sm font-semibold text-[#6E4B4B] bg-pink-50/40 focus:outline-none focus:ring-2 focus:ring-rose-300 transition-all">
                                <option value="💡 Request Ide Frame Baru">💡 Request Ide Frame Baru</option>
                                <option value="🐞 Laporan Bug / Error Kamera">🐞 Laporan Bug / Error Kamera</option>
                                <option value="💌 Kritik & Saran Pengalaman">💌 Kritik & Saran Pengalaman</option>
                                <option value="💖 Pesan Rahasia / Semangat">💖 Pesan Rahasia / Semangat</option>
                            </select>
                        </div>
                    </div>

                    <!-- Isi Pesan -->
                    <div>
                        <label class="block text-xs font-bold text-[#7A3644] mb-1.5"> Isi Pesan:</label>
                        <textarea id="fbMessage" rows="4" required placeholder="Tulis sejujur-jujurnya di sini ya..." class="w-full p-4 rounded-2xl border border-pink-200 text-xs sm:text-sm text-[#6E4B4B] placeholder:text-[#C29E9E] bg-pink-50/20 focus:outline-none focus:ring-2 focus:ring-rose-300 resize-none transition-all"></textarea>
                    </div>

                    <!-- Status Alert -->
                    <div id="fbAlert" class="text-xs sm:text-sm font-bold p-3.5 rounded-2xl hidden"></div>

                    <!-- Submit Button -->
                    <button type="submit" id="fbSubmitBtn" class="w-full py-3.5 rounded-2xl bg-gradient-to-r from-[#FFAAA6] via-[#FF8E9E] to-[#EA7C8F] text-white font-extrabold text-sm shadow-md shadow-rose-300/40 hover:opacity-95 active:scale-98 transition-all flex items-center justify-center gap-2 cursor-pointer">
                        <span></span> Kirim Pesan ke Telegram Developer
                    </button>
                </form>
            </div>
        </div>

    </main>

    <!-- Footer -->
    <footer class="mt-12 py-6 border-t border-pink-100 bg-white/40 text-center">
        <p class="text-xs text-[#A57878] font-medium flex items-center justify-center gap-1 flex-wrap">
            Dibuat dengan 💖 oleh <a href="https://instagram.com/raemiv_" target="_blank" rel="noopener noreferrer" class="font-bold text-rose-500 hover:underline">@raemiv_</a> • <span class="font-bold text-[#8C3A49]">mawsnapbooth</span>
        </p>
    </footer>

    <!-- Script AJAX Handler Feedback Telegram -->
    <script>
        async function submitFeedback(e) {
            e.preventDefault();
            const sender_name = document.getElementById('fbSenderName').value.trim();
            const category = document.getElementById('fbCategory').value;
            const message = document.getElementById('fbMessage').value.trim();
            const alertBox = document.getElementById('fbAlert');
            const submitBtn = document.getElementById('fbSubmitBtn');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            if (!message) return;

            submitBtn.disabled = true;
            submitBtn.innerHTML = `<span>⏳</span> Mengirim pesan...`;
            alertBox.classList.add('hidden');

            try {
                const response = await fetch("{{ route('feedback.send') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ sender_name, category, message })
                });

                const data = await response.json();

                if (response.ok && data.status === 'success') {
                    alertBox.className = "text-xs sm:text-sm font-bold p-3.5 rounded-2xl bg-emerald-100 text-emerald-800 border border-emerald-300 block";
                    alertBox.innerText = data.message;
                    document.getElementById('fbSenderName').value = '';
                    document.getElementById('fbMessage').value = '';
                } else {
                    throw new Error(data.message || 'Gagal mengirim pesan.');
                }
            } catch (err) {
                alertBox.className = "text-xs sm:text-sm font-bold p-3.5 rounded-2xl bg-rose-100 text-rose-800 border border-rose-300 block";
                alertBox.innerText = "Gagal: " + err.message;
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = `<span>🚀</span> Kirim Pesan ke Telegram Developer`;
            }
        }
    </script>

</body>
</html>