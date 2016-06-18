(function ($) {
    $.fn.disableSelection = function () {
        return this
                 .attr('unselectable', 'on')
                 .css('user-select', 'none')
                 .on('selectstart', false);
    };
})(jQuery);
$(function () {
    $(document).ajaxStart(function () {
        $("body").append('<div id="ajax-wrapper"><div id="loader"></div></div>');
        $("div#ajax-wrapper div#loader").css({
            "margin-top": $(window).height() / 2 - 42
        });
        $("div#ajax-wrapper").stop().fadeIn(250);
    });
    $(document).ajaxComplete(function () {
        $("div#ajax-wrapper").stop().fadeOut(250, function () {
            $("div#ajax-wrapper").remove();
        });
    });
    $("ul, li, td").disableSelection();
});