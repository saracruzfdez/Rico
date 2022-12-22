<!-- Ici le contenu de la page account form (on récupère les données) : -->
<?php

// On vérifie qu'il y a des données qui arrivent, que les champs sont remplis et pas vides, c'est notre edit  :
if ($_POST) {
    if (
        isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['name']) && !empty($_POST['name'])
        && isset($_POST['email']) && !empty($_POST['email'])
        && isset($_POST['city']) && !empty($_POST['city'])

    ) {
        // On inclut la connexion à la base :
        require_once __DIR__ . '/../../../globalComponents/dbConnection/dbConnect.php';

        // On nettoie les données envoyées :
        $id = strip_tags($_POST["id"]);
        $name = strip_tags($_POST["name"]);
        $email = strip_tags($_POST["email"]);
        $city = strip_tags($_POST["city"]);

        $sql = "UPDATE `users` SET `name`=:name, `email`=:email, `city`=:city WHERE `id`=:id;";

        $query = $db->prepare($sql);

        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->bindValue('name', $name, PDO::PARAM_STR);
        $query->bindValue('email', $email, PDO::PARAM_STR);
        $query->bindValue('city', $city, PDO::PARAM_STR);

        $query->execute();

        // print_r($db->errorInfo());

        // On inclut la déconnexion à la base :
        require_once  __DIR__ . "/../../../globalComponents/dbConnection/dbClose.php";
?>

        <div class="container mt-3 text-center">
            <div class="button">
                <p>Ton compte a été modifiée ! &#127881;</p>
                <a href="/PROJET%20PERSO/account/account/account.php"><button type="button" class="btn btn-primary">Voir compte</button></a>
            </div>
        </div>

<?php
    }
}
