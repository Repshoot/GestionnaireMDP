// MODALS

let modalConnection = document.querySelector("#modal-connection");
let modalBackground = document.querySelector("#modal-background");
let modalClose = document.querySelector("#close-modal");
let cancelButton = document.querySelector("#cancel-sub-button");

let modalDelete = document.querySelector("#modal-delete");
let modalModify = document.querySelector("#modal-modify");

modalClose.onclick = function () {
  modalConnection.style.display = "none";
  modalBackground.style.display = "none";
};

modalBackground.onclick = function () {
  modalConnection.style.display = "none";
  modalBackground.style.display = "none";
};

cancelButton.onclick = function () {
  modalConnection.style.display = "none";
  modalBackground.style.display = "none";
};

modalClose.onclick = function () {
  modalConnection.style.display = "none";
  modalBackground.style.display = "none";
};

function showDeleteModal(rowToDelete) {
  let idInputDelete = document.querySelector("#id-input-delete");
  idInputDelete.value = rowToDelete;

  modalDelete.style.display = "block";
  modalModify.style.display = "none";
}

function showModifyModal(rowToModify) {
  let idInputModify = document.querySelector("#id-input-modify");
  idInputModify.value = rowToModify;

  modalModify.style.display = "block";
  modalDelete.style.display = "none";
}

// COPY TO CLIPB

function copyClipboard(pswToCopy) {
  var id = "#" + pswToCopy;
  var copyText = document.querySelector(id);

  var textArea = document.createElement("textarea");
  textArea.value = copyText.textContent;
  document.body.appendChild(textArea);
  textArea.select();
  textArea.setSelectionRange(0, 99999); /* For mobile devices */
  document.execCommand("Copy");
  textArea.remove();

  var toolTipId = "myTooltip" + pswToCopy;
  var tooltip = document.getElementById(toolTipId);
  tooltip.innerHTML = "Mot de passe copié !";
}

function outFunc(pswToCopy) {
  var toolTipId = "myTooltip" + pswToCopy;
  var tooltip = document.getElementById(toolTipId);
  tooltip.innerHTML = "Copier dans le presse papier";
}

// MY ACCOUNT
function showDeleteAccountModal() {
  let modalDeleteAccount = document.querySelector("#modal-delete-account");
  modalDeleteAccount.style.display = "block";
}

// TIMEOUT

setTimeout(function () {
  document.getElementById("alert-psw-manage-error").style.display = "none";
}, 3000);

setTimeout(function () {
  document.getElementById("alert-psw-manage-success").style.display = "none";
}, 3000);

setTimeout(function () {
  document.getElementById("add-success-container").style.display = "none";
}, 3000);
