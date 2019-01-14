<header class="top-head container-fluid">
                <button type="button" class="navbar-toggle pull-left">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @php
                                                        $path = explode('/', Request::getPathInfo());
                                                        array_pop($path);
                                                        array_pop($path);
                                                        array_pop($path);
                                                        array_pop($path);
                                                        $string = implode('/', $path);
                                                        
                                                    @endphp

                <ul class="list-inline navbar-left top-menu top-left-menu" style="margin-top:10px" id="select_paths">
                    <li style="margin-left:10px;"><select class="form-control" id="regions_input"  onchange="redirect('{{$string}}/'+this.value+'/all/all/all',this.value)">
                        @foreach($regions as $district)
                        <option value="{{$district['name']}}" >{{$district['name']}}</option>
                        @endforeach
                        </select>
                    </li>
                    <li style="margin-left:5px;"><select class="form-control" id="districts_input" onchange="redirect('{{$string}}/'+$('#regions_input').val()+'/'+this.value+'/all/all',this.value); ">
                        <option value="all">All</option>
                        @foreach($districts as $district)
                        <option value="{{$district['name']}}" >{{$district['name']}}</option>
                        @endforeach
                        </select>
                    </li>
                    <li style="margin-left:10px;"><select class="form-control"  id="sub_input"  onchange="redirect('{{$string}}/'+$('#regions_input').val()+'/'+$('#districts_input').val()+'/'+this.value+'/all',this.value); ">
                        @foreach($subcounties as $district)
                        <option value="{{$district['name']}}">{{$district['name']}}</option>
                        @endforeach
                        </select>
                    </li>
                    <li style="margin-left:10px;"><select class="form-control"    name="" id="parish_input" onchange="redirect('{{$string}}/'+$('#regions_input').val()+'/'+$('#districts_input').val()+'/'+$('#sub_input').val()+'/'+this.value,this.value); ">
                        @foreach($parishes as $district)
                        <option value="{{$district['id']}}" >{{$district['name']}}</option>
                        @endforeach
                        </select>
                    </li>
                </ul>


                <!-- Left navbar -->


                <!-- Right navbar -->
                <ul class="list-inline navbar-right top-menu top-right-menu">


                    <!-- user login dropdown start-->
                    <li class="dropdown text-center">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="img/avatar-2.jpg" class="img-circle profile-img thumb-sm">
                            <span class="username"></span> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu extended pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">

                           <li><a href=""><i class="ion-calendar"></i> <span class="nav-label">Register Users</span></a></li>
                           
                            <li>
                                        <a href=""
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-sign-out"></i> Log Out
                                        </a>

                                        <form id="logout-form" action="" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- End right navbar -->

            </header>
