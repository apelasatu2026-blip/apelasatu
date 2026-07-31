<!-- resources/views/profile.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Profil Kelurahan Apela I</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

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

    /* ================= SCROLL ANIMATIONS ================= */

    .fade-up{
        opacity:0;
        transform:translateY(28px);
        transition:opacity .7s ease, transform .7s ease;
    }
    .fade-up.show{ opacity:1; transform:translateY(0); }

    .fade-left{
        opacity:0;
        transform:translateX(-40px);
        transition:opacity .7s ease, transform .7s ease;
    }
    .fade-left.show{ opacity:1; transform:translateX(0); }

    .fade-right{
        opacity:0;
        transform:translateX(40px);
        transition:opacity .7s ease, transform .7s ease;
    }
    .fade-right.show{ opacity:1; transform:translateX(0); }

    .fade-scale{
        opacity:0;
        transform:scale(.9);
        transition:opacity .6s ease, transform .6s ease;
    }
    .fade-scale.show{ opacity:1; transform:scale(1); }

    /* stagger helper delays */
    .delay-1{ transition-delay:.1s; }
    .delay-2{ transition-delay:.2s; }
    .delay-3{ transition-delay:.3s; }
    .delay-4{ transition-delay:.4s; }
    .delay-5{ transition-delay:.5s; }

    /* ================= HERO ================= */

    .hero-pattern{
        background-image:
            radial-gradient(circle at 15% 25%, rgba(255,193,7,.10) 0, transparent 45%),
            radial-gradient(circle at 85% 75%, rgba(255,255,255,.08) 0, transparent 45%);
    }

    .hero-badge{ backdrop-filter:blur(6px); }

    /* ================= CARD HOVER ================= */

    .lift-card{ transition:.35s ease; }
    .lift-card:hover{
        transform:translateY(-8px);
        box-shadow:0 20px 40px -12px rgba(20,83,45,.25);
    }

    .icon-wrap{
        width:64px;
        height:64px;
        border-radius:16px;
        display:flex;
        align-items:center;
        justify-content:center;
        transition:.35s;
    }

    .lift-card:hover .icon-wrap{
        transform:rotate(-6deg) scale(1.08);
    }

    /* ================= STATS COUNTER ================= */

    .stat-num{ font-variant-numeric:tabular-nums; }

    /* ================= SEJARAH TIMELINE ================= */

    .timeline-wrap{ position:relative; }

    .timeline-line{
        position:absolute;
        top:0;
        bottom:0;
        left:24px;
        width:3px;
        background:linear-gradient(180deg, #16a34a, #ffc107);
        border-radius:999px;
    }

    @media(min-width:768px){
        .timeline-line{ left:50%; transform:translateX(-50%); }
    }

    .timeline-dot{
        width:18px;
        height:18px;
        border-radius:999px;
        background:#ffc107;
        border:4px solid #14532d;
        box-shadow:0 0 0 4px rgba(255,193,7,.25);
        flex-shrink:0;
        z-index:2;
        transition:.4s;
    }

    .timeline-item.show .timeline-dot{
        box-shadow:0 0 0 8px rgba(255,193,7,.35);
    }

    .timeline-card{
        transition:.35s ease;
    }

    .timeline-card:hover{
        transform:translateY(-4px);
        box-shadow:0 18px 35px -10px rgba(20,83,45,.25);
    }

    /* ================= AVATAR ================= */

    .avatar-circle{
        width:96px;
        height:96px;
        border-radius:999px;
        background:#dcfce7;
        display:flex;
        align-items:center;
        justify-content:center;
        margin:0 auto 16px auto;
        border:3px solid #16a34a;
        overflow:hidden;
        flex-shrink:0;
        transition:.35s;
    }

    .avatar-circle img{
        width:100%;
        height:100%;
        object-fit:cover;
    }

    .avatar-circle.sm{ width:76px; height:76px; }

    .struktur-card:hover .avatar-circle,
    .avatar-wrap:hover .avatar-circle{
        transform:scale(1.06);
        border-color:#ffc107;
    }

    /* ================= INDEX BAR (reused style) ================= */

    .index-bar{
        height:8px;
        border-radius:999px;
        background:#dcfce7;
        overflow:hidden;
    }
    .index-bar-fill{
        height:100%;
        border-radius:999px;
        background:linear-gradient(90deg,#16a34a,#ffc107);
        width:0;
        transition:width 1.2s ease;
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

    <div>
        <p class="text-lg font-bold leading-none">Kelurahan Apela I</p>
        <p class="text-xs text-gray-200">Kota Bitung</p>
    </div>
</a>

<button id="menuBtn" class="lg:hidden text-3xl">
    <i class="bi bi-list"></i>
</button>

<ul id="menu" class="hidden lg:flex gap-8 font-semibold items-center">
    <li><a href="/" class="nav-underline hover:text-gold transition">Home</a></li>
    <li><a href="/profile" class="nav-underline text-gold">Profile</a></li>
    <li><a href="/infografis" class="nav-underline hover:text-gold transition">Infografis</a></li>
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
    <a href="/profile" class="text-gold">Profile</a>
    <a href="/infografis" class="hover:text-gold transition">Infografis</a>
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
        HERO (BACKGROUND kelurahan.jpeg DITAMBAHKAN DI SINI)
=======================-->

<section class="relative bg-cover bg-center text-white py-20 md:py-28 overflow-hidden hero-pattern" style="background-image: linear-gradient(rgba(20, 83, 45, 0.88), rgba(20, 83, 45, 0.88)), url('{{ asset('assets/kelurahan.jpeg') }}');">

    <div class="max-w-7xl mx-auto px-6 md:px-10 text-center relative z-10">

        <span class="hero-badge inline-flex items-center gap-2 bg-white/15 border border-white/25 text-xs md:text-sm font-semibold tracking-widest uppercase px-4 py-2 rounded-full mb-5">
            <i class="bi bi-file-earmark-person-fill text-gold"></i>
            Sistem Informasi Kelurahan
        </span>

        <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold">
            Profil Kelurahan Apela I
        </h1>

        <p class="mt-5 text-gray-200 max-w-2xl mx-auto text-sm md:text-lg flex items-center justify-center gap-2 flex-wrap">
            <i class="bi bi-geo-alt-fill text-gold"></i>
            Kecamatan Ranowulu &bull; Kota Bitung &bull; Sulawesi Utara
        </p>

    </div>

</section>




<!--======================
      TENTANG KELURAHAN
=======================-->

<section class="max-w-7xl mx-auto px-6 md:px-10 py-16 md:py-24">

    <p class="text-center text-forest-700 font-bold tracking-widest uppercase text-xs md:text-sm mb-2 fade-up">Profil Wilayah</p>
    <h2 class="text-center text-3xl md:text-5xl font-bold text-forest-900 mb-3 fade-up">Tentang Kelurahan</h2>
    <div class="w-16 md:w-20 h-1.5 bg-gold rounded-full mx-auto mb-10 md:mb-14 fade-up"></div>

    <div class="bg-white rounded-2xl md:rounded-3xl border-l-4 border-forest-600 shadow-sm p-6 md:p-10 fade-up">
        <p class="text-gray-600 leading-loose text-sm md:text-lg text-justify md:text-left">
            Kelurahan Apela I merupakan salah satu kelurahan yang berada
            di Kecamatan Ranowulu, Kota Bitung, Provinsi Sulawesi Utara.
            Kelurahan ini memiliki potensi sumber daya alam, budaya,
            serta masyarakat yang aktif dalam pembangunan daerah.
            Melalui Sistem Informasi Kelurahan, masyarakat dapat memperoleh
            berbagai informasi mengenai profil wilayah, pelayanan publik,
            dan data statistik kelurahan.
        </p>
    </div>

</section>




<!--======================
      SEJARAH KELURAHAN
=======================-->

<section class="bg-forest-50 py-16 md:py-24">

    <div class="max-w-5xl mx-auto px-6 md:px-10">

        <p class="text-center text-forest-700 font-bold tracking-widest uppercase text-xs md:text-sm mb-2 fade-up">Asal Usul</p>
        <h2 class="text-center text-3xl md:text-5xl font-bold text-forest-900 mb-3 fade-up">Sejarah Kelurahan Apela I</h2>
        <div class="w-16 md:w-20 h-1.5 bg-gold rounded-full mx-auto mb-4 fade-up"></div>
        <p class="text-center text-gray-500 max-w-2xl mx-auto text-sm md:text-base mb-14 md:mb-20 fade-up">
            Catatan sejarah terbentuknya pemukiman yang kelak dikenal sebagai
            Kelurahan Apela I, dirangkum dari arsip catatan sejarah kelurahan.
        </p>

        <div class="timeline-wrap">

            <div class="timeline-line"></div>

            <div class="space-y-10 md:space-y-16">

                <!-- ITEM 1 -->
                <div class="timeline-item fade-left relative flex items-start md:items-center gap-5 md:gap-0">
                    <div class="timeline-dot mt-1.5 md:mt-0 md:absolute md:left-1/2 md:-translate-x-1/2"></div>

                    <div class="md:w-1/2 md:pr-12">
                        <div class="timeline-card bg-white rounded-2xl shadow-md p-6 md:p-7">
                            <span class="inline-block bg-forest-100 text-forest-700 text-xs font-bold tracking-widest uppercase px-3 py-1 rounded-full mb-3">1928</span>
                            <h3 class="text-lg md:text-xl font-bold text-forest-900 mb-2">Migrasi dari Negeri Karegesan</h3>
                            <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                                Pada tahun 1928, penduduk datang dari Negeri Karegesan,
                                wilayah Minawerot, di bawah Timani Tunduan dengan pemimpin
                                <b>Theodorus Pangau</b>, lalu membangun pemukiman baru.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- ITEM 2 -->
                <div class="timeline-item fade-right relative flex items-start md:items-center gap-5 md:gap-0 md:flex-row-reverse">
                    <div class="timeline-dot mt-1.5 md:mt-0 md:absolute md:left-1/2 md:-translate-x-1/2"></div>

                    <div class="md:w-1/2 md:pl-12 md:ml-auto">
                        <div class="timeline-card bg-white rounded-2xl shadow-md p-6 md:p-7">
                            <span class="inline-block bg-forest-100 text-forest-700 text-xs font-bold tracking-widest uppercase px-3 py-1 rounded-full mb-3">1928</span>
                            <h3 class="text-lg md:text-xl font-bold text-forest-900 mb-2">Migrasi dari Negeri Ka'asar</h3>
                            <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                                Pada tahun yang sama, penduduk dari Negeri Ka'asar,
                                wilayah Minawerot, juga datang di bawah Timani Tunduan
                                dengan pemimpin <b>Robert Wantah</b>, lalu turut membangun
                                pemukiman baru di wilayah tersebut.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- ITEM 3 -->
                <div class="timeline-item fade-left relative flex items-start md:items-center gap-5 md:gap-0">
                    <div class="timeline-dot mt-1.5 md:mt-0 md:absolute md:left-1/2 md:-translate-x-1/2"></div>

                    <div class="md:w-1/2 md:pr-12">
                        <div class="timeline-card bg-white rounded-2xl shadow-md p-6 md:p-7">
                            <span class="inline-block bg-amber-100 text-amber-700 text-xs font-bold tracking-widest uppercase px-3 py-1 rounded-full mb-3">Para Pemimpin</span>
                            <h3 class="text-lg md:text-xl font-bold text-forest-900 mb-3">Tiga Pemimpin Tunduan</h3>
                            <ul class="space-y-2 text-gray-600 text-sm md:text-base">
                                <li class="flex items-start gap-2">
                                    <i class="bi bi-person-badge-fill text-forest-600 mt-1"></i>
                                    <span><b>Welem Koloay</b> — Pemimpin Tunduan Negeri Kaima</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="bi bi-person-badge-fill text-forest-600 mt-1"></i>
                                    <span><b>Theodorus Pangau</b> — Pemimpin Tunduan Negeri Karegesan</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="bi bi-person-badge-fill text-forest-600 mt-1"></i>
                                    <span><b>Robert Wantah</b> — Pemimpin Tunduan Negeri Ka'asar</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- ITEM 4 -->
                <div class="timeline-item fade-right relative flex items-start md:items-center gap-5 md:gap-0 md:flex-row-reverse">
                    <div class="timeline-dot mt-1.5 md:mt-0 md:absolute md:left-1/2 md:-translate-x-1/2"></div>

                    <div class="md:w-1/2 md:pl-12 md:ml-auto">
                        <div class="timeline-card bg-gradient-to-br from-forest-800 to-forest-700 text-white rounded-2xl shadow-md p-6 md:p-7">
                            <span class="inline-block bg-gold text-forest-900 text-xs font-bold tracking-widest uppercase px-3 py-1 rounded-full mb-3">1929</span>
                            <h3 class="text-lg md:text-xl font-bold mb-2">Musyawarah Penamaan "Apela"</h3>
                            <p class="text-gray-200 text-sm md:text-base leading-relaxed">
                                Pada tahun 1929, ketiga pemimpin kelompok tersebut
                                bermusyawarah untuk memberi nama pemukiman baru.
                                Hasil musyawarah menetapkan nama
                                <b class="text-gold">"APELA"</b>, yang berarti
                                <i>Tanah Subur, Tanah Merah</i>, menjadi cikal bakal
                                nama Kelurahan Apela I hingga saat ini.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <p class="text-xs text-amber-700 bg-amber-50 border border-amber-200 rounded-xl px-4 py-3 mt-10 md:mt-14 flex items-start gap-2 fade-up">
            <i class="bi bi-info-circle-fill mt-0.5"></i>
            <span>
                Catatan sejarah di atas dirangkum dari arsip tulisan tangan kelurahan.
                Sebagian teks pada dokumen asli sulit terbaca akibat kondisi arsip —
                silahkan lengkapi atau koreksi bersama pihak kelurahan bila ditemukan
                ketidaksesuaian dengan catatan resmi.
            </span>
        </p>

    </div>

</section>




<!--======================
      STATISTIK SINGKAT
=======================-->

<section class="max-w-7xl mx-auto px-6 md:px-10 py-16 md:py-24">

    <div class="bg-gradient-to-br from-forest-800 to-forest-600 rounded-3xl p-8 md:p-14 text-white fade-scale">

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-10 text-center">

            <div>
                <h3 class="stat-num text-3xl md:text-5xl font-extrabold text-gold" data-count="400">0</h3>
                <p class="mt-2 text-xs md:text-sm tracking-wide text-gray-200">JUMLAH PENDUDUK</p>
            </div>

            <div>
                <h3 class="stat-num text-3xl md:text-5xl font-extrabold text-gold" data-count="95" data-suffix="%">0%</h3>
                <p class="mt-2 text-xs md:text-sm tracking-wide text-gray-200">PELAYANAN PUBLIK</p>
            </div>

            <div>
                <h3 class="stat-num text-3xl md:text-5xl font-extrabold text-gold" data-count="2">0</h3>
                <p class="mt-2 text-xs md:text-sm tracking-wide text-gray-200">LINGKUNGAN</p>
            </div>

            <div>
                <h3 class="stat-num text-3xl md:text-5xl font-extrabold text-gold" data-count="10" data-suffix="+">0+</h3>
                <p class="mt-2 text-xs md:text-sm tracking-wide text-gray-200">PROGRAM UMKM</p>
            </div>

        </div>

    </div>

</section>




<!--======================
        VISI MISI
=======================-->

<section class="max-w-7xl mx-auto px-6 md:px-10 pb-16 md:pb-24">

    <p class="text-center text-forest-700 font-bold tracking-widest uppercase text-xs md:text-sm mb-2 fade-up">Arah Pembangunan</p>
    <h2 class="text-center text-3xl md:text-5xl font-bold text-forest-900 mb-3 fade-up">Visi &amp; Misi</h2>
    <div class="w-16 md:w-20 h-1.5 bg-gold rounded-full mx-auto mb-10 md:mb-14 fade-up"></div>

    <div class="grid md:grid-cols-2 gap-6 md:gap-8">

        <div class="lift-card fade-left bg-white rounded-2xl md:rounded-3xl shadow-sm p-6 md:p-10">
            <div class="icon-wrap bg-forest-100 text-forest-700 text-2xl mb-5">
                <i class="bi bi-eye-fill"></i>
            </div>
            <h3 class="text-xl md:text-2xl font-bold text-forest-900">Visi</h3>
            <p class="italic text-gray-600 border-l-2 border-gold pl-4 mt-4 text-sm md:text-base leading-relaxed">
                "Terwujudnya Bitung yang Maju, Modern, dan Sejahtera melalui
                Pembangunan yang Berkelanjutan"
            </p>
        </div>

        <div class="lift-card fade-right bg-white rounded-2xl md:rounded-3xl shadow-sm p-6 md:p-10">
            <div class="icon-wrap bg-amber-100 text-amber-600 text-2xl mb-5">
                <i class="bi bi-bullseye"></i>
            </div>
            <h3 class="text-xl md:text-2xl font-bold text-forest-900">Misi</h3>
            <ul class="mt-4 space-y-2 text-gray-600 text-sm md:text-base leading-relaxed">
                <li class="flex items-start gap-2">
                    <i class="bi bi-check-circle-fill text-forest-600 mt-1"></i>
                    <span>Meningkatkan kualitas SDM yang berdaya saing, mengelola sumber
                        daya alam secara berkelanjutan untuk kesejahteraan, membangun
                        infrastruktur dan tata ruang yang terkoneksi, serta mewujudkan
                        tata kelola pemerintahan yang profesional dan transparan.</span>
                </li>
            </ul>
        </div>

    </div>

</section>




<!--======================
    INFORMASI KELURAHAN
=======================-->

<section class="bg-white py-16 md:py-24">

    <div class="max-w-7xl mx-auto px-6 md:px-10">

        <p class="text-center text-forest-700 font-bold tracking-widest uppercase text-xs md:text-sm mb-2 fade-up">Seputar Wilayah</p>
        <h2 class="text-center text-3xl md:text-5xl font-bold text-forest-900 mb-3 fade-up">Informasi Kelurahan</h2>
        <div class="w-16 md:w-20 h-1.5 bg-gold rounded-full mx-auto mb-10 md:mb-14 fade-up"></div>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">

            <div class="lift-card fade-up bg-forest-50 rounded-2xl p-6 md:p-8 text-center">
                <div class="icon-wrap bg-forest-100 text-forest-700 text-2xl mx-auto mb-5">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <h4 class="font-bold text-forest-900 text-lg mb-2">Wilayah</h4>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                    Kecamatan Ranowulu<br>
                    Kota Bitung<br>
                    Sulawesi Utara
                </p>
            </div>

            <div class="lift-card fade-up delay-1 bg-forest-50 rounded-2xl p-6 md:p-8 text-center">
                <div class="icon-wrap bg-forest-100 text-forest-700 text-2xl mx-auto mb-5">
                    <i class="bi bi-people-fill"></i>
                </div>
                <h4 class="font-bold text-forest-900 text-lg mb-2">Masyarakat</h4>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                    Informasi jumlah penduduk dapat disesuaikan
                    dengan data terbaru dari Kelurahan Apela I.
                </p>
            </div>

            <div class="lift-card fade-up delay-2 bg-forest-50 rounded-2xl p-6 md:p-8 text-center sm:col-span-2 md:col-span-1">
                <div class="icon-wrap bg-forest-100 text-forest-700 text-2xl mx-auto mb-5">
                    <i class="bi bi-building-fill"></i>
                </div>
                <h4 class="font-bold text-forest-900 text-lg mb-2">Pelayanan</h4>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                    Melayani administrasi kependudukan,
                    surat menyurat, dan pelayanan publik lainnya.
                </p>
            </div>

        </div>

    </div>

</section>




<!--======================
   STRUKTUR ORGANISASI
=======================-->

<section class="max-w-7xl mx-auto px-6 md:px-10 py-16 md:py-24">

    <p class="text-center text-forest-700 font-bold tracking-widest uppercase text-xs md:text-sm mb-2 fade-up">Susunan Pemerintahan</p>
    <h2 class="text-center text-3xl md:text-5xl font-bold text-forest-900 mb-3 fade-up">Struktur Organisasi</h2>
    <div class="w-16 md:w-20 h-1.5 bg-gold rounded-full mx-auto mb-10 md:mb-14 fade-up"></div>

    <div class="fade-scale bg-gradient-to-b from-white to-forest-50 rounded-2xl md:rounded-3xl shadow-sm p-6 md:p-14 text-center">

        <div class="avatar-wrap">
            <div class="avatar-circle">
                <img src="{{ asset('assets/paklurah.jpeg') }}" alt="Lurah Kelurahan Apela I">
            </div>
        </div>

        <h4 class="font-bold text-forest-900 text-lg md:text-xl">Lurah Kelurahan Apela I</h4>
        <p class="text-gray-500 text-sm md:text-base mt-1">HERLING GAHIWU, S.Sos</p>
        <p class="text-gray-500 text-xs md:text-sm">NIP. 19770627 200501 1 044</p>

        <hr class="my-8 md:my-10 border-forest-100">

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 md:gap-6">

            <div class="fade-up avatar-wrap">
                <div class="avatar-circle sm">
                    <img src="{{ asset('assets/raini.jpeg') }}" alt="Sekretaris">
                </div>
                <h5 class="font-semibold text-forest-800 text-sm md:text-base">Sekretaris</h5>
                <p class="text-gray-500 text-xs md:text-sm mt-1">Rayningsih Mantiri</p>
                <p class="text-gray-400 text-[11px]">NIP. 19920602 20521 2 148</p>
                <p class="text-gray-400 text-[11px]">Staf P3K PW</p>
            </div>

            <div class="fade-up delay-1 avatar-wrap">
                <div class="avatar-circle sm">
                    <img src="{{ asset('assets/meiny.jpeg') }}" alt="Kasie Ekos dan Kemasyarakatan">
                </div>
                <h5 class="font-semibold text-forest-800 text-sm md:text-base">Kasie Ekos &amp; Kemasyarakatan</h5>
                <p class="text-gray-500 text-xs md:text-sm mt-1">Meyni Karundeng</p>
                <p class="text-gray-400 text-[11px]">NIP. 19710524 199303 2 003</p>
            </div>

            <div class="fade-up delay-2 avatar-wrap">
                <div class="avatar-circle sm">
                    <img src="{{ asset('assets/marke.jpeg') }}" alt="Kasie Pemerintahan">
                </div>
                <h5 class="font-semibold text-forest-800 text-sm md:text-base">Kasie Pemerintahan</h5>
                <p class="text-gray-500 text-xs md:text-sm mt-1">Marke Sumalang</p>
                <p class="text-gray-400 text-[11px]">NIP. 19690907 199302 2 006</p>
            </div>

            <div class="fade-up delay-3 avatar-wrap">
                <div class="avatar-circle sm">
                    <img src="{{ asset('assets/esterlita.jpeg') }}" alt="Kasie Pemerintahan Staf P3K PW">
                </div>
                <h5 class="font-semibold text-forest-800 text-sm md:text-base">Kasie Pemerintahan</h5>
                <p class="text-gray-500 text-xs md:text-sm mt-1">Esterlita Tangkuna</p>
                <p class="text-gray-400 text-[11px]">NIP. 1994 107 202521 2 089</p>
                <p class="text-gray-400 text-[11px]">Staf P3K PW</p>
            </div>

            <div class="fade-up delay-4 avatar-wrap col-span-2 md:col-span-1">
                <div class="avatar-circle sm">
                    <img src="{{ asset('assets/julianto.jpeg') }}" alt="Kasie Pembangunan Staf P3K PW">
                </div>
                <h5 class="font-semibold text-forest-800 text-sm md:text-base">Kasie Pembangunan</h5>
                <p class="text-gray-500 text-xs md:text-sm mt-1">Julianto G. Kamarudin</p>
                <p class="text-gray-400 text-[11px]">NIP. 19950707 202511 1 115</p>
                <p class="text-gray-400 text-[11px]">Staf P3K PW</p>
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

    // ==== SCROLL OBSERVER ====
    const observerOptions = { threshold: 0.1 };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.fade-up, .fade-left, .fade-right, .fade-scale, .timeline-item').forEach(el => observer.observe(el));
</script>

</body>
</html>