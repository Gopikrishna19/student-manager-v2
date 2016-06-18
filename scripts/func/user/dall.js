function showError(e) {
    $("div#ajax-result").html(e);
    $("div#ajax-result").slideDown(250);
    setTimeout(function () { $("div#ajax-result").slideUp(250); }, 3000);
}
$("#dall-y").click(function () {    
    $.ajax({
        url: "../common/func/user/dall.php",
        beforeSend: function (e) {
            showError("Deleting Users ...");
        },
        success: function (e) {
            showError("Deleted ALL Modererators and Users");
        },
        complete: function () {
            setTimeout(function () { $("#dall-n").click(); }, 2000);
        }
    });
});
$("#dall-n").click(function () {
    goup = true;
    active = false;
    menuClick();
})