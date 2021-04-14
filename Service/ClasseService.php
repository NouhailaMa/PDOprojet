<?php

include_once RACINE . '/Classes/Classe.php';
include_once RACINE . '/Classes/Filiere.php';
include_once RACINE . '/Connexion/Connexion.php';
include_once RACINE . '/Dao/IDao.php';

class ClasseService implements IDao {
    
    private $connexion;
    
    function __construct() {
        $this->connexion = new Connexion();
    }
    
    public function create($o) {
        $query = "INSERT INTO `classe`(`id`, `code`, `filiere`, `anneescolaire`)"
                . "VALUES (NULL, '" . $o->getCode() . "', '" . $o->getFiliere() . "', '" . $o->getAnneescolaire() . "');";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL'); 
    }

    public function delete($o) {
        $query = "DELETE FROM `classe` WHERE id = " . $o->getId();
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');    
        
    }

    public function findById($id) {
        $query = "SELECT * FROM `classe` WHERE id = " . $id;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($c = $req->fetch(PDO::FETCH_OBJ)) {
            $cla = new Classe($c->id, $c->code, $c->filiere, $c->anneescolaire);
        }
        return $cla;   
    }

    public function findall() {
        $query = "select * from classe";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        $c = $req->fetchAll(PDO::FETCH_OBJ);
        return $c; 
    }
    
    
    public function update($o) {
        $query = "UPDATE `classe` SET `code`=?,`filiere`=?,`anneescolaire`=? WHERE id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCode(),$o->getFiliere(),$o->getAnneescolaire(),$o->getId())) or die('Error');     
    }
    
    public function findfiliere(){
        $fils = array();
        $query = "select code from filiere";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($f = $req->fetch(PDO::FETCH_OBJ)) {
            $fils[] = new Filiere($f->id,$f->code, $f->libelle);
        }
        return $fils;
    }

    public function findclassbyfiliere($filiere){
        $query = "select * from classe WHERE `filiere` = '".$filiere."'";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        $c = $req->fetchAll(PDO::FETCH_OBJ);
        return $c;  
    }
    
    public function countclassbyfiliere(){
        $query = "SELECT count(*) as nombre ,filiere.code as filiere FROM `classe` INNER JOIN filiere on classe.filiere=filiere.code GROUP by filiere.libelle";
        $req = $this->connexion->getConnexion()->query($query);
        $req->execute();
        $c = $req->fetchAll(PDO::FETCH_OBJ);
        return $c;
        
    }

}
