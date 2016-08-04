
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
            <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li class="active">Listado de Departamentos</li>
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
                    Bienvenido a la sección donde se encuentra el listado de departamentos registrados en el sistema, puedes actualizar algunos datos de los departamentos o eliminar el registro completo.<br>
                </div>
            </div>
        </div>
        <br>
            

        <div class="container-fluid">
            
            <section>
                    <table border="0" align="center">
                        <tr>
                            <td width="100"><button id="nuevo-departamento" class="btn btn-success">Nuevo Departamento</button></td>
                            <td width="100"><a target="_blank" href="<?php url("departamento/reporteDepartamentoGeneral") ?>" class="btn btn-info">Exportar a PDF</a></td>

                        </tr>
                    </table>
                </section>
            
            <table id="dtdepartamento" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Actualizar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead
                <tbody>
                     



                </tbody>

            </table>
            
            <!-- MODAL PARA EL REGISTRO O EDICION DE departamentos-->
    <div class="modal fade" id="registra-departamento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registra o Edita un Departamentos</b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return agregaDepartamento();">
            <div class="modal-body">
				<table border="0" width="100%">
               		 <tr>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id_departamento" name="id_departamento" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                    </tr>
                     <tr>
                    	<td width="150">Proceso: </td>
                        <td><input type="text" required="required" readonly="readonly" id="pro" name="pro"/></td>
                    </tr>
                	<tr>
                    	<td>Nombre: </td>
                        <td><input type="text" required="required" name="nombre" id="nombre" maxlength="100"/></td>
                    </tr>
                    <tr>
                    	<td>Descripcion: </td>
                        <td><input type="text" required="required" name="descripcion" id="descripcion" maxlength=250/></td>
                    </tr>
                    <tr>
                    	<td colspan="2">
                        	<div id="mensaje"></div>
                        </td>
                    </tr>
                </table>
            </div>
            
                <div class="modal-footer">
                    <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                    <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
                </div>
            
            </form>
          </div>
        </div>
      </div>
            <!-- FIN DEL MODAL PARA EL REGISTRO O EDICION DE Departamentos-->



    </div>
</div>
</div> 
    
           
    <!-- Fin del Contenido Principal-->
    

        <?php include(VISTA_RUTA."admininclude/scripts.php") ?>
    </body>
    
    <script>
    
    $(document).ready(function() {			   
			visualizarDepartamento();
			});
    
   
    
    setInterval(function() { 
                var table = $('#dtdepartamento').DataTable();

			table.ajax.reload(function(){
				$(".paginate_button > a").on("focus",function(){
					$(this).blur();
				});
			}, false);
		}, 5000);
    
    
    // actualizacion de contenido en tiempo real 

</script>
    
    </html>