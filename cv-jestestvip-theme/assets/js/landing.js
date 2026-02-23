/**
 * CV Builder Landing Page – JS
 * Slider, mobile nav, scroll effects, FAQ, smooth scroll.
 */
(function () {
    'use strict';

    // ------------------------------------------------------------------
    // Header scroll effect
    // ------------------------------------------------------------------
    const header = document.getElementById('site-header');
    if (header) {
        window.addEventListener('scroll', function () {
            header.classList.toggle('is-scrolled', window.scrollY > 10);
        }, { passive: true });
    }

    // ------------------------------------------------------------------
    // Mobile burger menu
    // ------------------------------------------------------------------
    const burger = document.getElementById('nav-burger');
    const navLinks = document.getElementById('nav-links');

    if (burger && navLinks) {
        burger.addEventListener('click', function () {
            navLinks.classList.toggle('is-open');
        });

        navLinks.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                navLinks.classList.remove('is-open');
            });
        });
    }

    // ------------------------------------------------------------------
    // How It Works Slider
    // ------------------------------------------------------------------
    const slides = document.querySelectorAll('#how-slider .slider__slide');
    const stepTabs = document.querySelectorAll('#steps-nav .step-tab');
    const dots = document.querySelectorAll('#slider-dots .slider__dot');
    const prevBtn = document.getElementById('slider-prev');
    const nextBtn = document.getElementById('slider-next');

    let currentSlide = 0;
    let autoPlayTimer = null;

    function goToSlide(index) {
        if (index < 0) index = slides.length - 1;
        if (index >= slides.length) index = 0;

        slides.forEach(function (s) { s.classList.remove('is-active'); });
        stepTabs.forEach(function (t) { t.classList.remove('is-active'); });
        dots.forEach(function (d) { d.classList.remove('is-active'); });

        slides[index].classList.add('is-active');
        if (stepTabs[index]) stepTabs[index].classList.add('is-active');
        if (dots[index]) dots[index].classList.add('is-active');

        currentSlide = index;
    }

    function startAutoPlay() {
        stopAutoPlay();
        autoPlayTimer = setInterval(function () {
            goToSlide(currentSlide + 1);
        }, 5000);
    }

    function stopAutoPlay() {
        if (autoPlayTimer) clearInterval(autoPlayTimer);
    }

    stepTabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            goToSlide(parseInt(tab.dataset.step));
            stopAutoPlay();
            startAutoPlay();
        });
    });

    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            goToSlide(parseInt(dot.dataset.index));
            stopAutoPlay();
            startAutoPlay();
        });
    });

    if (prevBtn) {
        prevBtn.addEventListener('click', function () {
            goToSlide(currentSlide - 1);
            stopAutoPlay();
            startAutoPlay();
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            goToSlide(currentSlide + 1);
            stopAutoPlay();
            startAutoPlay();
        });
    }

    if (slides.length > 0) {
        startAutoPlay();
    }

    // ------------------------------------------------------------------
    // Scroll reveal animation
    // ------------------------------------------------------------------
    function initReveal() {
        const elements = document.querySelectorAll(
            '.benefit-card, .template-preview-card, .pricing-card, .faq-item, .slide-content, .ai-format, .story__inner'
        );

        elements.forEach(function (el) {
            el.classList.add('reveal');
        });

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        elements.forEach(function (el) {
            observer.observe(el);
        });
    }

    // ------------------------------------------------------------------
    // Smooth scroll for anchor links
    // ------------------------------------------------------------------
    document.querySelectorAll('a[href^="#"]').forEach(function (link) {
        link.addEventListener('click', function (e) {
            var target = document.querySelector(link.getAttribute('href'));
            if (target) {
                e.preventDefault();
                var offset = header ? header.offsetHeight + 16 : 80;
                var pos = target.getBoundingClientRect().top + window.scrollY - offset;
                window.scrollTo({ top: pos, behavior: 'smooth' });
            }
        });
    });

    // ------------------------------------------------------------------
    // Initialize on DOM ready
    // ------------------------------------------------------------------
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initReveal);
    } else {
        initReveal();
    }
})();
