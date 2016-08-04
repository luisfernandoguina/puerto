<?php
use \vista\Vista;
use App\model\Cargo;

use libreria\ORM\EtORM;


class CargoController {

    public function index(){
    	$cargo = Cargo::all();
        return vista::crear("admin.cargo.listado-cargo");
    }
    
    
    public function inicializar(){
    $pdo=Conexion::conectar();
    $stmt = $pdo->prepare("SELECT * FROM cargo WHERE estado=1");
    $stmt->execute();
        
	$tabla = "";
        
    $rows_affected = $stmt->rowCount();
 
    if($rows_affected>0){
             while ($row = $stmt->fetch()) { 
                  $editar = '<button onclick=\"editarCargo('.$row['id'].')\" class=\"btn btn-primary btn-sm\">Editar</button>';
                 $eliminar ='<button onclick=\"eliminarCargo('.$row['id'].')\" class=\"btn btn-danger\" ><i class=\"zmdi zmdi-delete\"></i></button>';

                     $tabla.='{"id":"'.$row['id'].'","nombre":"'.$row['nombre'].'","descripcion":"'.$row['descripcion'].'","editar":"'.$editar.'","eliminar":"'.$eliminar.'"},';		
                         
                    }
                }
        $tabla = substr($tabla,0, strlen($tabla) - 1);

	    echo '{"data":['.$tabla.']}';	
        
    
        
    }
    
   
    public function agregarCargo(){
        $proceso = $_POST['pro'];
        switch($proceso){
                
            case 'Registro':
                $nombre_cargo=input("nombre");
                $objOrm = new EtORM();
                $data = $objOrm->Ejecutar("buscar_cargo",array($nombre_cargo));
                
                if (!count($data)>0){ // si no tiene datos, entonces no hay ese cargo
                    try{
                        $cargo = new Cargo();
                        $cargo->nombre=input("nombre");
                        $cargo->descripcion=input("descripcion");
                        $cargo->guardar();


                        } catch(Exception $e){

                        }

                    }else{
                    // no lo guardo ya que esta repetido el nombre
                    }  
            break;

            case 'Edicion':
                $cargo = Cargo::find(input("id_cargo"));
                $cargo->nombre=input("nombre");
                $cargo->descripcion=input("descripcion");
                $cargo->guardar();
                
            break;

        
    }
    }
    
   
    public function editarCargo(){
        $id = $_POST['id'];
    
        //obtener informcargo
        $cargo = Cargo::find($id);

        $datos = array(
            0=>$cargo->id,
            1=>$cargo->nombre,
            2=>$cargo->descripcion,
            );
        echo json_encode($datos); 
        
    }
    
    public function eliminarCargo(){
        $id= $_POST['id'];
        $cargo = Cargo::find($id);
        $cargo->estado=0;
        $cargo->guardar();
        
    }
    
    public function reporteCargoGeneral(){
        return vista::crear("admin.cargo.rptcargogeneral");
        
        
    }
        

}