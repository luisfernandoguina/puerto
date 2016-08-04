

$(function(){
	
	
	
     
	
});

function reportePermiso(id){
    
    var url = 'permisos/reportePermiso';
    //window.location.href=url;
    $.ajax({
                    type:'POST',
                    url:url,
                    data:'id='+id,
                    success: function(registro){
                        
			            //return false;
                        
                    }
                    
                });
    
}

function eliminarPermisoAll(id){
    
    $.confirm({
            title: '¿Deseas eliminar el registro ?',
            content: 'Se excluira del sistema',
             confirmButtonClass: 'btn-danger',
            cancelButtonClass: 'btn-info',
            confirmButton: 'Aceptar',
            cancelButton: 'Cancelar',
            animation: 'zoom',
            closeAnimation: 'scale',
            confirm: function(){
                
                var url = 'permisos/eliminarPermiso';
                $.ajax({
                    type:'POST',
                    url:url,
                    data:'id='+id,
                    success: function(registro){
                        visualizarPermisoAll();
			            return false;
                        
                    }
                    
                });
               
    } 
            });
  
}

function visualizarPermisoAll(){
     $("#dtpermisos").dataTable().fnDestroy();
    var table = $('#dtpermisos').dataTable( {				
				"ajax": "permisos/inicializar",					
					 "columns": [
						{ "width": "10px" ,"data": "id" },
						{ "width": "20px" , "data": "id_empleado" },
						{ "width": "40px" , "data": "fecha" },
						{ "width": "80px" ,"data": "motivo" },
						{ "width": "40px" ,"data": "estado" },
                         { "width": "40px", "data": "eliminar" },
                         { "width": "40px", "data": "reporte" }
						]
        
			    });
}


         






