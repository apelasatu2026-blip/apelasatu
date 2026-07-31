<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Kelurahan Apela I</title>

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
    body{ font-family:'Poppins', sans-serif; overflow-x:hidden; }

    /* ============ SCROLL PROGRESS BAR ============ */
    #scrollProgress{
        position:fixed;
        top:0; left:0;
        height:3px;
        width:0%;
        background:linear-gradient(90deg,#ffc107,#16a34a);
        z-index:70;
        transition:width .1s ease-out;
    }

    /* ============ NAVBAR ============ */
    nav{
        transition:padding .35s ease, box-shadow .35s ease, background-color .35s ease;
    }
    nav.scrolled{
        box-shadow:0 10px 30px -10px rgba(0,0,0,.45);
    }
    nav.scrolled .nav-inner{
        padding-top:.75rem;
        padding-bottom:.75rem;
    }
    .nav-inner{
        transition:padding .35s ease;
    }

    .nav-underline{ position:relative; }
    .nav-underline::after{
        content:"";
        position:absolute;
        left:0;
        bottom:-4px;
        width:0;
        height:2px;
        border-radius:2px;
        background:#ffc107;
        transition:width .35s cubic-bezier(.65,0,.35,1);
    }
    .nav-underline:hover::after,
    .nav-underline.active::after{ width:100%; }

    #menuBtn i{ transition:transform .3s ease; }
    #menuBtn.open i{ transform:rotate(90deg); }

    #mobileMenu{
        max-height:0;
        overflow:hidden;
        opacity:0;
        transition:max-height .4s cubic-bezier(.65,0,.35,1), opacity .3s ease, padding .4s ease;
    }
    #mobileMenu.open{
        max-height:400px;
        opacity:1;
    }

    /* ============ GENERIC REVEAL ============ */
    .fade-up{
        opacity:0;
        transform:translateY(36px) scale(.98);
        filter:blur(4px);
        transition:opacity .8s cubic-bezier(.16,1,.3,1),
                   transform .8s cubic-bezier(.16,1,.3,1),
                   filter .8s cubic-bezier(.16,1,.3,1);
    }
    .fade-up.show{
        opacity:1;
        transform:translateY(0) scale(1);
        filter:blur(0);
    }

    .stagger-child{
        opacity:0;
        transform:translateY(28px);
        transition:opacity .7s cubic-bezier(.16,1,.3,1), transform .7s cubic-bezier(.16,1,.3,1);
    }
    .stagger-child.show{
        opacity:1;
        transform:translateY(0);
    }

    /* ============ HERO ============ */
    .hero-bg{
        transform:scale(1.08);
        animation:heroZoom 16s ease-in-out infinite alternate;
    }
    @keyframes heroZoom{
        0%{ transform:scale(1.08) translateY(0); }
        100%{ transform:scale(1.16) translateY(-1.5%); }
    }

    .hero-blob{
        position:absolute;
        border-radius:50%;
        filter:blur(60px);
        opacity:.35;
        pointer-events:none;
        animation:blobFloat 9s ease-in-out infinite;
    }
    .hero-blob.b1{
        width:280px; height:280px;
        background:#ffc107;
        top:8%; left:-4%;
        animation-delay:0s;
    }
    .hero-blob.b2{
        width:340px; height:340px;
        background:#16a34a;
        bottom:-6%; right:6%;
        animation-delay:2.5s;
    }
    @keyframes blobFloat{
        0%,100%{ transform:translate(0,0) scale(1); }
        50%{ transform:translate(20px,-25px) scale(1.12); }
    }

    .hero-badge{
        backdrop-filter:blur(6px);
        opacity:0;
        transform:translateY(-16px);
        animation:heroIn .7s cubic-bezier(.16,1,.3,1) forwards;
        animation-delay:.15s;
    }
    .hero-title{
        opacity:0;
        transform:translateY(28px);
        animation:heroIn .8s cubic-bezier(.16,1,.3,1) forwards;
        animation-delay:.35s;
    }
    .hero-sub{
        opacity:0;
        transform:translateY(24px);
        animation:heroIn .8s cubic-bezier(.16,1,.3,1) forwards;
        animation-delay:.55s;
    }
    .hero-desc{
        opacity:0;
        transform:translateY(20px);
        animation:heroIn .8s cubic-bezier(.16,1,.3,1) forwards;
        animation-delay:.75s;
    }
    .hero-cta{
        opacity:0;
        transform:translateY(20px);
        animation:heroIn .8s cubic-bezier(.16,1,.3,1) forwards;
        animation-delay:.95s;
    }
    @keyframes heroIn{
        to{ opacity:1; transform:translate(0,0); }
    }

    .btn-shine{
        position:relative;
        overflow:hidden;
    }
    .btn-shine::before{
        content:"";
        position:absolute;
        top:0; left:-75%;
        width:50%; height:100%;
        background:linear-gradient(120deg, transparent, rgba(255,255,255,.55), transparent);
        transform:skewX(-20deg);
        transition:left .6s ease;
    }
    .btn-shine:hover::before{ left:125%; }

    .scroll-cue{
        position:absolute;
        bottom:28px;
        left:50%;
        transform:translateX(-50%);
        color:#fff;
        opacity:.8;
        animation:bounceCue 2s ease-in-out infinite;
    }
    @keyframes bounceCue{
        0%,100%{ transform:translate(-50%,0); opacity:.5; }
        50%{ transform:translate(-50%,10px); opacity:1; }
    }

    /* ============ STAT CARDS ============ */
    .stat-card{
        transition:transform .35s cubic-bezier(.34,1.56,.64,1), box-shadow .35s ease, border-color .35s ease;
    }
    .stat-card:hover{
        transform:translateY(-6px) scale(1.02);
        box-shadow:0 20px 35px -14px rgba(22,163,74,.35);
        border-color:#16a34a55;
    }

    /* ============ POTENSI CARDS ============ */
    .potensi-card{
        transition:transform .4s cubic-bezier(.34,1.56,.64,1), box-shadow .4s ease;
        will-change:transform;
    }
    .potensi-card:hover{
        transform:translateY(-10px);
        box-shadow:0 24px 45px -14px rgba(0,0,0,.4);
    }
    .potensi-card .icon-wrap{
        transition:transform .5s cubic-bezier(.34,1.56,.64,1), background-color .35s ease, color .35s ease;
    }
    .potensi-card:hover .icon-wrap{
        transform:rotate(-8deg) scale(1.12);
    }
    .potensi-card:hover .icon-wrap i{
        animation:iconPulse .6s ease;
    }
    @keyframes iconPulse{
        0%,100%{ transform:scale(1); }
        50%{ transform:scale(1.25); }
    }

    /* ============ INDEX BARS ============ */
    .index-bar{
        height:8px;
        border-radius:999px;
        background:#dcfce7;
        overflow:hidden;
        position:relative;
    }
    .index-bar-fill{
        height:100%;
        border-radius:999px;
        background:linear-gradient(90deg,#16a34a,#ffc107);
        width:0;
        position:relative;
        transition:width 1.4s cubic-bezier(.16,1,.3,1);
    }
    .index-bar-fill::after{
        content:"";
        position:absolute;
        inset:0;
        background:linear-gradient(110deg, transparent 30%, rgba(255,255,255,.55) 50%, transparent 70%);
        background-size:200% 100%;
        animation:shimmer 2.2s linear infinite;
        animation-play-state:paused;
    }
    .index-bar-fill.animated::after{ animation-play-state:running; }
    @keyframes shimmer{
        0%{ background-position:200% 0; }
        100%{ background-position:-200% 0; }
    }

    /* ============ COUNTER ============ */
    .counter{ font-variant-numeric:tabular-nums; }

    /* ============ BACK TO TOP ============ */
    #backToTop{
        position:fixed;
        bottom:28px;
        right:28px;
        width:48px;
        height:48px;
        border-radius:9999px;
        background:#16a34a;
        color:#fff;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:1.25rem;
        box-shadow:0 10px 25px -6px rgba(0,0,0,.4);
        opacity:0;
        transform:translateY(16px) scale(.8);
        pointer-events:none;
        transition:opacity .35s ease, transform .35s cubic-bezier(.34,1.56,.64,1), background-color .3s ease;
        z-index:60;
    }
    #backToTop.show{
        opacity:1;
        transform:translateY(0) scale(1);
        pointer-events:auto;
    }
    #backToTop:hover{
        background:#ffc107;
        color:#14532d;
    }

    /* ============ FOOTER LOGO ============ */
    footer img{
        transition:transform .5s ease;
    }
    footer h1:hover img{
        transform:rotate(8deg) scale(1.08);
    }

    /* ============ REDUCED MOTION ============ */
    @media (prefers-reduced-motion: reduce){
        *,
        *::before,
        *::after{
            animation-duration:.001ms !important;
            animation-iteration-count:1 !important;
            transition-duration:.001ms !important;
        }
        .hero-bg{ animation:none; transform:scale(1); }
        .fade-up, .stagger-child, .hero-badge, .hero-title, .hero-sub, .hero-desc, .hero-cta{
            opacity:1 !important; transform:none !important; filter:none !important;
        }
    }
