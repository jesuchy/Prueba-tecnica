<?php

class Home extends Controlador{
	
    public function __construct(){	
        //echo 'Controlador paginas cargado';
        $this->PersonaModel = $this->modelo('PersonaModel');
    }

    public function Index(){
        $datos = [   
        ];
		$this->vista('home/index', $datos);
   	}

	public function Logout(){
		unset($_SESSION['sesion_active']);
		$this->vista('login/index');
	}
		
    public function actualizar($num_registro){
        echo $num_registro;
    }

}