window.addEventListener("scroll", function() {
    let navbar = document.getElementById("navbar");
    let logo_white = document.getElementById("logo-white");
    let logo_ori = document.getElementById("logo-ori");
    if (window.scrollY > 50) { 
        navbar.classList.add("scrolled");
        logo_white.classList.add("d-none");
        logo_ori.classList.remove("d-none");
        logo_ori.classList.add("d-flex");
    } else {
        navbar.classList.remove("scrolled");
        logo_white.classList.remove("d-none");
        logo_ori.classList.add("d-none");
    }

    let navLinks = navbar.querySelectorAll(".nav-link"); // Get all .nav-link elements

    navLinks.forEach(link => {
        if (window.scrollY > 50) { 
            link.classList.add("scrolled");
        } else {
            link.classList.remove("scrolled");
        }
    });


    let deco_home = document.getElementById("decoration-home");
    if (window.scrollY > 750) { 
        deco_home.classList.add("d-none");
    } else {
        deco_home.classList.remove("d-none");
    }
});


const texts = [
    "Your partner in IT solution and innovation. "
];

let textIndex = 0;
let charIndex = 0;
let isDeleting = false;
let typingSpeed = 100;

function type() {
    const typedText = document.getElementById("typed-text");
    const currentText = texts[textIndex];

    if (isDeleting) {
        typedText.textContent = currentText.substring(0, charIndex--);
        typingSpeed = 50;
    } else {
        typedText.textContent = currentText.substring(0, charIndex++);
        typingSpeed = 100;
    }

    if (!isDeleting && charIndex === currentText.length) {
        isDeleting = true;
        typingSpeed = 1500; // Pause before deleting
    } else if (isDeleting && charIndex === 0) {
        isDeleting = false;
        textIndex = (textIndex + 1) % texts.length;
        typingSpeed = 500; // Pause before typing next
    }

    setTimeout(type, typingSpeed);
}

document.addEventListener("DOMContentLoaded", type);