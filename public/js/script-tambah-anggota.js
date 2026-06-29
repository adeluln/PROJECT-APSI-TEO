/* ============================================================
   script-tambah-anggota.js
   Upload foto, hapus foto, validasi form, modal sukses
   ============================================================ */

/* ---- Elemen ---- */
const inputFoto        = document.getElementById('inputFoto');
const fotoPreview      = document.getElementById('fotoPreview');
const fotoPlaceholder  = document.getElementById('fotoPlaceholder');
const btnGantiFoto     = document.getElementById('btnGantiFoto');
const btnTriggerFoto   = document.getElementById('btnTriggerFoto');
const btnHapusFoto     = document.getElementById('btnHapusFoto');
const fotoWrap         = document.getElementById('fotoWrap');

const form             = document.getElementById('formTambahAnggota');
const modalSukses      = document.getElementById('modalSukses');
const btnTambahLagi    = document.getElementById('btnTambahLagi');
const toast            = document.getElementById('toast');

const eyePass          = document.getElementById('eyePass');
const eyePassIcon      = document.getElementById('eyePassIcon');
const eyeKonfirmasi    = document.getElementById('eyeKonfirmasi');
const eyeKonfirmasiIcon = document.getElementById('eyeKonfirmasiIcon');

/* ============================================================
   FOTO PROFIL
   ============================================================ */

function triggerFotoPicker() {
    inputFoto.click();
}

btnTriggerFoto.addEventListener('click', triggerFotoPicker);
btnGantiFoto.addEventListener('click', triggerFotoPicker);
fotoWrap.addEventListener('click', function (e) {
    // hanya trigger jika bukan klik tombol hapus
    if (e.target !== btnHapusFoto) triggerFotoPicker();
});

inputFoto.addEventListener('change', function () {
    const file = this.files?.[0];
    if (!file) return;

    if (!file.type.startsWith('image/')) {
        showToast('File harus berupa gambar (JPG atau PNG).', '#c0392b');
        this.value = '';
        return;
    }

    if (file.size > 2 * 1024 * 1024) {
        showToast('Ukuran foto maks 2MB.', '#c0392b');
        this.value = '';
        return;
    }

    const reader = new FileReader();
    reader.onload = function (e) {
        fotoPreview.src = e.target.result;
        fotoPreview.classList.remove('hidden');
        fotoPlaceholder.style.display = 'none';
        btnHapusFoto.classList.remove('hidden');
        // ubah border jadi solid saat ada foto
        fotoWrap.style.border = '2.5px solid var(--primary)';
    };
    reader.readAsDataURL(file);
});

btnHapusFoto.addEventListener('click', function (e) {
    e.stopPropagation();
    fotoPreview.src = '';
    fotoPreview.classList.add('hidden');
    fotoPlaceholder.style.display = '';
    btnHapusFoto.classList.add('hidden');
    inputFoto.value = '';
    fotoWrap.style.border = '2.5px dashed #90C3C6';
});

/* ============================================================
   TOGGLE TAMPILKAN PASSWORD
   ============================================================ */

