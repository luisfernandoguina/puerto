<?php
use \vista\Vista;
use App\model\Departamento;
use App\model\Cargo;

use libreria\ORM\EtORM;


class AdminController {

    public function index(){
    	return vista::crear("admin.index");
    }
    
    public function cerrarSesion(){
        session_unset(); 
        session_destroy();
    }
    
    

}