<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Admin – Perpustakaan SMAIT Al-Uswah</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style-home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-home-anggota.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-home-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-katalog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-katalog-admin.css') }}">
</head>
<body class="admin-page">

    {{-- ===== NAVBAR ===== --}}
    <header class="navbar">
        <div class="navbar-inner">
            <a href="{{ route('home-admin') }}" class="nav-brand">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="nav-logo">
                <span class="nav-brand-name">Al-Uswah Library</span>
            </a>

            <nav class="nav-links">
                <a href="{{ route('dashboard-admin') }}" class="nav-link">Dashboard</a>
                <a href="{{ route('katalog-admin') }}" class="nav-link active">Katalog</a>
                <a href="{{ route('tentang-perpustakaan-admin') }}" class="nav-link">Tentang</a>
                <a href="{{ route('kelola-buku') }}" class="nav-link">Buku</a>
                <a href="{{ route('kelola-anggota') }}" class="nav-link">Anggota</a>
                <a href="{{ route('riwayat-transaksi') }}" class="nav-link">Transaksi</a>
                <a href="{{ route('kelola-denda') }}" class="nav-link">Denda</a>
            </nav>

            <a href="{{ route('setting') }}" class="nav-profile">
                <div class="nav-avatar">
                    <div class="avatar-placeholder admin-avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                </div>
                <div class="nav-profile-info">
                    <span class="nav-username">{{ auth()->user()->nama_lengkap ?? 'Admin' }}</span>
                    <span class="nav-role">Administrator</span>
                </div>
            </a>
        </div>
    </header>

    {{-- ===== HERO KATALOG ===== --}}
    <section class="katalog-hero">
        <div class="katalog-hero-inner">
            <div class="katalog-hero-text">
                <span class="katalog-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                    PERPUSTAKAAN DIGITAL
                </span>
                <h1 class="katalog-title">
                    Jelajahi Literasi,<br>
                    <em>Buka Jendela Dunia</em>
                </h1>
                <p class="katalog-desc">
                    Temukan ribuan koleksi buku pilihan mulai dari khazanah<br>
                    klasik hingga literatur modern untuk mendukung<br>
                    petualangan belajarmu.
                </p>

                <div class="katalog-search-wrap">
                    <div class="hero-search katalog-search">
                        <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#484441" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        <input type="text" id="heroSearch" placeholder="Cari judul buku, penulis, atau ISBN..." class="search-input">
                        <button class="btn-search" id="btnHeroSearch">Cari &rarr;</button>
                    </div>
                </div>
            </div>

            <div class="katalog-hero-img">
                <img src="{{ asset('assets/icon buku.png') }}" alt="Ilustrasi buku" class="katalog-illustration">
            </div>
        </div>
    </section>

    {{-- ===== FILTER & SORT ===== --}}
    <section class="filter-section">
        <div class="filter-inner">
            <div class="filter-categories">
                <button class="filter-btn active" data-kategori="semua">
                    Semua Kategori
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                </button>
                <button class="filter-btn" data-kategori="fiksi">Fiksi</button>
                <button class="filter-btn" data-kategori="sejarah">Sejarah</button>
                <button class="filter-btn" data-kategori="sains">Sains</button>
                <button class="filter-btn" data-kategori="agama">Agama</button>
                <button class="filter-btn" data-kategori="filsafat">Filsafat</button>
                <button class="filter-btn" data-kategori="motivasi">Motivasi</button>
            </div>

            <div class="filter-sort">
                <label class="sort-label">Urutkan:</label>
                <div class="select-wrap sort-wrap">
                    <select id="sortSelect" class="sort-select">
                        <option value="terbaru">Terbaru</option>
                        <option value="terlama">Terlama</option>
                        <option value="az">A – Z</option>
                        <option value="za">Z – A</option>
                        <option value="tersedia">Tersedia</option>
                    </select>
                    <svg class="select-arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#2D7076" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== GRID BUKU ===== --}}
    <section class="buku-section">
        <div class="buku-inner">

            {{-- Info hasil --}}
            <div class="hasil-info" id="hasilInfo">
                <span id="hasilText">Menampilkan <strong>4</strong> buku</span>
            </div>

            <div class="buku-grid" id="bukuGrid">

                {{-- Card 1 --}}
                <div class="buku-card" data-kategori="fiksi" data-judul="Laskar Pelangi" data-penulis="Andrea Hirata" data-status="tersedia" data-tahun="2005">
                    <div class="buku-cover-wrap">
                        <img src="{{ asset('assets/Laskar_pelangi_sampul.jpg') }}" alt="Laskar Pelangi" class="buku-cover">
                    </div>
                    <div class="buku-info">
                        <div class="buku-meta-top">
                            <span class="buku-kategori kategori-fiksi">Fiksi</span>
                            <span class="buku-status status-tersedia"><span class="status-dot"></span> Tersedia</span>
                        </div>
                        <h3 class="buku-judul">Laskar Pelangi</h3>
                        <p class="buku-penulis">Andrea Hirata</p>
                        <div class="buku-footer">
                            <span class="buku-isbn">ISBN: 978602291</span>
                            <a href="{{ route('informasi-buku-admin', ['id' => 1]) }}" class="btn-detail">Lihat Detail</a>
                        </div>
                    </div>
                </div>

                {{-- Card 2 --}}
                <div class="buku-card" data-kategori="filsafat" data-judul="Dunia Sophie" data-penulis="Jostein Gaarder" data-status="tersedia" data-tahun="2006">
                    <div class="buku-cover-wrap">
                        <img src="{{ asset('assets/dunia-sophie-sampul.jpg') }}" alt="Dunia Sophie" class="buku-cover">
                    </div>
                    <div class="buku-info">
                        <div class="buku-meta-top">
                            <span class="buku-kategori kategori-filsafat">Filsafat</span>
                            <span class="buku-status status-tersedia"><span class="status-dot"></span> Tersedia</span>
                        </div>
                        <h3 class="buku-judul">Dunia Sophie</h3>
                        <p class="buku-penulis">Jostein Gaarder</p>
                        <div class="buku-footer">
                            <span class="buku-isbn">ISBN: 978979433</span>
                            <a href="{{ route('informasi-buku-admin', ['id' => 2]) }}" class="btn-detail">Lihat Detail</a>
                        </div>
                    </div>
                </div>

                {{-- Card 3 --}}
                <div class="buku-card" data-kategori="sejarah" data-judul="Sejarah Peradaban Islam" data-penulis="Dr. Fauzan Adhim" data-status="tersedia" data-tahun="2010">
                    <div class="buku-cover-wrap">
                        <img src="{{ asset('assets/sejarah-peradaban-silam-sampul.png') }}" alt="Sejarah Peradaban Islam" class="buku-cover">
                    </div>
                    <div class="buku-info">
                        <div class="buku-meta-top">
                            <span class="buku-kategori kategori-sejarah">Sejarah</span>
                            <span class="buku-status status-tersedia"><span class="status-dot"></span> Tersedia</span>
                        </div>
                        <h3 class="buku-judul">Sejarah Peradaban Islam</h3>
                        <p class="buku-penulis">Dr. Fauzan Adhim, M.Pd.I.</p>
                        <div class="buku-footer">
                            <span class="buku-isbn">ISBN: 978979421</span>
                            <a href="{{ route('informasi-buku-admin', ['id' => 3]) }}" class="btn-detail">Lihat Detail</a>
                        </div>
                    </div>
                </div>

                {{-- Card 4 --}}
                <div class="buku-card" data-kategori="motivasi" data-judul="The Things You Can See Only When You Slow Down" data-penulis="Haemin Sunim" data-status="tersedia" data-tahun="2017">
                    <div class="buku-cover-wrap">
                        <img src="{{ asset('assets/slow-down-sampul.jpg') }}" alt="Slow Down" class="buku-cover">
                    </div>
                    <div class="buku-info">fi
                        <div class="buku-meta-top">
                            <span class="buku-kategori kategori-motivasi">Motivasi</span>
                            <span class="buku-status status-tersedia"><span class="status-dot"></span> Tersedia</span>
                        </div>
                        <h3 class="buku-judul">The Things You Can See Only When You Slow Down</h3>
                        <p class="buku-penulis">Haemin Sunim</p>
                        <div class="buku-footer">
                            <span class="buku-isbn">ISBN: 978602291</span>
                            <a href="{{ route('informasi-buku-admin', ['id' => 4]) }}" class="btn-detail">Lihat Detail</a>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Empty state --}}
            <div class="empty-state hidden" id="emptyState">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#2D7076" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <h3>Buku tidak ditemukan</h3>
                <p>Coba kata kunci lain atau ubah filter kategori.</p>
                <button class="btn-reset" id="btnReset">Reset Pencarian</button>
            </div>

            {{-- Pagination --}}
            <div class="pagination" id="pagination">
                <button class="page-btn page-prev" id="pagePrev" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                </button>
                <button class="page-btn active" data-page="1">1</button>
                <button class="page-btn" data-page="2">2</button>
                <button class="page-btn" data-page="3">3</button>
                <span class="page-dots">...</span>
                <button class="page-btn" data-page="12">12</button>
                <button class="page-btn page-next" id="pageNext">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </button>
            </div>

        </div>
    </section>

    {{-- ===== FOOTER ===== --}}
    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-brand">
                <div class="footer-brand-top">
                    <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="footer-logo">
                    <span class="footer-brand-name">Al-Uswah Library</span>
                </div>
                <p class="footer-tagline">© 2026 SMAIT Al-Uswah Library.<br>Menumbuhkan Literasi,<br>Mengukir Prestasi.</p>
                <div class="footer-socials">
                    <a href="#" class="social-btn" aria-label="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    </a>
                    <a href="#" class="social-btn" aria-label="Email">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,12 2,6"/></svg>
                    </a>
                </div>
            </div>

            <div class="footer-col">
                <h4 class="footer-col-title">Layanan</h4>
                <ul>
                    <li><a href="#">Visi &amp; Misi</a></li>
                    <li><a href="#">Kebijakan Layanan</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4 class="footer-col-title">Dukungan</h4>
                <ul>
                    <li><a href="#">Pusat Bantuan</a></li>
                    <li><a href="#">Donasi Buku</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4 class="footer-col-title">Kontak</h4>
                <address>
                    Jl. Al-Uswah No. 123, Surabaya<br>
                    perpus@smait-aluswah.sch.id
                </address>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2026 Perpustakaan SMAIT Al-Uswah. Menjaga Tradisi, Membangun Literasi.</p>
        </div>
    </footer>

    <script src="{{ asset('js/script-katalog-admin.js') }}"></script>
</body>
</html>