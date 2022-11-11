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

}
