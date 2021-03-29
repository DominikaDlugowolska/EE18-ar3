// element vi använder
const canvas = document.querySelector("canvas");

// ställ in storlek på canvas
canvas.width = 600;
canvas.height = 500;

// slå på rit-api
var ctx = canvas.getContext("2d");


// figur objektet
var figur = {
    x: 25,
    y: 25,
    rotation: 0,
    bild: new Image()
}
figur.bild.src = "../mushroom.jpg";

function ritaFigur() {
    ctx.save();
    ctx.translate(figur.x, figur.y);
    ctx.rotate(figur.rotation / 180 * Math.PI);
    ctx.drawImage(figur.bild, -25, -25, 50, 50);
    ctx.restore();
}

// animationsloop
function loopen() {
    // sudda ut canvas
    ctx.clearRect(0, 0, 600, 500);

    ritaFigur();


    requestAnimationFrame(loopen);
}

// starta loopen
loopen();

// lyssna på piltangenter, 'e' vilken tangent som trycks i stunden
window.addEventListener("keypress", function (e) {

    switch (e.code) {
        case "Numpad2": // pil nedåt
                figur.y += 50;
                figur.rotation = 180;
            
            break;
        case "Numpad8": // pil uppåt
            figur.y -= 50;
            figur.rotation = 0;
        
            break;
        case "Numpad4": // pil vänster
            figur.x -= 50;
            figur.rotation = 270;
        
            break;
        case "Numpad6": // pil höger
            figur.x += 50;
            figur.rotation = 90;
        
            break;

        default:
            break;
    }
    console.log("kolumn: " + ( - 25) / 50 + ", rad: " + (figur.y - 25) / 50);
})