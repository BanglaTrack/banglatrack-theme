/**
 * BanglaTrack Developer Theme — Main JS
 * Ultra-minimal: sticky header enhancement + smooth scroll
 * Target: < 2KB gzipped
 *
 * @package BanglaTrackDeveloper
 */
(function () {
	'use strict';

	/* ---- Sticky header background on scroll ---- */
	const header = document.getElementById('btd-header');
	if (header) {
		let ticking = false;
		const onScroll = () => {
			if (!ticking) {
				window.requestAnimationFrame(() => {
					header.classList.toggle('btd-header--scrolled', window.scrollY > 20);
					ticking = false;
				});
				ticking = true;
			}
		};
		window.addEventListener('scroll', onScroll, { passive: true });
		onScroll();
	}

	/* ---- Smooth scroll for anchor links ---- */
	document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
		anchor.addEventListener('click', function (e) {
			const targetId = this.getAttribute('href');
			if (targetId === '#') return;
			const target = document.querySelector(targetId);
			if (!target) return;
			e.preventDefault();
			target.scrollIntoView({ behavior: 'smooth', block: 'start' });

			// Close mobile nav if open
			const toggle = document.getElementById('btd-nav-toggle');
			if (toggle && toggle.checked) {
				toggle.checked = false;
			}
		});
	});

	/* ---- Close mobile nav on outside click ---- */
	document.addEventListener('click', function (e) {
		const toggle = document.getElementById('btd-nav-toggle');
		const nav = document.querySelector('.btd-header__nav');
		const label = document.querySelector('.btd-nav-toggle-label');
		if (toggle && toggle.checked && nav && !nav.contains(e.target) && !label.contains(e.target)) {
			toggle.checked = false;
		}
	});
})();
