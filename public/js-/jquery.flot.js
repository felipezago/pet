!function(o){"use strict";var e=function(){this.$body=o("body"),this.$realData=[]};e.prototype.createPlotGraph=function(e,t,a,r,l,i,s,n){o.plot(o(e),[{data:t,label:l[0],color:i[0]},{data:a,label:l[1],color:i[1]},{data:r,label:l[2],color:i[2]}],{series:{lines:{show:!0,fill:!0,lineWidth:2,fillColor:{colors:[{opacity:.5},{opacity:.5},{opacity:.8}]}},points:{show:!1},shadowSize:2},grid:{hoverable:!0,clickable:!0,borderColor:s,tickColor:"#f9f9f9",borderWidth:1,labelMargin:30,backgroundColor:n},legend:{position:"ne",margin:[0,-32],noColumns:0,labelBoxBorderColor:null,labelFormatter:function(o,e){return o+"&nbsp;&nbsp;"},width:30,height:2},yaxis:{axisLabel:"Daily Visits",tickColor:"#f5f5f5",font:{color:"#bdbdbd"}},xaxis:{axisLabel:"Last Days",tickColor:"#f5f5f5",font:{color:"#bdbdbd"}},tooltip:!0,tooltipOpts:{content:"%s: Value of %x is %y",shifts:{x:-60,y:25},defaultTheme:!1},splines:{show:!0,tension:.4,lineWidth:1}})},e.prototype.createPlotDotGraph=function(e,t,a,r,l,i,s){o.plot(o(e),[{data:t,label:r[0],color:l[0]},{data:a,label:r[1],color:l[1]}],{series:{lines:{show:!0,fill:!1,lineWidth:3,fillColor:{colors:[{opacity:.3},{opacity:.3}]}},curvedLines:{apply:!0,active:!0,monotonicFit:!0},splines:{show:!0,tension:.4,lineWidth:5,fill:.4}},grid:{hoverable:!0,clickable:!0,borderColor:i,tickColor:"#f9f9f9",borderWidth:1,labelMargin:10,backgroundColor:s},legend:{position:"ne",margin:[0,-32],noColumns:0,labelBoxBorderColor:null,labelFormatter:function(o,e){return o+"&nbsp;&nbsp;"},width:30,height:2},yaxis:{axisLabel:"Gold Price(USD)",tickColor:"#f5f5f5",font:{color:"#bdbdbd"}},xaxis:{axisLabel:"Numbers",tickColor:"#f5f5f5",font:{color:"#bdbdbd"}},tooltip:!1})},e.prototype.createPieGraph=function(e,t,a,r){var l=[{label:t[0],data:a[0]},{label:t[1],data:a[1]},{label:t[2],data:a[2]}],i={series:{pie:{show:!0,radius:1}},legend:{show:!0,labelFormatter:function(o,e){return'<div style="font-size:14px;">&nbsp;'+o+"</div>"},labelBoxBorderColor:null,width:20},grid:{hoverable:!0,clickable:!0},colors:r,tooltip:!0,tooltipOpts:{content:"%s, %p.0%"}};o.plot(o(e),l,i)},e.prototype.randomData=function(){for(this.$realData.length>0&&(this.$realData=this.$realData.slice(1));this.$realData.length<300;){var o=(this.$realData.length>0?this.$realData[this.$realData.length-1]:50)+10*Math.random()-5;o<0?o=0:o>100&&(o=100),this.$realData.push(o)}for(var e=[],t=0;t<this.$realData.length;++t)e.push([t,this.$realData[t]]);return e},e.prototype.createRealTimeGraph=function(e,t,a){return o.plot(e,[t],{colors:a,series:{grow:{active:!1},shadowSize:0,lines:{show:!0,fill:!0,lineWidth:2,steps:!1}},grid:{show:!0,aboveData:!1,color:"#dcdcdc",labelMargin:15,axisMargin:0,borderWidth:0,borderColor:null,minBorderMargin:5,clickable:!0,hoverable:!0,autoHighlight:!1,mouseActiveRadius:20},tooltip:!0,tooltipOpts:{content:"Value is : %y.0%",shifts:{x:-30,y:-50}},yaxis:{axisLabel:"Response Time (ms)",min:0,max:100,tickColor:"#f5f5f5",color:"rgba(0,0,0,0.7)"},xaxis:{axisLabel:"Point Value (1000)",show:!0,tickColor:"#f5f5f5"}})},e.prototype.createDonutGraph=function(e,t,a,r){var l=[{label:t[0],data:a[0]},{label:t[1],data:a[1]},{label:t[2],data:a[2]},{label:t[3],data:a[3]},{label:t[4],data:a[4]}],i={series:{pie:{show:!0,innerRadius:.7}},legend:{show:!0,labelFormatter:function(o,e){return'<div style="font-size:14px;">&nbsp;'+o+"</div>"},labelBoxBorderColor:null,width:20},grid:{hoverable:!0,clickable:!0},colors:r,tooltip:!0,tooltipOpts:{content:"%s, %p.0%"}};o.plot(o(e),l,i)},e.prototype.createStackBarGraph=function(e,t,a,r){var l={bars:{show:!0,barWidth:.2,fill:1},grid:{show:!0,aboveData:!1,labelMargin:5,axisMargin:0,borderWidth:1,minBorderMargin:5,clickable:!0,hoverable:!0,autoHighlight:!1,mouseActiveRadius:20,borderColor:"#f5f5f5"},series:{stack:0},legend:{position:"ne",margin:[0,-32],noColumns:0,labelBoxBorderColor:null,labelFormatter:function(o,e){return o+"&nbsp;&nbsp;"},width:30,height:2},yaxis:t.y,xaxis:t.x,colors:a,tooltip:!0,tooltipOpts:{content:"%s : %y.0",shifts:{x:-30,y:-50}}};o.plot(o(e),r,l)},e.prototype.createLineGraph=function(e,t,a,r){var l={series:{lines:{show:!0},points:{show:!0}},legend:{position:"ne",margin:[0,-32],noColumns:0,labelBoxBorderColor:null,labelFormatter:function(o,e){return o+"&nbsp;&nbsp;"},width:30,height:2},yaxis:t.y,xaxis:t.x,colors:a,grid:{hoverable:!0,borderColor:"#f5f5f5",borderWidth:1,backgroundColor:"#fff"},tooltip:!0,tooltipOpts:{content:"%s : %y.0",shifts:{x:-30,y:-50}}};return o.plot(o(e),r,l)},e.prototype.createCombineGraph=function(e,t,a,r){var l=[{label:a[0],data:r[0],lines:{show:!0,fill:!0},points:{show:!0}},{label:a[1],data:r[1],lines:{show:!0},points:{show:!0}},{label:a[2],data:r[2],bars:{show:!0}}],i={series:{shadowSize:0},grid:{hoverable:!0,clickable:!0,tickColor:"#f9f9f9",borderWidth:1,borderColor:"#eeeeee"},colors:["#e3eaef","#6b5eae","#39afd1"],tooltip:!0,tooltipOpts:{defaultTheme:!1},legend:{position:"ne",margin:[0,-32],noColumns:0,labelBoxBorderColor:null,labelFormatter:function(o,e){return o+"&nbsp;&nbsp;"},width:30,height:2},yaxis:{axisLabel:"Point Value (1000)",tickColor:"#f5f5f5",font:{color:"#bdbdbd"}},xaxis:{axisLabel:"Daily Hours",ticks:t,tickColor:"#f5f5f5",font:{color:"#bdbdbd"}}};o.plot(o(e),l,i)},e.prototype.init=function(){this.createPlotGraph("#website-stats",[[0,13],[1,13],[2,14],[3,62],[4,13],[5,10],[6,56],[7,13],[8,12],[9,20],[10,48],[11,16],[12,14]],[[0,8],[1,10],[2,12],[3,14],[4,36],[5,7],[6,9],[7,10],[8,41],[9,17],[10,15],[11,13],[12,11]],[[0,3],[1,22],[2,8],[3,10],[4,7],[5,3],[6,5],[7,7],[8,6],[9,14],[10,35],[11,10],[12,8]],["Bitcoin","Ethereum","Litecoin"],["#39afd1","#e3eaef","#f24848"],"#f5f5f5","#fff");this.createPlotDotGraph("#website-stats1",[[0,2],[1,4],[2,7],[3,9],[4,6],[5,3],[6,10],[7,8],[8,5],[9,14],[10,10],[11,10],[12,8]],[[0,1],[1,3],[2,6],[3,7],[4,4],[5,2],[6,8],[7,6],[8,4],[9,10],[10,8],[11,14],[12,5]],["Bitcoin","Ethereum"],["#39afd1","#e3eaef"],"#f5f5f5","#fff");this.createPieGraph("#pie-chart #pie-chart-container",["Bitcoin","Ethereum","Litecoin"],[48,30,15],["#39afd1","#6b5eae","#e3eaef"]);var e=this.createRealTimeGraph("#flotRealTime",this.randomData(),["#f24848"]);e.draw();var t=this;!function a(){e.setData([t.randomData()]),e.draw(),setTimeout(a,(o("html").hasClass("mobile-device"),500))}();this.createDonutGraph("#donut-chart #donut-chart-container",["Bitcoin","Ethereum","Litecoin"],[48,30,15],["#39afd1","#33ce7a","#e3eaef"]);var a=[[[0,201],[1,520],[2,337],[3,261],[4,157],[5,95],[6,200],[7,250],[8,320],[9,500],[10,152],[11,214],[12,364],[13,449],[14,558],[15,282],[16,379],[17,429],[18,518],[19,470],[20,330],[21,245],[22,358],[23,74]],[[0,311],[1,630],[2,447],[3,371],[4,267],[5,205],[6,310],[7,360],[8,430],[9,610],[10,262],[11,324],[12,474],[13,559],[14,668],[15,392],[16,489],[17,539],[18,628],[19,580],[20,440],[21,355],[22,468],[23,184]],[[23,727],[22,128],[21,110],[20,92],[19,172],[18,63],[17,150],[16,592],[15,12],[14,246],[13,52],[12,149],[11,123],[10,2],[9,325],[8,10],[7,15],[6,89],[5,65],[4,77],[3,600],[2,200],[1,385],[0,200]]];this.createCombineGraph("#combine-chart #combine-chart-container",[[0,"22h"],[1,""],[2,"00h"],[3,""],[4,"02h"],[5,""],[6,"04h"],[7,""],[8,"06h"],[9,""],[10,"08h"],[11,""],[12,"10h"],[13,""],[14,"12h"],[15,""],[16,"14h"],[17,""],[18,"16h"],[19,""],[20,"18h"],[21,""],[22,"20h"],[23,""]],["Last 24 Hours","Last 48 Hours","Difference"],a);for(var r=[],l=0;l<=10;l+=1)r.push([l,parseInt(30*Math.random())]);var i=[];for(l=0;l<=10;l+=1)i.push([l,parseInt(30*Math.random())]);var s=[];for(l=0;l<=10;l+=1)s.push([l,parseInt(30*Math.random())]);var n=new Array;n.push({label:"Series One",data:r,bars:{order:1}}),n.push({label:"Series Two",data:i,bars:{order:2}}),n.push({label:"Series Three",data:s,bars:{order:3}}),this.createStackBarGraph("#ordered-bars-chart",{y:{axisLabel:"Sales Value (USD)",tickColor:"#f5f5f5",font:{color:"#bdbdbd"}},x:{axisLabel:"Last 10 Days",tickColor:"#f5f5f5",font:{color:"#bdbdbd"}}},["#39afd1","#33ce7a","#e3eaef"],n);var h=[],d=[];for(l=0;l<12;l+=.2)h.push([l,Math.sin(l+0)]),d.push([l,Math.cos(l+0)]);var c=[{data:h,label:"Google"},{data:d,label:"Yahoo"}];this.createLineGraph("#line-chart-alt",{y:{min:-1.2,max:1.2,tickColor:"#f5f5f5",font:{color:"#bdbdbd"}},x:{tickColor:"#f5f5f5",font:{color:"#bdbdbd"}}},["#39afd1","#e3eaef"],c)},o.FlotChart=new e,o.FlotChart.Constructor=e}(window.jQuery),function(o){"use strict";window.jQuery.FlotChart.init()}();