<?php

require_once "../controller/companies.controller.php";
require_once "../model/companies.model.php";

class AjaxCompanies
{
  //  Buscar al paciente por el número del DNI
  public $rucCompany;
  public function ajaxSearchRuc()
  {
    $rucCompany = $this->rucCompany;
    $response = ControllerCompanies::ctrSearchCompanySunat($rucCompany);
    echo json_encode($response);
  }
}

//  Buscar al paciente por el número del DNI
if(isset($_POST["rucCompany"])){
	$mostrarDatos = new AjaxCompanies();
	$mostrarDatos -> rucCompany = $_POST["rucCompany"];
	$mostrarDatos -> ajaxSearchRuc();
}

