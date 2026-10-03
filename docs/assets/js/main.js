document.documentElement.classList.remove('no-js');
document.addEventListener('DOMContentLoaded', () => {
  /* ---------- Mobile menu ---------- */
  const menuBtn = document.querySelector('.menu-btn');
  const mainNav = document.querySelector('.main-nav');
  if (menuBtn && mainNav) {
    const closeMenu = () => {
      mainNav.classList.remove('open');
      menuBtn.classList.remove('open');
      menuBtn.setAttribute('aria-expanded', 'false');
    };
    menuBtn.addEventListener('click', () => {
      const open = mainNav.classList.toggle('open');
      menuBtn.classList.toggle('open', open);
      menuBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    mainNav.querySelectorAll('a').forEach(a =>
      a.addEventListener('click', closeMenu)
    );
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape') closeMenu();
    });
    window.addEventListener('resize', () => {
      if (window.innerWidth > 960) closeMenu();
    });
  }

  /* ---------- Header shadow ---------- */
  const header = document.querySelector('.site-header');
  const toTop = document.querySelector('.to-top');
  const onScroll = () => {
    const y = window.scrollY;
    if (header) header.classList.toggle('scrolled', y > 8);
    if (toTop) toTop.classList.toggle('show', y > 600);
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
  if (toTop) toTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

  /* ---------- Reveal on scroll ---------- */
  const els = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && els.length) {
    const io = new IntersectionObserver(
      entries => entries.forEach(e => {
        if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
      }),
      { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
    );
    els.forEach(el => io.observe(el));
  } else {
    els.forEach(el => el.classList.add('in'));
  }

  /* ---------- Hero slideshow (crossfade) ---------- */
  const hero = document.querySelector('.hero[data-slideshow]');
  const dotsWrap = document.querySelector('.hero-dots');
  if (hero) {
    const images = (hero.dataset.slideshow || '').split('|').filter(Boolean);
    images.forEach(src => { const im = new Image(); im.src = src; });
    let idx = 0;
    let layerA = hero.querySelector('.hero-bg');
    if (!layerA) return;
    // build dots (idempotent)
    if (dotsWrap) dotsWrap.innerHTML = '';
    if (dotsWrap && images.length > 1) {
      images.forEach((_, i) => {
        const b = document.createElement('button');
        b.type = 'button';
        b.setAttribute('aria-label', 'Slide ' + (i + 1));
        if (i === 0) b.classList.add('on');
        b.addEventListener('click', () => go(i, true));
        dotsWrap.appendChild(b);
      });
    }
    const dots = dotsWrap ? [...dotsWrap.children] : [];
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    function go(n, manual) {
      idx = (n + images.length) % images.length;
      if (reduceMotion) {
        layerA.style.backgroundImage = `url('${images[idx]}')`;
      } else {
        layerA.classList.add('fading');
        setTimeout(() => {
          layerA.style.backgroundImage = `url('${images[idx]}')`;
          layerA.classList.remove('fading');
        }, 350);
      }
      dots.forEach((d, i) => d.classList.toggle('on', i === idx));
      if (manual) restart();
    }
    let timer = null;
    function restart() {
      if (timer) clearInterval(timer);
      if (images.length > 1 && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        timer = setInterval(() => go(idx + 1), 5500);
      }
    }
    // set initial
    layerA.style.backgroundImage = `url('${images[0]}')`;
    restart();
  }

  /* ---------- Animated counters ---------- */
  const counters = document.querySelectorAll('[data-count]');
  if (counters.length && 'IntersectionObserver' in window) {
    const cio = new IntersectionObserver(entries => entries.forEach(e => {
      if (!e.isIntersecting) return;
      const el = e.target; cio.unobserve(el);
      const target = parseFloat(el.dataset.count);
      const suffix = el.dataset.suffix || '';
      const dur = 1400; const t0 = performance.now();
      function tick(t) {
        const p = Math.min(1, (t - t0) / dur);
        const eased = 1 - Math.pow(1 - p, 3);
        el.textContent = (target % 1 ? (target * eased).toFixed(1) : Math.round(target * eased)) + suffix;
        if (p < 1) requestAnimationFrame(tick);
      }
      requestAnimationFrame(tick);
    }), { threshold: 0.5 });
    counters.forEach(c => cio.observe(c));
  }

  /* ---------- Project filters ---------- */
  const filterBtns = document.querySelectorAll('.filters button');
  const cards = document.querySelectorAll('[data-cat]');
  if (filterBtns.length) {
    filterBtns.forEach(btn => btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('on'));
      btn.classList.add('on');
      const f = btn.dataset.filter;
      cards.forEach(c => {
        const show = f === 'all' || c.dataset.cat === f;
        c.style.display = show ? '' : 'none';
        if (show) { c.classList.remove('in'); requestAnimationFrame(() => requestAnimationFrame(() => c.classList.add('in'))); }
      });
    }));
  }

  /* ---------- Pricing cards -> contact (non-link cards only; anchors navigate natively) ---------- */
  document.querySelectorAll('[data-goto-contact]').forEach(card => {
    if (card.tagName === 'A') return;
    card.addEventListener('click', () => (window.location.href = 'contact.php'));
    card.addEventListener('keydown', e => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        window.location.href = 'contact.php';
      }
    });
  });

  /* ---------- Footer year ---------- */
  document.querySelectorAll('[data-year]').forEach(el => (el.textContent = new Date().getFullYear()));
});
