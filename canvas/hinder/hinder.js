// element vi använder
const canvas = document.querySelector("canvas");

// slå på ritmotorn
var ctx = canvas.getContext("2d");

// ange mått på canvas
canvas.width = 800;
canvas.height = 600;

// ladda in bilder
/* var mikeWaz = new Image();
mikeWaz.src = "./mikes.png";

// position på figuren
var mikeX = 300;
var mikeY = 400; */

// figurens egenskaper (ett objekt vvv, kortare version ist för många variablar)
var mushroom = {
    x: 200,
    y: 500,
    bild: new Image()
}
mushroom.bild.src = "./mushroom.jpg";

// ett hinder
var hinder = {
    x: 800 * Math.random(),
    y: 600 * Math.random()
}

// animationsloopen
function loopen() {
    // sudda ut canvas
    ctx.clearRect(0, 0, 800, 600);

    // rita ut figuren
    ctx.drawImage(mushroom.bild, mushroom.x, mushroom.y, 100, 100);

    // rita ut hinder
    ctx.fillRect(hinder.x, hinder.y, 100, 100);

    requestAnimationFrame(loopen);
}
// starta animationen
loopen();

// lyssna på piltangenter
window.addEventListener("keydown", function (e) {
    console.log(e.code);

    // vad händer för tangenterna
    switch (e.code) {
        case "Numpad8":
            if (mushroom.y > 0) {
                if (mushroom.y > hinder.y + 100) {
                    mushroom.y -= 7;
                }
            }
            break;
        case "Numpad2":
            if (mushroom.y < 500) {
                if (mushroom.y < hinder.y - 100) {
                    mushroom.y += 7;
                }
            }
            break;
        case "Numpad4":
            if (mushroom.x > 0) {
                if (mushroom.x > hinder.x + 100) {
                    mushroom.x -= 7;
                }
            }
            break;
        case "Numpad6":
            // inte krocka med väggen
            if (mushroom.x < 700) {
                // är figuren i höjd med hindret?
                if (mushroom.y + 100 < hinder.y > mushroom.y + 100 && mushroom.y > hinder.y + 100) {
                
                    // inte krocka med hindrets vänsterkant
                    if (mushroom.x < hinder.x - 100) {
                        mushroom.x += 7;
                    }
                }

            }
            break;
    }
    console.log(mushroom.x, mushroom.y, hinder.x, hinder.y);
})