const EYE_OPEN = `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
const EYE_CLOSED = `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
<path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
<line x1="1" y1="1" x2="23" y2="23"/>`;

function toggleEye(inputId, iconEl) {
    const input = document.getElementById(inputId);
    if (input.type === 'password') {
        input.type = 'text';
        iconEl.innerHTML = EYE_CLOSED;
    } else {
        input.type = 'password';
        iconEl.innerHTML = EYE_OPEN;
    }
}

eyePass.addEventListener('click', () => toggleEye('password', eyePassIcon));
eyeKonfirmasi.addEventListener('click', () => toggleEye('konfirmasi', eyeKonfirmasiIcon));

/* ============================================================
   VALIDASI FORM
   ============================================================ */

function setError(fieldId, errId, msg) {
    const field = document.getElementById(fieldId);
    const err   = document.getElementById(errId);
    if (msg) {
        field?.classList.add('is-error');
        if (err) err.textContent = msg;
    } else {
        field?.classList.remove('is-error');
        if (err) err.textContent = '';
    }
}

function clearAllErrors() {
    document.querySelectorAll('.is-error').forEach(el => el.classList.remove('is-error'));
    document.querySelectorAll('.ta-error').forEach(el => el.textContent = '');
}

// Bersihkan error saat field diedit
['nis','nama','kelas','hp','email','username','password','konfirmasi'].forEach(id => {
    const el = document.getElementById(id);
    if (el) {
        el.addEventListener('input', () => {
            el.classList.remove('is-error');
            const errEl = document.getElementById('err-' + id);
            if (errEl) errEl.textContent = '';
        });
    }
});

function validateForm() {
    clearAllErrors();
    let valid = true;

    const nis        = document.getElementById('nis').value.trim();
    const nama       = document.getElementById('nama').value.trim();
    const kelas      = document.getElementById('kelas').value;
    const hp         = document.getElementById('hp').value.trim();
    const email      = document.getElementById('email').value.trim();
    const username   = document.getElementById('username').value.trim();
    const password   = document.getElementById('password').value;
    const konfirmasi = document.getElementById('konfirmasi').value;

    if (!nis) {
        setError('nis', 'err-nis', 'NIS wajib diisi.');
        valid = false;
    } else if (!/^\d{6,20}$/.test(nis)) {
        setError('nis', 'err-nis', 'NIS hanya berisi angka (6–20 digit).');
        valid = false;
    }

    if (!nama) {
        setError('nama', 'err-nama', 'Nama lengkap wajib diisi.');
        valid = false;
    } else if (nama.length < 3) {
        setError('nama', 'err-nama', 'Nama minimal 3 karakter.');
        valid = false;
    }

    if (!kelas) {
        setError('kelas', 'err-kelas', 'Pilih kelas terlebih dahulu.');
        valid = false;
    }

    if (!hp) {
        setError('hp', 'err-hp', 'Nomor HP wajib diisi.');
        valid = false;
    } else if (!/^0\d{8,14}$/.test(hp)) {
        setError('hp', 'err-hp', 'Nomor HP tidak valid. Contoh: 081234567890');
        valid = false;
    }

    if (!email) {
        setError('email', 'err-email', 'Email wajib diisi.');
        valid = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        setError('email', 'err-email', 'Format email tidak valid.');
        valid = false;
    }

    if (!username) {
        setError('username', 'err-username', 'Username wajib diisi.');
        valid = false;
    } else if (username.length < 4) {
        setError('username', 'err-username', 'Username minimal 4 karakter.');
        valid = false;
    } else if (/\s/.test(username)) {
        setError('username', 'err-username', 'Username tidak boleh mengandung spasi.');
        valid = false;
    }

    if (!password) {
        setError('password', 'err-password', 'Password wajib diisi.');
        valid = false;
    } else if (password.length < 8) {
        setError('password', 'err-password', 'Password minimal 8 karakter.');
        valid = false;
    }

    if (!konfirmasi) {
        setError('konfirmasi', 'err-konfirmasi', 'Konfirmasi password wajib diisi.');
        valid = false;
    } else if (password && konfirmasi !== password) {
        setError('konfirmasi', 'err-konfirmasi', 'Password tidak cocok. Coba lagi.');
        valid = false;
    }

    return valid;
}

/* ============================================================
   SUBMIT FORM
   ============================================================ */

form.addEventListener('submit', function (e) {
    e.preventDefault();
    if (!validateForm()) {
        // scroll ke error pertama
        const firstErr = document.querySelector('.is-error');
        if (firstErr) {
            firstErr.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
        return;
    }
    openModal('modalSukses');
});

/* ============================================================
   MODAL
   ============================================================ */

function openModal(id) {
    document.getElementById(id)?.classList.add('active');
}

function closeModal(id) {
    document.getElementById(id)?.classList.remove('active');
}

// Klik background tutup modal
modalSukses.addEventListener('click', function (e) {
    if (e.target === modalSukses) closeModal('modalSukses');
});

// Escape tutup modal
document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeModal('modalSukses');
});

// Tombol "Tambah Lagi" — reset form, tutup modal
btnTambahLagi.addEventListener('click', function () {
    closeModal('modalSukses');
    form.reset();
    clearAllErrors();
    // reset foto
    fotoPreview.src = '';
    fotoPreview.classList.add('hidden');
    fotoPlaceholder.style.display = '';
    btnHapusFoto.classList.add('hidden');
    inputFoto.value = '';
    fotoWrap.style.border = '2.5px dashed #90C3C6';
    // scroll ke atas
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

/* ============================================================
   TOAST
   ============================================================ */

function showToast(msg, color) {
    toast.textContent = msg;
    toast.style.background = color || 'var(--primary)';
    toast.classList.add('show');
    clearTimeout(toast._x);
    toast._x = setTimeout(() => toast.classList.remove('show'), 2800);
}