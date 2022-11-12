<?php require_once "../app/views/template.php"; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<title>Bootstrap Example</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="contenido">
    <div class="ConTable">
        <div class="table-responsive">
            <div class="Nab">
                <div class="Agragar Boton">
                    <button id="BtnAgregar" class="raise">Agregar</button>
                </div>
                <div class="ContenedorInput">
                    <input type="text" name="" required="" id="buscador">
                    <label>Buscar</label>
                </div>

            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Tipo Vehiculo</th>
                        <th scope="col">Numero Puertas</th>
                        <th scope="col">Placa</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="RefrescarTabla">
                    <?php $i = 0;
                    foreach ($datos['Vehiculo'] as $dato) : ?>
                        <tr class='Oscuro'>
                            <th scope="row"><?php echo $i++ ?></th>
                            <td><?php echo $dato->Marca ?></td>
                            <td><?php echo $dato->Modelo ?></td>
                            <td><?php echo $dato->TipoVehiculo ?></td>
                            <td><?php echo $dato->NumeroPuertas ?></td>
                            <td><?php echo $dato->Placa ?></td>
                            <td>
                                <div class='CajaBotones'>
                                    <button onclick="ModalEditar('<?php echo $dato->Id ?>')">
                                        <i class='bi bi-pencil'></i>
                                    </button>
                                    <button onclick="Eliminar('<?php echo $dato->Id ?>')">
                                        <i class='bi bi-trash'></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Agreagar Vehiculo -->


<div class="modal fade " id="AgregarVehiculo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog TemaOcuro" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" aria-hidden="false">Agregar Vehiculo </h5>
            </div>
            <div class="modal-body">
                <div class="ContenedorInput">
                    <input type="text" name="" required id="Marca_01" minlength="4" maxlength="20">
                    <label>Marca</label>
                </div>
                <div class="ContenedorInput">
                    <input type="text" name="" required="" id="Modelo_01" maxlength="20">
                    <label>Modelo</label>
                </div>
                <div class="ContenedorInput">
                    <input type="text" name="" required="" id="TipoVehiculo_01" maxlength="20">
                    <label>Tipo de vehiculo</label>
                </div>
                <div class="ContenedorInput">
                    <input type="text" required="" id="Placa_01" maxlength="7">
                    <label>Placa</label>
                </div>
                <div class="ContenedorInput">
                    <input type="text" required="" class="input-number" id="NumeroPuertas_01" maxlength="2">
                    <label>Numero de puertas</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="CerrarModal('#AgregarVehiculo')" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="sutmit" class="btn btn-info Submit" id="BtnRegistrar">Agregar</button>
                <button class="btn btn-primary Cargando" type="button" disabled>
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    cargando...
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Editar Persona -->

