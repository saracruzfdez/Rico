 <?php
    try {
        // Connexion à la base :
        // Attention à la syntaxe 'mysql:host=localhost:8889;dbname=Rico', pas de espace, sinon erreur "not find driver" :
        $db = new PDO('mysql:host=localhost:8889;dbname=Rico', 'root', 'root');

        // Permets d'avoir les échanges qui vont se faire dans la base de données :
        $db->exec('SET NAMES "UTF8"');
    } catch (PDOException $e) {

        // Imprime le message d'erreur stocké dans $e si la connexion échoue :
        echo 'Erreur : ' . $e->getMessage();

        // Arrête l'exécution de la suite :
        die();
    }
    ?>