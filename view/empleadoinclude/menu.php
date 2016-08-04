
<div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href="<?php url("empleado-estandar") ?>"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-account zmdi-hc-fw"></i>&nbsp;&nbsp; Datos Personales <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="<?php url("empleado-estandar/editarInformacion") ?>"><i class="zmdi zmdi-accounts-list-alt zmdi-hc-fw"></i>&nbsp;&nbsp; Editar mis Datos</a></li>
                            <li><a href="<?php url("empleado-estandar/cambiarContraseña") ?>"><i class="zmdi zmdi-key zmdi-hc-fw"></i>&nbsp;&nbsp; Cambiar Contraseña</a></li>
                            
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>&nbsp;&nbsp; Permisos <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="<?php url("empleado-estandar/nuevoPermiso") ?>"><i class="zmdi zmdi-plus-square zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo Permiso</a></li>
                            <li><a href="<?php url("empleado-estandar/listadoPermisos") ?>"><i class="zmdi zmdi-view-list-alt zmdi-hc-fw"></i>&nbsp;&nbsp; Hojas de Permisos</a></li>
                        </ul>
                    </li>
                    
                    
                        
                    
                    
                    
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">

                <figure>
                   <img src="<?php asset("img/exit2.png") ?>" alt="user-picture" class="img-responsive img-circle center-box">
                    
                </figure>


                <li  class="tooltips-general exit-system-button" data-href="<?php url("empleado-estandar/cerrarSesion") ?>" data-placement="bottom" title="Salir del sistema">
                     Salir del Sistema
                </li>
                <li style="color:#fff; cursor:default;">
                    <p>
                     Bienvenid@ : <?php echo $_SESSION["username"]?>
                    </p>

                    
                </li>
               
                
                
                
                
                <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>

            </ul>


        </nav>
    <div>


