<?php
function custom_swiper_philosophie_swiper_shortcode() {
    ob_start();
    ?>
    <div class="container mx-auto">
        <h2 class="text-5xl text-black ">Notre philosophie</h2>
    </div>
<div class="mx-auto px-0 w-100 flex flex-col lg:flex-row mb-20">
    <div class="menu w-1/4 flex align-middle justify-center">
        <ul class="underline--gradient flex flex-col align-middle justify-center gap-8">
            <li><a class=" text-2xl font-bold" href="#" data-slide="0">1.ahahahah ça marche</a></li>
            <li><a class=" text-2xl font-bold" href="#" data-slide="1">2.Audit</a></li>
            <li><a class=" text-2xl font-bold" href="#" data-slide="2">3.Stratégie</a></li>
            <li><a class=" text-2xl font-bold" href="#" data-slide="3">4.Dashboard</a></li>
            <li><a class=" text-2xl font-bold" href="#" data-slide="4">5.Accompagnement</a></li>
            <li><a class=" text-2xl font-bold" href="#" data-slide="5">6.Opérationnel</a></li>
            <li><a class=" text-2xl font-bold" href="#" data-slide="6">7.Suivi</a></li>
        </ul>
    </div>
    <div class="w-full lg:w-3/4 lg:pe-32">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide ">
                    <div class="title flex flex-col gap-7">
                        <h2 class="title__text gradient-text_title">Nous fixons et déterminons vos objectifs</h2>
                        <p>Passedevant votre agence web expertisée en référencement naturel SEO, qui vous accompagne
                            dans votre visibilité digitale pour acquérir des nouveaux clients. Passedevant votre agence
                            web expertisée en référencement naturel SEO, qui vous accompagne dans votre visibilité
                            digitale pour acquérir des nouveaux clients. 
                        </p>
                        <div class="">
                            <a href="#" class="content-link">lien</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="title flex flex-col gap-7">
                        <h2 class="title__text gradient-text_title">Audit</h2>
                        <p>
                            Passedevant votre agence web expertisée en référencement naturel SEO, qui vous accompagne
                            dans votre visibilité digitale pour acquérir des nouveaux clients. Passedevant votre agence
                            web expertisée en référencement naturel SEO, qui vous accompagne dans votre visibilité
                            digitale pour acquérir des nouveaux clients. 
                        </p>
                        <div class="">
                            <a href="#" class="content-link">lien</a>
                        </div>

                    </div>
                    
                </div>
                <div class="swiper-slide">
                    <div class="title flex flex-col gap-7">
                        <h2 class="title__text gradient-text_title">stratégie</h2>
                        <p>
                            Passedevant votre agence web expertisée en référencement naturel SEO, qui vous accompagne
                            dans votre visibilité digitale pour acquérir des nouveaux clients. Passedevant votre agence
                            web expertisée en référencement naturel SEO, qui vous accompagne dans votre visibilité
                            digitale pour acquérir des nouveaux clients. 
                        </p>
                        <div class="">
                            <a href="#" class="content-link">lien</a>
                        </div>

                    </div>
                    
                </div>
                <div class="swiper-slide">
                    <div class="title flex flex-col gap-7">
                        <h2 class="title__text gradient-text_title">dashboard</h2>
                        <p>
                            Passedevant votre agence web expertisée en référencement naturel SEO, qui vous accompagne
                            dans votre visibilité digitale pour acquérir des nouveaux clients. Passedevant votre agence
                            web expertisée en référencement naturel SEO, qui vous accompagne dans votre visibilité
                            digitale pour acquérir des nouveaux clients. 
                        </p>
                        <div class="">
                            <a href="#" class="content-link">lien</a>
                        </div>

                    </div>
                    
                </div>
                <div class="swiper-slide px-">
                    <div class="title flex flex-col gap-7">
                        <h2 class="title__text gradient-text_title">accompagnement</h2>
                        <p>
                            Passedevant votre agence web expertisée en référencement naturel SEO, qui vous accompagne
                            dans votre visibilité digitale pour acquérir des nouveaux clients. Passedevant votre agence
                            web expertisée en référencement naturel SEO, qui vous accompagne dans votre visibilité
                            digitale pour acquérir des nouveaux clients. 
                        </p>
                        <div class="">
                            <a href="#" class="content-link">lien</a>
                        </div>

                    </div>
                    
                </div>
                <div class="swiper-slide">
                    <div class="title flex flex-col gap-7">
                        <h2 class="title__text gradient-text_title">opérationnel</h2>
                        <p>
                            Passedevant votre agence web expertisée en référencement naturel SEO, qui vous accompagne
                            dans votre visibilité digitale pour acquérir des nouveaux clients. Passedevant votre agence
                            web expertisée en référencement naturel SEO, qui vous accompagne dans votre visibilité
                            digitale pour acquérir des nouveaux clients. 
                        </p>
                        <div class="">
                            <a href="#" class="content-link">lien</a>
                        </div>

                    </div>
                    
                </div>
                <div class="swiper-slide">
                    <div class="title flex flex-col gap-7">
                        <h2 class="title__text gradient-text_title">suivi</h2>
                        <p>
                            Passedevant votre agence web expertisée en référencement naturel SEO, qui vous accompagne
                            dans votre visibilité digitale pour acquérir des nouveaux clients. Passedevant votre agence
                            web expertisée en référencement naturel SEO, qui vous accompagne dans votre visibilité
                            digitale pour acquérir des nouveaux clients. 
                        </p>
                        <div class="">
                            <a href="#" class="content-link">lien</a>
                        </div>

                    </div>
                    
                </div>
            </div>

            <div class="swiper-pagination"></div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</div>
<style>
.swiper {
    width: 100%;
    height: 80vh;
    height: 80svh;
    min-height: 320px;
    padding: 30px;
}

.swiper-slide {
    font-size: 18px;
    background: #fff;
    display: flex;
    margin:0px 10px;
    &::after {
        display: block;
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        border: 1px solid black;

    }
}

/*
  Title Text
*/
.title {
    padding: 0 10vw;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 100%;
    z-index: 1;
    color: #000000;

    &__text {
        letter-spacing: -2px;
        font-size: clamp(3rem, 0.3864rem + 13.0682vw, 7rem);
        margin-bottom: 0;
        margin-top: 0;
        position: relative;

        &::after {
            position: absolute;
            top: 100%;
            content: "";
            display: block;
            width: 100px;
            height: 0.25em;
            background-color: #ef233c;
        }
    }
}

/*
  Style up the image behind each slide
*/
.background-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;

    &__image {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.8;
        mix-blend-mode: luminosity;
    }
}

.swiper-button-next,
.swiper-button-prev {
    color: black !important;
}

.swiper-button-next {
    right:20px;
    z-index: 92;
}
.swiper-pagination-bullet-active {
    background:black;
}
@media (max-width: 1024px) {
    .menu {
        display: none;
    }
}
@media (max-width: 768px) {
    .swiper-slide {
        margin:0;
        padding:0;
    }
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
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

    const swiper = new Swiper(".mySwiper", settings);

    // Add click event listener to menu items
    const menuItems = document.querySelectorAll('.menu a');
    menuItems.forEach((item, index) => {
        item.addEventListener('click', (event) => {
            event.preventDefault();
            const slideIndex = parseInt(item.getAttribute('data-slide'), 10);
            swiper.slideTo(slideIndex);
        });
    });
});
</script>
<?php
    return ob_get_clean();
}

add_shortcode('custom_swiper_philosophie_swiper', 'custom_swiper_philosophie_swiper_shortcode');
?>
