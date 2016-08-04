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
                                <h3 class="panel-title">Editar Contraseña</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="formulario"><!--Comienza el div formulario aja-->
                                <form class="form-horizontal form-border"  method="post" id="formdata"  name="fvalida">
                                  
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Contraseña Actual</label>
                                        <div class="col-sm-6">
                                            <input type="password"  name="contra_actual" class="form-control" value="">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Contraseña Nueva</label>
                                        <div class="col-sm-6">
                                            <input type="password"  name ="contra_nueva" class="form-control" value="">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Repetir Contraseña</label>
                                        <div class="col-sm-6">
                                            <input type="password" name ="contra_repetir" class="form-control" value="">
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <p class="text-center">
                                
								<button type="button" class="btn btn-primary" id="botonenviar" ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Actualizar Datos</button>
                                    </p> 
                                    
                                    
                                    
                                    
                                </form>
                            </div><!--Termina el div formulario ajax-->
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
    
    
    
<script >
    
    //botonenviar = id del boton
    //formadata = id del form
    //guardarCambioContraseña = metodo del controlador EmpleadoControoller
    // res = lo que devuelve el metodo guardarCambioContraseña por lo general un echo, bandera, mensaje
    $(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#botonenviar").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
        if(valida_cambio_contraseña()){                               // Primero validará el formulario.
            $.post("guardarCambioContraseña",$("#formdata").serialize(),function(res){
                 
                if(res == 1){//puso la contraseña actual incorrecta
                  swal("Algo salio mal!!", "La contraseña actual no coindide", "error");
                    return false;
                }if(res == 2){//puso mal las contraseñas nuevas
                    swal("Algo salio mal!!", "La contraseña nueva no coincide", "error");
                    return false;
                } else { //hizo bien los pasos
                    swal("Buen Trabajo!", "La contraseña fue modificada correctamente", "success")
                    return false;
                }
            });
        }
    });    
});
          
function valida_cambio_contraseña(){
    if(document.fvalida.contra_actual.value.length==0){
        swal("Campos Vacio", "Por favor ingrese su contraseña actual");
      	document.fvalida.contra_actual.focus() 
      	return false;
    }
    
    if(document.fvalida.contra_nueva.value.length==0){
       swal("Campos Vacio", "Por favor ingrese su nueva contraseña");
        document.fvalida.contra_nueva.focus()
        return false;
    }
    
    if (document.fvalida.contra_repetir.value.length==0){
        swal("Campos Vacio", "Por favor repita su contraseña nueva");
        document.fvalida.contra_repetir.focus()
        return false;        
        

    }
    
    return true; //hasta aqui todo esta correcto
} 
    
    
    
    
</script>
    
</html>
<?php else : redirecciona()->to("/")->withMessage(array(
                    "estado"=>"true",
                    "mensaje"=>"Inicia Sesion"
                ));?>


<?php endif; ?>