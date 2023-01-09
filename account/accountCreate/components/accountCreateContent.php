<!-- Ici le formulaire pour créer son compte -->
<div class="d-flex justify-content-center">


<div class="col-md-8 col-lg-8 nopadding">

<div class="container mb-3 mt-3">

    <form action="/PROJET%20PERSO/account/accountForm/accountForm.php" method="POST">

        <h3>Inscrivez-vous</h3>

        <div class="form-group">
            <label for="name"  class="form-label mt-2">Nom :</label>
            <input class="form-control" name="name" type="text" id="name" required>
        </div>

        <div class="form-group">
            <label for="email" class="form-label mt-2">Email :</label>
            <input class="form-control" name="email" type="email" id="email" min="1" max="120" required>
        </div>

        <div class="form-group">
            <label for="city" class="form-label mt-2">Ville :</label>
            <input class="form-control" name="city" type="text" id="city" min="1" max="120" required>
        </div>

        <div class="form-group">
            <label for="password" class="form-label mt-2">Mot de passe : </label>
            <input class="form-control" name="password" type="password" id="password" min="1" max="1000" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">M'inscrire</button>

    </form>

</div>

</div>
</div>
