<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
    $array=explode('/',Request::url());
    $end = end($array);
    ?>
    <title>{{$end}} page - Error Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="/static/css/bootstrap.css" rel="stylesheet">
    <link href="/static/css/tagmanager.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link rel="stylesheet" href="/static/css/bootstrap-glyphicons.css">
    <link rel="stylesheet" href="/static/css/sb-admin.css">
    <link rel="stylesheet" href="/static/fonts/css/fonts.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="/static/css/morris-0.4.3.min.css">
    @section('css')

    @stop
</head>

<body>

<div id="wrapper">

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/admin">Error SWG Admin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            @section('sidebar')
            <ul class="nav navbar-nav side-nav">
                <li class="active"><a href="/admin"><i class="fa fa-dashboard"></i>صفحه ی اول</a></li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i>{{trans('general.website_content')}}<b
                            class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/admin/brand">{{trans('general.brand')}}</a></li>
                        <li><a href="/admin/category">نوع محصول</a></li>
                        <li><a href="/admin/product">محصول نهایی</a></li>
                        <li><a href="/admin/slider">{{trans('general.slider')}}</a></li>
                        <li><a href="/admin/static">{{trans('general.static')}}</a></li>
                    </ul>
                </li>
            </ul>
            @show
            @section('header')
            <ul class="nav navbar-nav navbar-right navbar-user">
                <li class="dropdown messages-dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages
                        <span class="badge">0</span> <b class="caret"></b></a>
                    <!--<ul class="dropdown-menu">
                        <li class="dropdown-header">7 New Messages</li>
                        <li class="message-preview">
                            <a href="">
                                <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                <span class="name">John Smith:</span>
                                <span class="message">Hey there, I wanted to ask you something...</span>
                                <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li class="message-preview">
                            <a href="">
                                <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                <span class="name">John Smith:</span>
                                <span class="message">Hey there, I wanted to ask you something...</span>
                                <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li class="message-preview">
                            <a href="">
                                <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                <span class="name">John Smith:</span>
                                <span class="message">Hey there, I wanted to ask you something...</span>
                                <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="">View Inbox <span class="badge">7</span></a></li>
                    </ul>-->
                </li>
                <li class="dropdown alerts-dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Alerts <span
                            class="badge">0</span> <b class="caret"></b></a>
<!--                    <ul class="dropdown-menu">
                        <li><a href="">Default <span class="label label-default">Default</span></a></li>
                        <li><a href="">Primary <span class="label label-primary">Primary</span></a></li>
                        <li><a href="">Success <span class="label label-success">Success</span></a></li>
                        <li><a href="">Info <span class="label label-info">Info</span></a></li>
                        <li><a href="">Warning <span class="label label-warning">Warning</span></a></li>
                        <li><a href="">Danger <span class="label label-danger">Danger</span></a></li>
                        <li class="divider"></li>
                        <li><a href="">View All</a></li>
                    </ul>-->
                </li>
                <li class="dropdown user-dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>@{{Auth::user()->name}} @{{Auth::user()->family}}<b
                            class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href=""><i class="fa fa-user"></i>Profile</a></li>
                        <li><a href=""><i class="fa fa-envelope"></i> Inbox <span class="badge">0</span></a></li>
                        <li><a href=""><i class="fa fa-gear"></i> Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="/user/logout"><i class="fa fa-power-off"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
            @show
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1>پنل مدیریتی
<!--                    <small>Statistics Overview</small>-->
                </h1>
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i>
                        @yield('head_sub_menu')
                    </li>
                </ol>
<!--                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Welcome to SB Admin by <a class="alert-link" href="/static/http://startbootstrap.com">Start
                        Bootstrap</a>! Feel free to use this template for your admin needs! We are using a few different
                    plugins to handle the dynamic tables and charts, so make sure you check out the necessary
                    documentation links provided.
                </div>-->
            </div>
        </div>
        <!-- /.row -->
        @yield('body')
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@section('js')

@show
<!-- JavaScript -->
<script src="/static/js/jquery-1.10.2.js"></script>
<script src="/static/js/bootstrap.min.js"></script>

<!-- Page Specific Plugins -->
<script src="/static/js/raphael-min.js"></script>
<script src="/static/js/morris-0.4.3.min.js"></script>
<script src="/static/js/morris/chart-data-morris.js"></script>
<script src="/static/js/tablesorter/jquery.tablesorter.js"></script>
<script src="/static/js/tablesorter/tables.js"></script>
<script src="/static/js/typehead.js"></script>
<script src="/static/js/tagmanager.js"></script>
<script src="/static/js/scripts.js"></script>

</body>
</html>
