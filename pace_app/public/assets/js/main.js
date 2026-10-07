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

  /* ---------- Hero slideshow (mixed media) ---------- */
  const hero = document.querySelector('.hero[data-slideshow]');
  const dotsWrap = document.querySelector('.hero-dots');
  if (hero) {
    const items = (hero.dataset.slideshow || '').split('|').filter(Boolean);
    let idx = 0;
    const layerWrap = hero.querySelector('.hero-bg');
    if (!layerWrap) return;
    layerWrap.innerHTML = ''; // Clear if any

    const mediaEls = items.map((src, i) => {
      let el;
      if (src.endsWith('.mp4')) {
        el = document.createElement('video');
        el.src = src;
        el.muted = true;
        el.loop = true;
        el.playsInline = true;
        el.preload = i === 0 ? 'auto' : 'none'; // Only preload first video
      } else {
        el = document.createElement('div');
        el.style.backgroundImage = `url('${src}')`;
      }
      el.className = 'hero-media-item';
      if (i === 0) el.classList.add('active');
      layerWrap.appendChild(el);
      return el;
    });

    if (dotsWrap && items.length > 1) {
      dotsWrap.innerHTML = '';
      items.forEach((_, i) => {
        const b = document.createElement('button');
        b.type = 'button';
        b.setAttribute('aria-label', 'Slide ' + (i + 1));
        if (i === 0) b.classList.add('on');
        b.addEventListener('click', () => go(i, true));
        dotsWrap.appendChild(b);
      });
    }
    const dots = dotsWrap ? [...dotsWrap.children] : [];

    function go(n, manual) {
      const prevIdx = idx;
      idx = (n + items.length) % items.length;
      if (prevIdx === idx) return;

      mediaEls[prevIdx].classList.remove('active');
      mediaEls[idx].classList.add('active');

      if (mediaEls[idx].tagName === 'VIDEO') {
        mediaEls[idx].play().catch(() => {});
      }
      if (mediaEls[prevIdx].tagName === 'VIDEO') {
        setTimeout(() => mediaEls[prevIdx].pause(), 1200);
      }

      dots.forEach((d, i) => d.classList.toggle('on', i === idx));
      if (manual) restart();
    }

    let timer = null;
    function restart() {
      if (timer) clearInterval(timer);
      if (items.length > 1 && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        timer = setInterval(() => go(idx + 1), 6000);
      }
    }

    if (mediaEls[0].tagName === 'VIDEO') {
      mediaEls[0].play().catch(() => {});
    }
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
      const walkHeading = document.getElementById('walkthrough-heading');
      if (walkHeading) {
        walkHeading.style.display = (f === 'all' || f === 'walkthrough') ? '' : 'none';
      }
    }));
  }

  /* ---------- Video Playback Observer ---------- */
  const videos = document.querySelectorAll('video');
  if ('IntersectionObserver' in window && videos.length) {
    const videoIo = new IntersectionObserver(entries => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.play().catch(err => console.log('Video autoplay blocked:', err));
        } else {
          e.target.pause();
        }
      });
    }, { threshold: 0.2 });
    videos.forEach(v => {
      videoIo.observe(v);
    });
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

  /* ---------- Smooth Page Transitions (Fade out) ---------- */
  document.querySelectorAll('a').forEach(link => {
    if (link.hostname !== window.location.hostname || link.hasAttribute('download') || link.getAttribute('target') === '_blank' || link.getAttribute('href').startsWith('#') || link.getAttribute('href').startsWith('tel:') || link.getAttribute('href').startsWith('mailto:')) return;
    
    link.addEventListener('click', e => {
      e.preventDefault();
      const target = link.href;
      document.body.style.transition = 'opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1), transform 0.6s cubic-bezier(0.16, 1, 0.3, 1)';
      document.body.style.opacity = '0';
      document.body.style.transform = 'translateY(15px)';
      setTimeout(() => {
        window.location.href = target;
      }, 550);
    });
  });

  /* ---------- Parallax on Images ---------- */
  const imgObserver = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        window.addEventListener('scroll', parallax);
      } else {
        window.removeEventListener('scroll', parallax);
      }
    });
  });
  
  const parallaxImages = document.querySelectorAll('.work img, .split-media img, .arch-card img');
  if (parallaxImages.length) {
    parallaxImages.forEach(img => imgObserver.observe(img));
  }

  function parallax() {
    parallaxImages.forEach(img => {
      const rect = img.getBoundingClientRect();
      // Only parallax if visible in viewport
      if (rect.top < window.innerHeight && rect.bottom > 0) {
        const offset = (window.innerHeight - rect.top) * 0.05;
        // Don't override CSS transforms (scale) completely, instead we can adjust object-position for true parallax
        img.style.objectPosition = `50% calc(50% + ${offset}px)`;
      }
    });
  }

  /* ---------- Custom Cursor ---------- */
  if (window.matchMedia("(pointer: fine)").matches) {
    const cursor = document.createElement('div');
    cursor.classList.add('custom-cursor');
    const cursorDot = document.createElement('div');
    cursorDot.classList.add('custom-cursor-dot');
    document.body.appendChild(cursor);
    document.body.appendChild(cursorDot);

    let mouseX = 0, mouseY = 0;
    let cursorX = 0, cursorY = 0;

    document.addEventListener('mousemove', (e) => {
      mouseX = e.clientX;
      mouseY = e.clientY;
      cursorDot.style.left = `${mouseX}px`;
      cursorDot.style.top = `${mouseY}px`;
    });

    const loop = () => {
      cursorX += (mouseX - cursorX) * 0.15;
      cursorY += (mouseY - cursorY) * 0.15;
      cursor.style.left = `${cursorX}px`;
      cursor.style.top = `${cursorY}px`;
      requestAnimationFrame(loop);
    };
    requestAnimationFrame(loop);

    const interactiveElements = document.querySelectorAll('a, button, input, textarea, select, .work, .price-card, .menu-btn');
    interactiveElements.forEach(el => {
      el.addEventListener('mouseenter', () => cursor.classList.add('hover'));
      el.addEventListener('mouseleave', () => cursor.classList.remove('hover'));
    });
  }

  /* ---------- Media Slow Zoom Reveal ---------- */
  const allMedia = document.querySelectorAll('img:not(.brand-logo):not(.footer-brand img), video');
  if ('IntersectionObserver' in window && allMedia.length) {
    const mediaIo = new IntersectionObserver(entries => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.classList.add('media-in');
          mediaIo.unobserve(e.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
    
    allMedia.forEach(el => {
      // Don't apply to hero backgrounds since they have their own animations
      if (!el.closest('.hero-bg') && !el.closest('.page-hero-bg')) {
        el.classList.add('media-reveal-start');
        mediaIo.observe(el);
      }
    });
  }
