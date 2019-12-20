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

    $("#slider").slider({
        slide: function( event, ui )
        {
            var value = $("#slider").slider("value");
            document.getElementById("rateIndicator").innerHTML = value;
        }
    });
});