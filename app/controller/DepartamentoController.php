<?php
use \vista\Vista;
use App\model\Departamento;

use libreria\ORM\EtORM;


class DepartamentoController {

   public function index(){
    	$departamento = Departamento::all();
        return vista::crear("admin.departamento.listado-departamento");
    }
    
    
    public function inicializar(){
    $pdo=Conexion::conectar();
    $stmt = $pdo->prepare("SELECT * FROM departamento WHERE estado=1");
    $stmt->execute();
        
	$tabla = "";
        
    $rows_affected = $stmt->rowCount();
 
    if($rows_affected>0){
             while ($row = $stmt->fetch()) { 
                  $editar = '<button onclick=\"editarDepartamento('.$row['id'].')\" class=\"btn btn-primary btn-sm\">Editar</button>';
                 $eliminar ='<button onclick=\"eliminarDepartamento('.$row['id'].')\" class=\"btn btn-danger\" ><i class=\"zmdi zmdi-delete\"></i></button>';

                     $tabla.='{"id":"'.$row['id'].'","nombre":"'.$row['nombre'].'","descripcion":"'.$row['descripcion'].'","editar":"'.$editar.'","eliminar":"'.$eliminar.'"},';		
                         
                    }
                }
        $tabla = substr($tabla,0, strlen($tabla) - 1);

	    echo '{"data":['.$tabla.']}';	
        
    
        
    }
    
   
    public function agregarDepartamento(){
        $proceso = $_POST['pro'];
        switch($proceso){
                
            case 'Registro':
                $nombre_departamento=input("nombre");
                $objOrm = new EtORM();
                $data = $objOrm->Ejecutar("buscar_departamento",array($nombre_departamento));
                
                if (!count($data)>0){ // si no tiene datos, entonces no hay ese departamento
                    try{
                        $departamento = new Departamento();
                        $departamento->nombre=input("nombre");
                        $departamento->descripcion=input("descripcion");
                        $departamento->guardar();


                        } catch(Exception $e){

                        }

                    }else{
                    // no lo guardo ya que esta repetido el nombre
                    }  
            break;

            case 'Edicion':
                $departamento = Departamento::find(input("id_departamento"));
                $departamento->nombre=input("nombre");
                $departamento->descripcion=input("descripcion");
                $departamento->guardar();
                
            break;

        
    }
    }
    
   
    public function editarDepartamento(){
        $id = $_POST['id'];
    
        //obtener informdepartamento
        $departamento = Departamento::find($id);

        $datos = array(
            0=>$departamento->id,
            1=>$departamento->nombre,
            2=>$departamento->descripcion,
            );
        echo json_encode($datos); 
        
    }
    
    public function eliminarDepartamento(){
        $id= $_POST['id'];
        $departamento = Departamento::find($id);
        $departamento->estado=0;
        $departamento->guardar();
        
    }
    
    public function reporteDepartamentoGeneral(){
        return vista::crear("admin.departamento.rptdepartamentogeneral");
        
        
    }
    
    
    
 

}