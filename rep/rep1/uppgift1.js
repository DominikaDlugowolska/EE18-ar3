// element
const rutaSvar = document.querySelector(".lösen");
const rutaNummer = document.querySelector(".nummer");
const knapp = document.querySelector("button");
const tal = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

var telNummer = "0705588198";
var svaret = rutaSvar.value;

knapp.addEventListener("click", function() {
    
    if (rutaSvar.value == 9) {
        rutaNummer.value = telNummer;
    } else {
        rutaSvar.value = "Fel";
    }
})


  /* knapp.addEventListener("click", function() {

    if (rutaSvar.value = 9) {

        for (let i = 0; i < 10; i++) {
            telefonNummer = tal[getRandomNumber()];
          }
          
          rutaNummer.value = telefonNummer;
    } else {
        rutaSvar.value = "Fel";
    }
})
function getRandomNumber() {
    return Math.floor(Math.random() * tal.length);
  } */