<!-- Contenu de la page compte, "READ" la totalité des compte stockées dans notre bd -->
<?php
// On inclut la connexion à la base :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbConnect.php';

$sql = "SELECT * FROM users";

// On prépare la requête :
$query = $db->prepare($sql);

// On exécute la requête :
$query->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$users = $query->fetchAll(PDO::FETCH_ASSOC);

// On ferme la connexion :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbClose.php'
?>

<!-- Ici on boucle sur $users pour donner la forme card à chaque user de notre base de données -->
<div class="container mt-3">

    <?php foreach ($users as $user) : ?>

        <?php require __DIR__ . "/accountCard.php" ?>

    <?php endforeach; ?>

</div>