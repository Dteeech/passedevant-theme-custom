document.addEventListener('DOMContentLoaded', function () {
    var blocCtaLights = document.querySelectorAll('.bloc-cta_light, .bloc-cta_dark');
    var domain = window.location.origin;

    blocCtaLights.forEach(blocCtaLight => {
        var link = document.createElement('a');
        link.href = domain + '/contact'; // Remplacez par la route souhaitée
        link.classList.add('full-link');
        
        // Déplacer tous les enfants de blocCtaLight dans le lien
        while (blocCtaLight.firstChild) {
            link.appendChild(blocCtaLight.firstChild);
        }
        
        blocCtaLight.appendChild(link);
    });

});
