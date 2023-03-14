window.onload = function(){
    pokaz_zawodnikow();
}

var xmlHttp;
function getRequestObject(){
    if (window.ActiveXObject) return (new ActiveXObject("Microsoft.XMLHTTP"));
    else if (window.XMLHttpRequest) return (new XMLHttpRequest());
    else return (null);
}

function pokaz_zawodnikow(){
    var sekcja = document.getElementById("sekcja").value;
    ZawodnicyRequest(sekcja);
}

function ZawodnicyRequest(sekcja){
    xmlHttp = getRequestObject();
    var url = "./rezerwacje_zawodnicy.php?sekcja=" + sekcja;
    xmlHttp.onreadystatechange = handleResponse_zawodnicy;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function handleResponse_zawodnicy() {
    myDiv = document.getElementById("opcje_zawodnicy");
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            response = xmlHttp.responseText;
            var input = response;
            myDiv.innerHTML = input;
    }
}