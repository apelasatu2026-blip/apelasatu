<!-- resources/views/infografis.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Infografis - Kelurahan Apela I</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>

<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    sans: ['Poppins', 'sans-serif'],
                },
                colors: {
                    forest: {
                        50: '#f0fdf4',
                        100: '#dcfce7',
                        600: '#16a34a',
                        700: '#15803d',
                        800: '#166534',
                        900: '#14532d',
                    },
                    gold: '#ffc107',
                }
            }
        }
    }
</script>

<style>
    html{ scroll-behavior:smooth; }
    body{ font-family:'Poppins', sans-serif; }

    .nav-underline{ position:relative; }
    .nav-underline::after{
        content:"";
        position:absolute;
        left:0;
        bottom:-4px;
        width:0;
        height:2px;
        background:#ffc107;
        transition:.3s;
    }
    .nav-underline:hover::after{ width:100%; }

    .stat-card{
        transition:.3s;
    }
    .stat-card:hover{
        transform:translateY(-6px);
        box-shadow:0 15px 30px rgba(20,83,45,.15);
    }

    .chart-card{
        transition:.3s;
    }
    .chart-card:hover{
        box-shadow:0 15px 35px rgba(20,83,45,.12);
    }

    .chart-wrap{
        position:relative;
        height:320px;
    }

    .chart-wrap.tall{
        height:360px;
    }
</style>

</head>


<body class="bg-gray-50">


<!--======================
        NAVBAR
=======================-->

<nav class="bg-forest-800/95 backdrop-blur text-white shadow-lg sticky top-0 z-50">

<div class="max-w-7xl mx-auto flex justify-between items-center p-5">

<a href="/" class="text-2xl font-bold flex items-center gap-3">
    <img src="{{ asset('assets/logobitung.png') }}"
         alt="Logo Kota Bitung"
         class="w-10 h-10 object-contain">
    Kelurahan Apela I
</a>

<button id="menuBtn" class="lg:hidden text-3xl">
    <i class="bi bi-list"></i>
</button>

<ul id="menu" class="hidden lg:flex gap-8 font-semibold items-center">
    <li><a href="/" class="nav-underline hover:text-gold transition">Home</a></li>
    <li><a href="/profile" class="nav-underline hover:text-gold transition">Profile</a></li>
    <li><a href="/infografis" class="nav-underline text-gold">Infografis</a></li>
    <li><a href="/listing" class="nav-underline hover:text-gold transition">Listing</a></li>
    <li>
        <a href="https://www.facebook.com/share/162YAdnMNoj/" target="_blank" rel="noopener noreferrer" class="hover:text-gold transition text-xl" title="Facebook">
            <i class="bi bi-facebook"></i>
        </a>
    </li>
    <li>
        <a href="https://wa.me/6285696394878" target="_blank" rel="noopener noreferrer" class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-full flex items-center gap-2 text-sm transition font-medium">
            <i class="bi bi-whatsapp"></i> Hubungi WA
        </a>
    </li>
</ul>

</div>

<div id="mobileMenu" class="hidden lg:hidden bg-forest-900 px-6 pb-5 flex flex-col gap-4 font-semibold">
    <a href="/" class="hover:text-gold transition">Home</a>
    <a href="/profile" class="hover:text-gold transition">Profile</a>
    <a href="/infografis" class="text-gold">Infografis</a>
    <a href="/listing" class="hover:text-gold transition">Listing</a>
    <div class="flex items-center gap-4 py-2 border-t border-forest-700 mt-2">
        <a href="https://www.facebook.com/share/162YAdnMNoj/" target="_blank" rel="noopener noreferrer" class="text-gold text-2xl">
            <i class="bi bi-facebook"></i>
        </a>
        <a href="https://wa.me/6285696394878" target="_blank" rel="noopener noreferrer" class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-full text-sm flex items-center gap-2">
            <i class="bi bi-whatsapp"></i> WhatsApp
        </a>
    </div>
</div>

</nav>



<!--======================
        HERO / HEADER
=======================-->

<section class="relative bg-gradient-to-br from-forest-900 to-forest-700 text-white py-20 overflow-hidden">

    <div class="max-w-7xl mx-auto px-6 md:px-10 text-center relative z-10">

        <span class="inline-block bg-gold text-forest-900 text-xs font-bold tracking-widest uppercase px-4 py-2 rounded-full mb-5">
            Data &amp; Statistik
        </span>

        <h1 class="text-3xl md:text-5xl font-extrabold">
            Infografis Kelurahan Apela I
        </h1>

        <p class="mt-4 text-gray-200 max-w-2xl mx-auto text-base md:text-lg">
            Gambaran data kependudukan, sosial, dan demografi
            Kelurahan Apela I berdasarkan data terbaru.
        </p>

    </div>

