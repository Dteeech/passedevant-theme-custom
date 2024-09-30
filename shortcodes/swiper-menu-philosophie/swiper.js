document.addEventListener('DOMContentLoaded', function () {
    const settings = {
        loop: true,
        speed: 700,
        pagination: {
            el: ".swiper-pagination",
            type: "bullets"
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        }
    };

    const swiper = new Swiper(".myPhilosophieSwiper", settings);


    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.menu a').forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                var slideIndex = this.getAttribute('data-slide');
                swiper.slideTo(slideIndex);
            });
        });
    })

});
