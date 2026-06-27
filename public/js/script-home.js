/**
 * script-home.js
 * Perpustakaan SMAIT Al-Uswah — Home Publik
 */

'use strict';

/* ── Search ── */
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

/* ── Login Prompt Modal ── */
function showLoginPrompt() {
    const modal = document.getElementById('loginPromptModal');
    if (modal) modal.classList.add('active');
}

function closeLoginPrompt() {
    const modal = document.getElementById('loginPromptModal');
    if (modal) modal.classList.remove('active');
}

/* Tutup modal klik backdrop */
const modal = document.getElementById('loginPromptModal');
if (modal) {
    modal.addEventListener('click', e => {
        if (e.target === modal) closeLoginPrompt();
    });
}

/* Tutup modal tekan Escape */
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeLoginPrompt();
});