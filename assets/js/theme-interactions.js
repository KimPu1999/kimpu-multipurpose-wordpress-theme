(() => {
  const searchButton = document.querySelector('.header-search-toggle'); const search = document.querySelector('#header-search');
  if (searchButton && search) searchButton.addEventListener('click', () => { const open = searchButton.getAttribute('aria-expanded') === 'true'; searchButton.setAttribute('aria-expanded', String(!open)); search.hidden = open; if (!open) { const input = search.querySelector('input'); if (input) input.focus(); } });
  const header = document.querySelector('.site-header.is-sticky');
  if (header) { const onScroll = () => header.classList.toggle('is-scrolled', window.scrollY > 8); onScroll(); window.addEventListener('scroll', onScroll, { passive: true }); }
})();
