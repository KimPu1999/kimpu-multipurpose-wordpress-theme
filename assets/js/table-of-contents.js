(() => {
  document.querySelectorAll('.table-of-contents a').forEach((link) => link.addEventListener('click', (event) => {
    const target = document.getElementById(link.hash.slice(1)); if (!target) return; event.preventDefault(); target.scrollIntoView({ behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth', block: 'start' }); history.pushState(null, '', link.hash); target.setAttribute('tabindex', '-1'); target.focus({ preventScroll: true });
  }));
})();
