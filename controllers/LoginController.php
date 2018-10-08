<?php


class LoginController extends Controller {

    // Acción para mostrar el formulario
    // ---------------------------------------
    public function defaultAction() {
        $this->loadView("login.php",array("login"=>"uno","test2"=>array("uno","dos")));
    }

    public function logoutAction() {
        session_destroy();
        header("Location:index.php");
    }

    // Acción para intentar login
    // ---------------------------------------
    public function loginAction() {
      
      $users = App::getModel("Users");
     
      if ($users==null) {
        //  TODO: ERROR NO EXISTE MODELO
      } else {
        $user = $users->getUserByLogin(App::$params["login"]);
        if (count($user) > 0) {
            if ($user["login"]==App::$params["login"] && 
                $user["pass"]==App::$params["md5password"]            
            ) {                    
                $_SESSION['user_id'] = $user["id"];
                $_SESSION['user_login'] = $user["login"];
                $_SESSION['user_name'] = $user["name"];
                $_SESSION['user_admin'] = $user["admin"];
                header("Location:index.php?c=panel");
                exit();
            } else {
                $data = array("login-err"=>"Usuarie o password incorrectes.");
                $this->loadView("login.php",$data);
            }
        } else {
            // EL USUARIO NO EXISTE
            $data = array("login-err"=>"Usuarie o password incorrectes.");
            $this->loadView("login.php",$data);
        }
      }      
      
    }
}


?>