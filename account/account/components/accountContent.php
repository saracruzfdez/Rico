<?php
// On inclut la connexion à la base :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbConnect.php';


//
$sql = "SELECT * FROM users WHERE id =" . ($_SESSION["user"]["id"]);

// On prépare la requête :
$query = $db->prepare($sql);

// On exécute la requête :
$query->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$user = $query->fetchAll(PDO::FETCH_ASSOC);

// print_r($user[0]["id"]);
// print_r($user);

// On ferme la connexion :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbClose.php'
?>



<!-- Ici notre modèle de carte de user résumée à afficher pour chaque user sur la page d'accueil : -->

<div class="container mt-3">

    <h3>Profil</h3>
    
<div class="d-flex justify-content-center">

    <div class="col-sm-6 col-md-6 col-lg-6 nopadding">

        <div class="container mb-3 mt-3 nopadding">


            <div class="card mb-3">

                <div class="card-body text-center">

                <img class="profil" src="https://images.unsplash.com/photo-1605522508768-f8697d6e8e24?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1172&q=80" alt="">
                    <h5 class="card-title mt-3">Bonjour <?= $user[0]["name"] ?></h5>
                    <p> <span class="bold">Email :</span> <?= $user[0]["email"] ?></p>
                    <p> <span class="bold">Ville :</span> <?= $user[0]["city"] ?></p>

                    <div class="mt-3">
                        <div class="button">
                            <!-- Dans le lien "Modifier profil" je spécifie un query parameter id qui correspond au profil sur laquelle je me trouve depuis la page compte (requête HTTP) : -->
                            <a href="/PROJET%20PERSO/account/accountEdit/accountEdit.php?id=<?php echo $user[0]["id"]; ?> " class="btn btn-primary">Editer compte</a>
                        </div>



                        <div class="button">
                            <!-- Dans le lien "Supprimer compte" je spécifie un query parameter id qui correspond au profil sur laquelle je me trouve depuis la page compte (requête HTTP) : -->
                            <a href="/PROJET%20PERSO/account/accountDelete/accountDelete.php" class="btn btn-primary">Supprimer compte</a>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>