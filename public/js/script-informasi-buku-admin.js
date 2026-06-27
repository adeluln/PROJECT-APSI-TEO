/**
 * script-informasi-buku-admin.js
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

/* ── Tab switching ── */
document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const tab = btn.dataset.tab;

        // Reset semua tombol & konten
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

        // Aktifkan yang dipilih
        btn.classList.add('active');
        const content = document.getElementById('tab-' + tab);
        if (content) content.classList.add('active');
    });
});