</style>

</head>


<body class="bg-gray-50">

<div id="scrollProgress"></div>

<!--======================
        NAVBAR
=======================-->

<nav id="mainNav" class="bg-forest-800/95 backdrop-blur text-white shadow-lg sticky top-0 z-50">

<div class="nav-inner max-w-7xl mx-auto flex justify-between items-center p-5">

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

<ul id="menu" class="hidden lg:flex gap-8 font-semibold">
    <li><a href="/" class="nav-underline active text-gold">Home</a></li>
    <li><a href="/profile" class="nav-underline hover:text-gold transition">Profile</a></li>
    <li><a href="/infografis" class="nav-underline hover:text-gold transition">Infografis</a></li>
    <li><a href="/listing" class="nav-underline hover:text-gold transition">Listing</a></li>
</ul>

</div>

<div id="mobileMenu" class="lg:hidden bg-forest-900 px-6 flex flex-col gap-4 font-semibold">
    <a href="/" class="text-gold py-1">Home</a>
    <a href="/profile" class="hover:text-gold transition py-1">Profile</a>
    <a href="/infografis" class="hover:text-gold transition py-1">Infografis</a>
    <a href="/listing" class="hover:text-gold transition py-1">Listing</a>
</div>

</nav>



<!--======================
        HERO SECTION
