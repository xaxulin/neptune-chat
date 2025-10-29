(function () {
    const headerToggle = document.querySelector('.site-header__toggle');
    const primaryNav = document.querySelector('#primary-navigation');

    if (headerToggle && primaryNav) {
        headerToggle.addEventListener('click', () => {
            const isOpen = primaryNav.classList.toggle('is-open');
            headerToggle.setAttribute('aria-expanded', String(isOpen));
            document.body.classList.toggle('nav-open', isOpen);
        });

        primaryNav.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                if (primaryNav.classList.contains('is-open')) {
                    primaryNav.classList.remove('is-open');
                    headerToggle.setAttribute('aria-expanded', 'false');
                    document.body.classList.remove('nav-open');
                }
            });
        });
    }

    const smoothLinks = document.querySelectorAll('a[href^="#"]');

    smoothLinks.forEach((link) => {
        link.addEventListener('click', (event) => {
            const targetId = link.getAttribute('href');

            if (!targetId || targetId === '#') {
                return;
            }

            const target = document.querySelector(targetId);

            if (target) {
                event.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
})();
