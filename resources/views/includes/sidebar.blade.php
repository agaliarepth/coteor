c           <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo" style="margin:auto">
            <a href="index.html"><img src="{{url('images/logo.png')}}" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="index.html"><img src="{{url('images/logo_icon.png')}}" alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="{{url('images/photos/user-avatar.png')}}" class="media-object">
                    <div class="media-body">
                        <h4><a href="#">John Doe</a></h4>
                        <span>"Hello There..."</span>
                    </div>
                </div>

                <h5 class="left-nav-title">Account Information</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
                  <li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>
                  <li><a href="#"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
                  <li><a href="#"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
                </ul>
            </div>

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="active"><a href="index.html"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
                <!--<li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>Layouts</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="blank_page.html"> Blank Page</a></li>
                        <li><a href="boxed_view.html"> Boxed Page</a></li>
                        <li><a href="leftmenu_collapsed_view.html"> Sidebar Collapsed</a></li>
                        <li><a href="horizontal_menu.html"> Horizontal Menu</a></li>

                    </ul>
                </li>-->
                <li class="menu-list"><a href=""><i class="fa fa-users"></i> <span>SOCIOS</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{url('/socios')}}">LISTAR SOCIOS</a></li>
                        <li><a href="{{url('/socios/create')}}"> REGISTRAR SOCIO</a></li>
                    </ul>
                </li>



                <li class="menu-list"><a href=""><i class="fa fa-book"></i> <span>ITEMS - EQUIPOS</span></a>
                    <ul class="sub-menu-list">


                        <li><a href="{{url('/categorias')}}"> CATEGORIAS</a></li>
                        <li><a href="{{url('/items')}}">  ITEMS</a></li>
                        <li><a href="{{url('/equipos')}}">  EQUIPOS</a></li>

                    </ul>
                </li>
                <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>ALMACEN</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{url('almacen/ingresos')}}"> INGRESOS</a></li>
                        <li><a href=""> EGRESOS</a></li>


                    </ul>
                </li>




                <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>CONTRATOS</span></a>
                    <ul class="sub-menu-list">
                        <li><a href=""> LISTAR CONTRATOS</a></li>
                        <li><a href=""> REGISTRAR CONTRATOS</a></li>

                    </ul>
                </li>

                <li class="menu-list"><a href="#"><i class="fa fa-th-list"></i> <span>ODTS</span></a>
                    <ul class="sub-menu-list">
                        <li><a href=""> LISTAR ODT</a></li>
                        <li><a href="">REGISTRAR ODT</a></li>

                    </ul>
                </li>


                <li class="menu-list"><a href=""><i class="fa fa-file-text"></i> <span>REPORTES</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="profile.html"> Profile</a></li>
                        <li><a href="invoice.html"> Invoice</a></li>
                        <li><a href="pricing_table.html"> Pricing Table</a></li>
                        <li><a href="timeline.html"> Timeline</a></li>
                        <li><a href="blog_list.html"> Blog List</a></li>
                        <li><a href="blog_details.html"> Blog Details</a></li>
                        <li><a href="directory.html"> Directory </a></li>
                        <li><a href="chat.html"> Chat </a></li>
                        <li><a href="404.html"> 404 Error</a></li>
                        <li><a href="500.html"> 500 Error</a></li>
                        <li><a href="registration.html"> Registration Page</a></li>
                        <li><a href="lock_screen.html"> Lockscreen </a></li>
                    </ul>
                </li>

            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->
