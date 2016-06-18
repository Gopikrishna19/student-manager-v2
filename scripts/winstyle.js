$(".title").disableSelection();
$("ul, li, td").disableSelection();
$("ul.submenu li").each(function () {
    $(this).prepend("<div class='icon' style='background-image: url(../images/" + $(this).data("image") + ".png)'></div>")
});
$("ul.submenu li").bind("click", menuClick);
var oldX = 0;
var oldY = 0;
var oldHeight = 0;
var oldWidth = 0;
var isHold = false;
var w = null;
$(".title").mousedown(function (e) {
    isHold = true;
    var element = $(this);
    var found = false;
    $.each(["#help", "#window", ".removable"], function (i, h) {
        if (element.parents(h).length > 0) {
            w = $("#" + element.parents(h).attr("id"));
            found = true;
        }
    });    
    if (!found) return;
    oldX = e.pageX - w.offset().left;
    oldY = e.pageY - w.offset().top;
    oldHeight = w.outerHeight();
    oldWidth = w.outerWidth();
    $("*").bind("mousemove", DragStart);
});
$("*").mouseup(function () {
    if (isHold) {
        $("*").unbind("mousemove");
        if (w.offset().top + oldHeight > $(window).height()) w.offset({ top: $(window).height() - oldHeight - 5 });
        if (w.offset().left + oldWidth > $(window).width()) w.offset({ left: $(window).width() - oldWidth - 5 });
        if (w.offset().top < 0) w.offset({ top: 5 });
        if (w.offset().left < 0) w.offset({ left: 5 });
        isHold = false;
    }
});
function DragStart(e) { w.offset({ top: e.pageY - oldY, left: e.pageX - oldX }); }