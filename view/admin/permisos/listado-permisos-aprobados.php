<?php if (isset($_SESSION['usuario_admin'])) :?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include(VISTA_RUTA."admininclude/head.php") ?>
</head>
<body>
<div id="cargando">
 
</div>
    
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <?php include(VISTA_RUTA."admininclude/header.php") ?>
            <?php include(VISTA_RUTA."admininclude/menu.php") ?>
            <!-- Contenido Principal-->      
            <div class="container-fluid">
                
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li class="active">Listado de Permisos</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid"  style="margin: 0px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="<?php asset("img/institution.png") ?>" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección donde se encuentra el listado de permisos registrados en el sistema, puedes actualizar algunos datos de los permisos o eliminar el registro completo.<br>
                </div>
            </div>
        </div>
        <br>
            

        <div class="container-fluid">
            
            
            <table id="dtpermisos" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Empleado</th>
                        <th >Fecha</th>
                        <th >Motivo</th>
                        <th>Estado</th>
                        <th>Eliminar</th>
                        <th>Reporte</th>
                    </tr>
                </thead
                   
                <tbody>

                </tbody>
                 

            </table>
            
            <!-- MODAL PARA EL REGISTRO O EDICION DE CARGOS-->
    <div class="modal fade" id="visualiza-permiso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registra o Edita un Permiso</b></h4>
            </div>
            
          </div>
        </div>
      </div>
            <!-- FIN DEL MODAL PARA EL REGISTRO O EDICION DE PERMISOS-->



        </div>
        </div>
</div>        
           
    <!-- Fin del Contenido Principal-->
    
    
    

        <?php include(VISTA_RUTA."admininclude/scripts.php") ?>
    </body>
    
    
    
    <script>
    
    $(document).ready(function() {			   
			visualizarPermisoAll();
			});
    
   
    
    setInterval(function() { 
                var table = $('#dtpermisos').DataTable();

			table.ajax.reload(function(){
				$(".paginate_button > a").on("focus",function(){
					$(this).blur();
				});
			}, false);
		}, 5000);
    
    
$(window).load(function () {
  // Una vez se cargue al completo la página desaparecerá el div "cargando"
  $('#cargando').hide();
});

</script>
    </html>

<?php else : redirecciona()->to("/")->withMessage(array(
                    "estado"=>"true",
                    "mensaje"=>"Inicia Sesion"
                ));?>


<?php endif; ?>