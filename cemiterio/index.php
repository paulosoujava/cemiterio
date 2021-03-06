<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>cemitério São Cristóvão</title>
    <!-- CSS  -->
    <link href="css/icon.css" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  </head>
  <style type="text/css">
    body {
      background-image: url("image/dark.jpg");
      background-color: #cccccc;
    }
  </style>
  <body>
    <div class="container">
      <div class="section">
        <!--   Icon Section   -->
        <div class="row">
          <div class="col s12 m3"></div>
          <div class="col s12 m7" style="margin-top: 150px">
            <div class="row">
              <div class="col s12 m12">
                <div class="card  darken-1">
                  <div class="card-action card-panel teal" style="margin-top: 20px; height: 80px">
                    <h2 style="margin-top: -10px; color: #FFF">Login</h2>        
                  </div>
                  <div class="card-content white-text">
                    <span class="card-title">Acesso </span>
                    <div class="row">
                      <form class="col s12">
                        <div class="row">
                          <div class="input-field col s12">

                            <input id="email" type="text" class="validate">
                            <label for="email">Seu e-mail</label>
                          </div>
                          <div class="input-field col s12">

                            <input id="password" type="password" class="validate">
                            <label for="password">Sua senha</label>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-action card-panel teal" style="margin-top: -20px; height: 80px">
                    <a class="waves-effect btn-large waves-light btn right  " id="btnLogin">Acessar</a>
                  </div>
                </div>
              </div>
            </div>
        </div>
          <div class="col s12 m4"></div>
        </div>
      </div>
      <br><br>
    </div>


    <!--  Scripts-->
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/login.js"></script>

  </body>
</html>
