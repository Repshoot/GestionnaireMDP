let modalConnection = document.querySelector("#modal-connection");
let modalBackground = document.querySelector("#modal-background");
let modalClose = document.querySelector("#close-modal");

modalClose.onclick = function () {
  modalConnection.style.display = "none";
  modalBackground.style.display = "none";
};

modalBackground.onclick = function () {
  modalConnection.style.display = "none";
  modalBackground.style.display = "none";
};
