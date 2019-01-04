import $ from 'jquery'

function init() {
    const searchBar = $('#searchBar');

    searchBar.on('keyup', () => {
        const value = searchBar.get(0).value;
        if (shouldSearch(value))
            ajaxGetAllRecipes(value);
        else {
            const listGroup = $('nav>div>form>div.list-group');
            listGroup.empty();
        }
    });
}

function shouldSearch(searchBarValue) {
    return searchBarValue.length > 2
}

function ajaxGetAllRecipes(searchBarValue) {
    $.ajax({
        url: "../model/trigger/getAllRecipesTrigger.php",
        type: 'POST'
    }).done((data) => {
        manageSuggestions(data, searchBarValue);
    });
}

function searchMatchingRecipes(data, searchBarValue) {
    const matchRecipes = [];
    searchBarValue = searchBarValue.toLowerCase();

    data.forEach((recipe) => {
        const recipeName = recipe[0].toLowerCase();
        if(recipeName.indexOf(searchBarValue) !== -1)
            matchRecipes.push(recipeName);
    });
    if(matchRecipes.length)
        return matchRecipes;
    else
        return false;
}

function manageSuggestions(data, searchBarValue) {
    if (!shouldSearch(searchBarValue))
        return;

    const parsedData = JSON.parse(data);
        if (parsedData) {
        const recipes = searchMatchingRecipes(parsedData, searchBarValue);
        if (recipes)
            addRecipesToSuggestions(recipes);
        else
            addNoSuggestions();
        setHidingListener();
    }
}

function addRecipesToSuggestions(recipes) {
    const suggestions = $('nav>div>form>div.list-group');
    suggestions.empty();
    recipes.forEach((recipe) => {
        if(suggestions.children().length < 10) {
            const newLine = document.createElement('a');
            $(newLine).attr('class', 'list-group-item list-group-item-action');
            $(newLine).attr('href', './recipe?recipe='+recipe);
            $(newLine).html(recipe);

            suggestions.append(newLine)
        }
    })
}


function addNoSuggestions() {
    const suggestions = $('nav>div>form>div.list-group');
    suggestions.empty();

    const newLine = document.createElement('a');
    $(newLine).attr('class', 'list-group-item list-group-item-action');
    $(newLine).html('Aucun résultat :(');

    suggestions.append(newLine)
}

function setHidingListener() {
    const listGroup = $('nav>div>form>div.list-group');

    $('html').click(function() {
        listGroup.empty()
    });

    listGroup.click(function(event){
        event.stopPropagation();
    });

    listGroup.click(function(event){
        event.stopPropagation();
    });
}

init();

