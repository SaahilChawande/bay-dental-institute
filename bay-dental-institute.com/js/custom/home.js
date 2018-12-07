$(document).ready(function(){
    $('a[href^="#"]').on('click',function (e) {
        e.preventDefault();
        var target = this.hash;
        $target = $(target);
        $('body').stop().animate({
            'scrollTop':  $target.offset().top //no need of parseInt here
        }, 2000, 'swing', function () {
            window.location.hash = target;
        });
    });
});

$(window).scroll(startCounter);
function startCounter() {
    var hT = $('.Count').offset().top,
        hH = $('.Count').outerHeight(),
        wH = $(window).height();
    if ($(window).scrollTop() > hT+hH-wH) {
        $(window).off("scroll", startCounter);
        $('.Count').each(function () {
            var $this = $(this);
            jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
                duration: 5000,
                easing: 'swing',
                step: function () {
                    $this.text(Math.ceil(this.Counter));
                }
            });
        });
    }
}