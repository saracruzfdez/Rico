<!-- Ici notre modèle de carte de user résumée à afficher pour chaque user sur la page d'accueil : -->
<div class="card mb-3">

    <div class="card-body">
        <h5 class="card-title"><?php echo ucfirst($user['name']); ?></h5>
        <p class="bold">Email :</p>
        <p><?php echo ($user['email']); ?></p>
        <p class="bold">Ville :</p>
        <p><?php echo ($user['city']); ?></p>
        <p class="bold">Mot de passe :</p>
        <p><?php echo ($user['password']); ?></p>

        <div class="mt-3">
            <div class="button">
                <!-- Dans le lien "Modifier profil" je spécifie un query parameter id qui correspond au profil sur laquelle je me trouve depuis la page compte (requête HTTP) : -->
                <a href="/PROJET%20PERSO/accountFiles/accountEdition/accountEdition.php?id=<?php echo ($user['id']); ?>" class="btn btn-primary">Editer compte</a>
            </div>

            <div class="button">
                <!-- Dans le lien "Supprimer compte" je spécifie un query parameter id qui correspond au profil sur laquelle je me trouve depuis la page compte (requête HTTP) : -->
                <a href="/PROJET%20PERSO/accountFiles/accountDelete/accountDelete.php?id=<?php echo ($user['id']); ?>" class="btn btn-primary">Supprimer compte</a>
            </div>
        </div>

    </div>

</div>