<?php
// Here we do all the SQL queries :

// ACCOUNT :
// 1."selectUser($id)" select, READ, all from the table users, with a parameter id :
function selectUser($id)
{

    try {
        // We connect to the database, server :
        $db = new PDO('mysql:host=localhost:8889;dbname=Rico', 'root', 'root');
        // We configurate how PDO bring to us the information about errors :
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Allow the exchanges in the database :
        $db->exec('SET NAMES "UTF8"');
    } catch (PDOException $e) {
        // Prints a error message stocked at $e if connection is not working :
        echo 'Erreur : ' . $e->getMessage();
        // Stops script :
        die();
    }

    $sql = "SELECT * FROM users WHERE id =" . ($id);
    // We prepare the query :
    $query = $db->prepare($sql);
    // We execute the query :
    $query->execute();
    // We stocke the result in an array (with fetchAll() I take all the array content) :
    $user = $query->fetchAll(PDO::FETCH_ASSOC);

    // Stops de connection to the db :
    $db = null;

    return $user;
};

// -----

// 2. deleteUser($id) DELETE un user :
function deleteUser($id)
{
    try {
        // We connect to the database, server :
        $db = new PDO('mysql:host=localhost:8889;dbname=Rico', 'root', 'root');
        // We configurate how PDO bring to us the information about errors :
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Allow the exchanges in the database :
        $db->exec('SET NAMES "UTF8"');
    } catch (PDOException $e) {
        // Prints a error message stocked at $e if connection is not working :
        echo 'Erreur : ' . $e->getMessage();
        // Stops script :
        die();
    }

    // Query sql to DELETE in the database, the DELETE (CRUD) :
    $sql = "DELETE FROM users WHERE id =" . ($id);

    // We prepare the query :
    $query = $db->prepare($sql);
    // I link with bindValue() values to parameters and specify the type :
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    // We execute the query :
    $query->execute();

    // Stops de connection to the db :
    $db = null;
};

// -----

// 3. createUser() CREATE a new user and return son id :
function createUser($name, $password, $city)
{
    try {
        // We connect to the database, server :
        $db = new PDO('mysql:host=localhost:8889;dbname=Rico', 'root', 'root');
        // We configurate how PDO bring to us the information about errors :
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Allow the exchanges in the database :
        $db->exec('SET NAMES "UTF8"');
    } catch (PDOException $e) {
        // Prints a error message stocked at $e if connection is not working :
        echo 'Erreur : ' . $e->getMessage();
        // Stops script :
        die();
    }

    // Query sql to insert in de database, the CREATE (CRUD) :
    $sql = "INSERT INTO `users` (`name`, `email`, `city`, `password`, `roles`) VALUES (:name, :email, :city, '$password', '[\"ROLE_USER\"]')";
    // We prepare the query :
    $query = $db->prepare($sql);
    // I link with bindValue() values to parameters and specify the type :
    $query->bindValue(':name', $name, PDO::PARAM_STR);
    $query->bindValue(':email', $_POST["email"], PDO::PARAM_STR);
    $query->bindValue(':city', $city, PDO::PARAM_STR);
    // We execute the query :
    $query->execute();
    // I get the new user id :
    $newUserId = $db->lastInsertId();

    // Stops de connection to the db :
    $db = null;

    return $newUserId;
    // that i am going to use later...
}

// -----
// 4. updateUser() UPDATE an user :
function updateUser($id, $name, $email, $city)
{
    try {
        // We connect to the database, server :
        $db = new PDO('mysql:host=localhost:8889;dbname=Rico', 'root', 'root');
        // We configurate how PDO bring to us the information about errors :
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Allow the exchanges in the database :
        $db->exec('SET NAMES "UTF8"');
    } catch (PDOException $e) {
        // Prints a error message stocked at $e if connection is not working :
        echo 'Erreur : ' . $e->getMessage();
        // Stops script :
        die();
    }

    // Query sql to update in de database, the UPDATE (CRUD) :
    $sql = "UPDATE `users` SET `name`=:name, `email`=:email, `city`=:city WHERE `id`=:id;";
    // We prepare the query :
    $query = $db->prepare($sql);
    // I link with bindValue() values to parameters and specify the type :
    $query->bindValue('id', $id, PDO::PARAM_INT);
    $query->bindValue('name', $name, PDO::PARAM_STR);
    $query->bindValue('email', $email, PDO::PARAM_STR);
    $query->bindValue('city', $city, PDO::PARAM_STR);
    // We execute the query :
    $query->execute();

    // Stops de connection to the db :
    $db = null;
}

// CATEGORIES :
// 5. selectCategorie() SELECT all the categories :
function selectCategorie()
{
    try {
        // We connect to the database, server :
        $db = new PDO('mysql:host=localhost:8889;dbname=Rico', 'root', 'root');
        // We configurate how PDO bring to us the information about errors :
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Allow the exchanges in the database :
        $db->exec('SET NAMES "UTF8"');
    } catch (PDOException $e) {
        // Prints a error message stocked at $e if connection is not working :
        echo 'Erreur : ' . $e->getMessage();
        // Stops script :
        die();
    }

    $sql = "SELECT * FROM categories";
    // We prepare the query :
    $query = $db->prepare($sql);
    // We execute the query :
    $query->execute();
    // We stocke the result in an array (with fetchAll() I take all the array content) :
    $categories = $query->fetchAll(PDO::FETCH_ASSOC);

    // Stops de connection to the db :
    $db = null;

    return $categories;
}

// 6. selectUsersExceptConnected() select all users except the connected user :
function selectUsersExceptConnected()
{
    try {
        // We connect to the database, server :
        $db = new PDO('mysql:host=localhost:8889;dbname=Rico', 'root', 'root');
        // We configurate how PDO bring to us the information about errors :
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Allow the exchanges in the database :
        $db->exec('SET NAMES "UTF8"');
    } catch (PDOException $e) {
        // Prints a error message stocked at $e if connection is not working :
        echo 'Erreur : ' . $e->getMessage();
        // Stops script :
        die();
    }

    $sql2 = "SELECT * FROM users WHERE id !=" . ($_SESSION["user"]["id"]);
    // We prepare the query :
    $query2 = $db->prepare($sql2);
    // We execute the query :
    $query2->execute();
    // We stocke the result in an array (with fetchAll() I take all the array content) :
    $users = $query2->fetchAll(PDO::FETCH_ASSOC);

    // Stops de connection to the db :
    $db = null;

    return $users;
}
