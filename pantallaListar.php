<link rel="stylesheet" href="styles.css">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="./cascada.js"></script>
    <h1> <a href="pantallaConsultorio.php" >  <img class="imagenHiperv" src="https://i.imgur.com/uL1QuCy.png" width="600em" height="200em" alt="ImagenSagradaFamilia"></a></h1>
</head>

<?php
session_start();

?>

<form action="pantallaResultado.php" method="post">

<select id="comboTurnos" class="comboBox" >
    </select>

<br>
<br>
<TEXTAREA rows="5" cols="30" name="detalles" id="detallesTurno" contenteditable="false"  draggable="false" readonly></TEXTAREA>
<input type="hidden" name="idTurnoSeleccionado" id="idTurnoSeleccionado" value="valor1" />
<br>
<h2><a href="pantallaFunciones.php" class="boton_personalizado2">Volver</a> <input disabled type="submit" id="btnBorrar" class="boton_personalizado3" name="btnBorrar" value="Cancelar turno"></h2>
</form>

<script>



var token = "<?php echo $_SESSION['token']; ?>";
var usr = "<?php echo $_SESSION['usuario']; ?>";
var idPac =1;

//$.when(getIdPaciente(token,usr)).done(function(id){
//  idPac=id;
//});

$.when(turnosPorPaciente(token,idPac)).done(function (turnos){
  var newSelect=document.getElementById('comboTurnos');
  $.each(turnos, function()
  {
    if(this.Atendido==false){
      var opt = document.createElement("option");
      opt.value= this.IdTurno;

      $.when(medicoPorId(token,this.IdMedico)).done(function(medico){
        opt.innerHTML = medico.Nombre+" "+medico.Apellido;
        //console.log(this);
      });

    newSelect.appendChild(opt);
  }
  });
});



document.getElementById('comboTurnos').onchange = function() {
  var e = document.getElementById("comboTurnos");
  var idTurno = e.options[e.selectedIndex].value;

  document.getElementById('idTurnoSeleccionado').value = idTurno;

  var dia;
  var mes;
  var anio;
  var hora;
  var monto;
  var nombreMedico;
  var idMedico;

  $.when(turnoPorId(token,idTurno)).done(function(turno){
    idMedico = turno.IdMedico;
    dia = turno.Fecha.slice(8,-9);
    mes = turno.Fecha.slice(5,-12);
    anio = turno.Fecha.slice(0,-15);

    hora = turno.Fecha.slice(11,-3);
    console.log(turno);


    $.when(medicoPorId(token,idMedico)).done(function(medico){
      nombreMedico = medico.Nombre+" "+medico.Apellido;
      monto = medico.Monto;
      console.log(medico);
      document.getElementById('detallesTurno').value ="Medico: "+nombreMedico+"\n"+"Fecha: "+dia+"/"+mes+"/"+anio+"\n"+"Hora: "+hora+"hs\n"+"Monto: $"+monto;
    });
  });

  document.getElementById('btnBorrar').disabled=false;

}

</script>
