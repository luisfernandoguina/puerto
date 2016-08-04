

$(function(){
	$('#bd-desde').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = '../php/busca_producto_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
	$('#bd-hasta').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = '../php/busca_producto_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
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
	
	$('#bs-prod').on('keyup',function(){
		var dato = $('#bs-prod').val();
		var url = 'cargo/buscarCargo';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
           
			$('#agrega-registros').html(datos);
             
		}
           
	} );
	return false;
	});
     
	
});

function agregaRegistro(){

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
			$('#agrega-registros').html(registro);;
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}

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
                        $('#agrega-registros').html(registro);
                        
			         return false;
                        
                    }
                    
                });
               
            }
        
            });
    
}

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
    e.preventDefault();
	return false;
}



