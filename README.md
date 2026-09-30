# $\color{green}\textbf{ZONA}$

$\color{limegreen}\text{Тренировочная работа}$

## $\color{mediumblue}\text{Описание работы }$:

Внешняя часть одностраничного интернет магазина по продаже напитков.

За основу взят произвольный макет из сети.

**Цели и задачи работы :**

❗Вёрстка страниц.

❗Интеграция вёрстки в CMS WordPress

❗Работа с хостингом

❗Настройка WordPress админ панели

❗Работа с WordPress плагинами

🎯 $\color{mediumblue}\textsf{Основная задача }$ - "Натяжка" вёрстки на WordPress и создание сайта.

---

Макет -> [**Figma**](https://www.figma.com/design/yGjT5dcoXs3zhJxxJHjt3q/zona-readme-version-?node-id=0-1&p=f&t=1ovNWSZqTucOElKA-0)

Вёрстка -> [**Git pages**](https://artiom-work.github.io/zona/)

Сайт -> [**zona**](https://zona.artiom-mezheynikov.ru)

<img src="assets/images/website/preview-readme-image.webp" width="400" alt="Изображение макета страницы">

---

## $\color{mediumblue}\text{Технологии, инструменты и способы вёрстки }$:

✅ WordPress
✅ phpMyAdmin
✅ FileZilla
✅ Git
✅ VS Code
✅ Figma
✅ PHP
✅ MySQL
✅ JS
✅ CSS3
✅ HTML5
✅ Sass
✅ БЭМ
✅ Flexbox
✅ CSS Grid
✅ CSS-функции
✅ Адаптивная вёрстка
✅ SVG-спрайты
✅ Мобильное меню (CSS/JS)
✅ "Липкая шапка"
✅ Слайдеры (swiperJs)
✅ Товары и цены
✅ Страница корзины товаров
✅ Мини корзина товаров(CSS/JS)
✅ Отзывы
✅ Кроссбарузерная вёрстка
✅ Hover/active эффекты
✅ Семантическая вёрстка
✅ Валидная вёрстка
✅ ACF
✅ Pods
✅ WooCommerce

---

## $\color{mediumblue}\textsf{Краткий список работ}$:

$\color{orange}\text{➡}$ Вёрстка главной страницы по макету figma (_близко к pixel perfect_).

$\color{orange}\text{➡}$ Создание дополнительной карусели со сменой цвета фона в блоке promo.

$\color{orange}\text{➡}$ Правки и наполнение контентом: изображения и текст.

$\color{orange}\text{➡}$ Поблочный перенос вёрстки на хостинг с интеграцией CMS WordPress и настройка ACF полей (_страница настроек сайта в wp админке_) и пользовательских записей (_плагин Pods_) для вывода их циклом на страницу.

$\color{orange}\text{➡}$ Вёрстка и интеграция на сайт страницы политики конфиденциальности.

$\color{orange}\text{➡}$ Вёрстка и интеграция на сайт страницы 404.

$\color{orange}\text{➡}$ Создание и подключение отдельной страницы в админ-панели для редактирования блоков с помощью плагинов ACF и Pods (_бесплатный альтернативный вариант циклирования добавляемого контента без ACF PRO Repeater_).

$\color{orange}\text{➡}$ Подключение и настройка плагина WooCommerce (_закрытие пунктов настройки в админ-панели_).

$\color{orange}\text{➡}$ Создание и "превёрстка" стандартной страницы интернет-магазина от WooCommerce через переопределение шаблонов и хуков.

$\color{orange}\text{➡}$ Создание и "превёрстка" стандартной страницы отдельного товара от WooCommerce.

$\color{orange}\text{➡}$ Разработка кастомной боковой мини-корзины товаров на базе AJAX cart fragments WooCommerce, с отказом от стандартного редиректа на страницу корзины.

$\color{orange}\text{➡}$ Наполнение товарами сайта в соответствии с макетом.

$\color{orange}\text{➡}$ Создание и наполнение отзывов о товарах, их кастомная фильтрация через ACF-поле у комментариев.

$\color{orange}\text{➡}$ Создание и наполнение отзывов о товарах и их генерация и отображение в отдельном блоке на главной странице.

$\color{orange}\text{➡}$ Передача данных из PHP-шаблонов в JS-скрипты через для корректной работы динамических путей к ассетам.

$\color{orange}\text{➡}$ Реализация случайной смены декоративных изображений покупателей при переключении слайда в блоке отзывов (swiper.js + wp_localize_script).

## $\color{mediumblue}\text{Особенности реализации}$:

$\color{purple}\text{➡}$ Организация "глобальной" страницы настроек сайта для хранения общих ACF-полей (логотип, ссылки шапки, тексты блоков) — с явной передачей ID страницы вторым параметром в get_field()/the_field().

$\color{purple}\text{➡}$ Подключение поддержки загрузки SVG в медиабиблиотеку через фильтры upload_mimes и wp_check_filetype_and_ext.

$\color{purple}\text{➡}$ Использование Pods как бесплатной альтернативы ACF PRO Repeater для вывода повторяющихся блоков (_слайды, галерея_).

$\color{purple}\text{➡}$ Реализация боковой мини-корзины на базе стандартного AJAX-механизма WooCommerce (_cart fragments_) с корректной обёрткой widget_shopping_cart_content для мгновенного обновления содержимого без перезагрузки страницы.

$\color{purple}\text{➡}$ Кастомная фильтрация отзывов WooCommerce для главной страницы через дополнительное ACF-поле у комментариев — как альтернатива встроенному рейтингу.

$\color{purple}\text{➡}$ Динамическая смена акцентного цвета фона секции promo в зависимости от активного слайда — через data-атрибут (data-js-slide-color), заполняемый из ACF/Pods, и чтение этого атрибута скриптом при событии смены слайда Swiper.

$\color{purple}\text{➡}$ Вёрстка "липкой" шапки на чистом CSS (position: sticky) без дополнительного JS-слушателя скролла.

$\color{purple}\text{➡}$ Организация мобильного меню и боковой панели корзины на одном и том же приёме — скрытый чекбокс + label — без использования JavaScript для базового переключения видимости.

$\color{purple}\text{➡}$ Локализация коротких текстовых блоков карточек товара под бренд (тексты на португальском как элемент стилизации контента, в духе оригинального макета).

$\color{purple}\text{➡}$ Разворачивание и поэтапная отладка сайта напрямую на хостинге через FTP/файловый менеджер, без локального окружения — с временным включением WP_DEBUG и чтением серверного error log для диагностики.

## $\color{orange}\text{Основные страницы}$:

$\color{orange}\text{➡}$ [**Homepage**](https://zona.artiom-mezheynikov.ru/)

$\color{orange}\text{➡}$ [**Privacy policy**](https://zona.artiom-mezheynikov.ru/privacy-policy/)

$\color{orange}\text{➡}$ [**404 page**](https://zona.artiom-mezheynikov.ru/404/)

$\color{orange}\text{➡}$ [**Shop**](https://zona.artiom-mezheynikov.ru/shop/)

$\color{orange}\text{➡}$ [**Product page**](https://zona.artiom-mezheynikov.ru/product/yuzu-lima/)

$\color{orange}\text{➡}$ [**Cart page**](https://zona.artiom-mezheynikov.ru/cart/)

---
