<?php
use \vista\Vista;
use App\model\Departamento;
use App\model\Cargo;
use App\model\Empleado;

use libreria\ORM\EtORM;


class EmpleadoController {

    public function index(){
    	$cargo = Cargo::all();
        return vista::crear("admin.cargo.listado-cargo",array(
        "cargos"=>$cargo,
        ));
    }
    
    public function nuevo(){
        return vista::crear("admin.cargo.nuevo-cargo");
    }


    public function agregarCargo(){
        
            
        
            $nombre_cargo=input("nombreCargo");
            $objOrm = new EtORM();
            $data = $objOrm->Ejecutar("buscar_cargo",array($nombre_cargo));

            if (!count($data)>0){ // si no tiene datos, entonces no hay ese cargo
            try{
                $cargo = new Cargo();
                $cargo->nombre=input("nombreCargo");
                $cargo->descripcion=input("descripcionCargo");
                $cargo->guardar();
                redirecciona()->to("cargo");

                } catch(Exception $e){

                }

            }else{
                redirecciona()->to("/cargo/nuevo")->withMessage(array(
                    "estado"=>"true",
                    "mensaje"=>"Registro Duplicado"
                ));

            }

        
    }
    
    public function modificarCargo(){
            try{
                $cargo = Cargo::find(input("idCargo"));
                $cargo->nombre=input("nombreCargo");
                $cargo->descripcion=input("descripcionCargo");
                $cargo->guardar();
                redirecciona()->to("cargo");

                } catch(Exception $e){

                }   
    }
    
    
    public function editar($id){
        $cargo = Cargo::find($id);
        if (count($cargo)) {
            return Vista::crear('admin.cargo.nuevo-cargo', array("cargo" => $cargo));
        }
        return redirecciona()->to('cargo');
    }
    
    
    public function eliminar($id){
        $cargo = Cargo::find($id);
        if (count($cargo)) {
            $cargo->estado=0;
            $cargo->guardar();
            redirecciona()->to("cargo");
        }
        return redirecciona()->to('cargo');
    }
}