!function(t){"use strict";var e=function(){this.$body=t("body"),this.$window=t(window)};e.prototype.initMenu=function(){var e=this;t(".button-menu-mobile").on("click",function(i){i.preventDefault(),e.$body.toggleClass("enlarged"),t(".slimscroll-menu").slimscroll({height:"auto",position:"right",size:"8px",color:"#9ea5ab",wheelStep:5,touchScrollStep:50})}),t(".navbar-toggle").on("click",function(e){t(this).toggleClass("open")}),t("#side-menu").metisMenu(),t(".slimscroll-menu").slimscroll({height:"auto",position:"right",size:"8px",color:"#9ea5ab",wheelStep:5,touchScrollStep:50}),t(".right-bar-toggle").on("click",function(e){t("body").toggleClass("right-bar-enabled")}),t(document).on("click","body",function(e){t(e.target).closest(".right-bar-toggle, .right-bar").length>0||t("body").removeClass("right-bar-enabled")}),t("#sidebar-menu a").each(function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&(t(this).addClass("active"),t(this).parent().addClass("active"),t(this).parent().parent().addClass("in"),t(this).parent().parent().prev().addClass("active"),t(this).parent().parent().parent().addClass("active"),t(this).parent().parent().parent().parent().addClass("in"),t(this).parent().parent().parent().parent().parent().addClass("active"))})},e.prototype.initLayout=function(){var t=this;t.$window.width()<1025?t.$body.addClass("enlarged"):1!=t.$body.data("keep-enlarged")&&t.$body.removeClass("enlarged")},e.prototype.init=function(){var t=this;this.initLayout(),this.initMenu(),this.$window.on("resize",function(e){e.preventDefault(),t.initLayout()})},t.App=new e,t.App.Constructor=e}(window.jQuery),function(t){"use strict";window.jQuery.App.init()}();