<!-- resources/views/listing.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Listing / Peta - Kelurahan Apela Satu</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<!-- Leaflet (peta open-source, tanpa API key) -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

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

    #map{
        width:100%;
        height:600px;
        border-radius:24px;
        z-index:0;
    }

    .poi-item{
        cursor:pointer;
        transition:.25s;
        border-left:4px solid transparent;
    }

    .poi-item:hover,
    .poi-item.active{
        background:#f0fdf4;
        border-left:4px solid #16a34a;
    }

    .poi-icon{
        width:42px;
        height:42px;
        border-radius:12px;
        display:flex;
        align-items:center;
        justify-content:center;
        flex-shrink:0;
    }

    .filter-btn{
        transition:.25s;
    }

    .filter-btn.active{
        background:#166534;
        color:white;
    }

    /* custom leaflet popup */
    .leaflet-popup-content-wrapper{
        border-radius:14px;
    }

    .leaflet-popup-content{
        font-family:'Poppins', sans-serif;
    }

    .custom-marker{
        background:#166534;
        width:34px;
        height:34px;
        border-radius:50% 50% 50% 0;
        transform:rotate(-45deg);
        display:flex;
        align-items:center;
        justify-content:center;
        box-shadow:0 4px 10px rgba(0,0,0,.3);
        border:2px solid white;
    }

    .custom-marker i{
        transform:rotate(45deg);
        color:white;
        font-size:16px;
    }

    .leaflet-control-layers{
        border-radius:12px !important;
        font-family:'Poppins', sans-serif;
        font-size:13px;
    }

    .map-badge{
        position:absolute;
        top:16px;
        left:16px;
        z-index:400;
        background:rgba(20,83,45,.9);
        color:white;
        font-size:12px;
        font-weight:600;
        padding:6px 14px;
        border-radius:999px;
        letter-spacing:.5px;
    }

    .map-container{
        position:relative;
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
    Kelurahan Apela Satu
</a>

<button id="menuBtn" class="lg:hidden text-3xl">
    <i class="bi bi-list"></i>
</button>

<ul id="menu" class="hidden lg:flex gap-8 font-semibold items-center">
    <li><a href="/" class="nav-underline hover:text-gold transition">Home</a></li>
    <li><a href="/profile" class="nav-underline hover:text-gold transition">Profile</a></li>
    <li><a href="/infografis" class="nav-underline hover:text-gold transition">Infografis</a></li>
    <li><a href="/listing" class="nav-underline text-gold">Listing</a></li>
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
    <a href="/infografis" class="hover:text-gold transition">Infografis</a>
    <a href="/listing" class="text-gold">Listing</a>
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
        HEADER
=======================-->

<section class="relative bg-gradient-to-br from-forest-900 to-forest-700 text-white py-20 overflow-hidden">

    <div class="max-w-7xl mx-auto px-6 md:px-10 text-center relative z-10">

        <span class="inline-block bg-gold text-forest-900 text-xs font-bold tracking-widest uppercase px-4 py-2 rounded-full mb-5">
            Peta Wilayah
        </span>

        <h1 class="text-3xl md:text-5xl font-extrabold">
            PETA KELURAHAN Apela Satu
        </h1>

        <p class="mt-4 text-gray-200 max-w-2xl mx-auto text-base md:text-lg">
            Menampilkan peta Kelurahan Apela Satu dengan
            <em>interest point</em> atau titik-titik penting yang ada
            di Kelurahan Apela Satu.
        </p>

        <p class="mt-3 text-gray-300 max-w-2xl mx-auto text-sm">
            Apela Satu adalah salah satu kelurahan di Kecamatan Ranowulu,
            Kota Bitung, Sulawesi Utara, Indonesia.
        </p>

    </div>

</section>




<!--======================
    PETA + LISTING
=======================-->

<section class="max-w-7xl mx-auto px-6 md:px-10 -mt-12 relative z-20 pb-20">

    <div class="grid lg:grid-cols-3 gap-8">

        <!-- SIDEBAR LISTING -->
        <div class="lg:col-span-1 bg-white rounded-3xl shadow-xl p-6 h-fit">

            <h3 class="text-lg font-bold text-forest-900 mb-1">Titik Penting</h3>
            <p class="text-sm text-gray-500 mb-5">Klik salah satu lokasi untuk melihat di peta</p>

            <!-- FILTER KATEGORI -->
            <div class="flex flex-wrap gap-2 mb-5" id="filterWrap">
                <button class="filter-btn active px-4 py-2 rounded-full text-sm font-semibold bg-forest-100 text-forest-800" data-filter="semua">
                    Semua
                </button>
                <button class="filter-btn px-4 py-2 rounded-full text-sm font-semibold bg-forest-100 text-forest-800" data-filter="ibadah">
                    Ibadah
                </button>
                <button class="filter-btn px-4 py-2 rounded-full text-sm font-semibold bg-forest-100 text-forest-800" data-filter="usaha">
                    Usaha / Toko
                </button>
                <button class="filter-btn px-4 py-2 rounded-full text-sm font-semibold bg-forest-100 text-forest-800" data-filter="wisata">
                    Wisata
                </button>
                <button class="filter-btn px-4 py-2 rounded-full text-sm font-semibold bg-forest-100 text-forest-800" data-filter="pertanian">
                    Pertanian
                </button>
            </div>

            <!-- LIST -->
            <div id="poiList" class="space-y-2 max-h-[420px] overflow-y-auto pr-1">
                <!-- diisi otomatis lewat JavaScript dari data poiData -->
            </div>

        </div>


        <!-- MAP -->
        <div class="lg:col-span-2">

            <div class="bg-white rounded-3xl shadow-xl p-4">
                <div class="flex items-center justify-between mb-4 px-1 flex-wrap gap-3">
                    <div>
                        <p class="text-sm text-gray-500">Peta interaktif diperbarui otomatis mengikuti citra satelit terbaru yang tersedia.</p>
                    </div>
                    <a href="https://maps.app.goo.gl/W7RGTy9HTYmPFzd97" target="_blank" rel="noopener"
                       class="inline-flex items-center gap-2 bg-forest-800 hover:bg-forest-900 text-white text-sm font-semibold px-4 py-2.5 rounded-full transition whitespace-nowrap">
                        <i class="bi bi-google"></i>
                        Buka di Google Maps
                    </a>
                </div>
                <div class="map-container">
                    <span class="map-badge"><i class="bi bi-globe-americas"></i> Tampilan Satelit</span>
                    <div id="map"></div>
                </div>
            </div>

            <p class="text-xs text-gray-400 mt-3 text-center">
                Citra satelit oleh Esri World Imagery (diperbarui otomatis mengikuti citra terbaru yang tersedia).
                Untuk citra satelit resolusi tertinggi dari Google, gunakan tombol "Buka di Google Maps" di atas.
            </p>

            <p class="text-xs text-amber-600 bg-amber-50 border border-amber-200 rounded-xl px-4 py-3 mt-3 flex items-start gap-2">
                <i class="bi bi-exclamation-triangle-fill mt-0.5"></i>
                <span>
                    Garis batas wilayah (merah-putih) pada peta ini masih berupa
                    <b>estimasi visual</b> berdasarkan screenshot Google Maps.
                    Untuk akurasi penuh, silahkan gunakan data batas wilayah resmi
                    (KML/Shapefile) dari Google My Maps atau instansi terkait, lalu
                    ganti array <code>batasWilayah</code> pada kode di bawah peta.
                </span>
            </p>

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
            Kelurahan Apela Satu
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
            © 2026 Sistem Informasi Kelurahan Apela Satu
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
    menuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));

    const poiData = [
        {
            nama: "Perkebunan Mangerer UJ",
            kategori: "pertanian",
            icon: "bi-tree-fill",
            lat: 1.496549,
            lng: 125.084683,
            deskripsi: "Area perkebunan yang berada di bagian utara Kelurahan Apela Satu."
        },
        {
            nama: "GMIM Abraham Duasudara",
            kategori: "ibadah",
            icon: "bi-cross",
            lat: 1.490325,
            lng: 125.106824,
            deskripsi: "Gereja GMIM yang berada di sisi timur Kelurahan Apela Satu."
        },
        {
            nama: "Kios Batman",
            kategori: "usaha",
            icon: "bi-shop-window",
            lat: 1.493856,
            lng: 125.107362,
            deskripsi: "Kios / usaha warga di sekitar area timur kelurahan."
        },
        {
            nama: "Indomaret Kumersot",
            kategori: "usaha",
            icon: "bi-shop",
            lat: 1.485539,
            lng: 125.073553,
            deskripsi: "Minimarket yang melayani kebutuhan sehari-hari warga sekitar."
        },
        {
            nama: "Sabua Merah Talaga Kumersot",
            kategori: "wisata",
            icon: "bi-house-door-fill",
            lat: 1.483444,
            lng: 125.074600,
            deskripsi: "Tempat/bangunan singgah di kawasan Talaga Kumersot."
        },
        {
            nama: "GMIM Paulus Apela Dua",
            kategori: "ibadah",
            icon: "bi-cross",
            lat: 1.480542,
            lng: 125.083785,
            deskripsi: "Gereja GMIM Paulus yang berlokasi di tengah wilayah kelurahan."
        },
        {
            nama: "Kolam Renang Alami Water Blessing",
            kategori: "wisata",
            icon: "bi-water",
            lat: 1.477550,
            lng: 125.106166,
            deskripsi: "Kolam renang alami sebagai destinasi wisata di kawasan Apela."
        }
    ];

    const batasWilayah = [
        [1.498942, 125.092552],
        [1.486376, 125.074300],
        [1.476054, 125.075497],
        [1.474707, 125.077591],
        [1.478447, 125.089260],
        [1.498942, 125.092552]
    ];

    const centerLat = 1.4871242;
    const centerLng = 125.0883625;

    // ==== INISIALISASI PETA (TAMPILAN SATELIT) ====
    const map = L.map('map', { zoomControl: true }).setView([centerLat, centerLng], 16);

    const satelliteLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, Maxar, Earthstar Geographics',
        maxZoom: 19
    });

    const labelsLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Reference/World_Boundaries_and_Places/MapServer/tile/{z}/{y}/{x}', {
        attribution: '',
        maxZoom: 19
    });

    const streetLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors',
        maxZoom: 19
    });

    const hybridGroup = L.layerGroup([satelliteLayer, labelsLayer]);
    hybridGroup.addTo(map);

    L.control.layers({
        'Satelit + Label': hybridGroup,
        'Satelit Polos': satelliteLayer,
        'Peta Jalan': streetLayer
    }, null, { position: 'topright', collapsed: true }).addTo(map);

    // ==== GARIS BATAS WILAYAH KELURAHAN Apela Satu ====
    const boundaryLine = L.polygon(batasWilayah, {
        color: '#ffffff',
        weight: 4,
        opacity: 1,
        fillColor: '#ff3b30',
        fillOpacity: 0.05,
        dashArray: '10, 8'
    }).addTo(map);

    const boundaryLineInner = L.polygon(batasWilayah, {
        color: '#ff3b30',
        weight: 2,
        opacity: 1,
        fill: false,
        dashArray: '10, 8',
        dashOffset: '10'
    }).addTo(map);

    boundaryLine.bindTooltip('Batas Wilayah Kelurahan Apela Satu', { sticky: true });
    map.fitBounds(boundaryLine.getBounds(), { padding: [30, 30] });

    L.marker([centerLat, centerLng], {
        icon: L.divIcon({
            className: '',
            html: `<div class="custom-marker" style="background:#ffc107;"><i class="bi bi-geo-fill" style="color:#166534;"></i></div>`,
            iconSize: [34, 34],
            iconAnchor: [17, 34]
        })
    }).addTo(map).bindPopup('<b>Pusat Kelurahan Apela Satu</b>');

    const markers = [];

    poiData.forEach((poi, index) => {
        const marker = L.marker([poi.lat, poi.lng], {
            icon: L.divIcon({
                className: '',
                html: `<div class="custom-marker"><i class="bi ${poi.icon}"></i></div>`,
                iconSize: [34, 34],
                iconAnchor: [17, 34]
            })
        }).addTo(map);

        marker.bindPopup(`
            <div style="min-width:180px">
                <b style="color:#14532d; font-size:15px;">${poi.nama}</b>
                <p style="margin-top:4px; font-size:13px; color:#4b5563;">${poi.deskripsi}</p>
            </div>
        `);

        markers.push({ marker, ...poi, index });
    });

    // ==== RENDER LIST SIDEBAR ====
    const poiListEl = document.getElementById('poiList');

    const kategoriColor = {
        ibadah:     'bg-blue-100 text-blue-600',
        usaha:      'bg-yellow-100 text-yellow-700',
        wisata:     'bg-sky-100 text-sky-600',
        pertanian:  'bg-forest-100 text-forest-700'
    };

    function renderList(filter = 'semua'){
        poiListEl.innerHTML = '';

        const filtered = markers.filter(p => filter === 'semua' || p.kategori === filter);

        if(filtered.length === 0){
            poiListEl.innerHTML = `<p class="text-sm text-gray-400 text-center py-6">Tidak ada data untuk kategori ini.</p>`;
            return;
        }

        filtered.forEach(poi => {
            const item = document.createElement('div');
            item.className = 'poi-item flex items-center gap-3 p-3 rounded-xl';
            item.innerHTML = `
                <div class="poi-icon ${kategoriColor[poi.kategori] || 'bg-gray-100 text-gray-600'}">
                    <i class="bi ${poi.icon}"></i>
                </div>
                <div class="min-w-0">
                    <p class="font-semibold text-forest-900 text-sm truncate">${poi.nama}</p>
                    <p class="text-xs text-gray-500 truncate">${poi.deskripsi}</p>
                </div>
            `;

            item.addEventListener('click', () => {
                map.flyTo([poi.lat, poi.lng], 17, { duration: 1 });
                poi.marker.openPopup();

                document.querySelectorAll('.poi-item').forEach(el => el.classList.remove('active'));
                item.classList.add('active');
            });

            poiListEl.appendChild(item);
        });
    }

    renderList();

    // ==== FILTER BUTTON ====
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            renderList(btn.dataset.filter);
        });
    });
</script>

</body>
</html>