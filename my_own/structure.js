$(document).ready(function()
{
    $(".add").on("click", function() {
        var inputData = $("[name='itemVal']").val();
        if (inputData) {
            $.post( "handle.php", { class: "stack", method: "setNewItemToStack", data: inputData }, function( data ) {
                var data = (JSON.parse(data));
                $("ul").prepend("<li>" + data[0] + "</li>");
                $("[name='itemVal']").val('')
            });
        }
    });

    $(".get").on("click", function() {
        $.post( "handle.php", { class: "stack", method: "getItemFromStack"}, function( data ) {
               /* var data = (JSON.parse(data));
                $("ul").prepend("<li>" + data[0] + "</li>");
                $("[name='itemVal']").val('')*/
                console.log(data);
        });
    })
});