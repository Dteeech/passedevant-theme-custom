<?php
function get_google_my_business_rating($atts) {
    $atts = shortcode_atts(
        array(
            'place_id' => '',  // Place ID of your Google My Business
            'api_key' => '',   // Your Google API key
        ),
        $atts
    );

    $place_id = $atts['place_id'];
    $api_key = $atts['api_key'];

    if (empty($place_id) || empty($api_key)) {
        return 'Place ID or API key missing.';
    }

    $response = wp_remote_get("https://maps.googleapis.com/maps/api/place/details/json?place_id={$place_id}&key={$api_key}");

    if (is_wp_error($response)) {
        return 'Unable to retrieve rating.';
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    if ($data['status'] != 'OK') {
        return 'Unable to retrieve rating.';
    }

    $rating = $data['result']['rating'];
    $user_ratings_total = $data['result']['user_ratings_total'];
    $stars = str_repeat('&#9733;', round($rating));

    ob_start();
    ?>
    <div class="google-rating-badge mt-20">
        <div class="google-logo">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo-google.png" alt="Google Logo" />
            <div class="reviews"><?php echo $user_ratings_total; ?> avis</div>
            
        </div>
        <div class="rating-info">
            <div class="flex flex-col">

                <div class="rating-value"><?php echo $rating; ?> </div>
                <div class="stars">
                    <?php for ($i = 0; $i < 5; $i++) {
                        echo $i < $rating ? '★' : '☆';
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <style>
        .google-rating-badge {
            display: flex;
            flex-direction: row;
            align-items: center;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            background-color: transparent;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            text-align: center;
            font-family: inherit;
            width: fit-content
        }
        .google-logo img {
            width: 75px;
            margin-bottom: 10px;
        }
        .rating-info {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap:20px;
        }
        .google-rating {
            font-weight: bold;
            font-size: 1.2em;
            margin-bottom: 5px;
        }
        .rating-value {
            font-size: 2.5em;
            color: #fff;
            margin-bottom: 5px;
        }
        .stars {
            color: #f39c12;
            font-size: 1.5em;
            margin-bottom: 5px;
        }
        .reviews {
            color: #777;
            font-size: 0.9em;
        }
    </style>
    <?php
    return ob_get_clean();
}

add_shortcode('google_my_business_rating', 'get_google_my_business_rating');
