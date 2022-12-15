<!-- Ici le contenu de la page account form (on récupère les données) : -->
<?php

// On vérifie qu'il y a des données qui arrivent, que les champs sont remplis et pas vides, c'est notre CREATE  :
if ($_POST) {
    if (
        isset($_POST['name']) && !empty($_POST['name'])
        && isset($_POST['email']) && !empty($_POST['email'])
        && isset($_POST['city']) && !empty($_POST['city'])
        && isset($_POST['password']) && !empty($_POST['password'])
    ) {
        // On inclut la connexion à la base :
        require_once __DIR__ . '/../../../globalComponents/dbConnection/dbConnect.php';

        // On nettoie les données envoyées :
        $name = strip_tags($_POST["name"]);
        $email = strip_tags($_POST["email"]);
        $city = strip_tags($_POST["city"]);
        $password = strip_tags($_POST["password"]);

        $sql = "INSERT INTO `users` (`name`, `email`, `city`, `password`) VALUES (:name, :email, :city, :password);";
        // INSERT INTO `users` (`name`, `email`, `city`, `password`) VALUES ("Bob", "email@email.fr", "Villa", 555) marche bien

        $query = $db->prepare($sql);

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
                <p>Tu est logé ! &#127881;</p>
                <a href="/PROJET%20PERSO/login/login/login.php"><button type="button" class="btn btn-primary">Voir ??</button></a>
            </div>
        </div>

<?php
    } 
}