</section>




<!--======================
    STATISTIK RINGKAS
=======================-->

<section class="max-w-7xl mx-auto px-6 md:px-10 -mt-12 relative z-20 pb-10">

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">

        <div class="stat-card bg-white rounded-2xl shadow-lg p-6 text-center">
            <div class="w-14 h-14 rounded-xl bg-forest-100 flex items-center justify-center mx-auto mb-4">
                <i class="bi bi-people-fill text-forest-700 text-2xl"></i>
            </div>
            <h2 class="text-3xl font-extrabold text-forest-900" id="statPenduduk">400</h2>
            <p class="text-gray-500 text-sm mt-1">Jumlah Penduduk</p>
        </div>

        <div class="stat-card bg-white rounded-2xl shadow-lg p-6 text-center">
            <div class="w-14 h-14 rounded-xl bg-forest-100 flex items-center justify-center mx-auto mb-4">
                <i class="bi bi-house-door-fill text-forest-700 text-2xl"></i>
            </div>
            <h2 class="text-3xl font-extrabold text-forest-900" id="statKK">138</h2>
            <p class="text-gray-500 text-sm mt-1">Kepala Keluarga</p>
        </div>

        <div class="stat-card bg-white rounded-2xl shadow-lg p-6 text-center">
            <div class="w-14 h-14 rounded-xl bg-forest-100 flex items-center justify-center mx-auto mb-4">
                <i class="bi bi-gender-male text-forest-700 text-2xl"></i>
            </div>
            <h2 class="text-3xl font-extrabold text-forest-900" id="statLaki">184</h2>
            <p class="text-gray-500 text-sm mt-1">Laki-laki</p>
        </div>

        <div class="stat-card bg-white rounded-2xl shadow-lg p-6 text-center">
            <div class="w-14 h-14 rounded-xl bg-forest-100 flex items-center justify-center mx-auto mb-4">
                <i class="bi bi-gender-female text-forest-700 text-2xl"></i>
            </div>
            <h2 class="text-3xl font-extrabold text-forest-900" id="statPerempuan">216</h2>
            <p class="text-gray-500 text-sm mt-1">Perempuan</p>
        </div>

        <div class="stat-card bg-white rounded-2xl shadow-lg p-6 text-center">
            <div class="w-14 h-14 rounded-xl bg-forest-100 flex items-center justify-center mx-auto mb-4">
                <i class="bi bi-map-fill text-forest-700 text-2xl"></i>
            </div>
            <h2 class="text-3xl font-extrabold text-forest-900" id="statLingkungan">2</h2>
            <p class="text-gray-500 text-sm mt-1">Jumlah Lingkungan</p>
        </div>

        <div class="stat-card bg-white rounded-2xl shadow-lg p-6 text-center">
            <div class="w-14 h-14 rounded-xl bg-forest-100 flex items-center justify-center mx-auto mb-4">
                <i class="bi bi-signpost-split-fill text-forest-700 text-2xl"></i>
            </div>
            <h2 class="text-3xl font-extrabold text-forest-900" id="statRT">4</h2>
            <p class="text-gray-500 text-sm mt-1">Jumlah RT</p>
        </div>

    </div>

</section>




<!--======================
    GRAFIK KELOMPOK UMUR
=======================-->

<section class="max-w-7xl mx-auto px-6 md:px-10 py-8">

    <div class="chart-card bg-white rounded-3xl shadow-lg p-6 md:p-8">

        <div class="flex items-center gap-3 mb-6">
            <div class="w-11 h-11 rounded-xl bg-forest-100 flex items-center justify-center">
                <i class="bi bi-bar-chart-fill text-forest-700 text-xl"></i>
            </div>
            <div>
                <h3 class="text-xl font-bold text-forest-900">Penduduk Berdasarkan Kelompok Umur</h3>
                <p class="text-sm text-gray-500">Distribusi jumlah penduduk per rentang usia</p>
            </div>
        </div>

        <div class="chart-wrap tall">
            <canvas id="chartUmur"></canvas>
        </div>

    </div>

</section>




<!--======================
    LINGKUNGAN & PENDIDIKAN
=======================-->

