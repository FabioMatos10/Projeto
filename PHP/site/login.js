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
            dataType: "json",
            success: function(resposta) {
                console.log(resposta);
                if (resposta== "admin") {
                    window.location.href="admin_page.php";
                }else{
            
                    window.location.href="index.php";
                }
              }
        });
        
    });
  });