<!-- Ici le contenu de la page account form (on récupère les données) : -->
<?php

// Si je suis conecté ne pas aller ds inscription
/* if (isset($_SESSION["user"])) {
    header("Location: account/account/account.php");
    exit;
} */

// On vérifie qu'il y a des données qui arrivent, que les champs sont remplis et pas vides, c'est notre CREATE  :
if ($_POST) {
    if (
        isset($_POST['name']) && !empty($_POST['name'])
        && isset($_POST['email']) && !empty($_POST['email'])
        && isset($_POST['city']) && !empty($_POST['city'])
        && isset($_POST['password']) && !empty($_POST['password'])
    ) {
        // On nettoie les données envoyées :
        $name = strip_tags($_POST["name"]);
        $city = strip_tags($_POST["city"]);

        // On verfifie que le mail est bien un mail :
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            die("L'adresse email est incorrecte");
        }
        //Hasher mot de passe :
        $password = password_hash($_POST["password"], PASSWORD_ARGON2I);

        // On inclut la connexion à la base :
        require_once __DIR__ . '/../../../globalComponents/dbConnection/dbConnect.php';

        // Atres controles ? nom unique, mail unique, deux mot de passe identiques si nous mettons deux mot de passe par ex.

        // On enregistre en bdd
        $sql = "INSERT INTO `users` (`name`, `email`, `city`, `password`, `roles`) VALUES (:name, :email, :city, '$password', '[\"ROLE_USER\"]')";

        $query = $db->prepare($sql);

        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':email', $_POST["email"], PDO::PARAM_STR);
        $query->bindValue(':city', $city, PDO::PARAM_STR);

        $query->execute();

        // On connecte l'user ici aussi
        // On recupere lid du nouvelle user
        $id = $db->lastInsertId();

        // On stocke ds $_SESSION les ifos de user
        $_SESSION["user"] = [
            "id" => $id,
            "name" => $name,
            "city" => $city,
            "email" => $_POST["email"],
            "roles" => ["ROLE_USER"]
        ];

?>

        <div class="container mt-3 text-center">
            <div class="button">
                <p>Tu est inscrit maintenant ! &#127881;</p>
                <a href="/PROJET%20PERSO/account/account/account.php"><button type="button" class="btn btn-primary">Voir ton profil</button></a>
            </div>
        </div>

<?php
    }
}