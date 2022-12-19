<?php session_start() ?>

<!-- Ici notre header qui s'affichera sur chaque page du site -->
<header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container-fluid">

            <a class="navbar-brand" href="/PROJET%20PERSO/recipes/recipes/index.php">Rico</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-right" id="navbarColor01">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="/PROJET%20PERSO/categories/categories/categories.php">Catégories</a>
                    </li>

                    <!-- Si je ne suis pas connecté ni enregistré alors affiche : -->
                    <?php if (!isset($_SESSION["user"])) : ?>

                        <li class="nav-item">
                            <a class="nav-link" href="/PROJET%20PERSO/login/loginCreate/loginCreate.php">Connexion/Inscription</a>
                        </li>

                        <!-- Dans le cas conraire affiche : -->
                    <?php else : ?>

                        <li class="nav-item">
                            <a class="nav-link" href="/PROJET%20PERSO/personalSpace/personalSpace/personalSpace.php">Espace personnel</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/PROJET%20PERSO/account/account/account.php">Profil</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/PROJET%20PERSO/login/loginDelete/loginDelete.php">Deconnexion</a>
                        </li>

                    <?php endif; ?>

                </ul>

            </div>

        </div>

    </nav>

</header>