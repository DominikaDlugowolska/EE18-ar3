// element vi använder
const canvas = document.querySelector("canvas");
const texten = document.querySelector("p");

// ställ in storlek på canvas
canvas.width = 650;
canvas.height = 550;

// slå på rit-api
var ctx = canvas.getContext("2d");

// skapa kartan
var karta = [
    [1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1],
    [1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1],
    [1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1],
    [1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1],
    [1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1],
    [1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1],
    [1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1],
    [1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1],
    [1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
]

// figur objektet
var figur = {
    rad: 0,
    kolumn: 1,
    rotation: 0,
    poäng: 0,
    bild: new Image()
}
figur.bild.src = "./nyckelpiga.png";

// objekt mynt
var mynt = {
    rad: 0,
    kolumn: 0,
    bild: new Image()
}
mynt.bild.src = "./dollar.png";

function ritaFigur() {
    ctx.save();
    ctx.translate(figur.kolumn * 50 + 25, figur.rad * 50 + 25);
    ctx.rotate(figur.rotation / 180 * Math.PI);
    ctx.drawImage(figur.bild, -25, -25, 50, 50);
    ctx.restore();
}

// rita kartan
function ritaKartan() {

    // loopa igenom raderna
    for (var rad = 0; rad < 11; rad++) {

        // loopa igenom kolumner
        for (var kolumn = 0; kolumn < 13; kolumn++) {

            // om '1' rita ut en kloss
            if (karta[rad][kolumn] == 1) {
                ctx.fillRect(kolumn * 50, rad * 50, 50, 50);
            }
        }
    }

}

// rita ut mynt
function ritaMynt() {
ctx.drawImage(mynt.bild, mynt.kolumn * 50, mynt.rad * 50, 50, 50);
}

// spawna ett mynt
function spawnaMynt() {
    // oändlig loop
    while (true) {
        mynt.rad = Math.floor(Math.random() * 11);
        mynt.kolumn = Math.floor(Math.random() * 13);

        // avbyt när myntet hamnar på 0
        if (karta[mynt.rad][mynt.kolumn] == 0) {
            break;
        }
    }
}

// plocka myntet, få poäng
function plockaPoäng() {
    // om figuren är i samma ruta som myntet
    if (figur.rad == mynt.rad && figur.kolumn == mynt.kolumn) {
        // öka poäng
        figur.poäng++;
        texten.textContent = figur.poäng;
        // spawna om myntet
        spawnaMynt();
    }
}
spawnaMynt();


// animationsloop
function loopen() {
    // sudda ut canvas
    ctx.clearRect(0, 0, 650, 550);

    // rita kartan
    ritaKartan();
    ritaFigur();
    ritaMynt();
    plockaPoäng();

    requestAnimationFrame(loopen);
}

// starta loopen
loopen();
// lyssna på piltangenter, 'e' vilken tangent som trycks i stunden
window.addEventListener("keypress", function (e) {

    switch (e.code) {
        case "Numpad2": // pil nedåt
            if (karta[figur.rad + 1][figur.kolumn] == 0) {
                figur.rad++;
            }
            figur.rotation = 180;

            break;
        case "Numpad8": // pil uppåt
            if (karta[figur.rad - 1][figur.kolumn] == 0) {
                figur.rad--;
            }

            figur.rotation = 0;

            break;
        case "Numpad4": // pil vänster
            if (karta[figur.rad][figur.kolumn - 1] == 0) {
                figur.kolumn--;
            }
            figur.rotation = 270;

            break;
        case "Numpad6": // pil höger
            if (karta[figur.rad][figur.kolumn + 1] == 0) {
                figur.kolumn++;
            }
            figur.rotation = 90;

            break;

        default:
            break;
    }
    console.log("kolumn: " + figur.kolumn + ", rad: " + figur.rad);
})
