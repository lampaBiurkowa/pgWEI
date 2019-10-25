const CHOSEN_TEAMS_STORAGE_NAME = "chosen";
const TEAMS_COUNT = 18;
var activated = false;
var teams = ["Gryf Słupsk", "Arka II Gdynia", "GKS Przodkowo", "Kaszubia Kościerzyna",
"Stolem Gniewino", "Powiśle Dzierzgoń", "Lechia II Gdańsk", "Pogoń Lębork",
"Wierzyca Pelplin", "Cartusia Kartuzy", "Wda Lipusz", "GKS Kowale",
"Gwiazda Karsin", "Wikęd Luzino", "Gedania Gdańsk", "Jantar Ustka",
"Jaguar Gdańsk", "Lipniczanka Lipnica"];

function generateForm()
{
    var html = "";
    for (var i = 0; i < TEAMS_COUNT; i++)
        html += "<button class=\"chooseTeamButton\" onclick=\"chooseTeam(" + i + ")\"> " + teams[i] + " </button><br/>";

    return html;
}

function choose()
{
    if (!activated)
        activated = true;
    else
        return;

    var element = document.createElement("div");
    var idAttr = document.createAttribute("id");
    idAttr.value = "chosenTeams";
    element.setAttributeNode(idAttr);
    element.innerHTML = "Wybrano: <span id=\"chosenData\">" + getChosenTeams().length + "</span><br/>" + generateForm();

    var parent = document.getElementById("choosingArea");
    parent.appendChild(element);
}

function getChosenTeams()
{
    var value;
    if (sessionStorage.getItem(CHOSEN_TEAMS_STORAGE_NAME))
        value = sessionStorage.getItem(CHOSEN_TEAMS_STORAGE_NAME);

    return value ? value.split(",") : [];
}

function chooseTeam(teamId)
{
    var teams = getChosenTeams();
    if (teams.length >= 3)
        return;

    teams.push(teamId);
    sessionStorage.setItem(CHOSEN_TEAMS_STORAGE_NAME, arrayToStr(teams));
    updateChosenTeamsData();
}

function arrayToStr(array)
{
    var dataToSave = "";
    for (var i = 0; i < array.length; i++)
        if (i != array.length - 1)
            dataToSave += array[i] + ",";
        else
            dataToSave += array[i];

    return dataToSave;
}

function updateChosenTeamsData()
{
    var element = document.getElementById("chosenData");
    if (!element)
        return;

    var teams = getChosenTeams();
    element.innerHTML = arrayToStrWithTeamNames(teams);
}

function arrayToStrWithTeamNames(array)
{
    var dataToSave = "";
    for (var i = 0; i < array.length; i++)
        if (i != array.length - 1)
            dataToSave += teams[array[i]] + ",";
        else
            dataToSave += teams[array[i]];

    return dataToSave;
}