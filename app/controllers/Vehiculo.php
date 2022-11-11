<?php

class Vehiculo extends Controlador{
	
    public function __construct(){	
        $this->VehiculoModel = $this->modelo('VehiculoModel');
    }

    public function index(){
        $Vehiculo = $this->VehiculoModel->vehiculo();
        $datos = [
            'Vehiculo' => $Vehiculo
        ];
        $this->vista('vehiculo/index', $datos);
   	}
    public function Vehiculo(){
        $Vehiculo = $this->VehiculoModel->vehiculo();
        echo json_encode($Vehiculo);
    }
    public function RegistrarVehiculo()
    {
        $datos = [
            'Marca' => $_POST['Marca'],
            'Modelo' => $_POST['Modelo'],
            'TipoVehiculo' => $_POST['TipoVehiculo'],
            'Placa' => $_POST['Placa'],
            'NumeroPuertas' => $_POST['NumeroPuertas']
        ];
        $this->VehiculoModel->RegistrarVehiculo($datos);
    }
}