<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard – Perpustakaan SMAIT Al-Uswah</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style-home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-home-anggota.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-dashboard-anggota.css') }}">
</head>
<body>

    {{-- ===== NAVBAR ===== --}}
    <header class="navbar">
        <div class="navbar-inner">
            <a href="{{ route('home-anggota') }}" class="nav-brand">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="nav-logo">
                <span class="nav-brand-name">Al-Uswah Library</span>
            </a>

            <nav class="nav-links">
                <a href="{{ route('dashboard-anggota') }}" class="nav-link active">Dashboard</a>
                <a href="{{ route('katalog-anggota') }}" class="nav-link">Katalog</a>
                <a href="{{ route('tentang-perpustakaan-anggota') }}" class="nav-link">Tentang</a>
                <a href="{{ route('riwayat-peminjaman') }}" class="nav-link">Riwayat</a>
                <a href="{{ route('status-denda') }}" class="nav-link">Denda</a>
            </nav>

            {{-- Profil anggota sementara --}}
@php
    $namaUser = 'Anggota';
    $inisialUser = 'A';
@endphp

<a href="{{ route('profil-anggota') }}" class="nav-profile">
    <div class="nav-avatar">
        <span class="avatar-placeholder">{{ $inisialUser }}</span>
    </div>

    <span class="nav-username">{{ $namaUser }}</span>
