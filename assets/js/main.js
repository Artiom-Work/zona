import { initReviewsSlider } from './reviews-slider.js';
import { initGallerySlider } from './gallery-slider.js';
import { initPromoSlider } from './promo-slider.js';

function init() {
	initReviewsSlider();
	initGallerySlider();
	initPromoSlider();
}

if (document.readyState === 'loading') {
	document.addEventListener('DOMContentLoaded', init);
} else {
	init();
}
