/* FRONTEND */

// Välj ut elementen
const eGrid = document.querySelector(".grid-6");
const eKnapp = document.querySelector("button");

// när man klickar på knappen
eKnapp.addEventListener("click", function() {
    console.log("Hämtar...");

    fetch("./ajax/skicka-flaggor.php")
    .then(response => response.text())
    .then(data => {
        console.log(data);

        // Fyll griden med bild
        eGrid.innerHTML += data;
    })
})