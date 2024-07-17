<?php
function custom_hero_menu_shortcode()
{
    ob_start();
    ?>
    <div class="custom-hero-menu absolute top-20 -right-40 w-1/4 flex flex-col md:flex md:flex-col">
        <div class="link-container seo">
            <a href="#" class="link-item lg:text-2xl">Le référencement</a>
        </div>
        <div class="link-container crea-web ms-20">
            <a href="#" class="link-item lg:text-2xl">La création de site web</a>
        </div>
        <div class="link-container formation ms-36">
            <a href="#" class="link-item lg:text-2xl">La formation</a>
        </div>
    </div>
    <style>
        .custom-hero-menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .link-container {
            position: relative;
            height: 155px;
            border-radius: 80px;
            padding: 20px 20px;
            transition: transform 0.3s ease-in-out;
            width: 650px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .link-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            border-radius: 80px;
            z-index: -1;
        }

        .link-container.seo::before {
            background: linear-gradient(90deg, #0524A7 0%, #DF22F0 26.5%, #FDA9C0 54.5%, #430A8B 86.5%);
        }

        .link-container.crea-web::before {
            background: linear-gradient(90deg, #05A9CF 5%, #95DFD2 23%, #02FEBD 48%, #029679 66%, #02A382 72.87%, #02B08A 79.75%, #044876 92.5%);
        }

        .link-container.formation::before {
            background: linear-gradient(90deg, #F71729 0%, #FF36E4 33%, #FE48A4 59%, #B6269D 86.5%);
        }

        .link-container:hover {
            transform: translateX(-270px);
        }

        .link-item {
            color: white;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
        }

        @media (max-width: 768px) {
            .custom-hero-menu {
                position: relative;
                top: auto;
                right: auto;
                width: auto;
                justify-content: center;
                margin-bottom: 20px;
            }

            .link-container {
                flex: auto;
                flex-wrap: nowrap;
                margin: 10px;
                border-radius: 80px;
                padding: 10px 15px;
                text-align: center;
                height: auto !important;
                width: 100%;
                font-size: .75rem !important;
                background: white !important;
                color: black !important;
            }

            .link-container:hover {
                transform: none !important;
            }

            .link-container::before {
                content: '';
                position: absolute;
                top: -3px;
                left: -3px;
                right: -3px;
                bottom: -3px;
                border-radius: 80px;
                z-index: -1;
            }

            .link-container.seo::before {
                background: linear-gradient(90deg, #0524A7 0%, #DF22F0 26.5%, #FDA9C0 54.5%, #430A8B 86.5%);
            }

            .link-container.crea-web::before {
                background: linear-gradient(90deg, #05A9CF 5%, #95DFD2 23%, #02FEBD 48%, #029679 66%, #02A382 72.87%, #02B08A 79.75%, #044876 92.5%);
            }

            .link-container.formation::before {
                background: linear-gradient(90deg, #F71729 0%, #FF36E4 33%, #FE48A4 59%, #B6269D 86.5%);
            }

            .link-item {
                color: black !important;
            }
        }
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_hero_menu', 'custom_hero_menu_shortcode');
