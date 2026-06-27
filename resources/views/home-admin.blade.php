<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin – Perpustakaan SMAIT Al-Uswah</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/css/style-home.css?v=1">
<link rel="stylesheet" href="/css/style-home-anggota.css?v=1">
<link rel="stylesheet" href="/css/style-home-admin.css?v=1">
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
                <a href="{{ route('katalog') }}" class="nav-link">Katalog</a>
                <a href="{{ route('tentang-perpustakaan') }}" class="nav-link">Tentang</a>
                <a href="{{ route('kelola-buku') }}" class="nav-link">Buku</a>
                <a href="{{ route('kelola-anggota') }}" class="nav-link">Anggota</a>
                <a href="{{ route('riwayat-transaksi') }}" class="nav-link">Transaksi</a>
                <a href="{{ route('kelola-denda') }}" class="nav-link">Denda</a>
            </nav>

            {{-- Profil Admin --}}
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

    {{-- ===== HERO / GREETING ===== --}}
    <section class="hero admin-hero">
        <div class="hero-inner">
            <div class="hero-text">
                <span class="hero-eyebrow">Panel Admin</span>
                <h1 class="hero-title">
                    Selamat Datang,<br>
                    <em>{{ auth()->user()->nama_lengkap ?? 'Administrator' }}</em>
                </h1>
                <p class="hero-desc">
                    Kelola seluruh operasional perpustakaan dari satu tempat.<br>
                    Pantau peminjaman, anggota, dan koleksi buku<br>
                    secara efisien dan terorganisir.
                </p>

                <div class="admin-quick-search">
                    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#484441" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    <input type="text" id="searchInput" placeholder="Cari buku, anggota, atau transaksi..." class="search-input">
                    <a href="{{ route('kelola-buku') }}" class="btn-search" id="btnSearch">Cari</a>
                </div>
            </div>

            <div class="hero-illustration">
                <img src="{{ asset('assets/icon buku.png') }}" alt="Ilustrasi buku" class="hero-img">
            </div>
        </div>
    </section>

    {{-- ===== STATISTIK CEPAT ===== --}}
    <section class="stats-section">
        <div class="stats-inner">

            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(45,112,118,.12);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2D7076" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                </div>
                <div class="stat-info">
                    <span class="stat-number">{{ $totalBuku ?? '—' }}</span>
                    <span class="stat-label">Total Buku</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(213,197,219,.35);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2D7076" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <div class="stat-info">
                    <span class="stat-number">{{ $totalAnggota ?? '—' }}</span>
                    <span class="stat-label">Total Anggota</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(144,195,198,.3);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2D7076" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                </div>
                <div class="stat-info">
                    <span class="stat-number">{{ $totalPeminjaman ?? '—' }}</span>
                    <span class="stat-label">Transaksi Aktif</span>
                </div>
            </div>

            <div class="stat-card stat-card-alert">
                <div class="stat-icon" style="background: rgba(192,57,43,.1);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#C0392B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                </div>
                <div class="stat-info">
                    <span class="stat-number alert-number">{{ $totalDenda ?? '—' }}</span>
                    <span class="stat-label">Denda Belum Lunas</span>
                </div>
            </div>

        </div>
    </section>

    {{-- ===== AKSI CEPAT ===== --}}
    <section class="cards-section">
        <div class="cards-inner">

            <div class="feature-card" onclick="window.location='{{ route('tambah-buku') }}'">
                <div class="card-icon-circle" style="background: rgba(45,112,118,.12);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2D7076" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                </div>
                <h3 class="card-title">Tambah Buku</h3>
                <p class="card-desc">Tambahkan koleksi buku baru ke dalam sistem perpustakaan dengan lengkap dan terstruktur.</p>
                <a href="{{ route('tambah-buku') }}" class="card-link">Tambah Sekarang &rarr;</a>
            </div>

            <div class="feature-card" onclick="window.location='{{ route('input-peminjaman') }}'">
                <div class="card-icon-circle" style="background: rgba(144,195,198,.3);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2D7076" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                </div>
                <h3 class="card-title">Input Peminjaman</h3>
                <p class="card-desc">Catat transaksi peminjaman buku anggota secara langsung dan cepat melalui sistem.</p>
                <a href="{{ route('input-peminjaman') }}" class="card-link">Input Sekarang &rarr;</a>
            </div>

            <div class="feature-card" onclick="window.location='{{ route('tambah-anggota') }}'">
                <div class="card-icon-circle" style="background: rgba(213,197,219,.35);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2D7076" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
                </div>
                <h3 class="card-title">Tambah Anggota</h3>
                <p class="card-desc">Daftarkan anggota baru perpustakaan dan atur hak akses serta data keanggotaannya.</p>
                <a href="{{ route('tambah-anggota') }}" class="card-link">Tambah Anggota &rarr;</a>
            </div>

        </div>
    </section>

    {{-- ===== BUKU TERPOPULER ===== --}}
    <section class="popular-section">
        <div class="popular-inner">
            <div class="popular-header">
                <div>
                    <h2 class="popular-title">Buku Paling Sering Dipinjam</h2>
                    <p class="popular-subtitle">Koleksi dengan tingkat peminjaman tertinggi minggu ini.</p>
                </div>
                <a href="{{ route('kelola-buku') }}" class="btn-lihat-semua">
                    Kelola Semua
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                </a>
            </div>

            <div class="book-grid">
                <a href="{{ route('informasi-buku', ['id' => 1]) }}" class="book-card-link">
                    <div class="book-card">
                        <div class="book-cover-wrap">
                            <span class="book-badge badge-sejarah">Sejarah</span>
                            <img src="{{ asset('assets/sejarah-peradaban-silam-sampul.png') }}" alt="Sejarah Peradaban Islam" class="book-cover-img">
                        </div>
                        <h4 class="book-title">Sejarah Peradaban Islam</h4>
                        <p class="book-author">Dr. Fauzan Adhim, M.Pd.I.</p>
                        <span class="book-status status-tersedia"><span class="status-dot"></span> Tersedia</span>
                    </div>
                </a>

                <a href="{{ route('informasi-buku', ['id' => 2]) }}" class="book-card-link">
                    <div class="book-card">
                        <div class="book-cover-wrap">
                            <span class="book-badge badge-fiksi">Fiksi</span>
                            <img src="{{ asset('assets/Laskar_pelangi_sampul.jpg') }}" alt="Laskar Pelangi" class="book-cover-img">
                        </div>
                        <h4 class="book-title">Laskar Pelangi</h4>
                        <p class="book-author">Andrea Hirata</p>
                        <span class="book-status status-dipinjam"><span class="status-dot"></span> Dipinjam</span>
                    </div>
                </a>

                <a href="{{ route('informasi-buku', ['id' => 3]) }}" class="book-card-link">
                    <div class="book-card">
                        <div class="book-cover-wrap">
                            <span class="book-badge badge-filsafat">Filsafat</span>
                            <img src="{{ asset('assets/dunia-sophie-sampul.jpg') }}" alt="Dunia Sophie" class="book-cover-img">
                        </div>
                        <h4 class="book-title">Dunia Sophie</h4>
                        <p class="book-author">Jostein Gaarder</p>
                        <span class="book-status status-tersedia"><span class="status-dot"></span> Tersedia</span>
                    </div>
                </a>

                <a href="{{ route('informasi-buku', ['id' => 4]) }}" class="book-card-link">
                    <div class="book-card">
                        <div class="book-cover-wrap">
                            <span class="book-badge badge-motivasi">Motivasi</span>
                            <img src="{{ asset('assets/slow-down-sampul.jpg') }}" alt="Slow Down" class="book-cover-img">
                        </div>
                        <h4 class="book-title">The Things You Can See Only When You Slow Down</h4>
                        <p class="book-author">Haemin Sunim</p>
                        <span class="book-status status-tersedia"><span class="status-dot"></span> Tersedia</span>
                    </div>
                </a>
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

   <script src="{{ asset('js/script-home-admin.js') }}"></script>
</body>
</html>