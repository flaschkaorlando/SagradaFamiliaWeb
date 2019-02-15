<link rel="stylesheet" href="styles.css">

<?php
include ('./funcionesApi.php');

if (isset($_POST['action'])){
$usr = $_POST['usr'];
$pass = $_POST['pass'];
$token = token($usr,$pass);

if ($token!=null){

  $id = getId($token,$usr);

  session_start();
  $_SESSION['token']=$token;
  $_SESSION['usuario']=$usr;
  $_SESSION['id']=$id;

  header("location:pantallaFunciones.php");

}else{
header("location:index.php");
  }
}
?>
