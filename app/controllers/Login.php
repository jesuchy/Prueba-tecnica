<?php

class Login extends Controlador{
	
    public function __construct(){	
    }

    public function index(){
        $datos = [   
        ];
		$this->vista('home/redireccionar', $datos);
   	}

}