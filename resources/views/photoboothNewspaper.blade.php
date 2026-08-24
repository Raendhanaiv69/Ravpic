<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photobooth - The Daily Gazette Edition</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700;900&family=Playfair+Display:ital,wght@0,600;0,700;0,900;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Special+Elite&family=UnifrakturMaguntia&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #2b2b2b 0%, #1a1a1a 50%, #121212 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #f3f4f6;
        }

        .font-news-title {
            font-family: 'UnifrakturMaguntia', 'Playfair Display', serif;
        }

        .font-serif-headline {
            font-family: 'Playfair Display', serif;
        }

        .font-typewriter {
            font-family: 'Special Elite', monospace;
        }

        /* Kamera Desktop Card */
        .camera-card-desktop {
            width: 490px;
            max-width: 100%;
            background: #242424;
            border-radius: 28px;
            padding: 18px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
            border: 2px solid #3d3d3d;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Viewport Kamera Aspect Ratio Koran (3:4) */
        .camera-viewport-box {
            position: relative;
            width: 440px;
            height: 480px;
            max-width: 100%;
            border-radius: 20px;
            overflow: hidden;
            background-color: #0d0d0d;
            border: 1px solid #444;
        }

        /* Filter Kamera Berwarna Cerah & Mulus */
        .camera-viewport-box video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scaleX(-1);
            display: block;
            filter: brightness(1.08) contrast(1.04) saturate(1.1);
        }

        /* Container Hasil Koran */
        .result-card-desktop {
            width: 450px;
            max-width: 100%;
            background: #242424;
            border-radius: 28px;
            padding: 18px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
            border: 2px solid #3d3d3d;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .strip-preview-box {
            width: 100%;
            height: 480px;
            border-radius: 18px;
            overflow: hidden;
            background-color: #1a1a1a;
            border: 1px solid #404040;
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
    <div class="h-1 bg-gradient-to-r from-amber-600 via-stone-400 to-amber-700 w-full shrink-0"></div>

    <!-- Header Navbar -->
    <nav class="bg-[#1e1e1e]/80 backdrop-blur-md border-b border-stone-800 sticky top-0 z-40 shrink-0">
        <div class="max-w-6xl mx-auto px-5 py-3 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <a href="{{ route('templates.index') }}"
                    class="w-8 h-8 rounded-xl bg-stone-800 border border-stone-700 flex items-center justify-center text-xs hover:bg-stone-700 transition text-stone-300 font-bold">
                    ←
                </a>
                <div>
                    <span class="font-serif font-bold text-sm text-stone-200 tracking-wider">THE DAILY CHRONICLE</span>
                    <span class="text-[10px] text-stone-500 block">Color Newspaper Edition</span>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <button type="button" onclick="switchCameraFacing()" id="flipCamBtn"
                    class="md:hidden px-2.5 py-1 rounded-lg text-xs font-bold bg-stone-800 text-stone-300 border border-stone-700 hover:bg-stone-700 flex items-center gap-1">
                    <span>📷</span> Flip
                </button>
                <span id="sessionStatus"
                    class="px-2.5 py-0.5 text-[10px] font-bold rounded-full bg-stone-800 text-amber-500 border border-stone-700">
                    📰 Full Color Newspaper
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
                        class="px-2.5 py-0.5 rounded-lg text-xs font-bold bg-stone-200 text-stone-900 border border-stone-200 transition-all">
                        3s
                    </button>
                    <button type="button" onclick="setTimer(5)" id="timer5Btn"
                        class="px-2.5 py-0.5 rounded-lg text-xs font-bold bg-stone-800 text-stone-300 border border-stone-700 hover:bg-stone-700 transition-all">
                        5s
                    </button>
                </div>

                <div class="flex items-center gap-1.5">
                    <span class="px-2 py-0.5 rounded-lg text-[10px] font-bold bg-stone-800 text-emerald-400 border border-stone-700">
                        ✨ Full Color HD
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
                    class="absolute inset-0 z-40 flex flex-col items-center justify-center pointer-events-none hidden bg-black/50 backdrop-blur-[2px]">
                    <div
                        class="w-20 h-20 rounded-full bg-stone-900/80 border-2 border-stone-300 flex items-center justify-center shadow-2xl animate-pulse">
                        <span id="countdownNumber"
                            class="text-4xl font-extrabold text-stone-100 font-serif-headline count-animate">3</span>
                    </div>
                    <span id="poseIndicator"
                        class="mt-3 text-xs font-bold text-stone-200 uppercase tracking-widest bg-stone-800 px-4 py-1 rounded-full border border-stone-600 shadow-md">
                        Pose 1 / 2
                    </span>
                </div>

                <!-- Watermark Kamera -->
                <div class="absolute bottom-3 left-0 right-0 z-20 flex justify-center pointer-events-none">
                    <span class="text-stone-300 text-[10px] tracking-widest uppercase bg-black/60 backdrop-blur-sm px-3 py-0.5 rounded-full border border-stone-700">
                        📰 THE DAILY VINTAGE PRINT • LIVE
                    </span>
                </div>
            </div>

            <!-- Tombol Aksi Kamera -->
            <div class="w-full flex items-center gap-2 mt-4">
                <button id="startSessionBtn" type="button"
                    class="flex-1 py-3 rounded-2xl bg-gradient-to-r from-stone-200 via-stone-300 to-stone-400 text-stone-900 font-extrabold text-xs md:text-sm shadow-lg hover:brightness-105 active:scale-98 transition-all flex items-center justify-center gap-2 cursor-pointer">
                    <span class="text-base">📸</span> Mulai Cetak Foto (2 Pose)
                </button>
                <button type="button" onclick="startCamera()" title="Refresh Kamera"
                    class="w-12 h-11 rounded-2xl bg-stone-800 text-stone-300 border border-stone-700 flex items-center justify-center text-sm hover:bg-stone-700 transition-all cursor-pointer">
                    ⟳
                </button>
            </div>
        </div>

        <!-- KANAN: Hasil Koran Full Color -->
        <div class="result-card-desktop">
            <div class="w-full flex justify-between items-center mb-2 px-1">
                <span class="text-xs font-bold text-stone-300">🗞️ Hasil Cetak Koran</span>
                <span id="stripStatusBadge"
                    class="text-[10px] text-amber-400 bg-amber-950/80 px-2.5 py-0.5 rounded-full font-bold border border-amber-800/60">Menunggu</span>
            </div>

            <!-- Pilihan Kertas Koran -->
            <div class="w-full flex items-center justify-between mb-2.5 px-3 py-1.5 bg-stone-800/80 rounded-2xl border border-stone-700">
                <span class="text-[11px] font-bold text-stone-300 flex items-center gap-1">📜 Jenis Kertas:</span>
                <div class="flex items-center gap-2.5">
                    <button type="button" onclick="selectPaperTone('vintage')" id="colorBtn-vintage" title="Vintage Aged Paper"
                        class="w-5 h-5 rounded-full bg-[#f4ecd8] border-2 border-amber-600 ring-2 ring-amber-400 scale-110 transition-all shadow-sm"></button>
                    <button type="button" onclick="selectPaperTone('classic')" id="colorBtn-classic" title="Classic Newsprint White"
                        class="w-5 h-5 rounded-full bg-[#e8e8e8] border-2 border-transparent hover:scale-105 transition-all opacity-70 hover:opacity-100"></button>
                    <button type="button" onclick="selectPaperTone('sepia')" id="colorBtn-sepia" title="Warm Sepia"
                        class="w-5 h-5 rounded-full bg-[#ebd7ba] border-2 border-transparent hover:scale-105 transition-all opacity-70 hover:opacity-100"></button>
                </div>
            </div>

            <!-- Preview Canvas Koran -->
            <div class="strip-preview-box">
                <canvas id="newspaperCanvas" class="w-full h-full object-contain"></canvas>
            </div>

            <!-- Ulang Pose Satuan -->
            <div class="w-full mt-2.5 flex items-center justify-between gap-1 bg-stone-800/60 p-2 rounded-2xl border border-stone-700">
                <span class="text-[10px] font-bold text-stone-300 pl-1">Ulang Foto:</span>
                <div class="flex gap-2">
                    <button type="button" onclick="retakeSinglePose(0)" id="retakeBtn0" disabled
                        class="px-3 py-1 rounded-lg bg-stone-900 border border-stone-700 text-stone-200 text-xs font-bold hover:bg-stone-700 disabled:opacity-30 disabled:cursor-not-allowed transition-all">
                        Foto 1 ⟳
                    </button>
                    <button type="button" onclick="retakeSinglePose(1)" id="retakeBtn1" disabled
                        class="px-3 py-1 rounded-lg bg-stone-900 border border-stone-700 text-stone-200 text-xs font-bold hover:bg-stone-700 disabled:opacity-30 disabled:cursor-not-allowed transition-all">
                        Foto 2 ⟳
                    </button>
                </div>
            </div>

            <!-- Tombol Unduh & Reset -->
            <div class="w-full flex flex-col gap-1.5 mt-2.5">
                <button id="downloadBtn" type="button" disabled
                    class="w-full py-2.5 rounded-xl bg-gradient-to-r from-stone-200 via-stone-300 to-stone-400 text-stone-900 font-extrabold text-xs shadow-md opacity-50 cursor-not-allowed transition-all flex items-center justify-center gap-1.5">
                    <span>💾</span> Unduh Lembaran Koran (PNG)
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
        const newspaperCanvas = document.getElementById('newspaperCanvas');

        const timer3Btn = document.getElementById('timer3Btn');
        const timer5Btn = document.getElementById('timer5Btn');
        const torchStatusText = document.getElementById('torchStatusText');

        let selectedTimerSeconds = 3;
        let capturedShots = [null, null]; // 2 Foto Utama Koran
        let isSessionRunning = false;
        let currentFacingMode = 'user';
        let currentMediaStream = null;
        let torchActivePreference = true;

        // --- Palet Tekstur Kertas Koran ---
        let selectedPaperTone = 'vintage';
        const paperThemes = {
            vintage: {
                bg: '#F5EFE0',
                paperBorder: '#E0D4B8',
                ink: '#1F1B18',
                subInk: '#4A423A',
                accentLine: '#26201B'
            },
            classic: {
                bg: '#EBEBEB',
                paperBorder: '#D1D1D1',
                ink: '#111111',
                subInk: '#3B3B3B',
                accentLine: '#181818'
            },
            sepia: {
                bg: '#EEDCC1',
                paperBorder: '#D8BE9A',
                ink: '#2B1E13',
                subInk: '#5A4633',
                accentLine: '#382618'
            }
        };

        function selectPaperTone(toneKey) {
            if (!paperThemes[toneKey]) return;
            selectedPaperTone = toneKey;

            ['vintage', 'classic', 'sepia'].forEach(t => {
                const btn = document.getElementById(`colorBtn-${t}`);
                if (btn) {
                    btn.className = (t === toneKey) 
                        ? 'w-5 h-5 rounded-full border-2 border-amber-600 ring-2 ring-amber-400 scale-110 transition-all shadow-sm cursor-pointer' 
                        : 'w-5 h-5 rounded-full border-2 border-transparent hover:scale-105 transition-all opacity-70 hover:opacity-100 cursor-pointer';
                    if (t === 'vintage') btn.style.backgroundColor = '#f4ecd8';
                    if (t === 'classic') btn.style.backgroundColor = '#e8e8e8';
                    if (t === 'sepia') btn.style.backgroundColor = '#ebd7ba';
                }
            });

            renderNewspaperLive();
        }

        function setTimer(sec) {
            if (isSessionRunning) return;
            selectedTimerSeconds = sec;
            if (sec === 3) {
                timer3Btn.className = "px-2.5 py-0.5 rounded-lg text-xs font-bold bg-stone-200 text-stone-900 border border-stone-200 transition-all";
                timer5Btn.className = "px-2.5 py-0.5 rounded-lg text-xs font-bold bg-stone-800 text-stone-300 border border-stone-700 hover:bg-stone-700 transition-all";
            } else {
                timer5Btn.className = "px-2.5 py-0.5 rounded-lg text-xs font-bold bg-stone-200 text-stone-900 border border-stone-200 transition-all";
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
                osc.frequency.setValueAtTime(700, audioCtx.currentTime);
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
                osc.frequency.exponentialRampToValueAtTime(80, audioCtx.currentTime + 0.12);
                gain.gain.setValueAtTime(0.35, audioCtx.currentTime);
                gain.gain.exponentialRampToValueAtTime(0.01, audioCtx.currentTime + 0.12);
                osc.connect(gain);
                gain.connect(audioCtx.destination);
                osc.start();
                osc.stop(audioCtx.currentTime + 0.12);
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
            capturedShots = [null, null];

            startBtn.disabled = true;
            startBtn.classList.add('opacity-50', 'cursor-not-allowed');
            downloadBtn.disabled = true;
            downloadBtn.classList.add('opacity-50', 'cursor-not-allowed');

            stripStatusBadge.className = "text-[10px] text-amber-300 bg-amber-900/60 px-2.5 py-0.5 rounded-full font-bold border border-amber-700";
            stripStatusBadge.innerText = "Mencetak...";

            countdownBox.classList.remove('hidden');

            for (let i = 0; i < 2; i++) {
                poseIndicator.innerText = `Pose ${i + 1} / 2`;
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

            stripStatusBadge.innerText = `Ulang Pose ${index + 1}...`;
            countdownBox.classList.remove('hidden');
            poseIndicator.innerText = `Ulang Pose ${index + 1}`;

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

        // --- Capture Pose Berwarna Asli & Tajam ---
        function capturePoseIndex(index) {
            const photoW = 540;
            const photoH = 380; // Aspect ratio landscape ala koran

            const photoCanvas = document.createElement('canvas');
            photoCanvas.width = photoW;
            photoCanvas.height = photoH;
            const pCtx = photoCanvas.getContext('2d');

            if (video.videoWidth > 0) {
                const sWidth = video.videoWidth;
                const sHeight = (sWidth * photoH) / photoW;
                const sy = (video.videoHeight - sHeight) / 2;

                pCtx.save();
                // Filter Berwarna: Cerah, Mulus, dan Warna Segar
                pCtx.filter = 'brightness(1.08) contrast(1.04) saturate(1.1)';

                if (currentFacingMode === 'user') {
                    pCtx.translate(photoW, 0);
                    pCtx.scale(-1, 1);
                }
                pCtx.drawImage(video, 0, sy, sWidth, sHeight, 0, 0, photoW, photoH);
                pCtx.restore();

            } else {
                pCtx.fillStyle = '#222222';
                pCtx.fillRect(0, 0, photoW, photoH);
            }

            capturedShots[index] = photoCanvas;

            document.getElementById(`retakeBtn${index}`).disabled = false;
            renderNewspaperLive();
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

        // --- Helper Gambar Barcode Koran ---
        function drawBarcode(ctx, x, y, width, height, color) {
            ctx.save();
            ctx.translate(x, y);
            ctx.fillStyle = color;
            let curX = 0;
            const barPattern = [2, 1, 3, 1, 2, 4, 1, 2, 3, 1, 1, 3, 2, 1, 4, 2, 1, 3, 2, 1, 2, 3, 1, 2, 1, 4];
            for (let i = 0; i < barPattern.length; i++) {
                const w = barPattern[i];
                if (i % 2 === 0) {
                    ctx.fillRect(curX, 0, w * 1.6, height);
                }
                curX += (w * 1.6) + 2;
                if (curX > width) break;
            }
            ctx.restore();
        }

        // --- Render Halaman Koran Utuh ---
        function renderNewspaperLive() {
            const theme = paperThemes[selectedPaperTone] || paperThemes.vintage;
            const nw = 680;
            const nh = 940; // Rasio Tabloid Newspaper
            newspaperCanvas.width = nw;
            newspaperCanvas.height = nh;
            const nCtx = newspaperCanvas.getContext('2d');

            // 1. Kertas Dasar
            nCtx.fillStyle = theme.bg;
            nCtx.fillRect(0, 0, nw, nh);

            // Double Garis Tepi Koran
            nCtx.strokeStyle = theme.accentLine;
            nCtx.lineWidth = 3;
            nCtx.strokeRect(16, 16, nw - 32, nh - 32);
            nCtx.lineWidth = 1;
            nCtx.strokeRect(21, 21, nw - 42, nh - 42);

            // 2. Header / Masthead Koran
            const today = new Date();
            const dateFull = today.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });

            nCtx.fillStyle = theme.subInk;
            nCtx.font = '600 10px "Playfair Display", serif';
            nCtx.textAlign = 'left';
            nCtx.fillText(`VOL. XXIV NO. 108 • SPECIAL COLOR ISSUE`, 30, 40);
            nCtx.textAlign = 'right';
            nCtx.fillText(`PRICE: TWO CENTS`, nw - 30, 40);

            // Garis Pembatas Atas Judul
            nCtx.strokeStyle = theme.accentLine;
            nCtx.lineWidth = 1.5;
            nCtx.beginPath();
            nCtx.moveTo(28, 46);
            nCtx.lineTo(nw - 28, 46);
            nCtx.stroke();

            // Judul Masthead Besar
            nCtx.fillStyle = theme.ink;
            nCtx.font = '900 48px "UnifrakturMaguntia", "Playfair Display", serif';
            nCtx.textAlign = 'center';
            nCtx.fillText('The Daily Chronicle', nw / 2, 92);

            // Garis Pembatas Bawah Judul & Metadata
            nCtx.beginPath();
            nCtx.moveTo(28, 102);
            nCtx.lineTo(nw - 28, 102);
            nCtx.stroke();

            nCtx.font = 'italic 600 11px "Playfair Display", serif';
            nCtx.fillStyle = theme.subInk;
            nCtx.textAlign = 'center';
            nCtx.fillText(`★ THE WORLD'S GREATEST PHOTOBOOTH MEMORIES • ${dateFull.toUpperCase()} ★`, nw / 2, 116);

            nCtx.lineWidth = 2;
            nCtx.beginPath();
            nCtx.moveTo(28, 124);
            nCtx.lineTo(nw - 28, 124);
            nCtx.stroke();

            // 3. Headline Utama
            nCtx.fillStyle = theme.ink;
            nCtx.font = '900 24px "Playfair Display", serif';
            nCtx.textAlign = 'center';
            nCtx.fillText('UNFORGETTABLE MOMENTS IN FULL COLOR!', nw / 2, 150);

            // Sub-headline
            nCtx.font = 'italic 12px "Playfair Display", serif';
            nCtx.fillStyle = theme.subInk;
            nCtx.fillText('Two wonderful portraits published exclusively for the daily special color edition.', nw / 2, 168);

            // 4. Area 2 Foto Koran (Vertikal Bertumpuk)
            const photoW = 440;
            const photoH = 260;
            const startX = (nw - photoW) / 2;
            const photo1Y = 186;
            const photo2Y = 490;

            const renderPhotoSlot = (shot, y, captionText, index) => {
                // Border Foto Koran Klasik
                nCtx.save();
                nCtx.strokeStyle = theme.ink;
                nCtx.lineWidth = 2;
                nCtx.strokeRect(startX - 4, y - 4, photoW + 8, photoH + 8);

                if (shot) {
                    nCtx.drawImage(shot, startX, y, photoW, photoH);
                } else {
                    nCtx.fillStyle = '#E5DEC9';
                    nCtx.fillRect(startX, y, photoW, photoH);
                    nCtx.fillStyle = theme.subInk;
                    nCtx.font = 'bold 15px "Special Elite", monospace';
                    nCtx.textAlign = 'center';
                    nCtx.fillText(`[ PHOTO ${index + 1} PLACEHOLDER ]`, nw / 2, y + photoH / 2);
                }
                nCtx.restore();

                // Caption Foto
                nCtx.fillStyle = theme.subInk;
                nCtx.font = 'italic 10px "Playfair Display", serif';
                nCtx.textAlign = 'center';
                nCtx.fillText(captionText, nw / 2, y + photoH + 18);
            };

            renderPhotoSlot(capturedShots[0], photo1Y, 'Fig 1.1 — Authentic snapshot of pure joy and radiant color smile.', 0);
            renderPhotoSlot(capturedShots[1], photo2Y, 'Fig 1.2 — Memorable moment captured in full natural color palette.', 1);

            // 5. Garis Pembatas Kolom Bawah & Artikel Koran Tambahan
            nCtx.strokeStyle = theme.accentLine;
            nCtx.lineWidth = 1.2;
            nCtx.beginPath();
            nCtx.moveTo(28, 785);
            nCtx.lineTo(nw - 28, 785);
            nCtx.stroke();

            // Kolom Teks Berita Kiri
            nCtx.fillStyle = theme.subInk;
            nCtx.font = 'bold 11px "Playfair Display", serif';
            nCtx.textAlign = 'left';
            nCtx.fillText('EDITORIAL NOTE', 35, 805);
            nCtx.font = '9px "Special Elite", monospace';
            nCtx.fillText('Every picture tells a thousand words', 35, 822);
            nCtx.fillText('printed with sharp vibrant inks', 35, 836);
            nCtx.fillText('to preserve every colorful memory.', 35, 850);

            // Garis Vertikal Pemisah Kolom
            nCtx.beginPath();
            nCtx.moveTo(260, 792);
            nCtx.lineTo(260, 910);
            nCtx.stroke();

            // Kolom Tengah: Info Studio
            nCtx.fillStyle = theme.ink;
            nCtx.font = 'bold 14px "Playfair Display", serif';
            nCtx.textAlign = 'center';
            nCtx.fillText('MAWSNAPBOOTH STUDIO', nw / 2 + 30, 818);
            nCtx.font = 'italic 10px "Playfair Display", serif';
            nCtx.fillStyle = theme.subInk;
            nCtx.fillText('The Premier Color Newspaper Photobooth', nw / 2 + 30, 836);
            nCtx.fillText('Certified Genuine Print Archive • 1926-2026', nw / 2 + 30, 852);

            // Garis Vertikal Pemisah Barcode
            nCtx.beginPath();
            nCtx.moveTo(480, 792);
            nCtx.lineTo(480, 910);
            nCtx.stroke();

            // Kolom Kanan: Barcode & Nomor Seri
            drawBarcode(nCtx, 496, 808, 140, 36, theme.ink);
            nCtx.fillStyle = theme.subInk;
            nCtx.font = '8px "Special Elite", monospace';
            nCtx.textAlign = 'center';
            nCtx.fillText(`SN: #MSB-${Date.now().toString().slice(-6)}`, 565, 860);

            // Footer Paling Bawah
            nCtx.fillStyle = theme.subInk;
            nCtx.font = '9px "Playfair Display", serif';
            nCtx.textAlign = 'center';
            nCtx.fillText('• ALL RIGHTS RESERVED • PRINTED AT MAWSNAPBOOTH PRESS •', nw / 2, nh - 26);
        }

        function downloadNewspaper() {
            if (!capturedShots.every(s => s !== null)) return;
            const link = document.createElement('a');
            link.download = `color-newspaper-${selectedPaperTone}-${Date.now()}.png`;
            link.href = newspaperCanvas.toDataURL('image/png');
            link.click();
        }

        function resetBooth() {
            capturedShots = [null, null];
            document.getElementById('retakeBtn0').disabled = true;
            document.getElementById('retakeBtn1').disabled = true;
            renderNewspaperLive();
            stripStatusBadge.className = "text-[10px] text-amber-400 bg-amber-950/80 px-2.5 py-0.5 rounded-full font-bold border border-amber-800/60";
            stripStatusBadge.innerText = "Menunggu";
            downloadBtn.disabled = true;
            downloadBtn.classList.add('opacity-50', 'cursor-not-allowed');
        }

        startBtn.addEventListener('click', startPhotoSession);
        downloadBtn.addEventListener('click', downloadNewspaper);

        // Render awal lembaran koran
        renderNewspaperLive();
    </script>
</body>

</html>