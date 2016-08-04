<?php if (isset($_SESSION['usuario_estandar'])) :?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include(VISTA_RUTA."empleadoinclude/head.php") ?>
</head>
<body>
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <?php include(VISTA_RUTA."empleadoinclude/header.php") ?> 
            <?php include(VISTA_RUTA."empleadoinclude/menu.php") ?>    
            <!-- Contenido Principal-->
            <section class="full-reset text-center" style="padding: 40px 0;">
                
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-book"></i></div>
                    <div class="tile-name all-tittles">permisos</div>
                    <div class="tile-num full-reset">77</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-check-circle"></i></div>
                    <div class="tile-name all-tittles">permisos aprobados</div>
                    <div class="tile-num full-reset">11</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-alert-circle"></i></div>
                    <div class="tile-name all-tittles">permisos reprobados</div>
                    <div class="tile-num full-reset">17</div>
                </article>

                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-time"></i></div>
                    <div class="tile-name all-tittles">permisos pendientes</div>
                    <div class="tile-num full-reset">21</div>
                </article>
                
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-assignment-account"></i></div>
                    <div class="tile-name all-tittles">Datos Personales</div>
                    <div class="tile-num full-reset"></div>
                </article>

                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-key"></i></div>
                    <div class="tile-name all-tittles">Cambiar Contraseña</div>
                    <div class="tile-num full-reset"></div>
                </article>
                
            
                    
                   
            </section>  
            <!-- Fin del Contenido Principal-->  
        </div>
    </div>
        <?php include(VISTA_RUTA."empleadoinclude/scripts.php") ?>
    </body>
    </html>
<?php else : redirecciona()->to("/")->withMessage(array(
                    "estado"=>"true",
                    "mensaje"=>"Inicia Sesion"
                ));?>


<?php endif; ?>