<?php


class Configuration {

    private $mode = "DEV";

    public function getConfiguration() {
        if ($this->mode == 'DEV') 
        {
            $conf = array(
                'db' => array(   
                    'host' => '127.0.0.1',
                    'name' => 'taberna',
                    'user' => 'jose',
                    'pass' => 'taberna'
                ),
            );
        } 
        else if ($this->mode == 'PROD') 
        {  
            $conf = array(
                'db' => array(
                    'host' => 'db755760472.db.1and1.com',
                    'name' => 'taberna',
                    'user' => 'dbo755760472',
                    'pass' => 't4bt4b3rna3rna'
                ),
            );
        }
        return $conf;
    }

}








?>