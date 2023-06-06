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

          if(resposta[0]== false){
            alert("erro na conexao da base de dados, há esgaca")
          }else{

            document.getElementById('nome').value = resposta['nome'];
            document.getElementById('password').value = resposta['password'];
            document.getElementById('ID_Utilizadores').value = resposta['ID_Utilizadores'];
            document.getElementById('ID_Utilizadores').style.display="none";

          }
        }
    });

    function getCookie(ID_Utilizadores) {
      let cookie = {};
      document.cookie.split(';').forEach(function(separar) {
          let [key,value] = separar.split('=');
          cookie[key.trim()] = value;
      })
      return cookie['ID_Utilizadores'];
    }
});


function guardarcokies() { 
  
  var date = new Date();
  var getdate = date.getTime();
  var expirarCookie = getdate + 1000*1296;       
  date.setTime(expirarCookie);

  document.cookie = "nome= "+document.getElementById('alterar').value+';expires='+date.toUTCString()+"; secure=true"+';path=/';
  document.cookie = "password= "+document.getElementById('password').value+';expires='+date.toUTCString()+"; secure=true"+';path=/';
z

}
