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
            
            

        <div class="container-fluid">
            <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Nuevo Permiso</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal form-border"  name="fvalida" method="post" action="guardarInformacionEditada">
                                
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Fecha </label>
                                        <div class="col-sm-6">
                                            <input type="text" readonly="readonly" class="form-control" value="<?php echo strftime( "%d/%m/%Y", time() ); ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nombre</label>
                                        <div class="col-sm-6">
                                            <input type="text" readonly="readonly" class="form-control"value="<?php echo isset($empleado) ? $empleado->nombre.' '.$empleado->apellido : '' ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Cargo</label>
                                        <div class="col-sm-6">
                                            <input type="text"  class="form-control"value="">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Departamento</label>
                                        <div class="col-sm-6">
                                            <input type="text"  class="form-control"value="">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Motivo</label>
                                        <div class="col-sm-6">
                                            <input type="text"  class="form-control"value="">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Fecha Inicial</label>
                                        <div class="col-sm-6">
                                            
                                            <div class='input-group date' id='datetimepicker6'>
                                                <input type='text' class="form-control" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                           
                                        </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Fecha Final</label>
                                        <div class="col-sm-6">
                                            <div class='input-group date' id='datetimepicker7'>
                                                <input type='text' class="form-control" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <p class="text-center">
								<button type="button" class="btn btn-primary" ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Generar Permiso</button>
                                    </p> 
                                    
                                    
                                    
                                    
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
         
    </div>
</div>
</div> 
    
           
    <!-- Fin del Contenido Principal-->
    

        <?php include(VISTA_RUTA."empleadoinclude/scripts.php") ?>
    </body>
    <script type="text/javascript">
    $(function () {
    
        $('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
        
    });
        
</script>
</html>

<?php else : redirecciona()->to("/")->withMessage(array(
                    "estado"=>"true",
                    "mensaje"=>"Inicia Sesion"
                ));?>


<?php endif; ?>