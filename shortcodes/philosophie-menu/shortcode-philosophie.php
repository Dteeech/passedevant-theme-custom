<?php
function custom_philosophie_content_shortcode()
{
    ob_start();
?>
    <div class="container mx-auto philosophie-wrapper">
        <h2 class="text-black text-5xl mt-20 mb-20">Notre philosophie</h2>
    </div>
    <div id="philosophie-content" class="wrapper flex"></div>
    <div id="mobile-content" class="hidden"></div>

    <style>
        .philosophie_content {
            display: flex;
            flex-direction: column;
            gap: 20px;
            border: 2px solid black;
            padding: 60px;
        }

        .philosophie_content-item {
            margin-bottom: 20px;
            color: black;
            max-width: 680px;
        }

        .content-title {
            font-size: 1.5em;
            font-weight: bold;
        }

        .philosophie_menu-link {
            position: relative;
            border-radius: 80px;
            transition: transform 0.3s ease-in-out;
            width: calc(100% + 50px);
        }

        .philosophie_full-link {
            font-size: 20px;
            display: flex;
            align-items: center;
            width: 50%;
            color: #000000 !important;
            text-decoration: none;
            padding: 10px;
            height: 100%;
            border-radius: inherit;
            text-align: start !important;
        }

        .active {
            color: white;
        }

        .hidden {
            display: none;
        }

        @media (max-width: 1024px) {
            #philosophie-content {
                display: none;
            }

            #mobile-content {
                display: block;
            }

            .accordion-button {
                width: 100%;
                text-align: left;
                background-color: #f0f0f0;
                border: none;
                padding: 10px;
                font-size: 1.2em;
                cursor: pointer;
                outline: none;
                transition: background-color 0.3s ease-in-out;
            }

            .accordion-button:hover {
                background-color: #ddd;
            }

            .accordion-content {
                display: none;
                padding: 10px;
                border: 1px solid #ddd;
                border-top: none;
                background-color: #f9f9f9;
            }

            .accordion-content.active {
                display: block;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {



            const isMobile = window.innerWidth <= 1024;

            fetch('<?php echo admin_url('admin-ajax.php?action=get_philosophie_content'); ?>')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const philosophieContent = document.getElementById('philosophie-content');
                        const mobileContent = document.getElementById('mobile-content');
                        philosophieContent.innerHTML = '';
                        mobileContent.innerHTML = '';

                        if (isMobile) {
                            loadMobilePhilosophieContent(data.data);
                        } else {
                            loadDesktopPhilosophieContent(data.data);
                        }
                    } else {
                        console.error(data.data);
                    }
                });

            function loadDesktopPhilosophieContent(data) {
                const philosophieContent = document.getElementById('philosophie-content');
                philosophieContent.innerHTML = `
                    <div class="philosophie_menu-links flex flex-col w-1/3 gap-3">
                        ${data.menu.map((menu, index) => `
                            <div class="philosophie_menu-link ${menu.id} flex justify-end rounded-xl align-middle items-center content-center h-12 relative ${index === 0 ? 'active' : ''}">
                                <a class="philosophie_full-link w-full text-left ${index === 0 ? 'active' : ''}" href="#" data-target="${menu.id}">
                                    ${menu.title}
                                </a>
                            </div>
                        `).join('')}
                    </div>
                    <div class="philosophie_content mx-32">
                        ${Object.keys(data.content).map(section_id => `
                            <div id="desktop-${section_id}" class="content-section ${section_id === 'objectifs' ? 'active' : 'hidden'} ${section_id}">
                                ${data.content[section_id].map(item => `
                                    <div class="philosophie_content-item">
                                        <h3 class="gradient-text_title content-title title-${section_id}">
                                            ${item.title}
                                        </h3>
                                        <p class="mt-7">${item.text}</p>
                                    </div>
                                `).join('')}
                            </div>
                        `).join('')}
                    </div>
                `;
                attachDesktopEvents();
            }

            function loadMobilePhilosophieContent(data) {
                const mobileContent = document.getElementById('mobile-content');
                mobileContent.innerHTML = `
                    ${data.menu.map((menu, index) => `
                        <div class="accordion-item">
                            <button class="accordion-button ${index === 0 ? 'active' : ''} ${menu.id}" data-target="${menu.id}">
                                ${menu.title}
                            </button>
                            <div id="mobile-${menu.id}" class="accordion-content ${index === 0 ? 'active' : 'hidden'} ${menu.id}">
                                ${data.content[menu.id].map(item => `
                                    <div class="philosophie_content-item">
                                        <h2 class="content-title title-${menu.id}">${item.title}</h2>
                                        <p>${item.text}</p>
                                    </div>
                                `).join('')}
                            </div>
                        </div>
                    `).join('')}
                `;
                attachMobileEvents();
            }

            function attachDesktopEvents() {
                const menuLinks = document.querySelectorAll('.philosophie_menu-link a');

                menuLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        const targetId = this.getAttribute('data-target');
                        const contentSections = document.querySelectorAll('#philosophie-content .content-section');

                        document.querySelectorAll('#philosophie-content .philosophie_menu-link').forEach(l => l.classList.remove('active'));
                        contentSections.forEach(section => section.classList.remove('active'));
                        contentSections.forEach(section => section.classList.add('hidden'));

                        document.getElementById('desktop-' + targetId).classList.add('active');
                        document.getElementById('desktop-' + targetId).classList.remove('hidden');
                        this.parentElement.classList.add('active');
                    });
                });
            }

            function attachMobileEvents() {
                const accordionButtons = document.querySelectorAll('.accordion-button');

                accordionButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const targetId = this.getAttribute('data-target');
                        const content = document.getElementById('mobile-' + targetId);

                        document.querySelectorAll('.accordion-content').forEach(c => c.classList.remove('active'));
                        document.querySelectorAll('.accordion-content').forEach(c => c.classList.add('hidden'));
                        document.querySelectorAll('.accordion-button').forEach(b => b.classList.remove('active'));

                        content.classList.add('active');
                        content.classList.remove('hidden');
                        button.classList.add('active');
                    });
                });
            }
        });
    </script>
<?php
    return ob_get_clean();
}
add_shortcode('custom_philosophie_content', 'custom_philosophie_content_shortcode');
