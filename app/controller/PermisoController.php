
    
<?php
use \vista\Vista;
use App\model\Permiso;
use libreria\ORM\EtORM;

class PermisoController {

    public function index(){
    	$permiso = Permiso::all();
        return vista::crear("admin.permisos.listado-permisos-aprobados",array(
        "permisos"=>$permiso,
        ));
    }
    
    public function nuevo(){
        return vista::crear("admin.permiso.nuevo-permiso");
    }
    
    
    
    
    
    public function eliminarPermiso(){
        $id= $_POST['id'];
        $permiso = Permiso::find($id);
        $permiso->disponible=0;
        $permiso->guardar();
        
    }
    
    
    public function inicializar(){
    $pdo=Conexion::conectar();
    $stmt = $pdo->prepare("SELECT * FROM permiso WHERE disponible=1");
    $stmt->execute();
        
    $i=0;
	$tabla = "";
        
    $rows_affected = $stmt->rowCount();
        $rutaPermiso="permisos/reportePermiso/";

 
    if($rows_affected>0){
             while ($row = $stmt->fetch()) { 
                 $i++;
                  if($row['estado']=='Aceptado')$estado ='<span class=\"label label-success\">Aceptado</span>';
                  if($row['estado']=='Pendiente')$estado ='<span class=\"label label-warning\">Pendiente</span>';
                  if($row['estado']=='Rechazado')$estado ='<span class=\"label label-danger\">Rechazado</span>';
                 // $editar = '<button onclick=\"editarCargo('.$row['id'].')\" class=\"btn btn-primary btn-sm\">Editar</button>';
                  $eliminar ='<button onclick=\"eliminarPermisoAll('.$row['id'].')\" class=\"btn btn-danger\" ><i class=\"zmdi zmdi-delete\"></i></button>';
                  //$reporte = '<a target=\"_blank\"   class=\"btn btn-info btn-sm\">Reporte</a>';
                  $reporte  = '<a target=\"_blank\" href=\" '.$rutaPermiso.''.$row['id'].'\">Reporte</a>';
                //$reporte= '<a  target=\"_blank\" onclick=\"document.formulario.submit()\" class=\"btn btn-info btn-sm\">Reporte</a><form  action=\"permisos/reportePermiso\" method=\"post\" name=\"formulario\"><input type=\"hidden\" name=\"id\" value=\"'.$row['id'].'\"></form>';
                 
                     $tabla.='{"id":"'.$row['id'].'","id_empleado":"'.$row['id_empleado'].'","fecha":"'.$row['fecha'].'","motivo":"'.$row['motivo'].'","estado":"'.$estado.'","eliminar":"'.$eliminar.'","reporte":"'.$reporte.'"},';		
		                  $i++;
    

                         
                    }
                }
        $tabla = substr($tabla,0, strlen($tabla) - 1);

	    echo '{"data":['.$tabla.']}';	
        
    
        
    }
    
    public function reportePermiso($id){
         
        $permiso= Permiso::find($id);
         return vista::crear("admin.permisos.rptpermisogeneral",array("permiso" => $permiso));
        
    }
    
    
    
    
    
 

}