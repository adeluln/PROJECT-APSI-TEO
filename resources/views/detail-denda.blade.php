@php
    $slug = request()->path();
    $slug = $slug === '/' ? 'home' : $slug;

    $pageData = [
        'register' => [
            'title' => 'Register',
            'category' => 'Pendaftaran Anggota',
            'description' => 'Halaman ini nantinya digunakan untuk pendaftaran anggota perpustakaan baru.'
        ],
        'log-in' => [
            'title' => 'Log In',
            'category' => 'Masuk ke Sistem',
            'description' => 'Halaman ini nantinya digunakan oleh anggota dan admin untuk masuk ke sistem.'
        ],
        'home' => [
            'title' => 'Home',
            'category' => 'Halaman Utama',
            'description' => 'Halaman utama perpustakaan yang menampilkan katalog, informasi, dan akses layanan.'
        ],
        'katalog' => [
            'title' => 'Katalog',
            'category' => 'Koleksi Buku',
            'description' => 'Halaman ini nantinya digunakan untuk melihat dan mencari koleksi buku perpustakaan.'
        ],
        'tentang-perpustakaan' => [
            'title' => 'Tentang Perpustakaan',
            'category' => 'Informasi Perpustakaan',
            'description' => 'Halaman ini nantinya berisi profil, layanan, dan informasi umum perpustakaan.'
        ],
        'dashboard-anggota' => [
            'title' => 'Dashboard Anggota',
            'category' => 'Area Anggota',
            'description' => 'Halaman ini nantinya menampilkan ringkasan pinjaman, denda, dan notifikasi anggota.'
        ],
        'informasi-buku' => [
            'title' => 'Informasi Buku',
            'category' => 'Detail Buku',
            'description' => 'Halaman ini nantinya menampilkan informasi detail buku, stok, lokasi rak, dan ulasan.'
        ],
        'riwayat-peminjaman' => [
            'title' => 'Riwayat Peminjaman',
            'category' => 'Data Peminjaman',
            'description' => 'Halaman ini nantinya menampilkan riwayat peminjaman dan pengembalian buku.'
        ],
        'status-denda' => [
            'title' => 'Status Denda',
            'category' => 'Informasi Denda',
            'description' => 'Halaman ini nantinya menampilkan denda aktif dan riwayat pembayaran denda.'
        ],
        'profil-anggota' => [
            'title' => 'Profil Anggota',
            'category' => 'Data Anggota',
            'description' => 'Halaman ini nantinya digunakan anggota untuk melihat dan mengubah data profil.'
        ],
        'dashboard-admin' => [
            'title' => 'Dashboard Admin',
            'category' => 'Area Admin',
            'description' => 'Halaman ini nantinya menampilkan ringkasan data perpustakaan untuk admin.'
        ],
        'kelola-buku' => [
            'title' => 'Kelola Buku',
            'category' => 'Manajemen Buku',
            'description' => 'Halaman ini nantinya digunakan admin untuk mengelola data koleksi buku.'
        ],
        'tambah-buku' => [
            'title' => 'Tambah Buku',
            'category' => 'Input Buku Baru',
            'description' => 'Halaman ini nantinya digunakan admin untuk menambahkan buku baru.'
        ],
        'edit-buku' => [
            'title' => 'Edit Buku',
            'category' => 'Ubah Data Buku',
            'description' => 'Halaman ini nantinya digunakan admin untuk mengubah data buku.'
        ],
        'kelola-anggota' => [
            'title' => 'Kelola Anggota',
            'category' => 'Manajemen Anggota',
            'description' => 'Halaman ini nantinya digunakan admin untuk mengelola data dan status anggota.'
        ],
        'riwayat-transaksi' => [
            'title' => 'Riwayat Transaksi',
            'category' => 'Data Transaksi',
            'description' => 'Halaman ini nantinya menampilkan data peminjaman dan pengembalian buku.'
        ],
        'input-peminjaman' => [
            'title' => 'Input Peminjaman',
            'category' => 'Transaksi Baru',
            'description' => 'Halaman ini nantinya digunakan admin untuk mencatat peminjaman buku.'
        ],
        'kelola-denda' => [
            'title' => 'Kelola Denda',
            'category' => 'Manajemen Denda',
            'description' => 'Halaman ini nantinya digunakan admin untuk mengelola denda anggota.'
        ],
        'detail-transaksi' => [
            'title' => 'Detail Transaksi',
            'category' => 'Informasi Transaksi',
            'description' => 'Halaman ini nantinya menampilkan detail transaksi peminjaman buku.'
        ],
        'detail-denda' => [
            'title' => 'Detail Denda',
            'category' => 'Informasi Denda',
            'description' => 'Halaman ini nantinya menampilkan detail denda dan validasi pembayaran.'
        ],
        'laporan' => [
            'title' => 'Laporan',
            'category' => 'Laporan Perpustakaan',
            'description' => 'Halaman ini nantinya digunakan admin untuk melihat dan mengekspor laporan.'
        ],
        'setting' => [
            'title' => 'Setting',
            'category' => 'Pengaturan Sistem',
            'description' => 'Halaman ini nantinya digunakan admin untuk mengatur konfigurasi sistem.'
        ],
        'kategori-rak' => [
            'title' => 'Kategori Rak',
            'category' => 'Kategori dan Rak Buku',
            'description' => 'Halaman ini nantinya digunakan admin untuk mengelola kategori dan lokasi rak buku.'
        ],
        'tambah-anggota' => [
            'title' => 'Tambah Anggota',
            'category' => 'Input Anggota Baru',
            'description' => 'Halaman ini nantinya digunakan admin untuk menambahkan anggota secara manual.'
        ],
    ];

    $page = $pageData[$slug] ?? [
        'title' => ucwords(str_replace('-', ' ', $slug)),
        'category' => 'Halaman Sementara',
        'description' => 'Halaman ini masih berupa placeholder sementara.'
    ];
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page['title'] }} - Perpustakaan SMAIT Al-Uswah</title>

    <link href="https://fonts.googleapis.com/css2?family=Allura&family=DM+Serif+Display&family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --deep-waters: #2D7076;
            --waves: #90C3C6;
            --seashell: #F8F7F2;
            --sand: #E9D9C4;
            --orchid: #D5C5DB;
            --pebble: #484441;
            --white: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: "Montserrat", sans-serif;
            color: var(--pebble);
            background:
                radial-gradient(circle at 8% 12%, rgba(213, 197, 219, 0.45), transparent 24%),
                radial-gradient(circle at 92% 8%, rgba(144, 195, 198, 0.48), transparent 26%),
                radial-gradient(circle at 80% 85%, rgba(233, 217, 196, 0.65), transparent 25%),
                var(--seashell);
            overflow-x: hidden;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .pattern {
            position: fixed;
            inset: 0;
            opacity: 0.055;
            pointer-events: none;
            background-image:
                radial-gradient(circle, var(--deep-waters) 2px, transparent 2px);
            background-size: 34px 34px;
        }

        .navbar {
            width: min(1180px, calc(100% - 40px));
            margin: 22px auto 0;
            padding: 14px 18px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.78);
            border: 1px solid rgba(45, 112, 118, 0.12);
            box-shadow: 0 18px 45px rgba(45, 112, 118, 0.11);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            position: sticky;
            top: 18px;
            z-index: 10;
            backdrop-filter: blur(14px);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--deep-waters);
            font-weight: 800;
            white-space: nowrap;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: var(--deep-waters);
            color: var(--seashell);
            box-shadow: 0 12px 24px rgba(45, 112, 118, 0.24);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .nav-links a {
            padding: 9px 13px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
            transition: 0.2s ease;
        }

        .nav-links a:hover {
            background: var(--sand);
            color: var(--deep-waters);
        }

        .nav-links .login-btn {
            background: var(--deep-waters);
            color: var(--seashell);
        }

        .container {
            width: min(1120px, calc(100% - 40px));
            margin: 54px auto 70px;
            position: relative;
            z-index: 1;
        }

        .hero {
            position: relative;
            overflow: hidden;
            padding: 64px;
            border-radius: 40px;
            background:
                linear-gradient(135deg, rgba(45, 112, 118, 0.97), rgba(45, 112, 118, 0.84)),
                var(--deep-waters);
            color: var(--seashell);
            box-shadow: 0 30px 80px rgba(45, 112, 118, 0.26);
        }

        .hero::before {
            content: "📚 ✦ 🔖 ✦ 📖 ✦";
            position: absolute;
            top: 30px;
            right: 42px;
            font-size: 52px;
            letter-spacing: 12px;
            opacity: 0.12;
        }

        .hero::after {
            content: "";
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: rgba(213, 197, 219, 0.28);
            position: absolute;
            right: -90px;
            bottom: -110px;
        }

        .badge {
            width: fit-content;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 9px 15px;
            margin-bottom: 20px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.14);
            color: var(--seashell);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        h1 {
            max-width: 720px;
            margin-bottom: 16px;
            font-family: "Alstoria", "DM Serif Display", serif;
            font-size: clamp(44px, 7vw, 88px);
            line-height: 0.95;
            letter-spacing: -1px;
        }

        .accent {
            margin-bottom: 18px;
            font-family: "Brittany", "Allura", cursive;
            font-size: 38px;
            color: var(--orchid);
        }

        .description {
            max-width: 680px;
            margin-bottom: 30px;
            font-size: 16px;
            line-height: 1.8;
            color: rgba(248, 247, 242, 0.88);
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 13px 18px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 800;
            transition: 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            background: var(--seashell);
            color: var(--deep-waters);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.14);
            color: var(--seashell);
            border: 1px solid rgba(255, 255, 255, 0.28);
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-top: 24px;
        }

        .card {
            padding: 24px;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.78);
            border: 1px solid rgba(45, 112, 118, 0.10);
            box-shadow: 0 18px 45px rgba(45, 112, 118, 0.09);
        }

        .card-icon {
            width: 46px;
            height: 46px;
            margin-bottom: 14px;
            display: grid;
            place-items: center;
            border-radius: 16px;
            background: var(--sand);
            color: var(--deep-waters);
            font-size: 20px;
        }

        .card h3 {
            margin-bottom: 8px;
            color: var(--deep-waters);
            font-size: 18px;
        }

        .card p {
            margin-bottom: 14px;
            color: rgba(72, 68, 65, 0.75);
            font-size: 13px;
            line-height: 1.7;
        }

        .card a {
            color: var(--deep-waters);
            font-size: 13px;
            font-weight: 800;
        }

        .quick-section {
            margin-top: 24px;
            padding: 28px;
            border-radius: 34px;
            background:
                linear-gradient(135deg, rgba(233, 217, 196, 0.80), rgba(144, 195, 198, 0.26));
            border: 1px solid rgba(45, 112, 118, 0.10);
        }

        .quick-section h2 {
            margin-bottom: 16px;
            color: var(--deep-waters);
            font-family: "Alstoria", "DM Serif Display", serif;
            font-size: 36px;
        }

        .chips {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .chip {
            padding: 10px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.68);
            border: 1px solid rgba(45, 112, 118, 0.10);
            color: var(--pebble);
            font-size: 13px;
            font-weight: 700;
            transition: 0.2s ease;
        }

        .chip:hover {
            background: var(--deep-waters);
            color: var(--seashell);
        }

        @media (max-width: 900px) {
            .navbar {
                align-items: flex-start;
                flex-direction: column;
                border-radius: 28px;
            }

            .nav-links {
                justify-content: flex-start;
            }

            .hero {
                padding: 40px 26px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="pattern"></div>

    <nav class="navbar">
        <a href="{{ url('/home') }}" class="brand">
            <span class="brand-icon">📚</span>
            <span>Perpustakaan Al-Uswah</span>
        </a>

        <div class="nav-links">
            <a href="{{ url('/home') }}">Home</a>
            <a href="{{ url('/katalog') }}">Katalog</a>
            <a href="{{ url('/tentang-perpustakaan') }}">Tentang</a>
            <a href="{{ url('/dashboard-anggota') }}">Anggota</a>
            <a href="{{ url('/dashboard-admin') }}">Admin</a>
            <a href="{{ url('/register') }}">Register</a>
            <a href="{{ url('/log-in') }}" class="login-btn">Login</a>
        </div>
    </nav>

    <main class="container">
        <section class="hero">
            <div class="badge">Halaman Sementara</div>

            <h1>{{ $page['title'] }}</h1>

            <div class="accent">{{ $page['category'] }}</div>

            <p class="description">
                {{ $page['description'] }}
                Tampilan ini masih placeholder sementara supaya tombol dan navigasi bisa langsung terhubung ke halaman yang dituju.
            </p>

            <div class="actions">
                <a href="{{ url('/home') }}" class="btn btn-primary">Kembali ke Home</a>
                <a href="{{ url('/katalog') }}" class="btn btn-secondary">Lihat Katalog</a>
            </div>
        </section>

        <section class="cards">
            <div class="card">
                <div class="card-icon">🔗</div>
                <h3>Link Sudah Aktif</h3>
                <p>Halaman ini sudah bisa dibuka melalui tombol, menu, atau URL sesuai route yang dibuat.</p>
                <a href="{{ url()->current() }}">Buka halaman ini</a>
            </div>

            <div class="card">
                <div class="card-icon">🧩</div>
                <h3>Masih Placeholder</h3>
                <p>Isi halaman belum final, jadi nanti bisa diganti dengan desain asli tanpa mengubah link.</p>
                <a href="{{ url('/dashboard-admin') }}">Cek dashboard admin</a>
            </div>

            <div class="card">
                <div class="card-icon">✨</div>
                <h3>Siap Dikembangkan</h3>
                <p>File halaman sudah tersedia, tinggal lanjutkan desain dan fitur sesuai kebutuhan sistem.</p>
                <a href="{{ url('/riwayat-transaksi') }}">Cek transaksi</a>
            </div>
        </section>

        <section class="quick-section">
            <h2>Daftar Halaman</h2>

            <div class="chips">
                <a class="chip" href="{{ url('/register') }}">Register</a>
                <a class="chip" href="{{ url('/log-in') }}">Log In</a>
                <a class="chip" href="{{ url('/home') }}">Home</a>
                <a class="chip" href="{{ url('/katalog') }}">Katalog</a>
                <a class="chip" href="{{ url('/tentang-perpustakaan') }}">Tentang Perpustakaan</a>

                <a class="chip" href="{{ url('/dashboard-anggota') }}">Dashboard Anggota</a>
                <a class="chip" href="{{ url('/informasi-buku') }}">Informasi Buku</a>
                <a class="chip" href="{{ url('/riwayat-peminjaman') }}">Riwayat Peminjaman</a>
                <a class="chip" href="{{ url('/status-denda') }}">Status Denda</a>
                <a class="chip" href="{{ url('/profil-anggota') }}">Profil Anggota</a>

                <a class="chip" href="{{ url('/dashboard-admin') }}">Dashboard Admin</a>
                <a class="chip" href="{{ url('/kelola-buku') }}">Kelola Buku</a>
                <a class="chip" href="{{ url('/tambah-buku') }}">Tambah Buku</a>
                <a class="chip" href="{{ url('/edit-buku') }}">Edit Buku</a>
                <a class="chip" href="{{ url('/kelola-anggota') }}">Kelola Anggota</a>
                <a class="chip" href="{{ url('/tambah-anggota') }}">Tambah Anggota</a>
                <a class="chip" href="{{ url('/riwayat-transaksi') }}">Riwayat Transaksi</a>
                <a class="chip" href="{{ url('/input-peminjaman') }}">Input Peminjaman</a>
                <a class="chip" href="{{ url('/kelola-denda') }}">Kelola Denda</a>
                <a class="chip" href="{{ url('/detail-transaksi') }}">Detail Transaksi</a>
                <a class="chip" href="{{ url('/detail-denda') }}">Detail Denda</a>
                <a class="chip" href="{{ url('/laporan') }}">Laporan</a>
                <a class="chip" href="{{ url('/setting') }}">Setting</a>
                <a class="chip" href="{{ url('/kategori-rak') }}">Kategori Rak</a>
            </div>
        </section>
    </main>
</body>
</html>