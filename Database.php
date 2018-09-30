
<?php
class Database {

    private $connection;
    private $conf;

    public function __construct() {
        $this->conf = $GLOBALS['conf'];
    }

    public function connect() {
        $result = new mysqli(
            $this->conf['db']['host'],            
            $this->conf['db']['user'], 
            $this->conf['db']['pass'],
            $this->conf['db']['name']
        );
        $result->query("SET NAMES 'utf8'");
        return $result;
    }

    public function query($sql) {
        if ($this->connection == false) {
            $this->connection = $this->connect();
            if (!$this->connection) {
                echo "PROBLEMA AL CONECTAR A LA BASE DE DATOS";
                return NULL;
                die();
            }
        }
        
        $result = $this->connection->query( $sql );
        $rows = $this->resultToArray($result);
        $result->free();
        return $rows;
    }

    function resultToArray($result) {
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
}
?>