<div class="modal fade " id="EditarVehiulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog TemaOcuro" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" aria-hidden="false">Editar Persona </h5>
            </div>
            <div class="modal-body">
                <div class="ContenedorInput">
                    <input type="text" name="" required="" id="Marca_02">
                    <input type="text" name="" required="" id="Id" style="display: none;" maxlength="20">
                    <label>Marca</label>
                </div>
                <div class="ContenedorInput">
                    <input type="text" name="" required="" id="Modelo_02" maxlength="20">
                    <label>Modelo</label>
                </div>
                <div class="ContenedorInput">
                    <input type="text" name="" required="" id="TipoVehiculo_02" maxlength="20">
                    <label>Tipo de vehiculo</label>
                </div>
                <div class="ContenedorInput">
                    <input type="text" required="" id="Placa_02" maxlength="7">
                    <label>Placa</label>
                </div>
                <div class="ContenedorInput">
                    <input type="text" required="" class="input-number" id="NumeroPuertas_02" maxlength="2">
                    <label>Numero de puertas</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="CerrarModal('#EditarVehiulo')" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="sutmit" class="btn btn-info Submit" id="BtnActualizar">Actualizar</button>
                <button class="btn btn-primary Cargando" type="button" disabled>
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    cargando...
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    function CerrarModal(modal) {
        $(modal).modal("hide");
    }

    document.getElementById("BtnAgregar").addEventListener('click', function() {
        $("#AgregarVehiculo").modal("show");
    });

    // Solo numeros
    $('.input-number').on('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    // Click de envio, para el regitro de persona 

    $("#BtnRegistrar").click(function() {
        
        var Marca = $('#Marca_01').val();
        var Modelo = $('#Modelo_01').val();
        var TipoVehiculo = $('#TipoVehiculo_01').val();
        var Placa = $('#Placa_01').val();
        var NumeroPuertas = $('#NumeroPuertas_01').val();

        if (Marca == "" || Modelo == "" || TipoVehiculo == "" || Placa == "" || NumeroPuertas == "") {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Por favor llene los campos',
                showConfirmButton: false,
                timer: 3000
            });

        } else {
            MostrarCarga();
            $.ajax({
                url: '<?php echo RUTA_URL ?>/Vehiculo/RegistrarVehiculo',
                type: 'POST',
                data: {
                    Marca: Marca,
                    Modelo: Modelo,
                    TipoVehiculo: TipoVehiculo,
                    Placa: Placa,
                    NumeroPuertas: NumeroPuertas
                }
            }).done(function(resp) {
                $("#AgregarVehiculo").modal("hide");
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Registrado exitosamente',
                    showConfirmButton: false,
                    timer: 3000
                });
                $('#Marca_01').val("");
                $('#Modelo_01').val("");
                $('#TipoVehiculo_01').val("");
                $('#Placa_01').val("");
                $('#NumeroPuertas_01').val("");
                RefrecarTabla();
                OcultarCarga();
            }).fail(function() {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'No se pudo guardar',
                    showConfirmButton: false,
                    timer: 3000
                });
                OcultarCarga();
            })
        }
    });

    // Boton GLobal de Cargar 
    $(".Cargando").hide();

    function MostrarCarga(){
        $(".Cargando").show();
        $(".Submit").hide();
    }

    function OcultarCarga(){
        $(".Cargando").hide();
        $(".Submit").show();
    }

    // Funcion que abre modal para editar 
    function ModalEditar(id) {
        $("#EditarVehiulo").modal("show");
        $.ajax({
            url: '<?php echo RUTA_URL ?>/Vehiculo/SeleccionarVehiculoId',
            type: 'POST',
            data: {
                id: id
            }
        }).done(function(resp) {
            var data = JSON.parse(resp);
            $("#Id").val(data.Id)
            $("#Marca_02").val(data.Marca)
            $('#Modelo_02').val(data.Modelo);
            $('#TipoVehiculo_02').val(data['TipoVehiculo']);
            $('#Placa_02').val(data['Placa']);
            $('#NumeroPuertas_02').val(data['NumeroPuertas']);
        })
    }

    // Click para enviar registro modificado 
    $("#BtnActualizar").click(function() {
        var id = $('#Id').val();
        var Marca = $('#Marca_02').val();
        var Modelo = $('#Modelo_02').val();
        var TipoVehiculo = $('#TipoVehiculo_02').val();
        var Placa = $('#Placa_02').val();
        var NumeroPuertas = $('#NumeroPuertas_02').val();

        if (Marca == "" || Modelo == "" || TipoVehiculo == "" || Placa == "" || NumeroPuertas == "") {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Por favor llene los campos',
                showConfirmButton: false,
                timer: 3000
            });
        } else {
            MostrarCarga();
            $.ajax({
                url: '<?php echo RUTA_URL ?>/Vehiculo/EditarVehiulo',
                type: 'POST',
                data: {
                    id: id,
                    Marca: Marca,
                    Modelo: Modelo,
                    TipoVehiculo: TipoVehiculo,
                    Placa: Placa,
                    NumeroPuertas: NumeroPuertas
                }
            }).done(function() {
                $("#EditarVehiulo").modal("hide");
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Actualizado con exitosamente',
                    showConfirmButton: false,
                    timer: 3000
                });
                RefrecarTabla();
                OcultarCarga();
            }).fail(function() {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'No se pudo Actualizar',
                    showConfirmButton: false,
                    timer: 3000
                });
                OcultarCarga();
            })
        }
    });

    // funcion para elimanar
    // ****+ ESTA ELIMINACION SE HACE LOGICA*****

    function Eliminar(id) {
        Swal.fire({
            title: 'Eliminar?',
            text: "El vehiculo sera eliminado!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar!',
            cancelButtonText: 'Cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo RUTA_URL ?>/Vehiculo/EliminarVehiculo',
                    type: 'POST',
                    data: {
                        id: id
                    }
                }).done(function(resp) {
                    RefrecarTabla();
                    Swal.fire(
                        'Eliminado!',
                        'Se ilimino con exito.',
                        'success'
                    );
                })
            }
        })
    }

    // Evento Busqueda
    $('#buscador').keyup(function() {
        var id = $(this).val();
        var DatosNuevos = "";
        var SinDatos = "";
        console.log(id);
        $.ajax({
            url: '<?php echo RUTA_URL ?>/Vehiculo/SeleccionarVehiculoBuscar',
            type: 'POST',
            data: {
                id: id
            }
        }).done(function(resp) {
            var data = JSON.parse(resp);
            var count = 1;
            if (data == "") {
                console.log("no hay nada");
                for (var i = 0; i < 1; i++) {
                    SinDatos += "<tr>" + "<td colspan='8' class='text-center'>No hay datos!</td>" + "</tr>";
                    $("#RefrescarTabla").html(SinDatos);
                }
            } else {
                for (var i = 0; i < data.length; i++) {
                    DatosNuevos += "<tr class='Oscuro'>" + "<td>" + count++ + "</td>" + "<td>" + data[i].Marca + "</td>" + "<td>" + data[i].Modelo + "</td>" + "<td>" + data[i].TipoVehiculo + "</td>" + "<td>" + data[i].NumeroPuertas + "</td>" + "<td>" + data[i].Placa + "</td>" + "<td><div class='CajaBotones'><button onclick='ModalEditar(" + data[i].Id + ")'><i class='bi bi-pencil'></i></button><button onclick='Eliminar(" + data[i].Id + ")'><i class='bi bi-trash'></i></button></div></td>" + "</tr>";
                    $("#RefrescarTabla").html(DatosNuevos);
                }
            }
        }).fail(function() {
            console.log("PATINO!")
        })
    });

    function RefrecarTabla() {
        var DatosNuevos = "";
        $.ajax({
            url: '<?php echo RUTA_URL ?>/Vehiculo/Vehiculo',
            type: 'POST',
            data: {}
        }).done(function(resp) {
            var data = JSON.parse(resp);
            var count = 1;
            if (data) {
                for (var i = 0; i < data.length; i++) {
                    DatosNuevos += "<tr class='Oscuro'>" + "<td>" + count++ + "</td>" + "<td>" + data[i].Marca + "</td>" + "<td>" + data[i].Modelo + "</td>" + "<td>" + data[i].TipoVehiculo + "</td>" + "<td>" + data[i].NumeroPuertas + "</td>" + "<td>" + data[i].Placa + "</td>" + "<td><div class='CajaBotones'><button onclick='ModalEditar(" + data[i].Id + ")'><i class='bi bi-pencil'></i></button><button onclick='Eliminar(" + data[i].Id + ")'><i class='bi bi-trash'></i></button></div></td>" + "</tr>";
                    $("#RefrescarTabla").html(DatosNuevos);
                }
            }

        })
    }
</script>