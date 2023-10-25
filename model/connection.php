<?php

class Connection
{
  public static function connGestor()
  {
    $link = new PDO("mysql:host=localhost;dbname=db_gestornoticias", "root", "");
    $link->exec("set names utf8");
    return $link;
  }

  public static function connCamara()
  {
    $link = new PDO("mysql:host=localhost;dbname=db_camaracomercio", "root", "");
    $link->exec("set names utf8");
    return $link;
  }
}
