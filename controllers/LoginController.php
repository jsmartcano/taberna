<?php


class LoginController extends Controller {

    // Acción para mostrar el formulario
    // ---------------------------------------
    public function defaultAction() {
        $this->loadView("login.php",array("test"=>"uno","test2"=>array("uno","dos")));
    }

    // Acción para intentar login
    // ---------------------------------------
    public function loginAction() {
      
      $users = App::getModel("Users");
      if ($users==null) {
          die("mal");
      }      
      $user = $users->getUserByLogin(App::$params["login"]);
      var_dump($user);
    
    }
}


?>