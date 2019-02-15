
function medicosPorEspecialidad(token, idEsp){

  var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://consultoriosagradafamilia.azurewebsites.net/api/Medico?idEspecialidad="+idEsp,
  "method": "GET",
  "headers": {
    "Authorization": "Bearer "+token,
    "Content-Type": "application/x-www-form-urlencoded",
    "cache-control": "no-cache",
    "Postman-Token": "2c8b2dde-ebb1-4dd6-8093-58ceb5d2fc5d"
  },
  "data": {}
}
return $.ajax(settings).done(function (response) {
  //console.log(response);
  return response;
});
}

function cargarEspecialidades(token){

  var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://consultoriosagradafamilia.azurewebsites.net/api/Especialidad",
  "method": "GET",
  "headers": {
    "Authorization": "Bearer "+token,
    "Content-Type": "application/x-www-form-urlencoded",
    "cache-control": "no-cache",
    "Postman-Token": "5dd45c50-35cd-4e05-a7c4-68a0625f7647"
  },
  "data": {}
}
var parsedJson;

return $.ajax(settings).done(function (response) {
  return response;

});
}

function cargarMedicos(token){

  var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://consultoriosagradafamilia.azurewebsites.net/api/Medico",
  "method": "GET",
  "headers": {
    "Authorization": "Bearer "+token,
    "Content-Type": "application/x-www-form-urlencoded",
    "cache-control": "no-cache",
    "Postman-Token": "b99b4036-4a61-434a-99f9-909fc4184773"
  },
  "data": {}
}

return $.ajax(settings).done(function (response) {
return response;
});

}

function medicoPorId(token, idMedico){

  var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://consultoriosagradafamilia.azurewebsites.net/api/Medico/"+idMedico,
    "method": "GET",
    "headers": {
      "Authorization": "Bearer "+token,
      "cache-control": "no-cache",
      "Postman-Token": "6fae7f05-58bc-4f8f-be7d-40c140ec7110"
    },
    "data": {}
  }

  return $.ajax(settings).done(function (response) {
    //console.log(response);
    return response;
  });
}

function diasPorMedico(token, idMed){

  var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://consultoriosagradafamilia.azurewebsites.net/api/DisponibilidadDia?idMedico="+idMed,
    "method": "GET",
    "headers": {
      "Authorization": "Bearer "+token,
      "cache-control": "no-cache",
      "Postman-Token": "464550a8-1cab-42a7-b267-aea8c7e0cbc7"
    },
    "data": {}
  }

  return $.ajax(settings).done(function (response) {
    //console.log(response);
    return response;
  });


}

function horasPorDia(token, fecha, idMedico){

  var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://consultoriosagradafamilia.azurewebsites.net/api/DisponibilidadHorario?fechaDesde="+fecha+"&idMedico="+idMedico,
  "method": "GET",
  "headers": {
    "Authorization": "Bearer "+token,
    "cache-control": "no-cache",
    "Postman-Token": "558dd20b-3a73-4111-8718-5f36142004ae"
  }
}

return $.ajax(settings).done(function (response) {
  console.log(response);
  return response;
});
}

function turnosPorPaciente(token, idPaciente){

  var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://consultoriosagradafamilia.azurewebsites.net/api/Turno?idPaciente="+idPaciente,
  "method": "GET",
  "headers": {
    "Authorization": "Bearer "+token,
    "cache-control": "no-cache",
    "Postman-Token": "a8f3ba6e-f0ea-421e-83e5-a88928af22ef"
  },
  "data": {}
}

return $.ajax(settings).done(function (response) {
  //console.log(response);
  return response;
});

}

function getIdPaciente(token, usr){

var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://consultoriosagradafamilia.azurewebsites.net/api/Account/GetIdPaciente?mail="+usr,
  "method": "GET",
  "headers": {
    "Authorization": "Bearer "+token,
    "cache-control": "no-cache",
    "Postman-Token": "79e7bc2a-f891-4d1f-be63-9f31563d86cb"
  },
  "data": {}
}


return $.ajax(settings).done(function (response) {
  //console.log(response);
  return response;
});
}

function turnoPorId(token, idTurno){

  var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://consultoriosagradafamilia.azurewebsites.net/api/Turno/"+idTurno,
    "method": "GET",
    "headers": {
      "Authorization": "Bearer "+token,
      "cache-control": "no-cache",
      "Postman-Token": "54c10082-07bc-4d7b-990c-3897e6c912b6"
    },
    "data": {}
  }

  return $.ajax(settings).done(function (response) {
    //console.log(response);
    return response;
  });

}

function getPaciente (token, idPac){

  var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://consultoriosagradafamilia.azurewebsites.net/api/Paciente/"+idPac,
    "method": "GET",
    "headers": {
      "Authorization": "Bearer "+token,
      "cache-control": "no-cache",
      "Postman-Token": "fb1a3e3f-60ad-4843-9fe3-f8c82de1756f"
    },
    "data": {}
  }

  return $.ajax(settings).done(function (response) {
    console.log(response);
    return response;
  });
}
