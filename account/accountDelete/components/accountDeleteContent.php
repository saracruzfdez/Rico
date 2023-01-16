<!-- Here is the delete account form : -->
<?php
require_once __DIR__ . '/../../../globalComponents/sql.php';

// I call de function selectUser() and pass it the parameter id SESSION :
$user = selectUser($_SESSION["user"]["id"]);
// $user has the result of selectUser();
?>

<!-- If my sql query result exist and that it is not empty we ask the user if he/she really wants to deletete account. Otherwise a "Ce user n'existe pas !" message appears -->
<?php
if (isset($user) && !empty($user)) { ?>

    <div class="container mb-3 mt-3 text-center">

        <form action="/PROJET%20PERSO/account/accountFormDelete/accountFormDelete.php" method="POST">
            <h3>Vous êtes sûr que vous voulez supprimer votre compte ?</h3>
            <button type="submit" class="btn btn-primary mt-2">Supprimer</button>
        </form>

    </div>

<?php } else { ?>

    <div id="image-text">
        <div id="text">
            <p>Ce user n'existe pas !</p>
        </div>
        <div id="image">
            <img src="https://images.unsplash.com/photo-1604739220152-cca43b1e7fe8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8ZW1wdHklMjBkaXNoZXN8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="">
        </div>
    </div>

<?php
};