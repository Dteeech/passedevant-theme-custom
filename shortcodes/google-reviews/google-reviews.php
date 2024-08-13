<?php
function display_google_reviews_slider($atts)
{
    $atts = shortcode_atts(
        array(
            'place_id' => '',  // Place ID of your Google My Business
            'api_key' => '',   // Your Google API key
            'count' => 10       // Number of reviews to display
        ),
        $atts
    );

    $place_id = $atts['place_id'];
    $api_key = $atts['api_key'];
    $count = (int)$atts['count'];

    if (empty($place_id) || empty($api_key)) {
        return 'Place ID or API key missing.';
    }

    $response = wp_remote_get("https://maps.googleapis.com/maps/api/place/details/json?place_id={$place_id}&key={$api_key}&fields=reviews&reviews_no_translations=true");

    if (is_wp_error($response)) {
        return 'Unable to retrieve reviews.';
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    if ($data['status'] != 'OK') {
        return 'Unable to retrieve reviews.';
    }

    $reviews = $data['result']['reviews'];

    if (empty($reviews)) {
        return 'No reviews available.';
    }

    ob_start();
?>
    <div class="swiper reviews-slider">

        <div class=" swiper-wrapper">
            <?php for ($i = 0; $i < min($count, count($reviews)); $i++) :
                $rating = $reviews[$i]['rating'];
            ?>
                <div class="review-slide swiper-slide">
                    <div class="review-author flex w-full items-center relative">
                        <img src="<?php echo esc_url($reviews[$i]['profile_photo_url']); ?>" alt="<?php echo esc_html($reviews[$i]['author_name']); ?>" class="review-author-photo">
                        <div class="flex flex-col flex-grow ml-4">
                            <p class="font-bold"><?php echo esc_html($reviews[$i]['author_name']); ?></p>
                            <p class="text-sm text-gray-500"><?php echo $reviews[$i]['relative_time_description']; ?></p>
                        </div>
                        <img class="ml-auto h-6 absolute right-2" src="<?php echo get_template_directory_uri() . '/images/logo-google.png' ?> " alt="">
                    </div>
                    <div class="review-rating mt-2 mb-4">
                        <?php for ($j = 0; $j < 5; $j++) {
                            echo $j < $rating ? '★' : '☆';
                        } ?>
                    </div>
                    <p class="review-text text-gray-700"><?php echo esc_html($reviews[$i]['text']); ?></p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    <style>
        .reviews-slider {
            height: 50vh;
        }

        .review-slide {
            box-sizing: border-box;
            display: flex;
            justify-content: start;
            flex-direction: column;
            border: 1px solid #1E1E1E;
            padding: 40px 40px 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            height: 450px;
            overflow: auto;
            box-shadow: 20px 21px 0 0 #1E1E1E;
            transition: box-shadow 0.1s ease-in-out 0.1s;

            /* Added transition delay */
        }

        .review-slide:hover {
            box-shadow: 10px 11px 0 0 #1E1E1E;
            cursor: grab;
        }

        .review-author-photo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .review-rating {
            color: #f39c12;
            font-size: 1.5em;
        }

        .review-text {
            margin-top: 10px;
            font-size: 18px;
            color: #333;


        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('.reviews-slider', {
                slidesPerView: 4,
                spaceBetween: 40,
                centeredSlides: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 40,
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

add_shortcode('google_reviews_slider', 'display_google_reviews_slider');

?>