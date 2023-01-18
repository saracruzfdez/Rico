<?php
// Here we do all the SQL queries :

function prepareRequest( $request ) {
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

    // We prepare the query :
    return $db->prepare($request);
}

// ACCOUNT :
// 1."selectUserById($id)" select, READ, all from the table users, with a parameter id :
function selectUserById($id)
{
    // We prepare the query :
    $query = prepareRequest("SELECT * FROM users WHERE id =:id");

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    // We execute the query :
    $query->execute();
    // We stocke the result in an array (with fetchAll() I take all the array content) :
    return $query->fetch();
}

function selectUserByEmail($email)
{
    // We prepare the query :
    $query = prepareRequest("SELECT * FROM users WHERE email =:email");

    $query->bindValue(':email', $email, PDO::PARAM_STR);
    // We execute the query :
    $query->execute();
    // We stocke the result in an array (with fetchAll() I take all the array content) :
    return $query->fetch();
}


function selectUsers()
{
    // We prepare the query :
    $query = prepareRequest("SELECT * FROM users");
    // We execute the query :
    $query->execute();
    // We stocke the result in an array (with fetchAll() I take all the array content) :
    $user = $query->fetchAll(PDO::FETCH_ASSOC);

    return $user;
}

// -----

// 2. deleteUser($id) DELETE un user :
function deleteUser($id)
{
    // We prepare the query :
    $query = prepareRequest("DELETE FROM users WHERE id =" . ($id));
    // I link with bindValue() values to parameters and specify the type :
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    // We execute the query :
    $query->execute();
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

    return $newUserId;
    // that i am going to use later...
}

// -----
// 4. updateUser() UPDATE an user :
function updateUser($id, $name, $email, $city)
{
    // We prepare the query :
    $query = prepareRequest("UPDATE `users` SET `name`=:name, `email`=:email, `city`=:city WHERE `id`=:id;");
    
    // I link with bindValue() values to parameters and specify the type :
    $query->bindValue('id', $id, PDO::PARAM_INT);
    $query->bindValue('name', $name, PDO::PARAM_STR);
    $query->bindValue('email', $email, PDO::PARAM_STR);
    $query->bindValue('city', $city, PDO::PARAM_STR);
    // We execute the query :
    $query->execute();
}

// 6. selectUsersExceptConnected() select all users except the connected user :
function selectUsersExceptConnected()
{
    // We prepare the query :
    $query2 = prepareRequest("SELECT * FROM users WHERE id !=" . ($_SESSION["user"]["id"]));
    // We execute the query :
    $query2->execute();
    // We stocke the result in an array (with fetchAll() I take all the array content) :
    $users = $query2->fetchAll(PDO::FETCH_ASSOC);

    return $users;
}

// CATEGORIES :
// 5. selectCategorie() SELECT all the categories :
function selectCategories()
{
    // We prepare the query :
    $query = prepareRequest("SELECT * FROM categories");
    // We execute the query :
    $query->execute();
    // We stocke the result in an array (with fetchAll() I take all the array content) :
    $categories = $query->fetchAll(PDO::FETCH_ASSOC);

    return $categories;
}

function createCategory($name)
{
    // We prepare the query :
    $query = prepareRequest("INSERT INTO `categories` (`name`) VALUES (:name);");
    // I link with bindValue() values to parameters and specify the type :
    $query->bindValue(':name', $name, PDO::PARAM_STR);
    // We execute the query :
    $query->execute();
}

function deleteCategory($id)
{
    // We prepare the query :
    $query = prepareRequest("DELETE FROM categories WHERE id =" . ($id));
    // I link with bindValue() values to parameters and specify the type :
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    // We execute the query :
    $query->execute();
}

function selectCategoryById($id)
{
    // We prepare the query :
    $query = prepareRequest("SELECT * FROM categories WHERE id =" . ($id));
    // We execute the query :
    $query->execute();
    // We stocke the result in an array (with fetchAll() I take all the array content) :
    return $query->fetch();
}

function updateCategory($id, $name)
{
    // We prepare the query :
    $query = prepareRequest("UPDATE `categories` SET `name`=:name WHERE `id`=:id;");
    
    // I link with bindValue() values to parameters and specify the type :
    $query->bindValue('id', $id, PDO::PARAM_INT);
    $query->bindValue('name', $name, PDO::PARAM_STR);
    // We execute the query :
    $query->execute();
}


// RECIPES
function selectRecipesByCategoryId( $categoryId ) {
    // We prepare the query :
    $query = prepareRequest("SELECT * FROM recipes WHERE recipes.category_id =" . $categoryId);
    // We execute the query :
    $query->execute();
    // We stocke the result in an array (with fetchAll() I take all the array content) :
    $recipes = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return $recipes;
}

function selectRecipeById( $id ) {
    // We prepare the query :
    $query = prepareRequest("SELECT * FROM recipes WHERE id =:id");
    $query->bindValue('id', $id, PDO::PARAM_INT);
    // We execute the query :
    $query->execute();
    // We stocke the result in an array (with fetchAll() I take all the array content) :
    return $query->fetch();
}

function selectRecipes()
{
    // We prepare the query :
    $query = prepareRequest("SELECT * FROM recipes");
    // We execute the query :
    $query->execute();
    // We stocke the result in an array (with fetchAll() I take all the array content) :
    $user = $query->fetchAll(PDO::FETCH_ASSOC);

    return $user;
}

