<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL ?>/css/index.css">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL ?>/css/login.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <title>Farmacia</title>

</head>


<body>

    <div class="contenido">
        <div class="login-box">
            <div>
                <div class="Nav">
                    <div class="Login Border">
                        Login
                    </div>
                    <div class="Registra">
                        Registrar
                    </div>
                </div>

                <form action="<?php echo RUTA_URL?>/Login/loginUsuario" method="POST" class="ContLogin" id="ContLogin">
                    
                    <div class="user-box">
                        <input type="text" name="correo" class="InpLogin" name="" required="" value="" placeholder="">
                        <label>Correo</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="contraseña" class="password" required="" placeholder="">
                        <label>Contraseña</label>
                    </div>

                    <a type="submit" id="iniciarSession"> 
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        iniciar sesión
                    </a>
                </form>


                <form class="ContRegistrar">
                    <div class="user-box">
                        <input type="text" class="Input" name="" required="" value="" placeholder="" id="Nombre">
                        <label>Nombre</label>
                    </div>
                    <div class="user-box">
                        <input type="text" class="Input" required="" placeholder="" id="Apellido">
                        <label>Apellido</label>
                    </div>
                    <div class="cont_select_center">
                        <div class="select_mate" data-mate-select="active">
                            <select name="" onchange="" onclick="return false;" id="TipoDocumento">
                                <option value="">Tipo de documento </option>
                                <option value="CC">CC</option>
                                <option value="CE">CE</option>
                                <option value="TI">TI</option>
                                <option value="SSN">SSN</option>
                                <option value="NIT">NIT</option>
                                <option value="PPN">PPN</option>
                            </select>
                            <p class="selecionado_opcion" onclick="open_select(this)"></p><span onclick="open_select(this)" class="icon_select_mate"><svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z" />
                                    <path d="M0-.75h24v24H0z" fill="none" />
                                </svg></span>
                            <div class="cont_list_select_mate">
                                <ul class="cont_select_int"> </ul>
                            </div>
                        </div>
                    </div>
                    <div class="user-box">
                        <input type="text" class="" required="" placeholder="" id="Documento">
                        <label>Numero de documento</label>
                    </div>
                    <div class="user-box">
                        <input type="text" class="Input" name="" required="" value="" placeholder="" id="Empresa">
                        <label>Nombre de la empresa que representa</label>
                    </div>
                    <div class="user-box">
                        <input type="text" class="Input" name="" required="" value="" placeholder="" id="Direccion">
                        <label>Direccion</label>
                    </div>
                    <div class="user-box">
                        <input type="text" class="" required="" placeholder="" id="Celular">
                        <label>Numero celular</label>
                    </div>
                    <div class="user-box">
                        <input type="text" class="" required="" placeholder="" id="CorreoElectronico">
                        <label>Correo electronico</label>
                    </div>
                    <div class="user-box">
                        <input type="text" class="password" required="" placeholder="" id="Password">
                        <label>Contraseña</label>
                    </div>
                    <a type="button" id="BtnRegistrar" type="button">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Registrar
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>



<script src="<?php echo RUTA_URL ?>/js/index.js"></script>
<script src="<?php echo RUTA_URL ?>/js/select.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $(".password").attr("type", "password");

        $(".Registra").click(function() {
            $(".ContRegistrar").show();
            $(".ContLogin").hide();

            $(".Registra").addClass("Border");
            $(".Login").removeClass("Border");
        });

        $(".Login").click(function() {
            $(".ContRegistrar").hide();
            $(".ContLogin").show();


            $(".Registra").removeClass("Border");
            $(".Login").addClass("Border");
        });

        $("#BtnRegistrar").click(function() {
            var Nombre = $('#Nombre').val();
            var Apellido = $('#Apellido').val();
            var TipoDocumento = $('#TipoDocumento').val();
            var Documento = $('#Documento').val();
            var Empresa = $('#Empresa').val();
            var Direccion = $('#Direccion').val();
            var Celular = $('#Celular').val();
            var CorreoElectronico = $('#CorreoElectronico').val();
            var Contra = $('#Password').val();

            $.ajax({
                url: '<?php echo RUTA_URL ?>/Personal/registrarPersona',
                type: 'POST',
                data: {
                    Nombre: Nombre,
                    Apellido: Apellido,
                    TipoDocumento: TipoDocumento,
                    Documento: Documento,
                    Empresa: Empresa,
                    Direccion: Direccion,
                    Celular: Celular,
                    CorreoElectronico: CorreoElectronico,
                    Contra: Contra
                }
            }).done(function() {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Registrado exitosamente',
                    showConfirmButton: false,
                    timer: 3000
                });
                setTimeout(function() {
                    location.reload();
                }, 3000);
            }).fail(function() {
                alert("Algo esta patinando");
            })

        });

        // Validamos que los campos de login esten llenos 

        $("#iniciarSession").click(function(){
            var correo = $(".InpLogin").val();
            var Contra = $(".password").val();
            if(correo == "" || Contra == ""){
                alert("Hay campos vacios");
            }else{
                document.getElementById("ContLogin").submit(); 
            }
        })
    })
</script>