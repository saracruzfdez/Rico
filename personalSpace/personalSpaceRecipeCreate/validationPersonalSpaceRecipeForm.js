/* I take the form elelement by its id : */
var personalSpaceRecipeCreate = document.getElementById('personalSpaceRecipeCreate');

function isValidUrl( url ) {
    try {
        let t = new URL(url)
        return true
    } catch (err){
        return false
    }
}

/* I add an eventListener on submit */
personalSpaceRecipeCreate.addEventListener('submit', function (e) {


    /* Title Validation */
    /* Firstly I take the title by its id : */
    let myTitle = document.getElementById('title');

    /* With a pattern, regex, myTitle acepts a-z low and uppercase, 
    accents and spaces */
    let myTitleRegex = /^[a-zàâçéèêëîïôûùüÿñæœ\s]+$/i;

    /* if myTitle is empty (trim remove empty start/end string spaces) 
    i stop the default behaviour of submit with preventdefault() : */
    if (myTitle.value.trim() == "") {

        e.preventDefault();

        /* if myTitle doesn't validate myTitleRegex test, the submit 
        don't work and an error/info message appears */
    } else if (myTitleRegex.test(myTitle.value) == false) {

        let myTitleError = document.getElementById('titleError');
        myTitleError.innerHTML = "Le titre doit comporter des lettres et des espaces uniquement."
        myTitleError.style.color = "maroon"
        e.preventDefault();
    }


    /* number of persons Validation */
    /* Firstly I take the number of persons by its id : */
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


    /* Time Validation */
    /* Firstly I take the time by its id : */
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


    /* Ingredients Validation */
    /* Firstly I take the ingrediets by its id : */
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


    /* recipe Validation */
    /* Firstly I take the recipe by its id : */
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


    /* image Validation */
    /* Firstly I take the image by its id : */
    let image = document.getElementById('img');

    if (image.value.trim() == "") {

        e.preventDefault();

    } else if (isValidUrl(image.value) == false) {

        let myImageError = document.getElementById('imageError');
        myImageError.innerHTML = "Ce champ doit comporter une URL valide uniquement."
        myImageError.style.color = "maroon"
        e.preventDefault();
    }
})