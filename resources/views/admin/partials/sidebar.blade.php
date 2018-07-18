<nav id="sidebar">
  <div id="sidebar-scroll">
    <div class="sidebar-content">
      <div class="side-header side-content bg-white-op">
        <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
          <i class="fa fa-times"></i>
        </button>
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
          <i class="fa fa-rocket text-primary"></i> &nbsp<span class="h5 font-w600 sidebar-mini-hide text-gray"> 校友平台</span>
        </a>
      </div>

      <div class="side-content">
        <ul class="nav-main">
          <li>
            <a href="{{url('home')}}"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">后台首页</span></a>
          </li>
          <li class="nav-main-heading"><span class="sidebar-mini-hide">校友活动</span></li>
<!--           <li>
            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">点亮校友地图活动</span></a>
            <ul>
             <li><a href="/admin/wechatinfo">所有校友列表</a></li>
             <li><a href="/admin/wechatinfo/map">校友地图</a></li>
           </ul>
         </li>
         <li><a href="/admin/smile"><i class="fa fa-smile-o"></i> <span class="sidebar-mini-hide">笑脸接力</span></a></li> -->
         <li><a href="/admin/iambacknew"><i class="fa fa-edit"></i> <span class="sidebar-mini-hide">校友信息填报</span></a></li>
         <li><a href="/admin/funding"><i class="fa fa-list"></i> <span class="sidebar-mini-hide">校庆捐赠列表</span></a></li>
         <li><a href="/admin/fundingoffline"><i class="fa fa-list"></i> <span class="sidebar-mini-hide">校庆捐赠列表 (线下)</span></a></li>
         @if(Auth::user()->hasRole('admin'))
         <li class="nav-main-heading"><span class="sidebar-mini-hide">管理区域</span></li>
         <li><a href="/admin/fundingproject"><i class="fa fa-university"></i> <span class="sidebar-mini-hide">捐赠项目管理</span></a></li>
         <li><a href="/admin/event"><i class="fa fa-modx"></i> <span class="sidebar-mini-hide">活动管理</span></a></li>
         <li><a href="/admin/users"><i class='fa fa-users'></i> <span class="sidebar-mini-hide">用户管理</span></a></li>
         <li><a href="/admin/roles"><i class='fa fa-list'></i> <span class="sidebar-mini-hide">角色管理</span></a></li>
         @endif
         <li class="nav-main-heading"><span class="sidebar-mini-hide">其他</span></li>
         <li>
           <a href="/" target="blank"><i class="si si-rocket"></i><span class="sidebar-mini-hide"> 前台</span></a>
         </li>
       </ul>
     </div>
   </div>
 </div>
</nav>