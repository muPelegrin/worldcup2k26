document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll('.scroll-btn');
    
    const menu = document.querySelector('.navegacao');

    buttons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();

            const targetId = button.getAttribute('data-target');
            const targetSection = document.querySelector(targetId);

            if (targetSection) {
                const menuHeight = menu.offsetHeight + 20; 

                const elementPosition = targetSection.getBoundingClientRect().top + window.scrollY;
                
                const offsetPosition = elementPosition - menuHeight;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: "smooth"
                });
            }
        });
    });
});