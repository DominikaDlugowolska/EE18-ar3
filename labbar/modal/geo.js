// element vi använder
const eGeoModal = document.querySelector("#geoModal");

// jacka in bootstraps-modal-bibliotek
var myModal = new bootstrap.Modal(eGeoModal, {
    keyboard: false
});

// Lyssna på när eGeoModal öppnas
// och byt ut texten
eGeoModal.addEventListener("show.bs.modal", function() {
    console.log("funkar bra");

    // Välj innehållet, söker bara igenom utvalda elementet
    const eModalBody = eGeoModal.querySelector(".modal-body");

    // Ändra innehållet
    eModalBody.innerHTML = '<div class="mb-3">' +
    '<label for="formGroupExampleInput" class="form-label">Example label</label>' +
    '<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Username">' +
  '</div>' +
  '<div class="mb-3">' +
    '<label for="formGroupExampleInput2" class="form-label">Another label</label>' +
    '<input type="text" class="form-control" id="formGroupExampleInput2"'+'placeholder="Password">' + '</div>';
});