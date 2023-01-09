<!-- Ici le contenu de la page account form (on récupère les données) : -->
<?php

// On vérifie qu'il y a des données qui arrivent, que les champs sont remplis et pas vides, c'est notre UPDATE  :
if ($_POST) {
    if (
        isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['name']) && !empty($_POST['name'])

    ) {
        // On inclut la connexion à la base :
        require_once __DIR__ . '/../../../globalComponents/dbConnection/dbConnect.php';

        // On nettoie les données envoyées :
        $id = strip_tags($_POST["id"]);
        $name = strip_tags($_POST["name"]);

        $sql = "UPDATE `categories` SET `name`=:name WHERE `id`=:id;";

        $query = $db->prepare($sql);

        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->bindValue('name', $name, PDO::PARAM_STR);

        $query->execute();

        // print_r($db->errorInfo());

        // On inclut la déconnexion à la base :
        require_once  __DIR__ . "/../../../globalComponents/dbConnection/dbClose.php";
?>

        <div class="container mt-3 text-center">

            <h3>La catégorie a été modifiée ! &#127881;</h3>

            <div class="button">
                <a href="/PROJET%20PERSO/categories/categories/categories.php"><button type="button" class="btn btn-primary mt-2">Voir categories</button></a>
            </div>

        </div>

<?php
    }
}