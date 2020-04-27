const verifySocial = () => {
  if (!localStorage.getItem("currentEmail")) {
    window.location.assign("index.html");
  }
};

function logout() {
  localStorage.clear();
  window.location.assign("index.html");
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
function dispUser(email){
  createCookie("user_mail",email,"1");
}
