<?php
use \vista\Vista;
class RecoveryPasswordController {

    public function index(){
    	return Vista::crear('auth.recoverypassword');

    }

}