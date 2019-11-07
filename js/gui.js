$(function()
{
    $("#dialogBox").dialog({autoOpen: false});
    $(document).tooltip({hide: { effect: "explode", duration: 500 }});
});

function showDialogBox()
{
    $("#dialogBox").dialog("open");
}