<section class="max-w-7xl mx-auto px-6 md:px-10 py-4">

    <div class="grid md:grid-cols-2 gap-8">

        <!-- MUTASI PENDUDUK (BAR) -->
        <div class="chart-card bg-white rounded-3xl shadow-lg p-6 md:p-8">

            <div class="flex items-center gap-3 mb-6">
                <div class="w-11 h-11 rounded-xl bg-forest-100 flex items-center justify-center">
                    <i class="bi bi-arrow-left-right text-forest-700 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-forest-900">Mutasi Penduduk Bulan Ini</h3>
                    <p class="text-sm text-gray-500">Penduduk bulan lalu, yang pindah, dan penduduk bulan ini</p>
                </div>
            </div>

            <div class="chart-wrap">
                <canvas id="chartMutasi"></canvas>
            </div>

        </div>

        <!-- PENDIDIKAN (BAR) -->
        <div class="chart-card bg-white rounded-3xl shadow-lg p-6 md:p-8">

            <div class="flex items-center gap-3 mb-6">
                <div class="w-11 h-11 rounded-xl bg-forest-100 flex items-center justify-center">
                    <i class="bi bi-mortarboard-fill text-forest-700 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-forest-900">Penduduk Berdasarkan Pendidikan</h3>
                    <p class="text-sm text-gray-500">Tingkat pendidikan terakhir penduduk</p>
                </div>
            </div>

            <div class="chart-wrap">
                <canvas id="chartPendidikan"></canvas>
            </div>

            <div class="mt-6 pt-5 border-t border-gray-100">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Putus Sekolah &amp; Lulusan</p>
                <div class="grid grid-cols-3 gap-2 text-center text-sm">
                    <div class="bg-forest-50 rounded-lg py-2">
                        <div class="font-bold text-forest-900">117</div>
                        <div class="text-gray-500 text-xs">Putus SD</div>
                    </div>
                    <div class="bg-forest-50 rounded-lg py-2">
                        <div class="font-bold text-forest-900">9</div>
                        <div class="text-gray-500 text-xs">Putus SLTP</div>
                    </div>
                    <div class="bg-forest-50 rounded-lg py-2">
                        <div class="font-bold text-forest-900">9</div>
                        <div class="text-gray-500 text-xs">Putus SLTA</div>
                    </div>
                    <div class="bg-forest-50 rounded-lg py-2">
                        <div class="font-bold text-forest-900">8</div>
                        <div class="text-gray-500 text-xs">Putus PT</div>
                    </div>
                    <div class="bg-forest-50 rounded-lg py-2">
                        <div class="font-bold text-forest-900">27</div>
                        <div class="text-gray-500 text-xs">Lulus S1</div>
                    </div>
                    <div class="bg-forest-50 rounded-lg py-2">
                        <div class="font-bold text-forest-900">3</div>
                        <div class="text-gray-500 text-xs">Lulus S2</div>
                    </div>
                </div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mt-4 mb-3">Kondisi Fisik</p>
                <div class="grid grid-cols-2 gap-2 text-center text-sm">
                    <div class="bg-forest-50 rounded-lg py-2">
                        <div class="font-bold text-forest-900">1</div>
                        <div class="text-gray-500 text-xs">Cacat Mental</div>
                    </div>
                    <div class="bg-forest-50 rounded-lg py-2">
                        <div class="font-bold text-forest-900">6</div>
                        <div class="text-gray-500 text-xs">Cacat Fisik</div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>




<!--======================
    PEKERJAAN & WAJIB PILIH
=======================-->

<section class="max-w-7xl mx-auto px-6 md:px-10 py-4">

    <div class="grid md:grid-cols-2 gap-8">

        <!-- PEKERJAAN (BAR) -->
        <div class="chart-card bg-white rounded-3xl shadow-lg p-6 md:p-8">

            <div class="flex items-center gap-3 mb-6">
                <div class="w-11 h-11 rounded-xl bg-forest-100 flex items-center justify-center">
                    <i class="bi bi-briefcase-fill text-forest-700 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-forest-900">Penduduk Berdasarkan Pekerjaan</h3>
                    <p class="text-sm text-gray-500">Jenis mata pencaharian penduduk</p>
                </div>
            </div>

            <div class="chart-wrap">
                <canvas id="chartPekerjaan"></canvas>
            </div>

        </div>

        <!-- WAJIB PILIH PER TAHUN (BAR) -->
        <div class="chart-card bg-white rounded-3xl shadow-lg p-6 md:p-8">

            <div class="flex items-center gap-3 mb-6">
                <div class="w-11 h-11 rounded-xl bg-forest-100 flex items-center justify-center">
                    <i class="bi bi-person-vcard-fill text-forest-700 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-forest-900">Kepemilikan Dokumen Kependudukan</h3>
                    <p class="text-sm text-gray-500">Wajib vs memiliki KTP dan Kartu Keluarga</p>
                </div>
            </div>

            <div class="chart-wrap">
                <canvas id="chartDokumen"></canvas>
            </div>

        </div>

    </div>

