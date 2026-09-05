const form = document.getElementById("form");
const emailInput = document.getElementById("email");
const emailErrorMsg = document.getElementById("email-error");
const nameInput = document.getElementById("name");
const nameErrorMsg = document.getElementById("name-error");
const roleInput = document.getElementById("role");
const roleErrorMsg = document.getElementById("role-error");
const wageInput = document.getElementById("wage");
const wageErrorMsg = document.getElementById("wage-error");

form.addEventListener("submit", (event) => {
  const isEmailValid = validateEmail(emailInput.value);
  const isNameValid = validateInput(nameInput, nameErrorMsg);
  const isRoleValid = validateInput(roleInput, roleErrorMsg);
  const isWageValid = validateInput(wageInput, wageErrorMsg);

  if (!isEmailValid || !isNameValid || !isRoleValid || !isWageValid) {
    event.preventDefault();
    return 
  }
});

const validateEmail = (email) => {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailRegex.test(email.trim()) || email.trim() === "") {
    emailErrorMsg.classList.add("active");
    return false;
  }

  emailErrorMsg.classList.remove("active");
  return true;
};

const validateInput = (input, errorMsg) => {
  if (input.value.trim() === "") {
    errorMsg.classList.add("active");
    return false;
  }

  errorMsg.classList.remove("active");
  return true;
};
