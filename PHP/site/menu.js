if (document.cookie.indexOf('nome') >-1 ) {

    document.getElementById('registo').innerHTML =getCookienome();
    console.log(getCookiepermissao());
    if(getCookiepermissao()== "admin"){
        document.getElementById('registo').href="admin_page.php";
    }else{
        document.getElementById('registo').href="index.php";
    }

}else{
    document.getElementById('drop_sair').remove();
    document.getElementById('drop_perfil').remove();
    document.getElementById('remover_drop').remove();
    document.getElementById('editar_icon').remove();
}


function getCookienome() {
    let cookie = {};
    document.cookie.split(';').forEach(function(split) {
        let [key,value] = split.split('=');
        cookie[key.trim()] = value;
    })
    return cookie['nome'];
}
function getCookiepermissao() {
    let cookie = {};
    document.cookie.split(';').forEach(function(split) {
        let [key,value] = split.split('=');
        cookie[key.trim()] = value;
    })
    return cookie['permissao'];
}