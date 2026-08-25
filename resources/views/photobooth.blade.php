<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photobooth Aquarium</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Quicksand:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #d2e4ff 0%, #e6f0ff 50%, #d2e4ff 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .font-brand {
            font-family: 'Quicksand', sans-serif;
        }

        /* Container Kamera Desktop */
        .camera-card-desktop {
            width: 480px;
            max-width: 100%;
            background: #ffffff;
            border-radius: 28px;
            padding: 16px;
            box-shadow: 0 15px 35px rgba(234, 124, 143, 0.15);
            border: 2px solid #FFE4E8;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Viewport Kamera 1:1 */
        .camera-viewport-square {
            position: relative;
            width: 440px;
            height: 440px;
            max-width: 100%;
            aspect-ratio: 1 / 1;
            border-radius: 22px;
            overflow: hidden;
            background-color: #1e1b1b;
        }

        /* Filter Kamera Glowing, Mulus & Cerah */
        .camera-viewport-square video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scaleX(-1);
            display: block;
            filter: brightness(1.12) contrast(1.03) saturate(1.12) blur(0.25px);
        }

        .camera-viewport-square canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 20;
        }

        /* Container Hasil Grid 2x2 */
        .result-card-desktop {
            width: 440px;
            max-width: 100%;
            background: #ffffff;
            border-radius: 28px;
            padding: 16px;
            box-shadow: 0 15px 35px rgba(234, 124, 143, 0.15);
            border: 2px solid #FFE4E8;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .strip-preview-box {
            width: 100%;
            height: 440px;
            border-radius: 20px;
            overflow: hidden;
            background-color: #FFF5F7;
            border: 1px solid #FFDCE2;
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
            animation: shutterFlash 0.4s ease-out forwards;
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

<body class="text-[#6E4B4B] antialiased">

    <!-- Top Accent Bar -->
    <div class="h-1 bg-gradient-to-r from-amber-300 via-rose-300 to-pink-300 w-full shrink-0"></div>

    <!-- Header Navbar -->
    <nav class="bg-white/70 backdrop-blur-md border-b border-pink-100/80 sticky top-0 z-40 shrink-0">
        <div class="max-w-6xl mx-auto px-5 py-2.5 flex justify-between items-center">
            <div class="flex items-center gap-2.5">
                <a href="{{ route('templates.index') }}"
                    class="w-8 h-8 rounded-xl bg-white border border-pink-200 flex items-center justify-center text-xs hover:bg-pink-50 transition text-[#8C3A49] font-bold">
                    ←
                </a>
                <span class="font-bold font-brand text-sm text-[#8C3A49]">Mawsnapbooth Studio</span>
            </div>

            <div class="flex items-center gap-2">
                <button type="button" onclick="switchCameraFacing()" id="flipCamBtn"
                    class="md:hidden px-2.5 py-1 rounded-lg text-xs font-bold bg-pink-50 text-[#8C3A49] border border-pink-200 hover:bg-pink-100 flex items-center gap-1">
                    <span>📷</span> Flip
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Workspace -->
    <main
        class="flex-1 max-w-6xl mx-auto w-full px-4 py-6 flex flex-col lg:flex-row items-center lg:items-start justify-center gap-6">

        <!-- KIRI: Live Camera Viewport -->
        <div class="camera-card-desktop">

            <div class="w-full flex justify-between items-center mb-3 px-1">
                <div class="flex items-center gap-1.5">
                    <span class="text-xs font-bold text-[#8C3A49]">⏱️ Timer:</span>
                    <button type="button" onclick="setTimer(3)" id="timer3Btn"
                        class="px-2.5 py-0.5 rounded-lg text-xs font-bold bg-[#FFAAA6] text-white border border-[#FFAAA6] transition-all">
                        3s
                    </button>
                    <button type="button" onclick="setTimer(5)" id="timer5Btn"
                        class="px-2.5 py-0.5 rounded-lg text-xs font-bold bg-pink-50 text-[#8C3A49] border border-pink-200 hover:bg-pink-100 transition-all">
                        5s
                    </button>
                </div>

                <div class="flex items-center gap-1.5">
                    
                    <button type="button" onclick="toggleTorchPreference()" id="torchPrefBtn"
                        class="px-2 py-0.5 rounded-lg text-[11px] font-bold bg-pink-50 text-[#8C3A49] border border-pink-200">
                        ⚡ Flash HP: <span id="torchStatusText">Auto</span>
                    </button>
                </div>
            </div>

            <!-- Area Kamera Square -->
            <div class="camera-viewport-square">
                <video id="webcam" autoplay playsinline muted></video>
                <canvas id="fishCanvas"></canvas>

                <!-- Screen Flash Overlay -->
                <div id="flashOverlay" class="absolute inset-0 pointer-events-none z-50 opacity-0"></div>

                <!-- Countdown Overlay -->
                <div id="countdownBox"
                    class="absolute inset-0 z-40 flex flex-col items-center justify-center pointer-events-none hidden bg-black/35 backdrop-blur-[2px]">
                    <div
                        class="w-20 h-20 rounded-full bg-white/20 border-2 border-white/70 flex items-center justify-center shadow-xl backdrop-blur-sm animate-pulse">
                        <span id="countdownNumber"
                            class="text-4xl font-extrabold text-white font-brand count-animate drop-shadow-md">3</span>
                    </div>
                    <span id="poseIndicator"
                        class="mt-3 text-xs font-bold text-white uppercase tracking-widest bg-gradient-to-r from-rose-500 to-pink-500 px-3.5 py-1 rounded-full shadow-md">
                        Pose 1 / 4
                    </span>
                </div>

                <!-- Watermark -->
                <div class="absolute bottom-2.5 left-0 right-0 z-20 flex justify-center pointer-events-none">
                    <span
                        class="text-white/95 text-[9px] font-brand tracking-widest uppercase bg-black/35 backdrop-blur-sm px-3 py-0.5 rounded-full">
                        🫧 AQUARIUM BOOTH • 2x2 CORAL 🫧
                    </span>
                </div>
            </div>

            <!-- Tombol Aksi Kamera -->
            <div class="w-full flex items-center gap-2 mt-4">
                <button id="startSessionBtn" type="button"
                    class="flex-1 py-3 rounded-2xl bg-gradient-to-r from-[#FFAAA6] via-[#FF8E9E] to-[#EA7C8F] text-white font-bold text-xs md:text-sm shadow-md shadow-rose-300/40 hover:opacity-95 active:scale-98 transition-all flex items-center justify-center gap-2 cursor-pointer">
                    <span class="text-base">📸</span> Mulai Foto (4 Pose)
                </button>
                <button type="button" onclick="startCamera()" title="Refresh Kamera"
                    class="w-12 h-11 rounded-2xl bg-pink-50 text-[#8C3A49] border border-pink-200 flex items-center justify-center text-sm hover:bg-pink-100 transition-all cursor-pointer">
                    ⟳
                </button>
            </div>
        </div>

        <!-- KANAN: Hasil 2x2 Coral Wave Frame -->
        <div class="result-card-desktop">
            <div class="w-full flex justify-between items-center mb-2 px-1">
                <span id="stripStatusBadge"
                    class="text-[10px] text-amber-600 bg-amber-50 px-2.5 py-0.5 rounded-full font-bold">Menunggu</span>
            </div>

            <!-- Pilihan Tema Warna -->
            <div
                class="w-full flex items-center justify-between mb-2 px-2.5 py-1.5 bg-pink-50/60 rounded-2xl border border-pink-100">
                <span class="text-[11px] font-bold text-[#7A3644] flex items-center gap-1">🎨 Tema Laut:</span>
                <div class="flex items-center gap-2.5">
                    <button type="button" onclick="selectFrameColor('pink')" id="colorBtn-pink" title="Coral Pink"
                        class="w-5 h-5 rounded-full bg-[#FFB6C1] border-2 border-rose-400 ring-2 ring-rose-300 scale-110 transition-all shadow-sm cursor-pointer"></button>
                    <button type="button" onclick="selectFrameColor('blue')" id="colorBtn-blue" title="Deep Ocean"
                        class="w-5 h-5 rounded-full bg-[#7DD3FC] border-2 border-transparent hover:scale-105 transition-all shadow-sm cursor-pointer opacity-70 hover:opacity-100"></button>
                    <button type="button" onclick="selectFrameColor('yellow')" id="colorBtn-yellow" title="Sandy Beach"
                        class="w-5 h-5 rounded-full bg-[#FDE047] border-2 border-transparent hover:scale-105 transition-all shadow-sm cursor-pointer opacity-70 hover:opacity-100"></button>
                    <button type="button" onclick="selectFrameColor('purple')" id="colorBtn-purple" title="Mystic Lagoon"
                        class="w-5 h-5 rounded-full bg-[#D8B4FE] border-2 border-transparent hover:scale-105 transition-all shadow-sm cursor-pointer opacity-70 hover:opacity-100"></button>
                </div>
            </div>

            <!-- Preview Canvas 2x2 -->
            <div class="strip-preview-box">
                <canvas id="stripCanvas" class="w-full h-full object-contain"></canvas>
            </div>

            <!-- Unduh Foto Satuan 1-4 -->
            <div
                class="w-full mt-2.5 flex items-center justify-between gap-1 bg-sky-50/80 p-1.5 rounded-2xl border border-sky-100">
                <span class="text-[10px] font-bold text-sky-800 pl-1 flex items-center gap-1">
                    <span>🐠</span> Unduh 1 frame:
                </span>
                <div class="flex gap-1.5">
                    <button type="button" onclick="downloadSinglePhotoWithFish(0)" id="dlSingleBtn0" disabled
                        class="px-2 py-0.5 rounded-lg bg-white border border-sky-200 text-sky-800 text-[10px] font-bold hover:bg-sky-100 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                        1 💾
                    </button>
                    <button type="button" onclick="downloadSinglePhotoWithFish(1)" id="dlSingleBtn1" disabled
                        class="px-2 py-0.5 rounded-lg bg-white border border-sky-200 text-sky-800 text-[10px] font-bold hover:bg-sky-100 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                        2 💾
                    </button>
                    <button type="button" onclick="downloadSinglePhotoWithFish(2)" id="dlSingleBtn2" disabled
                        class="px-2 py-0.5 rounded-lg bg-white border border-sky-200 text-sky-800 text-[10px] font-bold hover:bg-sky-100 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                        3 💾
                    </button>
                    <button type="button" onclick="downloadSinglePhotoWithFish(3)" id="dlSingleBtn3" disabled
                        class="px-2 py-0.5 rounded-lg bg-white border border-sky-200 text-sky-800 text-[10px] font-bold hover:bg-sky-100 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                        4 💾
                    </button>
                </div>
            </div>

            <!-- Ulang Pose Satuan 1-4 -->
            <div
                class="w-full mt-1.5 flex items-center justify-between gap-1 bg-pink-50/70 p-1.5 rounded-2xl border border-pink-100">
                <span class="text-[10px] font-bold text-[#7A3644] pl-1">Ulang Pose:</span>
                <div class="flex gap-1.5">
                    <button type="button" onclick="retakeSinglePose(0)" id="retakeBtn0" disabled
                        class="px-2 py-0.5 rounded-lg bg-white border border-pink-200 text-[#8C3A49] text-[10px] font-bold hover:bg-pink-100 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                        1 ⟳
                    </button>
                    <button type="button" onclick="retakeSinglePose(1)" id="retakeBtn1" disabled
                        class="px-2 py-0.5 rounded-lg bg-white border border-pink-200 text-[#8C3A49] text-[10px] font-bold hover:bg-pink-100 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                        2 ⟳
                    </button>
                    <button type="button" onclick="retakeSinglePose(2)" id="retakeBtn2" disabled
                        class="px-2 py-0.5 rounded-lg bg-white border border-pink-200 text-[#8C3A49] text-[10px] font-bold hover:bg-pink-100 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                        3 ⟳
                    </button>
                    <button type="button" onclick="retakeSinglePose(3)" id="retakeBtn3" disabled
                        class="px-2 py-0.5 rounded-lg bg-white border border-pink-200 text-[#8C3A49] text-[10px] font-bold hover:bg-pink-100 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                        4 ⟳
                    </button>
                </div>
            </div>

            <!-- Tombol Unduh & Reset -->
            <div class="w-full flex flex-col gap-1.5 mt-2.5">
                <button id="downloadBtn" type="button" disabled
                    class="w-full py-2.5 rounded-xl bg-gradient-to-r from-[#FFAAA6] to-[#FF8E9E] text-white font-bold text-xs shadow-md shadow-rose-200 opacity-50 cursor-not-allowed transition-all flex items-center justify-center gap-1.5">
                    <span>💾</span> Unduh Frame 2x2 (PNG)
                </button>
                <button id="resetAllBtn" type="button" onclick="resetBooth()"
                    class="w-full py-1.5 rounded-xl bg-pink-50 text-[#8C3A49] font-bold text-xs hover:bg-pink-100 transition-all">
                    Reset Semua Foto 🔄
                </button>
            </div>
        </div>

    </main>

    <!-- Script Engine -->
    <script>
        const video = document.getElementById('webcam');
        const canvas = document.getElementById('fishCanvas');
        const ctx = canvas.getContext('2d');

        const flashOverlay = document.getElementById('flashOverlay');
        const countdownBox = document.getElementById('countdownBox');
        const countdownNumber = document.getElementById('countdownNumber');
        const poseIndicator = document.getElementById('poseIndicator');
        const startBtn = document.getElementById('startSessionBtn');
        const downloadBtn = document.getElementById('downloadBtn');
        const stripStatusBadge = document.getElementById('stripStatusBadge');
        const stripCanvas = document.getElementById('stripCanvas');

        const timer3Btn = document.getElementById('timer3Btn');
        const timer5Btn = document.getElementById('timer5Btn');
        const torchStatusText = document.getElementById('torchStatusText');

        let selectedTimerSeconds = 3;
        let capturedShots = [null, null, null, null]; // 4 Foto
        let isSessionRunning = false;
        let currentFacingMode = 'user';
        let currentMediaStream = null;
        let torchActivePreference = true;

        // --- Palet Tema Warna Frame Laut ---
        let selectedFrameColor = 'pink';
        const frameThemes = {
            pink: {
                bgGrad: ['#FFE6EE', '#FFD1DC', '#FFB6C1'],
                waveBack: '#FFA3BA',
                waveFront: '#FF7597',
                coral1: '#FF5470',
                coral2: '#FFA07A',
                seaweed: '#2E8B57',
                badgeBg: '#FF3366',
                badgeText: '#FFFFFF',
                subText: '#8C2B42',
                emptyBg: '#FFF5F8',
                emptyBorder: '#FFCCD8',
                emptyText: '#E65C84'
            },
            blue: {
                bgGrad: ['#E0F2FE', '#BAE6FD', '#7DD3FC'],
                waveBack: '#38BDF8',
                waveFront: '#0284C7',
                coral1: '#F43F5E',
                coral2: '#FB923C',
                seaweed: '#059669',
                badgeBg: '#0369A1',
                badgeText: '#FFFFFF',
                subText: '#035388',
                emptyBg: '#F0F9FF',
                emptyBorder: '#BAE6FD',
                emptyText: '#0284C7'
            },
            yellow: {
                bgGrad: ['#FEFCE8', '#FEF08A', '#FDE047'],
                waveBack: '#FACC15',
                waveFront: '#CA8A04',
                coral1: '#EA580C',
                coral2: '#E11D48',
                seaweed: '#16A34A',
                badgeBg: '#A16207',
                badgeText: '#FFFFFF',
                subText: '#713F12',
                emptyBg: '#FFFFF7',
                emptyBorder: '#FEF08A',
                emptyText: '#CA8A04'
            },
            purple: {
                bgGrad: ['#F3E8FF', '#E9D5FF', '#D8B4FE'],
                waveBack: '#C084FC',
                waveFront: '#9333EA',
                coral1: '#F43F5E',
                coral2: '#FB7185',
                seaweed: '#0D9488',
                badgeBg: '#7E22CE',
                badgeText: '#FFFFFF',
                subText: '#581C87',
                emptyBg: '#FCF9FF',
                emptyBorder: '#E9D5FF',
                emptyText: '#9333EA'
            }
        };

        const activeClasses = {
            pink: 'w-5 h-5 rounded-full bg-[#FFB6C1] border-2 border-rose-400 ring-2 ring-rose-300 scale-110 transition-all shadow-sm cursor-pointer',
            blue: 'w-5 h-5 rounded-full bg-[#7DD3FC] border-2 border-sky-400 ring-2 ring-sky-300 scale-110 transition-all shadow-sm cursor-pointer',
            yellow: 'w-5 h-5 rounded-full bg-[#FDE047] border-2 border-amber-400 ring-2 ring-amber-300 scale-110 transition-all shadow-sm cursor-pointer',
            purple: 'w-5 h-5 rounded-full bg-[#D8B4FE] border-2 border-purple-400 ring-2 ring-purple-300 scale-110 transition-all shadow-sm cursor-pointer'
        };
        const inactiveClasses = {
            pink: 'w-5 h-5 rounded-full bg-[#FFB6C1] border-2 border-transparent hover:scale-105 transition-all shadow-sm cursor-pointer opacity-70 hover:opacity-100',
            blue: 'w-5 h-5 rounded-full bg-[#7DD3FC] border-2 border-transparent hover:scale-105 transition-all shadow-sm cursor-pointer opacity-70 hover:opacity-100',
            yellow: 'w-5 h-5 rounded-full bg-[#FDE047] border-2 border-transparent hover:scale-105 transition-all shadow-sm cursor-pointer opacity-70 hover:opacity-100',
            purple: 'w-5 h-5 rounded-full bg-[#D8B4FE] border-2 border-transparent hover:scale-105 transition-all shadow-sm cursor-pointer opacity-70 hover:opacity-100'
        };

        function selectFrameColor(colorKey) {
            if (!frameThemes[colorKey]) return;
            selectedFrameColor = colorKey;

            ['pink', 'blue', 'yellow', 'purple'].forEach(c => {
                const btn = document.getElementById(`colorBtn-${c}`);
                if (btn) {
                    btn.className = (c === colorKey) ? activeClasses[c] : inactiveClasses[c];
                }
            });

            renderPhotostripLive();
        }

        function setTimer(sec) {
            if (isSessionRunning) return;
            selectedTimerSeconds = sec;
            if (sec === 3) {
                timer3Btn.className = "px-2.5 py-0.5 rounded-lg text-xs font-bold bg-[#FFAAA6] text-white border border-[#FFAAA6] transition-all";
                timer5Btn.className = "px-2.5 py-0.5 rounded-lg text-xs font-bold bg-pink-50 text-[#8C3A49] border border-pink-200 hover:bg-pink-100 transition-all";
            } else {
                timer5Btn.className = "px-2.5 py-0.5 rounded-lg text-xs font-bold bg-[#FFAAA6] text-white border border-[#FFAAA6] transition-all";
                timer3Btn.className = "px-2.5 py-0.5 rounded-lg text-xs font-bold bg-pink-50 text-[#8C3A49] border border-pink-200 hover:bg-pink-100 transition-all";
            }
        }

        function toggleTorchPreference() {
            torchActivePreference = !torchActivePreference;
            torchStatusText.innerText = torchActivePreference ? "Auto" : "Off";
        }

        // Web Audio Synth
        const audioCtx = new (window.AudioContext || window.webkitAudioContext)();

        function playBeepSound() {
            try {
                if (audioCtx.state === 'suspended') audioCtx.resume();
                const osc = audioCtx.createOscillator();
                const gain = audioCtx.createGain();
                osc.type = 'sine';
                osc.frequency.setValueAtTime(600, audioCtx.currentTime);
                gain.gain.setValueAtTime(0.15, audioCtx.currentTime);
                gain.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 0.1);
                osc.connect(gain);
                gain.connect(audioCtx.destination);
                osc.start();
                osc.stop(audioCtx.currentTime + 0.1);
            } catch (e) { }
        }

        function playShutterSound() {
            try {
                if (audioCtx.state === 'suspended') audioCtx.resume();
                const osc = audioCtx.createOscillator();
                const gain = audioCtx.createGain();
                osc.type = 'triangle';
                osc.frequency.setValueAtTime(900, audioCtx.currentTime);
                osc.frequency.exponentialRampToValueAtTime(100, audioCtx.currentTime + 0.09);
                gain.gain.setValueAtTime(0.35, audioCtx.currentTime);
                gain.gain.exponentialRampToValueAtTime(0.01, audioCtx.currentTime + 0.09);
                osc.connect(gain);
                gain.connect(audioCtx.destination);
                osc.start();
                osc.stop(audioCtx.currentTime + 0.09);
            } catch (e) { }
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
                    }, 400);
                }
            } catch (err) { }
        }

        function resizeCanvas() {
            if (canvas.parentElement) {
                canvas.width = canvas.parentElement.clientWidth || 440;
                canvas.height = canvas.parentElement.clientHeight || 440;
            }
        }
        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        class GloFishTetra {
            constructor() { this.reset(true); }

            reset(initial = false) {
                const cw = canvas.width || 440;
                const ch = canvas.height || 440;
                this.x = initial ? Math.random() * cw : (Math.random() > 0.5 ? -130 : cw + 130);
                this.y = Math.random() * (ch - 90) + 45;
                this.speed = Math.random() * 0.8 + 0.5;
                this.direction = this.x < cw / 2 ? 1 : -1;

                const palettes = [
                    { main: '#FF2E7E', light: '#FFA3D0', belly: '#FF6EA7', glow: 'rgba(255, 46, 126, 0.45)' },
                    { main: '#39FF14', light: '#D4FFB2', belly: '#7BFF5B', glow: 'rgba(57, 255, 20, 0.45)' },
                    { main: '#FFE600', light: '#FFFFB8', belly: '#FFF066', glow: 'rgba(255, 230, 0, 0.45)' },
                    { main: '#FF6B00', light: '#FFD1A4', belly: '#FFA04D', glow: 'rgba(255, 107, 0, 0.45)' },
                    { main: '#00E5FF', light: '#B8FAFF', belly: '#66EFFF', glow: 'rgba(0, 229, 255, 0.45)' },
                    { main: '#FFFFFF', light: '#FFFFFF', belly: '#DDE8F0', glow: 'rgba(220, 240, 255, 0.35)' }
                ];
                this.palette = palettes[Math.floor(Math.random() * palettes.length)];

                const depthRoll = Math.random();
                if (depthRoll < 0.50) {
                    this.scale = Math.random() * 0.2 + 0.55;
                    this.alpha = 0.90;
                } else if (depthRoll < 0.75) {
                    this.scale = Math.random() * 0.12 + 0.40;
                    this.alpha = 0.80;
                } else {
                    this.scale = Math.random() * 0.35 + 0.85;
                    this.alpha = 0.95;
                }

                this.tailAngle = Math.random() * Math.PI;
                this.tailSpeed = Math.random() * 0.1 + 0.08;
            }

            update() {
                const cw = canvas.width || 440;
                this.x += this.speed * this.direction;
                this.tailAngle += this.tailSpeed;
                this.y += Math.sin(this.tailAngle * 0.5) * 0.25;

                if (this.direction === 1 && this.x > cw + 140) this.reset();
                else if (this.direction === -1 && this.x < -140) this.reset();
            }

            draw(targetCtx = ctx) {
                targetCtx.save();
                targetCtx.translate(this.x, this.y);
                targetCtx.scale(this.direction * this.scale, this.scale);
                targetCtx.globalAlpha = this.alpha;

                const p = this.palette;

                targetCtx.shadowColor = p.glow;
                targetCtx.shadowBlur = 12;

                // 1. Ekor
                targetCtx.save();
                targetCtx.translate(-24, 0);
                targetCtx.rotate(Math.sin(this.tailAngle) * 0.25);
                targetCtx.beginPath();
                targetCtx.moveTo(0, 0);
                targetCtx.lineTo(-18, -14);
                targetCtx.quadraticCurveTo(-12, 0, -18, 14);
                targetCtx.closePath();
                const tailGrad = targetCtx.createLinearGradient(-18, 0, 0, 0);
                tailGrad.addColorStop(0, 'rgba(255,255,255,0.2)');
                tailGrad.addColorStop(1, p.main);
                targetCtx.fillStyle = tailGrad;
                targetCtx.fill();
                targetCtx.restore();

                // 2. Sirip Bawah
                targetCtx.beginPath();
                targetCtx.moveTo(-6, 12);
                targetCtx.quadraticCurveTo(-14, 22, -22, 16);
                targetCtx.lineTo(-20, 2);
                targetCtx.fillStyle = p.belly;
                targetCtx.globalAlpha = this.alpha * 0.7;
                targetCtx.fill();
                targetCtx.globalAlpha = this.alpha;

                // 3. Sirip Punggung
                targetCtx.beginPath();
                targetCtx.moveTo(-2, -11);
                targetCtx.quadraticCurveTo(2, -22, 8, -20);
                targetCtx.lineTo(6, -11);
                targetCtx.fillStyle = p.light;
                targetCtx.fill();

                // 4. Badan
                targetCtx.beginPath();
                targetCtx.moveTo(22, 0);
                targetCtx.bezierCurveTo(18, -14, 2, -18, -10, -10);
                targetCtx.bezierCurveTo(-18, -5, -22, -2, -24, 0);
                targetCtx.bezierCurveTo(-20, 4, -14, 16, 0, 16);
                targetCtx.bezierCurveTo(14, 14, 20, 8, 22, 0);
                targetCtx.closePath();

                const bodyGrad = targetCtx.createRadialGradient(2, -2, 2, 0, 0, 20);
                bodyGrad.addColorStop(0, p.light);
                bodyGrad.addColorStop(0.45, p.main);
                bodyGrad.addColorStop(0.85, p.belly);
                bodyGrad.addColorStop(1, 'rgba(0,0,0,0.1)');
                targetCtx.fillStyle = bodyGrad;
                targetCtx.fill();

                // 5. Sirip Dada
                targetCtx.beginPath();
                targetCtx.ellipse(4, 3, 5, 2.5, Math.PI / 4, 0, Math.PI * 2);
                targetCtx.fillStyle = 'rgba(255, 255, 255, 0.5)';
                targetCtx.fill();

                // 6. Mata
                targetCtx.beginPath();
                targetCtx.arc(14, -2, 3.5, 0, Math.PI * 2);
                targetCtx.fillStyle = '#FFFFFF';
                targetCtx.fill();

                targetCtx.beginPath();
                targetCtx.arc(14.5, -2, 2, 0, Math.PI * 2);
                targetCtx.fillStyle = '#111111';
                targetCtx.fill();

                // Refleksi Pupil
                targetCtx.beginPath();
                targetCtx.arc(14, -2.8, 0.8, 0, Math.PI * 2);
                targetCtx.fillStyle = '#FFFFFF';
                targetCtx.fill();

                targetCtx.restore();
            }
        }

        class Bubble {
            constructor() { this.reset(); }
            reset() {
                const cw = canvas.width || 440;
                const ch = canvas.height || 440;
                this.x = Math.random() * cw;
                this.y = ch + 15;
                this.speed = Math.random() * 1.1 + 0.6;
                this.radius = Math.random() * 2.5 + 1;
                this.alpha = Math.random() * 0.5 + 0.2;
            }
            update() {
                this.y -= this.speed;
                this.x += Math.sin(this.y * 0.04) * 0.35;
                if (this.y < -15) this.reset();
            }
            draw(targetCtx = ctx) {
                targetCtx.save();
                targetCtx.beginPath();
                targetCtx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                targetCtx.strokeStyle = `rgba(255, 255, 255, ${this.alpha})`;
                targetCtx.lineWidth = 1;
                targetCtx.stroke();
                targetCtx.restore();
            }
        }

        const fishes = Array.from({ length: 20 }, () => new GloFishTetra());
        const bubbles = Array.from({ length: 18 }, () => new Bubble());

        function animate() {
            if (canvas.width > 0 && canvas.height > 0) {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                bubbles.forEach(b => { b.update(); b.draw(); });
                fishes.forEach(f => { f.update(); f.draw(); });
            }
            requestAnimationFrame(animate);
        }
        animate();

        // --- Photo Workflow ---
        async function startPhotoSession() {
            if (isSessionRunning) return;
            isSessionRunning = true;
            capturedShots = [null, null, null, null];

            startBtn.disabled = true;
            startBtn.classList.add('opacity-50', 'cursor-not-allowed');
            downloadBtn.disabled = true;
            downloadBtn.classList.add('opacity-50', 'cursor-not-allowed');

            stripStatusBadge.className = "text-[10px] text-pink-600 bg-pink-100 px-2.5 py-0.5 rounded-full font-bold";
            stripStatusBadge.innerText = "Memotret...";

            countdownBox.classList.remove('hidden');

            for (let i = 0; i < 4; i++) {
                poseIndicator.innerText = `Pose ${i + 1} / 4`;
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

            stripStatusBadge.className = "text-[10px] text-amber-700 bg-amber-100 px-2.5 py-0.5 rounded-full font-bold";
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

        // --- Capture Pose dengan Filter Mulus & Cerah ---
        function capturePoseIndex(index) {
            const size = Math.min(canvas.width, canvas.height) || 440;

            const photoCanvas = document.createElement('canvas');
            photoCanvas.width = size;
            photoCanvas.height = size;
            const pCtx = photoCanvas.getContext('2d');

            if (video.videoWidth > 0) {
                const vMin = Math.min(video.videoWidth, video.videoHeight);
                const sx = (video.videoWidth - vMin) / 2;
                const sy = (video.videoHeight - vMin) / 2;

                pCtx.save();
                
                // Terapkan Filter Beauty: Lebih cerah, saturasi segar, dan kulit halus
                pCtx.filter = 'brightness(1.12) contrast(1.03) saturate(1.12) blur(0.25px)';

                if (currentFacingMode === 'user') {
                    pCtx.translate(size, 0);
                    pCtx.scale(-1, 1);
                }
                pCtx.drawImage(video, sx, sy, vMin, vMin, 0, 0, size, size);
                pCtx.restore();

                // Layer Soft Light Peach Warm Glow untuk tone wajah glowing alami
                pCtx.save();
                pCtx.globalCompositeOperation = 'soft-light';
                pCtx.fillStyle = 'rgba(255, 230, 220, 0.35)';
                pCtx.fillRect(0, 0, size, size);
                pCtx.restore();

            } else {
                pCtx.fillStyle = '#1e1b1b';
                pCtx.fillRect(0, 0, size, size);
            }

            // Tempelkan gambar animasi ikan & gelembung di atas foto kamera
            pCtx.drawImage(canvas, 0, 0, size, size);

            capturedShots[index] = photoCanvas;

            document.getElementById(`retakeBtn${index}`).disabled = false;
            document.getElementById(`dlSingleBtn${index}`).disabled = false;
            renderPhotostripLive();
        }

        function checkSessionCompletion() {
            const isAllCaptured = capturedShots.every(shot => shot !== null);
            if (isAllCaptured) {
                stripStatusBadge.className = "text-[10px] text-emerald-700 bg-emerald-100 px-2.5 py-0.5 rounded-full font-bold";
                stripStatusBadge.innerText = "Lengkap ✅";

                downloadBtn.disabled = false;
                downloadBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        }

        // --- Helper Ornamen Seni Ombak, Terumbu Karang Besar, & Ikan ---
        
        // 1. Gelombang Ombak
        function drawOceanWaves(ctx, width, height, theme) {
            ctx.save();

            // Layer Ombak Belakang (Atas)
            ctx.fillStyle = theme.waveBack;
            ctx.beginPath();
            ctx.moveTo(0, 0);
            ctx.lineTo(width, 0);
            ctx.lineTo(width, 52);
            ctx.bezierCurveTo(width * 0.75, 76, width * 0.6, 28, width * 0.4, 56);
            ctx.bezierCurveTo(width * 0.25, 76, width * 0.1, 32, 0, 62);
            ctx.closePath();
            ctx.fill();

            // Layer Ombak Depan (Atas)
            ctx.fillStyle = theme.waveFront;
            ctx.beginPath();
            ctx.moveTo(0, 0);
            ctx.lineTo(width, 0);
            ctx.lineTo(width, 36);
            ctx.bezierCurveTo(width * 0.8, 18, width * 0.65, 56, width * 0.5, 32);
            ctx.bezierCurveTo(width * 0.35, 12, width * 0.15, 46, 0, 32);
            ctx.closePath();
            ctx.fill();

            // Busa Ombak Putih
            ctx.strokeStyle = 'rgba(255, 255, 255, 0.8)';
            ctx.lineWidth = 2.5;
            ctx.stroke();

            // Layer Ombak Bawah (Dasar Laut)
            ctx.fillStyle = theme.waveBack;
            ctx.beginPath();
            ctx.moveTo(0, height);
            ctx.lineTo(width, height);
            ctx.lineTo(width, height - 72);
            ctx.bezierCurveTo(width * 0.75, height - 95, width * 0.55, height - 50, width * 0.35, height - 90);
            ctx.bezierCurveTo(width * 0.2, height - 110, width * 0.1, height - 60, 0, height - 85);
            ctx.closePath();
            ctx.fill();

            ctx.restore();
        }

        // 2. Terumbu Karang Staghorn
        function drawBranchCoral(ctx, x, y, scale, color) {
            ctx.save();
            ctx.translate(x, y);
            ctx.scale(scale, scale);
            ctx.fillStyle = color;
            ctx.shadowColor = 'rgba(0,0,0,0.12)';
            ctx.shadowBlur = 6;
            ctx.lineCap = 'round';
            ctx.lineJoin = 'round';

            ctx.beginPath();
            ctx.moveTo(0, 0);
            ctx.lineTo(-8, -32);
            ctx.quadraticCurveTo(-18, -52, -28, -58);
            ctx.quadraticCurveTo(-22, -64, -15, -52);
            ctx.lineTo(-5, -36);
            ctx.lineTo(-3, -65);
            ctx.quadraticCurveTo(0, -80, 7, -78);
            ctx.quadraticCurveTo(10, -68, 5, -58);
            ctx.lineTo(4, -32);
            ctx.lineTo(16, -46);
            ctx.quadraticCurveTo(28, -58, 32, -50);
            ctx.quadraticCurveTo(28, -40, 16, -28);
            ctx.lineTo(8, 0);
            ctx.closePath();
            ctx.fill();

            // Tekstur bintik karang
            ctx.shadowColor = 'transparent';
            ctx.fillStyle = 'rgba(255, 255, 255, 0.45)';
            ctx.beginPath();
            ctx.arc(-2, -52, 2.5, 0, Math.PI * 2);
            ctx.arc(-18, -48, 2, 0, Math.PI * 2);
            ctx.arc(18, -38, 2.2, 0, Math.PI * 2);
            ctx.arc(1, -22, 2, 0, Math.PI * 2);
            ctx.fill();

            ctx.restore();
        }

        // 3. Rumput Laut
        function drawSeaweed(ctx, x, y, height, color) {
            ctx.save();
            ctx.translate(x, y);
            ctx.strokeStyle = color;
            ctx.lineWidth = 6;
            ctx.lineCap = 'round';

            ctx.beginPath();
            ctx.moveTo(0, 0);
            ctx.bezierCurveTo(-18, -height * 0.3, 18, -height * 0.6, -8, -height);
            ctx.stroke();

            ctx.beginPath();
            ctx.moveTo(12, 0);
            ctx.bezierCurveTo(26, -height * 0.25, -6, -height * 0.55, 12, -height * 0.85);
            ctx.stroke();
            ctx.restore();
        }

        // 4. Karang Anemon
        function drawAnemone(ctx, x, y, r, color) {
            ctx.save();
            ctx.translate(x, y);
            ctx.fillStyle = color;
            ctx.shadowColor = 'rgba(0,0,0,0.1)';
            ctx.shadowBlur = 5;
            for (let i = 0; i < 9; i++) {
                const angle = (i / 9) * Math.PI + Math.PI;
                ctx.beginPath();
                ctx.ellipse(Math.cos(angle) * r, Math.sin(angle) * r, 7, 20, angle - Math.PI / 2, 0, Math.PI * 2);
                ctx.fill();
            }
            ctx.beginPath();
            ctx.arc(0, 0, r * 0.75, Math.PI, 0);
            ctx.fill();
            ctx.restore();
        }

        // 5. Ikan Hias Frame
        function drawMiniFrameFish(ctx, x, y, dir, scale, mainColor, accentColor) {
            ctx.save();
            ctx.translate(x, y);
            ctx.scale(dir * scale, scale);

            // Ekor
            ctx.fillStyle = accentColor;
            ctx.beginPath();
            ctx.moveTo(-10, 0);
            ctx.lineTo(-20, -9);
            ctx.quadraticCurveTo(-15, 0, -20, 9);
            ctx.closePath();
            ctx.fill();

            // Badan
            ctx.fillStyle = mainColor;
            ctx.beginPath();
            ctx.ellipse(0, 0, 12, 8, 0, 0, Math.PI * 2);
            ctx.fill();

            // Sirip Atas
            ctx.fillStyle = accentColor;
            ctx.beginPath();
            ctx.moveTo(-3, -7);
            ctx.lineTo(2, -13);
            ctx.lineTo(5, -7);
            ctx.fill();

            // Mata
            ctx.fillStyle = '#FFFFFF';
            ctx.beginPath();
            ctx.arc(6, -2, 2.5, 0, Math.PI * 2);
            ctx.fill();
            ctx.fillStyle = '#000000';
            ctx.beginPath();
            ctx.arc(7, -2, 1.2, 0, Math.PI * 2);
            ctx.fill();

            // Gelembung kecil
            ctx.strokeStyle = 'rgba(255,255,255,0.7)';
            ctx.lineWidth = 1;
            ctx.beginPath();
            ctx.arc(16, -6, 2, 0, Math.PI * 2);
            ctx.stroke();

            ctx.restore();
        }

        // 6. Bintang Laut
        function drawStarfish(ctx, x, y, r, color) {
            ctx.save();
            ctx.translate(x, y);
            ctx.fillStyle = color;
            ctx.beginPath();
            for (let i = 0; i < 5; i++) {
                ctx.lineTo(Math.cos((18 + i * 72) * Math.PI / 180) * r, -Math.sin((18 + i * 72) * Math.PI / 180) * r);
                ctx.lineTo(Math.cos((54 + i * 72) * Math.PI / 180) * (r * 0.45), -Math.sin((54 + i * 72) * Math.PI / 180) * (r * 0.45));
            }
            ctx.closePath();
            ctx.fill();

            ctx.fillStyle = 'rgba(255, 255, 255, 0.45)';
            ctx.beginPath();
            ctx.arc(0, 0, r * 0.25, 0, Math.PI * 2);
            ctx.fill();
            ctx.restore();
        }

        // --- Render Canvas Photostrip 2x2 Grid Ocean Edition ---
        function renderPhotostripLive() {
            const theme = frameThemes[selectedFrameColor] || frameThemes.pink;
            const gridW = 680;
            const gridH = 800;
            stripCanvas.width = gridW;
            stripCanvas.height = gridH;
            const sCtx = stripCanvas.getContext('2d');

            // 1. Latar Belakang Gradasi Laut
            const bgGrad = sCtx.createLinearGradient(0, 0, gridW, gridH);
            bgGrad.addColorStop(0, theme.bgGrad[0]);
            bgGrad.addColorStop(0.5, theme.bgGrad[1]);
            bgGrad.addColorStop(1, theme.bgGrad[2]);
            sCtx.fillStyle = bgGrad;
            sCtx.fillRect(0, 0, gridW, gridH);

            // 2. Gambar Hiasan Ombak Laut Atas & Bawah
            drawOceanWaves(sCtx, gridW, gridH, theme);

            // 3. Posisi Grid 2 Kolom x 2 Baris
            const photoSize = 275;
            const gapX = 26;
            const gapY = 22;
            const startX = (gridW - (photoSize * 2 + gapX)) / 2;
            const startY = 70;
            const radius = 22;

            const gridPositions = [
                { x: startX, y: startY },
                { x: startX + photoSize + gapX, y: startY },
                { x: startX, y: startY + photoSize + gapY },
                { x: startX + photoSize + gapX, y: startY + photoSize + gapY }
            ];

            for (let i = 0; i < 4; i++) {
                const pos = gridPositions[i];
                const shot = capturedShots[i];

                // Bayangan Polaroid Frame Putih
                sCtx.save();
                sCtx.shadowColor = 'rgba(0, 0, 0, 0.14)';
                sCtx.shadowBlur = 12;
                sCtx.shadowOffsetY = 5;
                sCtx.fillStyle = '#ffffff';
                sCtx.beginPath();
                sCtx.roundRect(pos.x - 6, pos.y - 6, photoSize + 12, photoSize + 12, radius + 4);
                sCtx.fill();
                sCtx.restore();

                // Clipping Foto
                sCtx.save();
                sCtx.beginPath();
                sCtx.roundRect(pos.x, pos.y, photoSize, photoSize, radius);
                sCtx.clip();

                if (shot) {
                    sCtx.drawImage(shot, pos.x, pos.y, photoSize, photoSize);
                } else {
                    sCtx.fillStyle = theme.emptyBg;
                    sCtx.fillRect(pos.x, pos.y, photoSize, photoSize);

                    sCtx.strokeStyle = theme.emptyBorder;
                    sCtx.lineWidth = 1.5;
                    sCtx.strokeRect(pos.x, pos.y, photoSize, photoSize);

                    sCtx.fillStyle = theme.emptyText;
                    sCtx.font = 'bold 14px "Quicksand", sans-serif';
                    sCtx.textAlign = 'center';
                    sCtx.textBaseline = 'middle';
                    sCtx.fillText(`Pose ${i + 1}`, pos.x + photoSize / 2, pos.y + photoSize / 2 - 8);

                    sCtx.font = '500 11px "Plus Jakarta Sans", sans-serif';
                    sCtx.fillText(`(Kosong)`, pos.x + photoSize / 2, pos.y + photoSize / 2 + 10);
                }
                sCtx.restore();

                // Border halus dalam foto
                sCtx.save();
                sCtx.strokeStyle = 'rgba(255, 255, 255, 0.75)';
                sCtx.lineWidth = 2;
                sCtx.beginPath();
                sCtx.roundRect(pos.x, pos.y, photoSize, photoSize, radius);
                sCtx.stroke();
                sCtx.restore();
            }

            // 4. Dekorasi Terumbu Karang & Rumput Laut
            // Kiri Bawah
            drawSeaweed(sCtx, 28, gridH - 5, 110, theme.seaweed);
            drawBranchCoral(sCtx, 55, gridH - 8, 1.45, theme.coral1);
            drawAnemone(sCtx, 105, gridH - 12, 22, theme.coral2);
            drawStarfish(sCtx, 36, gridH - 25, 16, '#FFA07A');

            // Kanan Bawah
            drawSeaweed(sCtx, gridW - 40, gridH - 5, 115, theme.seaweed);
            drawBranchCoral(sCtx, gridW - 70, gridH - 8, 1.5, theme.coral1);
            drawAnemone(sCtx, gridW - 120, gridH - 12, 24, theme.coral2);
            drawStarfish(sCtx, gridW - 42, gridH - 26, 17, '#FBBF24');

            // Karang Samping Tulisan
            drawBranchCoral(sCtx, gridW / 2 - 165, gridH - 5, 1.05, theme.coral2);
            drawBranchCoral(sCtx, gridW / 2 + 165, gridH - 5, 1.1, theme.coral1);

            // 5. Ikan-Ikan Hias Berenang di Sekitar Frame
            drawMiniFrameFish(sCtx, 32, 115, 1, 1.2, '#FF6B00', '#FFE600');
            drawMiniFrameFish(sCtx, gridW - 35, 135, -1, 1.3, '#00E5FF', '#39FF14');
            drawMiniFrameFish(sCtx, 35, startY + photoSize + gapY / 2, 1, 1.1, '#FF2E7E', '#FFFFFF');
            drawMiniFrameFish(sCtx, gridW - 35, startY + photoSize + gapY / 2, -1, 1.15, '#FFE600', '#FF6B00');
            drawMiniFrameFish(sCtx, gridW / 2, startY + photoSize + gapY / 2, 1, 1.25, '#39FF14', '#00E5FF');

            // 6. Gelembung Air Frame
            const drawFrameBubble = (bx, by, br) => {
                sCtx.save();
                sCtx.strokeStyle = 'rgba(255, 255, 255, 0.85)';
                sCtx.fillStyle = 'rgba(255, 255, 255, 0.35)';
                sCtx.lineWidth = 1.2;
                sCtx.beginPath();
                sCtx.arc(bx, by, br, 0, Math.PI * 2);
                sCtx.fill();
                sCtx.stroke();
                sCtx.fillStyle = '#FFFFFF';
                sCtx.beginPath();
                sCtx.arc(bx - br * 0.35, by - br * 0.35, br * 0.25, 0, Math.PI * 2);
                sCtx.fill();
                sCtx.restore();
            };

            drawFrameBubble(52, 75, 7);
            drawFrameBubble(44, 55, 4.5);
            drawFrameBubble(gridW - 52, 80, 8);
            drawFrameBubble(gridW - 60, 60, 5);
            drawFrameBubble(gridW / 2 - 20, startY + photoSize + gapY / 2 - 16, 6);
            drawFrameBubble(gridW / 2 + 20, startY + photoSize + gapY / 2 - 14, 7.5);

            // 7. Tulisan Tengah Bawah: Mawsnapbooth Studio
            const today = new Date();
            const dateStr = today.toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' });

            sCtx.save();
            sCtx.shadowColor = 'rgba(255, 255, 255, 0.8)';
            sCtx.shadowBlur = 6;
            sCtx.fillStyle = theme.subText;
            sCtx.font = '800 18px "Quicksand", sans-serif';
            sCtx.textAlign = 'center';
            sCtx.textBaseline = 'middle';
            sCtx.fillText('🫧 Mawsnapbooth Studio 🫧', gridW / 2, gridH - 58);

            sCtx.font = '600 11px "Plus Jakarta Sans", sans-serif';
            sCtx.fillStyle = 'rgba(0, 0, 0, 0.55)';
            sCtx.fillText(`• ${dateStr} •`, gridW / 2, gridH - 36);
            sCtx.restore();
        }

        // Fungsi Download Single Photo
        function downloadSinglePhotoWithFish(index) {
            const shotCanvas = capturedShots[index];
            if (!shotCanvas) return;

            const link = document.createElement('a');
            link.download = `aquarium-photo-pose-${index + 1}-${Date.now()}.png`;
            link.href = shotCanvas.toDataURL('image/png');
            link.click();
        }

        // Fungsi Download Grid 2x2
        function downloadStrip() {
            if (!capturedShots.every(s => s !== null)) return;
            const link = document.createElement('a');
            link.download = `photobooth-2x2-coral-waves-${selectedFrameColor}-${Date.now()}.png`;
            link.href = stripCanvas.toDataURL('image/png');
            link.click();
        }

        function resetBooth() {
            capturedShots = [null, null, null, null];
            for (let i = 0; i < 4; i++) {
                document.getElementById(`retakeBtn${i}`).disabled = true;
                document.getElementById(`dlSingleBtn${i}`).disabled = true;
            }
            renderPhotostripLive();
            stripStatusBadge.className = "text-[10px] text-amber-600 bg-amber-50 px-2.5 py-0.5 rounded-full font-bold";
            stripStatusBadge.innerText = "Menunggu";
            downloadBtn.disabled = true;
            downloadBtn.classList.add('opacity-50', 'cursor-not-allowed');
        }

        startBtn.addEventListener('click', startPhotoSession);
        downloadBtn.addEventListener('click', downloadStrip);

        // Inisialisasi awal render canvas
        renderPhotostripLive();
    </script>
</body>

</html>