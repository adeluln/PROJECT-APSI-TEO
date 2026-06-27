/**
 * script-register.js
 * Perpustakaan SMAIT Al-Uswah
 *
 * Validasi:
 * - Semua field wajib diisi
 * - Email harus format @gmail.com
 * - Password min 8 karakter, bisa ditampilkan/disembunyikan
 * - Konfirmasi password harus cocok
 * - Username otomatis dari nama lengkap
 * - Pop-up sukses saat berhasil submit
 */

'use strict';

/* ── Helper: get element ── */
const $ = id => document.getElementById(id);

/* ── Helper: show/clear error ── */
function showError(fieldId, errId, msg) {
    const field = $(fieldId);
    const err   = $(errId);
    if (field) field.classList.add('is-error');
    if (err)   err.textContent = msg;
}

function clearError(fieldId, errId) {
    const field = $(fieldId);
    const err   = $(errId);
    if (field) field.classList.remove('is-error');
    if (err)   err.textContent = '';
}

/* ── Helper: clear all errors ── */
function clearAllErrors() {
    const pairs = [
        ['nama_lengkap','err-nama'],
        ['nis','err-nis'],
        ['kelas','err-kelas'],
        ['email','err-email'],
        ['nomor_hp','err-hp'],
        ['alamat','err-alamat'],
        ['password','err-password'],
        ['konfirmasi_password','err-konfirmasi'],
    ];
    pairs.forEach(([f,e]) => clearError(f, e));
}

/* =========================================================
   PASSWORD TOGGLE (eye icon)
   ========================================================= */
document.querySelectorAll('.eye-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const targetId = btn.dataset.target;
        const input    = $(targetId);
        const eyeOff   = btn.querySelector('.eye-off');
        const eyeOn    = btn.querySelector('.eye-on');

        if (!input) return;

        if (input.type === 'password') {
            input.type = 'text';
            eyeOff.classList.add('hidden');
            eyeOn.classList.remove('hidden');
        } else {
            input.type = 'password';
            eyeOff.classList.remove('hidden');
            eyeOn.classList.add('hidden');
        }
    });
});

/* =========================================================
   REAL-TIME: clear error on input
   ========================================================= */
const liveFields = [
    ['nama_lengkap','err-nama'],
    ['nis','err-nis'],
    ['kelas','err-kelas'],
    ['email','err-email'],
    ['nomor_hp','err-hp'],
    ['alamat','err-alamat'],
    ['password','err-password'],
    ['konfirmasi_password','err-konfirmasi'],
];

liveFields.forEach(([fieldId, errId]) => {
    const el = $(fieldId);
    if (!el) return;
    el.addEventListener('input',  () => clearError(fieldId, errId));
    el.addEventListener('change', () => clearError(fieldId, errId));
});

/* =========================================================
   VALIDATION
   ========================================================= */
