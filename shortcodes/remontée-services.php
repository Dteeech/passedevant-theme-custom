<?php
function shortcode_remontee_services()
{
    ob_start();
?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sélectionner tous les conteneurs de card
            const cardContainers = document.querySelectorAll('.card__bx');

            cardContainers.forEach(card => {
                // Sélectionner l'image à l'intérieur de la card
                const icon = card.querySelector('.service-icon');

                // Si une image existe dans cette card
                if (icon) {
                    // Stocker l'image de base (-light)
                    const originalSrc = icon.src;

                    // Déterminer le chemin de l'image -dark
                    const darkSrc = originalSrc.replace('-dark', '-light');

                    // Ajouter les événements sur la card
                    card.addEventListener('mouseenter', function() {
                        icon.src = darkSrc; // Passer à l'image -dark
                    });

                    card.addEventListener('mouseleave', function() {
                        icon.src = originalSrc; // Revenir à l'image -light
                    });
                }
            });
        });
    </script>



    </script>

    </script>
    <section class="container">
        <section class="card__container">
            <div class="card__bx" style="--clr: #FFFFFF">
                <div class="card__data">
                    <div class="card__icon">
                        <img src="<?php echo get_template_directory_uri() . '/images/logos/logo-seo-dark.png'; ?>" class="service-icon" alt="">
                    </div>
                    <div class="card__content">
                        <h3>SEO</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="#">Voir Plus</a>
                    </div>
                </div>
            </div>
            <div class="card__bx" style="--clr: #FFFFFF">
                <div class="card__data">
                    <div class="card__icon">
                        <img src="<?php echo get_template_directory_uri() . '/images/logos/logo-dev-dark.png'; ?>" class="service-icon" alt="">
                    </div>
                    <div class="card__content">
                        <h3>Création de sites</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="#">Voir Plus</a>
                    </div>
                </div>
            </div>
            <div class="card__bx" style="--clr: #FFFFFF">
                <div class="card__data">
                    <div class="card__icon">
                        <img src="<?php echo get_template_directory_uri() . '/images/logos/logo-dark.png'; ?>" class="service-icon" alt="">
                    </div>
                    <div class="card__content">
                        <h3>SEA</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="#">Voir Plus</a>
                    </div>
                </div>
            </div>
            <div class="card__bx" style="--clr: #FFFFFF">
                <div class="card__data">
                    <div class="card__icon">
                        <img src="<?php echo get_template_directory_uri() . '/images/logos/logo-formation-dark.png'; ?>" class="service-icon" alt="">
                    </div>
                    <div class="card__content">
                        <h3>Formations</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="#">Voir Plus</a>
                    </div>
                </div>
            </div>

        </section>

    </section>
    <style>
        /*==================== GOOGLE FONTS ====================*/
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap");

        /*==================== VARIABLES CSS ====================*/
        :root {
            /*========== Colors ==========*/
            --text-color: #000000;
            --bg-color: #1E1E1E;

            /*========== Font and typography ==========*/
            --body-font: "Labil Grotesk", sans-serif;
            --normal-font-size: 0.938rem;
        }

        @media screen and (min-width: 968px) {
            :root {
                --normal-font-size: 1rem;
            }
        }

        /*==================== BASE ====================*/
        *,
        *:after,
        *:before {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }



        /*==================== REUSABLE CSS CLASSES ====================*/
        .container {
            background-color: var(--bg-color);
            color: var(--text-color);
            max-width: 1140px;
            width: 100%;
            margin: 0 auto;
            padding: 3rem 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
        }

        /*==================== SERVICE CARD ====================*/
        .card__container {
            display: flex;
            flex-wrap: wrap;
            gap: 60px;
            justify-content: center;
            width: 100%;
            max-width: 90%;
            margin: auto;
            padding: 60px 0;
        }

        .card__bx {
            --dark-color: #1E1E1E;
            --dark-alt-color: #777777;
            --white-color: #ffffff;
            --button-color: #333333;
            --transition: 0.5s ease-in-out;
            font-family: inherit;
            height: 350px;
            width: 350px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            background: var(--dark-color);
            transition: var(--transition);
            border-radius: 12px;
            border: 1px solid white;
        }

        .card__bx::after {
            inset: 60px -10px;
            border-left: 4px solid var(--clr);
            transform: skew(15deg);
            border-right: 4px solid var(--clr);
        }

        .card__bx:hover::after {
            inset: 40px -10px;
            transform: skew(0deg);
        }

        .card__bx .card__data {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 30px;
            text-align: center;
            padding: 0 20px;
            height: 100%;
            width: 100%;
            overflow: hidden;
            border-radius: 12px;
        }

        .card__bx .card__data .card__icon {
            height: 100px;
            width: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 3rem;
            color: var(--text-color);
            background-color: var(--dark-color);
            transition: var(--transition);
            padding: 0;
            margin: 0;
            border-radius: 50px;
        }

        .card__bx .card__data .card__icon img {
            width: 200px;
            height: 200px;
            object-fit: cover;
        }

        .card__bx .card__data .card__icon {
            color: var(--clr);
            box-shadow: 0 0 0 4px var(--dark-color), 0 0 0 6px var(--clr);
        }

        .card__bx:hover .card__data .card__icon {
            color: var(--dark-color);
            background-color: var(--clr);
            box-shadow: 0 0 0 4px var(--dark-color), 0 0 0 300px var(--clr);
        }



        .card__bx .card__data .card__content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .card__bx .card__data h3 {
            font-size: 1.5rem;
            font-weight: 500;
            color: var(--white-color);
            transition: var(--transition);
        }

        .card__bx:hover .card__data h3 {
            color: var(--dark-color);
            transition: var(--transition);
        }

        .card__bx .card__data p {
            font-size: 0.9rem;
            color: var(--dark-alt-color);
            transition: var(--transition);
        }

        .card__bx:hover .card__data p {
            color: var(--dark-color);
            transition: var(--transition);
        }

        .card__bx .card__data a {
            position: relative;
            display: inline-flex;
            padding: 8px 15px;
            text-decoration: none;
            font-weight: 500;
            border: 2px solid var(--clr);
            color: var(--dark-color);
            background-color: var(--clr);
            transition: var(--transition);
            border-radius: 50px;
        }

        .card__bx:hover .card__data a {
            color: var(--clr);
            background-color: var(--dark-color);
        }

        .card__bx:hover .card__data a:hover {
            border-color: var(--dark-color);
            color: var(--dark-color);
            background-color: var(--clr);
        }
    </style>
<?php
    return ob_get_clean();
}

add_shortcode('shortcode_remontee_services', 'shortcode_remontee_services');
