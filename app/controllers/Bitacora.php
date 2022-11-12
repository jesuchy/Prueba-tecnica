<?php

class Bitacora extends Controlador{
	
    public function __construct()
    {
        $this->BitacoraModel = $this->modelo('BitacoraModel');
    }

    public function index(){
   	}

    public function CrearBitacora(){
        $datos = [
            'idPersona' => $_POST['idPersona'],
            'idVehiculo' => $_POST['idVehiculo'] 
        ];
        $this->BitacoraModel->CrearBitacora($datos);
    }
    public function SeleccionarBitacoraId()
    {
        $id = $_POST['id'];
        $dato = $this->BitacoraModel->SeleccionarBitacoraId($id);
        echo json_encode($dato);
    }

}