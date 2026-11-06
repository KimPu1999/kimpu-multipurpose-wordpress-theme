(() => {
  const singleOpen = document.querySelector('.homepage-builder')?.dataset.kimpuFaqSingleOpen === 'true';
  if (!singleOpen) return;
  document.querySelectorAll('.faq-list').forEach((list) => list.addEventListener('toggle', (event) => {
    if (!event.target.open || !event.target.matches('details')) return;
    list.querySelectorAll('details[open]').forEach((item) => { if (item !== event.target) item.open = false; });
  }, true));
})();
