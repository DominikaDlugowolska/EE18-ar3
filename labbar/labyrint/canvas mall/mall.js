/* ******************************** */
/*          Inställningar           */
/* ******************************** */

// hitta element på sidan
const canvas = document.querySelector("canvas");

// ställ in storlek på canvas
canvas.width = 800;
canvas.height = 600;

// starta canvar rit-api
var ctx = canvas.getContext("2d");

/* ******************************** */
/*         Globala variabler        */
/* ******************************** */

var karta = [
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
]

/* ******************************** */
/*          Objekt som syns         */
/* ******************************** */

var piga = {

}

var monster = {

}

/* ******************************** */
/*         Animationsloopen         */
/* ******************************** */

function loopen() {
    ctx.clearRect(0, 0, 800, 600);

    ritaPiga();

    requestAnimationFrame(loopen);
}
loopen();

/* ******************************** */
/*            Funktioner            */
/* ******************************** */

// rita ut nyckelpigan
function ritaPiga() {
    ctx.drawImage(piga.bild, piga.x, piga.y, 50, 50);
}
/* ******************************** */
/*            Interaktion           */
/* ******************************** */

// e, lyssnar på när man klickar på knappen och e säger vilken tangent det är
window.addEventListener("keypress", function (e) {
    switch (e.code) {
        case "Numpad2":
            piga.y++;
            break;
        case "Numpad8":
            piga.y--;
            break;
        case "Numpad4":
            piga.x--;
            break;
        case "Numpad6":
            piga.x++;
            break;
    
        default:
            break;
    }
})