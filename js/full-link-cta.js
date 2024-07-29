document.addEventListener('DOMContentLoaded', function () {
    var blocCtaLight = document.querySelector('.bloc-cta_light');
    if (blocCtaLight) {
        var specificPath = '/contact'; // Remplacez par le chemin spécifique désiré
        var link = document.createElement('a');
        link.href = window.location.origin + specificPath; // Construire l'URL complète
        link.classList.add('full-link');
        
        // Déplacer tous les enfants de blocCtaLight dans le lien
        while (blocCtaLight.firstChild) {
            link.appendChild(blocCtaLight.firstChild);
        }
        
        blocCtaLight.appendChild(link);
    }

    const ctaBlocks = document.querySelectorAll('.bloc-cta_light');
    const cursor = document.createElement('div');
    cursor.classList.add('cursor');
    cursor.innerText = 'Je fonce';
    document.body.appendChild(cursor);

    let mouseX = 0, mouseY = 0;
    let posX = 0, posY = 0;

    function moveCursor(e) {
        mouseX = e.clientX;
        mouseY = e.clientY;
    }

    function updatePosition() {
        posX += (mouseX - posX) * 0.1;
        posY += (mouseY - posY) * 0.1;
        cursor.style.transform = `translate(${posX}px, ${posY}px)`;
        requestAnimationFrame(updatePosition);
    }

    function handleMouseEnter() {
        cursor.style.display = 'flex';
    }

    function handleMouseLeave() {
        cursor.style.display = 'none';
    }

    ctaBlocks.forEach(block => {
        block.addEventListener('mousemove', moveCursor);
        block.addEventListener('mouseenter', handleMouseEnter);
        block.addEventListener('mouseleave', handleMouseLeave);

        block.addEventListener('click', () => {
            window.location.href = block.querySelector('a.full-link').href;
        });
    });

    updatePosition(); // Démarrer l'animation de mise à jour de la position du curseur
});
