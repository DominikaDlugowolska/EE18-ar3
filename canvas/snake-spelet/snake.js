/*
Create by Learn Web Developement
Youtube channel : https://www.youtube.com/channel/UC8n8ftV94ZU_DJLOLtrpORA
*/
const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

// ladda bilderna
var ground = new Image();
ground.src = "./img/ground.png";

var foodImg = new Image();
foodImg.src = "./img/food.png";

// load audio files
var dead = new Audio();
var eat = new Audio();
var up = new Audio();
var left = new Audio();
var right = new Audio();
var down = new Audio();

dead.src = "./audio/dead.mp3";
eat.src = "./audio/eat.mp3";
up.src = "./audio/up.mp3";
left.src = "./audio/left.mp3";
right.src = "./audio/right.mp3";
down.src = "./audio/down.mp3";

var box = 32;

// create snake
var snake = [];
snake[0] = {
    x: 9 * box,
    y: 10 * box
};


// create the food
var food = {
    x: Math.floor(Math.random()*17+1) * box,
    y: Math.floor(Math.random()*15+3) * box
}

// score variable
var score = 0;

// control snake
var d;
document.addEventListener("keydown", direction);
function direction(event) {
    var key = event.keyCode;
    if(key == 65 && d != "RIGHT") {
        left.play();
        d = "LEFT";
    }else if (key == 87 && d != "DOWN"){
        d = "UP";
        up.play();
    }else if (key == 68 && d != "LEFT"){
        d = "RIGHT";
        right.play();
    }else if (key == 83 && d != "UP"){
        d = "DOWN";
        down.play();
    }
}

// check collision function
function collision(head,array){
    for (let i = 0; i < array.length; i++) {
        if(head.x == array[i].x && head.y == array[i].y){
            return true;
        }
    }
    return false;
}

// draw everything to the canvas
function draw() {

    ctx.drawImage(ground,0,0);

    for (var i = 0; i < snake.length ; i++) {
        ctx.fillStyle = ( i == 0)? "green" : "white";
        ctx.fillRect(snake[i].x,snake[i].y,box,box);

        ctx.strokeStyle = "red";
        ctx.strokeRect(snake[i].x,snake[i].y,box,box);
    }
    // draw the food
    ctx.drawImage(foodImg, food.x, food.y);

    // old head position
    var snakeX = snake[0].x;
    var snakeY = snake[0].y;

    // which direction
    if (d == "LEFT")  snakeX -= box;
    if (d == "UP")  snakeY -= box;
    if (d == "RIGHT")  snakeX += box;
    if (d == "DOWN")  snakeY += box;

    // if the snake eats the food
    if(snakeX == food.x && snakeY == food.y) {
        score++;
        eat.play();
        food = {
            x: Math.floor(Math.random()*17+1) * box,
            y: Math.floor(Math.random()*15+3) * box
        }
        // we don't remove the tail
    } else{
        // remove the tail
        snake.pop();
    }

    // add new head
    var newHead =  {
        x: snakeX,
        y: snakeY
    };
    

    // game over
    if(snakeX < box || snakeX > 17 * box || snakeY < 3*box || snakeY > 17*box || collision(newHead,snake)){
        clearInterval(game);
        dead.play();
    }

    snake.unshift(newHead);

    ctx.fillStyle = "white";
    ctx.font = "45px Changa one";
    ctx.fillText(score,2*box,1.6*box);
}
// call draw function every 100 ms
var game = setInterval(draw, 100);