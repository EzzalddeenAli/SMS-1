$(document).ready(function () {
    $(window).scroll(function () {
        let $scrollDistance = $(document).scrollTop();
        let $navLogo = $("#nav-logo");
        let $navLinks = $("ul.navbar-nav > li");
        let centerCss = {"position:" : "relative", "top": "14px"};
        let $btn = $("button.nav-links");
        let resetCss = {"top": "0"};

        console.log($scrollDistance);
        if($scrollDistance > 70) {
            $("#navbar, .navbar-header").css("height", "50px");
            $navLogo.css({"height": "100%", "margin": "0 auto auto 15px"});
            $navLinks.css(resetCss);
            $("#nav-home").css(resetCss);
            $btn.css(resetCss);
            $("#nav-top-margin").css("margin-top", "0");
        } else {
            $("#navbar, .navbar-header").css("height", "80px");
            $navLogo.css({"height": "157%", "margin": "-28px auto auto 0"});
            $navLinks.css(centerCss);
            $("a#nav-home").css(centerCss);
            $btn.css(centerCss);
            $("#nav-top-margin").css("margin-top", "-13px");
        }
    });
});