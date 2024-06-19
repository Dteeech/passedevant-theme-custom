document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('masthead');
    const logo = document.querySelectorAll('.logo');
    const menuItems = document.querySelectorAll('.menu-item');

    function updateHeaderStyles() {
        const bgColor = window.getComputedStyle(header).backgroundColor;

        if (bgColor === 'rgb(255, 255, 255)') {
            header.classList.remove('header-dark');
            header.classList.add('header-light');
        } else {
            header.classList.remove('header-light');
            header.classList.add('header-dark');
        }
    }

    // Initial check
    updateHeaderStyles();

    // Example function to change background color
    function changeBackgroundColor(color) {
        header.style.backgroundColor = color;
        updateHeaderStyles();
    }

    // Change the background color for testing purposes
    setTimeout(() => changeBackgroundColor('white'), 2000); // Change to white after 2 seconds
    setTimeout(() => changeBackgroundColor('black'), 4000); // Change to black after 4 seconds
});
