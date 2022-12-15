<!-- Ici le contenu de la page categories form (on récupère les données) : -->
<?php

// On vérifie qu'il y a des données qui arrivent, que les champs sont remplis et pas vides, c'est notre CREATE  :
if ($_POST) {
    if (
        isset($_POST['name']) && !empty($_POST['name'])
    ) {
        // On inclut la connexion à la base :
        require_once __DIR__ . '/../../../globalComponents/dbConnection/dbConnect.php';

        // On nettoie les données envoyées :
        $name = strip_tags($_POST["name"]);

        $sql = "INSERT INTO `categories` (`name`) VALUES (:name);";

        $query = $db->prepare($sql);

        $query->bindValue('name', $name, PDO::PARAM_STR);

        $query->execute();

        // print_r($db->errorInfo());

        // On inclut la déconnexion à la base :
        require_once  __DIR__ . "/../../../globalComponents/dbConnection/dbClose.php";
?>

        <div class="container mt-3 text-center">
            <div class="button">
                <p>La categorie a été crée ! &#127881;</p>
                <a href="/PROJET%20PERSO/categories/categories/categories.php"><button type="button" class="btn btn-primary">Voir les categories</button></a>
            </div>
        </div>

<?php
    } 
}