new ApexCharts(document.querySelector("#profile-chart"),{series:[{name:"Inflation",data:[2.3,3.1,4,10.1,4,3.6,3.2,2.3,1.4,.8,.5,.2]}],colors:["#556ee6","#34c38f"],chart:{height:350,type:"bar",toolbar:{show:!1}},plotOptions:{bar:{borderRadius:5,columnWidth:"28%",dataLabels:{position:"top"}}},dataLabels:{enabled:!0,formatter:function(o){return o+"%"},offsetY:-20,style:{fontSize:"12px",colors:["#BED1EF"]}},xaxis:{categories:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],position:"top",axisBorder:{show:!1},axisTicks:{show:!1},crosshairs:{fill:{type:"gradient",gradient:{colorFrom:"#D8E3F0",colorTo:"#BED1E6",stops:[0,100],opacityFrom:.8,opacityTo:.5}}},tooltip:{enabled:!0}},yaxis:{axisBorder:{show:!1},axisTicks:{show:!1},labels:{show:!1,formatter:function(o){return o+"%"}}}}).render();