/**
 * script-home-anggota.js
 * Perpustakaan SMAIT Al-Uswah
 */

'use strict';

/* ── Active nav link ── */
(function () {
    const links = document.querySelectorAll('.nav-link');
    const current = window.location.pathname;
    links.forEach(link => {
        if (link.getAttribute('href') === current) {
            link.classList.add('active');
        }
    });
})();

/* ── Search: Enter key triggers cari ── */
const searchInput = document.getElementById('searchInput');
const btnSearch   = document.getElementById('btnSearch');

if (searchInput && btnSearch) {
    searchInput.addEventListener('keydown', e => {
        if (e.key === 'Enter') {
            const q = searchInput.value.trim();
            window.location.href = btnSearch.href + (q ? '?q=' + encodeURIComponent(q) : '');
        }
    });

    btnSearch.addEventListener('click', e => {
        const q = searchInput.value.trim();
        if (q) {
            e.preventDefault();
            window.location.href = btnSearch.href + '?q=' + encodeURIComponent(q);
        }
    });
}