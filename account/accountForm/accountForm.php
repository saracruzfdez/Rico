<!-- Here we have the start page of the accountForm component, that matches with the "Tu est inscrit maintenant !" page :-->
<!DOCTYPE html>
<html lang="fr">

<!-- Here i have the required head of the "Tu est inscrit maintenant !" page :-->
<?php require_once __DIR__ . "/../../globalComponents/head.php"; ?>

<body>

    <?php
    // Here we have the differents components of the "Tu est inscrit maintenant !" page : 
    require_once __DIR__ . "/../../globalComponents/header.php";
    require_once __DIR__ . "/components/accountFormContent.php";
    require_once __DIR__ . "/../../globalComponents/footer.php"
    ?>
    <!-- Here i have the required scripts (to the correct functioning of Bootstrap Javascript) of the "Tu est inscrit maintenant !" page : -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>