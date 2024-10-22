<?php
function custom_swiper_philosophie_swiper_shortcode()
{
    ob_start();
?>
    <div class="philosophie-wrapper">
        <div class=" container mx-auto">
            <h2 class="text-5xl text-black ps-32">Une gestion
                maitrisée de votre stratégie d’acquisition dans Google
            </h2>
        </div>
        <div class="mx-auto px-0 w-100 flex flex-col lg:flex-row mb-20 philosophie relative">
            <div class="menu w-1/4 flex align-middle justify-center">
                <ul class="underline--gradient flex flex-col align-middle justify-center gap-8">
                    <li><a class="text-2xl font-bold philosophie-link" href="#" data-slide="0">1.Stratégie</a></li>
                    <li><a class="text-2xl font-bold philosophie-link" href="#" data-slide="1">2.Objectifs</a></li>
                    <li><a class="text-2xl font-bold philosophie-link" href="#" data-slide="2">3.Flexibilité</a></li>
                    <li><a class="text-2xl font-bold philosophie-link" href="#" data-slide="3">4.Sur-mesure</a></li>
                    <li><a class="text-2xl font-bold philosophie-link" href="#" data-slide="4">5.Collaboration</a></li>
                </ul>

            </div>
            <div class="w-100 lg:w-3/4 lg:pe-32">
                <div class="swiper myPhilosophieSwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide ">
                            <div class="title flex flex-col gap-7">
                                <span class="title__text gradient-text_title">La stratégie la clé de votre positionnement</span>
                                <p>Toute la différence réside dans une stratégie d’acquisition bien pensée et maitrisée. Par le biai d’une stratégie globale, chaque opération est justifiée pour atteindre nos objectifs. C’est la stratégie qui nous guide à court terme, moyen terme et long terme. Tout en restant flexible, elle définit notre plan d’actions. Notre coeur de métier est la stratégie : elle est le reflet de toute notre expertise.</p>
                                <div class="">
                                    <a href="#" class="content-link">lien</a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="title flex flex-col gap-7">
                                <span class="title__text gradient-text_title">Les objectifs définissent la faisabilité du projet</span>
                                <p>

                                    Tous les projets ne sont pas réalisables. Les objectifs : positions, mots clés à positionner, pages à positionner, ROI…sont toujours soumis aux contraintes de temps, de budget, de concurrence. Les objectifs sont définis en début de mission en fonction de la faisabilité estimée. Une fois les objectifs définis, ils deviennent ensuite un indicateur de performance pour mesurer la réussite de la campagne.

                                </p>
                                <div class="">
                                    <a href="#" class="content-link">lien</a>
                                </div>

                            </div>

                        </div>
                        <div class="swiper-slide">
                            <div class="title flex flex-col gap-7">
                                <span class="title__text gradient-text_title">La flexibilité est l’intelligence d’un bon projet !</span>
                                <p>

                                    La flexibilité dans une stratégie d’acquisition SEO et / SEA est très importante ! Nous ne sommes jamais sûre des actions mises en place par la concurrence. Grâce à une analyse des résultats au jour le jour et de la veille concurrentielle, nous pouvons à tout moment intervenir pour modifier notre stratégie. Notre objectif étant la réussite de nos objectifs !

                                </p>
                                <div class="">
                                    <a href="#" class="content-link">lien</a>
                                </div>

                            </div>

                        </div>
                        <div class="swiper-slide">
                            <div class="title flex flex-col gap-7">
                                <span class="title__text gradient-text_title">Chaque projet est unique, il n'existe pas de stratégie toute faite !</span>
                                <p>
                                    Nous abordons chacun de nos projets, comme un projet unique, nous sommes en quelque sorte les artisans du web qui venons chaque fois que nécessaire parfaire notre travail ! A la fois, créatifs et stratégiques, nous maîtrisons l’Art de vous rendre visible dans Google auprès de votre cible. Chez nous, il n’existe aucun forfait, chaque objectif, chaque contraintes sont propres à chaque site, nous créons votre projet, votre budget.
                                </p>
                                <div class="">
                                    <a href="#" class="content-link">lien</a>
                                </div>

                            </div>

                        </div>
                        <div class="swiper-slide px-">
                            <div class="title flex flex-col gap-7">
                                <span class="title__text gradient-text_title">Derrière chaque site se cache des entrepreneurs
                                </span>
                                <p>
                                    Sensibles au monde de l'entreprenariat, nous savons à quel point l’entrepreneur à besoin d’être rassuré. Nous savons que de notre travail peut dépendre en grande partie votre réussite. Ces questions ne sont pas prises à la légère. Nous sommes vos collaborateurs de proximité qui avons les mêmes objectifs que les vôtres ! Alors nous vous écoutons, car c’est un travail d’équipe.

                                </p>
                                <div class="">
                                    <a href="#" class="content-link">lien</a>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="swiper-pagination"></div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <style>
        .philosophie-wrapper {
            width: 80vw !important;
            margin: auto;
        }

        .philosophie-link::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 100%;
            height: 2px;
            background: #1E1E1E;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s ease-out;
        }

        .philosophie {
            padding-left: 150px;
        }

        .philosophie .swiper {
            width: 100%;
            height: 80vh;
            height: 80svh;
            min-height: 320px;
            padding: 30px;
        }

        .philosophie .swiper-slide {
            font-size: 18px;
            background: #fff;
            display: flex;
            margin: 0px 10px;

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
        .philosophie .title {
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
        .philosophie .background-image {
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

        .philosophie .swiper-button-next,
        .philosophie .swiper-button-prev {
            color: black !important;
        }

        .philosophie .swiper-button-next {
            right: 20px;
            z-index: 92;
        }

        .philosophie .swiper-pagination-bullet-active {
            background: black;
        }

        @media (max-width: 1024px) {
            .philosophie .menu {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .philosophie .swiper-slide {
                margin: 0;
                padding: 0;
            }

            .philosophie {
                padding-left: 0px;
            }

            .philosophie-wrapper span {
                font-size: 25px !important;
                margin: 0 !important;
            }

            .philosophie p {
                font-size: 14px !important;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('.myPhilosophieSwiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                centeredSlides: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

            });

            document.querySelectorAll('.philosophie-link').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    var slideIndex = this.getAttribute('data-slide');
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