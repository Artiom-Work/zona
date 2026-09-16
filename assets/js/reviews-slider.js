/* reviews-slider.js file */

document.addEventListener('DOMContentLoaded', function () {
	const totalUserImages = 15;
	const userIcons = document.querySelectorAll('.reviews__icon');

	function getUniqueRandomNumbers(count, max) {
		const numbers = [];
		while (numbers.length < count) {
			const num = Math.floor(Math.random() * max) + 1;
			if (!numbers.includes(num)) {
				numbers.push(num);
			}
		}
		return numbers;
	}

	function shuffleUserIcons() {
		const randomNums = getUniqueRandomNumbers(userIcons.length, totalUserImages);
		userIcons.forEach((icon, index) => {
			icon.src = `./assets/images/reviews/user-${randomNums[index]}.webp`;
		});
	}

	const reviewsSlider = new Swiper(".reviewsSwiper", {
		slidesPerView: 1,
		keyboard: true,
		loop: true,
		spaceBetween: 50,
		centeredSlides: true,

		navigation: {
			nextEl: ".reviewsButtonNext",
			prevEl: ".reviewsButtonPrev",
		},

		on: {
			slideChange: function () {
				shuffleUserIcons();
			}
		}
	});
});