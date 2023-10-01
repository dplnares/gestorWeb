<?php

date_default_timezone_set('America/Lima');

//  Controllers
require_once "controller/template.controller.php";
require_once "controller/users.controller.php";

//  Models
require_once "model/users.model.php";

$template = new ControllerTemplate();
$template -> ctrTemplate();