<?php

class Controller {

    public function loadView($view, $data) {
        require_once ('views/'.$view);
    }


}

?>