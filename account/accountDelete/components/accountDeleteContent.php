<!-- Here is the delete account form : -->
<?php
require_once __DIR__ . '/../../../globalComponents/sql.php';

// I call de function selectUserById() and pass it the parameter id SESSION :
$user = selectUserById($_SESSION["user"]["id"]);
// $user has the result of selectUserById();
?>

<!-- If my sql query result exist and that it is not empty we ask the user if he/she really wants to deletete account. Otherwise a "Ce user n'existe pas !" message appears -->
<?php
if (isset($user)) { ?>

    <div class="container mb-3 mt-3 text-center">
        <form action="/PROJET%20PERSO/account/accountFormDelete/accountFormDelete.php" method="POST">
            <h3>Vous êtes sûr que vous voulez supprimer votre compte ?</h3>
            <button type="submit" class="btn btn-primary mt-2">Supprimer</button>
        </form>
    </div>

<?php } 