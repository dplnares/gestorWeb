<?php
date_default_timezone_set('America/Lima');

class ControllerArticles
{
  public static function ctrGetAllArticles()
  {
    $table = "tba_noticia";
    $listArticles = ModelArticles::mdlGetAllArticles($table);
    return $listArticles;
  }
}