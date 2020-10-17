/* element vi använder */
const eTargets = document.querySelectorAll(".scroll"); //är en lista på element, vi kallar listan för eTargets

/* lyssna på om man skrollar (scroll-hämdelsen) */
window.addEventListener("scroll", function(e) {

    /* Förflytta alla element: en efter en i en loop */
    eTargets.forEach(function(element) {
        /* läs av data-rate för element */
        var rate = element.dataset.rate;
        /* räkna en förflyttning */
        var distance = window.pageYOffset * rate;

        /* Flytta elementet */
        element.style.transform = "translateY(" + distance + "px)";
    });

});