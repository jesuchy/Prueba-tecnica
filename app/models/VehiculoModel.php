<?php

class VehiculoModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function vehiculo()
    {
        $this->db->query("SELECT * FROM tbl_vehiculo WHERE estado = 1");
        $resultados = $this->db->registros();
        return $resultados;
    }
    public function SeleccionarVehiculoId($id)
    {
        $this->db->query("SELECT * FROM tbl_vehiculo WHERE estado = 1 AND Id = $id");
        $resultados = $this->db->registro();
        return $resultados;
    }
    public function SeleccionarVehiculoBuscar($id)
    {
        $this->db->query("SELECT * FROM tbl_vehiculo WHERE estado = 1 AND Marca LIKE '%$id%' OR Modelo LIKE '%$id%' OR TipoVehiculo LIKE '%$id%' OR Placa LIKE '%$id%'");
        $resultados = $this->db->registros();
        return $resultados;
    }
    public function RegistrarVehiculo($datos)
    {
        $this->db->query("INSERT INTO tbl_vehiculo(Id, Placa, Marca, Modelo, NumeroPuertas, TipoVehiculo, estado) VALUES (NULL, :Placa, :Marca, :Modelo, :NumeroPuertas, :TipoVehiculo, 1)");

        $this->db->bind(':Marca', $datos['Marca']);
        $this->db->bind(':Modelo', $datos['Modelo']);
        $this->db->bind(':TipoVehiculo', $datos['TipoVehiculo']);
        $this->db->bind(':Placa', $datos['Placa']);
        $this->db->bind(':NumeroPuertas', $datos['NumeroPuertas']);
        ($this->db->execute()) ? true : false;
    }
    public function EditarVehiulo($datos)
    {
        $this->db->query("UPDATE tbl_vehiculo SET Placa = :Placa, Marca = :Marca, Modelo = :Modelo, NumeroPuertas = :NumeroPuertas, TipoVehiculo = :TipoVehiculo WHERE Id = :id");

        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':Marca', $datos['Marca']);
        $this->db->bind(':Modelo', $datos['Modelo']);
        $this->db->bind(':TipoVehiculo', $datos['TipoVehiculo']);
        $this->db->bind(':Placa', $datos['Placa']);
        $this->db->bind(':NumeroPuertas', $datos['NumeroPuertas']);
        ($this->db->execute()) ? true : false;
    }
    public function EliminarVehiculo($id)
    {
        $this->db->query("UPDATE tbl_vehiculo SET estado = 0 WHERE Id = $id");
        ($this->db->execute()) ? true : false;
    }

}
