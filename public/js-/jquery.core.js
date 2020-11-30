!function(t){"use strict";var i=function(){};i.prototype.initTooltipPlugin=function(){t.fn.tooltip&&t('[data-toggle="tooltip"]').tooltip()},i.prototype.initPopoverPlugin=function(){t.fn.popover&&t('[data-toggle="popover"]').popover()},i.prototype.initCustomModalPlugin=function(){t('[data-plugin="custommodal"]').on("click",function(i){i.preventDefault(),new Custombox.modal({content:{target:t(this).attr("href"),effect:t(this).attr("data-animation"),overlaySpeed:t(this).attr("data-overlaySpeed"),overlayColor:t(this).attr("data-overlayColor")}}).open()})},i.prototype.initSlimScrollPlugin=function(){t.fn.slimScroll&&t(".slimscroll-alt").slimScroll({position:"right",size:"5px",color:"#98a6ad",wheelStep:10}),t.fn.slimScroll&&t(".slimscroll").slimScroll({height:"auto",position:"right",size:"8px",color:"#9ea5ab"})},i.prototype.initRangeSlider=function(){t.fn.slider&&t('[data-plugin="range-slider"]').slider({})},i.prototype.initSwitchery=function(){t('[data-plugin="switchery"]').each(function(i,o){new Switchery(t(this)[0],t(this).data())})},i.prototype.initKnob=function(){t('[data-plugin="knob"]').each(function(i,o){t(this).knob()})},i.prototype.initCounterUp=function(){t(this).attr("data-delay")&&t(this).attr("data-delay"),t(this).attr("data-time")&&t(this).attr("data-time");t('[data-plugin="counterup"]').each(function(i,o){t(this).counterUp({delay:100,time:1200})})},i.prototype.init=function(){this.initTooltipPlugin(),this.initPopoverPlugin(),this.initSlimScrollPlugin(),this.initCustomModalPlugin(),this.initRangeSlider(),this.initSwitchery(),this.initKnob(),this.initCounterUp()},t.Components=new i,t.Components.Constructor=i}(window.jQuery),function(t){"use strict";window.jQuery.Components.init()}();