=======================-->

<section class="relative overflow-hidden">

<img src="{{asset('images/apela.jpg')}}"
class="hero-bg w-full h-[500px] md:h-[640px] object-cover">

<div class="absolute inset-0 bg-gradient-to-t from-forest-900/95 via-forest-900/70 to-forest-900/40 overflow-hidden">

<div class="hero-blob b1"></div>
<div class="hero-blob b2"></div>

<div class="max-w-7xl mx-auto h-full flex items-center px-6 md:px-10">

<div class="text-white max-w-2xl">

<span class="hero-badge inline-flex items-center gap-2 bg-white/15 border border-white/25 text-xs md:text-sm font-semibold tracking-widest uppercase px-4 py-2 rounded-full mb-6">
    <i class="bi bi-geo-alt-fill text-gold"></i>
    Kec. Ranowulu, Kota Bitung
</span>

<h1 class="hero-title text-4xl md:text-6xl lg:text-7xl font-extrabold leading-tight">
    SELAMAT DATANG
</h1>

<h2 class="hero-sub text-xl md:text-3xl lg:text-4xl mt-3 font-light text-gray-100">
    Website Resmi Kelurahan Apela I
</h2>

<p class="hero-desc mt-6 text-base md:text-lg leading-relaxed text-gray-200">
    Kelurahan Apela I, Kecamatan Ranowulu,
    Kota Bitung, Sulawesi Utara — melayani
    dengan transparan, membangun bersama masyarakat.
