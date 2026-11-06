(() => {
  const bar = document.querySelector('.reading-progress-bar'); const article = document.querySelector('.single-post-content');
  if (!bar || !article) return;
  let ticking = false;
  const update = () => { const rect = article.getBoundingClientRect(); const total = Math.max(1, article.scrollHeight - window.innerHeight); const progress = Math.min(1, Math.max(0, (window.innerHeight - rect.top) / (article.scrollHeight + window.innerHeight))); bar.style.transform = `scaleX(${progress})`; ticking = false; };
  window.addEventListener('scroll', () => { if (!ticking) { window.requestAnimationFrame(update); ticking = true; } }, { passive: true }); update();
})();
