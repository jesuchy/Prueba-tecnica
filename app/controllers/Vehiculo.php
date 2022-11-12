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
    public function SeleccionarVehiculoId()
    {
        $id = $_POST['id'];
        $dato = $this->VehiculoModel->SeleccionarVehiculoId($id);
        echo json_encode($dato);
    }
    public function SeleccionarVehiculoBuscar()
    {
        $id = $_POST['id'];
        $dato = $this->VehiculoModel->SeleccionarVehiculoBuscar($id);
        echo json_encode($dato);
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
    public function EditarVehiulo()
    {
        $datos = [
            'id' => $_POST['id'],
            'Marca' => $_POST['Marca'],
            'Modelo' => $_POST['Modelo'],
            'TipoVehiculo' => $_POST['TipoVehiculo'],
            'Placa' => $_POST['Placa'],
            'NumeroPuertas' => $_POST['NumeroPuertas']
        ];
        $this->VehiculoModel->EditarVehiulo($datos);
    }
    public function EliminarVehiculo()
    {
        $id = $_POST['id'];
        $this->VehiculoModel->EliminarVehiculo($id);
    }
}