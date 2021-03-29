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
];

// rita kartan
function ritaKartan() {

    // loopa igenom raderna
    for (var j = 0; j < 12; j++) {

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

    requestAnimationFrame(loopen);
}

// starta loopen
loopen();
