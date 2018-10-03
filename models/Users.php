<?php


class Users {

    public function getUserByLogin($login) {
        $result = App::$db->query("SELECT * FROM USERS WHERE login='".$login."'");
        return $result;
    }

}

?>