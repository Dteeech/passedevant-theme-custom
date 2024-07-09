<?php
function custom_hero_menu_shortcode() {
    ob_start();
    ?>
    <div class="custom-hero-menu">
        <div class="link-container">
            <a href="#" class="link-item">Le référencement naturel</a>
        </div>
        <div class="link-container">
            <a href="#" class="link-item">Référencement payant</a>
        </div>
        <div class="link-container">
            <a href="#" class="link-item">La création de site web</a>
        </div>
        <div class="link-container">
            <a href="#" class="link-item">La formation</a>
        </div>
    </div>
    <style>
        .custom-hero-menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .link-container {
            background: linear-gradient(to right, #00bfff, #ff69b4);
            border-radius: 50px;
            padding: 10px 20px;
            position: relative;
            transition: transform 0.3s ease-in-out;
        }

        .link-container:hover {
            transform: translateX(-10px);
        }

        .link-item {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_hero_menu', 'custom_hero_menu_shortcode');
