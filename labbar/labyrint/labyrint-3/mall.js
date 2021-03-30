/* ******************************** */
/*          Inställningar           */
/* ******************************** */

// hitta element på sidan
const canvas = document.querySelector("canvas");
const texten = document.querySelector("p");

// ställ in storlek på canvas
canvas.width = 650;
canvas.height = 550;

// starta canvar rit-api
var ctx = canvas.getContext("2d");

/* ******************************** */
/*         Globala variabler        */
/* ******************************** */

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

/* ******************************** */
/*          Objekt som syns         */
/* ******************************** */

var figur = {
    rad: 0,
    kolumn: 1,
    rotation: 0,
    poäng: 0,
    bild: new Image()
}
figur.bild.src = "../bilder/nyckelpiga.png";

var monster = {
    rad: 0,
    kolumn: 0,
    bild: new Image()
}
monster.bild.src = "../bilder/monster.svg";

// objekt mynt
var mynt1 = {
    rad: 0,
    kolumn: 0,
    bild: new Image()
}
mynt1.bild.src = "../bilder/dollar.png";

// objekt mynt
var mynt2 = {
    rad: 0,
    kolumn: 0,
    bild: new Image()
}
mynt2.bild.src = "../bilder/dollar.png";

/* ******************************** */
/*         Kod innan loopen         */
/* ******************************** */
spawnaMynt(mynt1);
spawnaMynt(mynt2);
spawnaMonster();

/* ******************************** */
/*         Animationsloopen         */
/* ******************************** */

function loopen() {
    ctx.clearRect(0, 0, 650, 550);

    ritaKartan();
    ritaFigur();
    ritaMonstret();
    ritaMynt(mynt1);
    ritaMynt(mynt2);

    plockaPoäng(mynt1);
    plockaPoäng(mynt2);

    requestAnimationFrame(loopen);
}
loopen();

/* ******************************** */
/*            Funktioner            */
/* ******************************** */

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

// rita ut nyckelpigan
function ritaFigur() {
    ctx.save();
    ctx.translate(figur.kolumn * 50 + 25, figur.rad * 50 + 25);
    ctx.rotate(figur.rotation / 180 * Math.PI);
    ctx.drawImage(figur.bild, -25, -25, 50, 50);
    ctx.restore();
}

// rita ut monstret
function ritaMonstret() {
    ctx.save();
    ctx.translate(monster.kolumn * 50 + 25, monster.rad * 50 + 25);
    ctx.rotate(monster.rotation / 180 * Math.PI);
    ctx.drawImage(monster.bild, -25, -25, 50, 50);
    ctx.restore();
}

// rita ut mynt
function ritaMynt(mynt) {
ctx.drawImage(mynt.bild, mynt.kolumn * 50, mynt.rad * 50, 50, 50);
}

// spawna ett mynt
function spawnaMonster() {
    // oändlig loop
    while (true) {
        monster.rad = Math.floor(Math.random() * 11);
        monster.kolumn = Math.floor(Math.random() * 13);

        // avbyt när monstret hamnar på 0
        if (karta[monster.rad][monster.kolumn] == 0) {
            break;
        }
    }
}

// spawna ett mynt
function spawnaMynt(mynt) {
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
function plockaPoäng(mynt) {
    // om figuren är i samma ruta som myntet
    if (figur.rad == mynt.rad && figur.kolumn == mynt.kolumn) {
        // öka poäng
        figur.poäng++;
        texten.textContent = figur.poäng;
        // spawna om myntet
        spawnaMynt(mynt);
    }
}



/* ******************************** */
/*            Interaktion           */
/* ******************************** */

// e, lyssnar på när man klickar på knappen och e säger vilken tangent det är
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