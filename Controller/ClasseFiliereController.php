<?php

include_once '../racine.php';
include_once RACINE.'/Service/ClasseService.php';


extract($_POST);
$cs = new ClasseService();

if ($op != '') {
   if ($op == 'search'){
        $cs->findclassbyfiliere($filiere);
    }
}

header('Content-type: application/json');
echo json_encode($cs->findclassbyfiliere($filiere));
