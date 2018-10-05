<?php


class PanelController extends Controller {

    // Acción para mostrar el formulario
    // ---------------------------------------
    public function defaultAction() {
        $this->loadView("panel.php");
    }

    // Acción para intentar login
    // ---------------------------------------
    public function loginAction() {
      
      $users = App::getModel("Users");
      if ($users==null) {
          $data = array("login-err"=>"Usuarie o password incorrectes.");
          $this->loadView("login.php",$data);
      } else {
        $user = $users->getUserByLogin(App::$params["login"]);
        if ($user["login"]==App::$params["login"] && 
            $user["pass"]==App::$params["password"]            
        ) {
            $data = array("login-err"=>"Login correcte!.");
            $this->loadView("login.php",$data);
        } else {
            $data = array("login-err"=>"Usuarie o password incorrectes.");
            $this->loadView("login.php",$data);
        }
      }      
      
    }
}


?>