<?php
date_default_timezone_set('America/Lima');

class ControllerCompanies
{
  //  Show all companies
  public static function ctrGetAllCompanies()
  {
    $table = "tba_empresa";
    $listCompanies = ModelCompanies::mdlGetAllCompanies($table);
    return $listCompanies;
  }

  //  Consult company in sunat api
  public static function ctrSearchCompanySunat($rucCompany)
  {
    $token = 'apis-token-5636.s-RQTGe8O1nkj0nUhISY8hAVrM-ZjZXL';
    // Iniciar llamada a API
    $curl = curl_init();
    // Buscar ruc sunat
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.apis.net.pe/v2/sunat/ruc?numero=' . $rucCompany,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Referer: http://apis.net.pe/api-ruc',
        'Authorization: Bearer ' . $token
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
  }

  //  Create company
  public static function ctrCreateCompany()
  {
    
    $table = "tba_empresa";
    $createData = array(
      "EstadoEmpresa" =>  0,
      "NombreEmpresa" => $_POST["nameCompany"],
      "RucEmpresa" => $_POST["rucCompany"],
      "DireccionEmpresa" => $_POST["addressCompany"],
      "CelularEmpresa" => $_POST["phoneCompany"],
      "RutaLogoColor" => $_POST["logoCompany"],
      "Usuariocreado" => $_SESSION["userName"],
      "UsuarioActualiza" => $_SESSION["userName"],
      "FechaCreacion" => date("Y-m-d\TH:i:sP"),
      "FechaActualizacion" => date("Y-m-d\TH:i:sP")
    );
    $response = ModelCompanies::mdlCreateCompany($table, $createData);
    if($response == "ok"){
      $message = showAlert('success', 'Correcto', 'Empresa Agregada Correctamente', 'companies');
      echo $message;
    } else {
      $message = showAlert('error', 'Error', 'Error al Agregar la Empresa', 'companies');
      echo $message;
    }
  }
}
