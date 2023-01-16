<!-- Here we have the data that comes from the accountCreate component ("Inscrivez-vous" form page), that matches with the "Tu est inscrit maintenant !" page and we create a new user -->
<?php
require_once __DIR__ . '/../../../globalComponents/sql.php';

// Here we check that the data is coming from accountCreate, set and not empty :
if ($_POST) {
    if (
        isset($_POST['name']) && !empty($_POST['name'])
        && isset($_POST['email']) && !empty($_POST['email'])
        && isset($_POST['city']) && !empty($_POST['city'])
        && isset($_POST['password']) && !empty($_POST['password'])
    ) {
        // Here we clean data. The strip_tags() delete all null octets nuls and all markup PHP and HTML from code :
        $name = strip_tags($_POST["name"]);
        $city = strip_tags($_POST["city"]);

        // We check that email is an email. filter_var() filters a variable with a specified filter :
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            die("L'adresse email a un format invalide");
        }
        //We hash the password here :
        $password = password_hash($_POST["password"], PASSWORD_ARGON2I);

        // And i create de new user avec the function createUser() :
        $newUserId = createUser($name, $password, $city);

        // On stocke ds $_SESSION les infos de user :
        $_SESSION["user"] = [
            "id" => $newUserId,
            "name" => $name,
            "city" => $city,
            "email" => $_POST["email"],
            "roles" => "[\"ROLE_USER\"]"
        ]; ?>

        <div class="container mt-3 text-center">
            <h3>Tu est inscrit maintenant ! &#127881;</h3>
            <div class="button">
                <a href="/PROJET%20PERSO/account/account/account.php"><button type="button" class="btn btn-primary mt-2">Voir ton profil</button></a>
            </div>
        </div>

<?php
    }
}
