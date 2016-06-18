var active = false;
var level = -1;
var goup = false;
var obj = null;
var hash = new Array();

function removeOverlay() {
    if ($(".removable").length > 0) {
        $(".removable").fadeOut(250, function () {
            $(".removable").remove();
        });
    }
    $("#overlay").fadeOut(250, function () {
        $("#overlay").remove();
        hash = new Array();
        active = false;
        goup = false;
        level = -1;
        obj = null;
    });
}

function menuClick() {
    if (!active) {
        active = true;
        var e = obj ? obj : $(this);
        obj = e;
        var func = e.data("func");
        var pageHash = e.data("hash") ? " #" + e.data("hash") : "";
        if (goup) {
            level -= 1;
            if (level < 0) {
                removeOverlay();
                return;
            }
            goup = false;
            hash.pop();
            pageHash = hash.pop();
        }
        else {
            level = parseInt(e.data("level"), 10);
        }
        hash.push(pageHash);
        if ($("#overlay").length <= 0) $("body").append("<div id='overlay'><div id='window'></div></div>");
        $("#window").load("../common/func/" + func + "/L" + level + ".php" + pageHash, function (t, s, x) {
            if (s == "success") {
                active = true;
                $("#window").append("<div id='window-close' class='close'></div>");
                $("#window").append("<div id='window-back'></div>");

                //scan for subscripts
                var flag = $("#window").find('span[id=script]');
                if (flag.length) {
                    $.getScript(flag.html());
                    flag.remove();
                }

                //scan for overflow
                flag = $("#window").find('span[id=maxHeight]');
                if (flag.length) {
                    $(".constraint").css({ "max-height": $(window).height() - 100, "overflow": "auto" });
                }

                // scan for help
                flag = $("#window").find('span[id=showHelp]');
                if (flag.length) {
                    $("#window").append("<div id='window-help'></div>");
                    addHelp($("#help-content").html());
                    $("#window-help").bind("click", function () {
                        $("#help").fadeIn();
                    });
                    $("#window-back").css({ "right": 57 });
                    flag.remove();
                    setHelp();
                }

                $("#window-close").bind("click", function () {
                    removeOverlay();
                });
                $("#window-back").bind("click", function () {
                    goup = true;
                    active = false;
                    menuClick();
                });
                $("#overlay").fadeIn(250, function () {
                    $.getScript("../scripts/winstyle.js", function () {
                        setWindow();
                        $("#window").animate({ "opacity": 1 }, 250);
                    });
                });
            }
            else {
                removeOverlay();
            }
        });
    }
    else if (active && level >= 0) {
        active = false;
        obj = $(this);
        menuClick();
    }
}

function addHelp(e) {
    if ($("#help").length > 0) $("#help").remove();
    $("body").append("<div id='help' class='removable'>" + e + "</div>");
    $("#help").append("<div id='help-close' class='close'></div>");
    $("#help #help-close").bind("click", function () {
        $("#help").fadeOut();
    });
}
function setWindow() {
    $("#window").css({
        'margin-top': ($(window).height() - $("#overlay-page-content").height() - 30) / 2,
        'margin-left': ($(window).width() - $("#overlay-page-content").width() - 30) / 2
    });
}

function setHelp() {
    $("#help").css({
        'margin-top': ($(window).height() - $("#help").outerHeight()) / 2,
        'margin-left': ($(window).width() - $("#help").outerWidth()) / 2
    });
}

$(function () {
    $("li").each(function () {
        $(this).prepend("<div class='icon' style='background-image: url(../images/" + $(this).data("image") + ".png)'></div>")
    });
    $("ul#menu li").bind("click", menuClick);
});

function ResetWindows(w) {
    if (w.offset().top + oldHeight > $(window).height()) w.offset({ top: $(window).height() - oldHeight - 5 });
    if (w.offset().left + oldWidth > $(window).width()) w.offset({ left: $(window).width() - oldWidth - 5 });
    if (w.offset().top < 0) w.offset({ top: 5 });
    if (w.offset().left < 0) w.offset({ left: 5 });
}

$(window).resize(function () {
    if ($("#overlay").length > 0) {
        ResetWindows($("#window"));
        flag = $("#window").find('span[id=maxHeight]');
        if (flag.length) {
            $(".constraint").css({ "max-height": $(window).height() - 100, "overflow": "auto" });
        }
        setWindow();
    }
    if ($("#help").length > 0) {
        ResetWindows($("#help"));
        $("#help .hconstraint").css({ "max-height": $(window).height() - 100, "overflow": "auto" });
        setHelp();
    }
});

window.onkeydown = function (event) {
    keycode = event.keyCode;
    var doPrevent = false;
    if (keycode === 27) {
        removeOverlay();
        return;
    }
    if (keycode === 8) {
        var d = event.srcElement || event.target;
        if ($(d).is("input[type='button']") ||
            $(d).is("input[type='submit']") ||
            $(d).is("input[type='retry']") ||
            $(d).is("select") ||
            $(d).is("button")) doPrevent = true;
        else if ($(d).is("input") || $(d).is("textarea")) doPrevent = d.readOnly || d.disabled;
        else doPrevent = true;
    }

    if (doPrevent && level >= 0) {
        if ($(".removable").length > 0) {
            $(".removable").fadeOut(250, function () {
                $(".removable").remove();
            });
        }
        event.preventDefault();
        goup = true;
        active = false;
        menuClick();
    }
}