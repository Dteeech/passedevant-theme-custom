document.addEventListener('DOMContentLoaded', function () {
    var swiper = new Swiper('.partners-swiper', {
        spaceBetween: 0,
        centeredSlides: true,
        speed: 5000,
        autoplay: {
          delay: 0,
        },
        loop: true,
        slidesPerView: 'auto',
        allowTouchMove: true,
        disableOnInteraction: true,
    });
});
