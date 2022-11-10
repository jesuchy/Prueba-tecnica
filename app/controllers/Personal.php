<?php

class Personal extends Controlador{
	
    public function __construct(){	
        $this->PersonaModel = $this->modelo('PersonaModel');
    }

    public function registrarPersona(){
        $datos = [
            'Nombre' => $_POST['Nombre'],
            'Apellido' => $_POST['Apellido'],
            'TipoDocumento' => $_POST['TipoDocumento'],
            'Documento' => $_POST['Documento'],
            'Empresa' => $_POST['Empresa'],
            'Direccion' => $_POST['Direccion'],
            'Celular' => $_POST['Celular'],
            'CorreoElectronico'=> $_POST['CorreoElectronico'],
            'Contra'=> $_POST['Contra']
        ];
        $this->PersonaModel->registrarPersona($datos);
   	}
}