/**
 * script-home-admin.js
 * Perpustakaan SMAIT Al-Uswah — Home Admin
 */

'use strict';

/* ── Active nav link ── */
(function () {
    const links = document.querySelectorAll('.nav-link');
    const current = window.location.pathname;

    links.forEach(function (link) {
        const href = link.getAttribute('href');

        if (href === current) {
            link.classList.add('active');
        }
    });
})();

/* ── Search: cari buku/anggota ── */
const searchInput = document.getElementById('searchInput');
const btnSearch = document.getElementById('btnSearch');

if (searchInput && btnSearch) {
    searchInput.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            const q = searchInput.value.trim();
            window.location.href = btnSearch.href + (q ? '?q=' + encodeURIComponent(q) : '');
        }
    });

    btnSearch.addEventListener('click', function (e) {
        const q = searchInput.value.trim();

        if (q) {
            e.preventDefault();
            window.location.href = btnSearch.href + '?q=' + encodeURIComponent(q);
        }
    });
}