<!-- Here we have the data that comes from the accountEdit component ("Modifier COMPTE" form page), that matches with the "Ton compte a été modifié !" page -->
<?php
require_once __DIR__ . '/../../../globalComponents/sql.php';

// Here we check that the data is coming from accountEdit, set and not empty :
if ($_POST) {
    if (
        isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['name']) && !empty($_POST['name'])
        && isset($_POST['email']) && !empty($_POST['email'])
        && isset($_POST['city']) && !empty($_POST['city'])
    ) {

        // Here we clean data. The strip_tags() delete all null octets nuls and all markup PHP and HTML from code :
        $id = strip_tags($_POST["id"]);
        $name = strip_tags($_POST["name"]);
        $email = strip_tags($_POST["email"]);
        $city = strip_tags($_POST["city"]);

        // We check that email is an email. filter_var() filters a variable with a specified filter :
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            die("L'adresse email a un format invalide");
        }
        updateUser($id, $name, $email, $city)
?>

        <div class="container mt-3 text-center">
            <h3>Ton compte a été modifiée ! &#127881;</h3>
            <div class="button">
                <a href="/PROJET%20PERSO/account/account/account.php"><button type="button" class="btn btn-primary mt-2">Voir compte</button></a>
            </div>
        </div>

<?php
    }
}
