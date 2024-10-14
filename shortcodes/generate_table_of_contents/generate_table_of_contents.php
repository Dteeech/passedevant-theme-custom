<?php
function generate_table_of_contents($atts)
{
    global $post;

    // Récupérer le contenu de l'article
    $content = $post->post_content;

    // Créer une instance de DOMDocument
    $dom = new DOMDocument();
    libxml_use_internal_errors(true); // Ignorer les erreurs HTML mal formées
    $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));

    // Rechercher toutes les balises <h2> dans le document
    $headings = $dom->getElementsByTagName('h2');
    $toc = '<div class="table-of-contents"><h3>Sommaire</h3><ul>';

    // Boucler à travers chaque balise <h2> trouvée
    foreach ($headings as $index => $heading) {
        if ($heading->nodeType == XML_ELEMENT_NODE) {
            // Créer un ID unique pour chaque <h2>
            $anchor_id = 'heading-' . $index;
            // Ajouter un lien dans la table des matières
            $toc .= '<li><a href="#' . $anchor_id . '">' . $heading->textContent . '</a></li>';
        }
    }

    $toc .= '</ul></div>';

    // Retourner la table des matières
    return $toc;
}

add_shortcode('table_of_contents', 'generate_table_of_contents');
