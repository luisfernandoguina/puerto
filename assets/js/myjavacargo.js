$(function(){
	
	//funcion para un nuevo cargo, se activa cuando presiona el boton de nuevo departa,ento y se abre la modal
	$('#nuevo-cargo').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-cargo').modal({
			show:true,
			backdrop:'static'
		});
	});
	
});


//para agregar cargo, se activa cuando presiono el boton de registrar que se encuentre en  la ventana modal
function agregaCargo(){

	var url = 'cargo/agregarCargo';
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
            visualizarCargo();
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
            visualizarCargo();
			return false;
			}
		}
	});
	return false;
}


//funcion para eliminar cargo, recibe el id de la table y luego reload a data table
function eliminarCargo(id){
    
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
                
                var url = 'cargo/eliminarCargo';
                $.ajax({
                    type:'POST',
                    url:url,
                    data:'id='+id,
                    success: function(registro){
                        visualizarCargo();
			            return false;
                        
                    }
                    
                });
               
    } 
            });
}


//visualizar el listado de cargo
function visualizarCargo(){
     $("#dtcargo").dataTable().fnDestroy();
    var table = $('#dtcargo').dataTable( {				
				"ajax": "cargo/inicializar",					
					 "columns": [
						{ "data": "id" },
						{ "data": "nombre" },
						{ "data": "descripcion" },
						{ "data": "editar" },
						{ "data": "eliminar" }
                         
						]
			    });
}


         

// para editar cargo, recibe un json de la consulta realizada luego muestra en la modal
function editarCargo(id){
    //resetear el formulario, debido a que se trabaja con el mismo forumlaria para agregar y editar
	$('#formulario')[0].reset();
	var url = 'cargo/editarCargo';
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
				$('#id_cargo').val(datos[0]);
				$('#nombre').val(datos[1]);
				$('#descripcion').val(datos[2]);
				$('#registra-cargo').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}



