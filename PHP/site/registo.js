$(document).ready(function() {
    

    $("#submit").click(function() {

        var nome= $('#nome').val();
        var email= $('#email').val();
        var password= $('#password').val();
        var cpassword= $('#cpassword').val();

        $.ajax({
            type:"POST",
            url: "../API/registoAPI.php",
            data:{
                accao:"guardardados",
                nome:nome,
                email:email,
                password:password,
                cpassword:cpassword
            },
            dataType: "json",
            success: function(resposta) {
              if (resposta == "true"){
                location.href="login_form.php";
              }
              if(resposta=="vazio"){
                toastr.warning('Existem campos por prencher', 'Woops!!!');
                console.log(resposta);
              }
              
              if(resposta == "palavraspassesdiferentes"){
                toastr.warning('Palavras passes erradas!', 'Woops!!!');
              }
 
              
                
                
  

            
              }
        });
    });
  });