const CHOSEN_TEAMS_STORAGE_NAME = "chosen";
const TEAM_BUTTONS_SPAN_ID = "teamButtons";
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
    var chosenTeams = getChosenTeams();
    var innerHTML = generateChosenTeamsText(chosenTeams);
    innerHTML += "</span><br/>";
    if (chosenTeams.length != MAX_TEAMS_TO_CHOOSE)
        innerHTML += generateForm();

    return innerHTML;
}

function generateChosenTeamsText(chosenTeams)
{
    var html;
    if (chosenTeams.length == 0)
        html = "<span id=\"chosenData\">Nie wybrano zespołów</span><br/>";
    else
    {
        html = "<span id=\"chosenData\">Wybrano: ";
        for (var i = 0; i < chosenTeams.length; i++)
        {
            html += teamNames[chosenTeams[i]];
            if (i + 1 != chosenTeams.length)
                html += ", ";
        }
    }
    return html;
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
    var html = "<span id=\"" + TEAM_BUTTONS_SPAN_ID + "\">";
    for (var i = 0; i < TEAMS_COUNT; i++)
        html += "<button id=\"chooseTeamButton" + i + "\" class=\"chooseTeamButton\" onclick=\"chooseTeam(" + i + ")\"> " + teamNames[i] + " </button><br/>";

    return html + "</span>";
}

function chooseTeam(teamId)
{
    document.getElementById("chooseTeamButton" + teamId).setAttribute("disabled", true);
    var teams = getChosenTeams();
    if (teams.length >= MAX_TEAMS_TO_CHOOSE)
        return;

    if (teamAlreadyAdded(teamId))
        return;

    teams.push(teamId);
    sessionStorage.setItem(CHOSEN_TEAMS_STORAGE_NAME, arrayToStr(teams));
    updateChosenTeamsData();
    if (teams.length == MAX_TEAMS_TO_CHOOSE)
        destroyForm();
}

function teamAlreadyAdded(teamId)
{
    var teams = getChosenTeams();
    for (var i = 0; i < teams.length; i++)
        if (teams[i] == teamId)
            return true;

    return false;
}

function destroyForm()
{
    var teamButtons = document.getElementById(TEAM_BUTTONS_SPAN_ID);
    teamButtons.remove();
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