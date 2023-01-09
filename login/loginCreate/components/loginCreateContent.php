<!-- Ici le formulaire pour créer son compte -->
<div class="d-flex justify-content-center">


<div class="col-md-8 col-lg-8 nopadding">

<div class="container mb-3 mt-3">

    <form action="/PROJET%20PERSO/login/loginForm/loginForm.php" method="POST">

        <h3>Connectez-vous</h3>

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
        <h3>Pas encore inscrit ?</h3>
    </div>

    <a href="/PROJET%20PERSO/account/accountCreate/accountCreate.php" class="btn btn-primary mt-2">M'inscrire</a>

</div>

</div>
</div>
