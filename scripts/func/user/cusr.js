function showError(e) {
    $("div#ajax-result").html(e);
    $("div#ajax-result").slideDown(250);
    setTimeout(function () { $("div#ajax-result").slideUp(250); }, 3000);
}
$("form").submit(function (e) {
    e.preventDefault();
    $(this).attr("disabled", "disabled");
    var i = $("#ucode").val();
    var coll = $("#ccode").val();
    var year = $("#syear").val();
    var dept = $("#dcode").val();
    i = i.replace(/\s/g, "");
    var constraint = /(^([0-9]+[,-])+?[0-9]+$)|(^[0-9]+$)/;
    if (!constraint.test(i)) {
        showError("Invalid Expression: See Help to know more on inputs");
        $(this).removeAttr("disabled");
        return;
    }
    var a = i.split(",");
    if (a != "") {
        for (n = 0; n < a.length; ++n) {
            var conh = /^[0-9]{1,3}-[0-9]{1,3}$/;
            var conc = /^[0-9]{1,3}$/;
            if (conh.test(a[n])) {
                var range = a[n].split("-");
                var ll = parseInt(range[0]);
                var ul = parseInt(range[1]);
                if (ul < ll) {
                    showError("Invalid Order: See Help to know more on inputs");
                    $(this).removeAttr("disabled");
                    return;
                }
                for (m = ll; m <= ul; ++m) {
                    var app = "";
                    if (m < 10) app = "00";
                    else if (m < 100) app = "0";
                    _insert(coll + year + dept + app + Number(m));
                }
                $("#btnUserCreate").removeAttr("disabled");
            }
            else if (conc.test(a[n])) {
                var app = "";
                if (a[n] < 10) app = "00";
                else if (a[n] < 100) app = "0";
                _insert(coll + year + dept + app + Number(a[n]));
            }
            else {
                showError("Invalid Expression: See Help to know more on inputs");
                $(this).removeAttr("disabled");
                return;
            }
        }
    }
    function _insert(uname) {        
        $.ajax({
            url: "../common/func/user/cusr.php",
            data: { "uname": uname, "perm": "U" },
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