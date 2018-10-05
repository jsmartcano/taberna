
<?php
class Database {

    private $connection;

    public function connect() {
        $result = new mysqli(
            App::$conf['db']['host'],            
            App::$conf['db']['user'], 
            App::$conf['db']['pass'],
            App::$conf['db']['name']
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
        if ($result->num_rows == 1) {
            $rows = $result->fetch_assoc();
        } else {
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }    
        return $rows;
        //var_dump($rows);
    }
}
?>