<!DOCTYPE html>
<html lang="en">

<head>
    <title>Savanna plc</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Free Datta Able Admin Template come up with latest Bootstrap 4 framework with basic components, form elements and lots of pre-made layout options" />
    <meta name="keywords"
        content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template" />
    <meta name="author" content="CodedThemes" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico" type="image/x-icon') }}">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/animation/css/animate.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="{{ url('/') }}"" class="b-brand">
                    <div class="b-bg">
                        <i class="feather icon-trending-up"></i>
                    </div>
                    <span class="b-title">Savanna plc</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <!-- <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                        <a href="index.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li> -->

                    <li data-username="dashboard" class="nav-item active">
                        <a href="{{ url('/') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>

                    <li data-username="dashboard" class="nav-item active">
                        <a href="{{ url('/site') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-feather"></i></span><span class="pcoded-mtext">My
                                Sites</span></a>
                    </li>

                    <li data-username="dashboard" class="nav-item active">
                        <a href="{{ url('devices') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-folder"></i></span><span class="pcoded-mtext">Device
                                Management</span></a>
                    </li>

                    <li data-username="dashboard" class="nav-item active">
                        <a href="{{ url('/user_management') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-user"></i></span><span class="pcoded-mtext">Users</span></a>
                    </li>

                    <li data-username="dashboard" class="nav-item active">
                        <a href="{{ route('settings') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-settings"></i></span><span
                                class="pcoded-mtext">Settings</span></a>
                    </li>

                    <li data-username="dashboard" class="nav-item active">
                        <a href="{{ url('/subscriptions') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-trending-up"></i></span><span class="pcoded-mtext">Billing &
                                Subscription</span></a>
                    </li>

                    <li data-username="dashboard" class="nav-item active">
                        <a href="{{ url('/help') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-help-circle"></i></span><span
                                class="pcoded-mtext">Help</span></a>
                    </li>

