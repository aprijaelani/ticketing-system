<!DOCTYPE html>
<html lang="en">
<head>        
    <!-- META SECTION -->
    <title>PT. Kirana Sakit Komputindo</title>            
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->        
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/theme-default.css') }}"/>
    <!-- EOF CSS INCLUDE -->            
    <!-- START PLUGINS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/jquery/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>        
    <script type="text/javascript" src="{{ asset('js/actions.js') }}"></script>       
    <!-- END PLUGINS -->                        
</head>
<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container">

        <!-- START PAGE SIDEBAR -->
        <div id="mymenu" class="page-sidebar">
        @include('layouts.navigation')
        </div>
        <!-- END PAGE SIDEBAR -->

        <!-- PAGE CONTENT -->
        <div class="page-content">

            <!-- START X-NAVIGATION VERTICAL -->
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <!-- TOGGLE NAVIGATION -->
                <li class="xn-icon-button">
                    <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                </li>
                <!-- END TOGGLE NAVIGATION -->
                <!-- SEARCH -->
                <!-- <li class="xn-search">
                    <form role="form">
                        <input type="text" name="search" placeholder="Search..."/>
                    </form>
                </li>    -->
                <!-- END SEARCH -->
                <!-- SIGN OUT -->
                
                <li class="xn-icon-button pull-right">
                    <a href="#" class="mb-control" data-box="#mb-signout" title="Log Out"><span class="fa fa-sign-out"></span></a>                     
                </li>
                @if($data_user->level == 3) 
                <li class="xn-icon-button pull-right">
                    <a href="/engineer/{{ $data_user->id }}/edit" title="Edit User"><span class="fa fa-user"></span></a>
                </li>   
                @endif
                @if($data_user->level == 2) 
                <li class="xn-icon-button pull-right">
                    <a href="/service-point-leader/{{ $data_user->id }}/edit-user" title="Edit User"><span class="fa fa-user"></span></a>
                </li>   
                @endif
                <!-- END SIGN OUT -->
                <!-- MESSAGES -->
                
                <!-- END MESSAGES -->
                <!-- TASKS -->
                <!-- <li class="xn-icon-button pull-right">
                    <a href="#"><span class="fa fa-tasks"></span></a>
                    <div class="informer informer-warning">3</div>
                    <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                        <div class="panel-heading">
                            <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>                                
                            <div class="pull-right">
                                <span class="label label-warning">3 active</span>
                            </div>
                        </div>
                        <div class="panel-body list-group scroll" style="height: 200px;">                                
                            <a class="list-group-item" href="#">
                                <strong>Phasellus augue arcu, elementum</strong>
                                <div class="progress progress-small progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                                </div>
                                <small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>
                            </a>
                            <a class="list-group-item" href="#">
                                <strong>Aenean ac cursus</strong>
                                <div class="progress progress-small progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
                                </div>
                                <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2014 / 80%</small>
                            </a>
                            <a class="list-group-item" href="#">
                                <strong>Lorem ipsum dolor</strong>
                                <div class="progress progress-small progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>
                                </div>
                                <small class="text-muted">John Doe, 23 Sep 2014 / 95%</small>
                            </a>
                            <a class="list-group-item" href="#">
                                <strong>Cras suscipit ac quam at tincidunt.</strong>
                                <div class="progress progress-small">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                </div>
                                <small class="text-muted">John Doe, 21 Sep 2014 /</small><small class="text-success"> Done</small>
                            </a>                                
                        </div>     
                        <div class="panel-footer text-center">
                            <a href="pages-tasks.html">Show all tasks</a>
                        </div>                            
                    </div>                        
                </li> -->
                <!-- END TASKS -->
            </ul>
            <!-- END X-NAVIGATION VERTICAL -->                     

            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
<!--                 <li><a href="#">Home</a></li>                    
                <li class="active">Dashboard</li> -->
            </ul>
            <!-- END BREADCRUMB -->                       

            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">
                @include('flash::message')
                @yield('content')

            </div>
            <!-- END PAGE CONTENT WRAPPER -->                                
        </div>            
        <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTAINER -->

    <!-- MESSAGE BOX-->
    <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                <div class="mb-content">
                    <p>Are you sure you want to log out?</p>                    
                    <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <a href="{{ route('logout') }}" 
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-success btn-lg">Yes</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MESSAGE BOX-->
    <!-- START PRELOADS -->
    <audio id="audio-alert" src="{{ asset('audio/alert.mp3') }}" preload="auto"></audio>
    <audio id="audio-fail" src="{{ asset('audio/fail.mp3') }}" preload="auto"></audio>
    <!-- END PRELOADS -->                  
    <!-- START SCRIPTS -->
    <!-- START THIS PAGE PLUGINS-->  
    <script>
        $('#flash-overlay-modal').modal();
    </script>      
    <script type='text/javascript' src="{{ asset('js/plugins/icheck/icheck.min.js') }}"></script>        
    <script type="text/javascript" src="{{ asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/scrolltotop/scrolltopcontrol.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/plugins/morris/raphael-min.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ asset('js/plugins/morris/morris.min.js') }}"></script>        -->
    <script type="text/javascript" src="{{ asset('js/plugins/rickshaw/d3.v3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/rickshaw/rickshaw.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>                
    <script type='text/javascript' src="{{ asset('js/plugins/bootstrap/bootstrap-datepicker.js') }}""></script>                
    <script type="text/javascript" src="{{ asset('js/plugins/owl/owl.carousel.min.js') }}"></script>                 

    <script type="text/javascript" src="{{ asset ('js/plugins/bootstrap/bootstrap-timepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('js/plugins/bootstrap/bootstrap-colorpicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('js/plugins/bootstrap/bootstrap-file-input.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('js/plugins/bootstrap/bootstrap-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('js/plugins/tagsinput/jquery.tagsinput.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/plugins/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- END THIS PAGE PLUGINS-->        
    <script type="text/javascript" src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/tableexport/tableExport.js') }}"></script>
    <script type="text/javascript" src="js/plugins/tableexport/jquery.base64.js"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/html2canvas.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/jspdf/libs/sprintf.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/jspdf/jspdf.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tableexport/jspdf/libs/base64.js')}}"></script> 
    <!-- START TEMPLATE -->
    <!-- <script type="text/javascript" src="{{ asset('js/settings.js') }}"></script> -->
    @yield('javascript')  
</body>
</html>                      