</p>

<div class="hero-cta mt-8 flex flex-col sm:flex-row gap-4">

    <a href="/profile"
    class="btn-shine bg-gold text-forest-900 px-8 py-4 rounded-xl font-bold text-center hover:bg-white transition shadow-lg hover:-translate-y-1 hover:shadow-2xl">
        Lihat Profil
    </a>

    <a href="/listing"
    class="btn-shine border border-white/40 text-white px-8 py-4 rounded-xl font-bold text-center hover:bg-white/10 transition hover:-translate-y-1">
        Jelajahi Peta Wilayah
    </a>

</div>

</div>

</div>

<i class="bi bi-chevron-compact-down scroll-cue text-3xl"></i>

</div>

</section>




<!--======================
      TENTANG KELURAHAN
=======================-->

<section class="max-w-7xl mx-auto py-16 md:py-24 px-6 md:px-10 fade-up">

<div class="grid md:grid-cols-2 gap-12 md:gap-16 items-center">

<div>

<span class="text-forest-700 font-bold tracking-widest uppercase text-sm">Profil Wilayah</span>

<h1 class="text-3xl md:text-5xl font-bold mt-3 text-forest-900">
    Tentang Kelurahan Apela I
</h1>

<p class="text-gray-600 mt-6 leading-loose text-base md:text-lg">
    Kelurahan Apela I merupakan salah satu kelurahan yang berada
    di Kecamatan Ranowulu, Kota Bitung, Provinsi Sulawesi Utara.
    Kelurahan ini memiliki berbagai potensi yang dapat dikembangkan
    baik dalam bidang sosial, ekonomi maupun pembangunan berkelanjutan.
</p>

<div class="grid grid-cols-2 gap-6 md:gap-8 mt-10">

<div class="stat-card bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
    <h1 class="text-3xl md:text-4xl font-bold text-forest-700">
        <span class="counter" data-target="400" data-suffix="">0</span>
    </h1>
    <p class="text-gray-500 mt-1 text-sm md:text-base">Jumlah Penduduk</p>
</div>

<div class="stat-card bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
    <h1 class="text-3xl md:text-4xl font-bold text-forest-700">
        <span class="counter" data-target="95" data-suffix="%">0</span>
    </h1>
    <p class="text-gray-500 mt-1 text-sm md:text-base">Pelayanan Publik</p>
</div>

</div>

</div>

<div class="relative">
    <img src="{{asset('images/desa.jpg')}}"
    alt="Kelurahan Apela I"
    class="rounded-3xl shadow-xl w-full h-[320px] md:h-[420px] object-cover transition duration-500 hover:scale-[1.02]">

    <div class="absolute -bottom-6 -left-6 bg-forest-800 text-white rounded-2xl px-6 py-4 shadow-lg hidden sm:block hover:-translate-y-1 transition duration-300">
        <p class="text-xs uppercase tracking-widest text-gold font-semibold">Sulawesi Utara</p>
        <p class="font-bold text-lg">Kota Bitung</p>
    </div>
</div>

</div>

</section>




<!--======================
      POTENSI KELURAHAN
=======================-->

<section class="bg-forest-800 py-16 md:py-24 text-white fade-up">

<div class="max-w-7xl mx-auto px-6 md:px-10 text-center">

<span class="text-gold font-bold tracking-widest uppercase text-sm">Unggulan Kami</span>

<h1 class="text-3xl md:text-5xl font-bold mt-3">
    Potensi Kelurahan Apela I
</h1>

<p class="mt-6 text-gray-200 max-w-2xl mx-auto text-base md:text-lg">
    Potensi wisata, pertanian dan pemberdayaan masyarakat
    yang menjadi kekuatan pembangunan Kelurahan Apela I.
</p>

<div class="stagger-group grid sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-10 mt-14 md:mt-20">

