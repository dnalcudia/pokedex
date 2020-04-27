const form = document.querySelector("#signin-form");
const email = document.querySelector("#inputEmail");
const pwd = document.querySelector("#inputPwd");
const submit = document.querySelector("#submButton");
submit.disabled = true;

const enableButton = () => {
  if (email.value.length !== 0 && pwd.value.length >= 6) {
    submit.disabled = false;
  } else {
    submit.disabled = true;
  }
};

const signin = () => {
  createCookie("currentEmail", email.value, "10");
  localStorage.setItem("currentEmail", email.value);
  form.submit();
};

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

submit.addEventListener("click", signin);

const verifySignIn = () => {
  if (localStorage.getItem("currentEmail")) {
    window.location.assign("main.php");
  }
};
