<?php

date_default_timezone_set('America/Lima');

//  Controllers
require_once "controller/template.controller.php";
require_once "controller/functions.controller.php";
require_once "controller/users.controller.php";
require_once "controller/companies.controller.php";
require_once "controller/articles.controller.php";

//  Models
require_once "model/users.model.php";
require_once "model/companies.model.php";
require_once "model/articles.model.php";

$template = new ControllerTemplate();
$template -> ctrTemplate();