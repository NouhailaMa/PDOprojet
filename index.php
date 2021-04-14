<!DOCTYPE html>
<?php
include_once './racine.php';
?>
<html>
    <head>

        <title> TP1 </title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"  integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/style2.css">
        <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
        <script src="script/jquery-3.6.0.min.js"></script>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
        <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  
    </head>

    <div class="wrapper">
        <div class="sidebar">
            <h2>ENSAJ</h2>
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i>Accueil</a></li>
                <li><a href="./index.php?p=filiere"><i class="fas fa-stream"></i>Filières</a></li>
                <li><a href="./index.php?p=classe"><i class="fas fa-ellipsis-h"></i>Classes</a></li>
                <li><a href="./index.php?p=affichercf"><i class="fas fa-filter"></i> Classe / Filières </a></li>
                <li><a href="./index.php?p=statistique"><i class="fas fa-chart-bar"></i>Statistiques</a></li>
            </ul>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
            <?php
                session_start();
                if (isset($_SESSION['User'])) {
                    ?>
                <a href="logout.php?logout"><i class="fa fa-power-off"></i><span>Déconnexion</span></a>
                <?php
                    } else {
                        header("location:signin.php");
                    }
                    ?>
            </div>
        </div>
    </div>
    <body>
    
                <?php
                    if( isset($_GET['p']) && $_GET['p'] != ""){
                        if($_GET['p']=="etudiant"){
                            include_once './Getudiant.php';
                        }elseif ($_GET['p']=="filiere"){
                            include_once './Gfiliere.php';
                        }elseif($_GET['p']=="classe"){
                            include_once './Gclasse.php';
                        }elseif($_GET['p']=="affichercf"){
                            include_once './ClasseFiliere.php';
                        }
                        elseif($_GET['p']=="statistique"){
                            include_once 'Statistique.php ';
                        }
                    }
                ?>
               
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>