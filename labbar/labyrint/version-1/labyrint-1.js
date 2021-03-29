// element vi använder
const canvas = document.querySelector("canvas");

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
    ctx.drawImage(figur.bild, 25, -25, 50, 50);
    ctx.restore();
}

// rita kartan
function ritaKartan() {

    // loopa igenom raderna
    for (var j = 0; j < 11; j++) {

        // loopa igenom kolumner
        for (var i = 0; i < 13; i++) {

            // om '1' rita ut en kloss
            var x = i * 50;
            var y = j * 50;
            if (karta[j][i] == 1) {
                ctx.fillRect(x, y, 50, 50);
            }
        }
    }

}

// animationsloop
function loopen() {
    // sudda ut canvas
    ctx.clearRect(0, 0, 650, 550);

    // rita kartan
    ritaKartan();
    ritaFigur();

    requestAnimationFrame(loopen);
}

// starta loopen
loopen();
// lyssna på piltangenter, 'e' vilken tangent som trycks i stunden
window.addEventListener("keypress", function (e) {

    switch (e.code) {
        case "Numpad2": // pil nedåt
                figur.y += 25;
                figur.rotation = 180;
            
            break;
        case "Numpad8": // pil uppåt
            figur.y -= 25;
            figur.rotation = 0;
        
            break;
        case "Numpad4": // pil vänster
            figur.x -= 25;
            figur.rotation = 270;
        
            break;
        case "Numpad6": // pil höger
            figur.x += 25;
            figur.rotation = 90;
        
            break;

        default:
            break;
    }
    console.log("kolumn: " + (figur.x - 25) / 50 + ", rad: " + (figur.y - 25) / 50);
})
