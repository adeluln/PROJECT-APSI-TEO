<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda – Perpustakaan SMAIT Al-Uswah</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style-home.css') }}">
</head>
<body>

    {{-- ===== NAVBAR ===== --}}
    <header class="navbar">
        <div class="navbar-inner">
            {{-- Brand --}}
            <a href="{{ route('home') }}" class="nav-brand">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="nav-logo">
                <span class="nav-brand-name">Al-Uswah Library</span>
            </a>

            {{-- Nav Links --}}
            <nav class="nav-links">
                <a href="{{ route('home') }}" class="nav-link active">Beranda</a>
                <a href="{{ route('katalog') }}" class="nav-link">Katalog</a>
                <a href="{{ route('tentang-perpustakaan') }}" class="nav-link">Tentang</a>
                <a href="{{ route('register') }}" class="nav-link">Daftar Anggota</a>
            </nav>

            {{-- CTA Button --}}
            {{-- Ganti kondisi sesuai auth Laravel --}}
            @auth
                <a href="{{ route('profil-anggota') }}" class="btn-nav-cta">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    Profil
                </a>
            @else
                <a href="{{ route('log-in') }}" class="btn-nav-cta">Masuk</a>
            @endauth
        </div>
    </header>

    {{-- ===== HERO SECTION ===== --}}
    <section class="hero">
        <div class="hero-inner">
            <div class="hero-text">
                <span class="hero-eyebrow">Ayo Membaca</span>
                <h1 class="hero-title">
                    Jendela Dunia,<br>
                    <em>Pintu Literasi</em>
                </h1>
                <p class="hero-desc">
                    Temukan ribuan koleksi literatur klasik dan modern<br>
                    untuk mendukung perjalanan intelektual Anda di<br>
                    lingkungan yang inspiratif.
                </p>

                <div class="hero-search">
                    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#484441" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    <input type="text" id="searchInput" placeholder="Cari judul buku, penulis, atau kategori..." class="search-input">
                    <a href="{{ route('katalog') }}" class="btn-search" id="btnSearch">Cari</a>
                </div>
            </div>

            <div class="hero-illustration">
                <img src="{{ asset('assets/icon buku.png') }}" alt="Ilustrasi buku" class="hero-img">
            </div>
        </div>
    </section>

    {{-- ===== CARDS SECTION ===== --}}
    <section class="cards-section">
        <div class="cards-inner">

            <div class="feature-card">
                <div class="card-icon-circle" style="background: rgba(213,197,219,.3);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2D7076" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                </div>
                <h3 class="card-title">Katalog Buku</h3>
                <p class="card-desc">Jelajahi beragam genre mulai dari Sejarah hingga Sains Modern dalam satu koleksi terpadu.</p>
                <a href="{{ route('katalog') }}" class="card-link">Mulai Jelajahi &rarr;</a>
            </div>

            <div class="feature-card">
                <div class="card-icon-circle" style="background: rgba(144,195,198,.3);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2D7076" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h3 class="card-title">Daftar Anggota</h3>
                <p class="card-desc">Bergabunglah dengan komunitas pembaca kami dan nikmati akses peminjaman eksklusif setiap hari.</p>
                <a href="{{ route('register') }}" class="card-link">Daftar Sekarang &rarr;</a>
            </div>

            <div class="feature-card">
                <div class="card-icon-circle" style="background: rgba(45,112,118,.12);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2D7076" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                </div>
                <h3 class="card-title">Tentang Kami</h3>
                <p class="card-desc">Pelajari visi kami dalam membangun ekosistem literasi yang modern bagi generasi masa depan.</p>
                <a href="{{ route('tentang-perpustakaan') }}" class="card-link">Pelajari Visi &rarr;</a>
            </div>

        </div>
    </section>

    {{-- ===== KOLEKSI TERPOPULER ===== --}}
    <section class="popular-section">
        <div class="popular-inner">
            <div class="popular-header">
                <div>
                    <h2 class="popular-title">Koleksi Terpopuler</h2>
                    <p class="popular-subtitle">Buku-buku yang paling banyak diminati minggu ini.</p>
                </div>
                <a href="{{ route('katalog') }}" class="btn-lihat-semua">
                    Lihat Semua
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                </a>
            </div>

            <div class="book-grid">

                <div class="book-card book-card-locked" onclick="showLoginPrompt()">
                    <div class="book-cover-wrap">
                        <span class="book-badge badge-sejarah">Sejarah</span>
                        <img src="{{ asset('assets/sejarah-peradaban-silam-sampul.png') }}" alt="Sejarah Peradaban Islam" class="book-cover-img">
                        <div class="book-lock-overlay">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        </div>
                    </div>
                    <h4 class="book-title">Sejarah Peradaban Islam</h4>
                    <p class="book-author">Dr. Fauzan Adhim, M.Pd.I.</p>
                    <span class="book-status status-tersedia"><span class="status-dot"></span> Tersedia</span>
                </div>

                <div class="book-card book-card-locked" onclick="showLoginPrompt()">
                    <div class="book-cover-wrap">
                        <span class="book-badge badge-fiksi">Fiksi</span>
                        <img src="{{ asset('assets/Laskar_pelangi_sampul.jpg') }}" alt="Laskar Pelangi" class="book-cover-img">
                        <div class="book-lock-overlay">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        </div>
                    </div>
                    <h4 class="book-title">Laskar Pelangi</h4>
                    <p class="book-author">Andrea Hirata</p>
                    <span class="book-status status-dipinjam"><span class="status-dot"></span> Dipinjam</span>
                </div>

                <div class="book-card book-card-locked" onclick="showLoginPrompt()">
                    <div class="book-cover-wrap">
                        <span class="book-badge badge-filsafat">Filsafat</span>
                        <img src="{{ asset('assets/dunia-sophie-sampul.jpg') }}" alt="Dunia Sophie" class="book-cover-img">
                        <div class="book-lock-overlay">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        </div>
                    </div>
                    <h4 class="book-title">Dunia Sophie</h4>
                    <p class="book-author">Jostein Gaarder</p>
                    <span class="book-status status-tersedia"><span class="status-dot"></span> Tersedia</span>
                </div>

                <div class="book-card book-card-locked" onclick="showLoginPrompt()">
                    <div class="book-cover-wrap">
                        <span class="book-badge badge-motivasi">Motivasi</span>
                        <img src="{{ asset('assets/slow-down-sampul.jpg') }}" alt="Slow Down" class="book-cover-img">
                        <div class="book-lock-overlay">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        </div>
                    </div>
                    <h4 class="book-title">The Things You Can See Only When You Slow Down</h4>
                    <p class="book-author">Haemin Sunim</p>
                    <span class="book-status status-tersedia"><span class="status-dot"></span> Tersedia</span>
                </div>

            </div>

            {{-- Modal: harus login dulu --}}
            <div class="modal-overlay" id="loginPromptModal">
                <div class="modal-box">
                    <div class="modal-icon-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#2D7076" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                    <h3 class="modal-title">Masuk untuk Melanjutkan</h3>
                    <p class="modal-body">Kamu perlu masuk atau mendaftar sebagai anggota untuk melihat informasi detail buku dan melakukan peminjaman.</p>
                    <div class="modal-btns">
                        <a href="{{ route('log-in') }}" class="btn-modal">Masuk Sekarang</a>
                        <button class="btn-modal-outline" onclick="closeLoginPrompt()">Nanti Saja</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== CTA BANNER ===== --}}
    <section class="cta-section">
        <div class="cta-inner">
            <div class="cta-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,.7)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            </div>
            <h2 class="cta-title">Siap Menjelajahi Dunia?</h2>
            <p class="cta-desc">Daftar menjadi anggota sekarang dan mulailah petualangan<br>literasi Anda bersama ribuan pembaca lainnya.</p>
            <div class="cta-btns">
                <a href="{{ route('register') }}" class="btn-cta-outline">Daftar Sekarang</a>
                <a href="{{ route('katalog') }}" class="btn-cta-solid">Cari Buku</a>
            </div>
            <div class="cta-deco-book">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,.1)" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
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

    <script src="{{ asset('js/script-home.js') }}"></script>
</body>
</html>