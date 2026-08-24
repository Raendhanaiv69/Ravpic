<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photobooth - Cinema Ticket Edition</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Quicksand:wght@600;700;800&family=Space+Grotesk:wght@600;700;800&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #181515 0%, #110e0e 50%, #0a0808 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #f3f4f6;
        }

        .font-ticket-title { font-family: 'Bebas Neue', sans-serif; }
        .font-ticket-mono { font-family: 'Space Mono', monospace; }
        .font-brand { font-family: 'Quicksand', sans-serif; }

        /* Container Kamera Card */
        .camera-card-desktop {
            width: 500px;
            max-width: 100%;
            background: #1e1b1b;
            border-radius: 28px;
            padding: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.7);
            border: 2px solid #383131;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Viewport Kamera 1:1 */
        .camera-viewport-box {
            position: relative;
            width: 460px;
            height: 460px;
            max-width: 100%;
            aspect-ratio: 1 / 1;
            border-radius: 22px;
            overflow: hidden;
            background-color: #0d0d0d;
            border: 1px solid #444;
        }

        /* Filter Kamera Cinema HD */
        .camera-viewport-box video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scaleX(-1);
            display: block;
            filter: brightness(1.1) contrast(1.05) saturate(1.15);
        }

        /* Container Hasil Tiket */
        .result-card-desktop {
            width: 380px;
            max-width: 100%;
            background: #1e1b1b;
            border-radius: 28px;
            padding: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.7);
            border: 2px solid #383131;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .strip-preview-box {
            width: 100%;
            height: 520px;
            border-radius: 18px;
            overflow: hidden;
            background-color: #121010;
            border: 1px solid #332d2d;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes shutterFlash {
            0% { opacity: 1; background-color: #ffffff; }
            50% { opacity: 0.95; background-color: #ffffff; }
            100% { opacity: 0; background-color: transparent; }
        }

        .flash-shutter {
            animation: shutterFlash 0.35s ease-out forwards;
        }

        @keyframes countPop {
            0% { transform: scale(0.6); opacity: 0; }
            50% { transform: scale(1.15); opacity: 1; }
            100% { transform: scale(1); opacity: 1; }
        }

        .count-animate {
            animation: countPop 0.45s ease-out forwards;
        }
    </style>
</head>

<body class="antialiased">

    <!-- Top Accent Bar -->
    <div class="h-1 bg-gradient-to-r from-red-600 via-amber-500 to-red-600 w-full shrink-0"></div>

    <!-- Header Navbar -->
    <nav class="bg-[#181515]/80 backdrop-blur-md border-b border-stone-800 sticky top-0 z-40 shrink-0">
        <div class="max-w-6xl mx-auto px-5 py-3 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <a href="{{ route('templates.index') }}"
                    class="w-8 h-8 rounded-xl bg-stone-800 border border-stone-700 flex items-center justify-center text-xs hover:bg-stone-700 transition text-stone-300 font-bold">
                    ←
                </a>
                <div>
                    <span class="font-bold text-sm text-stone-200 tracking-wider flex items-center gap-1.5">
                        🎬 CINEMA TICKET STUB
                    </span>
                    <span class="text-[10px] text-stone-400 block">Admit One • Photobooth Edition</span>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <button type="button" onclick="switchCameraFacing()" id="flipCamBtn"
                    class="md:hidden px-2.5 py-1 rounded-lg text-xs font-bold bg-stone-800 text-stone-300 border border-stone-700 hover:bg-stone-700 flex items-center gap-1">
                    <span>📷</span> Flip
                </button>
                <span id="sessionStatus"
                    class="px-2.5 py-0.5 text-[10px] font-bold rounded-full bg-red-950 text-red-400 border border-red-800">
                    🎟️ 3-Cut Cinema Ticket
                </span>
            </div>
        </div>
    </nav>

    <!-- Main Workspace -->
    <main class="flex-1 max-w-6xl mx-auto w-full px-4 py-6 flex flex-col lg:flex-row items-center lg:items-start justify-center gap-6">

        <!-- KIRI: Live Camera Viewport -->
        <div class="camera-card-desktop">

            <div class="w-full flex justify-between items-center mb-3 px-1">
                <div class="flex items-center gap-1.5">
                    <span class="text-xs font-bold text-stone-400">⏱️ Timer:</span>
                    <button type="button" onclick="setTimer(3)" id="timer3Btn"
                        class="px-2.5 py-0.5 rounded-lg text-xs font-bold bg-red-600 text-white border border-red-600 transition-all">
                        3s
                    </button>
                    <button type="button" onclick="setTimer(5)" id="timer5Btn"
                        class="px-2.5 py-0.5 rounded-lg text-xs font-bold bg-stone-800 text-stone-300 border border-stone-700 hover:bg-stone-700 transition-all">
                        5s
                    </button>
                </div>

                <div class="flex items-center gap-1.5">
                    <span class="px-2.5 py-0.5 rounded-lg text-[10px] font-bold bg-red-950 text-red-400 border border-red-800">
                        🎞️ Studio Cinema HD
                    </span>
                    <button type="button" onclick="toggleTorchPreference()" id="torchPrefBtn"
                        class="px-2 py-0.5 rounded-lg text-[11px] font-bold bg-stone-800 text-stone-300 border border-stone-700">
                        ⚡ Flash: <span id="torchStatusText">Auto</span>
                    </button>
                </div>
            </div>

            <!-- Area Kamera -->
            <div class="camera-viewport-box">
                <video id="webcam" autoplay playsinline muted></video>

                <!-- Screen Flash Overlay -->
                <div id="flashOverlay" class="absolute inset-0 pointer-events-none z-50 opacity-0"></div>

                <!-- Countdown Overlay -->
                <div id="countdownBox"
                    class="absolute inset-0 z-40 flex flex-col items-center justify-center pointer-events-none hidden bg-black/60 backdrop-blur-[2px]">
                    <div
                        class="w-20 h-20 rounded-full bg-stone-900/90 border-2 border-red-500 flex items-center justify-center shadow-2xl animate-pulse">
                        <span id="countdownNumber"
                            class="text-4xl font-black text-red-400 font-brand count-animate">3</span>
                    </div>
                    <span id="poseIndicator"
                        class="mt-3 text-xs font-bold text-white uppercase tracking-widest bg-gradient-to-r from-red-600 to-amber-600 px-4 py-1 rounded-full shadow-lg">
                        Take 1 / 3
                    </span>
                </div>

                <!-- Watermark Kamera -->
                <div class="absolute bottom-3 left-0 right-0 z-20 flex justify-center pointer-events-none">
                    <span class="text-stone-300 text-[10px] tracking-widest uppercase bg-black/65 backdrop-blur-sm px-3 py-0.5 rounded-full border border-stone-700">
                        🎬 CINEMA ADMIT ONE • LIVE PREVIEW
                    </span>
                </div>
            </div>

            <!-- Tombol Aksi Kamera -->
            <div class="w-full flex items-center gap-2 mt-4">
                <button id="startSessionBtn" type="button"
                    class="flex-1 py-3 rounded-2xl bg-gradient-to-r from-red-600 via-rose-600 to-amber-600 text-white font-extrabold text-xs md:text-sm shadow-lg shadow-red-600/30 hover:brightness-105 active:scale-98 transition-all flex items-center justify-center gap-2 cursor-pointer">
                    <span class="text-base">🎬</span> Mulai Take Foto (3 Pose)
                </button>
                <button type="button" onclick="startCamera()" title="Refresh Kamera"
                    class="w-12 h-11 rounded-2xl bg-stone-800 text-stone-300 border border-stone-700 flex items-center justify-center text-sm hover:bg-stone-700 transition-all cursor-pointer">
                    ⟳
                </button>
            </div>
        </div>

        <!-- KANAN: Hasil Tiket Bioskop -->
        <div class="result-card-desktop">
            <div class="w-full flex justify-between items-center mb-2 px-1">
                <span class="text-xs font-bold text-stone-300">🎟️ Hasil Tiket Bioskop</span>
                <span id="stripStatusBadge"
                    class="text-[10px] text-amber-400 bg-amber-950/80 px-2.5 py-0.5 rounded-full font-bold border border-amber-800/60">Menunggu</span>
            </div>

            <!-- Pilihan Tema Warna Tiket Bioskop -->
            <div class="w-full flex items-center justify-between mb-2.5 px-3 py-1.5 bg-stone-800/80 rounded-2xl border border-stone-700">
                <span class="text-[11px] font-bold text-stone-300 flex items-center gap-1">🎨 Tema Tiket:</span>
                <div class="flex items-center gap-2.5">
                    <button type="button" onclick="selectTicketTheme('vintageRed')" id="colorBtn-vintageRed" title="Classic Cinema Red"
                        class="w-5 h-5 rounded-full bg-[#8B1E1E] border-2 border-amber-400 ring-2 ring-amber-400/50 scale-110 transition-all shadow-sm cursor-pointer"></button>
                    <button type="button" onclick="selectTicketTheme('noirBlack')" id="colorBtn-noirBlack" title="Midnight Noir"
                        class="w-5 h-5 rounded-full bg-[#181616] border-2 border-transparent hover:scale-105 opacity-70 hover:opacity-100 transition-all shadow-sm cursor-pointer"></button>
                    <button type="button" onclick="selectTicketTheme('retroKraft')" id="colorBtn-retroKraft" title="Golden Kraft Ticket"
                        class="w-5 h-5 rounded-full bg-[#D4A373] border-2 border-transparent hover:scale-105 opacity-70 hover:opacity-100 transition-all shadow-sm cursor-pointer"></button>
                    <button type="button" onclick="selectTicketTheme('cinemaBlue')" id="colorBtn-cinemaBlue" title="Sci-Fi Neon Blue"
                        class="w-5 h-5 rounded-full bg-[#0F2942] border-2 border-transparent hover:scale-105 opacity-70 hover:opacity-100 transition-all shadow-sm cursor-pointer"></button>
                </div>
            </div>

            <!-- Preview Canvas Tiket -->
            <div class="strip-preview-box">
                <canvas id="cinemaTicketCanvas" class="w-full h-full object-contain"></canvas>
            </div>

            <!-- Ulang Pose Satuan (1-3) -->
            <div class="w-full mt-2.5 flex items-center justify-between gap-1 bg-stone-800/60 p-2 rounded-2xl border border-stone-700">
                <span class="text-[10px] font-bold text-stone-300 pl-1">Ulang:</span>
                <div class="flex gap-2">
                    <button type="button" onclick="retakeSinglePose(0)" id="retakeBtn0" disabled
                        class="px-2.5 py-0.5 rounded-lg bg-stone-900 border border-stone-700 text-stone-200 text-xs font-bold hover:bg-stone-700 disabled:opacity-30">
                        Take 1 ⟳
                    </button>
                    <button type="button" onclick="retakeSinglePose(1)" id="retakeBtn1" disabled
                        class="px-2.5 py-0.5 rounded-lg bg-stone-900 border border-stone-700 text-stone-200 text-xs font-bold hover:bg-stone-700 disabled:opacity-30">
                        Take 2 ⟳
                    </button>
                    <button type="button" onclick="retakeSinglePose(2)" id="retakeBtn2" disabled
                        class="px-2.5 py-0.5 rounded-lg bg-stone-900 border border-stone-700 text-stone-200 text-xs font-bold hover:bg-stone-700 disabled:opacity-30">
                        Take 3 ⟳
                    </button>
                </div>
            </div>

            <!-- Tombol Unduh & Reset -->
            <div class="w-full flex flex-col gap-1.5 mt-2.5">
                <button id="downloadBtn" type="button" disabled
                    class="w-full py-2.5 rounded-xl bg-gradient-to-r from-red-600 via-rose-600 to-amber-600 text-white font-extrabold text-xs shadow-md opacity-50 cursor-not-allowed transition-all flex items-center justify-center gap-1.5">
                    <span>🎟️</span> Unduh Tiket Bioskop (PNG)
                </button>
                <button id="resetAllBtn" type="button" onclick="resetBooth()"
                    class="w-full py-1.5 rounded-xl bg-stone-800 text-stone-300 font-bold text-xs hover:bg-stone-700 border border-stone-700 transition-all">
                    Reset Semua 🔄
                </button>
            </div>
        </div>

    </main>

    <!-- Script Engine -->
    <script>
        const video = document.getElementById('webcam');
        const flashOverlay = document.getElementById('flashOverlay');
        const countdownBox = document.getElementById('countdownBox');
        const countdownNumber = document.getElementById('countdownNumber');
        const poseIndicator = document.getElementById('poseIndicator');
        const startBtn = document.getElementById('startSessionBtn');
        const downloadBtn = document.getElementById('downloadBtn');
        const stripStatusBadge = document.getElementById('stripStatusBadge');
        const cinemaCanvas = document.getElementById('cinemaTicketCanvas');

        const timer3Btn = document.getElementById('timer3Btn');
        const timer5Btn = document.getElementById('timer5Btn');
        const torchStatusText = document.getElementById('torchStatusText');

        let selectedTimerSeconds = 3;
        let capturedShots = [null, null, null]; // 3 Pose
        let isSessionRunning = false;
        let currentFacingMode = 'user';
        let currentMediaStream = null;
        let torchActivePreference = true;

        // --- Palet Tema Tiket Bioskop ---
        let selectedTicketTheme = 'vintageRed';
        const ticketThemes = {
            vintageRed: {
                bg: '#7B1818',
                cardGrad: ['#991F1F', '#6B1414'],
                border: '#FBBF24',
                headerText: '#FEF08A',
                accentText: '#FDE047',
                subText: '#FCA5A5',
                dashedLine: '#FBBF24',
                barcodeColor: '#FDE047'
            },
            noirBlack: {
                bg: '#141414',
                cardGrad: ['#222222', '#0F0F0F'],
                border: '#E5E7EB',
                headerText: '#FFFFFF',
                accentText: '#D1D5DB',
                subText: '#9CA3AF',
                dashedLine: '#6B7280',
                barcodeColor: '#FFFFFF'
            },
            retroKraft: {
                bg: '#C5935E',
                cardGrad: ['#D6A878', '#B37F4A'],
                border: '#451A03',
                headerText: '#2B1103',
                accentText: '#3B1605',
                subText: '#5A2A10',
                dashedLine: '#451A03',
                barcodeColor: '#2B1103'
            },
            cinemaBlue: {
                bg: '#0E2338',
                cardGrad: ['#163756', '#0A1A2B'],
                border: '#38BDF8',
                headerText: '#E0F2FE',
                accentText: '#7DD3FC',
                subText: '#93C5FD',
                dashedLine: '#38BDF8',
                barcodeColor: '#7DD3FC'
            }
        };

        function selectTicketTheme(themeKey) {
            if (!ticketThemes[themeKey]) return;
            selectedTicketTheme = themeKey;

            ['vintageRed', 'noirBlack', 'retroKraft', 'cinemaBlue'].forEach(t => {
                const btn = document.getElementById(`colorBtn-${t}`);
                if (btn) {
                    btn.className = (t === themeKey) 
                        ? 'w-5 h-5 rounded-full border-2 border-amber-400 ring-2 ring-amber-400/50 scale-110 transition-all cursor-pointer shadow-sm' 
                        : 'w-5 h-5 rounded-full border-2 border-transparent hover:scale-105 opacity-70 hover:opacity-100 transition-all cursor-pointer shadow-sm';
                }
            });

            renderCinemaTicketLive();
        }

        function setTimer(sec) {
            if (isSessionRunning) return;
            selectedTimerSeconds = sec;
            if (sec === 3) {
                timer3Btn.className = "px-2.5 py-0.5 rounded-lg text-xs font-bold bg-red-600 text-white border border-red-600 transition-all";
                timer5Btn.className = "px-2.5 py-0.5 rounded-lg text-xs font-bold bg-stone-800 text-stone-300 border border-stone-700 hover:bg-stone-700 transition-all";
            } else {
                timer5Btn.className = "px-2.5 py-0.5 rounded-lg text-xs font-bold bg-red-600 text-white border border-red-600 transition-all";
                timer3Btn.className = "px-2.5 py-0.5 rounded-lg text-xs font-bold bg-stone-800 text-stone-300 border border-stone-700 hover:bg-stone-700 transition-all";
            }
        }

        function toggleTorchPreference() {
            torchActivePreference = !torchActivePreference;
            torchStatusText.innerText = torchActivePreference ? "Auto" : "Off";
        }

        const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        function playBeepSound() {
            try {
                if (audioCtx.state === 'suspended') audioCtx.resume();
                const osc = audioCtx.createOscillator();
                const gain = audioCtx.createGain();
                osc.type = 'sine';
                osc.frequency.setValueAtTime(800, audioCtx.currentTime);
                gain.gain.setValueAtTime(0.12, audioCtx.currentTime);
                gain.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 0.08);
                osc.connect(gain);
                gain.connect(audioCtx.destination);
                osc.start();
                osc.stop(audioCtx.currentTime + 0.08);
            } catch (e) {}
        }

        function playShutterSound() {
            try {
                if (audioCtx.state === 'suspended') audioCtx.resume();
                const osc = audioCtx.createOscillator();
                const gain = audioCtx.createGain();
                osc.type = 'triangle';
                osc.frequency.setValueAtTime(950, audioCtx.currentTime);
                osc.frequency.exponentialRampToValueAtTime(70, audioCtx.currentTime + 0.11);
                gain.gain.setValueAtTime(0.35, audioCtx.currentTime);
                gain.gain.exponentialRampToValueAtTime(0.01, audioCtx.currentTime + 0.11);
                osc.connect(gain);
                gain.connect(audioCtx.destination);
                osc.start();
                osc.stop(audioCtx.currentTime + 0.11);
            } catch (e) {}
        }

        async function startCamera() {
            if (currentMediaStream) {
                currentMediaStream.getTracks().forEach(track => track.stop());
            }

            try {
                const constraints = {
                    video: {
                        facingMode: currentFacingMode,
                        width: { ideal: 1080 },
                        height: { ideal: 1080 }
                    }
                };
                currentMediaStream = await navigator.mediaDevices.getUserMedia(constraints);
                video.srcObject = currentMediaStream;
                video.style.transform = currentFacingMode === 'user' ? 'scaleX(-1)' : 'scaleX(1)';
            } catch (err) {
                console.warn("Kamera tidak aktif:", err);
            }
        }
        startCamera();

        function switchCameraFacing() {
            currentFacingMode = currentFacingMode === 'user' ? 'environment' : 'user';
            startCamera();
        }

        async function triggerHardwareFlash() {
            if (!torchActivePreference || !currentMediaStream) return;
            try {
                const track = currentMediaStream.getVideoTracks()[0];
                const capabilities = track.getCapabilities();
                if (capabilities && capabilities.torch) {
                    await track.applyConstraints({ advanced: [{ torch: true }] });
                    setTimeout(async () => {
                        await track.applyConstraints({ advanced: [{ torch: false }] });
                    }, 350);
                }
            } catch (err) {}
        }

        async function startPhotoSession() {
            if (isSessionRunning) return;
            isSessionRunning = true;
            capturedShots = [null, null, null];

            startBtn.disabled = true;
            startBtn.classList.add('opacity-50', 'cursor-not-allowed');
            downloadBtn.disabled = true;
            downloadBtn.classList.add('opacity-50', 'cursor-not-allowed');

            stripStatusBadge.className = "text-[10px] text-amber-300 bg-amber-950/80 px-2.5 py-0.5 rounded-full font-bold border border-amber-800";
            stripStatusBadge.innerText = "Memotret...";

            countdownBox.classList.remove('hidden');

            for (let i = 0; i < 3; i++) {
                poseIndicator.innerText = `Take ${i + 1} / 3`;
                await runCountdown(selectedTimerSeconds);

                triggerFlash();
                triggerHardwareFlash();
                playShutterSound();

                capturePoseIndex(i);
                await new Promise(resolve => setTimeout(resolve, 800));
            }

            countdownBox.classList.add('hidden');
            isSessionRunning = false;
            startBtn.disabled = false;
            startBtn.classList.remove('opacity-50', 'cursor-not-allowed');

            checkSessionCompletion();
        }

        async function retakeSinglePose(index) {
            if (isSessionRunning) return;
            isSessionRunning = true;

            startBtn.disabled = true;
            startBtn.classList.add('opacity-50', 'cursor-not-allowed');
            downloadBtn.disabled = true;
            downloadBtn.classList.add('opacity-50', 'cursor-not-allowed');

            stripStatusBadge.innerText = `Ulang Take ${index + 1}...`;
            countdownBox.classList.remove('hidden');
            poseIndicator.innerText = `Ulang Take ${index + 1}`;

            await runCountdown(selectedTimerSeconds);

            triggerFlash();
            triggerHardwareFlash();
            playShutterSound();

            capturePoseIndex(index);

            countdownBox.classList.add('hidden');
            isSessionRunning = false;
            startBtn.disabled = false;
            startBtn.classList.remove('opacity-50', 'cursor-not-allowed');

            checkSessionCompletion();
        }

        function runCountdown(seconds) {
            return new Promise(resolve => {
                let current = seconds;
                updateCountdownDisplay(current);
                playBeepSound();

                const interval = setInterval(() => {
                    current--;
                    if (current > 0) {
                        updateCountdownDisplay(current);
                        playBeepSound();
                    } else {
                        clearInterval(interval);
                        resolve();
                    }
                }, 1000);
            });
        }

        function updateCountdownDisplay(num) {
            countdownNumber.innerText = num;
            countdownNumber.classList.remove('count-animate');
            void countdownNumber.offsetWidth;
            countdownNumber.classList.add('count-animate');
        }

        function triggerFlash() {
            flashOverlay.classList.remove('flash-shutter');
            void flashOverlay.offsetWidth;
            flashOverlay.classList.add('flash-shutter');
        }

        function capturePoseIndex(index) {
            const photoW = 460;
            const photoH = 320; // 16:11 Aspect Ratio Cinematic

            const photoCanvas = document.createElement('canvas');
            photoCanvas.width = photoW;
            photoCanvas.height = photoH;
            const pCtx = photoCanvas.getContext('2d');

            if (video.videoWidth > 0) {
                const sWidth = video.videoWidth;
                const sHeight = (sWidth * photoH) / photoW;
                const sy = (video.videoHeight - sHeight) / 2;

                pCtx.save();
                // Filter Cinematic Tone
                pCtx.filter = 'brightness(1.1) contrast(1.05) saturate(1.15)';

                if (currentFacingMode === 'user') {
                    pCtx.translate(photoW, 0);
                    pCtx.scale(-1, 1);
                }
                pCtx.drawImage(video, 0, sy, sWidth, sHeight, 0, 0, photoW, photoH);
                pCtx.restore();
            } else {
                pCtx.fillStyle = '#1c1917';
                pCtx.fillRect(0, 0, photoW, photoH);
            }

            capturedShots[index] = photoCanvas;
            document.getElementById(`retakeBtn${index}`).disabled = false;
            renderCinemaTicketLive();
        }

        function checkSessionCompletion() {
            const isAllCaptured = capturedShots.every(shot => shot !== null);
            if (isAllCaptured) {
                stripStatusBadge.className = "text-[10px] text-emerald-400 bg-emerald-950 px-2.5 py-0.5 rounded-full font-bold border border-emerald-800";
                stripStatusBadge.innerText = "Lengkap ✅";

                downloadBtn.disabled = false;
                downloadBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        }

        // --- Helper Barcode Tiket Bioskop ---
        function drawTicketBarcode(ctx, x, y, width, height, color) {
            ctx.save();
            ctx.translate(x, y);
            ctx.fillStyle = color;
            let curX = 0;
            const barPattern = [3, 1, 2, 1, 4, 2, 1, 3, 2, 1, 1, 4, 2, 1, 3, 2, 1, 3, 1, 2, 4, 1, 2, 3, 1];
            for (let i = 0; i < barPattern.length; i++) {
                const w = barPattern[i];
                if (i % 2 === 0) {
                    ctx.fillRect(curX, 0, w * 1.5, height);
                }
                curX += (w * 1.5) + 2;
                if (curX > width) break;
            }
            ctx.restore();
        }

        // --- Render Halaman Tiket Bioskop Lengkap ---
        function renderCinemaTicketLive() {
            const theme = ticketThemes[selectedTicketTheme] || ticketThemes.vintageRed;
            const tW = 440;
            const tH = 1140; // Rasio Tiket Panjang 3 Frame + Stub
            cinemaCanvas.width = tW;
            cinemaCanvas.height = tH;
            const cCtx = cinemaCanvas.getContext('2d');

            // 1. Badan Kartu Tiket Utama
            const cardGrad = cCtx.createLinearGradient(0, 0, tW, tH);
            cardGrad.addColorStop(0, theme.cardGrad[0]);
            cardGrad.addColorStop(1, theme.cardGrad[1]);
            cCtx.fillStyle = cardGrad;
            cCtx.fillRect(0, 0, tW, tH);

            // 2. Lubang Gerigi Sobekan Tiket (Ticket Cutout Notches) di Sisi Kiri & Kanan
            cCtx.save();
            cCtx.fillStyle = '#0a0808'; // Warna transparan sesuai canvas luar
            
            // Lubang samping atas & bawah
            cCtx.beginPath();
            cCtx.arc(0, 115, 18, -Math.PI / 2, Math.PI / 2);
            cCtx.fill();

            cCtx.beginPath();
            cCtx.arc(tW, 115, 18, Math.PI / 2, -Math.PI / 2);
            cCtx.fill();

            // Lubang sobekan stub bawah
            const stubY = tH - 170;
            cCtx.beginPath();
            cCtx.arc(0, stubY, 18, -Math.PI / 2, Math.PI / 2);
            cCtx.fill();

            cCtx.beginPath();
            cCtx.arc(tW, stubY, 18, Math.PI / 2, -Math.PI / 2);
            cCtx.fill();
            cCtx.restore();

            // 3. Garis Putus-Putus Sobekan Tiket (Perforation Dotted Line)
            cCtx.save();
            cCtx.strokeStyle = theme.dashedLine;
            cCtx.lineWidth = 2;
            cCtx.setLineDash([6, 6]);

            // Garis pervorasi atas
            cCtx.beginPath();
            cCtx.moveTo(25, 115);
            cCtx.lineTo(tW - 25, 115);
            cCtx.stroke();

            // Garis pervorasi bawah (Stub)
            cCtx.beginPath();
            cCtx.moveTo(25, stubY);
            cCtx.lineTo(tW - 25, stubY);
            cCtx.stroke();
            cCtx.restore();

            // 4. Header Atas Tiket
            cCtx.fillStyle = theme.headerText;
            cCtx.font = '900 36px "Bebas Neue", sans-serif';
            cCtx.textAlign = 'center';
            cCtx.fillText('★ CINEMA TICKET STUB ★', tW / 2, 48);

            cCtx.fillStyle = theme.subText;
            cCtx.font = '700 11px "Space Mono", monospace';
            cCtx.fillText('MAWSNAPBOOTH THEATRE • ADMIT ONE', tW / 2, 70);

            cCtx.font = '9px "Space Grotesk", sans-serif';
            cCtx.fillStyle = theme.accentText;
            cCtx.fillText('HALL 01 • SEAT A-12 • SPECIAL PREMIERE', tW / 2, 92);

            // 5. Render 3 Frame Foto Bioskop
            const photoW = 380;
            const photoH = 230;
            const startX = (tW - photoW) / 2;
            const startY = 135;
            const gapY = 18;
            const radius = 10;

            for (let i = 0; i < 3; i++) {
                const y = startY + i * (photoH + gapY);
                const shot = capturedShots[i];

                // Border Frame Polaroid Tiket
                cCtx.save();
                cCtx.fillStyle = '#FFFFFF';
                cCtx.beginPath();
                cCtx.roundRect(startX - 4, y - 4, photoW + 8, photoH + 8, radius);
                cCtx.fill();
                cCtx.restore();

                // Clipping Foto
                cCtx.save();
                cCtx.beginPath();
                cCtx.roundRect(startX, y, photoW, photoH, radius - 2);
                cCtx.clip();

                if (shot) {
                    cCtx.drawImage(shot, startX, y, photoW, photoH);
                } else {
                    cCtx.fillStyle = '#26201e';
                    cCtx.fillRect(startX, y, photoW, photoH);

                    cCtx.fillStyle = theme.subText;
                    cCtx.font = 'bold 13px "Space Mono", monospace';
                    cCtx.textAlign = 'center';
                    cCtx.fillText(`[ SCENE 0${i + 1} • TAKE ]`, tW / 2, y + photoH / 2);
                }
                cCtx.restore();

                // Info Nomor Scene Tiket di Bawah Setiap Foto
                cCtx.fillStyle = theme.subText;
                cCtx.font = '700 9px "Space Mono", monospace';
                cCtx.textAlign = 'left';
                cCtx.fillText(`REC // SCENE ${i + 1}`, startX + 4, y + photoH - 6);
            }

            // 6. Bagian Bawah: Ticket Stub & Barcode
            const today = new Date();
            const dateStr = today.toLocaleDateString('en-US', { month: 'short', day: '2-digit', year: 'numeric' });
            const timeStr = today.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });

            cCtx.fillStyle = theme.headerText;
            cCtx.font = '900 24px "Bebas Neue", sans-serif';
            cCtx.textAlign = 'left';
            cCtx.fillText('MOVIE MEMORIES PASS', 28, stubY + 34);

            cCtx.fillStyle = theme.subText;
            cCtx.font = '700 10px "Space Mono", monospace';
            cCtx.fillText(`DATE: ${dateStr.toUpperCase()}`, 28, stubY + 54);
            cCtx.fillText(`TIME: ${timeStr} WIB`, 28, stubY + 70);
            cCtx.fillText(`STUDIO: MAWSNAP 01`, 28, stubY + 86);

            // Barcode di Kanan Bawah
            drawTicketBarcode(cCtx, tW - 165, stubY + 22, 140, 48, theme.barcodeColor);
            cCtx.fillStyle = theme.subText;
            cCtx.font = '8px "Space Mono", monospace';
            cCtx.textAlign = 'right';
            cCtx.fillText(`TKT#${Date.now().toString().slice(-8)}`, tW - 25, stubY + 84);

            // Footer Paling Bawah
            cCtx.fillStyle = theme.accentText;
            cCtx.font = '700 9px "Space Mono", monospace';
            cCtx.textAlign = 'center';
            cCtx.fillText('★ KEEP THIS STUB AS A TIMELESS SOUVENIR ★', tW / 2, tH - 24);
        }

        function downloadCinemaTicket() {
            if (!capturedShots.every(s => s !== null)) return;
            const link = document.createElement('a');
            link.download = `cinema-ticket-${selectedTicketTheme}-${Date.now()}.png`;
            link.href = cinemaCanvas.toDataURL('image/png');
            link.click();
        }

        function resetBooth() {
            capturedShots = [null, null, null];
            for (let i = 0; i < 3; i++) {
                document.getElementById(`retakeBtn${i}`).disabled = true;
            }
            renderCinemaTicketLive();
            stripStatusBadge.className = "text-[10px] text-amber-400 bg-amber-950/80 px-2.5 py-0.5 rounded-full font-bold border border-amber-800/60";
            stripStatusBadge.innerText = "Menunggu";
            downloadBtn.disabled = true;
            downloadBtn.classList.add('opacity-50', 'cursor-not-allowed');
        }

        startBtn.addEventListener('click', startPhotoSession);
        downloadBtn.addEventListener('click', downloadCinemaTicket);

        // Render inisial canvas
        renderCinemaTicketLive();
    </script>
</body>

</html>