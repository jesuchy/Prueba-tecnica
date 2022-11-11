<?php

class PersonaModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function Personal()
    {
        $this->db->query("SELECT T1.Id AS IdPersona, T1.Nombres, T1.Apellidos, T1.FechaNacimiento, T1.Identificacion, T1.Profesion, T1.Casado, T1.IngresosMensuales, T1.estado, T2.Id AS IdVehiculo, T2.Placa, T2.Marca, T2.Modelo, T2.NumeroPuertas, T2.TipoVehiculo FROM tbl_persona T1 INNER JOIN tbl_vehiculo T2 ON T1.VeiculoActual = T2.Id WHERE T1.estado = 1");
        $resultados = $this->db->registros();
        return $resultados;
    }
    public function SeleccionarPersonasId($id)
    {
        $this->db->query("SELECT T1.Id AS IdPersona, T1.Nombres, T1.Apellidos, T1.FechaNacimiento, T1.Identificacion, T1.Profesion, T1.Casado, T1.IngresosMensuales, T1.estado, T2.Id AS IdVehiculo, T2.Placa, T2.Marca, T2.Modelo, T2.NumeroPuertas, T2.TipoVehiculo FROM tbl_persona T1 INNER JOIN tbl_vehiculo T2 ON T1.VeiculoActual = T2.Id WHERE T1.estado = 1 AND T1.Id = '$id'");
        $resultados = $this->db->registro();
        return $resultados;
    }
    
    public function registrarPersona($datos)
    {
        $this->db->query("INSERT INTO tbl_persona(Id, Nombres, Apellidos, FechaNacimiento, Identificacion, Profesion, Casado, IngresosMensuales, VeiculoActual, estado)
         VALUES (NULL, :Nombre, :Apellido, :FechaNacimiento, :Documento, :Profesion, :Casado, :IngresosMensuales, :Vehiculo, 1)");

        $this->db->bind(':Nombre', $datos['Nombre']);
        $this->db->bind(':Apellido', $datos['Apellido']);
        $this->db->bind(':FechaNacimiento', $datos['FechaNacimiento']);
        $this->db->bind(':Documento', $datos['Documento']);
        $this->db->bind(':Profesion', $datos['Profesion']);
        $this->db->bind(':Casado', $datos['Casado']);
        $this->db->bind(':IngresosMensuales', $datos['IngresosMensuales']);
        $this->db->bind(':Vehiculo', $datos['Vehiculo']);
        ($this->db->execute()) ? true : false;
    }
    public function EditarPersona($datos)
    {
        $this->db->query("UPDATE tbl_persona SET Nombres = :Nombre, Apellidos = :Apellido, FechaNacimiento = :FechaNacimiento, Identificacion = :Documento, Profesion = :Profesion, Casado = :Casado, IngresosMensuales = :IngresosMensuales, VeiculoActual = :Vehiculo  WHERE Id = :id");

        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':Nombre', $datos['Nombre']);
        $this->db->bind(':Apellido', $datos['Apellido']);
        $this->db->bind(':FechaNacimiento', $datos['FechaNacimiento']);
        $this->db->bind(':Documento', $datos['Documento']);
        $this->db->bind(':Profesion', $datos['Profesion']);
        $this->db->bind(':Casado', $datos['Casado']);
        $this->db->bind(':IngresosMensuales', $datos['IngresosMensuales']);
        $this->db->bind(':Vehiculo', $datos['Vehiculo']);
        ($this->db->execute()) ? true : false;
    }
    public function EliminarPersona($id)
    {
        $this->db->query("UPDATE tbl_persona SET estado = 0  WHERE Id = '$id'");
        ($this->db->execute()) ? true : false;
    }

}
