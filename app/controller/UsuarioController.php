<?php

use \vista\Vista;
use \App\model\User;
class UsuarioController {

    public function index(){
        try{
        $user = new User();
        $user->id_empleado = "0706430980";
        $user->email = "anunsun@yahoo.com";
        $user->password ="asas";
        $user->estado ="1";
        $user->id_rol ="0";


        $user->guardar();

    } catch(Exception $e){
         echo $e->getMessage();
    }
 

    }

    public function insertar(){
      //SOLO CUANDO EL EMPLEADO TENGA JEFE 
        $pdo=Conexion::conectar();
        $sentencia = $pdo->prepare("INSERT INTO empleado (id, nombre, apellido,direccion,telefono,email,estado,firma,jefe,id_cargo,id_departamento) VALUES (:id, :nombre, :apellido,:direccion,:telefono,:email,:estado,:firma,:jefe,:id_cargo,:id_departamento)");
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':apellido', $apellido);
        $sentencia->bindParam(':direccion', $direccion);
        $sentencia->bindParam(':telefono', $telefono);
        $sentencia->bindParam(':email', $email);
        $sentencia->bindParam(':estado', $estado);
        $sentencia->bindParam(':firma', $firma);
        $sentencia->bindParam(':jefe', $jefe);
        $sentencia->bindParam(':id_cargo', $id_cargo);
        $sentencia->bindParam(':id_departamento', $id_departamento);
        
        // estos los valores de los input
         $id="0700950454";
         $nombre="aaa";
         $apellido="ssss";
        $direccion="sss";
         $telefono=23323232;
         $email="asasas@asass.com";
          $estado=1;
           $firma="NULL";
          $jefe="0706430980";
          $id_cargo=3;
          $id_departamento=16;
          $sentencia->execute();
        
        
        //CUANDO NO TIENE JEFE--=EL EMPLEADO ES JEFE (NO ENVIAR EL PARAMETRO JEFE,LA BDD AUTOMTICAMENTE PONE NULL)
        $pdo=Conexion::conectar();
        $sentencia = $pdo->prepare("INSERT INTO empleado (id, nombre, apellido,direccion,telefono,email,estado,firma,id_cargo,id_departamento) VALUES (:id, :nombre, :apellido,:direccion,:telefono,:email,:estado,:firma,:id_cargo,:id_departamento)");
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':apellido', $apellido);
        $sentencia->bindParam(':direccion', $direccion);
        $sentencia->bindParam(':telefono', $telefono);
        $sentencia->bindParam(':email', $email);
        $sentencia->bindParam(':estado', $estado);
        $sentencia->bindParam(':firma', $firma);
        $sentencia->bindParam(':id_cargo', $id_cargo);
        $sentencia->bindParam(':id_departamento', $id_departamento);
        
        // estos los valores de los inputs
         $id="0700950454";
         $nombre="aaa";
         $apellido="ssss";
        $direccion="sss";
         $telefono=23323232;
         $email="asasas@asass.com";
          $estado=1;
           $firma="NULL";
          $id_cargo=3;
          $id_departamento=16;
          $sentencia->execute();
        
        

    
    }

}