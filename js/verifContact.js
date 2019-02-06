var email = document.getElementById("mail");

email.addEventListener("keyup", function (event) {
    if(email.validity.typeMismatch) {
        email.setCustomValidity("Veuillez entrer une adresse email au format moi@email.com");
    } else {
        email.setCustomValidity("");
    }
});