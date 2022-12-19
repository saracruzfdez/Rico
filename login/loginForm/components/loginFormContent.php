<!-- Ici le contenu de la page login form (on récupère les données) : -->
<?php

// Si je suis conecté ne pas aller ds inscription
if (isset($_SESSION["user"])) {
    header("Location: account/account/account.php");
    exit;
}

// On vérifie qu'il y a des données qui arrivent, que les champs sont remplis et pas vides, c'est notre CREATE  :
if ($_POST) {
    if (
        isset($_POST['email']) && !empty($_POST['email'])
        && isset($_POST['password']) && !empty($_POST['password'])
    ) {

        // On verfifie que le mail est bien un mail :
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            die("L'adresse email est incorrecte");
        }

        // On inclut la connexion à la base :
        require_once __DIR__ . '/../../../globalComponents/dbConnection/dbConnect.php';

        $sql = "SELECT * FROM `users` WHERE `email` = :email";

        $query = $db->prepare($sql);

        $query->bindValue(':email', $_POST["email"], PDO::PARAM_STR);

        $query->execute();

        $user = $query->fetch();

        if (!$user) {
            die("L'utilisateur et ou le mdp est incorrect");
        }
        // Ici on a un user existant, on peut vérifier le mot de passe :
        if (!password_verify($_POST["password"], $user["password"])) {
            die("L'utilisateur et ou le mdp est incorrect");
        }

        // Ici lutilisateur et le mdp sont ok.
        // On va pouvoir "connecter" l'user :     

        // On stocke ds $_SESSION les ifos de user
        $_SESSION["user"] = [
            "id" => $user["id"],
            "name" => $user["name"],
            "email" => $user["email"],
            "city" => $user["city"],
            "roles" => $user["roles"]
        ];
?>

        <div class="container mt-3 text-center">
            <div class="button">
                <p>Tu es logé ! &#127881;</p>
                <a href="/PROJET%20PERSO/account/account/account.php"><button type="button" class="btn btn-primary">Voir ton profil</button></a>
            </div>
        </div>

<?php
    }
}
