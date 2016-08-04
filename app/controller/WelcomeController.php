<?php
use \vista\Vista;
class WelcomeController {

    public function index(){
    	return Vista::crear('index');

    }

}