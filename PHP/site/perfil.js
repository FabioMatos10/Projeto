$(document).ready(function(){

    var ID_Utilizador = getCookie(document.cookie.indexOf('ID_Utilizadores'));



    $.ajax({
        type:"POST",
        url: "../API/perfilApi.php",
        data:{
            accao:"carregar",
            ID_Utilizador:ID_Utilizador
        },
        cache: false,
        dataType: 'json',
        success: function(resposta) {
    alert("esgaca");

          if(resposta[0]== false){
            alert("erro na conexao da base de dados, há esgaca")
          }else{
            document.getElementById('nome').value = resposta['nome'];
            document.getElementById('password').value = resposta['password'];

          }
        }
    });

    function getCookie(idCookie) {
      let cookie = {};
      document.cookie.split(';').forEach(function(separar) {
          let [key,value] = separar.split('=');
          cookie[key.trim()] = value;
      })
      return cookie['ID_Utilizadores'];
    }
});



