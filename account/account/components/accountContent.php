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


//
$sql2 = "SELECT * FROM users WHERE id !=" . ($_SESSION["user"]["id"]);

// On prépare la requête :
$query2 = $db->prepare($sql2);

// On exécute la requête :
$query2->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$users = $query2->fetchAll(PDO::FETCH_ASSOC);

// On ferme la connexion :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbClose.php'
?>



<!-- Ici notre modèle de carte de user résumée à afficher pour chaque user sur la page d'accueil : -->

<div class="container mt-3">

    <div class="card border-secondary mb-3">

        <div class="card-body">
            <h5 class="card-title">Bonjour <?= $user[0]["name"] ?></h5>
            <p class="bold">Email :</p>
            <p><?= $user[0]["email"] ?></p>
            <p class="bold">Ville :</p>
            <p><?= $user[0]["city"] ?></p>

            <div class="mt-3">
                <div class="button">
                    <!-- Dans le lien "Modifier profil" je spécifie un query parameter id qui correspond au profil sur laquelle je me trouve depuis la page compte (requête HTTP) : -->
                    <a href="/PROJET%20PERSO/account/accountEdit/accountEdit.php?id=<?php echo $user[0]["id"] ?>" class="btn btn-primary">Editer compte</a>
                </div>

                <div class="button">
                    <!-- Dans le lien "Supprimer compte" je spécifie un query parameter id qui correspond au profil sur laquelle je me trouve depuis la page compte (requête HTTP) : -->
                    <a href="/PROJET%20PERSO/account/accountDelete/accountDelete.php" class="btn btn-primary">Supprimer compte</a>
                </div>
            </div>

        </div>

    </div>

</div>



<?php


if (stripos($_SESSION["user"]["roles"], "ROLE_ADMIN") !== false) { ?>

    <div class="container mt-3">

        <legend> Tes users : </legend>

    </div>

    <?php };



foreach ($users as $user2) :

    if (stripos($_SESSION["user"]["roles"], "ROLE_ADMIN") !== false) { ?>

        <div class="container mt-3">

            <div class="card mb-3">

                <div class="card-body">
                    <h5 class="card-title">Profil de <?= $user2["name"] ?></h5>
                    <p class="bold">Email :</p>
                    <p><?= $user2["email"] ?></p>
                    <p class="bold">Ville :</p>
                    <p><?= $user2["city"] ?></p>

                </div>

            </div>

        </div>

<?php }
endforeach;
?>