<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script type="text/javascript">
      function statusChangeCallback(response) {
          //verificando se usuario ja estiver logado
        if (response.status === 'connected') {
          document.getElementById('botao').innerHTML =
          '<a href="javascript:void(0)" onclick="logout();">Sair</a>';
          testAPI();
        } else if (response.status === 'not_authorized') {
          document.getElementById('botao').innerHTML =
          '<a href="javascript:void(0)" onclick="login();">Logar</a>';
        } else {
          document.getElementById('botao').innerHTML =
          '<a href="javascript:void(0)" onclick="login();">Logar</a>';
        }
      }

      window.fbAsyncInit = function() {
        FB.init({
          appId      : '242664452826552',
          cookie     : true,
          xfbml      : true,
          version    : 'v2.8'
        });
        //pega os status de login e chama função la de cima para verificar
        FB.getLoginStatus(function(response) {
          statusChangeCallback(response);
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s);
         js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));


      function testAPI() {
        FB.api('/me', function(response) {
        document.getElementById('usuario').innerHTML ='Seja bem vindo,' +response.name+'.';
        var src = "http://graph.facebook.com/" + response.id + "/picture?type=normal";
        document.getElementById('foto').innerHTML ='<img src="'+src+'"  alt="'+response.name+'">';
        });
      }

      function logout() {
        FB.logout(function(response) {
          statusChangeCallback(response);
          //deslogar conta
          document.getElementById('usuario').innerHTML = 'Profavor efetue seu login.';
          document.getElementById('foto').innerHTML = '';
        });
      }

      function login() {
        FB.login(function(response) {
          statusChangeCallback(response);
          //logando conta
        });
      }
    </script>
    <title></title>
  </head>
  <body onload="login();">


    <div id="botao"></div>

    <div id="usuario"></div>

    <div id="foto"></div>


  </body>
</html>
