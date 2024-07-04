import Swiper from 'swiper';
import { Pagination } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/pagination';

const swiper = new Swiper('.card__slider', {
	modules: [Pagination],
	loop: true,
	pagination: {
		el: '.swiper-pagination',
		clickable: true
	},
});
