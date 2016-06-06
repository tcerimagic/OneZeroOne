window.onload = function() {
  //  dummyPodaci();

    obaviSve();
}

function obaviSve()
{
    var objave = document.getElementsByClassName("objava");

    for (var i = 0; i < objave.length; i++) {

        var ocitajDatum = new Date(objave[i].innerHTML);
        objave[i].innerHTML = "Novost objavljena " + postaviVrijemeObjave(ocitajDatum);
    };
}
Date.prototype.skiniSekunde = function(s) {
    this.setSeconds(this.getSeconds() - s);
    return this;
}
Date.prototype.skiniMinute = function(m) {
    this.setMinutes(this.getMinutes() - m);
    return this;
}

Date.prototype.skiniSate = function(h) {
    this.setTime(this.getTime() - (h * 60 * 60 * 1000));
    return this;
}
Date.prototype.skiniDane = function(d) {
    this.setDate(this.getDate() - d);
    return this;
}

function dummyPodaci() {
    var trenutnoVrijeme = new Date();
    var novosti = document.getElementsByClassName('news');
    novosti[0].getElementsByClassName('objava')[0].innerHTML = trenutnoVrijeme;
    novosti[0].getElementsByClassName('objavaSpas')[0].innerHTML = trenutnoVrijeme;

    trenutnoVrijeme.skiniSekunde(70);
    novosti[1].getElementsByClassName('objava')[0].innerHTML = trenutnoVrijeme;
    novosti[1].getElementsByClassName('objavaSpas')[0].innerHTML = trenutnoVrijeme;

    trenutnoVrijeme.skiniMinute(3);
    novosti[2].getElementsByClassName('objava')[0].innerHTML = trenutnoVrijeme;
    novosti[2].getElementsByClassName('objavaSpas')[0].innerHTML = trenutnoVrijeme;

    trenutnoVrijeme.skiniMinute(12);
    novosti[3].getElementsByClassName('objava')[0].innerHTML = trenutnoVrijeme;
    novosti[3].getElementsByClassName('objavaSpas')[0].innerHTML = trenutnoVrijeme;

    trenutnoVrijeme.skiniSate(2);
    novosti[4].getElementsByClassName('objava')[0].innerHTML = trenutnoVrijeme;
    novosti[4].getElementsByClassName('objavaSpas')[0].innerHTML = trenutnoVrijeme;

    trenutnoVrijeme.skiniSate(3);
    novosti[5].getElementsByClassName('objava')[0].innerHTML = trenutnoVrijeme;
    novosti[5].getElementsByClassName('objavaSpas')[0].innerHTML = trenutnoVrijeme;

    trenutnoVrijeme.skiniDane(1);
    novosti[6].getElementsByClassName('objava')[0].innerHTML = trenutnoVrijeme;
    novosti[6].getElementsByClassName('objavaSpas')[0].innerHTML = trenutnoVrijeme;

    trenutnoVrijeme.skiniDane(3);
    novosti[7].getElementsByClassName('objava')[0].innerHTML = trenutnoVrijeme;
    novosti[7].getElementsByClassName('objavaSpas')[0].innerHTML = trenutnoVrijeme;

    trenutnoVrijeme.skiniDane(7);
    novosti[8].getElementsByClassName('objava')[0].innerHTML = trenutnoVrijeme;
    novosti[8].getElementsByClassName('objavaSpas')[0].innerHTML = trenutnoVrijeme;

    trenutnoVrijeme.skiniDane(10);
    novosti[9].getElementsByClassName('objava')[0].innerHTML = trenutnoVrijeme;
    novosti[9].getElementsByClassName('objavaSpas')[0].innerHTML = trenutnoVrijeme;

    trenutnoVrijeme.skiniDane(13);
    novosti[10].getElementsByClassName('objava')[0].innerHTML = trenutnoVrijeme;
    novosti[10].getElementsByClassName('objavaSpas')[0].innerHTML = trenutnoVrijeme;

    trenutnoVrijeme.skiniDane(105);
    novosti[11].getElementsByClassName('objava')[0].innerHTML = trenutnoVrijeme;
    novosti[11].getElementsByClassName('objavaSpas')[0].innerHTML = trenutnoVrijeme;


}

function razlikaDani(first, second) {
    return Math.round((second - first) / (1000 * 60 * 60 * 24));
}

function razlikaSati(first, second) {
    return Math.round(((second - first) % 86400000) / 3600000);
}

function razlikaMinute(first, second) {
    return Math.round((((second - first) % 86400000) % 3600000) / 60000);
}
function parseDate(str) {
    var mdy = str.split('-')
    return new Date(mdy[0], mdy[1] - 1, mdy[2]);
}

