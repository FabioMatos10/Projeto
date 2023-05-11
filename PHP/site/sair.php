<script>

  var hoje = new Date();
  hoje.setMonth( hoje.getMonth() - 1 );
  
  document.cookie = "ID_Utilizadores= "+document.cookie.indexOf('ID_Utilizadores')
                   +';expires='+hoje.toUTCString()
                   +"; secure=true"
                   +';path=/';

  document.cookie = "email= "+document.cookie.indexOf('email')
                   +';expires='+hoje.toUTCString()
                   +"; secure"
                   +';path=/';

  document.cookie = "nome= "+document.cookie.indexOf('nome')
                   +';expires='+hoje.toUTCString()
                   +"; secure"
                   +';path=/';

  document.cookie = "password= "+document.cookie.indexOf('password')
                   +';expires='+hoje.toUTCString()
                   +"; secure"
                   +';path=/';

   document.cookie = "permissao= "+document.cookie.indexOf('permissao')
                   +';expires='+hoje.toUTCString()
                   +"; secure"
                   +';path=/';
  window.location.href="index.php";
</script>