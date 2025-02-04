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