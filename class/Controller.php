<?php

class Controller {

    protected $db = null;
    protected $params = array();
    protected $conf = array();

    public function loadView($view, $data) {
        require_once ('views/'.$view);
    }

    public function setDb($db) {
        $this->db = $db;
    }
    public function setParams($params){
        $this->params = $params;
    }

    public function setConfigutation($conf) {
        $this->conf = $conf;
    }

}

?>