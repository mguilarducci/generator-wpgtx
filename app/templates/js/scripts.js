(function() {
    var method;
    var noop = function() {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

(function($) {
    var $window = $(window),
        slideGaleria = $('.gallery-slider'),
        galeriaWP = $('.gallery'),
        post = $('.post');

    $(function() {
        // fitvids
        post.fitVids();

        // substitui a galeria se o formato de post for de galeria
        if (slideGaleria.length) {
            slideGaleria.flexslider({
                slideshow  : false,
                selector   : '.gallery-slides > li',
                controlNav : false
            });
        }
        galeriaWP.remove();
    });
})(jQuery);