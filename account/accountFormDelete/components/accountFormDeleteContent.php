<!-- Ici le contenu de la page form delete (on récupère les données) : -->
<?php
// On vérifie qu'il y a des données qui arrivent, que les champs sont remplis et pas vides, c'est notre DELETE :
if ($_POST) {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // On inclut la connexion à la base :
        require_once __DIR__ . '/../../../globalComponents/dbConnection/dbConnect.php';

        // On nettoie les données envoyées :
        $id = strip_tags($_POST["id"]);

        $sql = "DELETE FROM users WHERE id = :id";

        $query = $db->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();

        // On inclut la déconnexion à la base :
        require_once  __DIR__ . "/../../../globalComponents/dbConnection/dbClose.php";
?>

        <div class="container mt-3 text-center">

            <div class="button">
                <p>Ton compte a été supprimée &#127881;</p>
                <a href="/PROJET%20PERSO/account/account/account.php"><button type="button" class="btn btn-primary">Voir ??</button></a>
            </div>

        </div>

<?php
    }
}