export function initGallerySlider() {
	const swiperEl = document.querySelector('.gallerySwiper');
	if (!swiperEl) return;

	return new Swiper(swiperEl, {
		slidesPerView: "auto",
		keyboard: true,
		loop: true,
		spaceBetween: 16,
		centeredSlides: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: true,
		},
	});
}