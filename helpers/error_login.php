<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Error</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1/Licencias/CSS/login.css">

  </head>
  <body>
    <header>

    <h1>Error!</h1>
    <h2>Ingrese Usuario y Contraseña</h2>
    <center><img class="banner" src="Imagenes/logo.jpg" width="250" height="100"></center>

    <form action="ingresar.php" method="POST">
      <input name="usuario" type="usuario" placeholder="Ingrese Usuario"> 
      <input name="password" type="password" placeholder="Ingrese Contraseña"> 
      Parece que no has escrito correctamente tu nombre de usuario o contraseña <br> <br>  
      <input type="submit" value="Aceptar"> 
    </form>




  </body>
</html>