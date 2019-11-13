const CHOSEN_TEAMS_STORAGE_NAME = "chosen";
const TEAMS_COUNT = 18;
const MAX_TEAMS_TO_CHOOSE = 3;

var chooseTeamFormActivated = false;
var teamNames = ["Gryf Słupsk", "Arka II Gdynia", "GKS Przodkowo", "Kaszubia Kościerzyna",
"Stolem Gniewino", "Powiśle Dzierzgoń", "Lechia II Gdańsk", "Pogoń Lębork",
"Wierzyca Pelplin", "Cartusia Kartuzy", "Wda Lipusz", "GKS Kowale",
"Gwiazda Karsin", "Wikęd Luzino", "Gedania Gdańsk", "Jantar Ustka",
"Jaguar Gdańsk", "Lipniczanka Lipnica"];

$(document).ready(
function init()
{
    var element = document.createElement("button");

    var onclickAttr = document.createAttribute("onclick");
    onclickAttr.value = "choose()";
    element.setAttributeNode(onclickAttr);

    var classAttr = document.createAttribute("class");
    classAttr.value = "commonButton";
    element.setAttributeNode(classAttr);

    element.innerHTML = "Wybierz " + MAX_TEAMS_TO_CHOOSE + " zespoły do zapisania w pamięci sesji";

    var parent = document.getElementById("choosingArea");
    parent.appendChild(element); 
});

function choose()
{
    if (!chooseTeamFormActivated)
        chooseTeamFormActivated = true;
    else
        return;

    var element = document.createElement("div");
    var idAttr = document.createAttribute("id");
    idAttr.value = "chosenTeams";
    element.setAttributeNode(idAttr);
    element.innerHTML = getChosenTeamsDivInnerHTML();

    var parent = document.getElementById("choosingArea");
    parent.appendChild(element);
}

function getChosenTeamsDivInnerHTML()
{
    var innerHTML;
    var chosenTeams = getChosenTeams();
    if (chosenTeams.length == 0)
        innerHTML = "<span id=\"chosenData\">Nie wybrano zespołów</span><br/>";
    else
    {
        innerHTML = "<span id=\"chosenData\">Wybrano: ";
        for (var i = 0; i < chosenTeams.length; i++)
        {
            innerHTML += teamNames[chosenTeams[i]];
            if (i + 1 != chosenTeams.length)
                innerHTML += ", ";
        }
    }
    innerHTML += "</span><br/>";
    if (chosenTeams.length != MAX_TEAMS_TO_CHOOSE)
        innerHTML += generateForm();

    return innerHTML;
}

function getChosenTeams()
{
    var value;
    if (sessionStorage.getItem(CHOSEN_TEAMS_STORAGE_NAME))
        value = sessionStorage.getItem(CHOSEN_TEAMS_STORAGE_NAME);

    return value ? value.split(",") : [];
}

function generateForm()
{
    var html = "";
    for (var i = 0; i < TEAMS_COUNT; i++)
        html += "<button class=\"chooseTeamButton\" onclick=\"chooseTeam(" + i + ")\"> " + teamNames[i] + " </button><br/>";

    return html;
}

function chooseTeam(teamId)
{
    var teams = getChosenTeams();
    if (teams.length >= MAX_TEAMS_TO_CHOOSE)
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
    element.innerHTML = "Wybrano: " + arrayToStrWithTeamNames(teams);
}

function arrayToStrWithTeamNames(array)
{
    var dataToSave = "";
    for (var i = 0; i < array.length; i++)
        if (i != array.length - 1)
            dataToSave += teamNames[array[i]] + ",";
        else
            dataToSave += teamNames[array[i]];

    return dataToSave;
}