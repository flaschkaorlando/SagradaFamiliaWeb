<link rel="stylesheet" href="styles.css">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="./cascada.js"></script>
    <h1> <a href="pantallaConsultorio.php" >  <img class="imagenHiperv" src="https://i.imgur.com/uL1QuCy.png" width="600em" height="200em" alt="ImagenSagradaFamilia"></a></h1>
</head>

<form action="pantallaResultado.php" method="post">
<?php
session_start();
//$_SESSION['idPac']=1;

//echo "<input id=\"tokenId\" value=\"".$_SESSION['token']."\"/>";
//echo "<input id=\"usrId\" value=\"".$_SESSION['usuario']."\"/>";
?>

<br>
<br>
  <select id="comboEspecialidades" class="comboBox">
    </select>
    <input type="text" class="inputPersonalizado" name="espView" id="espView" value="" readonly>

<br>
<br>
  <select id="comboMedicos" class="comboBox">
    </select>
    <input type="text" class="inputPersonalizado" name="medicView" id="medicView" value="" readonly>
    <input type="hidden" name="idMedicoSeleccionado" id="idMedicoSeleccionado" value="valor1" />

<br>
<br>
  <select id="comboDias" class="comboBox">
    </select>
    <input type="text" class="inputPersonalizado" name="dayView" id="dayView" value="" readonly>
    <input type="hidden" name="idDiaSeleccionado" id="idDiaSeleccionado" value="valor1" />

<br>
<br>
  <select id="comboHoras" class="comboBox">
    </select>
    <input type="text" class="inputPersonalizado" name="hourView" id="hourView" value="" readonly>
    <input type="hidden" name="idHoraSeleccionada" id="idHoraSeleccionada" value="valor1" />

  <h2><a href="pantallaFunciones.php" class="boton_personalizado2">Volver</a>  <input disabled type="submit" id="btnCrear" class="boton_personalizado" name="btnCrear" value="Crear"></h2>

</form>


<script>
var token = "<?php echo $_SESSION['token']; ?>";
var usr = "<?php echo $_SESSION['usuario']; ?>";
var idPac = "<?php echo $_SESSION['id']; ?>";


  $.when(cargarEspecialidades(token)).done(function (especialidades){
      var newSelect=document.getElementById('comboEspecialidades');
      $.each(especialidades, function()
      {
        if(this.Habilitada){
         var cat = document.createElement("option");
         cat.value= this.IdEspecialidad;
         cat.innerHTML = this.Nombre;
         newSelect.appendChild(cat);
       }
      });
    });

//EVENTOSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS

  document.getElementById('comboEspecialidades').onchange = function() {
    var e = document.getElementById("comboEspecialidades");
    var esp = e.options[e.selectedIndex].value;
    document.getElementById('espView').value = e.options[e.selectedIndex].text;
    document.getElementById('comboMedicos').options.length = 0;
    document.getElementById('medicView').value = "";

    document.getElementById('comboDias').options.length = 0;
    document.getElementById('dayView').value = "";

    document.getElementById('comboHoras').options.length = 0;
    document.getElementById('hourView').value = "";

    document.getElementById('btnCrear').disabled=true;

    $.when(medicosPorEspecialidad(token,esp)).done(function (medicos){
      var newSelect=document.getElementById('comboMedicos');
      $.each(medicos, function()
      {
        var opt = document.createElement("option");
        opt.value= this.IdMedico;
        opt.innerHTML = this.Apellido+" "+this.Nombre;
        newSelect.appendChild(opt);
      });
    });
}

  document.getElementById('comboMedicos').onchange = function() {
    var e = document.getElementById("comboMedicos");
    var idMed = e.options[e.selectedIndex].value;
    document.getElementById('medicView').value = e.options[e.selectedIndex].text;
    document.getElementById('idMedicoSeleccionado').value = idMed;

    document.getElementById('comboDias').options.length = 0;
    document.getElementById('dayView').value = "";

    document.getElementById('comboHoras').options.length = 0;
    document.getElementById('hourView').value = "";

    document.getElementById('btnCrear').disabled=true;

    $.when(diasPorMedico(token,idMed)).done(function (dias){
      var newSelect=document.getElementById('comboDias');
      var index = 0;
      $.each(dias, function()
      {
        var opt = document.createElement("option");
        opt.value= index;
        opt.innerHTML = this;
        newSelect.appendChild(opt);
        index++;
      });
    });
}

  document.getElementById('comboDias').onchange = function() {
    var e = document.getElementById("comboDias");
    var m = document.getElementById("comboMedicos");
    document.getElementById('dayView').value = e.options[e.selectedIndex].text;

    var idDia = e.options[e.selectedIndex].text;
    var fraccionado = idDia.split(" ");
    var formateado = fraccionado[1].split("/");
    if(formateado[0]<10){
      formateado[0] = "0"+formateado[0];
    }
    if(formateado[1]<10){
      formateado[1] = "0"+formateado[1];
    }
    formateado = formateado[2]+"-"+formateado[1]+"-"+formateado[0];
    document.getElementById('idDiaSeleccionado').value = formateado;

    console.log(idDia);
    var idMed = e.options[e.selectedIndex].value;

    document.getElementById('comboHoras').options.length = 0;
    document.getElementById('hourView').value = "";

    document.getElementById('btnCrear').disabled=true;

    $.when(horasPorDia(token,idDia,idMed)).done(function (horas){
      var newSelect=document.getElementById('comboHoras');
      var index =0;
      $.each(horas, function()
      {
        var opt = document.createElement("option");
        opt.value= index;
        opt.innerHTML = this;
        newSelect.appendChild(opt);
        index++;
      });
    });
}

  document.getElementById('comboHoras').onchange = function() {

  //  var m = document.getElementById("comboHoras");
  //  var d = document.getElementById("comboHoras");
    var h = document.getElementById("comboHoras");
    document.getElementById('hourView').value = h.options[h.selectedIndex].text;

  //  var idMed = m.options[m.selectedIndex].value;
  //  var idDia = d.options[d.selectedIndex].text;
    var idHora = h.options[h.selectedIndex].text;
    var fragmentado = idHora.split(":");
    if(fragmentado[0]<10){
      fragmentado[0] = "0"+fragmentado[0];
    }

    if(fragmentado[1]<10){
      fragmentado[1] = "0"+fragmentado[1];
    }
    idHora = fragmentado[0]+":"+fragmentado[1]+":00";
    document.getElementById('idHoraSeleccionada').value =idHora;
    console.log(idHora);
    document.getElementById('btnCrear').disabled=false;
}

</script>
