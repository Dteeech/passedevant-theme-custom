
document.addEventListener('DOMContentLoaded', function () {
    // Add dynamic styles
    const styles = `
      .customBlankSwiper,
      .customBlankSwiper * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      .customBlankSwiper {
        width: 100%;
        height: auto;
        position: relative;
      }

      .customBlankSwiper .swiper-wrapper {
        display: flex;
        transition-timing-function: linear !important;
      }

      .customBlankSwiper .swiper-slide {
        padding: 50px;
        gap: 40px;
        border: 1px solid #1e1e1e;
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: start;
        align-items: center;
        width: 200px;
        min-height: 450px;
        max-height: 700px;
        overflow-y: auto;
        flex-wrap: nowrap;
      }

      .prestations .swiper-button-next,
      .prestations .swiper-button-prev {
        color: #000;
        z-index: -5;
      }

      .prestations .swiper-button-prev {
        position: absolute;
        left: 140px !important;
        z-index: -5;
      }

      .prestations .swiper-pagination {
        position: absolute;
        bottom: -80px !important;
      }

      .prestations .swiper-pagination-bullet-active {
        background: linear-gradient(
          90deg,
          #0524a7 0%,
          #df22f0 26.5%,
          #fda9c0 54.5%,
          #430a8b 86.5%
        ) !important;
        height: 20px !important;
        width: 20px !important;
      }

      .prestations .swiper-pagination-bullet {
        height: 20px;
        width: 20px;
        background-color: #6f0aaa;
      }

      .prestations .cta-svg {
        right: 75px;
        bottom: 80px;
      }
    `;
    document.getElementById('dynamic-styles').textContent = styles;

    // Initialize Swiper
    var swiper = new Swiper(".customBlankSwiper", {
      slidesPerView: 'auto',
      spaceBetween: 20,
      centeredSlides: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 10,
        },
        480: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 40,
        }
      }
    });
  });