<?php

class Personal extends Controlador
{

    public function __construct()
    {
        $this->PersonaModel = $this->modelo('PersonaModel');
        $this->vehiculoModel = $this->modelo('vehiculoModel');
    }

    public function index()
    {
        $Personal = $this->PersonaModel->Personal();
        $vehiculoModel = $this->vehiculoModel->vehiculo();
        $datos = [
            'Personal' => $Personal,
            'vehiculoModel' => $vehiculoModel
        ];
        $this->vista('personal/index', $datos);
    }
    public function SeleccionarPersonas()
    {
        $Personal = $this->PersonaModel->Personal();
        echo json_encode($Personal);
    }

    public function Api()
    {
        $Personal = $this->PersonaModel->Personal();
        var_dump($Personal);
    }

    public function registrarPersona()
    {
        $datos = [
            'Nombre' => $_POST['Nombre'],
            'Apellido' => $_POST['Apellido'],
            'FechaNacimiento' => $_POST['FechaNacimiento'],
            'Documento' => $_POST['Documento'],
            'Profesion' => $_POST['Profesion'],
            'Casado' => $_POST['Casado'],
            'IngresosMensuales' => $_POST['IngresosMensuales'],
            'Vehiculo' => $_POST['Vehiculo']
        ];
        $this->PersonaModel->registrarPersona($datos);
    }
    public function SeleccionarPersonasId()
    {
        $id = $_POST['id'];
        $dato = $this->PersonaModel->SeleccionarPersonasId($id);
        echo json_encode($dato);
    }
    public function EditarPersona()
    {
        $datos = [
            'id' => $_POST['id'],
            'Nombre' => $_POST['Nombre'],
            'Apellido' => $_POST['Apellido'],
            'FechaNacimiento' => $_POST['FechaNacimiento'],
            'Documento' => $_POST['Documento'],
            'Profesion' => $_POST['Profesion'],
            'Casado' => $_POST['Casado'],
            'IngresosMensuales' => $_POST['IngresosMensuales'],
            'Vehiculo' => $_POST['Vehiculo']
        ];
        $this->PersonaModel->EditarPersona($datos);
    }
    public function EliminarPersona()
    {
        $id = $_POST['id'];
        $dato = $this->PersonaModel->EliminarPersona($id);
        echo json_encode($dato);
    }
}