<div class="stagger-child potensi-card bg-white text-black rounded-3xl p-8 text-left">
    <div class="icon-wrap w-14 h-14 rounded-2xl bg-forest-100 text-forest-700 flex items-center justify-center text-2xl mb-5">
        <i class="bi bi-clipboard-check-fill"></i>
    </div>
    <h2 class="text-xl md:text-2xl font-bold">Pelayanan</h2>
    <p class="mt-3 text-gray-600 text-sm md:text-base leading-relaxed">
        Pelayanan administrasi yang cepat, transparan dan
        mudah diakses masyarakat.
    </p>
</div>

<div class="stagger-child potensi-card bg-white text-black rounded-3xl p-8 text-left">
    <div class="icon-wrap w-14 h-14 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center text-2xl mb-5">
        <i class="bi bi-building-fill-add"></i>
    </div>
    <h2 class="text-xl md:text-2xl font-bold">Pembangunan</h2>
    <p class="mt-3 text-gray-600 text-sm md:text-base leading-relaxed">
        Meningkatkan pembangunan kelurahan yang berkelanjutan.
    </p>
</div>

<div class="stagger-child potensi-card bg-white text-black rounded-3xl p-8 text-left sm:col-span-2 md:col-span-1">
    <div class="icon-wrap w-14 h-14 rounded-2xl bg-sky-100 text-sky-600 flex items-center justify-center text-2xl mb-5">
        <i class="bi bi-people-fill"></i>
    </div>
    <h2 class="text-xl md:text-2xl font-bold">Pemberdayaan</h2>
    <p class="mt-3 text-gray-600 text-sm md:text-base leading-relaxed">
        Mendorong pengembangan UMKM dan potensi masyarakat setempat.
    </p>
</div>

</div>

</div>

</section>




<!--======================
   INDEKS DESA MEMBANGUN
=======================-->

<section class="bg-white py-16 md:py-24 fade-up">

<div class="max-w-7xl mx-auto px-6 md:px-10">

<div class="grid md:grid-cols-2 gap-12 items-start">

<div>
    <span class="text-forest-700 font-bold tracking-widest uppercase text-sm">Capaian</span>
    <h1 class="text-3xl md:text-5xl font-bold mt-3 text-forest-900 leading-tight">
        Indeks Desa/Kelurahan Membangun
    </h1>
    <p class="text-gray-600 mt-6 leading-loose text-base md:text-lg">
        Empat pilar utama yang menjadi tolok ukur kemajuan dan
        keberlanjutan pembangunan di Kelurahan Apela I.
    </p>
</div>

<div class="space-y-7">

<div>
    <div class="flex justify-between items-center mb-2">
        <p class="font-semibold text-forest-900 flex items-center gap-2">
            <i class="bi bi-shield-check text-forest-700"></i> Ketahanan Sosial
        </p>
        <span class="text-sm text-gray-500">Baik</span>
    </div>
    <div class="index-bar"><div class="index-bar-fill" data-width="85%" style="transition-delay:0s"></div></div>
</div>

<div>
    <div class="flex justify-between items-center mb-2">
        <p class="font-semibold text-forest-900 flex items-center gap-2">
            <i class="bi bi-graph-up-arrow text-forest-700"></i> Ketahanan Ekonomi
        </p>
        <span class="text-sm text-gray-500">Baik</span>
    </div>
    <div class="index-bar"><div class="index-bar-fill" data-width="78%" style="transition-delay:.12s"></div></div>
</div>

<div>
    <div class="flex justify-between items-center mb-2">
        <p class="font-semibold text-forest-900 flex items-center gap-2">
            <i class="bi bi-tree text-forest-700"></i> Ketahanan Lingkungan
        </p>
        <span class="text-sm text-gray-500">Sangat Baik</span>
    </div>
    <div class="index-bar"><div class="index-bar-fill" data-width="92%" style="transition-delay:.24s"></div></div>
</div>

<div>
    <div class="flex justify-between items-center mb-2">
        <p class="font-semibold text-forest-900 flex items-center gap-2">
            <i class="bi bi-recycle text-forest-700"></i> Pembangunan Berkelanjutan
        </p>
        <span class="text-sm text-gray-500">Baik</span>
    </div>
    <div class="index-bar"><div class="index-bar-fill" data-width="80%" style="transition-delay:.36s"></div></div>
