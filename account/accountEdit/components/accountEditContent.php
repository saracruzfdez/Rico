<!-- Here is the edit account form : -->
<?php
require_once __DIR__ . '/../../../globalComponents/sql.php';
// I call de function selectUserById() and pass it 
// the parameter id SESSION :
$user = selectUserById($_SESSION["user"]["id"]);
// $user has the result of selectUserById();
?>
<!-- If my sql query result exist and that it is not empty 
// show the connected user form with data. -->
<?php
if (isset($user)) { ?>
    <!-- Here the editform to update user -->
    <div class="d-flex justify-content-center">
        <div class="col-md-8 col-lg-8 nopadding">
            <div class="container mb-3 mt-3">

                <form action="/PROJET%20PERSO/account/accountFormEdit/accountFormEdit.php" method="POST">
                    <h3>Modifier votre profil</h3>

                    <div class="form-group">
                        <label for="name" class="form-label mt-2">Nom :</label>
                        <input class="form-control" name="name" type="text" id="name" value="<?php echo $user["name"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label mt-2">Email :</label>
                        <input class="form-control" name="email" type="text" id="email" min="1" max="120" value="<?php echo $user["email"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="city" class="form-label mt-2">Ville :</label>
                        <input class="form-control" name="city" type="text" id="city" min="1" max="120" value="<?php echo $user["city"] ?>" required>
                    </div>

                    <input type="hidden" name="id" value="<?php echo $user["id"] ?>" required>

                    <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>
                </form>

            </div>
        </div>
    </div>
<?php };
