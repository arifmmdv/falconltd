document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('.section');
    const menuItems = document.querySelectorAll('.menu-item');
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
        menuItems.forEach(item => {
            item.classList.remove('bg-primary');
            item.classList.remove('text-white');
        });
        menuItems[index].classList.add('bg-primary');
        menuItems[index].classList.add('text-white');
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

    menuItems.forEach(item => {
        item.addEventListener('click', (event) => {
            document.getElementById('mobile-menu').classList.remove('open');
            event.preventDefault();

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

    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('open');
    });

    document.querySelector('.mobile-menu-close').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.remove('open');
    });

});
