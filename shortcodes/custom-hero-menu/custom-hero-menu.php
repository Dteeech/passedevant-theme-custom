<?php
function custom_hero_menu_shortcode()
{
    ob_start();
    ?>
    <div class="custom-hero-menu absolute top-20 -right-40 w-1/4 flex flex-col md:flex md:flex-col">

        <div class="link-container seo ">
            <a href="#" class="link-item text-xl ">Le référencement</a>
        </div>
        <div class="link-container crea-web ms-20">
            <a href="#" class="link-item text-xl">La création de site web</a>
        </div>
        <div class="link-container formation ms-36">
            <a href="#" class="link-item text-xl">La formation</a>
        </div>
    </div>
    <style>
        .custom-hero-menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .link-container {
            border-radius: 80px;
            padding: 10px 20px;
            position: relative;
            transition: transform 0.3s ease-in-out;
            min-height: 155px;
            width: 650px;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .link-container.seo {
            background: linear-gradient(90deg, #0524A7 0%, #DF22F0 26.5%, #FDA9C0 54.5%, #430A8B 86.5%);
        }

        .link-container.crea-web {
            background: linear-gradient(90deg, #05A9CF 5%, #95DFD2 23%, #02FEBD 48%, #029679 66%, #02A382 72.87%, #02B08A 79.75%, #044876 92.5%);

            
        }

        .link-container.formation {
            background: linear-gradient(90deg, #F71729 0%, #FF36E4 33%, #FE48A4 59%, #B6269D 86.5%);

        }

        .link-container:hover {
            transform: translateX(-270px);
        }

        .link-item {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .custom-hero-menu {
                position: relative;
                top: auto;
                right: auto;
                width: 100%;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
                margin-bottom: 20px;
            }

            .link-container {
                flex: auto;
                flex-wrap: nowrap;
                margin: 10px;
                border-radius: 80px;
                padding: 10px 15px;
                text-align: center;
            }
        }
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_hero_menu', 'custom_hero_menu_shortcode');
