<?php
//todas las rutas disponibles en nuestra aplicación
$ruta = new Ruta();
$ruta->controladores(array(
    "/"=>"AuthController",
    "/recoverypassword"=>"RecoveryPasswordController",
    "/usuarios"=>"UsuarioController",
    "/ingresar"=>"IngresarController",
    "/admin"=>"AdminController",
    "/departamento"=>"DepartamentoController",
    "/cargo"=>"CargoController", 
    "/permisos"=>"PermisoController",  
	"/empleados"=>"EmpleadoController",
    "/empleado-estandar"=>"EmpleadoEstandarController",
));