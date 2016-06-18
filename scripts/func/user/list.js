$("tr.list:odd").css({ "background-color": "#333" });
$("tr.list").mouseenter(function () {
    $(this).css({ "background-color": "#000" });
});
$("tr.list").mouseleave(function () {
    $(this).css({ "background-color": "#222" });
    $("tr.list:odd").css({ "background-color": "#333" });
});