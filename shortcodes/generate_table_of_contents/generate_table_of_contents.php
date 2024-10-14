<?php
function generate_table_of_contents($atts)
{
    global $post;

    // Récupérer le contenu de l'article
    $content = $post->post_content;

    // Rechercher toutes les balises H2
    preg_match_all('/<h2.*?>(.*?)<\/h2>/is', $content, $matches);

    if (count($matches[1]) > 0) {
        $toc = '<div class="table-of-contents"><h3>Sommaire</h3><ul>';

        // Boucler à travers chaque titre trouvé
        foreach ($matches[1] as $index => $title) {
            // Générer l'ID pour chaque H2
            $anchor_id = 'heading-' . $index;

            // Ajouter un lien dans la table des matières
            $toc .= '<li><a href="#' . $anchor_id . '">' . $title . '</a></li>';
        }

        $toc .= '</ul></div>';

        return $toc;
    }

    return '';
}

add_shortcode('table_of_contents', 'generate_table_of_contents');
