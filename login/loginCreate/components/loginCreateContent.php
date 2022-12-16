<!-- Ici le formulaire pour créer son compte -->
<div class="container mb-3 mt-2">

    <form action="/PROJET%20PERSO/login/loginForm/loginForm.php" method="POST">

        <legend>Connectez-vous</legend>

        <div class="form-group">
            <label for="email" class="form-label mt-2">Email :</label>
            <input class="form-control" name="email" type="text" id="email" min="1" max="120" required>
        </div>

        <div class="form-group">
            <label for="password" class="form-label mt-2">Mot de passe : </label>
            <input class="form-control" name="password" type="password" id="password" min="1" max="1000" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Me connecter</button>

    </form>

    <div class="mt-3">
        <legend>Pas encore inscrit ?</legend>
    </div>

    <a href="/PROJET%20PERSO/account/accountCreate/accountCreate.php" class="btn btn-primary mt-2">M'inscrire</a>

</div>