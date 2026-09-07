
document.addEventListener('DOMContentLoaded', function () {
	const datetimeSlider = new Swiper(".gallerySwiper", {
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
});