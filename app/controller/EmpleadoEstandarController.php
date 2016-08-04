<?php
use \vista\Vista;
use App\model\Empleado;
use App\model\Cuenta_Usuario;
use libreria\ORM\EtORM;


class EmpleadoEstandarController {

    public function index(){
    	return vista::crear("empleado.index");
    }
    
    public function cerrarSesion(){
 
        session_destroy();
        redirecciona()->to("/");
    }
    
    public function editarInformacion(){
        if (isset($_SESSION['usuario_estandar'])){
        $empleado = Empleado::find($_SESSION['usuario_estandar']);
        
        return vista::crear("empleado.editar-informacion", array("empleado" => $empleado));
        }else 
            redirecciona()->to("/")->withMessage(array(
                    "estado"=>"true",
                    "mensaje"=>"Inicia Sesion"
                ));
    }
    
    public function guardarInformacionEditada(){
        try{
        if (isset($_SESSION['usuario_estandar'])){
             $empleado = Empleado::find($_SESSION['usuario_estandar']);
             $empleado->nombre=input("nombre");
             $empleado->apellido=input("apellido");
        
            $originalDate = $_POST["fecha_nacimiento"];
            $porciones = explode("/",$originalDate);
            $dia = $porciones[0]; // porción1
            $mes = $porciones[1]; // porción2
            $anio = $porciones[2]; // porción2
            $fecha_guardar=$anio.'-'.$mes.'-'.$dia;
             $empleado->fecha_nacimiento=$fecha_guardar;
            $empleado->sexo=$_POST['slct1'];
            $empleado->estado_civil=$_POST['slct2'];
            
            $empleado->direccion=input("direccion");
            $empleado->telefono=input("telefono");
            $empleado->email=input("email");
            $empleado->guardar();
            echo "1";//no hay errores
        }
        }catch(Exception $e){
            
        }
    }
    
    
    public function guardarCambioContraseña(){
        if (isset($_SESSION['usuario_estandar'])){
            $id_empleado = $_SESSION['usuario_estandar'];
            $id_cuenta_usuario = "";
            $contraseña_actual="";
            $pdo=Conexion::conectar();
            $stmt = $pdo->prepare("SELECT id, password FROM cuenta_usuario WHERE id_empleado ='".$id_empleado."'");
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $contraseña_actual = $row['password'];//obtengo el pass
                $id_cuenta_usuario = $row['id'];//obtengo el id de cuenta de usuario respecto al id_empleado
            }//una sola condcion sin llaves
            
            if ($contraseña_actual!=md5($_POST['contra_actual'])) {
                echo "1";
            }
            else if ($_POST['contra_nueva']==$_POST['contra_repetir']) {
                $cuenta_usuario = Cuenta_Usuario::find($id_cuenta_usuario);
                $cuenta_usuario->password=md5($_POST['contra_nueva']);
                $cuenta_usuario->guardar();
            } else echo "2";       
          
    }
        
    }
    
    public function cambiarContraseña(){
        return vista::crear("empleado.cambiar-contrasenia");
    }
    
    public function nuevoPermiso(){
        if (isset($_SESSION['usuario_estandar'])){
        $empleado = Empleado::find($_SESSION['usuario_estandar']);
        
        return vista::crear("empleado.nuevo-permiso", array("empleado" => $empleado));
        }else {
            redirecciona()->to("/")->withMessage(array(
                    "estado"=>"true",
                    "mensaje"=>"Inicia Sesion"
                ));
        }
        
    }
    
    public function listadoPermisos(){
        return vista::crear("empleado.listado-permisos");
    }
    
    
    
    
    
    
    
    

}