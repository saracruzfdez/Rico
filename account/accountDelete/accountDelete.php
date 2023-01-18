<!-- Here we have the start page of the accountDelete component, that matches with the "Etes vous sur de supprimer votre compte" form page :-->
<!DOCTYPE html>
<html lang="fr">

<!-- Here i have the required head of the "Etes vous sur de supprimer votre compte" form page :-->
<?php require_once __DIR__ . "/../../globalComponents/head.php"; ?>

<body>
    <?php
    // Here we have the differents components of the "Etes vous sur de supprimer votre compte" form page : 
    require_once __DIR__ . "/../../globalComponents/header.php";
    require_once __DIR__ . "/components/accountDeleteContent.php";
    require_once __DIR__ . "/../../globalComponents/footer.php"
    ?>
    <!-- Here i have the required scripts (to the correct functioning of Bootstrap Javascript) of the "Etes vous sur de supprimer votre compte" form page : -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>