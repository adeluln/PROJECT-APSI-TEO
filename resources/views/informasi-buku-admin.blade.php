@php
    // ====== DATA BUKU (contoh dummy berbasis assets) ======
    // Di produksi, $buku didapat dari controller: compact('buku')
    // Struktur ini cocok dengan tabel books kamu.
    $dataBuku = [
        1 => [
            'judul' => 'Laskar Pelangi',
            'penulis' => 'Andrea Hirata',
            'kategori' => 'Sastra & Fiksi',
            'kategori_class' => 'fiksi',
            'cover' => 'Laskar_pelangi_sampul.jpg',
            'sinopsis' => 'Laskar Pelangi mengisahkan perjalanan sepuluh anak dari keluarga kurang mampu yang menempuh pendidikan di sebuah sekolah Muhammadiyah di Pulau Belitung dengan segala keterbatasan. Dari Ikal, Lintang, hingga Mahar, setiap karakter menghidupkan semangat juang, persahabatan, dan kecintaan terhadap ilmu di tengah kesederhanaan. Novel pertama dari Tetralogi Laskar Pelangi ini menjadi karya sastra Indonesia terlaris sepanjang sejarah dan telah diterjemahkan ke berbagai bahasa di dunia.',
            'penerbit' => 'Bentang Pustaka',
            'tahun' => '2005',
            'isbn' => '979-3062-79-7',
            'kategori_label' => 'Buku Sastra',
            'rak' => 'Sastra - 02A',
            'nomor_panggil' => '899.221 AND l',
            'total' => 12, 'tersedia' => 8, 'dipinjam' => 4,
        ],
        2 => [
            'judul' => 'Dunia Sophie',
            'penulis' => 'Jostein Gaarder',
            'kategori' => 'Filsafat',
            'kategori_class' => 'filsafat',
            'cover' => 'dunia-sophie-sampul.jpg',
            'sinopsis' => 'Sophie, seorang pelajar berusia empat belas tahun, suatu hari menerima surat misterius berisi satu pertanyaan: "Siapa kamu?". Dari sanalah ia memulai perjalanan menakjubkan menyusuri sejarah filsafat, dari Yunani kuno hingga abad ke-20, dibimbing seorang filsuf misterius bernama Alberto Knox. Dikemas sebagai novel misteri yang cerdas, Dunia Sophie berhasil menyederhanakan 3.000 tahun pemikiran filsafat menjadi kisah yang ringan, menggugah, dan memikat untuk semua kalangan.',
            'penerbit' => 'Mizan',
            'tahun' => '1996',
            'isbn' => '978-602-441-020-9',
            'kategori_label' => 'Novel Filsafat',
            'rak' => 'Filsafat - 01C',
            'nomor_panggil' => '100 GAA d',
            'total' => 6, 'tersedia' => 5, 'dipinjam' => 1,
        ],
        3 => [
            'judul' => 'Sejarah Peradaban Islam',
            'penulis' => 'Prof. Dr. Badri Yatim, M.A.',
            'kategori' => 'Agama & Sejarah',
            'kategori_class' => 'sejarah',
            'cover' => 'sejarah-peradaban-silam-sampul.png',
            'sinopsis' => 'Buku ini menyajikan uraian menyeluruh tentang perjalanan peradaban Islam dari masa klasik, pertengahan, hingga modern. Membahas bagaimana Islam membawa kemajuan kebudayaan dan ilmu pengetahuan, mulai dari dunia Arab, Persia, Turki, India, hingga penyebarannya di Nusantara. Disusun sebagai bahan rujukan penting bagi pelajar dan mahasiswa studi keislaman, buku ini memadukan ketajaman analisis sejarah dengan penyajian yang sistematis dan mudah dipahami.',
            'penerbit' => 'Rajawali Pers',
            'tahun' => '2008',
            'isbn' => '979-421-337-3',
            'kategori_label' => 'Buku Teks Akademik',
            'rak' => 'Agama - 05B',
            'nomor_panggil' => '297.09 BAD s',
            'total' => 10, 'tersedia' => 7, 'dipinjam' => 3,
        ],
        4 => [
            'judul' => 'The Things You Can See Only When You Slow Down',
            'penulis' => 'Haemin Sunim',
            'kategori' => 'Pengembangan Diri',
            'kategori_class' => 'motivasi',
            'cover' => 'slow-down-sampul.jpg',
            'sinopsis' => 'Dunia bergerak dengan cepat, tetapi tidak berarti kita juga harus begitu. Melalui buku ini, guru meditasi Zen Haemin Sunim mengajak pembaca menyadari bahwa ketika kita melambat, dunia pun ikut melambat bersama kita. Berisi esai-esai pendek dan kata mutiara reflektif tentang istirahat, hubungan antarmanusia, cinta, dan pekerjaan, buku best seller ini membimbing kita menemukan keseimbangan dan kedamaian batin di tengah hiruk-pikuk kehidupan modern.',
            'penerbit' => 'Penerbit POP (KPG)',
            'tahun' => '2020',
            'isbn' => '978-602-481-365-9',
            'kategori_label' => 'Self Improvement',
            'rak' => 'Pengembangan Diri - 03A',
            'nomor_panggil' => '155.2 SUN t',
            'total' => 8, 'tersedia' => 8, 'dipinjam' => 0,
        ],
    ];

    // Ambil id dari route (?id=) — default 1
    $id = request()->route('id') ?? request('id') ?? 1;
    $buku = $dataBuku[$id] ?? $dataBuku[1];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $buku['judul'] }} – Perpustakaan SMAIT Al-Uswah</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style-home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-home-anggota.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-home-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-informasi-buku-admin.css') }}">
