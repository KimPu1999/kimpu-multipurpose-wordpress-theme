(() => {
  const copyButtons = document.querySelectorAll('[data-copy-link]');
  copyButtons.forEach((button) => button.addEventListener('click', () => {
    const value = button.getAttribute('data-copy-link');
    const status = button.parentElement.querySelector('.copy-link-status');
    const report = (message) => { if (status) status.textContent = message; };
    if (navigator.clipboard && window.isSecureContext) {
      navigator.clipboard.writeText(value).then(() => report('Link copied.')).catch(() => report('Copy failed.'));
      return;
    }
    const field = document.createElement('input'); field.value = value; field.setAttribute('readonly', ''); field.style.position = 'fixed'; field.style.opacity = '0'; document.body.appendChild(field); field.select();
    try { document.execCommand('copy'); report('Link copied.'); } catch (error) { report('Copy failed.'); }
    field.remove();
  }));
})();
