<?php
class LoginController extends Controller {

    private $params = array();
    private $db = NULL;

    public function __construct($params, $db) {
        $this->params = $params;
        $this->db = $db;
    }

    // Acción para mostrar el formulario
    // ---------------------------------------
    public function defaultAction() {
        $this->loadView("login.php");
    }

    // Acción para intentar login
    // ---------------------------------------
    public function loginAction() {
      
        $result = $this->db->query("Select * from users");
        var_dump($result);
        
        
    }
}


?>