</div>

</div>

</div>

</div>

</section>


<!--======================
          FOOTER
=======================-->

<footer class="bg-forest-900 text-white py-14 md:py-16">

<div class="max-w-7xl mx-auto px-6 md:px-10 text-center fade-up">

<h1 class="text-3xl md:text-4xl font-bold flex items-center justify-center gap-4">
    <img src="{{ asset('assets/logobitung.png') }}"
         alt="Logo Kota Bitung"
         class="w-14 h-14 object-contain">

    <div>
        <p>Kelurahan Apela I</p>
        <p class="text-sm text-gray-300 font-normal">
            Pemerintah Kota Bitung
        </p>
    </div>
</h1>

<p class="mt-5 text-gray-300">
    Kecamatan Ranowulu • Kota Bitung • Sulawesi Utara
</p>

<p class="mt-5 text-gray-400 text-sm">
    © 2026 Sistem Informasi Kelurahan Apela I
</p>

</div>

</footer>

<!-- Tombol kembali ke atas -->
<button id="backToTop" aria-label="Kembali ke atas">
    <i class="bi bi-arrow-up"></i>
</button>


<script>
    // ==== SCROLL PROGRESS BAR ====
    const scrollProgress = document.getElementById('scrollProgress');
    function updateScrollUI(){
        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const pct = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
        scrollProgress.style.width = pct + '%';

        // Navbar shrink
        const nav = document.getElementById('mainNav');
        if (scrollTop > 40) nav.classList.add('scrolled');
        else nav.classList.remove('scrolled');

        // Back to top button
        const backToTop = document.getElementById('backToTop');
        if (scrollTop > 400) backToTop.classList.add('show');
        else backToTop.classList.remove('show');
    }
    window.addEventListener('scroll', updateScrollUI, { passive:true });
    updateScrollUI();

    document.getElementById('backToTop').addEventListener('click', () => {
        window.scrollTo({ top:0, behavior:'smooth' });
    });

    // ==== MOBILE MENU ====
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('open');
        menuBtn.classList.toggle('open');
    });

    // ==== FADE UP ON SCROLL ====
    const faders = document.querySelectorAll('.fade-up');
    const fadeObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
                fadeObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });
    faders.forEach(el => fadeObserver.observe(el));

    // ==== STAGGERED CARD REVEAL ====
    document.querySelectorAll('.stagger-group').forEach(group => {
        const children = group.querySelectorAll('.stagger-child');
        children.forEach((child, i) => {
            child.style.transitionDelay = (i * 0.12) + 's';
        });
    });

    const staggerObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
                staggerObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });
    document.querySelectorAll('.stagger-child').forEach(el => staggerObserver.observe(el));

    // ==== ANIMATE INDEX BARS ====
    const bars = document.querySelectorAll('.index-bar-fill');
    const barObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.width = entry.target.dataset.width;
                entry.target.classList.add('animated');
                setTimeout(() => entry.target.classList.remove('animated'), 2400);
            }
        });
    }, { threshold: 0.3 });
    bars.forEach(bar => barObserver.observe(bar));

    // ==== COUNT-UP STATISTIK ====
    const counters = document.querySelectorAll('.counter');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = parseInt(el.dataset.target, 10);
                const suffix = el.dataset.suffix || '';
                const duration = 1400;
                const startTime = performance.now();

                function tick(now){
                    const progress = Math.min((now - startTime) / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3); // ease-out cubic
                    const value = Math.floor(eased * target);
                    el.textContent = value + suffix;
                    if (progress < 1) requestAnimationFrame(tick);
                    else el.textContent = target + suffix;
                }
                requestAnimationFrame(tick);
                counterObserver.unobserve(el);
            }
        });
    }, { threshold: 0.5 });
    counters.forEach(el => counterObserver.observe(el));
</script>

</body>
</html>