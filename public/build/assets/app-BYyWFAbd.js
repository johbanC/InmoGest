(function(e){function r(){e("#side-menu").metisMenu()}function c(){e("#vertical-menu-btn").on("click",function(t){t.preventDefault(),e("body").toggleClass("sidebar-enable"),e(window).width()>=992?e("body").toggleClass("vertical-collpsed"):e("body").removeClass("vertical-collpsed")})}function l(){e("#sidebar-menu a").each(function(){var t=window.location.href.split(/[?#]/)[0];this.href==t&&(e(this).addClass("active"),e(this).parent().addClass("mm-active"),e(this).parent().parent().addClass("mm-show"),e(this).parent().parent().prev().addClass("mm-active"),e(this).parent().parent().parent().addClass("mm-active"),e(this).parent().parent().parent().parent().addClass("mm-show"),e(this).parent().parent().parent().parent().parent().addClass("mm-active"))})}function d(){e(".navbar-nav a").each(function(){var t=window.location.href.split(/[?#]/)[0];this.href==t&&(e(this).addClass("active"),e(this).parent().addClass("active"),e(this).parent().parent().addClass("active"),e(this).parent().parent().parent().addClass("active"),e(this).parent().parent().parent().parent().addClass("active"),e(this).parent().parent().parent().parent().parent().addClass("active"))})}function u(){e(document).ready(function(){if(e("#sidebar-menu").length>0&&e("#sidebar-menu .mm-active .active").length>0){var t=e("#sidebar-menu .mm-active .active").offset().top;t>300&&(t=t-300,e(".vertical-menu .simplebar-content-wrapper").animate({scrollTop:t},"slow"))}})}function m(){e('[data-bs-toggle="fullscreen"]').on("click",function(n){n.preventDefault(),e("body").toggleClass("fullscreen-enable"),!document.fullscreenElement&&!document.mozFullScreenElement&&!document.webkitFullscreenElement?document.documentElement.requestFullscreen?document.documentElement.requestFullscreen():document.documentElement.mozRequestFullScreen?document.documentElement.mozRequestFullScreen():document.documentElement.webkitRequestFullscreen&&document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT):document.cancelFullScreen?document.cancelFullScreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitCancelFullScreen&&document.webkitCancelFullScreen()}),document.addEventListener("fullscreenchange",t),document.addEventListener("webkitfullscreenchange",t),document.addEventListener("mozfullscreenchange",t);function t(){!document.webkitIsFullScreen&&!document.mozFullScreen&&!document.msFullscreenElement&&(console.log("pressed"),e("body").removeClass("fullscreen-enable"))}}function p(){e(".right-bar-toggle").on("click",function(t){e("body").toggleClass("right-bar-enabled")}),e(document).on("click","body",function(t){e(t.target).closest(".right-bar-toggle, .right-bar").length>0||e("body").removeClass("right-bar-enabled")})}function h(){if(document.getElementById("topnav-menu-content")){for(var t=document.getElementById("topnav-menu-content").getElementsByTagName("a"),n=0,s=t.length;n<s;n++)t[n].onclick=function(i){i.target.getAttribute("href")==="#"&&(i.target.parentElement.classList.toggle("active"),i.target.nextElementSibling.classList.toggle("show"))};window.addEventListener("resize",b)}}function b(){for(var t=document.getElementById("topnav-menu-content").getElementsByTagName("a"),n=0,s=t.length;n<s;n++)t[n].parentElement.getAttribute("class")==="nav-item dropdown active"&&(t[n].parentElement.classList.remove("active"),t[n].nextElementSibling.classList.remove("show"))}function g(){e(function(){e('[data-bs-toggle="tooltip"]').tooltip()}),e(function(){e('[data-bs-toggle="popover"]').popover()})}function f(){e(window).on("load",function(){e("#status").fadeOut(),e("#preloader").delay(350).fadeOut("slow")})}var a;function v(){if(window.sessionStorage){var t=sessionStorage.getItem("is_visited");t?(e(".right-bar input:checkbox").prop("checked",!1),e("#"+t).prop("checked",!0),o(t)):sessionStorage.setItem("is_visited","light-mode-switch")}e("#light-mode-switch, #dark-mode-switch, #rtl-mode-switch").on("change",function(n){o(n.target.id),document.body.getAttribute("data-bs-theme")=="light"&&document.body.getAttribute("data-topbar")=="light"&&(a=!0),a==!0&&document.body.getAttribute("data-bs-theme")=="light"&&document.body.setAttribute("data-topbar","light")})}function o(t){e("#light-mode-switch").prop("checked")==!0&&t==="light-mode-switch"?(e("html").removeAttr("dir"),e("#dark-mode-switch").prop("checked",!1),e("#rtl-mode-switch").prop("checked",!1),e("#bootstrap-style").attr("href","assets/css/bootstrap.min.css"),e("#app-style").attr("href","assets/css/app.min.css"),document.body.setAttribute("data-bs-theme","light"),document.body.getAttribute("data-bs-theme")=="light"&&document.body.getAttribute("data-topbar")=="light"?(document.body.setAttribute("data-topbar","light"),a=!0):document.body.getAttribute("data-bs-theme")=="light"&&document.body.getAttribute("data-topbar")=="dark"?document.body.setAttribute("data-topbar","dark"):document.body.setAttribute("data-topbar","light"),sessionStorage.setItem("is_visited","light-mode-switch")):e("#dark-mode-switch").prop("checked")==!0&&t==="dark-mode-switch"?(e("html").removeAttr("dir"),e("#light-mode-switch").prop("checked",!1),e("#rtl-mode-switch").prop("checked",!1),e("#bootstrap-style").attr("href","assets/css/bootstrap.min.css"),e("#app-style").attr("href","assets/css/app.min.css"),document.body.setAttribute("data-bs-theme","dark"),document.body.setAttribute("data-topbar","dark"),sessionStorage.setItem("is_visited","dark-mode-switch")):e("#rtl-mode-switch").prop("checked")==!0&&t==="rtl-mode-switch"&&(e("#light-mode-switch").prop("checked",!1),e("#dark-mode-switch").prop("checked",!1),e("#bootstrap-style").attr("href","assets/css/bootstrap.rtl.css"),e("#app-style").attr("href","assets/css/app.rtl.css"),e("html").attr("dir","rtl"),document.body.setAttribute("data-bs-theme","light"),document.body.setAttribute("data-topbar","light"),sessionStorage.setItem("is_visited","rtl-mode-switch"))}function w(){r(),c(),l(),d(),u(),m(),p(),h(),g(),v(),f(),Waves.init()}w()})(jQuery);
