(() => {
  const i18n = window.kimpuBlogI18n || { copied: 'Link copied.', copy_failed: 'Copy failed.' };
  const copyButtons = document.querySelectorAll('[data-copy-link]');
  copyButtons.forEach((button) => button.addEventListener('click', () => {
    const value = button.getAttribute('data-copy-link');
    const status = button.parentElement.querySelector('.copy-link-status');
    const report = (message) => { if (status) status.textContent = message; };
    if (navigator.clipboard && window.isSecureContext) {
      navigator.clipboard.writeText(value).then(() => report(i18n.copied)).catch(() => report(i18n.copy_failed));
      return;
    }
    const field = document.createElement('input'); field.value = value; field.setAttribute('readonly', ''); field.style.position = 'fixed'; field.style.opacity = '0'; document.body.appendChild(field); field.select();
    try { document.execCommand('copy'); report(i18n.copied); } catch (error) { report(i18n.copy_failed); }
    field.remove();
  }));
})();
