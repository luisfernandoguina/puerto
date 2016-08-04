<?php if (isset($_SESSION['usuario_admin'])) :?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include(VISTA_RUTA."admininclude/head.php") ?>
</head>
<body>
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <?php include(VISTA_RUTA."admininclude/header.php") ?> 
            <?php include(VISTA_RUTA."admininclude/menu.php") ?>    
            <!-- Contenido Principal-->
            <section class="full-reset text-center" style="padding: 40px 0;">
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-face"></i></div>
                    <div class="tile-name all-tittles">administradores</div>
                    <div class="tile-num full-reset">7</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-accounts"></i></div>
                    <div class="tile-name all-tittles">empleados</div>
                    <div class="tile-num full-reset">70</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-male-alt"></i></div>
                    <div class="tile-name all-tittles">cargos</div>
                    <div class="tile-num full-reset">11</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-male-female"></i></div>
                    <div class="tile-name all-tittles" style="width: 90%;">departamentos</div>
                    <div class="tile-num full-reset">17</div>
                </article>

                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-book"></i></div>
                    <div class="tile-name all-tittles">permisos</div>
                    <div class="tile-num full-reset">77</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-bookmark-outline"></i></div>
                    <div class="tile-name all-tittles">permisos aprobados</div>
                    <div class="tile-num full-reset">11</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-assignment-account"></i></div>
                    <div class="tile-name all-tittles">permisos reprobados</div>
                    <div class="tile-num full-reset">17</div>
                </article>

                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-truck"></i></div>
                    <div class="tile-name all-tittles">permisos pendientes</div>
                    <div class="tile-num full-reset">21</div>
                </article>
            </section>  
            <!-- Fin del Contenido Principal-->  
        </div>
    </div>
        <?php include(VISTA_RUTA."admininclude/scripts.php") ?>
    </body>
    </html>
<?php else : redirecciona()->to("/")->withMessage(array(
                    "estado"=>"true",
                    "mensaje"=>"Inicia Sesion"
                ));?>


<?php endif; ?>