<?php

class Controller {

    public function loadView($view, $data = array()) {

        require_once ('views/header.php');
        require_once ('views/'.$view);
        require_once ('views/footer.php');
    }


}

?>