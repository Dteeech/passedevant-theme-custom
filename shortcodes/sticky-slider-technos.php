<?php
function shortcode_slider_technos()
{
    ob_start()
?>
    <div class="slider-technos-grid container">
        <section class="text ">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ac ultrices elit, sit amet consequat tortor. Phasellus
            at lectus turpis. Nam hendrerit erat orci, eu sagittis arcu vehicula ut. Proin est elit, iaculis ac ipsum aliquam,
            efficitur luctus neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
            egestas. Nam vulputate purus elit, et luctus tellus placerat ac. Morbi id mi ut ipsum facilisis porta. Etiam urna
            leo, imperdiet eget elit nec, feugiat imperdiet orci. Praesent at augue eu lectus tristique vulputate elementum at
            velit. Nullam dictum mi rutrum dui aliquam gravida.
        </section>
        <section class="Slider">
            <figure class="sticky-slider-item ">
                <img src="<?php echo get_template_directory_uri() . '/images/Mockup-Shopify-Image.webp'; ?>" alt="#">
                <span>Shopify
                </span>
                <p>Nous créons des boutiques Shopify performantes, adaptées à vos besoins. Experts en e-commerce, nous vous
                    accompagnons de la conception à l'optimisation, pour offrir une expérience utilisateur fluide et un site
                    efficace. Boostez vos ventes en ligne avec une solution évolutive et entièrement personnalisée sur Shopify.</p>
            </figure>
            <figure class="sticky-slider-item ">
                <img src="<?php echo get_template_directory_uri() . '/images/Mockup-Barbirati-Prestashop.webp'; ?>" alt="#">
                <span>PrestaShop
                </span>
                <p>Passedevant développe des boutiques en ligne avec PrestaShop, une solution open-source flexible et puissante.
                    Nous
                    créons des sites sur-mesure, adaptés à vos besoins, tout en exploitant les avantages de cette plateforme
                    évolutive. Profitez d’une totale liberté pour personnaliser et optimiser votre e-commerce afin de maximiser vos
                    performances en ligne.</p>
            </figure>
            <figure class="sticky-slider-item ">
                <img src="<?php echo get_template_directory_uri() . '/images/Mockup-WooCommerce-Accessory.webp'; ?>" alt="#">
                <span>Woocommerce
                </span>
                <p>Passedevant vous accompagne dans la création et l’optimisation de votre e-commerce avec WooCommerce, vous offrant une solution flexible et entièrement personnalisable. Profitez de ses nombreuses fonctionnalités pour gérer facilement vos produits, paiements, et expéditions, tout en optimisant l’expérience client pour maximiser vos conversions.
                </p>
            </figure>
            <figure class="sticky-slider-item ">
                <img src="<?php echo get_template_directory_uri() . '/images/Mockup-WordPress-Westoptic.webp'; ?>" alt="#">
                <span>Wordpress
                </span>
                <p>Passedevant vous accompagne dans la création de sites web sur WordPress, le CMS le plus populaire et
                    flexible. Que
                    ce soit pour un site vitrine ou un blog, nous développons des solutions sur-mesure, évolutives et optimisées
                    pour le SEO. Profitez d’une gestion simplifiée et d’une personnalisation totale pour booster votre présence en
                    ligne avec WordPress.
                </p>
            </figure>

        </section>
    </div>
    <style>
        /* reset */
        * {
            margin: 0;
            padding: 0;
        }


        img {
            width: 100%;
        }

        /* base styles */
        body {
            font-family: sans-serif;
            font-size: 1.3rem;
            line-height: 1.6;
        }

        section {
            padding: 2rem 0;
        }

        .wrapper {
            margin: 0 auto;
            max-width: 1200px;
            padding: 0 4rem;
        }

        /* display grid for larger resolutions */
        @media (min-width: 1200px) {
            .slider-technos-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                grid-gap: 6rem;
                align-items: stretch;
            }
        }

        /* sticky magic */
        .sticky-slider-item {
            width: 65vh;
            max-width: 100%;
            margin-left: auto;
            margin-right: auto;
            top: 6rem;
            position: -webkit-sticky;
            position: sticky;
            margin-bottom: 250px;
            background-color: white;
            color: #1E1E1E;
            border: 2px solid #1E1E1E;
            border-radius: 12px;

        }

        .sticky-slider-item img {
            border-radius: 8px 8px 0 0;
            object-fit: contain;


        }

        .sticky-slider-item p,
        .sticky-slider-item span {
            padding: 20px;
        }

        .sticky-slider-item span {
            font-size: 52px;
        }

        @media (min-width: 1200px) {
            .text {
                position: -webkit-sticky;
                position: sticky;
                top: 0;
                height: 100vh;
                display: flex;
                align-items: center;
            }
        }
    </style>
<?php
    return ob_get_clean();
}

add_shortcode('shortcode_slider_technos', 'shortcode_slider_technos');
