<link rel="stylesheet" href="styles.css">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="./cascada.js"></script>
    <h1> <a href="pantallaConsultorio.php" >  <img class="imagenHiperv" src="https://i.imgur.com/uL1QuCy.png" width="600em" height="200em" alt="ImagenSagradaFamilia"></a></h1>
</head>




<body>
<TEXTAREA rows="6" cols="30" name="detallesTurno" id="detallesTurno" contenteditable="false"  draggable="false" readonly></TEXTAREA>
</body>


<?php
include ('./funcionesApi.php');
$req = "indefinido";
session_start();
$token = $_SESSION['token'];


if (isset($_POST['btnCrear'])){

  $req = "creando";
  $idPac = $_SESSION['id'];
  $idMed = $_POST['idMedicoSeleccionado'];
  $dia = $_POST['idDiaSeleccionado'];
  $hora = $_POST['idHoraSeleccionada'];
  $_SESSION['res'] = crearTurno($token,$idPac,$idMed,$dia,$hora);
  $_SESSION['req'] = $req;
}
else if (isset($_POST['btnBorrar'])){

  $req = "borrando";
  $turno = $_POST['idTurnoSeleccionado'];
  $_SESSION['res'] = cancelarTurno($token,$turno);
  $_SESSION['req'] = $req;
}


?>



<script>

var token = "<?php echo $_SESSION['token']; ?>";
var req = "<?php echo $_SESSION['req']; ?>"
var res = <?php echo $_SESSION['res']; ?>;

var idTurno = res.IdTurno;
var fechaCompleta = res.Fecha;
var idMedico = res.IdMedico;
var idPaciente = res.IdPaciente;

var medico;
var paciente;
var monto;
var dia;
var hora;

if (req =="creando"){

$.when(medicoPorId(token,idMedico)).done(function(medic){
  medico = medic.Nombre+" "+medic.Apellido;
  monto = medic.Monto;

  $.when(getPaciente(token,idPaciente)).done(function(pac){
    paciente = pac.Nombre+" "+pac.Apellido;
    fechaCompleta = fechaCompleta.split("T");
    dia = fechaCompleta[0];
    hora = fechaCompleta[1];
    document.getElementById('detallesTurno').value ="TURNO CREADO EXITOSAMENTE\nPACIENTE: "+paciente+"\nMÉDICO: "+medico+"\nDÍA: "+dia+"\nHORA: "+hora+"\nMONTO: $"+monto;
  });
});
} else if (req=="borrando"){

  $.when(medicoPorId(token,idMedico)).done(function(medic){
    medico = medic.Nombre+" "+medic.Apellido;
    monto = medic.Monto;
    monto = monto*0.5;

    $.when(getPaciente(token,idPaciente)).done(function(pac){
      paciente = pac.Nombre+" "+pac.Apellido;
      fechaCompleta = fechaCompleta.split("T");
      dia = fechaCompleta[0];
      hora = fechaCompleta[1];
      document.getElementById('detallesTurno').value ="TURNO BORRADO EXITOSAMENTE\nPACIENTE: "+paciente+"\nMÉDICO: "+medico+"\nDÍA: "+dia+"\nHORA: "+hora+"\nMULTA POR CANCELACIÓN : $"+monto;
    });
  });




}









</script>

<h2><a href="pantallaFunciones.php" class="boton_personalizado2">Volver</a><h2>