</head>
<body class="admin-page">

    {{-- ===== NAVBAR (3 role) ===== --}}
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

    {{-- ===== BREADCRUMB + HERO ===== --}}
    <section class="info-hero">
        <div class="info-hero-inner">
            <nav class="breadcrumb">
                <a href="{{ route('katalog-admin') }}">Katalog</a>
                <span class="breadcrumb-sep">&rsaquo;</span>
                <span class="breadcrumb-current">Detail Buku</span>
            </nav>

            <div class="info-hero-banner">
                <div class="info-hero-text">
                    <h1 class="info-hero-title">Informasi Detail Buku</h1>
                    <p class="info-hero-sub">Temukan keajaiban dalam setiap halaman...</p>
                </div>
                <div class="info-hero-deco">
                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="rgba(45,112,118,.25)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== DETAIL BUKU ===== --}}
    <section class="info-detail">
        <div class="info-detail-inner">

            {{-- LEFT: cover + tombol --}}
            <div class="info-left">
                <div class="info-cover-wrap">
                    <span class="info-bookmark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#8a5a2b" stroke="none"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg>
                    </span>
                    <img src="{{ asset('assets/' . $buku['cover']) }}" alt="{{ $buku['judul'] }}" class="info-cover">
                </div>

<a href="{{ route('edit-buku', ['id' => $id]) }}" class="btn-pinjam">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        Edit Buku Ini
                    </a>
            </div>

            {{-- RIGHT: info --}}
            <div class="info-right">
                <span class="info-kategori kategori-{{ $buku['kategori_class'] }}">{{ $buku['kategori'] }}</span>
                <h2 class="info-judul">{{ $buku['judul'] }}</h2>
                <p class="info-penulis">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    {{ $buku['penulis'] }}
                </p>

                <div class="info-ringkasan">
                    <h3 class="ringkasan-title">Ringkasan Buku</h3>
                    <p class="ringkasan-text">{{ $buku['sinopsis'] }}</p>
                </div>

                {{-- Stok --}}
                <div class="info-stok">
                    <div class="stok-card stok-total">
                        <span class="stok-label">TOTAL EKSEMPLAR</span>
                        <span class="stok-value">{{ $buku['total'] }}</span>
                    </div>
                    <div class="stok-card stok-tersedia">
                        <span class="stok-label">TERSEDIA</span>
                        <span class="stok-value">{{ $buku['tersedia'] }}</span>
                    </div>
                    <div class="stok-card stok-dipinjam">
                        <span class="stok-label">DIPINJAM</span>
                        <span class="stok-value">{{ $buku['dipinjam'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== INFO TAMBAHAN (tab) ===== --}}
    <section class="info-tabs-section">
        <div class="info-tabs-inner">
            <div class="info-tabs-card">

                <div class="tabs-header">
                    <button class="tab-btn active" data-tab="tambahan">Informasi Tambahan</button>
                    <button class="tab-btn" data-tab="lokasi">Lokasi Koleksi</button>
                </div>

                {{-- Tab: Informasi Tambahan --}}
                <div class="tab-content active" id="tab-tambahan">
                    <div class="info-grid">
                        <div class="info-grid-row">
                            <span class="grid-label">Penerbit</span>
                            <span class="grid-value">{{ $buku['penerbit'] }}</span>
                        </div>
                        <div class="info-grid-row">
                            <span class="grid-label">Tahun Terbit</span>
                            <span class="grid-value">{{ $buku['tahun'] }}</span>
                        </div>
                        <div class="info-grid-row">
                            <span class="grid-label">ISBN</span>
                            <span class="grid-value">{{ $buku['isbn'] }}</span>
                        </div>
                        <div class="info-grid-row">
                            <span class="grid-label">Kategori</span>
                            <span class="grid-value">{{ $buku['kategori_label'] }}</span>
                        </div>
                    </div>

                    <div class="info-notice-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#b8742f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                        <p>Buku ini tersedia untuk dipinjam maksimal 7 hari kerja. Pastikan untuk menjaga kebersihan dan keutuhan halaman buku demi kenyamanan bersama.</p>
                    </div>
                </div>

                {{-- Tab: Lokasi Koleksi --}}
                <div class="tab-content" id="tab-lokasi">
                    <div class="info-grid">
                        <div class="info-grid-row">
                            <span class="grid-label">Rak</span>
                            <span class="grid-value">{{ $buku['rak'] }}</span>
                        </div>
                        <div class="info-grid-row">
                            <span class="grid-label">Nomor Panggil</span>
                            <span class="grid-value">{{ $buku['nomor_panggil'] }}</span>
                        </div>
                        <div class="info-grid-row">
                            <span class="grid-label">Status Koleksi</span>
                            <span class="grid-value">{{ $buku['tersedia'] > 0 ? 'Tersedia di Rak' : 'Sedang Dipinjam' }}</span>
                        </div>
                        <div class="info-grid-row">
                            <span class="grid-label">Lantai</span>
                            <span class="grid-value">Lantai 1 — Area Koleksi Umum</span>
                        </div>
                    </div>

                    <div class="info-notice-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2D7076" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <p>Tunjukkan Nomor Panggil di atas kepada petugas perpustakaan untuk mempermudah pencarian buku di rak.</p>
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

    <script src="{{ asset('js/script-informasi-buku-admin.js') }}"></script>
</body>
</html>