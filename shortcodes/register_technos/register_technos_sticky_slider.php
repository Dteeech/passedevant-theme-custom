<?php
function shortcode_slider_technos()
{
    global $post;
    // Récupérer les données des slides depuis les métadonnées
    $slides = get_post_meta($post->ID, 'contenu_du_slider_techno', true) ?: [];

    ob_start();
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
            <?php if (!empty($slides)) : ?>
                <?php foreach ($slides as $slide) : ?>
                    <figure class="sticky-slider-item ">
                        <img src="<?php echo esc_url($slide['image']); ?>" alt="<?php echo esc_attr($slide['title']); ?>">
                        <span><?php echo esc_html($slide['title']); ?></span>
                        <div style="padding-left: 20px; padding-right:20px;">

                            <p class="description"><?php echo wp_strip_all_tags($slide['description'] ?? ''); ?></p>

                            <div class="wp-block-buttons secondary-button is-layout-flex wp-block-buttons-is-layout-flex">
                                <div class="wp-block-button">
                                    <a href="<?php echo esc_url($slide['link'] ?? ''); ?>" class="wp-block-button__link wp-element-button">
                                        <?php echo esc_html($slide['link_text'] ?? ''); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </figure>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Aucun contenu disponible pour le slider.</p>
            <?php endif; ?>
        </section>
    </div>
    <style>
        /* reset */
        * {
            margin: 0;
            padding: 0;
        }

        .sticky-slider-item img {
            width: 100%;
            height: auto;
        }


        section {
            padding: 2rem 0;
            font-size: 1.3rem;
            line-height: 1.6;
        }

        .text {
            font-family: 'Labil Grotesk';
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
            width: 30vw;
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
            padding-bottom: 20px;
        }


        .sticky-slider-item img {
            border-radius: 8px 8px 0 0;
            object-fit: contain;
        }

        .sticky-slider-item .description,
        .sticky-slider-item span {
            padding: 20px;
        }

        .sticky-slider-item .description {
            margin: 0 !important;
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
