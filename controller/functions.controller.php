<?php

function getStateCompanies($stateValue)
{
  //ACTUALIZA ESTADO PEDIDOS
  if ($stateValue == 0) {
    $state = 'span class="badge rounded-pill bg-primary">Registrado</span>';
  }
  if ($stateValue == 1) {
    $state = '<span class="badge rounded-pill bg-success">Publicado</span>';
  }
  if ($stateValue == 2) {
    $state = '<span class="badge rounded-pill bg-warning">En revisión</span>';
  }
  return $state;
}

function getStateArticles($stateValue)
{
  //ACTUALIZA ESTADO PEDIDOS
  if ($stateValue == 0) {
    $state = '<span class="badge rounded-pill bg-primary">Registrado</span>';
  }
  if ($stateValue == 1) {
    $state = '<span class="badge rounded-pill bg-success">Publicado</span>';
  }
  if ($stateValue == 2) {
    $state = '<span class="badge rounded-pill bg-warning">En revisión</span>';
  }
  return $state;
}

function showAlert($type, $title, $message, $route)
{
  $alert =
    '<script>
          Swal.fire({
            icon: "' . $type . '",
            title: "' . $title . '",
            text: "' . $message . '",
          }).then(function(result){
						if(result.value){
							window.location = "' . $route . '";
						}
					});
        </script>';
  return $alert;
}
