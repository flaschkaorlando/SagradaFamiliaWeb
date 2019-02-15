<?php

function token($usr,$pass){

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://consultoriosagradafamilia.azurewebsites.net/token",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "grant_type=password&username=".$usr."&password=".$pass."&undefined=",
    CURLOPT_HTTPHEADER => array(
      "Content-Type: application/x-www-form-urlencoded",
      "Postman-Token: 15fb6914-df4a-4ab3-955a-85a789052a55",
      "cache-control: no-cache"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $fullToken = json_decode($response,true);
    return $fullToken['access_token'];
}
}

function getId($token, $usr){

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://consultoriosagradafamilia.azurewebsites.net/api/Account/GetIdPaciente?mail=".$usr,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "undefined=",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer ".$token,
      "cache-control: no-cache"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
    return $response;
  }
}

function crearTurno($token, $idPac,$idMed,$dia,$hora){


  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://consultoriosagradafamilia.azurewebsites.net/api/Turno",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "IdPaciente=".$idPac."&IdMedico=".$idMed."&Fecha=".$dia."T".$hora."&Atendido=false&Orden=0",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer ".$token,
      "Content-Type: application/x-www-form-urlencoded",
      "Postman-Token: 284e2146-7959-4ad2-b099-7be027f2a272",
      "cache-control: no-cache"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
  //  echo $response;
    return $response;
  }

}

function cancelarTurno($token,$idTurno){

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://consultoriosagradafamilia.azurewebsites.net/api/Turno/".$idTurno,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "DELETE",
    CURLOPT_POSTFIELDS => "undefined=",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer ".$token,
      "Content-Type: application/x-www-form-urlencoded",
      "Postman-Token: 5aa1fedc-4598-4199-b0fa-1dd0f4933f03",
      "cache-control: no-cache"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    //echo $response;
    return $response;
  }


}
