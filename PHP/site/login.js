$(document).ready(function() {
    $("#submit").click(function() {
        var email= $('#email').val();
        var password= $('#password').val();
  
        $.ajax({
            type:"POST",
            url: "../API/loginAPI.php",
            data:{
                accao:"login",
                email:email,
                password:password
            },
            dataType: "json",
            success: function(resposta) {
                if (resposta[0] == "false"){
                   toastr.warning('Existe campos por preencher!', 'Woops!!!');
                }else{
                    if (resposta[0] == "passworderrada"){
                        toastr.warning('Password errada!', 'Woops!!!');
                     }else{
                         cookies(resposta);
                     }
                }

 
                if (resposta["permissao"]== "admin") {
                   
                    window.location.href="admin_page.php";
                }
                if (resposta["permissao"]== "user") {
                    window.location.href="index.php";
                }

             
            
                
              }
        });
        function cookies(resposta) { 
            var date = new Date();
            var getdate = date.getTime();
            var expirarCookie = getdate + 1000*1296;       
            date.setTime(expirarCookie);
          
            document.cookie = "ID_Utilizadores= "+resposta['ID_Utilizadores']+';expires='+date.toUTCString()+"; secure=true"+';path=/';
            document.cookie = "nome= "+resposta['nome']+';expires='+date.toUTCString()+"; secure=true"+';path=/';
            document.cookie = "email= "+resposta['email']+';expires='+date.toUTCString()+"; secure=true"+';path=/';
            document.cookie = "password= "+resposta['password']+';expires='+date.toUTCString()+"; secure=true"+';path=/';
            document.cookie = "permissao= "+resposta['permissao']+';expires='+date.toUTCString()+"; secure=true"+';path=/';

          }
    });

  });