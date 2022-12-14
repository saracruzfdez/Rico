<!-- Ici le contenu de la page account form (on récupère les données) : -->
<?php

// On vérifie qu'il y a des données qui arrivent, que les champs sont remplis et pas vides, c'est notre edit  :
if ($_POST) {
    if (
        isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['name']) && !empty($_POST['name'])
        && isset($_POST['email']) && !empty($_POST['email'])
        && isset($_POST['city']) && !empty($_POST['city'])
        && isset($_POST['password']) && !empty($_POST['password'])

    ) {
        // On inclut la connexion à la base :
        require_once __DIR__ . '/../../../globalComponents/dbConnection/dbConnect.php';

        // On nettoie les données envoyées :
        $id = strip_tags($_POST["id"]);
        $name = strip_tags($_POST["name"]);
        $email = strip_tags($_POST["email"]);
        $city = strip_tags($_POST["city"]);
        $password = strip_tags($_POST["password"]);

        $sql = "UPDATE `users` SET `name`=:name, `email`=:email, `city`=:city, `password`=:password WHERE `id`=:id;";

        $query = $db->prepare($sql);

        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->bindValue('name', $name, PDO::PARAM_STR);
        $query->bindValue('email', $email, PDO::PARAM_STR);
        $query->bindValue('city', $city, PDO::PARAM_STR);
        $query->bindValue('password', $password, PDO::PARAM_INT);

        $query->execute();

        // print_r($db->errorInfo());

        // On inclut la déconnexion à la base :
        require_once  __DIR__ . "/../../../globalComponents/dbConnection/dbClose.php";
?>

        <div class="container mt-3 text-center">
            <div class="button">
                <p>Ton compte a été modifiée ! &#127881;</p>
                <a href="/PROJET%20PERSO/account/accountView/accountView.php"><button type="button" class="btn btn-primary">Voir compte</button></a>
            </div>
        </div>

    <?php
    } else {
        // Si le formulaire est vide ou pas complet on le notifie :
    ?>

        <div class="container mt-3 text-center">

            <div class="button">
                <p>Le formulaire est incomplet &#128532;</p>
                <a href="/PROJET%20PERSO/account/accountEdition/accountEdition.php"><button type="button" class="btn btn-primary">Retour au formulaire</button></a>
            </div>

        </div>

<?php
    }
}