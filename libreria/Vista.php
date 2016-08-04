<?php namespace vista;


class Vista {

    public static function crear($path,$key=null,$value=null){
        //comprobamos si existe la variable path
        if($path != ""){
            $paths = explode(".",$path); // convertimos a un array separado por puntos
            $ruta = ""; // inicializamos
            for($i =0;$i < count($paths);$i++){ //recorrer el $paths
                if($i == count($paths)-1){ // comprobamos si es el ultimo
                    $ruta .= $paths[$i].".php"; // le ponemos .php
                }else{
                    $ruta .= $paths[$i]."/"; // le concatenamos (/)
                }

            }
            // comprobar si ese archivo existe
            if(file_exists(VISTA_RUTA.$ruta)){
                //comprobar si existe $key
                if(!is_null($key)){
                    if(is_array($key)){
                        // extrae los keys y los convierte a variables
                        extract($key,EXTR_PREFIX_SAME,"");
                    }else{
                        //("index","usus",$usuarios)
                        //$usus = $usuarios;
                        ${$key} = $value;
                    }
                }
                include VISTA_RUTA.$ruta;
            }else{
                die("no existe la vista");
            }
        }

        return null;
    }
    
    public static function crear2($path,$key=null,$value=null){
        //comprobamos si existe la variable path
        if($path != ""){
            $paths = explode(".",$path); // convertimos a un array separado por puntos
            $ruta = ""; // inicializamos
            for($i =0;$i < count($paths);$i++){ //recorrer el $paths
                if($i == count($paths)-1){ // comprobamos si es el ultimo
                    $ruta .= $paths[$i].".php"; // le ponemos .php
                }else{
                    $ruta .= $paths[$i]."/"; // le concatenamos (/)
                }

            }
            // comprobar si ese archivo existe
            if(file_exists(VISTA_RUTA.$ruta)){
                //comprobar si existe $key
                if(!is_null($key)){
                    if(is_array($key)){
                        // extrae los keys y los convierte a variables
                        extract($key,EXTR_PREFIX_SAME,"");
                    }else{
                        //("index","usus",$usuarios)
                        //$usus = $usuarios;
                        ${$key} = $value;
                    }
                }
                echo '<script>
                window.open(VISTA_RUTA.$ruta);
                </script>';
            }else{
                die("no existe la vista");
            }
        }

        return null;
    }
    
    
    

}