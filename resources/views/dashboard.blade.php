@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-6">

        <!-- START BAR CHART -->
        <div class="panel panel-default" style="height: 400px;">
            <div class="panel-heading">
                <h3 class="panel-title">Bar Chart</h3>                                
            </div>
            <div class="panel-body">
                {!! Charts::assets() !!}
                {!! $chart->render() !!}
            </div>
        </div>
        <!-- END BAR CHART -->

    </div>

    <div class="col-md-3">

        <!-- START WIDGET CLOCK -->
        <div class="widget widget-info widget-padding-sm">
            <div class="widget-big-int plugin-clock">00:00</div>                            
            <div class="widget-subtitle plugin-date">Loading...</div>
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>                            
            <div class="widget-buttons widget-c3">
                <div class="col">
                    <a href="#"><span class="fa fa-clock-o"></span></a>
                </div>
                <div class="col">
                    <a href="#"><span class="fa fa-bell"></span></a>
                </div>
                <div class="col">
                    <a href="#"><span class="fa fa-calendar"></span></a>
                </div>
            </div>                            
        </div>                        
        <!-- END WIDGET CLOCK -->

    </div>
        <div class="col-md-3">

        <!-- START WIDGET MESSAGES -->
        <div class="widget widget-default widget-item-icon" onclick="location.href='/merchant';">
            <div class="widget-item-left">
                <span class="fa fa-home"></span>
            </div>                             
            <div class="widget-data">
                <a href="/merchant">
                    <div class="widget-int num-count">{{$total_merchant}}</div>
                    <div class="widget-title">Total Customer</div>
                    <div class="widget-subtitle">Our Customer</div>
                </a>
            </div>      
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>                            
        <!-- END WIDGET MESSAGES -->

    </div>
    <div class="col-md-3">

        <!-- START WIDGET MESSAGES -->
        <div class="widget widget-default widget-item-icon" onclick="location.href='/service-point';">
            <div class="widget-item-left">
                <span class="fa fa-map-marker"></span>
            </div>                             
            <div class="widget-data">
                <a href="/service-point">
                    <div class="widget-int num-count">{{$total_service_point}}</div>
                    <div class="widget-title">Total Service Point</div>
                    <div class="widget-subtitle">Our Service Point</div>
                </a>
            </div>      
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>                            
        <!-- END WIDGET MESSAGES -->

    </div>
    <div class="col-md-3">

        <!-- START WIDGET REGISTRED -->
        <div class="widget widget-default widget-item-icon" onclick="location.href='/user';">
            <div class="widget-item-left">
                <span class="fa fa-user"></span>
            </div>
            <div class="widget-data">
                <a href="/user">
                    <div class="widget-int num-count">{{$total_engineer}}</div>
                    <div class="widget-title">Total IT Support</div>
                    <div class="widget-subtitle">Our IT Support</div>
                </a>
            </div>
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>                            
        </div>                            
        <!-- END WIDGET REGISTRED -->

    </div>
    <div class="col-md-3">

        <!-- START WIDGET MESSAGES -->
        <div class="widget widget-default widget-item-icon" onclick="location.href='/admin-services/schedule';">
            <div class="widget-item-left">
                <span class="fa fa-wrench"></span>
            </div>                             
            <div class="widget-data">
                <a href="/admin-services/schedule">
                    <div class="widget-int num-count">{{$total_service_active}}</div>
                    <div class="widget-title">Total Service Active</div>
                    <div class="widget-subtitle">Our Service Active</div>
                </a>
            </div>      
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>                            
        <!-- END WIDGET MESSAGES -->

    </div>
    <div class="col-md-3">

        <!-- START WIDGET REGISTRED -->
        <div class="widget widget-default widget-item-icon" onclick="location.href='/admin-services/completed';">
            <div class="widget-item-left">
                <span class="fa fa-check"></span>
            </div>
            <div class="widget-data">
                <a href="/admin-services/completed">
                    <div class="widget-int num-count">{{$total_service_completed}}</div>
                    <div class="widget-title">Total Service Completed</div>
                    <div class="widget-subtitle">Our Service Completed</div>
                </a>
            </div>
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>                            
        </div>                            
        <!-- END WIDGET REGISTRED -->

    </div>

</div>

<div class="row">
    <div class="col-md-6">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">                                
                <h3 class="panel-title">Total Case Service Point {{date('F Y')}}</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Service Point Name</th>
                            <th>Total Case</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($total_case as $total_cases)
                        <tr>
                            <td>{{$total_cases->nama}}</td>
                            <td>{{$total_cases->total_service}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->
    </div>
    <div class="col-md-6">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">                                
                <h3 class="panel-title">Total Case Engineer {{date('F Y')}}</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Service Point</th>
                            <th>Total Case</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($total_case_engineer as $total_case_engineers)
                        <tr>
                            <td>{{$total_case_engineers->name}}</td>
                            <td>{{$total_case_engineers->nama}}</td>
                            <td>{{$total_case_engineers->total_service}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->
    </div>
</div> 
<!-- END WIDGETS --> 
@endsection