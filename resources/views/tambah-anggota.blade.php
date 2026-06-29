<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota — Perpustakaan SMAIT Al-Uswah</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/style-home.css') }}?v={{ time() }}">
<link rel="stylesheet" href="{{ asset('css/style-home-anggota.css') }}?v={{ time() }}">
<link rel="stylesheet" href="{{ asset('css/style-home-admin.css') }}?v={{ time() }}">
<link rel="stylesheet" href="{{ asset('css/style-tambah-anggota.css') }}?v={{ time() }}">

    <style>
        :root {
            --primary: #2D7076;
            --secondary: #90C3C6;
            --bg: #F8F7F2;
            --card: #E9D9C4;
            --accent: #D5C5DB;
            --text: #484441;
            --radius: 14px;
            --radius-lg: 26px;
        }
    </style>
</head>
<body class="admin-page">

    {{-- ===================== NAVBAR ADMIN ===================== --}}
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('home-admin') }}" class="nav-brand">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="brand-logo">
                <span class="brand-name">Perpustakaan<span class="brand-accent"> Al-Uswah</span></span>
            </a>
            <ul class="nav-links">
                <li><a href="{{ route('home-admin') }}">Beranda</a></li>
                <li><a href="{{ route('katalog-admin') }}">Katalog</a></li>
                <li><a href="{{ route('tentang-perpustakaan-admin') }}">Tentang</a></li>
                <li><a href="{{ route('kelola-buku') }}">Buku</a></li>
                <li><a href="{{ route('kelola-anggota') }}" class="active">Anggota</a></li>
                <li><a href="{{ route('detail-transaksi') }}">Transaksi</a></li>
                <li><a href="{{ route('kelola-denda') }}">Denda</a></li>
            </ul>
            <div class="nav-profile">
                <span class="profile-label">Administrator</span>
                <div class="profile-avatar">
                    @if(auth()->user()?->foto)
                        <img src="{{ asset('assets/' . auth()->user()?->foto) }}" alt="Profil">
                    @else
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                        </svg>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    {{-- ===================== MAIN CONTENT ===================== --}}
    <main class="ta-main">
        <div class="ta-container">

            {{-- Header --}}
            <div class="ta-header">
                <div class="ta-header-left">
                    <span class="ta-eyebrow">
                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8" width="13" height="13">
                            <circle cx="8" cy="5" r="3"/><path d="M2 14c0-3.3 2.7-6 6-6s6 2.7 6 6"/>
                        </svg>
                        Tambah anggota baru
                    </span>
                    <h1 class="ta-title">Daftarkan Anggota Baru</h1>
                    <p class="ta-desc">Isi data siswa sesuai Kartu Pelajar untuk membuat akun perpustakaan.</p>
                </div>
                <div class="ta-header-illus" aria-hidden="true">
                    <svg viewBox="0 0 180 140" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" y="20" width="140" height="100" rx="12" fill="#2D7076" opacity=".08"/>
                        <rect x="35" y="35" width="110" height="70" rx="8" fill="#2D7076" opacity=".12"/>
                        <circle cx="90" cy="55" r="18" fill="#90C3C6" opacity=".5"/>
                        <path d="M68 88c0-12.2 9.9-22 22-22s22 9.8 22 22" stroke="#2D7076" stroke-width="2.5" stroke-linecap="round" opacity=".5"/>
                        <circle cx="90" cy="52" r="10" fill="#2D7076" opacity=".25"/>
                        <rect x="55" y="100" width="70" height="6" rx="3" fill="#90C3C6" opacity=".35"/>
                        <rect x="70" y="110" width="40" height="4" rx="2" fill="#90C3C6" opacity=".22"/>
                    </svg>
                </div>
            </div>

            {{-- Single Card Form --}}
            <div class="ta-card">

                {{-- Foto Profil --}}
                <div class="ta-foto-section">
                    <div class="ta-foto-wrap" id="fotoWrap">
                        <div class="ta-foto-placeholder" id="fotoPlaceholder">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="32" height="32">
                                <circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                            </svg>
                        </div>
                        <img id="fotoPreview" src="" alt="Preview foto" class="ta-foto-preview hidden">
                        <button type="button" class="ta-foto-overlay" id="btnGantiFoto" title="Ganti foto">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20">
                                <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                                <circle cx="12" cy="13" r="4"/>
                            </svg>
                        </button>
                        <input type="file" id="inputFoto" accept="image/jpeg,image/png" class="hidden">
                    </div>
                    <div class="ta-foto-info">
                        <p class="ta-foto-label">Foto Profil</p>
                        <p class="ta-foto-hint">Rasio 1:1 · Maks 2MB · JPG atau PNG</p>
                        <div class="ta-foto-actions">
                            <button type="button" class="btn-link-teal" id="btnTriggerFoto">Ganti Foto</button>
                            <span class="ta-foto-sep">·</span>
                            <button type="button" class="btn-link-red hidden" id="btnHapusFoto">Hapus Foto</button>
                        </div>
                    </div>
                </div>

                <div class="ta-divider"></div>

                {{-- Form Grid --}}
                <form id="formTambahAnggota" novalidate>

                    <p class="ta-section-label">Data Diri</p>
                    <div class="ta-grid">

                        <div class="ta-field">
                            <label for="nis">Nomor Induk Siswa (NIS) <span class="req">*</span></label>
                            <input type="text" id="nis" name="nis" placeholder="Contoh: 20241001" maxlength="20">
                            <span class="ta-error" id="err-nis"></span>
                        </div>

                        <div class="ta-field">
                            <label for="nama">Nama Lengkap <span class="req">*</span></label>
                            <input type="text" id="nama" name="nama" placeholder="Masukkan nama sesuai ijazah">
                            <span class="ta-error" id="err-nama"></span>
                        </div>

                        <div class="ta-field">
                            <label for="kelas">Kelas <span class="req">*</span></label>
                            <div class="ta-select-wrap">
                                <select id="kelas" name="kelas">
                                    <option value="">Pilih Kelas</option>
                                    <option value="X-A">X-A</option>
                                    <option value="X-B">X-B</option>
                                    <option value="X-C">X-C</option>
                                    <option value="XI-A">XI-A</option>
                                    <option value="XI-B">XI-B</option>
                                    <option value="XI-C">XI-C</option>
                                    <option value="XII-A">XII-A</option>
                                    <option value="XII-B">XII-B</option>
                                    <option value="XII-C">XII-C</option>
                                </select>
                                <svg class="ta-select-arrow" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 6l4 4 4-4"/>
                                </svg>
                            </div>
                            <span class="ta-error" id="err-kelas"></span>
                        </div>

                        <div class="ta-field">
                            <label for="hp">Nomor HP / WhatsApp <span class="req">*</span></label>
                            <input type="text" id="hp" name="hp" placeholder="081234567XXX" maxlength="15">
                            <span class="ta-error" id="err-hp"></span>
                        </div>

                        <div class="ta-field ta-field--full">
                            <label for="email">Alamat Email <span class="req">*</span></label>
                            <input type="email" id="email" name="email" placeholder="siswa@al-uswah.sch.id">
                            <span class="ta-error" id="err-email"></span>
                        </div>

                        <div class="ta-field ta-field--full">
                            <label for="alamat">Alamat Tinggal</label>
                            <textarea id="alamat" name="alamat" rows="3" placeholder="Jl. Al-Uswah No. 123..."></textarea>
                        </div>

                    </div>

                    <div class="ta-divider"></div>
                    <p class="ta-section-label">Data Akun</p>
                    <div class="ta-grid">

                        <div class="ta-field ta-field--full">
                            <label for="username">Username <span class="req">*</span></label>
                            <input type="text" id="username" name="username" placeholder="Contoh: siswa.alnama" maxlength="30" autocomplete="off">
                            <span class="ta-error" id="err-username"></span>
                        </div>

                        <div class="ta-field">
                            <label for="password">Password <span class="req">*</span></label>
                            <div class="ta-input-icon">
                                <input type="password" id="password" name="password" placeholder="Min. 8 karakter" autocomplete="new-password">
                                <button type="button" class="ta-eye" id="eyePass" aria-label="Tampilkan password">
                                    <svg id="eyePassIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                            </div>
                            <span class="ta-error" id="err-password"></span>
                        </div>

                        <div class="ta-field">
                            <label for="konfirmasi">Konfirmasi Password <span class="req">*</span></label>
                            <div class="ta-input-icon">
                                <input type="password" id="konfirmasi" name="konfirmasi" placeholder="Ulangi password" autocomplete="new-password">
                                <button type="button" class="ta-eye" id="eyeKonfirmasi" aria-label="Tampilkan konfirmasi">
                                    <svg id="eyeKonfirmasiIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                            </div>
                            <span class="ta-error" id="err-konfirmasi"></span>
                        </div>

                    </div>

                    {{-- Actions --}}
                    <div class="ta-actions">
                        <a href="{{ route('kelola-anggota') }}" class="btn-batal">Batal</a>
                        <button type="submit" class="btn-simpan">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="17" height="17">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                                <polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/>
                            </svg>
                            Simpan Anggota
                        </button>
                    </div>

                </form>
            </div>{{-- end ta-card --}}
        </div>{{-- end ta-container --}}
    </main>

    {{-- ===================== MODAL SUKSES ===================== --}}
    <div class="ta-modal-overlay" id="modalSukses">
        <div class="ta-modal">
            <div class="ta-modal-icon ta-modal-icon--green">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="32" height="32">
                    <path d="M20 6L9 17l-5-5"/>
                </svg>
            </div>
            <h3 class="ta-modal-title">Anggota Berhasil Ditambahkan!</h3>
            <p class="ta-modal-desc">Akun anggota baru telah dibuat. Anggota dapat langsung masuk menggunakan username dan password yang telah didaftarkan.</p>
            <div class="ta-modal-actions">
                <button class="btn-modal-outline" id="btnTambahLagi">Tambah Lagi</button>
                <a href="{{ route('kelola-anggota') }}" class="btn-modal-primary">Ke Daftar Anggota</a>
            </div>
        </div>
    </div>

    {{-- ===================== TOAST ===================== --}}
    <div class="ta-toast" id="toast"></div>

    {{-- ===================== FOOTER ADMIN ===================== --}}
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-brand">
                <span class="footer-brand-name">SMAIT Al-Uswah</span>
                <p class="footer-brand-desc">Sistem Perpustakaan Digital<br>SMAIT Al-Uswah</p>
            </div>
            <div class="footer-links">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="{{ route('home-admin') }}">Beranda</a></li>
                    <li><a href="{{ route('katalog-admin') }}">Katalog</a></li>
                    <li><a href="{{ route('kelola-buku') }}">Kelola Buku</a></li>
                    <li><a href="{{ route('kelola-anggota') }}">Kelola Anggota</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h4>Sistem</h4>
                <ul>
                    <li><a href="{{ route('dashboard-admin') }}">Dashboard</a></li>
                    <li><a href="{{ route('laporan') }}">Laporan</a></li>
                    <li><a href="{{ route('setting') }}">Pengaturan</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 Perpustakaan SMAIT Al-Uswah. Hak cipta dilindungi.</p>
        </div>
    </footer>

    <script src="{{ asset('js/script-tambah-anggota.js') }}"></script>
</body>
</html>