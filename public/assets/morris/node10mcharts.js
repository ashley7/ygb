/**
 * Theme: Velonic Admin Template
 * Author: Coderthemes
 * Morris Chart
 */

!(function($) {
  "use strict";

  var MorrisCharts = function() {};

  //creates line chart
  (MorrisCharts.prototype.createLineChart = function(
    element,
    data,
    xkey,
    ykeys,
    labels,
    lineColors
  ) {
    Morris.Line({
      element: element,
      data: data,
      xkey: xkey,
      ykeys: ykeys,
      labels: labels,
      resize: true, //defaulted to true
      lineColors: lineColors
    });
  }),
    //creates area chart
    (MorrisCharts.prototype.createAreaChart = function(
      element,
      pointSize,
      lineWidth,
      data,
      xkey,
      ykeys,
      labels,
      lineColors
    ) {
      Morris.Area({
        element: element,
        pointSize: 0,
        lineWidth: 0,
        data: data,
        xkey: xkey,
        ykeys: ykeys,
        labels: labels,
        resize: true,
        lineColors: lineColors
      });
    }),
    //creates Bar chart
    (MorrisCharts.prototype.createBarChart = function(
      element,
      data,
      xkey,
      ykeys,
      labels,
      lineColors
    ) {
      Morris.Bar({
        element: element,
        data: data,
        xkey: xkey,
        ykeys: ykeys,
        labels: labels,
        barColors: lineColors
      });
    }),
    //creates Donut chart
    (MorrisCharts.prototype.createDonutChart = function(element, data, colors) {
      Morris.Donut({
        element: element,
        data: data,
        colors: colors
      });
    }),
    (MorrisCharts.prototype.init = function() {
  
                                                //creating bar chart
                                                var $vin_vmcu = [{ y: "2009", a: 100, b: 90}, { y: "2010", a: 75, b: 65 }, { y: "2011", a: 50, b: 40 }, { y: "2012", a: 75, b: 65 }, { y: "2013", a: 50, b: 40}, { y: "2014", a: 75, b: 65}, { y: "2015", a: 100, b: 90 }];
                                                this.createLineChart("vin_vmcu_10m", $vin_vmcu, "y", ["a", "b"], ["V_IN", "V_MCU"], ["#3bc0c3", "#1a2942"]);

                                                //creating bar chart
                                                var $insulation_sensor = [{ y: "2009", a: 100, b: 90, c: 40 }, { y: "2010", a: 75, b: 65, c: 20 }, { y: "2011", a: 50, b: 40, c: 50 }, { y: "2012", a: 75, b: 65, c: 95 }, { y: "2013", a: 50, b: 40, c: 22 }, { y: "2014", a: 75, b: 65, c: 56 }, { y: "2015", a: 100, b: 90, c: 60 }];
                                                this.createLineChart("insulation_sensor", $insulation_sensor, "y", ["a", "b", "c"], ["Series A", "Series B", "Series c"], ["#3bc0c3", "#1a2942", "#dcdcdc"]);
                                                 
                                                var $wind_speed_sensor = [{ y: "2009", a: 100, b: 90, c: 40 }, { y: "2010", a: 75, b: 65, c: 20 }, { y: "2011", a: 50, b: 40, c: 50 }, { y: "2012", a: 75, b: 65, c: 95 }, { y: "2013", a: 50, b: 40, c: 22 }, { y: "2014", a: 75, b: 65, c: 56 }, { y: "2015", a: 100, b: 90, c: 60 }];
                                                this.createLineChart("windspeed_sensor", $wind_speed_sensor, "y", ["a", "b", "c"], ["Series A", "Series B", "Series c"], ["#3bc0c3", "#1a2942", "#dcdcdc"]);

                                                var $wind_direction_sensor = [{ y: "2009", a: 100, b: 90, c: 40 }, { y: "2010", a: 75, b: 65, c: 20 }, { y: "2011", a: 50, b: 40, c: 50 }, { y: "2012", a: 75, b: 65, c: 95 }, { y: "2013", a: 50, b: 40, c: 22 }, { y: "2014", a: 75, b: 65, c: 56 }, { y: "2015", a: 100, b: 90, c: 60 }];
                                                this.createLineChart("wind_direction_sensor", $wind_direction_sensor, "y", ["a", "b", "c"], ["Series A", "Series B", "Series c"], ["#3bc0c3", "#1a2942", "#dcdcdc"]);

                                                
                                              }),
    //init
    ($.MorrisCharts = new MorrisCharts()),
    ($.MorrisCharts.Constructor = MorrisCharts);
})(window.jQuery),
  //initializing
  (function($) {
    "use strict";
    $.MorrisCharts.init();
  })(window.jQuery);