function postaviVrijemeObjave(ob) {
    var danas = new Date();

    var trenutnoVrijeme = parseDate(danas.toISOString().substring(0, 10));
    var vrijemeObjave = parseDate(ob.toISOString().substring(0, 10));

    var rez = razlikaDani(vrijemeObjave, trenutnoVrijeme);
    var rezSati = razlikaSati(ob, danas);
    var rezMinute = razlikaMinute(ob, danas);
    
    
    //da li je uopste ista 

    if (vrijemeObjave.getFullYear() != trenutnoVrijeme.getFullYear() && rez > 31) {
        return vrijemeObjave.getDate() + "." + (vrijemeObjave.getMonth() + 1) + "." + vrijemeObjave.getFullYear() + ".";
    }

    else if (vrijemeObjave.getFullYear() == trenutnoVrijeme.getFullYear() && vrijemeObjave.getMonth() != trenutnoVrijeme.getMonth() && rez > 30) {
        return vrijemeObjave.getDate() + "." + (vrijemeObjave.getMonth() + 1) + "." + vrijemeObjave.getFullYear() + ".";
    }

    //ista godina,mjesec, dan, sat, minuta
    /*if (rez == 0 && ob.getHours() == danas.getHours() && ob.getMinutes() == danas.getMinutes() && ob.getSeconds() <= danas.getSeconds()) */
    if (rez == 0 && rezMinute == 0 && rezSati == 0) {
        return "prije par sekundi."
    }

    //ista godina, mjesec, dan, sat
    //else if (rez == 0 && ob.getHours() == danas.getHours() && ob.getMinutes() <= danas.getMinutes()) {
    else if(rez== 0 && rezMinute < 60 && rezSati == 0){
        var razlikaUMinutama = danas.getMinutes() - ob.getMinutes();

        if (razlikaUMinutama == 1 || razlikaUMinutama % 10 == 1) {
            return "prije " + razlikaUMinutama + " minutu.";
        }
        if (razlikaUMinutama == 2 || razlikaUMinutama == 3 || razlikaUMinutama == 4 ||
            razlikaUMinutama % 10 == 2 || razlikaUMinutama % 10 == 3 || razlikaUMinutama % 10 == 4) {
            return "prije " + razlikaUMinutama + " minute.";
        }
        return "prije " + razlikaUMinutama + " minuta.";
    }

    //ista godina, mjesec, dan

    else if (rez == 0 && rezSati >=1) {
        var razlikaUSatima = danas.getHours() - ob.getHours();
        razlikaUSatima = Math.abs(razlikaUSatima);
        if (razlikaUSatima == 1 || razlikaUSatima % 10 == 1) {
            return "prije " + razlikaUSatima + " sat.";
        }

        if (razlikaUSatima == 2 || razlikaUSatima == 3 || razlikaUSatima == 4 ||
            razlikaUSatima % 10 == 2 || razlikaUSatima % 10 == 3 || razlikaUSatima % 10 == 4) {
            return "prije " + razlikaUSatima + " sata.";
        }

        return "prije " + razlikaUSatima + " sati.";

    }

    //ista godina, mjesec, unutar 7 dana

    else if (rez >0 && rez <= 7) {

        if (rez == 1) {
            return "prije " + rez + " dan.";
        }

        return "prije " + rez + " dana.";
    }


    // vise od 7 dana

    else if (rez > 7 && rez <= 30) {
        var razlikaUSedmicama = Math.round(rez / 7);

        if (razlikaUSedmicama == 1) {
            return "prije " + razlikaUSedmicama + " sedmicu.";
        }
        return "prije " + razlikaUSedmicama + " sedmice.";
    }

}

function filtrirajProizvode() {
    var danas = new Date();
    var opcija = document.getElementById("filter").value;
    var novosti = document.getElementsByClassName('news');
    if (opcija == "sve") {
        for (var i = 0; i < novosti.length; i++) {
            novosti[i].style.display = 'block';
        };
    }
    else if (opcija == "danas") {
        for (var i = 0; i < novosti.length; i++) {
            var dan = new Date(novosti[i].getElementsByClassName('objavaSpas')[0].innerHTML);
            if (dan.getDate() == danas.getDate() && dan.getFullYear() == danas.getFullYear() && dan.getMonth() == danas.getMonth()) novosti[i].style.display = 'block';
            else novosti[i].style.display = 'none';
        };
    }
    else if (opcija == "sedmica") {

        var trenutnoVrijeme = parseDate(danas.toISOString().substring(0, 10));


        for (var i = 0; i < novosti.length; i++) {
            var sedmica = new Date(novosti[i].getElementsByClassName('objavaSpas')[0].innerHTML);

            var vrijemeObjave = parseDate(sedmica.toISOString().substring(0, 10));
            var rez = razlikaDani(vrijemeObjave, trenutnoVrijeme);

            if (danas.getDay() == 0 && rez <= 6) {
                novosti[i].style.display = 'block';

            }

            else if (danas.getDay() == 1 && rez == 0) {
                novosti[i].style.display = 'block';
            }

            else if (danas.getDay() == 2 && rez <= 1) {
                novosti[i].style.display = 'block';
            }
            else if (danas.getDay == 3 && rez <= 2) {
                novosti[i].style.display = 'block';
            }
            else if (danas.getDay == 4 && rez <= 3) {
                novosti[i].style.display = 'block';
            }
            else if (danas.getDay == 5 && rez <= 4) {
                novosti[i].style.display = 'block';
            }
            else if (danas.getDay == 6 && rez <= 5) {
                novosti[i].style.display = 'block';
            }

            else novosti[i].style.display = 'none';
        };
    }
    else if (opcija == "mjesec") {
        for (var i = 0; i < novosti.length; i++) {
            var mjesec = new Date(novosti[i].getElementsByClassName('objavaSpas')[0].innerHTML);
            if (mjesec.getMonth() == danas.getMonth() && mjesec.getFullYear() == danas.getFullYear()) novosti[i].style.display = 'block';
            else novosti[i].style.display = 'none';
        };
    }
}




