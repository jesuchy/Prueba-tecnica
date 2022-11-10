<?php

class PersonaModel{
    private $db;

    public function __construct(){
        $this->db = new Base;
    }

    public function registrarPersona($datos)
    {
        $this->db->query("INSERT INTO tbl_personal(tbl_personal_ID, tbl_personal_NOMBRE, tbl_personal_APELLIDO, tbl_personal_TIPO_DOCUMENTO, tbl_personal_DOCUMENTO, tbl_personal_EMPRESA, tbl_personal_DIRECCION, tbl_personal_CELULAR, tbl_personal_CORREO, tbl_personal_PASSWORD) VALUES (NULL, :Nombre, :Apellido, :TipoDocumento, :Documento, :Empresa, :Direccion, :Celular, :CorreoElectronico, :Contra)");

        $this->db->bind(':Nombre', $datos['Nombre']);
        $this->db->bind(':Apellido', $datos['Apellido']);
        $this->db->bind(':TipoDocumento', $datos['TipoDocumento']);
        $this->db->bind(':Documento', $datos['Documento']);
        $this->db->bind(':Empresa', $datos['Empresa']);
        $this->db->bind(':Direccion', $datos['Direccion']);
        $this->db->bind(':Celular', $datos['Celular']);
        $this->db->bind(':CorreoElectronico', $datos['CorreoElectronico']);
        $this->db->bind(':Contra', $datos['Contra']);
        ($this->db->execute()) ? true : false;
    }

    public function LoginUsuario($username){
        $this->db->query("SELECT * FROM tbl_personal WHERE tbl_personal_CORREO = '$username'");
        return $row = $this->db->registro();
    }
}
