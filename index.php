<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<link rel="stylesheet" href="styles.css">

<br>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="./cascada.js"></script>
    <h1> <a href="pantallaConsultorio.php" >  <img class="imagenHiperv" src="https://i.imgur.com/uL1QuCy.png" width="600em" height="200em" alt="ImagenSagradaFamilia"></a></h1>
</head>

<body>
  <form action="logueo.php" method="post">
    <h2>USUARIO:</h2>
    <h2><input name="usr" class="inputPersonalizado" type="email" maxlength="40" style="text-align:center" required /></h2>
    <h2>CONTRASEÑA:</p>
    <h2><input name="pass" class="inputPersonalizado" type="password" maxlength="40" style="text-align:center" required /></h2>
    <h2><input type="submit" name="action" class="boton_personalizado" value="INICIAR SESIÓN"/></h2>
    <h2 id='result'></h2>
  </form>
</body>

<?php
include ('./funcionesApi.php');

?>
