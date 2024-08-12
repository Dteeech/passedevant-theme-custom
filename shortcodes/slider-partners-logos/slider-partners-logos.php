<?php
function display_partners_logos_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'id' => ''
    ), $atts, 'partners_logos');

    $post_id = $atts['id'];
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $partners_logos = get_post_meta($post_id, 'partners_logos', true);
    if (empty($partners_logos)) {
        return '';
    }

    $output = '<div class="swiper partners-swiper p-32"><div class="swiper-wrapper">';
    foreach ($partners_logos as $logo) {
        if (!empty($logo)) { // Vérification pour éviter les logos vides
            $output .= '<div class="swiper-slide"><img src="' . esc_url($logo) . '" alt="Partner Logo" class="partner-logo" /></div>';
        }
    }
    $output .= '</div>'; // End of swiper-wrapper

    $output .= '</div> <!-- End of swiper-container -->
    <style>

        .partners-swiper {
            background: #1E1E1E !important;
            width:100%;
            
        }
            .partners-swiper .swiper-wrapper {
                 -webkit-transition-timing-function:linear!important;
                transition-timing-function:linear!important; 
            }
        .partners-swiper .swiper-slide {
          width: 300px;
  height: auto;
  text-align: center;
  font-size: 33px;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  overflow: hidden;
  padding: 0 50px;
        }

        .swiper-slide img {
            height: auto;
            max-width: 100%;
        }
        
    </style>';

    return $output;
}
add_shortcode('partners_logos', 'display_partners_logos_shortcode');
