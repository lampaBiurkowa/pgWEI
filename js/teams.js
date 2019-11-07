const FAVOURITE_TEAM_STORAGE_NAME = "favouriteTeam";
const TEAMS_COUNT = 19;
const ACTIVE_COLOR = "#00cc00";
const INACTIVE_COLOR = "#eeeeee";

function loadFavouriteTeam()
{
    var value;
    if (localStorage.getItem(FAVOURITE_TEAM_STORAGE_NAME))
        value = localStorage.getItem(FAVOURITE_TEAM_STORAGE_NAME);
    
    if (value && value >= 1 && value <= TEAMS_COUNT)
    {
        document.getElementById("teamRadio" + value).checked = true;
        document.getElementById("teamDesc" + value).style.color = ACTIVE_COLOR;
    }
}

function setFavouriteTeam(teamId)
{
    var previousFavouriteTeam;
    if (localStorage.getItem(FAVOURITE_TEAM_STORAGE_NAME))
        previousFavouriteTeam = localStorage.getItem(FAVOURITE_TEAM_STORAGE_NAME);

    if (previousFavouriteTeam && previousFavouriteTeam >= 1 && previousFavouriteTeam <= TEAMS_COUNT)
        document.getElementById("teamDesc" + previousFavouriteTeam).style.color = INACTIVE_COLOR;

    localStorage.setItem(FAVOURITE_TEAM_STORAGE_NAME, teamId);
    document.getElementById("teamDesc" + teamId).style.color = ACTIVE_COLOR;
}