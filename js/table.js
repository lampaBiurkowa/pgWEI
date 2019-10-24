const CHOSEN_TEAMS_STORAGE_NAME = "chosen";
const TEAMS_COUNT = 18;
var activated = false;

function generateForm()
{
    var html = "";
    for (var i = 0; i < TEAMS_COUNT; i++)
        html += "<button onclick=\"chooseTeam(" + i + ")\"> Zespół na miejscu nr" + i + "</button><br/>";

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
    element.innerHTML = arrayToStr(teams);
}