<?php

include_once RACINE . '/classes/User.php';
include_once RACINE . '/connexion/Connexion.php';

class LoginService {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function signup($username, $password) {
        $query = "SELECT * FROM `users` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($user = $req->fetch(PDO::FETCH_OBJ)) {
            $user = true;
        }
        return $user;
    }

}
