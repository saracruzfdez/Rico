<?php
// And then i disconnect the user : 
unset($_SESSION["user"]);

// Redirection to homepage and exit (script) :
header("Location: http://localhost:8888/PROJET%20PERSO/recipes/recipes/index.php"); 
exit;