
<div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href="<?php url("admin") ?>"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-case zmdi-hc-fw"></i>&nbsp;&nbsp; Administración <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="<?php url("departamento") ?>"><i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp; Departamentos</a></li>
                            <li><a href="<?php url("cargos") ?>"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>&nbsp;&nbsp; Cargos</a></li>
                            
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Registro de usuarios <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="<?php url("admin/agregarEmpleado") ?>"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo Empleado</a></li>
                        </ul>
                    </li>
                    
                    
                        
                    <li><a href="<?php url("permisos") ?>"><i class=" zmdi zmdi-view-web zmdi-hc-fw"></i>&nbsp;&nbsp;Permisos</a></li>

                    
                    <li><a href="report.html"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Ayuda</a></li>
                    
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">

                <figure>
                   <img src="<?php asset("img/user01.png") ?>" alt="user-picture" class="img-responsive img-circle center-box">
                </figure>


                <li style="color:#fff; cursor:default;">
                    

                    <span class="all-tittles"><?php //echo $_SESSION['username'] ?></span>
                </li>
                
                <li  class="tooltips-general exit-system-button" data-href="<?php url("") ?>" data-placement="bottom" title="Salir del sistema">
                    <i class="zmdi zmdi-power"></i> Salir del Sistema
                </li>
                
                
                <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>

            </ul>


        </nav>
    <div>


