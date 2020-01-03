const TARGET_DIV_ID = "#ATarget";
const INPUT_ID = "#searchInput";
const DATA_ID = "ASearch";

$(document).on("input", INPUT_ID,function()
{
    var content = this.value;
    $.ajax({
        url: "/gallery/browserSnippet",
        data: DATA_ID + "=" + content,
        type: "GET",
        success: function(result)
        {
            handleResponse(result);
        }
    });
});

function handleResponse(result)
{
    $(TARGET_DIV_ID).html(result);
}