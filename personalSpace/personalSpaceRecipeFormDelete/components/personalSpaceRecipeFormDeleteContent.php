<!-- Ici le contenu de la page form delete (on récupère les données) : -->
<?php
// On vérifie qu'il y a des données qui arrivent, que les champs sont remplis et pas vides, c'est notre DELETE :
if ($_POST) {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // On inclut la connexion à la base :
        require_once __DIR__ . '/../../../globalComponents/sql.php';

        deleteRecipe(strip_tags($_POST["id"]))

?>

        <div class="container mt-3 text-center">

            <h3>Ta recette a été supprimée dans ton espace personnel ! &#127881;</h3>

            <div class="button">
                <a href="/PROJET%20PERSO/personalSpace/personalSpace/personalSpace.php"><button type="button" class="btn btn-primary mt-2">Voir espace personnel</button></a>
            </div>

        </div>

<?php

    }
}
