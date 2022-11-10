<?php
	defined('BASEPATH') or exit('No se permite acceso directo');
	
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
	class Controlador {
		
		public function __construct() {
		    $this->EstudianteModel = $this->modelo('EstudianteModel');
		}

		public function modelo($modelo) {
			require_once '../app/models/' . $modelo . '.php';
			return new $modelo();
		}

		public function vista($vista, $datos = []) {
			if(file_exists('../app/views/' . $vista . '.php')) {
				require_once '../app/views/' . $vista . '.php';
			} else {
				require_once '../app/views/Error/Error404.php';
			}
		}
		
		public function MostrarAlerta($vista, $selectkey, $selectvalue, $type, $message){
            $this->vista($vista, [$selectkey => $selectvalue ,'type' => $type, 'message' => $message]);
        }
        
        public function EnvioPasswordEmail(){

            require '../public/plugins/PHPMailer/Exception.php';
            require '../public/plugins/PHPMailer/PHPMailer.php';
            require '../public/plugins/PHPMailer/SMTP.php';
            
            $mail = new PHPMailer(true);                              
            try {
                $mail->SMTPDebug = 0;                                       // Habilitar el debug
                $mail->isSMTP();                                            // Usar SMTP
                $mail->Host = 'mail.eleccionescolar.com';                   // Especificar el servidor SMTP reemplazando por el nombre del servidor donde esta alojada su cuenta
                $mail->SMTPAuth = true;                                     // Habilitar autenticacion SMTP
                $mail->Username = 'administracion@eleccionescolar.com';     // Nombre de usuario SMTP donde debe ir la cuenta de correo a utilizar para el envio
                $mail->Password = 'HawkinsDev';                             // Clave SMTP donde debe ir la clave de la cuenta de correo a utilizar para el envio
                $mail->SMTPSecure = 'ssl';                                  // Habilitar encriptacion
                $mail->Port = 465;                                          // Puerto SMTP 
                
                $db = new mysqli("localhost","eleccion_db","OrionDev2021","eleccion_sanbernarditadb");
                $result = $db->query('SELECT Tbl_estudiantes_NOMBRES, Tbl_estudiantes_CORREO, Tbl_estudiantes_PASSWORD FROM tbl_estudiantes');
                while($row = $result->fetch_array()){
                    //Content
                    $mail->isHTML(true);                                  
                    $mail->Subject = 'CLAVE PARA INGRESO SISTEMA DE ELECCIONES';
                    $mail->Body = 'BIENVENIDOS AL SISTEMA http://www.eleccionescolar.com, '. $row['Tbl_estudiantes_NOMBRES'] .' te enviamos su clave: ' . $row['Tbl_estudiantes_PASSWORD'];
                     
                    $mail->setFrom('administracion@eleccionescolar.com', 'SAN BERNARDITA');     //Direccion de correo remitente (DEBE SER EL MISMO "Username")
                    $mail->addAddress($row['Tbl_estudiantes_CORREO'], $row['Tbl_estudiantes_NOMBRES'] );                          // Agregar el destinatario
                    
                    if($mail->send()){
                        $vista = 'configuracion/estudiante/ListarEstudiantes';
                        $selectkey = 'ListarEstudiantes';
                        $selectvalue = $ListarEstudiantes = $this->EstudianteModel->ListarEstudiantes();
                        $type = 'success';
                        $message = '¡SE HAN ENVIADO LAS CONTRASEÑAS CORRECTAMENTE!';
                        $this->MostrarAlerta($vista,$selectkey,$selectvalue,$type,$message);
                    }
                    $mail->clearAddresses();
                }
            } catch (Exception $e) {
                $vista = 'configuracion/estudiante/ListarEstudiantes';
                $selectkey = 'ListarEstudiantes';
                $selectvalue = $ListarEstudiantes = $this->EstudianteModel->ListarEstudiantes();
                $type = 'danger';
                $message = '¡OCURRIO UN ERROR AL ENVIAR LAS CONTRASEÑAS Email error: !' . $mail->ErrorInfo ;
                $this->MostrarAlerta($vista,$selectkey,$selectvalue,$type,$message);
            }
        }
	}
