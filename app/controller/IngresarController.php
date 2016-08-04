<?php 
use \vista\Vista;
use App\model\User;

use libreria\ORM\EtORM;

class IngresarController {

    public function index(){
    	

    		$id_empleado= input('user');
    		$password = md5(input("pass"));
    		
    		$objOrm = new EtORM();
    		$data = $objOrm->Ejecutar("login",array($id_empleado,$password));

    		if (count($data)>0){
    		//echo json_encode($data);
                //session_start();
                
                if ($data[0]["id_rol"] == 1 ){ // es administrador
                    
                    $_SESSION['usuario_admin']= $data[0]["id_empleado"];
                    redirecciona()->to("/admin");
                    
                } else if  ($data[0]["id_rol"] == 2 ){// es empleado, comparar si es jefe, empleado normal, etc.
                    
                    $data_empleado = $objOrm->Ejecutar("empleado_estandar",array($id_empleado));
                    if (count($data_empleado)>0){ // el empleado es empleado-estandar, el data 4s de la tabla empleado
                        
                        $_SESSION['usuario_estandar']= $data_empleado[0]["id"];
                        $_SESSION["email"]= $data_empleado[0]["email"];
                        $_SESSION["username"]= $data_empleado[0]["nombre"].' '.$data_empleado[0]["apellido"];
                        redirecciona()->to("/empleado-estandar");
                        
                    } 
                    
                }
                

    		}else{
    			redirecciona()->to("/")->withMessage(array(
                    "estado"=>"true",
                    "mensaje"=>"Usuario/Password incorrectos"
                ));
    		}
    	

    }
}

    