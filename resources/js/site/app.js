import Swiper from 'swiper';
import { Pagination } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/pagination';

const swiper = new Swiper('.slider', {
	modules: [Pagination],
	loop: true,
	autoHeight: true,
	pagination: {
		el: '.swiper-pagination',
		clickable: true
	},
});

import './demo-scroll.js'
