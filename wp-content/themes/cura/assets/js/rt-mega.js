var RADIANT = {},
    $ = jQuery.noConflict();
(function ($) {
    "use strict"
    var $window = $(window),
        $theme_color = "#2250fc",
        $body = $("body"),
        $bodyInner = $(".body-inner"),
        $section = $("section"),
        $topbar = $("#topbar"),
        $header = $("#header"),
        $headerCurrentClasses = $header.attr("class"),
        headerLogo = $("#logo"),
        $mainMenu = $("#rt-mainMenu"),
        $mainMenuTriggerBtn = $("#rt-mainMenu-trigger a, #rt-mainMenu-trigger button"),
        $pageMenu = $(".page-menu"),
        $slider = $("#slider"),
        $RADIANTSlider = $(".RADIANT-slider"),
        $carousel = $(".carousel"),
        $gridLayout = $(".grid-layout"),
        $gridFilter = $(".grid-filter, .page-grid-filter"),
        windowWidth = $window.width();
    if ($header.length > 0) {
        var $headerOffsetTop = $header.offset().top
    }
    var Events = {
        browser: {
            isMobile: function () {
                if (navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/)) {
                    return !0
                } else {
                    return !1
                }
            }
        }
    }
    var Settings = {
        isMobile: Events.browser.isMobile,
        submenuLight: $header.hasClass("rt-submenu-light") == !0 ? !0 : !1,
        headerHasDarkClass: $header.hasClass("rt-dark") == !0 ? !0 : !1,
        headerDarkClassRemoved: !1,
        sliderDarkClass: !1,
        menuIsOpen: !1,
        menuOverlayOpened: !1,
    }
    $(window).breakpoints({
        breakpoints: [{
            name: "xs",
            width: 0
        }, {
            name: "sm",
            width: 576
        }, {
            name: "md",
            width: 768
        }, {
            name: "lg",
            width: 1025
        }, {
            name: "xl",
            width: 1200
        }]
    })
    var currentBreakpoint = $(window).breakpoints("getBreakpoint")
    $body.addClass("breakpoint-" + currentBreakpoint)
    $(window).bind("breakpoint-change", function (breakpoint) {
        $body.removeClass("breakpoint-" + breakpoint.from)
        $body.addClass("breakpoint-" + breakpoint.to)
    })
    $(window).breakpoints("greaterEqualTo", "lg", function () {
        $body.addClass("b--desktop")
        $body.removeClass("b--responsive")
    })
    $(window).breakpoints("lessThan", "lg", function () {
        $body.removeClass("b--desktop")
        $body.addClass("b--responsive")
    })
    RADIANT.core = {
        functions: function () {
            // RADIANT.core.scrollTop()
            RADIANT.core.rtlStatus()
            RADIANT.core.equalize()
            RADIANT.core.customHeight()
            RADIANT.core.darkTheme()
        },
        // scrollTop: function () {
        //     var $scrollTop = $("#scrollTop")
        //     if ($scrollTop.length > 0) {
        //         var scrollOffset = $body.attr("data-offset") || 400
        //         if ($window.scrollTop() > scrollOffset) {
        //             if ($body.hasClass("frame")) {
        //                 $scrollTop.css({
        //                     "bottom": "46px",
        //                     "opacity": 1,
        //                     "z-index": 199
        //                 })
        //             } else {
        //                 $scrollTop.css({
        //                     "bottom": "26px",
        //                     "opacity": 1,
        //                     "z-index": 199
        //                 })
        //             }
        //         } else {
        //             $scrollTop.css({
        //                 bottom: "16px",
        //                 opacity: 0
        //             })
        //         }
        //         $scrollTop.off("click").on("click", function () {
        //             $("body,html").stop(!0).animate({
        //                 scrollTop: 0
        //             }, 1000, "easeInOutExpo")
        //             return !1
        //         })
        //     }
        // },
        rtlStatus: function () {
            var $rtlStatusCheck = $("html").attr("dir")
            if ($rtlStatusCheck == "rtl") {
                return !0
            }
            return !1
        },
        equalize: function () {
            var $equalize = $(".equalize")
            if ($equalize.length > 0) {
                $equalize.each(function () {
                    var elem = $(this),
                        selectorItem = elem.find(elem.attr("data-equalize-item")) || "> div",
                        maxHeight = 0
                    selectorItem.each(function () {
                        if ($(this).outerHeight(!0) > maxHeight) {
                            maxHeight = $(this).outerHeight(!0)
                        }
                    })
                    selectorItem.height(maxHeight)
                })
            }
        },
        customHeight: function (setHeight) {
            var $customHeight = $(".custom-height")
            if ($customHeight.length > 0) {
                $customHeight.each(function () {
                    var elem = $(this),
                        elemHeight = elem.attr("data-height") || 400,
                        elemHeightLg = elem.attr("data-height-lg") || elemHeight,
                        elemHeightMd = elem.attr("data-height-md") || elemHeightLg,
                        elemHeightSm = elem.attr("data-height-sm") || elemHeightMd,
                        elemHeightXs = elem.attr("data-height-xs") || elemHeightSm

                    function customHeightBreakpoint(setHeight) {
                        if (setHeight) {
                            elem = setHeight
                        }
                        switch ($(window).breakpoints("getBreakpoint")) {
                            case "xs":
                                elem.height(elemHeightXs)
                                break
                            case "sm":
                                elem.height(elemHeightSm)
                                break
                            case "md":
                                elem.height(elemHeightMd)
                                break
                            case "lg":
                                elem.height(elemHeightLg)
                                break
                            case "xl":
                                elem.height(elemHeight)
                                break
                        }
                    }
                    customHeightBreakpoint(setHeight)
                    $(window).resize(function () {
                        setTimeout(function () {
                            customHeightBreakpoint(setHeight)
                        }, 100)
                    })
                })
            }
        },
        darkTheme: function () {
            var $darkElement = $("[data-dark-src]"),
                $lightBtnTrigger = $("#light-mode"),
                $darkBtnTrigger = $("#rt-dark-mode"),
                darkColorScheme = "darkColorScheme",
                defaultDark = $body.hasClass("rt-dark");
            if (typeof Cookies.get(darkColorScheme) !== "undefined") {
                $body.addClass("rt-dark")
            }
            $darkBtnTrigger.on("click", function (e) {
                darkElemSrc();
                $body.addClass("rt-dark");
                RADIANT.elements.shapeDivider();
                Cookies.set(darkColorScheme, !0, {
                    expires: Number(365)
                })
            })
            $lightBtnTrigger.on("click", function (e) {
                lightElemSrc();
                $body.removeClass("rt-dark");
                RADIANT.elements.shapeDivider();
                Cookies.remove(darkColorScheme)
            })
            if ($body.hasClass("rt-dark")) {
                darkElemSrc()
            }

        }
    }
    RADIANT.header = {
        functions: function () {
            RADIANT.header.logoStatus();
            RADIANT.header.stickyHeader();
            RADIANT.header.topBar();
            RADIANT.header.search();
            RADIANT.header.mainMenu();
            RADIANT.header.mainMenuOverlay();
            // RADIANT.header.pageMenu();
            // RADIANT.header.sidebarOverlay();
            RADIANT.header.dotsMenu();
            // RADIANT.header.onepageMenu()
        },
        logoStatus: function (status) {
            var headerLogoDefault = headerLogo.find($(".logo-default")),
                headerLogoDark = headerLogo.find($(".logo-rt-dark")),
                headerLogoFixed = headerLogo.find(".logo-fixed"),
                headerLogoResponsive = headerLogo.find(".logo-responsive");
            if ($header.hasClass("header-sticky") && headerLogoFixed.length > 0) {
                headerLogoDefault.css("display", "none");
                headerLogoDark.css("display", "none");
                headerLogoResponsive.css("display", "none");
                headerLogoFixed.css("display", "block")
            } else {
                headerLogoDefault.removeAttr("style");
                headerLogoDark.removeAttr("style");
                headerLogoResponsive.removeAttr("style");
                headerLogoFixed.removeAttr("style")
            }
            $(window).breakpoints("lessThan", "lg", function () {
                if (headerLogoResponsive.length > 0) {
                    headerLogoDefault.css("display", "none");
                    headerLogoDark.css("display", "none");
                    headerLogoFixed.css("display", "none");
                    headerLogoResponsive.css("display", "block")
                }
            })
        },
        stickyHeader: function () {
            var elem = $(this),
                shrinkHeader = elem.attr("data-shrink") || 0,
                shrinkHeaderActive = elem.attr("data-sticky-active") || 200,
                scrollOnTop = $window.scrollTop();
            if ($header.hasClass("header-modern")) {
                shrinkHeader = 300
            }
            $(window).breakpoints("greaterEqualTo", "lg", function () {
                if (!$header.is(".header-disable-fixed")) {
                    if (scrollOnTop > $headerOffsetTop + shrinkHeader) {
                        $header.addClass("header-sticky");
                        if (scrollOnTop > $headerOffsetTop + shrinkHeaderActive) {
                            $header.addClass("sticky-active");
                            if (Settings.submenuLight && Settings.headerHasDarkClass) {
                                $header.removeClass("rt-dark");
                                Settings.headerDarkClassRemoved = !0
                            }
                            RADIANT.header.logoStatus()
                        }
                    } else {
                        $header.removeClass().addClass($headerCurrentClasses);
                        if (Settings.sliderDarkClass && Settings.headerHasDarkClass) {
                            $header.removeClass("rt-dark");
                            Settings.headerDarkClassRemoved = !0
                        }
                        RADIANT.header.logoStatus()
                    }
                }
            });
            $(window).breakpoints("lessThan", "lg", function () {
                if ($header.attr("data-responsive-fixed") == "true") {
                    if (scrollOnTop > $headerOffsetTop + shrinkHeader) {
                        $header.addClass("header-sticky");
                        if (scrollOnTop > $headerOffsetTop + shrinkHeaderActive) {
                            $header.addClass("sticky-active");
                            if (Settings.submenuLight) {
                                $header.removeClass("rt-dark");
                                Settings.headerDarkClassRemoved = !0
                            }
                            RADIANT.header.logoStatus()
                        }
                    } else {
                        $header.removeClass().addClass($headerCurrentClasses);
                        if (Settings.headerDarkClassRemoved == !0 && $body.hasClass("rt-mainMenu-open")) {
                            $header.removeClass("rt-dark")
                        }
                        RADIANT.header.logoStatus()
                    }
                }
            })
        },
        topBar: function () {
            if ($topbar.length > 0) {
                $("#topbar .topbar-rt-dropdown .topbar-form").each(function (index, element) {
                    if ($window.width() - ($(element).width() + $(element).offset().left) < 0) {
                        $(element).addClass("rt-dropdown-invert")
                    }
                })
            }
        },
        search: function () {
            var $search = $("#search");
            if ($search.length > 0) {
                var searchBtn = $("#btn-search"),
                    searchBtnClose = $("#btn-search-close"),
                    searchInput = $search.find(".form-control");

                function openSearch() {
                    $body.addClass("search-open");
                    searchInput.focus()
                }

                function closeSearch() {
                    $body.removeClass("search-open");
                    searchInput.value = ""
                }
                searchBtn.on("click", function () {
                    openSearch();
                    return !1
                })
                searchBtnClose.on("click", function () {
                    closeSearch();
                    return !1
                })
                document.addEventListener("keyup", function (ev) {
                    if (ev.keyCode == 27) {
                        closeSearch()
                    }
                })
            }
        },
        mainMenu: function () {
            if ($mainMenu.length > 0) {
                $mainMenu.find(".rt-dropdown, .rt-dropdown-submenu").prepend('<span class="rt-dropdown-arrow"></span>');
                var $menuItemLinks = $('#rt-mainMenu nav > ul > li.rt-dropdown > a[href="#"], #rt-mainMenu nav > ul > li.rt-dropdown > .rt-dropdown-arrow, .rt-dropdown-submenu > a[href="#"], .rt-dropdown-submenu > .rt-dropdown-arrow, .rt-dropdown-submenu > span, .page-menu nav > ul > li.rt-dropdown > a'),
                    $triggerButton = $("#rt-mainMenu-trigger a, #rt-mainMenu-trigger button"),
                    processing = !1,
                    triggerEvent;
                $triggerButton.on("click", function (e) {
                    var elem = $(this);
                    e.preventDefault();
                    $(window).breakpoints("lessThan", "lg", function () {
                        var openMenu = function () {
                            if (!processing) {
                                processing = !0;
                                Settings.menuIsOpen = !0;
                                if (Settings.submenuLight && Settings.headerHasDarkClass) {
                                    $header.removeClass("rt-dark");
                                    Settings.headerDarkClassRemoved = !0
                                } else {
                                    if (Settings.headerHasDarkClass && Settings.headerDarkClassRemoved) {
                                        $header.addClass("rt-dark")
                                    }
                                }
                                elem.addClass("toggle-active");
                                $body.addClass("rt-mainMenu-open");
                                RADIANT.header.logoStatus();
                                $mainMenu.animate({
                                    "min-height": $window.height()
                                }, {
                                    duration: 500,
                                    easing: "easeInOutQuart",
                                    start: function () {
                                        setTimeout(function () {
                                            $mainMenu.addClass("menu-animate")
                                        }, 300)
                                    },
                                    complete: function () {
                                        processing = !1
                                    }
                                })
                            }
                        }
                        var closeMenu = function () {
                            if (!processing) {
                                processing = !0;
                                Settings.menuIsOpen = !1;
                                RADIANT.header.logoStatus();
                                $mainMenu.animate({
                                    "min-height": 0
                                }, {
                                    start: function () {
                                        $mainMenu.removeClass("menu-animate")
                                    },
                                    done: function () {
                                        $body.removeClass("rt-mainMenu-open");
                                        elem.removeClass("toggle-active");
                                        if (Settings.submenuLight && Settings.headerHasDarkClass && Settings.headerDarkClassRemoved && !$header.hasClass("header-sticky")) {
                                            $header.addClass("rt-dark")
                                        }
                                        if (Settings.sliderDarkClass && Settings.headerHasDarkClass && Settings.headerDarkClassRemoved) {
                                            $header.removeClass("rt-dark");
                                            Settings.headerDarkClassRemoved = !0
                                        }
                                    },
                                    duration: 500,
                                    easing: "easeInOutQuart",
                                    complete: function () {
                                        processing = !1
                                    }
                                })
                            }
                        }
                        if (!Settings.menuIsOpen) {
                            triggerEvent = openMenu()
                        } else {
                            triggerEvent = closeMenu()
                        }
                    })
                })
                $menuItemLinks.on("click", function (e) {
                    $(this).parent("li").siblings().removeClass("hover-active");
                    $(this).parent("li").toggleClass("hover-active");
                    e.stopPropagation();
                    e.preventDefault()
                });
                $body.on("click", function (e) {
                    $mainMenu.find(".hover-active").removeClass("hover-active")
                });
                $(window).breakpoints("greaterEqualTo", "lg", function () {
                    var $menuLastItem = $("nav > ul > li:last-child"),
                        $menuLastItemUl = $("nav > ul > li:last-child > ul"),
                        $menuLastInvert = $menuLastItemUl.width() - $menuLastItem.width(),
                        $menuItems = $("nav > ul > li").find(".rt-dropdown-menu");
                    $menuItems.css("display", "block");
                    $(".rt-dropdown:not(.mega-menu-item) ul ul").each(function (index, element) {
                        if ($window.width() - ($(element).width() + $(element).offset().left) < 0) {
                            $(element).addClass("menu-invert")
                        }
                    })
                    /*if ($window.width() - ($menuLastItemUl.width() + $menuLastItem.offset().left) < 0) {
                        $menuLastItemUl.addClass("menu-last")
                    }*/
                    $menuItems.css("display", "")
                })
            }
        },
        mainMenuOverlay: function () {},


        dotsMenu: function () {
            var $dotsMenu = $("#dotsMenu"),
                $dotsMenuItems = $dotsMenu.find("ul > li > a");
            if ($dotsMenu.length > 0) {
                $dotsMenuItems.on("click", function () {
                    $dotsMenuItems.parent("li").removeClass("current");
                    $(this).parent("li").addClass("current");
                    return !1
                })
                $dotsMenuItems.parents("li").removeClass("current");
                $dotsMenu.find('a[href="#' + RADIANT.header.currentSection() + '"]').parent("li").addClass("current")
            }
        },

    }

    RADIANT.elements = {
        functions: function () {
            // RADIANT.elements.shapeDivider();
            RADIANT.elements.naTo();
            RADIANT.elements.animations();
            RADIANT.elements.progressBar();
            // RADIANT.elements.gridLayout();
            RADIANT.elements.bootstrapSwitch();
            RADIANT.elements.other();
        },
        progressBar: function () {
			var $progressBar = $(".p-progress-bar") || $(".progress-bar");
			if ($progressBar.length > 0) {
				$progressBar.each(function (i, elem) {
					var $elem = $(this),
						percent = $elem.attr("data-percent") || "100",
						delay = $elem.attr("data-delay") || "60",
						type = $elem.attr("data-type") || "%";
					if (!$elem.hasClass("progress-animated")) {
						$elem.css({ width: "0%" });
					}
					var progressBarRun = function () {
						$elem.animate({ width: percent + "%" }, "easeInOutCirc").addClass("progress-animated");
						$elem.delay(delay).append('<span class="progress-type">' + type + '</span><span class="progress-number animated fadeIn">' + percent + "</span>");
					};
					if ($body.hasClass("breakpoint-lg") || $body.hasClass("breakpoint-xl")) {
						new Waypoint({
							element: $(elem),
							handler: function () {
								var t = setTimeout(function () {
									progressBarRun();
								}, delay);
								this.destroy();
							},
							offset: "100%",
						});
					} else {
						progressBarRun();
					}
				});
			}
		},
        other: function (context) {
            $(function () {
                $(".lazy").Lazy({
                    afterLoad: function (element) {
                        element.addClass("img-loaded")
                    }
                })
            })
            if ($(".toggle-item").length > 0) {
                $(".toggle-item").each(function () {
                    var elem = $(this),
                        toggleItemClass = elem.attr("data-class"),
                        toggleItemClassTarget = elem.attr("data-target")
                    elem.on("click", function () {
                        if (toggleItemClass) {
                            if (toggleItemClassTarget) {
                                $(toggleItemClassTarget).toggleClass(toggleItemClass)
                            } else {
                                elem.toggleClass(toggleItemClass)
                            }
                        }
                        elem.toggleClass("toggle-active");
                        return !1
                    })
                })
            }
            var $pDropdown = $(".p-rt-dropdown");
            if ($pDropdown.length > 0) {
                $pDropdown.each(function () {
                    var elem = $(this);
                    elem.find('> a').on("click", function () {
                        elem.toggleClass("rt-dropdown-active");
                        return !1
                    });
                    if ($window.width() / 2 > elem.offset().left) {
                        elem.addClass("p-rt-dropdown-invert")
                    }
                })
            }
        },
        naTo: function () {
            $("a.scroll-to, #dotsMenu > ul > li > a, .menu-one-page nav > ul > li > a").on("click", function () {
                var extraPaddingTop = 0,
                    extraHeaderHeight = 0
                $(window).breakpoints("lessThan", "lg", function () {
                    if (Settings.menuIsOpen) {
                        $mainMenuTriggerBtn.trigger("click")
                    }
                    if ($header.attr("data-responsive-fixed") === !0) {
                        extraHeaderHeight = $header.height()
                    }
                })
                $(window).breakpoints("greaterEqualTo", "lg", function () {
                    if ($header.length > 0) {
                        extraHeaderHeight = $header.height()
                    }
                })
                if ($(".dashboard").length > 0) {
                    extraPaddingTop = 30
                }
                var $anchor = $(this)
                $("html, body").stop(!0, !1).animate({
                    scrollTop: $($anchor.attr("href")).offset().top - (extraHeaderHeight + extraPaddingTop)
                }, 1500, "easeInOutExpo")
                return !1
            })
        },

        animations: function () {
            var $animate = $("[data-animate]")
            if ($animate.length > 0) {
                if (typeof Waypoint === "undefined") {
                    RADIANT.elements.notification("Warning", "jQuery Waypoint plugin is missing in plugins.js file.", "danger")
                    return !0
                }
                $animate.each(function () {
                    var elem = $(this)
                    elem.addClass("animated")
                    elem.options = {
                        animation: elem.attr("data-animate") || "fadeIn",
                        delay: elem.attr("data-animate-delay") || 200,
                        direction: ~elem.attr("data-animate").indexOf("Out") ? "back" : "forward",
                        offsetX: elem.attr("data-animate-offsetX") || 0,
                        offsetY: elem.attr("data-animate-offsetY") || -100
                    }
                    if (elem.options.direction == "forward") {
                        new Waypoint({
                            element: elem,
                            handler: function () {
                                var t = setTimeout(function () {
                                    elem.addClass(elem.options.animation + " visible")
                                }, elem.options.delay)
                                this.destroy()
                            },
                            offset: "100%"
                        })
                    } else {
                        elem.addClass("visible")
                        elem.on("click", function () {
                            elem.addClass(elem.options.animation)
                            return !1
                        })
                    }
                    if (elem.parents(".demo-play-animations").length) {
                        elem.on("click", function () {
                            elem.removeClass(elem.options.animation)
                            var t = setTimeout(function () {
                                elem.addClass(elem.options.animation)
                            }, 50)
                            return !1
                        })
                    }
                })
            }
        },

        bootstrapSwitch: function () {
            var $bootstrapSwitch = $("[data-switch=true]")
            if ($bootstrapSwitch.length > 0) {
                if (typeof $.fn.bootstrapSwitch === "undefined") {
                    RADIANT.elements.notification("Warning", "jQuery bootstrapSwitch plugin is missing in plugins.js file.", "danger")
                    return !0
                }
                $bootstrapSwitch.bootstrapSwitch()
            }
        },


    }

    $(document).ready(function () {
        RADIANT.core.functions();
        RADIANT.header.functions();
        // RADIANT.slider.functions();
        // RADIANT.widgets.functions();
        RADIANT.elements.functions()
    })
    $window.on("scroll", function () {
        RADIANT.header.stickyHeader();
        // RADIANT.core.scrollTop();
        RADIANT.header.dotsMenu()
    })
    $window.on("resize", function () {
        RADIANT.header.logoStatus();
        RADIANT.header.stickyHeader()
    })
})(jQuery)
