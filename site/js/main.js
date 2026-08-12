// PMOlogy static prototype — minimal, dependency-free JS.
// Five jobs: mobile nav toggle, a non-functional contact-form stub
// (this is a static prototype; real submission arrives with the WordPress/WPForms
// integration per website-platform-requirements.md — see form-note in contact pages),
// a subtle scroll parallax on the hero "layers" signature element,
// scroll-reveal on section content, and the one-shot trigger for the shared
// Project Intelligence Visualization panel (homepage only).

document.addEventListener('DOMContentLoaded', function () {
  var toggle = document.querySelector('.nav-toggle');
  var mobileNav = document.querySelector('.mobile-nav');
  if (toggle && mobileNav) {
    toggle.addEventListener('click', function () {
      var isOpen = mobileNav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', String(isOpen));
    });
  }

  var form = document.querySelector('[data-prototype-form]');
  if (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var success = document.querySelector('[data-form-success]');
      if (success) {
        form.setAttribute('hidden', 'hidden');
        success.classList.add('is-visible');
        success.focus();
      }
    });
  }

  // Checked once, shared by both motion-linked features below. Both are
  // explicitly skipped (not just slowed down) when the visitor has requested
  // reduced motion — neither is a CSS animation the reduced-motion media query
  // alone can catch, since one is a scroll-linked transform and the other
  // depends on a JS-added class.
  var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Signature hero-layers parallax.
  var heroPlates = document.querySelector('.hero__plates');
  if (heroPlates && !reduceMotion) {
    var ticking = false;
    var updateParallax = function () {
      var y = window.scrollY || window.pageYOffset;
      var offset = Math.min(y, 400) * 0.06; // subtle, capped — re-tuned down as the plates grew larger, so parallax distance stays proportionally subtle
      heroPlates.style.transform = 'translateY(calc(-50% - ' + offset + 'px))';
      ticking = false;
    };
    window.addEventListener('scroll', function () {
      if (!ticking) {
        window.requestAnimationFrame(updateParallax);
        ticking = true;
      }
    }, { passive: true });
  }

  // Scroll-reveal. The hidden CSS state (html.js-reveal-ready .reveal) only
  // takes effect once this class is added below — so a visitor with reduced
  // motion, or with JS unavailable, never has anything hidden from them in
  // the first place. Each element reveals once, then is left alone.
  if (!reduceMotion && 'IntersectionObserver' in window) {
    document.documentElement.classList.add('js-reveal-ready');
    var revealTargets = document.querySelectorAll('.reveal');
    var revealObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });
    revealTargets.forEach(function (el) { revealObserver.observe(el); });
  }

  // Project Intelligence Visualization panels (Project Controls / Intelligence
  // Layer sections, homepage only). Separate observer from .reveal above
  // because the panel's internal SVG marks need their own trigger class
  // (.is-visible) rather than the simple opacity/translateY swap .reveal
  // applies — same one-shot, reduced-motion-gated approach otherwise. Under
  // reduced motion or without JS, the panel's default CSS state is already
  // fully resolved (see styles.css), so nothing is ever hidden here either.
  if (!reduceMotion && 'IntersectionObserver' in window) {
    var panels = document.querySelectorAll('.intelligence-panel');
    var panelObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          panelObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.35, rootMargin: '0px 0px -60px 0px' });
    panels.forEach(function (el) { panelObserver.observe(el); });
  }
});