</section>




<!--======================
    PERKAWINAN & AGAMA
=======================-->

<section class="max-w-7xl mx-auto px-6 md:px-10 py-4 pb-16">

    <div class="grid md:grid-cols-2 gap-8">

        <!-- PERKAWINAN (PIE) -->
        <div class="chart-card bg-white rounded-3xl shadow-lg p-6 md:p-8">

            <div class="flex items-center gap-3 mb-6">
                <div class="w-11 h-11 rounded-xl bg-forest-100 flex items-center justify-center">
                    <i class="bi bi-heart-fill text-forest-700 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-forest-900">Penduduk Berdasarkan Status Perkawinan</h3>
                    <p class="text-sm text-gray-500">Belum kawin, kawin, cerai hidup, cerai mati <span class="text-gold font-semibold">(data contoh)</span></p>
                </div>
            </div>

            <div class="chart-wrap">
                <canvas id="chartPerkawinan"></canvas>
            </div>

        </div>

        <!-- AGAMA (PIE) -->
        <div class="chart-card bg-white rounded-3xl shadow-lg p-6 md:p-8">

            <div class="flex items-center gap-3 mb-6">
                <div class="w-11 h-11 rounded-xl bg-forest-100 flex items-center justify-center">
                    <i class="bi bi-book-fill text-forest-700 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-forest-900">Penduduk Berdasarkan Agama</h3>
                    <p class="text-sm text-gray-500">Sebaran penduduk menurut agama yang dianut</p>
                </div>
            </div>

            <div class="chart-wrap">
                <canvas id="chartAgama"></canvas>
            </div>

        </div>

    </div>

</section>




<!--======================
          FOOTER
=======================-->

<footer class="bg-forest-900 text-white pt-16 pb-8">

    <div class="max-w-7xl mx-auto text-center px-6">

        <h1 class="text-3xl md:text-4xl font-bold flex items-center justify-center gap-4">
            <img src="{{ asset('assets/logobitung.png') }}"
                 alt="Logo Kota Bitung"
                 class="w-14 h-14 object-contain">
            Kelurahan Apela I
        </h1>

        <p class="mt-5 text-gray-300">
            Kecamatan Ranowulu &bull; Kota Bitung &bull; Sulawesi Utara
        </p>

        <!-- LINK SOSIAL MEDIA FOOTER -->
        <div class="mt-6 flex items-center justify-center gap-4">
            <a href="https://www.facebook.com/share/162YAdnMNoj/" target="_blank" rel="noopener noreferrer" class="bg-white/10 hover:bg-gold hover:text-forest-900 w-10 h-10 rounded-full flex items-center justify-center transition text-lg" title="Facebook">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="https://wa.me/6285696394878" target="_blank" rel="noopener noreferrer" class="bg-white/10 hover:bg-green-500 hover:text-white w-10 h-10 rounded-full flex items-center justify-center transition text-lg" title="WhatsApp Kontak Langsung">
                <i class="bi bi-whatsapp"></i>
            </a>
        </div>

        <hr class="border-white/10 my-8">

        <p class="text-sm text-gray-400">
            © 2026 Sistem Informasi Kelurahan Apela I
        </p>

    </div>

</footer>

<!-- Tombol WhatsApp Melayang (Direct Call/Chat) -->
<a href="https://wa.me/6285696394878" target="_blank" rel="noopener noreferrer" aria-label="Hubungi WhatsApp" class="fixed bottom-7 right-7 bg-green-500 hover:bg-green-600 text-white w-12 h-12 rounded-full flex items-center justify-center text-2xl shadow-xl transition-all hover:scale-110 z-50">
    <i class="bi bi-whatsapp"></i>
</a>


