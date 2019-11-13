$(document).ready(
function()
{
    $("#fadeableHeader").click(
    function()
    {
        $("#fadeableHeader").fadeOut(1500);
    });

    $("#slideableText").click(
    function()
    {
        $("#slideableText").slideUp(1000, "linear");
    });
});