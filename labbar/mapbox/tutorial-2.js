// Hitta tabellen
const eTable = document.querySelector('table');
const eButton = document.querySelector('button');

// Min personliga access
mapboxgl.accessToken = 'pk.eyJ1IjoiZG9taWluIiwiYSI6ImNrbTYxeWtvMTBqeXEybm53Z3plbzAwbDkifQ.VokzllGR2jJqdrgbjLIgsQ';

// Skapa karta
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/domiin/ckm1xho0e60j317t8hgg4wzgk', // replace this with your style URL
    center: [18.0649, 59.33258],
    zoom: 9
});

// Lägg till markers när man klickar på kartan
// med e(event) fångar man upp informationen med klicket
map.on("click", function (e) {
    console.log("du har klickat på kartan", e.lngLat);

    // Infoga en marker
    var marker = new mapboxgl.Marker()
        .setLngLat(e.lngLat)
        .addTo(map);

    // Infoga rad i tabellen
    var newRow = eTable.insertRow();
    newRow.insertCell().innerText = e.lngLat.lng;
    newRow.insertCell().innerText = e.lngLat.lat;
    // gör tredje cellen redigerbar
    newRow.insertCell().contentEditable = "true";
    var lastCell = newRow.insertCell();
    lastCell.contentEditable = "true";
    lastCell.innerText = "...";

});

eButton.addEventListener("click", function() {
    // skriv ut innehållet av tabellen i loggen
    // 1. hitta första cellen
    const eCell = document.querySelector("td");
    // 2. läs av innehållet
    //console.log(eCell.textContent);

    
    // Hitta ALLA celler
    var eCeller = document.querySelectorAll("td");

    var innehållet = "";

    // loopa igenom alla celler
    eCeller.forEach(cell => {
        //console.log(cell.innerText);

        // lägg allting i ett paket
        innehållet += cell.innerText + "";
    });

    // Låtsas att vi har ett formulär
    var formData = new FormData();
    // .append är att lägga
    formData.append("texten", innehållet);

    // Skicka till backend
    fetch("spara.php", {
        method: "post",
        body: formData
    })                 // skickar
    .then(response => response.text()) // tar emot data
})