<script>
    // ==== MOBILE MENU ====
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    const palette = ['#166534', '#16a34a', '#4ade80', '#a3e635', '#ffc107', '#0ea5e9', '#f97316', '#dc2626'];

    Chart.defaults.font.family = "'Poppins', sans-serif";
    Chart.defaults.color = '#374151';

    // ---- KELOMPOK UMUR ----
    new Chart(document.getElementById('chartUmur'), {
        type: 'bar',
        data: {
            labels: ['0-5', '6-10', '11-15', '16-20', '21-25', '26-30', '31-35', '36-40', '41-45', '46-50', '51-55', '60+'],
            datasets: [
                {
                    label: 'Laki-laki',
                    data: [10, 17, 8, 3, 6, 17, 15, 17, 15, 13, 14, 30],
                    backgroundColor: '#16a34a',
                    borderRadius: 6,
                    maxBarThickness: 22
                },
                {
                    label: 'Perempuan',
                    data: [14, 21, 7, 12, 12, 22, 16, 15, 16, 15, 16, 31],
                    backgroundColor: '#ffc107',
                    borderRadius: 6,
                    maxBarThickness: 22
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } },
            scales: {
                y: { beginAtZero: true, grid: { color: '#f0fdf4' } },
                x: { grid: { display: false } }
            }
        }
    });

    // ---- MUTASI PENDUDUK (BAR) ----
    new Chart(document.getElementById('chartMutasi'), {
        type: 'bar',
        data: {
            labels: ['Bulan Lalu', 'Pindah', 'Bulan Ini'],
            datasets: [
                {
                    label: 'Laki-laki',
                    data: [184, 1, 183],
                    backgroundColor: '#16a34a',
                    borderRadius: 8,
                    maxBarThickness: 45
                },
                {
                    label: 'Perempuan',
                    data: [216, 2, 214],
                    backgroundColor: '#ffc107',
                    borderRadius: 8,
                    maxBarThickness: 45
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } },
            scales: {
                y: { beginAtZero: true, grid: { color: '#f0fdf4' } },
                x: { grid: { display: false } }
            }
        }
    });

    // ---- PENDIDIKAN (BAR) ----
    new Chart(document.getElementById('chartPendidikan'), {
        type: 'bar',
        data: {
            labels: ['TK', 'SD', 'SLTP', 'SMU/Sederajat', 'Perguruan Tinggi'],
            datasets: [{
                label: 'Jumlah Penduduk',
                data: [6, 37, 16, 15, 17],
                backgroundColor: '#15803d',
                borderRadius: 8,
                maxBarThickness: 45
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y',
            plugins: { legend: { display: false } },
            scales: {
                x: { beginAtZero: true, grid: { color: '#f0fdf4' } },
                y: { grid: { display: false } }
            }
        }
    });

    // ---- PEKERJAAN (BAR) ----
    new Chart(document.getElementById('chartPekerjaan'), {
        type: 'bar',
        data: {
            labels: ['PNS/Guru', 'Pegawai', 'Karyawan', 'Tukang', 'Pendeta/Pastor', 'Tani', 'Nelayan', 'Sopir', 'Pensiunan'],
            datasets: [{
                label: 'Jumlah Penduduk',
                data: [7, 5, 64, 10, 4, 48, 2, 5, 9],
                backgroundColor: '#16a34a',
                borderRadius: 8,
                maxBarThickness: 40
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: '#f0fdf4' } },
                x: { grid: { display: false }, ticks: { autoSkip: false, maxRotation: 25, minRotation: 0 } }
            }
        }
    });

    // ---- KEPEMILIKAN DOKUMEN: KTP & KK (BAR) ----
    new Chart(document.getElementById('chartDokumen'), {
        type: 'bar',
        data: {
            labels: ['KTP', 'Kartu Keluarga'],
            datasets: [
                {
                    label: 'Wajib',
                    data: [307, 140],
                    backgroundColor: '#166534',
                    borderRadius: 10,
                    maxBarThickness: 60
                },
                {
                    label: 'Memiliki',
                    data: [305, 138],
                    backgroundColor: '#ffc107',
                    borderRadius: 10,
                    maxBarThickness: 60
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } },
            scales: {
                y: { beginAtZero: true, grid: { color: '#f0fdf4' } },
                x: { grid: { display: false } }
            }
        }
    });

    // ---- PERKAWINAN (PIE) ----
    new Chart(document.getElementById('chartPerkawinan'), {
        type: 'doughnut',
        data: {
            labels: ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'],
            datasets: [{
                data: [600, 780, 60, 60],
                backgroundColor: ['#4ade80', '#166534', '#ffc107', '#0ea5e9'],
                borderWidth: 2,
                borderColor: '#ffffff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

    // ---- AGAMA (PIE) ----
    new Chart(document.getElementById('chartAgama'), {
        type: 'doughnut',
        data: {
            labels: ['Islam', 'Kristen Protestan', 'Katolik', 'Hindu', 'Buddha'],
            datasets: [{
                data: [7, 356, 34, 0, 0],
                backgroundColor: ['#166534', '#16a34a', '#4ade80', '#a3e635', '#ffc107'],
                borderWidth: 2,
                borderColor: '#ffffff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
</script>

</body>
</html>