const about_swiper = new Swiper('.about-swiper', {
    slidesPerView: 2,
    spaceBetween: 60,
    freeMode: true,
    direction: 'horizontal',

    pagination: {
        el: '.swiper-pagination',
    },

    scrollbar: {
        el: '.swiper-scrollbar',
    },
});

const competitions_swiper = new Swiper('.competitions-swiper', {
    autoplay: {
        delay: 3000,
    },
    slidesPerView: 2,
    spaceBetween: 40,
    freeMode: true,

    pagination: {
        el: '.swiper-pagination',
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    scrollbar: {
        el: '.swiper-scrollbar',
    },
});

const committee_swiper = new Swiper('.committee-swiper', {
    autoplay: {
        delay: 3000,
    },
    slidesPerView: 1,
    spaceBetween: 40,
    freeMode: true,

    pagination: {
        el: '.swiper-pagination',
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    scrollbar: {
        el: '.swiper-scrollbar',
    },
});

const list_swiper = new Swiper('.list-swiper', {
    autoplay: {
        delay: 3000,
    },
    direction: 'horizontal',
    loop: true,

    pagination: {
        el: '.swiper-pagination',
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});