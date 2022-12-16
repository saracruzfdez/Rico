<?php
// Supprimer variable $user, le deconecter : 
unset($_SESSION["user"]);

header("Location: index.php");