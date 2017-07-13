(function(e) {
    e.fn.inewsticker = function(t) {
        var n = {
            speed: 200,
            effect: "fade",
            delay_after: 3e3
        };
        e.extend(n, t);
        var r = e(this);
        var i = r.children();
        i.not(":first").hide();
        setInterval(function() {
            var e = r.children();
            e.not(":first").hide();
            var n = e.eq(0);
            var i = e.eq(1);
            if (t.effect == "fade") {
                n.fadeOut(function() {
                    i.fadeIn();
                    n.remove().appendTo(r)
                })
            }
        }, t.speed);
    }
})(jQuery);

$(document).ready(function() {
    $(".tptnhtml1").css("display", "block");
    $('.tptnhtml1').inewsticker({
        speed: 4000,
        effect: "fade",
        delay_after: 0
    });
});;