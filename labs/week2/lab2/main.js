window.document.getElementById("submitBtn").addEventListener("click", e => {
  const fieldName = document.getElementById("name").value;
  const fieldEmail = document.getElementById("email").value;
  const fieldAge = document.getElementById("age").value;
  const fieldAddress = document.getElementById("address").value;
  const fieldPostalCode = document.getElementById("postalCode").value;
  const defaultMessage = "must be provided.";

  let validationFail = false;

  if (!fieldName) {
    showValidationMessage("Name", defaultMessage);
    validationFail = true;
  } else if (!fieldEmail) {
    showValidationMessage("Email", "must be provided and be a valid email");
    validationFail = true;
  } else if (!isValidAge(fieldAge)) {
    showValidationMessage("Age", "Must be provided and be a valid Integer");
    validationFail = true;
  } else if (!fieldAddress) {
    showValidationMessage("Address", defaultMessage);
    validationFail = true;
  } else if (!fieldPostalCode) {
    showValidationMessage("Postal Code", defaultMessage);
    validationFail = true;
  }

  if (validationFail) {
    e.preventDefault();
  }
});

const showValidationMessage = (field, message) => {
  alert(`${field} ${message}.`);
};

const isValidAge = age => {
  return Number.isInteger(Number(age));
};

const validateEmail = email => {
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
};