</a>
        </div>
    </header>

    {{-- ===== GREETING ===== --}}
    <section class="greeting-section">
        <div class="greeting-inner">
            <h1 class="greeting-title">
                <span class="greeting-spark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="#90C3C6" stroke="none"><path d="M12 2l1.5 5.5L19 9l-5.5 1.5L12 16l-1.5-5.5L5 9l5.5-1.5z"/></svg>
                </span>
                Halo, {{ explode(' ', auth()->user()->nama_lengkap ?? 'Adel')[0] }} <em>selamat membaca</em>
            </h1>
            <p class="greeting-sub">Semangat belajarmu hari ini adalah kunci masa depan.</p>
        </div>
    </section>

    {{-- ===== STAT CARDS ===== --}}
    <section class="dashboard-stats">
        <div class="dashboard-stats-inner">

            <div class="dash-stat-card card-teal">
                <div class="dash-stat-deco"></div>
                <div class="dash-stat-head">
                    <span class="dash-stat-label">Buku Dipinjam</span>
                    <div class="dash-stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                    </div>
                </div>
                <span class="dash-stat-value">3 Buku</span>
                <span class="dash-stat-trend"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg> dari 5 maksimal</span>
            </div>

            <div class="dash-stat-card card-mint">
                <div class="dash-stat-deco"></div>
                <div class="dash-stat-head">
                    <span class="dash-stat-label">Sisa Hari</span>
                    <div class="dash-stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                </div>
                <span class="dash-stat-value">2 Hari Lagi</span>
                <span class="dash-stat-trend trend-warn"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg> segera kembalikan</span>
            </div>

            <div class="dash-stat-card card-alert">
                <div class="dash-stat-deco"></div>
                <div class="dash-stat-head">
                    <span class="dash-stat-label">Denda Aktif</span>
                    <div class="dash-stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
                    </div>
                </div>
                <span class="dash-stat-value alert-value">Rp 5.000</span>
                <a href="{{ route('status-denda') }}" class="dash-stat-trend trend-link">Bayar sekarang &rarr;</a>
            </div>

            <div class="dash-stat-card card-orchid">
                <div class="dash-stat-deco"></div>
                <div class="dash-stat-head">
                    <span class="dash-stat-label">Notifikasi</span>
                    <div class="dash-stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                    </div>
                </div>
                <span class="dash-stat-value">2 Pesan Baru</span>
                <span class="dash-stat-trend"><span class="ping-dot"></span> belum dibaca</span>
            </div>

        </div>
    </section>

    {{-- ===== MAIN GRID ===== --}}
    <section class="dashboard-main">
        <div class="dashboard-main-inner">

            {{-- LEFT COLUMN --}}
            <div class="dash-left">

                {{-- Pinjaman Aktif --}}
                <div class="dash-block">
                    <h2 class="dash-block-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2D7076" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                        Pinjaman Aktif
                    </h2>

                    <div class="pinjaman-item">
                        <img src="{{ asset('assets/dunia-sophie-sampul.jpg') }}" alt="Dunia Sophie" class="pinjaman-cover">
                        <div class="pinjaman-info">
                            <h3 class="pinjaman-judul">Dunia Sophie</h3>
                            <p class="pinjaman-kembali">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                Kembali: 14 Des 2026
                                <span class="badge-aman">AMAN</span>
                            </p>
                        </div>
                        <button class="pinjaman-menu" aria-label="Menu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#484441" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="5" r="1"/><circle cx="12" cy="12" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                        </button>
                    </div>

                    <div class="pinjaman-item">
                        <img src="{{ asset('assets/sejarah-peradaban-silam-sampul.png') }}" alt="Sejarah Peradaban Islam" class="pinjaman-cover">
                        <div class="pinjaman-info">
                            <h3 class="pinjaman-judul">Sejarah Peradaban Islam</h3>
                            <p class="pinjaman-kembali">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#c0392b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                                Kembali: Besok
                                <span class="badge-segera">SEGERA</span>
                            </p>
                        </div>
                        <button class="pinjaman-menu" aria-label="Menu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#484441" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="5" r="1"/><circle cx="12" cy="12" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                        </button>
                    </div>
                </div>

                {{-- Rekomendasi --}}
                <div class="dash-block">
                    <div class="dash-block-header">
                        <h2 class="dash-block-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2D7076" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l1.5 5.5L19 9l-5.5 1.5L12 16l-1.5-5.5L5 9l5.5-1.5z"/></svg>
                            Rekomendasi Untukmu
                        </h2>
                        <a href="{{ route('katalog-anggota') }}" class="dash-lihat-semua">Lihat Semua &rarr;</a>
                    </div>

                    <div class="rekomendasi-grid">
                        <a href="{{ route('informasi-buku', ['id' => 1]) }}" class="rekom-card">
                            <img src="{{ asset('assets/Laskar_pelangi_sampul.jpg') }}" alt="Laskar Pelangi" class="rekom-cover">
                            <h4 class="rekom-judul">Laskar Pelangi</h4>
                            <p class="rekom-penulis">Andrea Hirata</p>
                        </a>

                        <a href="{{ route('informasi-buku', ['id' => 4]) }}" class="rekom-card">
                            <img src="{{ asset('assets/slow-down-sampul.jpg') }}" alt="Slow Down" class="rekom-cover">
                            <h4 class="rekom-judul">The Things You Can See Only When You Slow Down</h4>
                            <p class="rekom-penulis">Haemin Sunim</p>
                        </a>

                        <a href="{{ route('informasi-buku', ['id' => 3]) }}" class="rekom-card">
                            <img src="{{ asset('assets/sejarah-peradaban-silam-sampul.png') }}" alt="Sejarah Peradaban Islam" class="rekom-cover">
                            <h4 class="rekom-judul">Sejarah Peradaban Islam</h4>
                            <p class="rekom-penulis">Dr. Fauzan Adhim, M.Pd.I.</p>
                        </a>
                    </div>
                </div>

            </div>

            {{-- RIGHT COLUMN --}}
            <div class="dash-right">

                {{-- Kartu Anggota Digital --}}
                <div class="kartu-digital">
                    <div class="kartu-star">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="#b8742f" stroke="none"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <div class="kartu-head">
                        <div>
                            <span class="kartu-label">KARTU ANGGOTA DIGITAL</span>
                            <h3 class="kartu-nama-perpus">SMAIT Al-Uswah</h3>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,.8)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8.5a6 6 0 0 1 12 0"/><path d="M3 11.5a9 9 0 0 1 18 0"/><circle cx="12" cy="14" r="2"/></svg>
                    </div>
                    <p class="kartu-nama-anggota">{{ auth()->user()->nama_lengkap ?? 'Adelia Putri Ramadhani' }}</p>
                    <div class="kartu-bottom">
                        <span class="kartu-id">2026.08.0125</span>
                        <div class="kartu-qr">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#2D7076" stroke-width="1.5"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><line x1="14" y1="14" x2="14" y2="14.01"/><line x1="21" y1="14" x2="21" y2="14.01"/><line x1="14" y1="21" x2="14" y2="21.01"/><line x1="21" y1="21" x2="21" y2="21.01"/><line x1="17.5" y1="17.5" x2="17.5" y2="17.51"/></svg>
                        </div>
                    </div>
                </div>
                <p class="kartu-note">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#2D7076" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                    Tunjukkan QR saat meminjam buku
                </p>

                {{-- Statistik Membaca (pengganti Akses Cepat) --}}
                <div class="statistik-card">
                    <div class="statistik-head">
                        <h3 class="statistik-title">Statistik Membaca</h3>
                        <span class="statistik-period">6 Bulan Terakhir</span>
                    </div>

                    <div class="chart-bars" id="chartBars">
                        <div class="chart-bar-col">
                            <div class="chart-bar" style="--val: 40%;" data-count="2"></div>
                            <span class="chart-label">Jul</span>
                        </div>
                        <div class="chart-bar-col">
                            <div class="chart-bar" style="--val: 65%;" data-count="3"></div>
                            <span class="chart-label">Agu</span>
                        </div>
                        <div class="chart-bar-col">
                            <div class="chart-bar" style="--val: 50%;" data-count="2"></div>
                            <span class="chart-label">Sep</span>
                        </div>
                        <div class="chart-bar-col">
                            <div class="chart-bar" style="--val: 85%;" data-count="4"></div>
                            <span class="chart-label">Okt</span>
                        </div>
                        <div class="chart-bar-col">
                            <div class="chart-bar" style="--val: 70%;" data-count="3"></div>
                            <span class="chart-label">Nov</span>
                        </div>
                        <div class="chart-bar-col">
                            <div class="chart-bar chart-bar-active" style="--val: 100%;" data-count="5"></div>
                            <span class="chart-label">Des</span>
                        </div>
                    </div>

                    <div class="statistik-footer">
                        <div class="statistik-total">
                            <span class="total-num">19</span>
                            <span class="total-label">Buku tahun ini</span>
                        </div>
                        <div class="statistik-streak">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="#b8742f" stroke="none"><path d="M12 2C8 6 6 9 6 13a6 6 0 0 0 12 0c0-2-1-4-2-5 0 2-1 3-2 3 1-3-1-6-2-9z"/></svg>
                            <span>Naik 25% dari bulan lalu</span>
                        </div>
                    </div>
                </div>

                {{-- Peringkat Membaca --}}
                <div class="peringkat-card">
                    <span class="peringkat-label">PERINGKAT MEMBACA</span>
                    <h3 class="peringkat-rank">Pembaca Tekun</h3>
                    <div class="peringkat-progress">
                        <div class="peringkat-progress-fill" style="width: 70%;"></div>
                    </div>
                    <p class="peringkat-note">8 buku lagi untuk menjadi Duta Literasi</p>
                    <div class="peringkat-star">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="rgba(255,255,255,.1)" stroke="none"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                </div>

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

    <script src="{{ asset('js/script-dashboard-anggota.js') }}"></script>
</body>
</html>