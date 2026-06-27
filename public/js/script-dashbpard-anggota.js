/**
 * script-dashboard-anggota.js
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

/* ── Animate chart bars on load ── */
(function () {
    const bars = document.querySelectorAll('.chart-bar');

    // Simpan nilai asli, set ke 0 dulu
    bars.forEach(bar => {
        const target = bar.style.getPropertyValue('--val');
        bar.dataset.target = target;
        bar.style.height = '0%';
    });

    // Trigger animasi setelah render
    requestAnimationFrame(() => {
        setTimeout(() => {
            bars.forEach(bar => {
                bar.style.height = bar.dataset.target;
            });
        }, 150);
    });
})();

/* ── Animate peringkat progress bar ── */
(function () {
    const fill = document.querySelector('.peringkat-progress-fill');
    if (fill) {
        const target = fill.style.width;
        fill.style.width = '0%';
        requestAnimationFrame(() => {
            setTimeout(() => { fill.style.width = target; }, 200);
        });
    }
})();

/* ── Pinjaman menu (placeholder) ── */
document.querySelectorAll('.pinjaman-menu').forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.stopPropagation();
        // Tempat untuk dropdown menu (perpanjang, detail, dll)
        console.log('Menu pinjaman diklik');
    });
});