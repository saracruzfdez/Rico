<!-- Here we have the start page of the accountFormEdit component, that matches with the "Ton compte est modifié !" page :-->
<!DOCTYPE html>
<html lang="fr">

<!-- Here i have the required head of the "Ton compte est modifié !" page :-->
<?php require_once __DIR__ . "/../../globalComponents/head.php"; ?>

<body>
    <?php
    // Here we have the differents components of the "Ton compte est modifié !" page : 
        require_once __DIR__ . "/../../globalComponents/header.php";
    require_once __DIR__ . "/components/accountFormEditContent.php";
    require_once __DIR__ . "/../../globalComponents/footer.php"
    ?>
    <!-- Here i have the required scripts (to the correct functioning of Bootstrap Javascript) of the "Ton compte est supprimé !" page : -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>