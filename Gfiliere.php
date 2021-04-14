<?php
include_once './racine.php';
?>

    <div class="content">
        <div class="row header-container justify-content-center">
            <div class="header">
                <h1>Gestion des filières</h1>
            </div>
        </div>

        <div class="container-fluid mt-4">
            <div class="container-fluid mt-4">
                <div class="row justify-content-center">
                    <section class="col-md-9">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"> Entrez les informations de la nouvelle filière : </h5>
                            </div>
                        </div>
                        <div class="form">
                            <div class="mb-3">
                                <label class="form-label">Code</label>
                                <input id="code" type="text" name="code" class="form-control" placeholder="Entrer Code">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Libelle</label>
                                <input id="libelle" type="text" name="libelle" class="form-control" placeholder="Entrer Libelle">
                            </div>
                            <button id="btn" type="button" class="btn btn-info">Enregistrer</button>
                            <hr>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">LISTE DES FILIERES</h5>
                                    <p class="card-text">Vous trouvez ici toutes les informations concernant les filières.</p>
                                    <hr> 
                                    <table id="myTable" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th scope="col">id</th>
                                                <th scope="col">Code</th>
                                                <th>Libelle <span style="padding-left:200px" ></span> </th>
                                                <th scope="col">Supprimer</th>
                                                <th scope="col">Modifier</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-content">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

        <script src="script/filiere.js" type="text/javascript"></script>
        