<!-- Here we have the data that comes from the accountDelete component ("Voulez vous supprimer votrez compte ?" form page), that matches with the "Ton compte a été supprimé !" page and we delete the user -->
<?php
require_once __DIR__ . '/../../../globalComponents/sql.php';

    // I call de function deleteUser() and pass it the parameter id SESSION :
    deleteUser($_SESSION["user"]["id"]);

    // And then i disconnect the user : 
    unset($_SESSION["user"]);

    // Redirection to homepage and exit (script) :
    header("Location: http://localhost:8888/PROJET%20PERSO/recipes/recipes/index.php"); 
    exit;
?>