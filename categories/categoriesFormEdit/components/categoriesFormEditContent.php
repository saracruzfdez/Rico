<!-- Ici le contenu de la page account form (on récupère les données) : -->
<?php

// On vérifie qu'il y a des données qui arrivent, que les champs sont remplis et pas vides, c'est notre UPDATE  :
if ($_POST) {
    if (
        isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['name']) && !empty($_POST['name'])

    ) {
        // On inclut la connexion à la base :
        require_once __DIR__ . '/../../../globalComponents/sql.php';

        updateCategory($_POST["id"], $_POST["name"])
       
?>

        <div class="container mt-3 text-center">

            <h3>La catégorie a été modifiée ! &#127881;</h3>

            <div class="button">
                <a href="/PROJET%20PERSO/categories/categories/categories.php"><button type="button" class="btn btn-primary mt-2">Voir categories</button></a>
            </div>

        </div>

<?php
    }
}