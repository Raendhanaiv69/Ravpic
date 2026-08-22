<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photobooth Aquarium 1:1 Square</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Quicksand:wght@600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #FFF8EE 0%, #FFF0F3 50%, #FFEBF2 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .font-brand { font-family: 'Quicksand', sans-serif; }

        /* Container Kamera Normal Laptop */
        .camera-card-desktop {
            width: 500px;
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
            width: 460px;
            height: 460px;
            max-width: 100%;
            aspect-ratio: 1 / 1;
            border-radius: 22px;
            overflow: hidden;
            background-color: #1e1b1b;
        }

        .camera-viewport-square video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scaleX(-1);
            display: block;
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

        /* Container Hasil Normal Laptop */
        .result-card-desktop {
            width: 320px;
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
            height: 460px;
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
                <a href="{{ route('templates.index') }}" class="w-8 h-8 rounded-xl bg-white border border-pink-200 flex items-center justify-center text-xs hover:bg-pink-50 transition text-[#8C3A49] font-bold">
                    ←
                </a>
                <span class="font-bold font-brand text-sm text-[#8C3A49]">Photobooth Studio</span>
            </div>

            <div class="flex items-center gap-2">
                <!-- Tombol Flip Kamera -->
                <button type="button" onclick="switchCameraFacing()" id="flipCamBtn" class="md:hidden px-2.5 py-1 rounded-lg text-xs font-bold bg-pink-50 text-[#8C3A49] border border-pink-200 hover:bg-pink-100 flex items-center gap-1">
                    <span>📷</span> Flip
                </button>
                <span id="sessionStatus" class="px-2.5 py-0.5 text-[10px] font-bold rounded-full bg-pink-50 text-[#C25E71] border border-pink-200/60">
                    ⏹️ Square 1:1 Strip
                </span>
            </div>
        </div>
    </nav>

    <!-- Main Workspace -->
    <main class="flex-1 max-w-6xl mx-auto w-full px-4 py-6 flex flex-col md:flex-row items-center md:items-start justify-center gap-6">

        <!-- KIRI: Live Camera Viewport -->
        <div class="camera-card-desktop">
            
            <div class="w-full flex justify-between items-center mb-3 px-1">
                <div class="flex items-center gap-1.5">
                    <span class="text-xs font-bold text-[#8C3A49]">⏱️ Timer:</span>
                    <button type="button" onclick="setTimer(3)" id="timer3Btn" class="px-2.5 py-0.5 rounded-lg text-xs font-bold bg-[#FFAAA6] text-white border border-[#FFAAA6] transition-all">
                        3s
                    </button>
                    <button type="button" onclick="setTimer(5)" id="timer5Btn" class="px-2.5 py-0.5 rounded-lg text-xs font-bold bg-pink-50 text-[#8C3A49] border border-pink-200 hover:bg-pink-100 transition-all">
                        5s
                    </button>
                </div>

                <div class="flex items-center gap-1.5">
                    <button type="button" onclick="toggleTorchPreference()" id="torchPrefBtn" class="px-2 py-0.5 rounded-lg text-[11px] font-bold bg-pink-50 text-[#8C3A49] border border-pink-200">
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
                <div id="countdownBox" class="absolute inset-0 z-40 flex flex-col items-center justify-center pointer-events-none hidden bg-black/35 backdrop-blur-[2px]">
                    <div class="w-20 h-20 rounded-full bg-white/20 border-2 border-white/70 flex items-center justify-center shadow-xl backdrop-blur-sm animate-pulse">
                        <span id="countdownNumber" class="text-4xl font-extrabold text-white font-brand count-animate drop-shadow-md">3</span>
                    </div>
                    <span id="poseIndicator" class="mt-3 text-xs font-bold text-white uppercase tracking-widest bg-gradient-to-r from-rose-500 to-pink-500 px-3.5 py-1 rounded-full shadow-md">
                        Pose 1 / 3
                    </span>
                </div>

                <!-- Watermark -->
                <div class="absolute bottom-2.5 left-0 right-0 z-20 flex justify-center pointer-events-none">
                    <span class="text-white/95 text-[9px] font-brand tracking-widest uppercase bg-black/35 backdrop-blur-sm px-3 py-0.5 rounded-full">
                        🫧 AQUARIUM BOOTH • SQUARE 🫧
                    </span>
                </div>
            </div>

            <!-- Tombol Aksi Kamera -->
            <div class="w-full flex items-center gap-2 mt-4">
                <button id="startSessionBtn" type="button" class="flex-1 py-3 rounded-2xl bg-gradient-to-r from-[#FFAAA6] via-[#FF8E9E] to-[#EA7C8F] text-white font-bold text-xs md:text-sm shadow-md shadow-rose-300/40 hover:opacity-95 active:scale-98 transition-all flex items-center justify-center gap-2 cursor-pointer">
                    <span class="text-base">📸</span> Mulai Foto (3 Kali)
                </button>
                <button type="button" onclick="startCamera()" title="Refresh Kamera" class="w-12 h-11 rounded-2xl bg-pink-50 text-[#8C3A49] border border-pink-200 flex items-center justify-center text-sm hover:bg-pink-100 transition-all cursor-pointer">
                    ⟳
                </button>
            </div>
        </div>

        <!-- KANAN: Hasil Photostrip Normal di Laptop -->
        <div class="result-card-desktop">
            <div class="w-full flex justify-between items-center mb-2 px-1">
                <span class="text-xs font-bold text-[#8C3A49]">✨ Hasil Photostrip</span>
                <span id="stripStatusBadge" class="text-[10px] text-amber-600 bg-amber-50 px-2.5 py-0.5 rounded-full font-bold">Menunggu</span>
            </div>

            <!-- Pilihan Warna Frame Pastel -->
            <div class="w-full flex items-center justify-between mb-2 px-2 py-1 bg-pink-50/60 rounded-2xl border border-pink-100">
                <span class="text-[10px] font-bold text-[#7A3644] flex items-center gap-1">🎨 Frame:</span>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="selectFrameColor('pink')" id="colorBtn-pink" title="Pink Pastel" class="w-4 h-4 rounded-full bg-[#FFD1DC] border-2 border-rose-400 ring-2 ring-rose-300 scale-110 transition-all shadow-sm cursor-pointer"></button>
                    <button type="button" onclick="selectFrameColor('blue')" id="colorBtn-blue" title="Biru Pastel" class="w-4 h-4 rounded-full bg-[#BAE6FD] border-2 border-transparent hover:scale-105 transition-all shadow-sm cursor-pointer opacity-70 hover:opacity-100"></button>
                    <button type="button" onclick="selectFrameColor('yellow')" id="colorBtn-yellow" title="Kuning Pastel" class="w-4 h-4 rounded-full bg-[#FEF08A] border-2 border-transparent hover:scale-105 transition-all shadow-sm cursor-pointer opacity-70 hover:opacity-100"></button>
                    <button type="button" onclick="selectFrameColor('purple')" id="colorBtn-purple" title="Ungu Pastel" class="w-4 h-4 rounded-full bg-[#E9D5FF] border-2 border-transparent hover:scale-105 transition-all shadow-sm cursor-pointer opacity-70 hover:opacity-100"></button>
                </div>
            </div>

            <!-- Preview Photostrip Utuh -->
            <div class="strip-preview-box">
                <canvas id="stripCanvas" class="w-full h-full object-contain"></canvas>
            </div>

            <!-- Unduh Foto Satuan 1 per 1 (LENGKAP DENGAN IKAN) -->
            <div class="w-full mt-2.5 flex items-center justify-between gap-1 bg-sky-50/80 p-1.5 rounded-2xl border border-sky-100">
                <span class="text-[10px] font-bold text-sky-800 pl-1 flex items-center gap-1">
                    <span>🐠</span> Unduh Foto 1-1:
                </span>
                <div class="flex gap-1">
                    <button type="button" onclick="downloadSinglePhotoWithFish(0)" id="dlSingleBtn0" disabled title="Unduh Foto #1 Lengkap Ikan" class="px-2 py-0.5 rounded-lg bg-white border border-sky-200 text-sky-800 text-[10px] font-bold hover:bg-sky-100 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                        1 💾
                    </button>
                    <button type="button" onclick="downloadSinglePhotoWithFish(1)" id="dlSingleBtn1" disabled title="Unduh Foto #2 Lengkap Ikan" class="px-2 py-0.5 rounded-lg bg-white border border-sky-200 text-sky-800 text-[10px] font-bold hover:bg-sky-100 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                        2 💾
                    </button>
                    <button type="button" onclick="downloadSinglePhotoWithFish(2)" id="dlSingleBtn2" disabled title="Unduh Foto #3 Lengkap Ikan" class="px-2 py-0.5 rounded-lg bg-white border border-sky-200 text-sky-800 text-[10px] font-bold hover:bg-sky-100 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                        3 💾
                    </button>
                </div>
            </div>

            <!-- Opsi Tombol Ulang Per Foto (Pose 1, 2, 3) -->
            <div class="w-full mt-1.5 flex items-center justify-between gap-1 bg-pink-50/70 p-1.5 rounded-2xl border border-pink-100">
                <span class="text-[10px] font-bold text-[#7A3644] pl-1">Ulang Pose:</span>
                <div class="flex gap-1">
                    <button type="button" onclick="retakeSinglePose(0)" id="retakeBtn0" disabled class="px-2 py-0.5 rounded-lg bg-white border border-pink-200 text-[#8C3A49] text-[10px] font-bold hover:bg-pink-100 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                        1 ⟳
                    </button>
                    <button type="button" onclick="retakeSinglePose(1)" id="retakeBtn1" disabled class="px-2 py-0.5 rounded-lg bg-white border border-pink-200 text-[#8C3A49] text-[10px] font-bold hover:bg-pink-100 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                        2 ⟳
                    </button>
                    <button type="button" onclick="retakeSinglePose(2)" id="retakeBtn2" disabled class="px-2 py-0.5 rounded-lg bg-white border border-pink-200 text-[#8C3A49] text-[10px] font-bold hover:bg-pink-100 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                        3 ⟳
                    </button>
                </div>
            </div>

            <!-- Tombol Unduh Strip & Reset -->
            <div class="w-full flex flex-col gap-1.5 mt-2.5">
                <button id="downloadBtn" type="button" disabled class="w-full py-2.5 rounded-xl bg-gradient-to-r from-[#FFAAA6] to-[#FF8E9E] text-white font-bold text-xs shadow-md shadow-rose-200 opacity-50 cursor-not-allowed transition-all flex items-center justify-center gap-1.5">
                    <span>💾</span> Unduh Semua (Strip PNG)
                </button>
                <button id="resetAllBtn" type="button" onclick="resetBooth()" class="w-full py-1.5 rounded-xl bg-pink-50 text-[#8C3A49] font-bold text-xs hover:bg-pink-100 transition-all">
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
        let capturedShots = [null, null, null]; // Berisi Foto Kamera + Ikan & Gelembung
        let isSessionRunning = false;
        let currentFacingMode = 'user';
        let currentMediaStream = null;
        let torchActivePreference = true;

        // --- Palet Tema Warna Frame Pastel ---
        let selectedFrameColor = 'pink';
        const frameThemes = {
            pink: {
                grad: ['#FFF5EB', '#FFEBF0', '#FFDEE9'],
                border: '#FFCCD5',
                emptyBg: '#FFF5F7',
                emptyBorder: '#FFE0E6',
                emptyText: '#C27C88',
                textPrimary: '#8C3A49',
                textSecondary: '#A57878'
            },
            blue: {
                grad: ['#F0F9FF', '#E0F2FE', '#BAE6FD'],
                border: '#93C5FD',
                emptyBg: '#F0F8FF',
                emptyBorder: '#BAE6FD',
                emptyText: '#0284C7',
                textPrimary: '#0369A1',
                textSecondary: '#5C84A6'
            },
            yellow: {
                grad: ['#FFFFF0', '#FEFCE8', '#FEF08A'],
                border: '#FDE047',
                emptyBg: '#FFFFF5',
                emptyBorder: '#FEF08A',
                emptyText: '#CA8A04',
                textPrimary: '#A16207',
                textSecondary: '#854D0E'
            },
            purple: {
                grad: ['#FAF5FF', '#F3E8FF', '#E9D5FF'],
                border: '#D8B4FE',
                emptyBg: '#FBF7FF',
                emptyBorder: '#E9D5FF',
                emptyText: '#9333EA',
                textPrimary: '#7E22CE',
                textSecondary: '#6B21A8'
            }
        };

        const activeClasses = {
            pink: 'w-4 h-4 rounded-full bg-[#FFD1DC] border-2 border-rose-400 ring-2 ring-rose-300 scale-110 transition-all shadow-sm cursor-pointer',
            blue: 'w-4 h-4 rounded-full bg-[#BAE6FD] border-2 border-sky-400 ring-2 ring-sky-300 scale-110 transition-all shadow-sm cursor-pointer',
            yellow: 'w-4 h-4 rounded-full bg-[#FEF08A] border-2 border-amber-400 ring-2 ring-amber-300 scale-110 transition-all shadow-sm cursor-pointer',
            purple: 'w-4 h-4 rounded-full bg-[#E9D5FF] border-2 border-purple-400 ring-2 ring-purple-300 scale-110 transition-all shadow-sm cursor-pointer'
        };
        const inactiveClasses = {
            pink: 'w-4 h-4 rounded-full bg-[#FFD1DC] border-2 border-transparent hover:scale-105 transition-all shadow-sm cursor-pointer opacity-70 hover:opacity-100',
            blue: 'w-4 h-4 rounded-full bg-[#BAE6FD] border-2 border-transparent hover:scale-105 transition-all shadow-sm cursor-pointer opacity-70 hover:opacity-100',
            yellow: 'w-4 h-4 rounded-full bg-[#FEF08A] border-2 border-transparent hover:scale-105 transition-all shadow-sm cursor-pointer opacity-70 hover:opacity-100',
            purple: 'w-4 h-4 rounded-full bg-[#E9D5FF] border-2 border-transparent hover:scale-105 transition-all shadow-sm cursor-pointer opacity-70 hover:opacity-100'
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
            } catch (e) {}
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
                    }, 400);
                }
            } catch (err) {}
        }

        function resizeCanvas() {
            if (canvas.parentElement) {
                canvas.width = canvas.parentElement.clientWidth || 460;
                canvas.height = canvas.parentElement.clientHeight || 460;
            }
        }
        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        class ColorfulGoldfish {
            constructor() { this.reset(true); }

            reset(initial = false) {
                const cw = canvas.width || 460;
                const ch = canvas.height || 460;
                this.x = initial ? Math.random() * cw : (Math.random() > 0.5 ? -120 : cw + 120);
                this.y = Math.random() * (ch - 90) + 45;
                this.speed = Math.random() * 0.9 + 0.6;
                this.direction = this.x < cw / 2 ? 1 : -1;
                this.colorType = Math.floor(Math.random() * 5);
                
                const sizeRoll = Math.random();
                if (sizeRoll < 0.60) {
                    this.isNearLens = false;
                    this.scale = Math.random() * 0.15 + 0.22;
                } else if (sizeRoll < 0.85) {
                    this.isNearLens = false;
                    this.scale = Math.random() * 0.2 + 0.45;
                } else {
                    this.isNearLens = true;
                    this.scale = Math.random() * 0.3 + 0.8;
                }

                this.tailAngle = Math.random() * Math.PI;
                this.tailSpeed = Math.random() * 0.08 + 0.06;
                this.finFlutter = 0;
            }

            update() {
                const cw = canvas.width || 460;
                this.x += this.speed * this.direction;
                this.tailAngle += this.tailSpeed;
                this.finFlutter += 0.12;
                this.y += Math.sin(this.tailAngle * 0.6) * 0.35;

                if (this.direction === 1 && this.x > cw + 150) this.reset();
                else if (this.direction === -1 && this.x < -150) this.reset();
            }

            draw(targetCtx = ctx) {
                targetCtx.save();
                targetCtx.translate(this.x, this.y);
                targetCtx.scale(this.direction * this.scale, this.scale);

                let cPrimary, cSecondary, cHighlight, glowColor;
                if (this.colorType === 0) {
                    cHighlight = '#FFE17D'; cPrimary = '#FF8A1C'; cSecondary = '#E84508'; glowColor = 'rgba(255, 140, 0, 0.4)';
                } else if (this.colorType === 1) {
                    cHighlight = '#FFFFFF'; cPrimary = '#FFF0EE'; cSecondary = '#E63946'; glowColor = 'rgba(230, 57, 70, 0.4)';
                } else if (this.colorType === 2) {
                    cHighlight = '#FCE4EC'; cPrimary = '#B39DDB'; cSecondary = '#FF7043'; glowColor = 'rgba(179, 157, 219, 0.4)';
                } else if (this.colorType === 3) {
                    cHighlight = '#78909C'; cPrimary = '#37474F'; cSecondary = '#212121'; glowColor = 'rgba(55, 71, 79, 0.4)';
                } else {
                    cHighlight = '#FFFF8D'; cPrimary = '#FFEE58'; cSecondary = '#FBC02D'; glowColor = 'rgba(255, 235, 59, 0.4)';
                }

                if (this.isNearLens) {
                    targetCtx.save();
                    const glowGrad = targetCtx.createRadialGradient(0, 0, 10, 0, 0, 60);
                    glowGrad.addColorStop(0, glowColor);
                    glowGrad.addColorStop(1, 'rgba(255, 255, 255, 0)');
                    targetCtx.fillStyle = glowGrad;
                    targetCtx.beginPath();
                    targetCtx.arc(0, 0, 60, 0, Math.PI * 2);
                    targetCtx.fill();
                    targetCtx.restore();
                }

                // Dorsal
                targetCtx.save();
                targetCtx.beginPath();
                targetCtx.moveTo(-10, -20);
                targetCtx.quadraticCurveTo(5, -50, 24, -22);
                targetCtx.quadraticCurveTo(8, -24, -10, -20);
                const dorsalGrad = targetCtx.createLinearGradient(0, -50, 0, -20);
                dorsalGrad.addColorStop(0, 'rgba(255, 255, 255, 0.6)');
                dorsalGrad.addColorStop(0.5, cPrimary);
                dorsalGrad.addColorStop(1, cSecondary);
                targetCtx.fillStyle = dorsalGrad;
                targetCtx.fill();
                targetCtx.restore();

                // Tail
                targetCtx.save();
                targetCtx.translate(-24, 0);
                targetCtx.rotate(Math.sin(this.tailAngle) * 0.28);
                targetCtx.beginPath();
                targetCtx.moveTo(0, -2);
                targetCtx.quadraticCurveTo(-30, -38, -65, -30);
                targetCtx.quadraticCurveTo(-48, -7, -8, 2);
                const tailGrad = targetCtx.createLinearGradient(-65, 0, 0, 0);
                tailGrad.addColorStop(0, 'rgba(255, 255, 255, 0.5)');
                tailGrad.addColorStop(0.4, cPrimary);
                tailGrad.addColorStop(1, cSecondary);
                targetCtx.fillStyle = tailGrad;
                targetCtx.fill();

                targetCtx.beginPath();
                targetCtx.moveTo(0, 2);
                targetCtx.quadraticCurveTo(-35, 30, -70, 18);
                targetCtx.quadraticCurveTo(-45, 0, -8, 0);
                targetCtx.fillStyle = tailGrad;
                targetCtx.fill();
                targetCtx.restore();

                // Body
                targetCtx.save();
                targetCtx.beginPath();
                targetCtx.ellipse(4, 0, 32, 23, 0.05, 0, Math.PI * 2);
                const bodyGrad = targetCtx.createRadialGradient(6, -7, 4, 4, 0, 32);
                bodyGrad.addColorStop(0, cHighlight);
                bodyGrad.addColorStop(0.35, cPrimary);
                bodyGrad.addColorStop(0.8, cSecondary);
                bodyGrad.addColorStop(1, '#1A1A1A');
                targetCtx.fillStyle = bodyGrad;
                targetCtx.shadowColor = glowColor;
                targetCtx.shadowBlur = 8;
                targetCtx.fill();
                targetCtx.restore();

                // Eye
                targetCtx.beginPath();
                targetCtx.arc(22, -4, 5.5, 0, Math.PI * 2);
                targetCtx.fillStyle = '#FFD54F';
                targetCtx.fill();

                targetCtx.beginPath();
                targetCtx.arc(22, -4, 3.5, 0, Math.PI * 2);
                targetCtx.fillStyle = '#111111';
                targetCtx.fill();

                targetCtx.beginPath();
                targetCtx.arc(20.5, -5.5, 1.3, 0, Math.PI * 2);
                targetCtx.fillStyle = '#FFFFFF';
                targetCtx.fill();

                targetCtx.restore();
            }
        }

        class Bubble {
            constructor() { this.reset(); }
            reset() {
                const cw = canvas.width || 460;
                const ch = canvas.height || 460;
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

        const fishes = Array.from({ length: 12 }, () => new ColorfulGoldfish());
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
            capturedShots = [null, null, null];

            startBtn.disabled = true;
            startBtn.classList.add('opacity-50', 'cursor-not-allowed');
            downloadBtn.disabled = true;
            downloadBtn.classList.add('opacity-50', 'cursor-not-allowed');

            stripStatusBadge.className = "text-[10px] text-pink-600 bg-pink-100 px-2.5 py-0.5 rounded-full font-bold";
            stripStatusBadge.innerText = "Memotret...";

            countdownBox.classList.remove('hidden');

            for (let i = 0; i < 3; i++) {
                poseIndicator.innerText = `Pose ${i + 1} / 3`;
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

        function capturePoseIndex(index) {
            const size = Math.min(canvas.width, canvas.height) || 460;

            const photoCanvas = document.createElement('canvas');
            photoCanvas.width = size;
            photoCanvas.height = size;
            const pCtx = photoCanvas.getContext('2d');

            if (video.videoWidth > 0) {
                const vMin = Math.min(video.videoWidth, video.videoHeight);
                const sx = (video.videoWidth - vMin) / 2;
                const sy = (video.videoHeight - vMin) / 2;

                pCtx.save();
                if (currentFacingMode === 'user') {
                    pCtx.translate(size, 0);
                    pCtx.scale(-1, 1);
                }
                pCtx.drawImage(video, sx, sy, vMin, vMin, 0, 0, size, size);
                pCtx.restore();
            } else {
                pCtx.fillStyle = '#1e1b1b';
                pCtx.fillRect(0, 0, size, size);
            }

            // Tempelkan gambar animasi ikan & gelembung di atas foto kamera
            pCtx.drawImage(canvas, 0, 0, size, size);

            capturedShots[index] = photoCanvas;

            // Aktifkan tombol ulang & unduh per foto
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

        function renderPhotostripLive() {
            const theme = frameThemes[selectedFrameColor] || frameThemes.pink;
            const stripW = 400;
            const stripH = 980;
            stripCanvas.width = stripW;
            stripCanvas.height = stripH;
            const sCtx = stripCanvas.getContext('2d');

            // Gradient Latar Belakang Sesuai Tema
            const bgGrad = sCtx.createLinearGradient(0, 0, stripW, stripH);
            bgGrad.addColorStop(0, theme.grad[0]);
            bgGrad.addColorStop(0.5, theme.grad[1]);
            bgGrad.addColorStop(1, theme.grad[2]);
            sCtx.fillStyle = bgGrad;
            sCtx.fillRect(0, 0, stripW, stripH);

            // Border Frame
            sCtx.strokeStyle = theme.border;
            sCtx.lineWidth = 6;
            sCtx.strokeRect(10, 10, stripW - 20, stripH - 20);

            const photoSize = 270;
            const startX = (stripW - photoSize) / 2;
            const startY = 28;
            const gap = 20;

            for (let i = 0; i < 3; i++) {
                const y = startY + i * (photoSize + gap);
                const shot = capturedShots[i];

                sCtx.save();
                sCtx.shadowColor = 'rgba(0, 0, 0, 0.08)';
                sCtx.shadowBlur = 8;
                sCtx.shadowOffsetY = 2;
                sCtx.fillStyle = '#ffffff';
                sCtx.fillRect(startX - 4, y - 4, photoSize + 8, photoSize + 8);
                sCtx.restore();

                if (shot) {
                    sCtx.drawImage(shot, startX, y, photoSize, photoSize);
                } else {
                    sCtx.fillStyle = theme.emptyBg;
                    sCtx.fillRect(startX, y, photoSize, photoSize);
                    sCtx.strokeStyle = theme.emptyBorder;
                    sCtx.lineWidth = 1;
                    sCtx.strokeRect(startX, y, photoSize, photoSize);

                    sCtx.fillStyle = theme.emptyText;
                    sCtx.font = 'bold 13px "Quicksand", sans-serif';
                    sCtx.textAlign = 'center';
                    sCtx.fillText(`Pose ${i + 1} Kosong`, stripW / 2, y + photoSize / 2);
                }
            }

            // Watermark Judul
            sCtx.fillStyle = theme.textPrimary;
            sCtx.font = 'bold 15px "Quicksand", sans-serif';
            sCtx.textAlign = 'center';
            sCtx.fillText('🫧 AQUARIUM BOOTH 🫧', stripW / 2, stripH - 55);

            // Tanggal
            const today = new Date();
            const dateStr = today.toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' });
            sCtx.fillStyle = theme.textSecondary;
            sCtx.font = '500 11px "Plus Jakarta Sans", sans-serif';
            sCtx.fillText(dateStr, stripW / 2, stripH - 35);
        }

        // Fungsi Download Single Photo Lengkap dengan Ikan (1 Per 1)
        function downloadSinglePhotoWithFish(index) {
            const shotCanvas = capturedShots[index];
            if (!shotCanvas) return;

            const link = document.createElement('a');
            link.download = `aquarium-photo-pose-${index + 1}-${Date.now()}.png`;
            link.href = shotCanvas.toDataURL('image/png');
            link.click();
        }

        // Fungsi Download Full Photostrip
        function downloadStrip() {
            if (!capturedShots.every(s => s !== null)) return;
            const link = document.createElement('a');
            link.download = `photobooth-${selectedFrameColor}-aquarium-${Date.now()}.png`;
            link.href = stripCanvas.toDataURL('image/png');
            link.click();
        }

        function resetBooth() {
            capturedShots = [null, null, null];
            for (let i = 0; i < 3; i++) {
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

        // Render inisial canvas
        renderPhotostripLive();
    </script>
</body>
</html>