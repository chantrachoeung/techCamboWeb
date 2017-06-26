<!DOCTYPE html>
<!-- saved from url=(0042)http://demo.fuviz.com/reen/v1-5/demos.html -->
<html lang="en" class=" csstransitions">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TECH CAMBO</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/main.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">


    <style>.btn-modal {
        position: relative;
        font-size: 3vh;
        line-height: 18vh;
        box-shadow: 0 0 0 rgba(0, 0, 0, 0) !important
    }

    .btn-modal:hover {
        background-color: #e9ecf2 !important;
        -webkit-transform: translateY(-5px);
        -ms-transform: translateY(-5px);
        transform: translateY(-5px);
        box-shadow: 10px 20px 20px rgba(0, 0, 0, .22) !important
    }

    .btn-modal:focus {
        background-color: #e9ecf2 !important;
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
        box-shadow: 2px 4px 3px rgba(0, 0, 0, .3) !important
    }

    .btn-modal span {
        position: relative;
        z-index: 1;
        letter-spacing: .5vw
    }

    .btn-modal span.bg-type {
        position: absolute;
        top: 48%;
        left: 52%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        z-index: 0;
        font-size: 8vh;
        color: #FFF;
        letter-spacing: 1vw
    }
    </style>
    
</head>
<body data-aos-easing="ease-out-cubic" data-aos-duration="500" data-aos-delay="0">

<?php  include("page/header.php"); ?>



    <main class="js-reveal">
        <section id="layout-selection">
            <div class="container inner-md"><h3 class="sidelines text-center"><span>Select layout style</span></h3>
                <div class="row">
                    <div class="col-xs-6 inner-top-xs aos-init aos-animate" data-aos="fade-up"><a
                            class="btn btn-block btn-modal"
                            href=""><span>Multi</span><span
                            class="bg-type">Page</span></a></div>
                    <div class="col-xs-6 inner-top-xs aos-init aos-animate" data-aos="fade-up"><a
                            class="btn btn-block btn-modal"
                            href=""><span>One</span><span
                            class="bg-type">Page</span></a></div>
                </div>
            </div>
        </section>
    </main>

<?php  include("page/footer.php"); ?>

<script src="public/js/jquery.min.js"></script>
<script src="public/js/jquery.easing.1.3.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>

<script>
    function getCSSBreakpoint() {
        return window.getComputedStyle(document.querySelector("body"), ":before").getPropertyValue("content").replace(/\"/g,
            "")
    }

    function cssBreakpoint(a) {
        return getCSSBreakpoint() === a && true
    }


    function debounce(b, d, a) {
        var c, d = d || 100;
        return function () {
            var h = this, g = arguments, f = function () {
                c = null;
                if (!a) {
                    b.apply(h, g)
                }
            }, e = a && !c;
            clearTimeout(c);
            c = setTimeout(f, d);
            if (e) {
                b.apply(h, g)
            }
        }
    }

    $(document).ready(function () {
        function c() {
            $(".navbar .navbar-collapse").affix({offset: {top: $(".navbar-header").outerHeight(true)}});
            $(".affix, .affix-top").wrap('<div class="affix-wrapper"></div>').parent().css("min-height", $(".affix, .affix-top").outerHeight(true))
        }

        function b() {
            $(".affix, .affix-top").unwrap()
        }

        if (cssBreakpoint("md")) {
            c();
            var a = true
        } else {
            var a = false
        }
        $(window).resize(debounce(function () {
            if (cssBreakpoint("md") && !a) {
                c();
                a = true
            } else {
                if (cssBreakpoint("xs") && a) {
                    b();
                    a = false
                }
            }
        }))
    });
    $(document).ready(function () {
        var h = $(".navbar-header").outerHeight(true), e = {
            navbarPadTop: {
                element: ".navbar .navbar-collapse",
                style: "padding-top",
                start: "currentValueFromCSS",
                end: 15,
                distance: 300,
                delay: h
            },
            navbarPadBot: {
                element: ".navbar .navbar-collapse",
                style: "padding-bottom",
                start: "currentValueFromCSS",
                end: 15,
                distance: 300,
                delay: h
            },
            navbarLogoH: {
                element: ".navbar-brand img",
                style: "height",
                start: "currentValueFromCSS",
                end: 50,
                distance: 300,
                delay: h
            }
        }, d = 0, b = false;

        function a() {
            $.each(e, function (i, j) {
                j.start = typeof j.start === "string" ? parseInt($(j.element).css(j.style), 10) : j.start;
                j.maxChange = j.start - j.end;
                j.scrollRatio = j.maxChange / j.distance;
                j.animTriggered = false;
                j.animFinished = false;
                $(j.element).addClass("animate")
            })
        }

        function c() {
            $.each(e, function (i, j) {
                $(j.element).css(j.style, "").removeClass("animate animate-after")
            })
        }

        function g() {
            d = $(document).scrollTop();
            b = false;
            $.each(e, function (i, j) {
                if (d > j.delay) {
                    if (!j.animTriggered) {
                        j.animTriggered = true
                    }
                    j.scrolled = d - j.delay;
                    if (j.scrolled <= j.distance) {
                        j.currentChange = j.start - j.scrolled * j.scrollRatio.toFixed(2);
                        $(j.element).css(j.style, j.currentChange + "px");
                        if (j.animFinished) {
                            j.animFinished = false;
                            $(j.element).removeClass("animate-after")
                        }
                    } else {
                        if (!j.animFinished) {
                            j.animFinished = true;
                            $(j.element).css(j.style, j.end + "px").addClass("animate-after")
                        }
                    }
                } else {
                    if (j.animTriggered) {
                        j.animTriggered = false;
                        $(j.element).css(j.style, j.start + "px")
                    }
                }
            })
        }

        if (cssBreakpoint("md")) {
            a();
            var f = true
        } else {
            var f = false
        }
        $(window).resize(debounce(function () {
            if (cssBreakpoint("md") && !f) {
                a();
                g();
                f = true
            } else {
                if (cssBreakpoint("xs") && f) {
                    c();
                    f = false
                }
            }
        }));
        $(window).scroll(function () {
            if (cssBreakpoint("md") && !b) {
                window.requestAnimationFrame(g)
            }
            b = true
        })
    });
    $(document).ready(function () {
        function b() {
            $(".dropdown, .dropdown-submenu").addClass("hover");
            $(document).on({
                mouseenter: function () {
                    $(".open").removeClass("open");
                    $(this).addClass("open").find(".dropdown-toggle").removeAttr("data-toggle")
                }, mouseleave: function () {
                    $(this).removeClass("open").find(".dropdown-toggle").attr("data-toggle", "dropdown")
                }
            }, ".dropdown.hover");
            $(document).on({
                mouseleave: function () {
                    $(this).removeClass("open")
                }
            }, ".dropdown-submenu.hover.open")
        }

        function c() {
            $(".dropdown, .dropdown-submenu").removeClass("hover")
        }

        $(".dropdown-submenu [data-toggle=dropdown]").click(function (d) {
            $(this).parent().siblings(".open").removeClass("open").find(".open").removeClass("open");
            $(this).parent().toggleClass("open").find(".open").removeClass("open");
            d.preventDefault();
            d.stopPropagation()
        });
        if (cssBreakpoint("md")) {
            b();
            var a = true
        } else {
            var a = false
        }
        $(window).resize(debounce(function () {
            if (cssBreakpoint("md") && !a) {
                b();
                a = true
            } else {
                if (cssBreakpoint("xs") && a) {
                    c();
                    a = false
                }
            }
        }))
    });


</script>


</body>
</html>