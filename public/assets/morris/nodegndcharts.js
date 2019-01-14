/**
 * Theme: Velonic Admin Template
 * Author: Coderthemes
 * Morris Chart
 */
// $(function() {
  

//     var vmcu_chart = Morris.Line({
//     element: "vin_vmcu_gnd",
//     data: [],
//     xkey: "y",
//     ykeys: ["V_MCU", "V_IN"],
//     labels: ["V_MCU", "V_IN"],
//     parseTime: false,
//     resize: true,
//     lineColors: ["#3bc0c3", "#1a2942"]
//   });


  // function updateData(id, chart) {
  //    $.ajax({
  //      type: "GET",
  //      url: "/reportsGnd", // This is the URL to the API
  //      data: { id: id }
  //    })
  //      .done(function(mdata) {
  //        // When the response to the AJAX request comes back render the chart with new data
  //        //document.getElementById(id).innerHTML = "";
  //        var arr = [];
  //        arr = mdata;
  //        console.log(arr);
  //        chart.setData(arr);

  //        //chart.setData(JSON.parse(data));
  //      })
  //      .fail(function() {
  //        // If there is no communication between the server, show an error
  //        alert("error occured");
  //      });
  // }





 // updateData(16, vmcu_chart);

//   $("#station_id").change(function() {
//     var id = $(this).val();
//     //alert("Handler for .change() called."+id);
//     updateData(id,vmcu_chart);
//   });

// });



/*
!(function($) {
  "use strict";

  var MorrisCharts = function() {};
  

  //creates line chart
  (MorrisCharts.prototype.createLineChart = function(element,data,xkey,ykeys,labels,lineColors) {
    Morris.Line({element: element,data: data, xkey: xkey,ykeys: ykeys,labels: labels,
      resize: true, 
      lineColors: lineColors
    });

  }),
    //creates area chart
    (MorrisCharts.prototype.createAreaChart = function(
      element,pointSize,lineWidth,data,
      xkey,ykeys,labels,lineColors
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
                                                //create line chart
                                                // vin_vmcu_gnd precipitation soil_templature soil_moisture

                                                //station_id
                                                $("#station_id").change(
                                                  function() {
                                                    var id=$(this).val();

                                                    //alert("Handler for .change() called."+id);

                                                   $.ajax(
                                                     {
                                                       method:
                                                         "get", // Type of response and matches what we said in the route
                                                       url:"/reportsGnd/"+id, // This is the url we gave in the route
                                                        data: {
                                                            _token: '{!! csrf_token() !!}',
                                                            },
                                                          
                                                       dataType:"JSON",
                                                       success: function(response) {
                                                         // What to do if we succeed
                                                         var data = response.vin_vmcu;

                                                         var $vin_vmcu = data;
                                                         this.createLineChart("vin_vmcu_gnd", $vin_vmcu, "date_time", ["V_MCU", "V_IN"], ["V_MCU", "V_IN"], ["#3bc0c3", "#1a2942"]);


                                                         console.log(response);
                                                       },
                                                       error: function(jqXHR,textStatus,errorThrown) {
                                                         // What to do if we fail
                                                         console.log(JSON.stringify(jqXHR)
                                                         );
                                                         console.log("AJAX error: " + textStatus +" : " +errorThrown);
                                                       }
                                                     }
                                                   );

                                                  }
                                                );


                                                //creating bar chart
                                                var $precipitation = [{ y: "2009", a: 100, b: 90, c: 40 }, { y: "2010", a: 75, b: 65, c: 20 }, { y: "2011", a: 50, b: 40, c: 50 }, { y: "2012", a: 75, b: 65, c: 95 }, { y: "2013", a: 50, b: 40, c: 22 }, { y: "2014", a: 75, b: 65, c: 56 }, { y: "2015", a: 100, b: 90, c: 60 }];
                                                this.createLineChart("precipitation", $precipitation, "y", ["a", "b", "c"], ["Series A", "Series B", "Series c"], ["#3bc0c3", "#1a2942", "#dcdcdc"]);

                                                var $soil_templature = [{ y: "2009", a: 100, b: 90, c: 40 }, { y: "2010", a: 75, b: 65, c: 20 }, { y: "2011", a: 50, b: 40, c: 50 }, { y: "2012", a: 75, b: 65, c: 95 }, { y: "2013", a: 50, b: 40, c: 22 }, { y: "2014", a: 75, b: 65, c: 56 }, { y: "2015", a: 100, b: 90, c: 60 }];
                                                this.createLineChart("soil_templature", $soil_templature, "y", ["a", "b", "c"], ["Series A", "Series B", "Series c"], ["#3bc0c3", "#1a2942", "#dcdcdc"]);
                                                  
                                                var $soil_moisture = [{ y: "2009", a: 100, b: 90, c: 40 }, { y: "2010", a: 75, b: 65, c: 20 }, { y: "2011", a: 50, b: 40, c: 50 }, { y: "2012", a: 75, b: 65, c: 95 }, { y: "2013", a: 50, b: 40, c: 22 }, { y: "2014", a: 75, b: 65, c: 56 }, { y: "2015", a: 100, b: 90, c: 60 }];
                                                this.createLineChart("soil_moisture", $soil_moisture, "y", ["a", "b", "c"], ["Series A", "Series B", "Series c"], ["#3bc0c3", "#1a2942", "#dcdcdc"]);
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


*/