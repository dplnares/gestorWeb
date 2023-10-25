<?php

require_once "connection.php";

class ModelCompanies
{
  public static function mdlGetAllCompanies($table)
  {
    $statement = Connection::connCamara()->prepare("SELECT tba_empresa.IdEmpresa, tba_empresa.EstadoEmpresa, tba_empresa.NombreEmpresa, tba_empresa.RucEmpresa, tba_empresa.FechaActualizacion FROM $table");
    $statement -> execute();
    return $statement -> fetchAll();
  }

  public static function mdlCreateCompany($table, $createData)
  {
    $statement = Connection::connCamara()->prepare("INSERT INTO $table (EstadoEmpresa, NombreEmpresa, RucEmpresa, DireccionEmpresa, CelularEmpresa, RutaLogoColor, Usuariocreado, UsuarioActualiza, FechaCreacion, FechaActualizacion) VALUES(:EstadoEmpresa, :NombreEmpresa, :RucEmpresa, :DireccionEmpresa, :CelularEmpresa, :RutaLogoColor, :Usuariocreado, :UsuarioActualiza, :FechaCreacion, :FechaActualizacion)");
    $statement->bindParam(":EstadoEmpresa", $createData["EstadoEmpresa"], PDO::PARAM_STR);
    $statement->bindParam(":NombreEmpresa", $createData["NombreEmpresa"], PDO::PARAM_STR);
    $statement->bindParam(":RucEmpresa", $createData["RucEmpresa"], PDO::PARAM_STR);
    $statement->bindParam(":DireccionEmpresa", $createData["DireccionEmpresa"], PDO::PARAM_STR);
    $statement->bindParam(":CelularEmpresa", $createData["CelularEmpresa"], PDO::PARAM_STR);
    $statement->bindParam(":RutaLogoColor", $createData["RutaLogoColor"], PDO::PARAM_STR);
    $statement->bindParam(":Usuariocreado", $createData["Usuariocreado"], PDO::PARAM_STR);
    $statement->bindParam(":UsuarioActualiza", $createData["UsuarioActualiza"], PDO::PARAM_STR);
    $statement->bindParam(":FechaCreacion", $createData["FechaCreacion"], PDO::PARAM_STR);
    $statement->bindParam(":FechaActualizacion", $createData["FechaActualizacion"], PDO::PARAM_STR);
    if ($statement -> execute()){
      $statement = null;
      return "ok";
    } else {
      $statement = null;
      return "error";
    }
  }
}