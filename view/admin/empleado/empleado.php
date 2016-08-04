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
                      <li class="active">Nuevo Empleado</li>
                      <li><a href="<?php url("admin/listadoEmpleado") ?>">Listado de empleados</a></li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="container-fluid"  style="margin: 0px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="<?php asset("img/user02.png") ?>" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para registrar nuevos empleados. Para registrar un empleado debes de llenar todos los campos del siguiente formulario, también puedes ver el listado de empleados registrados
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Registrar un nuevo empleado</div>
                <form action="<?php echo url("empleados/agregarEmpleado")?>" autocomplete="off" method="post">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número de Cédula del empleado" pattern="[0-9-]{1,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números, 10 dígitos" name="cedula">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Número de Cédula</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí los nombres del empleado" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe los nombres del empleado, solamente letras" name="nombres">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Nombres</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí los apellidos del empleado" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe los apellidos del empleado, solamente letras" name="apellidos">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Apellidos</label>
                            </div>
							<div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí la dirección del empleado" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe la dirección del empleado, solamente letras" name="direccion">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Dirección</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número de teléfono del empleado" pattern="[0-9]{10,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente 10 números" name="telefono">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Teléfono</label>
                            </div>
                            <div class="group-material">
                                <input type="email" class="material-control tooltips-general" placeholder="Escribe aquí el correo eletrónico del empleado" required="" maxlength="40" data-toggle="tooltip" data-placement="top" title="Correo Electrónico del empleado" name="correo">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Correo</label>
                            </div>
							<div class="group-material">
                                <span>Departamento</span>
                                <select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige el departamento del empleado" name="departamentos">
                                <?php
								while($row = $stmt3s ->fetch()){
									echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
								}
								?>
                                </select>
                            </div>
							<div class="group-material">
								<span>Jefe</span>
								<select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige el jefe del empleado" id="jefes" name="jefes">
								<?php
								while($row = $stmt2s ->fetch()){
									echo '<option value="'.$row['id_empleado'].'">'.$row['nombre'].'</option>';
								}
								?>
								</select>
                            </div>
							<div class="group-material">
                                <span>Cargo</span>
                                <select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige el cargo del empleado" name="cargos">
									<?php
									while($row = $stmt1s ->fetch()){
										echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
									}
									?>
                                </select>
                            </div>
							<div class="group-material">
                                <input type="file" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" name="firma">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Firma</label>
                            </div>
                            <p class="text-center">
                                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
								<button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Actualizar</button>
                            </p> 
                        </div>
                    </div>
                </form>
            </div>
            <!-- Fin del Contenido Principal-->  
        </div>
            <!-- Fin del Contenido Principal-->  
        </div>
        <?php include(VISTA_RUTA."admininclude/scripts.php") ?>
    </body>
    </html>