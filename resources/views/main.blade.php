<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    @include('layouts.links')
       
</head>
<body>

        <!-- Aside Start-->
        @include('layouts.nav')
        <!-- Aside Ends-->


        <!--Main Content Start -->
        <section class="content">
            
            <!-- Header -->
            @include('layouts.header')
            <!-- Header Ends -->


            <!-- Page Content Start -->
            <!-- ================== -->
     
            <div class="wraper container-fluid">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('flash_message') }}
                    </div>
                @endif

                @yield('content')


            </div>
            <!-- Page Content Ends -->
            <!-- ================== -->

            <!-- Footer Start -->
           
            @include('layouts.footer')
            <!-- Footer Ends -->



        </section>
        <!-- Main Content Ends -->
        


        <!-- js placed at the end of the document so the pages load faster -->
        @include('layouts.scripts')

         @yield('pagescripts')
        
    

    </body>
</html>