{{--
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span
                                class="pcoded-mtext">Components</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="bc_button.html" class="">Button</a></li>
                            <li class=""><a href="bc_badges.html" class="">Badges</a></li>
                            <li class=""><a href="bc_breadcrumb-pagination.html" class="">Breadcrumb &
                                    paggination</a></li>
                            <li class=""><a href="bc_collapse.html" class="">Collapse</a></li>
                            <li class=""><a href="bc_tabs.html" class="">Tabs & pills</a></li>
                            <li class=""><a href="bc_typography.html" class="">Typography</a></li>


                            <li class=""><a href="icon-feather.html" class="">Feather<span
                                        class="pcoded-badge label label-danger">NEW</span></a></li>
                        </ul>
                    </li> --}}
                    {{-- <li class="nav-item pcoded-menu-caption">
                        <label>Forms & table</label>
                    </li> --}}
                    {{-- <li data-username="form elements advance componant validation masking wizard picker select"
                        class="nav-item">
                        <a href="form_elements.html" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file-text"></i></span><span class="pcoded-mtext">Form
                                elements</span></a>
                    </li> --}}
                    {{-- <li data-username="Table bootstrap datatable footable" class="nav-item">
                        <a href="tbl_bootstrap.html" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-server"></i></span><span class="pcoded-mtext">Table</span></a>
                    </li> --}}
                    {{-- <li class="nav-item pcoded-menu-caption">
                        <label>Chart & Maps</label>
                    </li> --}}
                    {{-- <li data-username="Charts Morris" class="nav-item"><a href="chart-morris.html"
                            class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-pie-chart"></i></span><span
                                class="pcoded-mtext">Chart</span></a></li> --}}
                    {{-- <li data-username="Maps Google" class="nav-item"><a href="map-google.html"
                            class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span
                                class="pcoded-mtext">Maps</span></a></li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Pages</label>
                    </li> --}}
                    {{-- <li data-username="Authentication Sign up Sign in reset password Change password Personal information profile settings map form subscribe"
                        class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-lock"></i></span><span
                                class="pcoded-mtext">Authentication</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="auth-signup.html" class="" target="_blank">Sign up</a>
                            </li>
                            <li class=""><a href="auth-signin.html" class="" target="_blank">Sign in</a>
                            </li>
                        </ul>
                    </li> --}}
                    {{-- <li data-username="Sample Page" class="nav-item"><a href="sample-page.html"
                            class="nav-link"><span class="pcoded-micon"><i
                                    class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Sample
                                page</span></a></li> --}}
                    <li data-username="Disabled Menu" class="nav-item disabled"><a href="javascript:"
                            class="nav-link"><span class="pcoded-micon"><i
                                    class="feather icon-power"></i></span><span class="pcoded-mtext">Disabled
                                menu</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
            <a href="index.html" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div>
                <span class="b-title">Savana plc</span>
            </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="javascript:">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i
                            class="feather icon-maximize"></i></a></li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown">Dropdown</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:">Action</a></li>
                        <li><a class="dropdown-item" href="javascript:">Another action</a></li>
                        <li><a class="dropdown-item" href="javascript:">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <div class="main-search">
                        <div class="input-group">
                            <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
                            <a href="javascript:" class="input-group-append search-close">
                                <i class="feather icon-x input-group-text"></i>
                            </a>
                            <span class="input-group-append search-btn btn btn-primary">
                                <i class="feather icon-search input-group-text"></i>
                            </span>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown"><i
                                class="icon feather icon-bell"></i></a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">Notifications</h6>
                                <div class="float-right">
                                    <a href="javascript:" class="m-r-10">mark as read</a>
                                    <a href="javascript:">clear all</a>
                                </div>
                            </div>
                            <ul class="noti-body">

                                <li class="n-title">
                                    <p class="m-b-0">Inbox Messages</p>
                                </li>
                                @if (isset($notifications))
                                    @foreach ($notifications as $notification)
                                        @if ($notification->user_id)
                                            <li class="notification p-1 openMessage">
                                                <div class="media ">
                                                    <a
                                                        href="{{ url('/notification/' . $notification->notification_id) }}">

                                                        <img class="img-radius" src="assets/images/user/avatar-2.jpg"
                                                            alt="">
                                                        <div class="media-body">
                                                            <p><strong>{{ $notification->user_name }}</strong><span
                                                                    class="n-time text-muted"><i
                                                                        class="icon feather icon-clock m-r-10"></i>
                                                                    {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                                                                </span></p>
                                                            <p>{{ $notification->subject }}</p>

                                                            <p class="float-right">
                                                                {{ $notification->status ? 'Read' : 'Unread' }} </p>

                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                        @else
                                            <li class="n-title">
                                                <p class="m-b-0">There are no new message</p>
                                            </li>
                                        @endif
                                    @endforeach
                                @else
                                    <ul>
                                        <li class="n-title">
                                            <p class="m-b-0">There are no new message</p>
                                        </li>
                                    </ul>
                                @endif
                            </ul>
                            <div class="noti-footer">
                                <a href="{{ url('/notification') }}">show all</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown drp-user">
                        <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="assets/images/user/avatar-1.jpg" class="img-radius"
                                    alt="User-Profile-Image">
                                <span>John Doe</span>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                                <a href="#" class="dud-logout" title="Logout"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="feather icon-log-out"></i>
                                </a>

                            </div>
                            <ul class="pro-body">
                                <li><a href="{{route('settings')}}:" class="dropdown-item"><i class="feather icon-settings"></i>
                                        Settings</a></li>
                                <li><a href="{{ url('user_management') }}" class="dropdown-item"><i class="feather icon-user"></i>
                                        Profile</a></li>
                                <li><a href="{{route('notification')}}" class="dropdown-item"><i class="feather icon-mail"></i> My
                                        Messages</a></li>
                                <li>
                                    <a href="" class="dropdown-item"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                            class="feather icon-lock"></i>Lock Screen</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>

    </div>
    </div>

    </div>

    <!-- [ Header ] end -->
