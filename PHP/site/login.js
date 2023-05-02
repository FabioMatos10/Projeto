$(document).ready(function() {
    $("#submit").click(function() {
  
        var email= $('#email').val();
        var password= $('#password').val();
  
        $.ajax({
            type:"POST",
            url: "http://localhost/PHP/API/loginApi.php",
            data:{
                accao:"login",
                email:email,
                password:password
            },
            datatype:"json",
            success: function(resposta) {
              console.log(resposta);
             
                   
            }
        });
        
    });
  });