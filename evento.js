// scripts.js

document.addEventListener('DOMContentLoaded', () => {
    const navLinks = document.querySelectorAll('nav ul li a');

    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = e.target.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            window.scrollTo({
                top: targetElement.offsetTop - 80, // Adjust for header height
                behavior: 'smooth'
            });
        });
    });
});
