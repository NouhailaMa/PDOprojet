<?php

include_once '../racine.php';
include_once RACINE.'/Service/ClasseService.php';


extract($_POST);
$cs = new ClasseService();

if ($op != '') {
    if ($op == 'add') {
        $cs->create(new Classe(1, $code, $filiere, $anneescolaire));
    } elseif ($op == 'update') {
        $cs->update(new Classe($id, $code, $filiere, $anneescolaire));
    } elseif ($op == 'delete') {
        $cs->delete($cs->findById($id));
    }elseif ($op == 'countClasse'){
        $cs->countclassbyfiliere();
    }
}

header('Content-type: application/json');
echo json_encode($cs->findall());
