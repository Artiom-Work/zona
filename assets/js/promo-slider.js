export function initPromoSlider() {
	const swiperEl = document.querySelector('.promoSwiper');
	if (!swiperEl) return;

	const datetimeSlider = new Swiper(swiperEl, {
		slidesPerView: 1,
		keyboard: true,
		loop: true,
		allowTouchMove: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: false,
		},
		breakpoints: {
			1000: { allowTouchMove: false },
		},
		navigation: {
			nextEl: ".promoButtonNext",
			prevEl: ".promoButtonPrev",
		},
	});

	function updatePromoBackground() {
		const activeSlide = document.querySelector('.swiper-slide-active');
		if (!activeSlide) return;

		const color = activeSlide.dataset.jsSlideColor;
		if (!color) return;

		const promoSection = activeSlide.closest('[data-js-promo-color]');
		if (promoSection) promoSection.style.backgroundColor = color;
	}

	datetimeSlider.on('slideChange', updatePromoBackground);
	datetimeSlider.on('init', updatePromoBackground);
	datetimeSlider.on('slideChangeTransitionEnd', updatePromoBackground);

	return datetimeSlider;
}