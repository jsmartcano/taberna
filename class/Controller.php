<?php

class Controller {

    public function loadView($view) {
        require_once ('views/'.$view);
    }


}

?>