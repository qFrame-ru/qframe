/*
 * Скрипт для плавной демки сайта
 */

// Текущая локация
let location = window.location;
let url = new URL(location);

// Если есть параметр `demo`, то срабатывает магия
if (has('demo')) {

	// Текущая позиция скролла
	let scrolled = 0;

	// С какой скоростью крутить: 1000 ms делим на коэффициент скорости
	let speed = 1000 / get('speed', 200);

	setInterval(function() {

		// Прокручиваем окно
		window.scrollTo(0, scrolled++);

		// До куда докрутить
		let max_scroll = get('max', 500);

		// Если указали ключ объекта, то по достижении
		// предела переходим на страницу объекта
		if (has('item') && scrolled >= max_scroll) {
			let item_id = get('item');
			let item_path = '/item/' + item_id + '?demo';
			window.location.href = item_path;
		}

	}, speed);
}

/**
 * Есть ли параметр в запросе
 *
 * @param param
 * @returns {boolean}
 */
function has(param) {
	return url.searchParams.has(param);
}

/**
 * Получить значение параметра из запроса
 *
 * @param param
 * @param defaultValue
 * @returns {string|null}
 */
function get(param, defaultValue = null) {
	return has(param)
		? url.searchParams.get(param)
		: defaultValue;
}
