<?php
date_default_timezone_set('America/Lima');

class ControllerUsers
{
  //  Login into the system
  public static function ctrLogIn()
  {
    if (isset($_POST["userEmail"]) && $_POST["userEmail"] != "" && $_POST["userEmail"] != null && $_POST["userPassword"] != "" && $_POST["userPassword"] != null) {
      $verify = self::ctrVerifyUser($_POST["userEmail"], $_POST["userPassword"]);

      if ($verify) {
        $table = "tb_user";

        $userData = ModelUsers::mdlGetSessionData($table, $_POST["userEmail"]);

        $_SESSION["login"] = "ok";
        $_SESSION["UserId"] = $userData["IdUser"];
        $_SESSION["userType"] = $userData["IdUserType"];
        $_SESSION["userName"] = $userData["Username"];
        $_SESSION["userFullName"] = $userData["UserFullName"];

        //  Save last login
        $lastLogin = date("Y-m-d\TH:i:sP");

        $updateConnection = ModelUsers::mdlUpdateLastLogin($table, $lastLogin, $userData["IdUser"]);
        if ($updateConnection == "ok") {
          echo '<script>
            window.location = "home";
          </script>';
        }
      } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Error al ingresar tus datos, vuelve a intentar.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
    }
  }

  //  Verify user to login
  static public function ctrVerifyUser($email, $password)
  {
    $table = "tb_user";
    $userData = ModelUsers::mdlGetUserDataVerify($table, $email);
    $verify = password_verify($password, $userData["UserPassword"]);
    return $verify;
  }
}
