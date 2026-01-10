const swiper = new Swiper('.mySwiper', {
  slidesPerView: 1,
  spaceBetween: 30,
  centeredSlides: true,
  loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 1.5,
      spaceBetween: 25,
    },
    1024: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
  },
});
