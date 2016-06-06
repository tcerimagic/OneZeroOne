var httpReq = createHttpRequestObject();

function createHttpRequestObject() {
    var httpReq;

    if (window.ActiveXObject) {
        try {
            httpReq = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {
            httpReq = false;
        }
    }
    else {
        try {
            httpReq = new XMLHttpRequest();
        } catch (e) {
            httpReq = false;
        }
    }

    if (!httpReq) alert("Greska pri komunikaciji sa serverom :(");
    else return httpReq;
}

function provjeriKod() {
    if (httpReq.readyState === 4 || httpReq.readyState === 0) {
        var elementKod = document.getElementById("dvoslovniKod");
        var elementGreska = document.getElementById("labelaGreske");
        var elementPozivni = document.getElementById("pozivni");

        var dvoslovniKod = encodeURIComponent(elementKod.value);

        httpReq.open("GET", "https://restcountries.eu/rest/v1/alpha?codes=" + dvoslovniKod, true);

        httpReq.onreadystatechange = function () {
            if (httpReq.status === 200) {
                var tekst = httpReq.responseText;
                var jsonObj = JSON.parse(tekst);

                var callingCodes = jsonObj[0].callingCodes;

                var nadjeno = false;

                for (var i = 0; i < callingCodes.length; i++) {
                    if (callingCodes[i] === elementPozivni.value) {
                        nadjeno = true;
                        break;
                    }
                }

                if (nadjeno === false) {
                    elementGreska.innerHTML = "Neispravan pozivni broj.";
                }
                else {
                    elementGreska.innerHTML = "";
                }
            }
        }
        httpReq.send();

    } else {
        setTimeout('provjeriKod()', 1500);
    }

}


function provjeriNotifikacije(username) {

    var pokreni = setInterval(function () { provjeri(username) }, 1200);
}

function provjeri(username) {


    if (httpReq.readyState == 0 || httpReq.readyState == 4) {


        httpReq.open("GET", "brojNotifikacija.php?username=" + username, true);

        httpReq.onreadystatechange = function () {
            if (httpReq.readyState == 4 && httpReq.status == 200) {

                var notifikacije = document.getElementById("notifikacije");

                var brojNovih = httpReq.responseText;

                notifikacije.innerHTML = brojNovih;

                if (brojNovih != 0) {

                    notifikacije.style.color = "red";
                }
                else {
                    notifikacije.style.color = "blue";


                }
            }
        }
        httpReq.send();

    }
}

