const message = document.querySelector("#errorMessage");
const form = document.querySelector("#signup-form");
const nombre = document.querySelector("#inputName");
const email = document.querySelector("#inputEmail");
const creditCard = document.querySelector("#inputCreditCard");
const pwd = document.querySelector("#inputPwd");
const secretNumber = document.querySelector("#inputSecretNumber");
const submit = document.querySelector("#submButton");
submit.disabled = true;

const enableButton = () => {
  if (
    email.value.length > 5 &&
    pwd.value.length >= 6 &&
    nombre.value.length > 0 &&
    creditCard.value.length === 18 &&
    secretNumber.value.length === 3
  ) {
    submit.disabled = false;
  } else {
    submit.disabled = true;
  }
};

const replaceNumbersAndSpecialChars = () => {
  nombre.value = nombre.value.replace(/[0123456789[@$<>*]/g, "");
  enableButton();
};

const replaceLetters = () => {
  creditCard.value = creditCard.value.replace(/[a-zA-Z@$<>*]/g, "");
  secretNumber.value = secretNumber.value.replace(/[a-zA-Z@$<>*]/g, "");
  enableButton();
};

const validateEmail = (email) => {
  return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
    email
  );
};

const validateName = (nombre) => {
  return /^[a-zA-Z\s]*$/.test(nombre);
};

const validateCreditCard = (creditCard) => {
  return creditCard.length === 18;
};

const validateSecretNumber = (secretNumber) => {
  return secretNumber.length === 3;
};

const validatePwd = (pwd) => {
  return /[A-Z]/.test(pwd) && /[0-9]/.test(pwd) && pwd.length >= 6;
};

const signup = () => {
  if (
    validateEmail(email.value) &&
    validateName(nombre.value) &&
    validatePwd(pwd.value) &&
    validateCreditCard(creditCard.value) &&
    validateSecretNumber(secretNumber.value)
  ) {
    form.submit();
  } else {
    message.innerHTML = "Error: Please follow the instructions";
  }
};

submit.addEventListener("click", signup);

const verifySignUp = () => {
  if (localStorage.getItem("currentEmail")) {
    window.location.assign("main.php");
  }
};
