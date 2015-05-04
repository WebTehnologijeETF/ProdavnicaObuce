function otvoriURL(url) {
    var nesto = new XMLHttpRequest;
    nesto.onreadystatechange = function() {
        if(nesto.status == 200 && nesto.readyState == 4) {
            document.open();
            document.write(nesto.responseText);
            document.close();
        }
    }
    nesto.open("GET", url, true);
    nesto.send();
}
