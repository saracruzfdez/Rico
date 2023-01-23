<!-- Here we get the data from the login form : -->
<?php if ($_POST) {
    if (
        isset($_POST['email']) && !empty($_POST['email'])
        && isset($_POST['password']) && !empty($_POST['password'])
    ) { // if we have a mail and a password :
        // We check that mail is a mail :
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            die("L'adresse email est incorrecte");
        }
        require_once __DIR__ . '/../../../globalComponents/sql.php';

        // I select user by email with $_POST["email"] on parameters. 
        // So i vérifie if i have this email in the database :
        $user = selectUserByEmail($_POST["email"]);

        if (!$user) {
            die("L'utilisateur est incorrect");
        }
        // Now we check password, password_verify verifies that 
        // a password matches a hash :
        if (!password_verify($_POST["password"], $user["password"])) {
            die("Le mot de passe est incorrect");
        }
        // We stocke in $_SESSION user data (we "coonect" it) :
        $_SESSION["user"] = [
            "id" => $user["id"],
            "name" => $user["name"],
            "email" => $user["email"],
            "city" => $user["city"],
            "roles" => $user["roles"]
        ]; ?>

        <div class="container mt-3 text-center">
            <h3>Tu es logé ! &#127881;</h3>
            <div class="button">
                <a href="/PROJET%20PERSO/account/account/account.php">
                    <button type="button" class="btn btn-primary mt-2">Voir ton profil</button>
                </a>
            </div>
        </div>
<?php
    }
}
