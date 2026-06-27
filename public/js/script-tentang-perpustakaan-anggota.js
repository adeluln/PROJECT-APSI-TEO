/**
 * script-tentang-perpustakaan.js
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

/* ── Reveal on scroll (subtle fade-in) ── */
(function () {
    const observerOptions = { threshold: 0.12, rootMargin: '0px 0px -40px 0px' };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const targets = document.querySelectorAll(
        '.sejarah-card, .visi-card, .misi-card, .layanan-card, .tata-item'
    );

    targets.forEach((el, i) => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = `opacity .5s ease ${i * 0.04}s, transform .5s ease ${i * 0.04}s`;
        observer.observe(el);
    });
})();