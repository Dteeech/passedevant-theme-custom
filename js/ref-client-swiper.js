document.addEventListener('DOMContentLoaded', function () {
    var swiper = new Swiper(".refClientSwiper", {
        effect: "cards",
        grabCursor: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        }
    });
});
