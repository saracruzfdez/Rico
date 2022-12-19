<?php

// Si je suis deconecté jy vais à la connexion
if (!isset($_SESSION["user"])) {
    header("Location: account/accountCreate/accountCreate.php");
    exit;
}

// Supprimer variable $user, le deconecter : 
unset($_SESSION["user"]);
?>

<div class="container mt-3 text-center">

    <div class="button">
        <p>Tu es delogé ! &#127881;</p>
        <a href="/PROJET%20PERSO/recipes/recipes/index.php"><button type="button" class="btn btn-primary">Aller à la home</button></a>
    </div>
    
</div>