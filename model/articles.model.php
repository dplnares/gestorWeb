<?php

require_once "connection.php";

class ModelArticles
{
  public static function mdlGetAllArticles($table)
  {
    $statement = Connection::connCamara()->prepare("SELECT tba_noticia.IdNoticia, tba_noticia.EstadoNoticia, tba_noticia.IdCategoria, tba_noticia.TituloInterno, tba_noticia.FechaActualizacion, tba_categoria.DescripcionCategoria FROM $table INNER JOIN tba_categoria ON tba_noticia.IdCategoria = tba_categoria.IdCategoria");
    $statement -> execute();
    return $statement -> fetchAll();
  }
}