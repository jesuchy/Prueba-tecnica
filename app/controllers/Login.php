<?php

class Login extends Controlador{
	
    public function __construct(){	
        //echo 'Controlador paginas cargado';
        $this->PersonaModel = $this->modelo('PersonaModel');
    }

    public function index(){
        $datos = [   
        ];
		$this->vista('login/index', $datos);
   	}

    public function loginUsuario(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST'): 
				$username = trim($_POST['correo']);
				$password = trim($_POST['contraseña']);
				$resulset = $this->PersonaModel->LoginUsuario($username);
				if (isset($resulset)):
				    if($resulset->tbl_personal_PASSWORD == $password):
						$datos = [
							'id' => $resulset->tbl_personal_ID,
							'nombre' => $resulset->tbl_personal_NOMBRE,
							'apellido' => $resulset->tbl_personal_APELLIDO,
							'tipoDocumento' => $resulset->tbl_personal_TIPO_DOCUMENTO,
							'contraseña' => $resulset->tbl_personal_PASSWORD,
							'documento' => $resulset->tbl_personal_DOCUMENTO,
							'empresa' => $resulset->tbl_personal_EMPRESA,
							'direccion' => $resulset->tbl_personal_DIRECCION,
							'celular' => $resulset->tbl_personal_CELULAR,
							'correo' => $resulset->tbl_personal_CORREO
						];
						$_SESSION['sesion_active'] = $datos;
						$this->vista('home/redireccionar',$_SESSION['sesion_active']);
					else:
						$this->vista('login/index');
					endif;
				endif;
			endif;	
		
    }
	public function Logout(){
		unset($_SESSION['sesion_active']);
		$this->vista('login/index');
	}
		
    public function actualizar($num_registro){
        echo $num_registro;
    }

}