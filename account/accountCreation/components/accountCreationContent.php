<!-- Ici le formulaire pour créer son compte -->
<div class="container mb-3 mt-2">

    <form action="/PROJET%20PERSO/account/accountForm/accountForm.php" method="POST">

        <legend>Créeer un compte</legend>

        <div class="form-group">
            <label for="name" class="form-label mt-2">Nom :</label>
            <input class="form-control" name="name" type="text" id="name">
        </div>

        <div class="form-group">
            <label for="email" class="form-label mt-2">Email :</label>
            <input class="form-control" name="email" type="text" id="email" min="1" max="120">
        </div>

        <div class="form-group">
            <label for="city" class="form-label mt-2">Ville :</label>
            <input class="form-control" name="city" type="text" id="city" min="1" max="120">
        </div>

        <div class="form-group">
            <label for="password" class="form-label mt-2">Mot de passe : </label>
            <input class="form-control" name="password" type="number" id="password" min="1" max="1000">
        </div>

        <button type="submit" class="btn btn-primary mt-2">Créer mon compte</button>

    </form>

</div>