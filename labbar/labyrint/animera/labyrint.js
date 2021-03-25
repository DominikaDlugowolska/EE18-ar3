// element vi använder
const canvas = document.querySelector("canvas");

// ställ in storlek på canvas
canvas.width = 600;
canvas.height = 500;

// slå på rit-api
var ctx = canvas.getContext("2d");


// figur objektet
var figur = {
    x: 100,
    y: 100,
    rotation: 0,
    bild: new Image()
}
figur.bild.src = "../mushroom.jpg";

// animationsloop
function loopen() {
    // sudda ut canvas
    ctx.clearRect(0, 0, 600, 500);

    // rita figuren
    ctx.drawImage(figur.bild, figur.x, figur.y, 50, 50);

    requestAnimationFrame(loopen);
}

// starta loopen
loopen();

// lyssna på piltangenter, 'e' vilken tangent som trycks i stunden
window.addEventListener("keypress", function (e) {

    switch (e.code) {
        case "Numpad2": // pil nedåt
            if (figur.y < 450) {
                figur.y += 50;
            }
            break;
        case "Numpad8": // pil uppåt
        if (figur.y > 0) {
            figur.y -= 50;
        }
            break;
        case "Numpad4": // pil vänster
        if (figur.x > 0) {
            figur.x -= 50;
        }
            break;
        case "Numpad6": // pil höger
        if (figur.x < 550) {
            figur.x += 50;
        }
            break;

        default:
            break;
    }
    console.log("kolumn: " + figur.x / 50 + ", rad: " + figur.y / 50);
})