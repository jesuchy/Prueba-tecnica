<?php

class BitacoraModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function CrearBitacora($datos)
    {
        $this->db->query("INSERT INTO tbl_bitacora (id, IdPersona, IdVehiculo) VALUES (NULL, :idPersona, :idVehiculo)");
        $this->db->bind(':idPersona', $datos['idPersona']);
        $this->db->bind(':idVehiculo', $datos['idVehiculo']);
        ($this->db->execute()) ? true : false;
    }

    public function SeleccionarBitacoraId($id)
    {
        $this->db->query("SELECT T2.Marca, T2.TipoVehiculo, T2.Modelo, T3.VeiculoActual  FROM tbl_bitacora  T1 INNER JOIN tbl_vehiculo T2 ON  T1.IdVehiculo = T2.Id INNER JOIN tbl_persona T3 ON T1.IdPersona = T3.Id WHERE T3.Id = $id;");
        $resultados = $this->db->registros();
        return $resultados;
    }
    
}
