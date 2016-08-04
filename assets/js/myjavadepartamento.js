$(function(){
	
	//funcion para un nuevo departamento, se activa cuando presiona el boton de nuevo departa,ento y se abre la modal
	$('#nuevo-departamento').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-departamento').modal({
			show:true,
			backdrop:'static'
		});
	});
	
});


//para agregar departamento, se activa cuando presiono el boton de registrar que se encuentre en  la ventana modal
function agregaDepartamento(){

	var url = 'departamento/agregarDepartamento';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
            $('#pro').val("Registro");  
			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
            visualizarDepartamento();
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
            visualizarDepartamento();
			return false;
			}
		}
	});
	return false;
}


//funcion para eliminar departamento, recibe el id de la table y luego reload a data table
function eliminarDepartamento(id){
    
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
                
                var url = 'departamento/eliminarDepartamento';
                $.ajax({
                    type:'POST',
                    url:url,
                    data:'id='+id,
                    success: function(registro){
                        visualizarDepartamento();
			            return false;
                        
                    }
                    
                });
               
    } 
            });
}


//visualizar el listado de departamento
function visualizarDepartamento(){
     $("#dtdepartamento").dataTable().fnDestroy();
    var table = $('#dtdepartamento').dataTable( {				
				"ajax": "departamento/inicializar",					
					 "columns": [
						{ "data": "id" },
						{ "data": "nombre" },
						{ "data": "descripcion" },
						{ "data": "editar" },
						{ "data": "eliminar" }
                         
						]
			    });
}


         

// para editar departamento, recibe un json de la consulta realizada luego muestra en la modal
function editarDepartamento(id){
    //resetear el formulario, debido a que se trabaja con el mismo forumlaria para agregar y editar
	$('#formulario')[0].reset();
	var url = 'departamento/editarDepartamento';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
            //guardo todos los valores del json que se envia
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Edicion');
				$('#id_departamento').val(datos[0]);
				$('#nombre').val(datos[1]);
				$('#descripcion').val(datos[2]);
				$('#registra-departamento').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}



