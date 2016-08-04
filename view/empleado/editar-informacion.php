<?php if (isset($_SESSION['usuario_estandar'])) :?>
<!DOCTYPE html>
<html lang="es">
<head>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
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
                                <h3 class="panel-title">Editar Información Personal</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form  class="form-horizontal form-border"  method="post" id="formdata"  name="fvalida">
                                  
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Cedula de Identidad</label>
                                        <div class="col-sm-6">
                                            <input type="text" readonly="readonly" class="form-control" value="<?php echo isset($empleado) ? $empleado->id : '' ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nombres</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" onkeypress="return soloLetras(event)" name ="nombre" value="<?php echo isset($empleado) ? $empleado->nombre : '' ?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Apellidos</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" onkeypress="return soloLetras(event)" name="apellido" value="<?php echo isset($empleado) ? $empleado->apellido : '' ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="fecha">Fecha de Nacimiento</label>
                                        <div class="col-sm-6">
                                            <div class='input-group date' id='datetimepicker1'>
                                            <input type="text" class="form-control" name="fecha_nacimiento" value="<?php echo isset($empleado) ? date("d/m/y",strtotime($empleado->fecha_nacimiento))  : '' ?>"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                               
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Sexo</label>
                                        <div class="col-sm-6">
                                        <select id="slct1" name="slct1" onchange="populate(this.id,'slct2')">
                                            <?php if (($empleado->sexo) =="Masculino") :  ?>
                                          <option value="Masculino" selected >Masculino</option>
                                          <option value="Femenino">Femenino</option>
                                            <?php else : ?>
                                            <option value="Masculino">Masculino</option>
                                          <option value="Femenino" selected>Femenino</option>
                                            <?php endif; ?>
                                        </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Estado Civil</label>
                                        <div class="col-sm-6">
                                           <select id="slct2" name="slct2">
                                               
                                               <?php if (($empleado->sexo) =="Masculino") : 
                                               if (($empleado->estado_civil) =="Soltero"){
                                                   echo '<option value="Soltero" seleced>Soltero</option>';
                                                   echo '<option value="Casado">Casado</option>';
                                                   echo '<option value="Divorciado">Divorciado</option>';
                                                   echo '<option value="Union Libre">Union Libre</option>';
                                                   echo '<option value="Viudo">Viudo</option>';
                                               }
                                                if (($empleado->estado_civil) =="Casado"){
                                                   echo '<option value="Soltero" >Soltero</option>';
                                                   echo '<option value="Casado" selected >Casado</option>';
                                                   echo '<option value="Divorciado">Divorciado</option>';
                                                   echo '<option value="Union Libre">Union Libre</option>';
                                                   echo '<option value="Viudo">Viudo</option>';
                                               }
                                               
                                               if (($empleado->estado_civil) =="Divorciado"){
                                                   echo '<option value="Soltero" >Soltero</option>';
                                                   echo '<option value="Casado"  >Casado</option>';
                                                   echo '<option value="Divorciado" selected>Divorciado</option>';
                                                   echo '<option value="Union Libre">Union Libre</option>';
                                                   echo '<option value="Viudo">Viudo</option>';
                                               }
                                               if (($empleado->estado_civil) =="Union Libre"){
                                                   echo '<option value="Soltero" >Soltero</option>';
                                                   echo '<option value="Casado"  >Casado</option>';
                                                   echo '<option value="Divorciado">Divorciado</option>';
                                                   echo '<option value="Union Libre" selected>Union Libre</option>';
                                                   echo '<option value="Viudo">Viudo</option>';
                                               }
                                               if (($empleado->estado_civil) =="Viudo"){
                                                   echo '<option value="Soltero" >Soltero</option>';
                                                   echo '<option value="Casado" >Casado</option>';
                                                   echo '<option value="Divorciado">Divorciado</option>';
                                                   echo '<option value="Union Libre">Union Libre</option>';
                                                   echo '<option value="Viudo" selected>Viudo</option>';
                                               }
                                                
                                               
                                               ?>
                                               <?php else : 
                                               if (($empleado->estado_civil) =="Soltera"){
                                                   echo '<option value="Soltera" seleced>Soltera</option>';
                                                   echo '<option value="Casada">Casada</option>';
                                                   echo '<option value="Divorciada">Divorciada</option>';
                                                   echo '<option value="Union Libre">Union Libre</option>';
                                                   echo '<option value="Viuda">Viuda</option>';
                                               }
                                                if (($empleado->estado_civil) =="Casada"){
                                                   echo '<option value="Soltera" >Soltera</option>';
                                                   echo '<option value="Casada" selected >Casada</option>';
                                                   echo '<option value="Divorciada">Divorciada</option>';
                                                   echo '<option value="Union Libre">Union Libre</option>';
                                                   echo '<option value="Viuda">Viuda</option>';
                                               }
                                               
                                               if (($empleado->estado_civil) =="Divorciada"){
                                                   echo '<option value="Soltera" >Soltera</option>';
                                                   echo '<option value="Casada"  >Casada</option>';
                                                   echo '<option value="Divorciada" selected>Divorciada</option>';
                                                   echo '<option value="Union Libre">Union Libre</option>';
                                                   echo '<option value="Viuda">Viuda</option>';
                                               }
                                               if (($empleado->estado_civil) =="Union Libre"){
                                                   echo '<option value="Soltera" >Soltera</option>';
                                                   echo '<option value="Casada"  >Casada</option>';
                                                   echo '<option value="Divorciada">Divorciada</option>';
                                                   echo '<option value="Union Libre" selected>Union Libre</option>';
                                                   echo '<option value="Viuda">Viuda</option>';
                                               }
                                               if (($empleado->estado_civil) =="Viuda"){
                                                   echo '<option value="Soltera" >Soltera</option>';
                                                   echo '<option value="Casada" >Casada</option>';
                                                   echo '<option value="Divorciada">Divorciada</option>';
                                                   echo '<option value="Union Libre">Union Libre</option>';
                                                   echo '<option value="Viuda" selected>Viuda</option>';
                                               }
                                               
                                               
                                               ?>
                                               
                                               
                                               <?php endif; ?>

                                            </select>
                                        
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Direccion</label>
                                        <div class="col-sm-6">
                                           <input type="text" class="form-control"  name ="direccion" value="<?php echo isset($empleado) ? $empleado->direccion : '' ?>" >

                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Telefono</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="telefono" onkeypress="return soloNumeros(event)" value="<?php echo isset($empleado) ? $empleado->telefono : '' ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Correo</label>
                                        <div class="col-sm-6">
                                            <input type="email" class="form-control" size="10" style="font-family: Arial; font-size: 10pt" name ="email" value="<?php echo isset($empleado) ? $empleado->email : '' ?>">
                                        </div>
                                    </div>
                                    
                                    <p class="text-center">
                                    <button type="button" class="btn btn-primary" id="botonenviardp" ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Actualizar Datos</button>
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
  <script>  
  function soloNumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "0123456789";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
      
 function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
      
      function populate(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
	if(s1.value == "Masculino"){
		var optionArray = ["|","soltero|Soltero","casado|Casado","divorciado|Divorciado","union libre|Union Libre","viudo|Viudo"];
	} else if(s1.value == "Femenino"){
		var optionArray = ["|","soltera|Soltera","casada|Casada","divorciada|Divorciada","union libre|Union Libre","viuda|Viuda"];
	} 
	for(var option in optionArray){
		var pair = optionArray[option].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[1];
		newOption.innerHTML = pair[1];
		s2.options.add(newOption);
	}
}

