<?php

// Supprimer variable $user, le deconecter : 
unset($_SESSION["user"]);
?>

<div class="container mt-3 text-center">

    <h3>Tu es delogé ! &#127881;</h3>

    <div class="button">
        <a href="/PROJET%20PERSO/recipes/recipes/index.php"><button type="button" class="btn btn-primary mt-2">Aller à la home</button></a>
    </div>
    
</div>