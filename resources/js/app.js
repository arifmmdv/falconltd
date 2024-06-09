document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('.section');
    const images = document.querySelectorAll('.section-image');

    const makeVisible = (index) => {
        images.forEach((img, idx) => {
            if (idx === index) {
                img.classList.remove('opacity-0');
                img.classList.add('opacity-100');
            } else {
                img.classList.remove('opacity-100');
                img.classList.add('opacity-0');
            }
        });
    };

    const handleScroll = () => {
        let currentSectionIndex = 0;
        sections.forEach((section, index) => {
            const rect = section.getBoundingClientRect();
            if (rect.top <= window.innerHeight / 2 && rect.bottom >= window.innerHeight / 2) {
                currentSectionIndex = index;
            }
        });
        makeVisible(currentSectionIndex);
    };

    window.addEventListener ("scroll",() => handleScroll());
    handleScroll();

    const menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach(item => {
        item.addEventListener('click', (event) => {
            event.preventDefault();

            // Remove active class from all menu items
            menuItems.forEach(menuItem => menuItem.classList.remove('active'));

            // Add active class to the clicked menu item
            item.classList.add('active');

            const targetId = item.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });

});
