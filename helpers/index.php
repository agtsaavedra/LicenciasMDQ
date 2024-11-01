<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1/Licencias/CSS/login.css">
  </head>
  <body>
      <div class="titulo"><h1>Bienvenido</h1></div>
      <center><img class="banner" src="Imagenes/logo.jpg" width="250" height="100"></center>
      <div class="titulo"><h2>Ingrese Usuario y Contraseña</h2></div>
        <form action="ingresar.php" method="POST">
          <input name="usuario" type="usuario" placeholder="Ingrese Usuario"> 
          <input name="password" type="password" placeholder="Ingrese Contraseña"> 
          <input type="submit" value="Aceptar"> 
        </form>
</body>
</html>