</script>
  
<script type="text/javascript">
    
//botonenviar = id del boton
    //formadata = id del form
    //guardarCambioContraseña = metodo del controlador EmpleadoControoller
    // res = lo que devuelve el metodo guardarCambioContraseña por lo general un echo, bandera, mensaje
    $(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#botonenviardp").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
        if(valida_envia_dp()){                               // Primero validará el formulario.
            $.post("guardarInformacionEditada",$("#formdata").serialize(),function(res){
                 
                if(res == 1){//puso la contraseña actual incorrecta
                    swal("Buen Trabajo!", "Los datos fueron actualizados correctamente", "success")
                    return false;
                }else { //hizo bien los pasos
                     swal("Algo salio mal!!", "Hubo un error al guardar los datos", "error");
                    return false;
                }
            });
        }
    });
    
     $(function () {
            $('#datetimepicker1').datetimepicker({
                format: 'DD/MM/YYYY'
            });
        });
        
        
});
          
   
    
function valida_envia_dp(){ 
   	//valido el nombre 
   	if (document.fvalida.nombre.value.length==0){ 
      	swal("Campos Vacio", "Por favor ingrese sus nombres");
      	document.fvalida.nombre.focus() 
      	return false; 
   	} 
    
    if (document.fvalida.apellido.value.length==0){ 
      	swal("Campos Vacio", "Por favor ingrese sus apellidos");
      	document.fvalida.nombre.focus() 
      	return false; 
   	} 


    
    if (document.fvalida.direccion.value.length==0){ 
      	swal("Campos Vacio", "Por favor ingrese su direccion");
      	document.fvalida.nombre.focus() 
      	return false; 
   	} 
    
    if (document.fvalida.telefono.value.length==0){ 
      	swal("Campos Vacio", "Por favor ingrese su telefono");
      	document.fvalida.nombre.focus() 
      	return false; 
   	}
    
    if (document.fvalida.email.value.length==0){ 
      	swal("Campos Vacio", "Por favor ingrese su email");
      	document.fvalida.nombre.focus() 
      	return false; 
   	}    
   	 

   	//valido el select 2   que es el estado civil
   if ($('#slct2').val().trim() === '') { 
      	swal("Campos Vacio", "Por favor seleccione su estado civil");
      	document.fvalida.interes.focus() 
      	return 0; 
   	} 

   return true;
}          
</script>
    

    
    </html>

<?php else : redirecciona()->to("/")->withMessage(array(
                    "estado"=>"true",
                    "mensaje"=>"Inicia Sesion"
                ));?>


<?php endif; ?>