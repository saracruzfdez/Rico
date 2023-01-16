<?php
// This is the page that shows the users's profile :
require_once __DIR__ . '/../../../globalComponents/sql.php';

// I call de function selectUser() and pass it the parameter id SESSION :
$user = selectUser($_SESSION["user"]["id"]);
// $user has the result of selectUser();
?>

<!-- Here we have the profile's user card in profile page : -->
<div class="container mt-3">
    <h3>Profil</h3>
    <div class="d-flex justify-content-center">
        <div class="col-sm-6 col-md-6 col-lg-6 nopadding">
            <div class="container mb-3 mt-3 nopadding">

                <div class="card mb-3">

                    <div class="card-body text-center">
                        <img class="profil" src="https://images.unsplash.com/photo-1605522508768-f8697d6e8e24?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&autao=format&fit=crop&w=1172&q=80" alt="">
                        <h5 class="card-title mt-3">Bonjour <?= $user[0]["name"] ?></h5>
                        <p> <span class="bold">Email :</span> <?= $user[0]["email"] ?></p>
                        <p> <span class="bold">Ville :</span> <?= $user[0]["city"] ?></p>
                        <div class="mt-3">
                            <div class="button">
                                <a href="/PROJET%20PERSO/account/accountEdit/accountEdit.php" class="btn btn-primary">Editer compte</a>
                            </div>
                            <div class="button">
                                <a href="/PROJET%20PERSO/account/accountDelete/accountDelete.php" class="btn btn-primary">Supprimer compte</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>