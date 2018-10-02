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
      
        // crear el modelo no hacer query aqui
        $result = $this->db->query("Select * from users");
        var_dump($result);
        var_dump($this->conf);
        var_dump($this->params);

               
        
    }
}


?>