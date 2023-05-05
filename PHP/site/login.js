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
                console.log(resposta);
                if (resposta== "admin") {
                    window.location.href="admin_page.php";
                }
                if (resposta== "user") {
                    window.location.href="index.php";
                }
            
            
                
              }
        });
    });

  });