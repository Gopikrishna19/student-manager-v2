function showError(e) {
    $("div#ajax-result").html(e);
    $("div#ajax-result").slideDown(250);
    setTimeout(function () { $("div#ajax-result").slideUp(250); }, 3000);
}
$("form").submit(function (e) {
    e.preventDefault();
    $(this).attr("disabled", "disabled");
    var i = $("#ucode").val();
    i = i.replace(/\s/g, "");
    var constraint = /(^([0-9A-Za-z]+[,])+?[0-9A-Za-z]+$)|(^[0-9A-Za-z]+$)/;
    if (!constraint.test(i)) {
        showError("Invalid Expression: See Help to know more on inputs");
        $(this).removeAttr("disabled");
        return;
    }
    var a = i.split(",");
    if (a !== null) {
        for (n = 0; n < a.length; ++n) {
            constraint = /(^[0-9a-zA-Z]+$)/;
            if (!constraint.test(a[n])) {
                showError("Invalid Expression: See Help to know more on inputs");
                $(this).removeAttr("disabled");
                return;
            } else _insert(a[n]);
        }
    }
    function _insert(uname) {
        $.ajax({
            url: "../common/func/user/cusr.php",
            data: { "uname": uname, "perm": "M" },
            beforeSend: function (e) {
                showError("Creating User, " + uname + " ...");
            },
            success: function (e) {
                showError(e);
            },
            complete: function () {
                $("#btnUserCreate").removeAttr("disabled");
                $("#ucode").val("");
            }
        });
    }
});