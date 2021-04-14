<?php

include_once '../racine.php';
include_once RACINE.'/Service/FiliereService.php';


extract($_POST);
$fs = new FiliereService();

if ($op != '') {
    if ($op == 'add') {
        $fs->create(new Filiere(1, $code, $libelle));
    } elseif ($op == 'update') {
        $fs->update(new Filiere($id, $code, $libelle));
    } elseif ($op == 'delete') {
        $fs->delete($fs->findById($id));
    }
}

header('Content-type: application/json');
echo json_encode($fs->findall());
