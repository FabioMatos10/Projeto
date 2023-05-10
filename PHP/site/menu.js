if (document.cookie.indexOf('nome') >-1 ) {
    document.getElementById('registoutilizador').remove();
    document.getElementById('registoutilizador').innerHTML = getCookie(document.cookie.indexOf('nome'));
}

function getCookie(nome) {
    let cookie = {};
    document.cookie.split(';').forEach(function(split) {
        let [key,value] = split.split('=');
        cookie[key.trim()] = value;
    })
    return cookie['nome'];
}