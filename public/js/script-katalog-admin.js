/**
 * script-katalog.js
 * Perpustakaan SMAIT Al-Uswah
 *
 * Fitur:
 * - Search realtime (judul + penulis)
 * - Filter kategori
 * - Sort (terbaru, terlama, A-Z, Z-A, tersedia)
 * - Pagination (client-side, 8 per halaman)
 * - Empty state
 */

'use strict';

document.addEventListener('DOMContentLoaded', function () {

/* =========================================================
   STATE
   ========================================================= */
const state = {
    query:     '',
    kategori:  'semua',
    sort:      'terbaru',
    page:      1,
    perPage:   8,
};

/* =========================================================
   ELEMENTS
   ========================================================= */
const heroSearch  = document.getElementById('heroSearch');
const btnHeroSearch = document.getElementById('btnHeroSearch');
const sortSelect  = document.getElementById('sortSelect');
const bukuGrid    = document.getElementById('bukuGrid');
const emptyState  = document.getElementById('emptyState');
const hasilText   = document.getElementById('hasilText');
const pagination  = document.getElementById('pagination');
const pagePrev    = document.getElementById('pagePrev');
const pageNext    = document.getElementById('pageNext');
const btnReset    = document.getElementById('btnReset');

/* Semua kartu buku (NodeList → Array) */
const allCards = Array.from(document.querySelectorAll('.buku-card'));

/* =========================================================
   FILTER & RENDER
   ========================================================= */
function getFiltered() {
    return allCards.filter(card => {
        const judul   = card.dataset.judul.toLowerCase();
        const penulis = card.dataset.penulis.toLowerCase();
        const kat     = card.dataset.kategori;
        const status  = card.dataset.status;
        const q       = state.query.toLowerCase();

        const matchSearch   = !q || judul.includes(q) || penulis.includes(q);
        const matchKategori = state.kategori === 'semua' || kat === state.kategori;
        const matchStatus   = state.sort === 'tersedia' ? status === 'tersedia' : true;

        return matchSearch && matchKategori && matchStatus;
    });
}

function getSorted(cards) {
    return [...cards].sort((a, b) => {
        switch (state.sort) {
            case 'az':      return a.dataset.judul.localeCompare(b.dataset.judul);
            case 'za':      return b.dataset.judul.localeCompare(a.dataset.judul);
            case 'terlama': return Number(a.dataset.tahun) - Number(b.dataset.tahun);
            case 'terbaru': return Number(b.dataset.tahun) - Number(a.dataset.tahun);
            default:        return 0;
        }
    });
}

function render() {
    const filtered = getFiltered();
    const sorted   = getSorted(filtered);
    const total    = sorted.length;
    const totalPages = Math.max(1, Math.ceil(total / state.perPage));

    /* Clamp page */
    if (state.page > totalPages) state.page = totalPages;
    if (state.page < 1) state.page = 1;

    const start = (state.page - 1) * state.perPage;
    const end   = start + state.perPage;
    const pageCards = sorted.slice(start, end);

    /* Sembunyikan semua dulu */
    allCards.forEach(card => card.classList.add('hidden'));

    /* Tampilkan yang sesuai halaman, sekaligus atur urutan via flto order */
    pageCards.forEach((card, i) => {
        card.classList.remove('hidden');
        card.style.order = i;
    });

    /* Hasil info */
    hasilText.innerHTML = total === 0
        ? 'Tidak ada buku ditemukan'
        : `Menampilkan <strong>${start + 1}\u2013${Math.min(end, total)}</strong> dari <strong>${total}</strong> buku`;

    /* Empty state */
    emptyState.classList.toggle('hidden', total > 0);
    bukuGrid.style.display = total > 0 ? 'grid' : 'none';

    /* Pagination */
    renderPagination(totalPages);
}

/* =========================================================
   PAGINATION
   ========================================================= */
function renderPagination(totalPages) {
    /* Hapus semua page number buttons lama */
    const existing = pagination.querySelectorAll('[data-page], .page-dots');
    existing.forEach(el => el.remove());

    if (totalPages <= 1) {
        pagination.style.display = 'none';
        return;
    }

    pagination.style.display = 'flex';

    /* Prev */
    pagePrev.disabled = state.page === 1;

    /* Generate page numbers */
    const pages = getPageNumbers(state.page, totalPages);

    pages.forEach(p => {
        if (p === '...') {
            const dots = document.createElement('span');
            dots.className = 'page-dots';
            dots.textContent = '...';
            pagination.insertBefore(dots, pageNext);
        } else {
            const btn = document.createElement('button');
            btn.className = 'page-btn' + (p === state.page ? ' active' : '');
            btn.dataset.page = p;
            btn.textContent = p;
            btn.addEventListener('click', () => {
                state.page = p;
                render();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
            pagination.insertBefore(btn, pageNext);
        }
    });

    /* Next */
    pageNext.disabled = state.page === totalPages;
}

function getPageNumbers(current, total) {
    if (total <= 5) return Array.from({ length: total }, (_, i) => i + 1);
    if (current <= 3) return [1, 2, 3, '...', total];
    if (current >= total - 2) return [1, '...', total - 2, total - 1, total];
    return [1, '...', current - 1, current, current + 1, '...', total];
}

/* =========================================================
   EVENT LISTENERS
   ========================================================= */

/* Search: hero */
heroSearch.addEventListener('input', () => {
    state.query = heroSearch.value.trim();
    state.page  = 1;
    render();
});

heroSearch.addEventListener('keydown', e => {
    if (e.key === 'Enter') render();
});

btnHeroSearch.addEventListener('click', () => render());

/* Filter kategori */
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        state.kategori = btn.dataset.kategori;
        state.page = 1;
        render();
    });
});

/* Sort */
sortSelect.addEventListener('change', () => {
    state.sort = sortSelect.value;
    state.page = 1;
    render();
});

/* Prev / Next */
pagePrev.addEventListener('click', () => {
    if (state.page > 1) {
        state.page--;
        render();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
});

pageNext.addEventListener('click', () => {
    state.page++;
    render();
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

/* Reset */
if (btnReset) {
    btnReset.addEventListener('click', () => {
        heroSearch.value = '';
        state.query    = '';
        state.kategori = 'semua';
        state.sort     = 'terbaru';
        state.page     = 1;
        sortSelect.value = 'terbaru';
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        document.querySelector('.filter-btn[data-kategori="semua"]').classList.add('active');
        render();
    });
}

/* =========================================================
   INIT — cek URL param ?q=
   ========================================================= */
(function init() {
    const params = new URLSearchParams(window.location.search);
    const q = params.get('q');
    if (q) {
        heroSearch.value = q;
        state.query = q;
    }
    render();
})();

}); /* end DOMContentLoaded */