var slovaRegex = new RegExp('^[a-zA-Z]+$');
var emailRegex = new RegExp("[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?");

function validirajTekst(unos) {
    unos.style.borderColor = "#423C3C";

    if (!slovaRegex.test(unos.value)) {
        unos.style.borderColor = "red";
        document.getElementById("salji").disabled = true;
    }
    else {
        document.getElementById("salji").disabled = false;
    }
}

function validirajEmail(unos) {

    unos.style.borderColor = "#423C3C";

    if (!emailRegex.test(unos.value)) {
        unos.style.borderColor = "red";
        document.getElementById("salji").disabled = true;
    }
    else {
        document.getElementById("salji").disabled = false;
    }


}

function validirajFormu() {

    var imePolje = document.getElementById("ime");
    var prezimePolje = document.getElementById("prezime");

    if (imePolje.value === "" && prezimePolje.value === "") {
        alert("Morate unijeti ili ime ili prezime");
    }

    else {
        alert("Uspjesno ste poslali poruku!");
    }
}




