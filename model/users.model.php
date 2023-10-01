<?php

require_once "connection.php";

class ModelUsers
{
  //  Update last login
  public static function mdlUpdateLastLogin($table, $lastLogin, $codUser)
  {
    $statement = Conexion::conn()->prepare("UPDATE $table SET LastConnection=:LastConnection WHERE tb_user.IdUser = $codUser");
    $statement->bindParam(":LastConnection", $lastLogin, PDO::PARAM_STR);
    if ($statement->execute()) {
      return "ok";
    } else {
      return "error";
    }
  }

  //  Get user data for session
  public static function mdlGetSessionData($table, $email)
  {
    $statement = Conexion::conn()->prepare("SELECT * FROM $table WHERE UserEmail=:UserEmail");
    $statement->bindParam(":UserEmail", $email, PDO::PARAM_STR);
    $statement->execute();
    return $statement->fetch();
  }

  //  Get user data to login
  public static function mdlGetUserDataVerify($table, $email)
  {
    $statement = Conexion::conn()->prepare("SELECT tb_user.IdUser, tb_user.UserPassword FROM $table WHERE UserEmail = :UserEmail");
    $statement->bindParam(":UserEmail", $email, PDO::PARAM_STR);
    $statement->execute();
    return $statement->fetch();
  }
}
