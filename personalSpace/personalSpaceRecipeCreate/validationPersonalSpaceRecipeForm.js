/* Je recupere l'elem form par l'id */
var personalSpaceRecipeCreate = document.getElementById('personalSpaceRecipeCreate');

/* J'ajoute un evenement à la sumision de mon formulaire */
personalSpaceRecipeCreate.addEventListener('submit', function (e) {

    /* Validation du titre */
    /* Je recupere mon premier input "titre" avec son id "title" */
    let myTitle = document.getElementById('title');

    /* myTitle acepts a-z low and uppercase, accents and spaces */
    let myTitleRegex = /^[a-zàâçéèêëîïôûùüÿñæœ\s]+$/i;

    /* Si myTitle est vide (avec trim je retire les espaces vides du debut et fin du text) alors on arrete le comportement par defaut de la sumission avec preventdefault : */
    if (myTitle.value.trim() == "") {

        e.preventDefault();

        /* si myTitle ne passe pas le test de myTitleRegex alors la sumission s'arrete et message d'erreur */
    } else if (myTitleRegex.test(myTitle.value) == false) {

        let myTitleError = document.getElementById('titleError');
        myTitleError.innerHTML = "Le titre doit comporter des lettres et des espaces uniquement."
        myTitleError.style.color = "maroon"
        e.preventDefault();

    }

    /* Validation du nombre de personnes */
    /* Je recupere mon input "nombre de personnes" avec son id "persons" */
    let persons = document.getElementById('persons');

    /* persons acepts 0-9 numbers */
    let myPersonsRegex = /^[0-9]+$/;

    if (persons.value.trim() == "") {

        e.preventDefault();

    } else if (myPersonsRegex.test(persons.value) == false) {

        let myPersonsError = document.getElementById('personsError');
        myPersonsError.innerHTML = "Ce champ doit comporter des chiffres uniquement."
        myPersonsError.style.color = "maroon"
        e.preventDefault();

    }

    /* Validation du nombre de minutes, temps */
    /* Je recupere mon input "temps" avec son id "time" */
    let time = document.getElementById('time');

    /* time acepts 0-9 numbers */
    let myTimeRegex = /^[0-9]+$/;

    if (time.value.trim() == "") {

        e.preventDefault();

    } else if (myTimeRegex.test(time.value) == false) {

        let myTimeError = document.getElementById('timeError');
        myTimeError.innerHTML = "Ce champ doit comporter des chiffres uniquement."
        myTimeError.style.color = "maroon"
        e.preventDefault();

    }

    /* Validation de l'input ingredients */
    /* Je recupere mon input "ingredients" avec son id "ingredients" */
    let ingredients = document.getElementById('ingredients');

    /* ingredients acepts 0-9 numbers, a-z low and uppercase, accents, hyphens, coma, dots ans spaces */
    let myIngredientsRegex = /^[a-zàâçéèêëîïôûùüÿñæœ0-9-,.\s]+$/i;

    if (ingredients.value.trim() == "") {

        e.preventDefault();

    } else if (myIngredientsRegex.test(ingredients.value) == false) {

        let myIngredientsError = document.getElementById('ingredientsError');
        myIngredientsError.innerHTML = "Ce champ doit comporter des chiffres, des lettres, des tirets, des virgules, des points et des espaces uniquement."
        myIngredientsError.style.color = "maroon"
        e.preventDefault();

    }

    /* Validation de l'input recette */
    /* Je recupere mon input "recette" avec son id "recipe" */
    let recipe = document.getElementById('recipe');

    /* ingredients acepts 0-9 numbers, a-z low and uppercase, accents, hyphens, coma, dots ans spaces */
    let myRecipeRegex = /^[a-zàâçéèêëîïôûùüÿñæœ0-9-,.\s]+$/i;

    if (recipe.value.trim() == "") {

        e.preventDefault();

    } else if (myRecipeRegex.test(recipe.value) == false) {

        let myRecipeError = document.getElementById('recipeError');
        myRecipeError.innerHTML = "Ce champ doit comporter des chiffres, des lettres, des tirets, des virgules, des points et des espaces uniquement."
        myRecipeError.style.color = "maroon"
        e.preventDefault();

    }

    /* Validation de l'input image */
    /* Je recupere mon input "image" avec son id "recipe" */
    let image = document.getElementById('img');

    /* recipe acepts 0-9 numbers, a-z low and uppercase, hyphens ans spaces */
    let myImageRegex = /^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+$/gm;

    if (image.value.trim() == "") {

        e.preventDefault();

    } else if (myImageRegex.test(image.value) == false) {

        let myImageError = document.getElementById('imageError');
        myImageError.innerHTML = "Ce champ doit comporter une URL valide uniquement."
        myImageError.style.color = "maroon"
        e.preventDefault();

    }

})