<?php

include_once RACINE . '/Classes/Filiere.php';
include_once RACINE . '/Connexion/Connexion.php';
include_once RACINE . '/Dao/IDao.php';

class FiliereService implements IDao {
    
    private $connexion ;
    
    function __construct() {
        $this->connexion = new Connexion();
    }
    
    public function create($o) {
        $query = "INSERT INTO `filiere`(`id`, `code`, `libelle`)"
                . "VALUES (NULL, '" . $o->getCode() . "', '" . $o->getLibelle() . "');";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');    
    }

    public function delete($o) {
        $query = "DELETE FROM `filiere` WHERE id = " . $o->getId();
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');          
    }

    public function findById($id) {   
        $query = "SELECT * FROM `filiere` WHERE id = " . $id;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($f = $req->fetch(PDO::FETCH_OBJ)) {
            $fil = new Filiere($f->id, $f->code, $f->libelle);
        }
        return $fil;       
    }
    
    public function findall() {
        $query = "select * from filiere";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f; 
    }

    public function update($o) {
        $query = "UPDATE `filiere` SET `code`=?,`libelle`=? WHERE id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCode(),$o->getLibelle(), $o->getId())) or die('Error');               
    }

}
