        <script src="{{ asset('main.js') }}"></script>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/modernizr.min.js') }}"></script>
        <script src="{{ asset('js/pace.min.js') }}"></script>
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/chat/moment-2.2.1.js') }}"></script>

        <!-- Counter-up -->
        <script src="{{ asset('js/waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/jquery.counterup.min.js') }}" type="text/javascript"></script>

        <!-- EASY PIE CHART JS -->
        <script src="{{ asset('assets/easypie-chart/easypiechart.min.js') }}"></script>
        <script src="{{ asset('assets/easypie-chart/jquery.easypiechart.min.js') }}"></script>
        <script src="{{ asset('assets/easypie-chart/example.js') }}"></script>


        <!--C3 Chart-->
        <script src="{{ asset('assets/c3-chart/d3.v3.min.js') }}"></script>
        <script src="{{ asset('assets/c3-chart/c3.js') }}"></script>

        <!--Morris Chart-->
        <script src="{{ asset('assets/morris/morris.min.js') }}"></script>
        <script src="{{ asset('assets/morris/raphael.min.js') }}"></script>

        <script src="{{ asset('assets/charts/js/highcharts.js') }}"></script>
        <script src="{{ asset('assets/charts/js/highcharts-more.js') }}"></script>
        <script src="{{ asset('assets/charts/js/highcharts-3d.js') }}"></script>
        <script src="{{ asset('assets/charts/js/modules/exporting.js') }}"></script>
      

        <!-- sparkline -->
        <script src="{{ asset('assets/sparkline-chart/jquery.sparkline.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/sparkline-chart/chart-sparkline.js') }}" type="text/javascript"></script>

        <!-- sweet alerts -->
        <script src="{{ asset('assets/sweet-alert/sweet-alert.min.js') }}"></script>
        <script src="{{ asset('assets/sweet-alert/sweet-alert.init.js') }}"></script>

        <script src="{{ asset('js/jquery.app.js') }}"></script>
        <!-- Chat -->
        <script src="{{ asset('js/jquery.chat.js') }}"></script>
        <!-- Dashboard -->
        <script src="{{ asset('js/jquery.dashboard.js') }}"></script>

        <!-- Todo -->
        <script src="{{ asset('js/jquery.todo.js') }}"></script>

         @yield("page_specific_script_files")

        <!--Form Wizard-->
        <script src="{{ asset('assets/form-wizard/jquery.steps.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('assets/jquery.validate/jquery.validate.min.js') }}"></script>

        <!--wizard initialization-->
        <script src="{{ asset('assets/form-wizard/wizard-init.js') }}" type="text/javascript"></script>

         <script src="{{ asset('assets/timepicker/bootstrap-datepicker.js') }}"></script>

        <script src="assets/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/dataTables.bootstrap.js"></script>


        {{-- some scripts needed to for better UI with bootstrap --}}
        {{--  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>  --}}

        <script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/datatables/dataTables.bootstrap.js') }}"></script>

         <!-- Modal-Effect -->
         <script src="{{ asset('assets/modal-effect/js/classie.js') }}"></script>
        <script src="{{ asset('assets/modal-effect/js/modalEffects.js') }}"></script>
        <script src="{{ asset('assets/select2/select2.min.js') }}" type="text/javascript"></script>


        <script src="{{ asset('assets/toggles/toggles.min.js') }}"></script>

        <script type="text/javascript">
                            
                            g = new Dygraph(

                                // containing div
                                document.getElementById("graphdiv"),

                                // CSV or path to a CSV file.
                                "Date,Temperature\n" +
                                "2008-05-07,75\n" +
                                "2008-05-08,70\n" +
                                "2008-05-09,80\n"

                            );
                        </script>




        <script src="{{ asset('assets/dygraph/dygraph.min.js') }}" ></script>


        <script type="text/javascript">
            $(document).ready(function() {
                var region = JSON.parse("{{json_encode($region)}}".replace(/&quot;/g,'"'));
                var dist = JSON.parse("{{json_encode($dist)}}".replace(/&quot;/g,'"'));
                //console.log(dist)
                var sub = JSON.parse("{{json_encode($sub)}}".replace(/&quot;/g,'"'));
                var parish = JSON.parse("{{json_encode($parish)}}".replace(/&quot;/g,'"'));
                console.log(region,dist,sub,parish);
                $('#regions_input option[value="'+region+'"]').attr('selected','selected')
                $('#districts_input option[value="'+dist+'"]').attr('selected','selected')
                $('#sub_input option[value="'+sub+'"]').attr('selected','selected')
                $('#parish_input option[value="'+parish+'"]').attr('selected','selected')

                $('#datatable').dataTable();

                jQuery(".select2").select2({
                    width: '100%'
                });
                jQuery('.toggle').toggles({on: true});
            } );


  

        </script>
<script>
             
             (function (Highcharts) {
            Highcharts.wrap(Highcharts.seriesTypes.pie.prototype, 'render', function (proceed) {
    
                var chart = this.chart,
                center = this.center || (this.yAxis && this.yAxis.center),
                titleOption = this.options.title,
                box;
    
                proceed.call(this);
    
                if (center && titleOption) {
                    box = {
                        x: chart.plotLeft + center[0] - 0.5 * center[2],
                        y: chart.plotTop + center[1] - 0.5 * center[2],
                        width: center[2],
                        height: center[2]
                    };
                    if (!this.title) {
                        this.title = this.chart.renderer.label(titleOption.text)
                        .css(titleOption.style)
                        .add()
                    }
                    var labelBBox = this.title.getBBox();
                    if (titleOption.align == "center")
                        box.x -= labelBBox.width/2;
                    else if (titleOption.align == "right")
                        box.x -= labelBBox.width;
                    this.title.align(titleOption, null, box);
                }
            });
    
        } (Highcharts));

        Highcharts.setOptions({colors:[
                                '#FF1A1A',
                                '#228B22',
                                '#8FBC8F',
                                '#00CED1',
                                '#4D889D',
                                '#A03434',
                                '#4F9262',
                                '#F4B14D',
                                '#000000',
                                '#7D7B7C',
                                '#FF00FF'
                                
                                  ]
                                });

        function redirect(path,year){
                window.location = path
                    
        }
</script>    