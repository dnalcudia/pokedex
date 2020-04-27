const $deleteModal = document.querySelector("#delete-modal");
const $editModal = document.querySelector("#edit-modal");
const $overlay = document.querySelector("#overlay");

const showEditModal = () => {
  console.log("Hola");

  $overlay.classList.add("active");
  $editModal.style.animation = "modalIn .8s forwards";
};

//Escondiendo el modal
const hideEditModal = () => {
  $overlay.classList.remove("active");
  $editModal.style.animation = "modalOut .8s forwards";
};

const showDeleteModal = () => {
  $overlay.classList.add("active");
  $deleteModal.style.animation = "modalIn .8s forwards";
};

//Escondiendo el modal
const hideDeleteModal = () => {
  $overlay.classList.remove("active");
  $deleteModal.style.animation = "modalOut .8s forwards";
};

function logout() {
  localStorage.clear();
  window.location.assign("index.html");
}

const verifyProfile = () => {
  if (!localStorage.getItem("currentEmail")) {
    window.location.assign("index.html");
  }
};

function displayPokemon(i) {
  createCookie("clicked", i, "1");
  document.getElementById("display-form").submit();
}

function createCookie(name, value, days) {
  var expires;
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
    expires = "; expires=" + date.toGMTString();
  } else {
    expires = "";
  }
  document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}
