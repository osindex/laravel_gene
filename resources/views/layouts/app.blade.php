<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="OneUI - Admin Dashboard Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="robots" content="noindex, nofollow">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="assets/img/favicons/favicon.png">

    <!-- <link rel="icon" type="image/png" href="assets/img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="assets/img/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="assets/img/favicons/favicon-160x160.png" sizes="160x160">
    <link rel="icon" type="image/png" href="assets/img/favicons/favicon-192x192.png" sizes="192x192">

    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon-180x180.png"> -->
    <!-- END Icons -->
    <!-- Web fonts -->
    <link rel="stylesheet" href="https://fonts.proxy.ustclug.org/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link id="css-main" href="{{ asset('assets/css/oneui.css') }}" rel="stylesheet">
</head>
<body>

    <div id="app">
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
            <!-- Side Overlay-->
            <aside id="side-overlay">
                <!-- Side Overlay Scroll Container -->
                <div id="side-overlay-scroll">
                    <!-- Side Header -->
                    <div class="side-header side-content">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default pull-right" type="button" data-toggle="layout" data-action="side_overlay_close">
                            <i class="fa fa-times"></i>
                        </button>
                        <span>
                            <img class="img-avatar img-avatar32" src="assets/img/avatars/avatar10.jpg" alt="">
                            <span class="font-w600 push-10-l">John Parker</span>
                        </span>
                    </div>
                    <!-- END Side Header -->

                    <!-- Side Content -->
                    <div class="side-content remove-padding-t">
                        <!-- Side Overlay Tabs -->
                        <div class="block pull-r-l border-t">
                            <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs">
                                <li class="active">
                                    <a href="#tabs-side-overlay-overview"><i class="fa fa-fw fa-coffee"></i> Overview</a>
                                </li>
                                <li>
                                    <a href="#tabs-side-overlay-sales"><i class="fa fa-fw fa-line-chart"></i> Sales</a>
                                </li>
                            </ul>
                            <div class="block-content tab-content">
                                <!-- Overview Tab -->
                                <div class="tab-pane fade fade-right in active" id="tabs-side-overlay-overview">
                                    <!-- Activity -->
                                    <div class="block pull-r-l">
                                        <div class="block-header bg-gray-lighter">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                                </li>
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title">Recent Activity</h3>
                                        </div>
                                        <div class="block-content">
                                            <!-- Activity List -->
                                            <ul class="list list-activity">
                                                <li>
                                                    <i class="si si-wallet text-success"></i>
                                                    <div class="font-w600">New sale ($15)</div>
                                                    <div><a href="javascript:void(0)">Admin Template</a></div>
                                                    <div><small class="text-muted">3 min ago</small></div>
                                                </li>
                                                <li>
                                                    <i class="si si-pencil text-info"></i>
                                                    <div class="font-w600">You edited the file</div>
                                                    <div><a href="javascript:void(0)"><i class="fa fa-file-text-o"></i> Documentation.doc</a></div>
                                                    <div><small class="text-muted">15 min ago</small></div>
                                                </li>
                                                <li>
                                                    <i class="si si-close text-danger"></i>
                                                    <div class="font-w600">Project deleted</div>
                                                    <div><a href="javascript:void(0)">Line Icon Set</a></div>
                                                    <div><small class="text-muted">4 hours ago</small></div>
                                                </li>
                                            </ul>
                                            <!-- END Activity List -->
                                        </div>
                                    </div>
                                    <!-- END Activity -->

                                    <!-- Online Friends -->
                                    <div class="block pull-r-l">
                                        <div class="block-header bg-gray-lighter">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                                </li>
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title">Online Friends</h3>
                                        </div>
                                        <div class="block-content block-content-full">
                                            <!-- Users Navigation -->
                                            <ul class="nav-users remove-margin-b">
                                                <li>
                                                    <a href="base_pages_profile.html">
                                                        <img class="img-avatar" src="assets/img/avatars/avatar1.jpg" alt="">
                                                        <i class="fa fa-circle text-success"></i> Rebecca Gray
                                                        <div class="font-w400 text-muted"><small>Copywriter</small></div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_profile.html">
                                                        <img class="img-avatar" src="assets/img/avatars/avatar12.jpg" alt="">
                                                        <i class="fa fa-circle text-success"></i> Scott Ruiz
                                                        <div class="font-w400 text-muted"><small>Web Developer</small></div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_profile.html">
                                                        <img class="img-avatar" src="assets/img/avatars/avatar1.jpg" alt="">
                                                        <i class="fa fa-circle text-success"></i> Ann Parker
                                                        <div class="font-w400 text-muted"><small>Web Designer</small></div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_profile.html">
                                                        <img class="img-avatar" src="assets/img/avatars/avatar5.jpg" alt="">
                                                        <i class="fa fa-circle text-warning"></i> Judy Alvarez
                                                        <div class="font-w400 text-muted"><small>Photographer</small></div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_profile.html">
                                                        <img class="img-avatar" src="assets/img/avatars/avatar13.jpg" alt="">
                                                        <i class="fa fa-circle text-warning"></i> Joshua Munoz
                                                        <div class="font-w400 text-muted"><small>Graphic Designer</small></div>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- END Users Navigation -->
                                        </div>
                                    </div>
                                    <!-- END Online Friends -->

                                    <!-- Quick Settings -->
                                    <div class="block pull-r-l">
                                        <div class="block-header bg-gray-lighter">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title">Quick Settings</h3>
                                        </div>
                                        <div class="block-content">
                                            <!-- Quick Settings Form -->
                                            <form class="form-bordered" action="base_pages_dashboard.html" method="post" onsubmit="return false;">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xs-8">
                                                            <div class="font-s13 font-w600">Online Status</div>
                                                            <div class="font-s13 font-w400 text-muted">Show your status to all</div>
                                                        </div>
                                                        <div class="col-xs-4 text-right">
                                                            <label class="css-input switch switch-sm switch-primary push-10-t">
                                                                <input type="checkbox"><span></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xs-8">
                                                            <div class="font-s13 font-w600">Auto Updates</div>
                                                            <div class="font-s13 font-w400 text-muted">Keep up to date</div>
                                                        </div>
                                                        <div class="col-xs-4 text-right">
                                                            <label class="css-input switch switch-sm switch-primary push-10-t">
                                                                <input type="checkbox"><span></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xs-8">
                                                            <div class="font-s13 font-w600">Notifications</div>
                                                            <div class="font-s13 font-w400 text-muted">Do you need them?</div>
                                                        </div>
                                                        <div class="col-xs-4 text-right">
                                                            <label class="css-input switch switch-sm switch-primary push-10-t">
                                                                <input type="checkbox" checked><span></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xs-8">
                                                            <div class="font-s13 font-w600">API Access</div>
                                                            <div class="font-s13 font-w400 text-muted">Enable/Disable access</div>
                                                        </div>
                                                        <div class="col-xs-4 text-right">
                                                            <label class="css-input switch switch-sm switch-primary push-10-t">
                                                                <input type="checkbox" checked><span></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- END Quick Settings Form -->
                                        </div>
                                    </div>
                                    <!-- END Quick Settings -->
                                </div>
                                <!-- END Overview Tab -->

                                <!-- Sales Tab -->
                                <div class="tab-pane fade fade-left" id="tabs-side-overlay-sales">
                                    <div class="block pull-r-l">
                                        <!-- Stats -->
                                        <div class="block-content pull-t">
                                            <div class="row items-push">
                                                <div class="col-xs-6">
                                                    <div class="font-w700 text-gray-darker text-uppercase">Sales</div>
                                                    <a class="h3 font-w300 text-primary" href="javascript:void(0)">22030</a>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="font-w700 text-gray-darker text-uppercase">Balance</div>
                                                    <a class="h3 font-w300 text-primary" href="javascript:void(0)">$ 4.589,00</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Stats -->

                                        <!-- Today -->
                                        <div class="block-content block-content-full block-content-mini bg-gray-lighter">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <span class="font-w600 font-s13 text-gray-darker text-uppercase">Today</span>
                                                </div>
                                                <div class="col-xs-6 text-right">
                                                    <span class="font-s13 text-muted">$996</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-content">
                                            <ul class="list list-activity pull-r-l">
                                                <li>
                                                    <i class="fa fa-circle text-success"></i>
                                                    <div class="font-w600">New sale! + $249</div>
                                                    <div><small class="text-muted">3 min ago</small></div>
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle text-success"></i>
                                                    <div class="font-w600">New sale! + $129</div>
                                                    <div><small class="text-muted">50 min ago</small></div>
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle text-success"></i>
                                                    <div class="font-w600">New sale! + $119</div>
                                                    <div><small class="text-muted">2 hours ago</small></div>
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle text-success"></i>
                                                    <div class="font-w600">New sale! + $499</div>
                                                    <div><small class="text-muted">3 hours ago</small></div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- END Today -->

                                        <!-- Yesterday -->
                                        <div class="block-content block-content-full block-content-mini bg-gray-lighter">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <span class="font-w600 font-s13 text-gray-darker text-uppercase">Yesterday</span>
                                                </div>
                                                <div class="col-xs-6 text-right">
                                                    <span class="font-s13 text-muted">$765</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-content">
                                            <ul class="list list-activity pull-r-l">
                                                <li>
                                                    <i class="fa fa-circle text-success"></i>
                                                    <div class="font-w600">New sale! + $249</div>
                                                    <div><small class="text-muted">26 hours ago</small></div>
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle text-danger"></i>
                                                    <div class="font-w600">Product Purchase - $50</div>
                                                    <div><small class="text-muted">28 hours ago</small></div>
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle text-success"></i>
                                                    <div class="font-w600">New sale! + $119</div>
                                                    <div><small class="text-muted">29 hours ago</small></div>
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle text-danger"></i>
                                                    <div class="font-w600">Paypal Withdrawal - $300</div>
                                                    <div><small class="text-muted">37 hours ago</small></div>
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle text-success"></i>
                                                    <div class="font-w600">New sale! + $129</div>
                                                    <div><small class="text-muted">39 hours ago</small></div>
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle text-success"></i>
                                                    <div class="font-w600">New sale! + $119</div>
                                                    <div><small class="text-muted">45 hours ago</small></div>
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle text-success"></i>
                                                    <div class="font-w600">New sale! + $499</div>
                                                    <div><small class="text-muted">46 hours ago</small></div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- END Yesterday -->

                                        <!-- More -->
                                        <div class="text-center">
                                            <small><a href="javascript:void(0)">Load More..</a></small>
                                        </div>
                                        <!-- END More -->
                                    </div>
                                </div>
                                <!-- END Sales Tab -->
                            </div>
                        </div>
                        <!-- END Side Overlay Tabs -->
                    </div>
                    <!-- END Side Content -->
                </div>
                <!-- END Side Overlay Scroll Container -->
            </aside>
            <!-- END Side Overlay -->

            <!-- Sidebar -->
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="side-header side-content bg-white-op">
                            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                            <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times"></i>
                            </button>
                            <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                            <div class="btn-group pull-right">
                                <button class="btn btn-link text-gray dropdown-toggle" data-toggle="dropdown" type="button">
                                    <i class="si si-drop"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right font-s13 sidebar-mini-hide">
                                    <li>
                                        <a data-toggle="theme" data-theme="default" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-default pull-right"></i> <span class="font-w600">Default</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/amethyst.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-amethyst pull-right"></i> <span class="font-w600">Amethyst</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/city.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-city pull-right"></i> <span class="font-w600">City</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/flat.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-flat pull-right"></i> <span class="font-w600">Flat</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/modern.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-modern pull-right"></i> <span class="font-w600">Modern</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/smooth.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-smooth pull-right"></i> <span class="font-w600">Smooth</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <a class="h5 text-white" href="index.html">
                                <i class="fa fa-circle-o-notch text-primary"></i> <span class="h4 font-w600 sidebar-mini-hide">ne</span>
                            </a>
                        </div>
                        <!-- END Side Header -->

                        <!-- Side Content -->
                        <div class="side-content side-content-full">
                            <ul class="nav-main">
                                <li>
                                    <a href="base_pages_dashboard.html"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                                </li>
                                <li>
                                    <a href="base_pages_dashboard_v2.html"><i class="si si-rocket"></i><span class="sidebar-mini-hide">Dashboard v2</span></a>
                                </li>
                                <li>
                                    <a href="base_pages_dashboard_v3.html"><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard v3</span></a>
                                </li>
                                <li class="nav-main-heading"><span class="sidebar-mini-hide">User Interface</span></li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">UI Elements</span></a>
                                    <ul>
                                        <li>
                                            <a href="base_ui_widgets.html">Widgets</a>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Blocks</a>
                                            <ul>
                                                <li>
                                                    <a href="base_ui_blocks.html">Styles</a>
                                                </li>
                                                <li>
                                                    <a href="base_ui_blocks_api.html">Blocks API</a>
                                                </li>
                                                <li>
                                                    <a href="base_ui_blocks_draggable.html">Draggable</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="base_ui_grid.html">Grid</a>
                                        </li>
                                        <li>
                                            <a href="base_ui_typography.html">Typography</a>
                                        </li>
                                        <li>
                                            <a href="base_ui_icons.html">Icons</a>
                                        </li>
                                        <li>
                                            <a href="base_ui_buttons.html">Buttons</a>
                                        </li>
                                        <li>
                                            <a href="base_ui_activity.html">Activity</a>
                                        </li>
                                        <li>
                                            <a href="base_ui_tabs.html">Tabs</a>
                                        </li>
                                        <li>
                                            <a href="base_ui_tiles.html">Tiles</a>
                                        </li>
                                        <li>
                                            <a href="base_ui_cards.html">Cards</a>
                                        </li>
                                        <li>
                                            <a href="base_ui_ribbons.html">Ribbons</a>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Chat</a>
                                            <ul>
                                                <li>
                                                    <a href="base_ui_chat_full.html">Full</a>
                                                </li>
                                                <li>
                                                    <a href="base_ui_chat_fixed.html">Fixed</a>
                                                </li>
                                                <li>
                                                    <a href="base_ui_chat_popup.html">Popup</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Timeline</a>
                                            <ul>
                                                <li>
                                                    <a href="base_ui_timeline.html">Various</a>
                                                </li>
                                                <li>
                                                    <a href="base_ui_timeline_social.html">Social</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="base_ui_navigation.html">Navigation</a>
                                        </li>
                                        <li>
                                            <a href="base_ui_modals_tooltips.html">Modals &amp; Tooltips</a>
                                        </li>
                                        <li>
                                            <a href="base_ui_color_themes.html">Color Themes</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="open">
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-grid"></i><span class="sidebar-mini-hide">Tables</span></a>
                                    <ul>
                                        <li>
                                            <a href="base_tables_styles.html">Styles</a>
                                        </li>
                                        <li>
                                            <a class="active" href="base_tables_responsive.html">Responsive</a>
                                        </li>
                                        <li>
                                            <a href="base_tables_tools.html">Tools</a>
                                        </li>
                                        <li>
                                            <a href="base_tables_pricing.html">Pricing</a>
                                        </li>
                                        <li>
                                            <a href="base_tables_datatables.html">DataTables</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-note"></i><span class="sidebar-mini-hide">Forms</span></a>
                                    <ul>
                                        <li>
                                            <a href="base_forms_premade.html">Pre-made</a>
                                        </li>
                                        <li>
                                            <a href="base_forms_elements.html">Elements</a>
                                        </li>
                                        <li>
                                            <a href="base_forms_pickers_more.html">Pickers &amp; More</a>
                                        </li>
                                        <li>
                                            <a href="base_forms_editors.html">Text Editors</a>
                                        </li>
                                        <li>
                                            <a href="base_forms_validation.html">Validation</a>
                                        </li>
                                        <li>
                                            <a href="base_forms_wizard.html">Wizard</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-main-heading"><span class="sidebar-mini-hide">Develop</span></li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Components</span></a>
                                    <ul>
                                        <li>
                                            <a href="base_comp_images.html">Images</a>
                                        </li>
                                        <li>
                                            <a href="base_comp_image_cropper.html">Image Cropper</a>
                                        </li>
                                        <li>
                                            <a href="base_comp_charts.html">Charts (Various)</a>
                                        </li>
                                        <li>
                                            <a href="base_comp_chartjs_v2.html">Charts.js v2</a>
                                        </li>
                                        <li>
                                            <a href="base_comp_calendar.html">Calendar</a>
                                        </li>
                                        <li>
                                            <a href="base_comp_sliders.html">Sliders</a>
                                        </li>
                                        <li>
                                            <a href="base_comp_animations.html">Animations</a>
                                        </li>
                                        <li>
                                            <a href="base_comp_scrolling.html">Scrolling</a>
                                        </li>
                                        <li>
                                            <a href="base_comp_syntax_highlighting.html">Syntax Highlighting</a>
                                        </li>
                                        <li>
                                            <a href="base_comp_rating.html">Rating</a>
                                        </li>
                                        <li>
                                            <a href="base_comp_treeview.html">Tree View</a>
                                        </li>
                                        <li>
                                            <a href="base_comp_masonry.html">Masonry</a>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Maps</a>
                                            <ul>
                                                <li>
                                                    <a href="base_comp_maps.html">Google</a>
                                                </li>
                                                <li>
                                                    <a href="base_comp_maps_full.html">Google Full</a>
                                                </li>
                                                <li>
                                                    <a href="base_comp_maps_vector.html">Vector</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Gallery</a>
                                            <ul>
                                                <li>
                                                    <a href="base_comp_gallery_simple.html">Simple</a>
                                                </li>
                                                <li>
                                                    <a href="base_comp_gallery_advanced.html">Advanced</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-magic-wand"></i><span class="sidebar-mini-hide">Layouts</span></a>
                                    <ul>
                                        <li>
                                            <a href="base_layouts_api.html">Layout API</a>
                                        </li>
                                        <li>
                                            <a href="base_layouts_default.html">Default</a>
                                        </li>
                                        <li>
                                            <a href="base_layouts_default_flipped.html">Default Flipped</a>
                                        </li>
                                        <li>
                                            <a href="base_layouts_header_static.html">Static Header</a>
                                        </li>
                                        <li>
                                            <a href="base_layouts_sidebar_mini_hoverable.html">Mini Sidebar (Hoverable)</a>
                                        </li>
                                        <li>
                                            <a href="base_layouts_side_overlay_hoverable.html">Side Overlay (Hoverable)</a>
                                        </li>
                                        <li>
                                            <a href="base_layouts_side_overlay_open.html">Side Overlay (Open)</a>
                                        </li>
                                        <li>
                                            <a href="base_layouts_side_native_scrolling.html">Side Native Scrolling</a>
                                        </li>
                                        <li>
                                            <a href="base_layouts_sidebar_hidden.html">Hidden Sidebar</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-puzzle"></i><span class="sidebar-mini-hide">Multi Level Menu</span></a>
                                    <ul>
                                        <li>
                                            <a href="#">Link 1-1</a>
                                        </li>
                                        <li>
                                            <a href="#">Link 1-2</a>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 2</a>
                                            <ul>
                                                <li>
                                                    <a href="#">Link 2-1</a>
                                                </li>
                                                <li>
                                                    <a href="#">Link 2-2</a>
                                                </li>
                                                <li>
                                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 3</a>
                                                    <ul>
                                                        <li>
                                                            <a href="#">Link 3-1</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Link 3-2</a>
                                                        </li>
                                                        <li>
                                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 4</a>
                                                            <ul>
                                                                <li>
                                                                    <a href="#">Link 4-1</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Link 4-2</a>
                                                                </li>
                                                                <li>
                                                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 5</a>
                                                                    <ul>
                                                                        <li>
                                                                            <a href="#">Link 5-1</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">Link 5-2</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 6</a>
                                                                            <ul>
                                                                                <li>
                                                                                    <a href="#">Link 6-1</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#">Link 6-2</a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-main-heading"><span class="sidebar-mini-hide">Pages</span></li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-layers"></i><span class="sidebar-mini-hide">Generic</span></a>
                                    <ul>
                                        <li>
                                            <a href="base_pages_blank.html">Blank</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_search.html">Search Results</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_invoice.html">Invoice</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_faq.html">FAQ</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_inbox.html">Inbox</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_files.html">Files</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_tickets.html">Tickets</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_contacts.html">Contacts</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_team.html">Team</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_about.html">About</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_upgrade_plan.html">Upgrade Plan</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_contact.html">Contact</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_support.html">Support</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_coming_soon.html">Coming Soon</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_coming_soon_v2.html">Coming Soon v2</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_maintenance.html">Maintenance</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-layers"></i><span class="sidebar-mini-hide">Page Packs</span></a>
                                    <ul>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-bitcoin"></i>Crypto</a>
                                            <ul>
                                                <li>
                                                    <a href="base_pages_crypto_dashboard.html">Dashboard</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_crypto_buy_sell.html">Buy/Sell</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_crypto_wallets.html">Wallets</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_crypto_settings.html">Edit</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bag"></i>e-Commerce</a>
                                            <ul>
                                                <li>
                                                    <a href="base_pages_ecom_dashboard.html">Dashboard</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_ecom_orders.html">Orders</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_ecom_order.html">Order</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_ecom_products.html">Products</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_ecom_product_edit.html">Product Edit</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_ecom_customer.html">Customer</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-handbag"></i>e-Commerce Store</a>
                                            <ul>
                                                <li>
                                                    <a href="base_pages_ecom_store_home.html">Home</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_ecom_store_search.html">Search Results</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_ecom_store_products.html">Products List</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_ecom_store_product.html">Product Page</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_ecom_store_checkout.html">Checkout</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-user"></i>User Profile</a>
                                            <ul>
                                                <li>
                                                    <a href="base_pages_profile.html">Profile</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_profile_v2.html">Profile v2</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_profile_edit.html">Profile Edit</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bubbles"></i>Forum</a>
                                            <ul>
                                                <li>
                                                    <a href="base_pages_forum_categories.html">Categories</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_forum_topics.html">Topics</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_forum_discussion.html">Discussion</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_forum_new_topic.html">New Topic</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-briefcase"></i>Projects</a>
                                            <ul>
                                                <li>
                                                    <a href="base_pages_projects_dashboard.html">Dashboard</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_projects_view.html">Project</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_projects_create.html">Create</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_projects_edit.html">Edit</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-pencil"></i>Blog</a>
                                            <ul>
                                                <li>
                                                    <a href="base_pages_blog_classic.html">Classic</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_blog_list.html">List</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_blog_grid.html">Grid</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_blog_story.html">Story</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_blog_story_cover.html">Story Cover</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-graduation"></i>e-Learning</a>
                                            <ul>
                                                <li>
                                                    <a href="base_pages_elearning_courses.html">Courses</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_elearning_course.html">Course</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_elearning_lesson.html">Lesson</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-plane"></i>Travel</a>
                                            <ul>
                                                <li>
                                                    <a href="base_pages_travel_agency.html">Agency</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_travel_package.html">Package</a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_travel_guide.html">Guide</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-lock"></i><span class="sidebar-mini-hide">Authentication</span></a>
                                    <ul>
                                        <li>
                                            <a href="base_pages_auth.html">All Pages</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_login.html">Log In</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_login_v2.html">Log In v2</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_register.html">Register</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_register_v2.html">Register v2</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_lock.html">Lock Screen</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_lock_v2.html">Lock Screen v2</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_reminder.html">Password Reminder</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_reminder_v2.html">Password Reminder v2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-fire"></i><span class="sidebar-mini-hide">Error Pages</span></a>
                                    <ul>
                                        <li>
                                            <a href="base_pages_errors.html">All Pages</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_400.html">400</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_401.html">401</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_403.html">403</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_404.html">404</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_500.html">500</a>
                                        </li>
                                        <li>
                                            <a href="base_pages_503.html">503</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- END Side Content -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="header-navbar" class="content-mini content-mini-full">
                <!-- Header Navigation Right -->
                <ul class="nav-header pull-right">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                                <img src="assets/img/avatars/avatar10.jpg" alt="Avatar">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-header">Profile</li>
                                <li>
                                    <a tabindex="-1" href="base_pages_inbox.html">
                                        <i class="si si-envelope-open pull-right"></i>
                                        <span class="badge badge-primary pull-right">3</span>Inbox
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="base_pages_profile.html">
                                        <i class="si si-user pull-right"></i>
                                        <span class="badge badge-success pull-right">1</span>Profile
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="javascript:void(0)">
                                        <i class="si si-settings pull-right"></i>Settings
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Actions</li>
                                <li>
                                    <a tabindex="-1" href="base_pages_lock.html">
                                        <i class="si si-lock pull-right"></i>Lock Account
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="base_pages_login.html">
                                        <i class="si si-logout pull-right"></i>Log out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="side_overlay_toggle" type="button">
                            <i class="fa fa-tasks"></i>
                        </button>
                    </li>
                </ul>
                <!-- END Header Navigation Right -->

                <!-- Header Navigation Left -->
                <ul class="nav-header pull-left">
                    <li class="hidden-md hidden-lg">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                            <i class="fa fa-navicon"></i>
                        </button>
                    </li>
                    <li class="hidden-xs hidden-sm">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                            <i class="fa fa-ellipsis-v"></i>
                        </button>
                    </li>
                    <li>
                        <!-- Opens the Apps modal found at the bottom of the page, before including JS code -->
                        <button class="btn btn-default pull-right" data-toggle="modal" data-target="#apps-modal" type="button">
                            <i class="si si-grid"></i>
                        </button>
                    </li>
                    <li class="visible-xs">
                        <!-- Toggle class helper (for .js-header-search below), functionality initialized in App() -> uiToggleClass() -->
                        <button class="btn btn-default" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </li>
                    <li class="js-header-search header-search">
                        <form class="form-horizontal" action="base_pages_search.html" method="post">
                            <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                                <input class="form-control" type="text" id="base-material-text" name="base-material-text" placeholder="Search..">
                                <span class="input-group-addon"><i class="si si-magnifier"></i></span>
                            </div>
                        </form>
                    </li>
                </ul>
                <!-- END Header Navigation Left -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Responsive Tables <small>Mobile friendly tables that work across all screen sizes.</small>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Tables</li>
                                <li><a class="link-effect" href="">Responsive</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content">
                    <!-- Full Table -->
                    <div class="block">
                       <!--  <div class="block-header">
                            <h3 class="block-title">Full Table</h3>
                        </div>
                        <div class="block-content">
                            <p class="push-30">The first way to make a table responsive, is to wrap it with <code>&lt;div class=&quot;table-responsive&quot;&gt;&lt;/div&gt;</code>. This way the table will be horizontally scrollable and all data will be accessible on smaller screens (&lt; 768px).</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 120px;"><i class="si si-user"></i></th>
                                            <th>Name</th>
                                            <th style="width: 30%;">Email</th>
                                            <th style="width: 15%;">Access</th>
                                            <th class="text-center" style="width: 100px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar4.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Amy Hunter</td>
                                            <td>client1@example.com</td>
                                            <td>
                                                <span class="label label-warning">Trial</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar7.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Sara Holland</td>
                                            <td>client2@example.com</td>
                                            <td>
                                                <span class="label label-info">Business</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar1.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Laura Bell</td>
                                            <td>client3@example.com</td>
                                            <td>
                                                <span class="label label-primary">Personal</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar5.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Denise Watson</td>
                                            <td>client4@example.com</td>
                                            <td>
                                                <span class="label label-info">Business</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar7.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Ann Parker</td>
                                            <td>client5@example.com</td>
                                            <td>
                                                <span class="label label-info">Business</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> -->
                         @yield('content')
                    </div>
                    <!-- END Full Table -->
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
                <div class="pull-right">
                    Crafted with <i class="fa fa-heart text-city"></i> by <a class="font-w600" href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
                </div>
                <div class="pull-left">
                    <a class="font-w600" href="http://goo.gl/6LF10W" target="_blank">OneUI 3.4</a> &copy; <span class="js-year-copy">2015</span>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Apps Modal -->
        <!-- Opens from the button in the header -->
        <div class="modal fade" id="apps-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-sm modal-dialog modal-dialog-top">
                <div class="modal-content">
                    <!-- Apps Block -->
                    <div class="block block-themed block-transparent">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Apps</h3>
                        </div>
                        <div class="block-content">
                            <div class="row text-center">
                                <div class="col-xs-6">
                                    <a class="block block-rounded" href="base_pages_dashboard.html">
                                        <div class="block-content text-white bg-default">
                                            <i class="si si-speedometer fa-2x"></i>
                                            <div class="font-w600 push-15-t push-15">Backend</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-6">
                                    <a class="block block-rounded" href="bd_dashboard.html">
                                        <div class="block-content text-white bg-modern">
                                            <i class="si si-rocket fa-2x"></i>
                                            <div class="font-w600 push-15-t push-15">Boxed</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Apps Block -->
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/all.js') }}"></script>
</body>
</html>
