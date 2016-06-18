function showError(e) {
    $("div#ajax-result").html(e);
    $("div#ajax-result").slideDown(250);
    setTimeout(function () { $("div#ajax-result").slideUp(250); }, 3000);
}

function ResetDialogs(w) {
    if (w.offset().top + oldHeight > $(window).height()) w.offset({ top: $(window).height() - oldHeight - 5 });
    if (w.offset().left + oldWidth > $(window).width()) w.offset({ left: $(window).width() - oldWidth - 5 });
    if (w.offset().top < 0) w.offset({ top: 5 });
    if (w.offset().left < 0) w.offset({ left: 5 });
}

function setDialog(e) {
    e.css({
        'margin-top': ($(window).height() - e.outerHeight()) / 2,
        'margin-left': ($(window).width() - e.outerWidth()) / 2
    });
}
function removeDialog(e) {
    e.fadeOut(250, function () {
        e.remove();
    })
}
$("#dept-add").click(function () {
    DrawDialog("#dadd", "dadd", "dadd");
});

$("#dept-del").click(function () {
    DrawDialog("#ddal", "ddal", "ddal");
});

$(".deptRen").click(function () {
    DrawDialog("#dren", "dren", "dren", { "name": $(this).data("name"), "code": $(this).data("code") });
});

$(".deptDel").click(function () {
    DrawDialog("#ddel", "ddel", "ddel", { "name": $(this).data("name"), "code": $(this).data("code") });
});

$(window).resize(function () {
    if ($(".removable").length > 0) {
        ResetDialogs($(".removable"));
        setDialog($(".removable"));
    }
});
function DrawDialog(e, url, key, param) {
    param = param || null;
    if ($(e).length > 0) $(e).remove();
    $("body").append("<div class='removable' id='" + key + "'></div>");
    $(e).load("../common/func/dept/" + url + ".php", param, function (t, s, x) {
        if (s == "success") {
            $(e).append("<div id='" + key + "-close' class='close'></div>");
            $("#" + key + "-close", $(e)).bind("click", function () {
                $(e).fadeOut(250, function () {
                    $(e).remove();
                });
            });
            $.getScript("../scripts/winstyle.js", function () {
                setDialog($(e));
                $(e).fadeIn();
            });
            $("#" + key + "-form").bind("submit", FormSubmit);
        }
        else {
            removeDialog($(e));
            return;
        }
    });
}

function checkNameNCode(dname, dcode) {
    var dcodec = /^[0-9]+$/;
    var dnamec = /^[\w ]+$/;
    if (dcodec.test(dcode)) {
        if (dnamec.test(dname)) {
            return true;
        }
        else {
            showError("Invalid Department Name");
            return false;
        }
    }
    else {
        showError("Invalid Department Code");
        return false;
    }
}
function FormSubmit(e) {
    e.preventDefault();
    var ele = $(e.target);
    var param = {};
    switch (ele.attr("id")) {
        case "dadd-form":
            var dcode = $("#code", ele).val();
            var dname = $("#name", ele).val();
            if (checkNameNCode(dname, dcode)) {
                param["code"] = dcode;
                param["name"] = dname;
                param["oper"] = "I";
                $("#name", ele).val("");
                $("#code", ele).val("").focus();
            }
            else return;
            break;
        case "dren-form":
            var dcode = $("#code", ele).val();
            var dname = $("#name", ele).val();
            if (checkNameNCode(dname, dcode)) {
                param["code"] = dcode;
                param["name"] = dname;
                param["ocode"] = $("#ocode", ele).val();
                param["oname"] = $("#oname", ele).val();
                param["oper"] = "U";
                param["diag"] = "#dren";
            }
            else return;
            break;
        case "ddel-form":
            param["code"] = $("#code", ele).val();
            param["name"] = $("#name", ele).val();
            param["oper"] = "D";
            param["diag"] = "#ddel";
            break;
        case "ddal-form":
            param["oper"] = "A";
            param["diag"] = "#ddal";
            break;
    }
    $.ajax({
        url: "../common/func/dept/oper.php",
        data: param,
        success: function (e) {
            showError(e);
        },
        complete: function () {
            level = 0;
            active = false;
            menuClick();
            if (param["diag"]) {
                $(param["diag"] + " " + param["diag"] + "-form").slideUp();
                setTimeout(function () { removeDialog($(param["diag"])); }, 3000);
            }
        }
    });
    code = $("#code", ele).val();
}