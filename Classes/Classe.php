<?php


class Classe {
    
    private $id;
    private $code;
    private $filiere;
    private $anneescolaire;
    
    function __construct($id, $code, $filiere, $anneescolaire) {
        $this->id = $id;
        $this->code = $code;
        $this->filiere = $filiere;
        $this->anneescolaire = $anneescolaire;
    }

    
    function getId() {
        return $this->id;
    }

    function getCode() {
        return $this->code;
    }

    function getFiliere() {
        return $this->filiere;
    }

    function getAnneescolaire() {
        return $this->anneescolaire;
    }
    
    function setCode($code) {
        $this->code = $code;
    }

    function setFiliere($filiere) {
        $this->filiere = $filiere;
    }

    function setAnneescolaire($anneescolaire) {
        $this->anneescolaire = $anneescolaire;
    }
    
}