function validateForm() {
    clearAllErrors();
    let isValid = true;

    const nama      = $('nama_lengkap')?.value.trim()  || '';
    const nis       = $('nis')?.value.trim()            || '';
    const kelas     = $('kelas')?.value                 || '';
    const email     = $('email')?.value.trim()          || '';
    const hp        = $('nomor_hp')?.value.trim()       || '';
    const alamat    = $('alamat')?.value.trim()         || '';
    const password  = $('password')?.value              || '';
    const konfirm   = $('konfirmasi_password')?.value   || '';

    /* Nama Lengkap */
    if (!nama) {
        showError('nama_lengkap', 'err-nama', 'Nama lengkap wajib diisi.');
        isValid = false;
    } else if (nama.length < 3) {
        showError('nama_lengkap', 'err-nama', 'Nama minimal 3 karakter.');
        isValid = false;
    }

    /* NIS */
    if (!nis) {
        showError('nis', 'err-nis', 'NIS wajib diisi.');
        isValid = false;
    } else if (!/^\d{5,12}$/.test(nis)) {
        showError('nis', 'err-nis', 'NIS harus berupa angka (5–12 digit).');
        isValid = false;
    }

    /* Kelas */
    if (!kelas) {
        showError('kelas', 'err-kelas', 'Silakan pilih kelas.');
        isValid = false;
    }

    /* Email – wajib dan harus @gmail.com */
    if (!email) {
        showError('email', 'err-email', 'Email wajib diisi.');
        isValid = false;
    } else if (!email.toLowerCase().endsWith('@gmail.com')) {
        showError('email', 'err-email', 'Email harus menggunakan @gmail.com.');
        isValid = false;
    } else if (!/^[^\s@]+@gmail\.com$/.test(email.toLowerCase())) {
        showError('email', 'err-email', 'Format email tidak valid.');
        isValid = false;
    }

    /* Nomor HP */
    if (!hp) {
        showError('nomor_hp', 'err-hp', 'Nomor HP wajib diisi.');
        isValid = false;
    } else if (!/^08\d{7,13}$/.test(hp)) {
        showError('nomor_hp', 'err-hp', 'Nomor HP harus diawali 08 (cth: 081234567890).');
        isValid = false;
    }

    /* Alamat */
    if (!alamat) {
        showError('alamat', 'err-alamat', 'Alamat wajib diisi.');
        isValid = false;
    } else if (alamat.length < 10) {
        showError('alamat', 'err-alamat', 'Alamat terlalu singkat, mohon isi lebih lengkap.');
        isValid = false;
    }

    /* Password */
    if (!password) {
        showError('password', 'err-password', 'Password wajib diisi.');
        isValid = false;
    } else if (password.length < 8) {
        showError('password', 'err-password', 'Password minimal 8 karakter.');
        isValid = false;
    }

    /* Konfirmasi Password */
    if (!konfirm) {
        showError('konfirmasi_password', 'err-konfirmasi', 'Konfirmasi password wajib diisi.');
        isValid = false;
    } else if (konfirm !== password) {
        showError('konfirmasi_password', 'err-konfirmasi', 'Password dan konfirmasi tidak cocok.');
        isValid = false;
    }

    return isValid;
}

/* =========================================================
   MODAL
   ========================================================= */
function showSuccessModal() {
    const overlay = $('modalOverlay');
    if (overlay) overlay.classList.add('active');
}

function hideSuccessModal() {
    const overlay = $('modalOverlay');
    if (overlay) overlay.classList.remove('active');
}

/* Close modal on backdrop click */
const overlay = $('modalOverlay');
if (overlay) {
    overlay.addEventListener('click', e => {
        if (e.target === overlay) hideSuccessModal();
    });
}

/* Close on Escape */
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') hideSuccessModal();
});

/* =========================================================
   FORM SUBMIT
   ========================================================= */
const form    = $('registerForm');
const btnDaftar = $('btnDaftar');

if (form) {
    form.addEventListener('submit', async e => {
        e.preventDefault();

        if (!validateForm()) {
            /* Scroll to first error */
            const firstError = form.querySelector('.is-error');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstError.focus();
            }
            return;
        }

        /* Loading state */
        btnDaftar.disabled = true;
        btnDaftar.textContent = 'Mendaftarkan...';

        /* --- Simulate / real Laravel submit ---
           Jika mau submit real ke Laravel, hapus simulasi ini
           dan gunakan fetch / form action biasa.
        ---------------------------------------- */
        try {
            // Simulasi delay network (hapus blok ini untuk production)
            await new Promise(resolve => setTimeout(resolve, 1200));

            /* Kalau pakai Laravel real:
            const formData = new FormData(form);
            const response = await fetch(form.action || '/register', {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });
            if (!response.ok) throw new Error('Server error');
            */

            showSuccessModal();
            form.reset();
        } catch (err) {
            console.error('Pendaftaran gagal:', err);
            alert('Terjadi kesalahan. Silakan coba lagi.');
        } finally {
            btnDaftar.disabled = false;
            btnDaftar.textContent = 'Daftar Sekarang';
        }
    });
}

/* =========================================================
   NIS – only allow digits
   ========================================================= */
const nisInput = $('nis');
if (nisInput) {
    nisInput.addEventListener('keypress', e => {
        if (!/\d/.test(e.key) && e.key !== 'Backspace') e.preventDefault();
    });
}

/* =========================================================
   Nomor HP – only allow digits
   ========================================================= */
const hpInput = $('nomor_hp');
if (hpInput) {
    hpInput.addEventListener('keypress', e => {
        if (!/\d/.test(e.key) && e.key !== 'Backspace') e.preventDefault();
    });
}

/* =========================================================
   INFO: Username otomatis dari nama
   (Diproses di backend Laravel — nama_lengkap → username)
   ========================================================= */