const canvas = document.querySelector("canvas");
const pPoints = document.querySelector("p");

// ställ in bredd och höjd
canvas.width = 700;
canvas.height = 400;

// slå på ritmotorn
var ctx = canvas.getContext("2d");

// ladda in bilderna
var background = new Image();
background.src = "./bakgrund.jpg";
var grogu = new Image();
grogu.src = "./grogu.png";
var mando = new Image();
mando.src = "./mando.png";

// figurenas position
var mandoX = 100, mandoY = 250;
var groguX = 600 * Math.random(); // slump 0 - 600
var groguY = 300 * Math.random(); // slump 0 - 300
var points = 0;
var xRect = 600 * Math.random();
var yRect = 300 * Math.random();
var wRect = 500 * Math.random();
var hRect = 200 * Math.random();

// animationsloopen
function loopen() {
    // sudda ut canvas
    ctx.clearRect(0, 0, 700, 400);

    // rita grafiken
    ctx.drawImage(mando, mandoX, mandoY, 65, 105);
    ctx.drawImage(grogu, groguX, groguY, 50, 32);
    ctx.fillStyle = "#252424";
    ctx.fillRect(xRect, yRect, wRect, hRect);

    // kollision
    var d = Math.sqrt((mandoY - groguY)**2 + (mandoX - groguX)**2);
    // om dom träffar varandra
    if (d < 50) {
        
        groguX = 600 * Math.random();
        groguY = 300 * Math.random();
        points++;
    }

    pPoints.textContent = points;
    requestAnimationFrame(loopen);
}
loopen();

// lyssna på tangenter
window.addEventListener("keydown", function (e) {
    console.log(e.keyCode);

    // beroende vilken tangent vi trycker..
    switch (e.keyCode) {
        // flytta på mando inom bilden
        case 98: // Numpad 2
        if (mandoY < 295) {
            mandoY += 5;
        }
            break;
        case 100: // Numpad 4
        if (mandoX > 0) {
            mandoX -= 5;
        }
            break;
        case 102: // Numpad 6
            // om mindre än 640
            if (mandoX < 640) {
                mandoX += 5;
            }
            break;
        case 104: // Numpad 8
        if (mandoY > 0) {
            mandoY -= 5;
        }
            break;

    }
    /* switch (e.keyCode) {
        // flytta på grogu, tangentbord   
        case 65: // A
            groguX -= 2;
            break;
        case 68: // D
            groguX += 2;
            break;
        case 87: // W
            groguY -= 2;
            break;
        case 83: // S
            groguY += 2;
            break;
    } */
})

   // flytta på grogu med musen
/* canvas.addEventListener("mousemove", function (e) {
    groguX = e.offsetX;
    groguY = e.offsetY;
}) */