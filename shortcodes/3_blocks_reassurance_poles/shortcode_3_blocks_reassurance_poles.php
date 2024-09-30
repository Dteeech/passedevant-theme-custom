<?php
function shortcote_3_blocks_reassurance_shortcode()
{
    ob_start();
?>
    <div class="container mx-auto flex lg:flex-row flex-wrap gap-20 justify-center pb-20">
        <div class="card border-2 border-white p-10">
            <div class="flex items-center space-x-4 justify-between">
                <h3 class="text-2xl font-bold">Le SEO</h3>
                <div class="background-img_3_blocks">
                    <img src="<?php echo get_template_directory_uri() . '/images/logos/logo-seo-light.png'; ?>" alt="Logo" class="inner-logo">
                </div>
            </div>
            <ul class="mt-12">
                <li class="list-item_reassurance">Gestion de projets</li>
                <li class="list-item_reassurance">Gestion de projets</li>
                <li class="list-item_reassurance">Gestion de projets</li>
                <li class="list-item_reassurance">Gestion de projets</li>
                <li class="list-item_reassurance">Gestion de projets</li>
                <li class="list-item_reassurance">Gestion de projets</li>
            </ul>
            <div class="flex gap-4 mt-8 items-end">
                <a href="" class="underline">Je veux en savoir +</a>
                <a href="" class="flex items-center justify-center w-20 h-20 rounded-full overflow-visible border-white border-4 p-4"><img width="100%" height="auto" src="<?php echo get_template_directory_uri() . '/images/svg/arrow-right-rounded-white.svg'; ?>" alt=""></a>
            </div>
        </div>

        <div class="card border-2 border-white p-10">


            <div class="flex items-center space-x-4 justify-between">
                <h3 class="text-2xl font-bold">La Création <br />de sites web</h3>
                <div class="background-img_3_blocks">
                    <img src="<?php echo get_template_directory_uri() . '/images/logos/logo-dev-light.png'; ?>" alt="Logo" class="inner-logo">
                </div>
            </div>
            <ul class="mt-12">
                <li class="list-item_reassurance">Gestion de projets</li>
                <li class="list-item_reassurance">Gestion de projets</li>
                <li class="list-item_reassurance">Gestion de projets</li>
                <li class="list-item_reassurance">Gestion de projets</li>
                <li class="list-item_reassurance">Gestion de projets</li>
                <li class="list-item_reassurance">Gestion de projets</li>
            </ul>
            <div class="flex gap-4 mt-8 items-end">
                <a href="" class="underline">Je veux en savoir +</a>
                <a href="" class="flex items-center justify-center w-20 h-20 rounded-full overflow-visible border-white border-4 p-4"><img width="100%" height="auto" src="<?php echo get_template_directory_uri() . '/images/svg/arrow-right-rounded-white.svg'; ?>" alt=""></a>
            </div>
        </div>

        <div class="card border-2 border-white p-10">


            <div class="flex items-center space-x-4 justify-between">
                <h3 class="text-2xl font-bold">La Formation</h3>
                <div class="background-img_3_blocks">
                    <img src="<?php echo get_template_directory_uri() . '/images/logos/logo-formation-light.png'; ?>" alt="Logo" class="inner-logo">
                </div>
            </div>
            <ul class="mt-12">
                <li class="list-item_reassurance">Gestion de projets</li>
                <li class="list-item_reassurance">Gestion de projets</li>
                <li class="list-item_reassurance">Gestion de projets</li>
                <li class="list-item_reassurance">Gestion de projets</li>
                <li class="list-item_reassurance">Gestion de projets</li>
                <li class="list-item_reassurance">Gestion de projets</li>
            </ul>
            <div class="flex gap-4 mt-8 items-end">
                <a href="" class="underline">Je veux en savoir +</a>
                <a href="" class="flex items-center justify-center w-20 h-20 rounded-full overflow-visible border-white border-4 p-4"><img width="100%" height="auto" src="<?php echo get_template_directory_uri() . '/images/svg/arrow-right-rounded-white.svg'; ?>" alt=""></a>
            </div>
        </div>
    </div>
    <style>
        .background-img_3_blocks {
            background: white;
            border-radius: 50%;
            width: 95px;
            height: 95px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            /* Ajouté pour cacher tout dépassement de l'image */
        }

        .inner-logo {
            width: 250px;
            height: 250px;
            object-fit: cover;
            /* Utilisé pour couvrir entièrement le conteneur sans déformation */
        }

        .list-item_reassurance {
            position: relative;
            padding-left: 35px;
            /* Espace pour l'icône */
            margin-bottom: 15px;
        }

        .list-item_reassurance::before {
            content: '';
            background-image: url("<?php echo get_template_directory_uri() . '/images/coche-dark.png'; ?>");
            background-size: contain;
            background-repeat: no-repeat;
            width: 25px;
            height: 25px;
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
        }
    </style>
<?php
    return ob_get_clean();
}

add_shortcode('shortcode_3_blocks_reassurance', 'shortcote_3_blocks_reassurance_shortcode');
?>