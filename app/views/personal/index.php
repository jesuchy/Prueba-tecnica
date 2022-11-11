<?php require_once "../app/views/template.php"; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<title>Bootstrap Example</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="contenido">
  <div class="ConTable">
    <div class="Nab">
      <div class="Agragar Boton">
        <button id="BtnAgregar" class="raise">Agregar</button>
      </div>
      <div class="ContenedorInput">
        <input type="text" name="" required="" id="">
        <label>Buscar</label>
      </div>

    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Aprellidos</th>
          <th scope="col">Fecha Nacimiento</th>
          <th scope="col">Identficacion</th>
          <th scope="col">Profesión</th>
          <th scope="col">Vehículo Actual</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody id="RefrescarTabla">
        <?php $i = 0;
        foreach ($datos['Personal'] as $dato) : ?>
          <tr>
            <th scope="row"><?php echo $i++ ?></th>
            <td><?php echo $dato->Nombres ?></td>
            <td><?php echo $dato->Apellidos ?></td>
            <td><?php echo $dato->FechaNacimiento ?></td>
            <td><?php echo $dato->Identificacion ?></td>
            <td><?php echo $dato->Profesion ?></td>
            <td><?php echo $dato->Modelo ?></td>
            <td>
              <div class='CajaBotones'>
                <button onclick="ModalEditar('<?php echo $dato->IdPersona ?>')">
                  <i class='bi bi-pencil'></i>
                </button>
                <button onclick="Eliminar('<?php echo $dato->IdPersona ?>')">
                  <i class='bi bi-trash'></i>
                </button>
                <span class='d-inline-block' tabindex='0' data-bs-toggle='popover' data-bs-trigger='hover focus' data-bs-content='Historial de vehiculos'>
                  <button type='button'><i class='bi bi-file-earmark-medical'></i></button>
                </span>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>


<!-- Modal Agreagar Persona -->


<div class="modal fade " id="AgregarPersona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog TemaOcuro" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" aria-hidden="false">Agregar Persona </h5>
      </div>
      <div class="modal-body">
        <div class="ContenedorInput">
          <input type="text" name="" required="" id="Nombre_01">
          <label>Nombres</label>
        </div>
        <div class="ContenedorInput">
          <input type="text" name="" required="" id="Apellido_01">
          <label>Apellidos</label>
        </div>
        <div class="ContenedorInputFecha">
          <input type="date" name="" required="" id="FechaNacimiento_01">
          <label>Fecha nacimiento</label>
        </div>
        <div class="ContenedorInput">
          <input type="text" class="input-number" required="" id="Documento_01">
          <label>Identificacion</label>
        </div>
        <div class="ContenedorInput">
          <input type="text" name="" required="" id="Profesion_01">
          <label>Profesión</label>
        </div>
        <div class="cont_select_center">
          <div class="select_mate" data-mate-select="active">
            <select id="Casaso_01" onchange="" onclick="return false;">
              <option value="">Casado? </option>
              <option value="0">NO</option>
              <option value="1">SI</option>
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
        <div class="ContenedorInput">
          <input asp-for="Rate" type="hidden" id="valorreal_01" asp-for="Rate" />
          <input type="text" class="input-number input-mascara" id="IngresosMensuales_01" required="">
          <label>Ingresos mensuales </label>
        </div>
        <div class="cont_select_center">
          <div class="select_mate" data-mate-select="active">
            <select id="Vehiculo_01" onchange="" onclick="return false;" id="TipoDocumento">
              <option value="">Seleccione su nuevo Vehiculo </option>
              <?php foreach ($datos['vehiculoModel'] as $dato) : ?>
                <option value="<?php echo $dato->Id; ?>"><?php echo $dato->Modelo; ?></option>
              <?php endforeach ?>
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
      </div>
      <div class="modal-footer">
        <button type="button" onclick="CerrarModal('#AgregarPersona')" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="sutmit" class="btn btn-info" id="BtnRegistrar">Agregar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Editar Persona -->

<div class="modal fade " id="EditarPersona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog TemaOcuro" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" aria-hidden="false">Editar Persona </h5>
      </div>
      <div class="modal-body">
        <input type="text" id="IdPersona_02" style="display: none;">
        <div class="ContenedorInput">
          <input type="text" name="" required="" id="Nombre_02">
          <label>Nombres</label>
        </div>
        <div class="ContenedorInput">
          <input type="text" name="" required="" id="Apellido_02">
          <label>Apellidos</label>
        </div>
        <div class="ContenedorInputFecha">
          <input type="date" name="" required="" id="FechaNacimiento_02">
          <label>Fecha nacimiento</label>
        </div>
        <div class="ContenedorInput">
          <input type="text" class="input-number" required="" id="Documento_02">
          <label>Identificacion</label>
        </div>
        <div class="ContenedorInput">
          <input type="text" name="" required="" id="Profesion_02">
          <label>Profesión</label>
        </div>
        <div class="cont_select_center">
          <div class="select_mate" data-mate-select="active">
            <select id="Casaso_02" onchange="" onclick="return false;">
              <option value="">Casado? </option>
              <option value="0">NO</option>
              <option value="1">SI</option>
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
        <div class="ContenedorInput">
          <input asp-for="Rate" type="hidden" id="valorreal_02" asp-for="Rate" />
          <input type="text" class="input-number input-mascara" id="IngresosMensuales_02" required="">
          <label>Ingresos mensuales </label>
        </div>
        <div class="cont_select_center">
          <div class="select_mate" data-mate-select="active">
            <select id="Vehiculo_02" onchange="" onclick="return false;" id="TipoDocumento">
              <option value="">Seleccione su nuevo Vehiculo </option>
              <?php foreach ($datos['vehiculoModel'] as $dato) : ?>
                <option value="<?php echo $dato->Id; ?>"><?php echo $dato->Modelo; ?></option>
              <?php endforeach ?>
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
      </div>
      <div class="modal-footer">
        <button type="button" onclick="CerrarModal('#EditarPersona')" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="sutmit" class="btn btn-info" id="BtnActualizar">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<script src="https://unpkg.com/imask"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
  function CerrarModal(modal) {
    $(modal).modal("hide");
  }

  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
  const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));

  document.getElementById("BtnAgregar").addEventListener('click', function() {
    $("#AgregarPersona").modal("show");
  });

  // Solo numeros
  $('.input-number').on('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
  });

  // Mascara del input "INGRESOS MENSUAES"
  const currencyMask1 = IMask(
    document.getElementById('IngresosMensuales_01'), {
      mask: [{
          mask: ''
        },
        {
          mask: '$ num ',
          lazy: false,
          blocks: {
            num: {
              mask: Number,
              scale: 2,
              thousandsSeparator: ',',
              padFractionalZeros: true,
              radix: '.',
              mapToRadix: ['.'],
            }
          }
        }
      ]
    });
  currencyMask1.on("complete", function() {
    valorreal_01.value = currencyMask1.unmaskedValue
  });

  const currencyMask = IMask(
    document.getElementById('IngresosMensuales_02'), {
      mask: [{
          mask: ''
        },
        {
          mask: '$ num ',
          lazy: false,
          blocks: {
            num: {
              mask: Number,
              scale: 2,
              thousandsSeparator: ',',
              padFractionalZeros: true,
              radix: '.',
              mapToRadix: ['.'],
            }
          }
        }
      ]
    });
  currencyMask.on("complete", function() {
    valorreal_02.value = currencyMask.unmaskedValue
  });

  function ver() {
    console.log("con mascara", document.getElementById("IngresosMensuales_02").value);
    console.log("sin mascara", document.getElementById("valorreal_02").value);
  }

  // Click de envio, para el regitro de persona 

  $("#BtnRegistrar").click(function() {
    var Nombre = $('#Nombre_01').val();
    var Apellido = $('#Apellido_01').val();
    var FechaNacimiento = $('#FechaNacimiento_01').val();
    var Documento = $('#Documento_01').val();
    var Profesion = $('#Profesion_01').val();
    var Casado = $('#Casaso_01').val();
    var IngresosMensuales = $('#valorreal_01').val();
    var Vehiculo = $('#Vehiculo_01').val();

    if (Nombre == "" || Apellido == "" || FechaNacimiento == "" || Documento == "" || Profesion == "" || Casado == "" || IngresosMensuales == "" || Vehiculo == "") {
      Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'Por favor llene los campos',
        showConfirmButton: false,
        timer: 3000
      });

    } else {
      $.ajax({
        url: '<?php echo RUTA_URL ?>/Personal/registrarPersona',
        type: 'POST',
        data: {
          Nombre: Nombre,
          Apellido: Apellido,
          FechaNacimiento: FechaNacimiento,
          Documento: Documento,
          Profesion: Profesion,
          Casado: Casado,
          IngresosMensuales: IngresosMensuales,
          Vehiculo: Vehiculo
        }
      }).done(function(resp) {
        $("#AgregarPersona").modal("hide");
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Registrado exitosamente',
          showConfirmButton: false,
          timer: 3000
        });

        $('#Nombre_01').val("");
        $('#Apellido_01').val("");
        $('#FechaNacimiento_01').val("");
        $('#Documento_01').val("");
        $('#Profesion_01').val("");
        $('#Casaso_01').val("");
        $('#valorreal').val("");
        $('#IngresosMensuales_01').val("");
        $('#Vehiculo_01').val("");
        RefrecarTabla();
      }).fail(function() {
        Swal.fire({
          position: 'center',
          icon: 'error',
          title: 'No se pudo guardar',
          showConfirmButton: false,
          timer: 3000
        });
      })
    }
  });

  // Funcion que abre modal para editar 
  function ModalEditar(id) {
    $("#EditarPersona").modal("show");
    console.log(id);
    $.ajax({
      url: '<?php echo RUTA_URL ?>/Personal/SeleccionarPersonasId',
      type: 'POST',
      data: {
        id: id
      }
    }).done(function(resp) {
      var data = JSON.parse(resp);
      console.log(data);
      $("#IdPersona_02").val(data.IdPersona)
      $('#Nombre_02').val(data.Nombres);
      $('#Apellido_02').val(data['Apellidos']);
      $('#FechaNacimiento_02').val(data['FechaNacimiento']);
      $('#Documento_02').val(data['Identificacion']);
      $('#Profesion_02').val(data['Profesion']);
      $('#Casaso_02').val(data['Casado']);
      $('#valorreal_02').val(data['IngresosMensuales']);
      $('#IngresosMensuales_02').val(data['IngresosMensuales']);
      $('#Vehiculo_02').val(data['IdVehiculo']);

    })
  }

  // Click para enviar registro modificado 
  $("#BtnActualizar").click(function() {
    var id = $("#IdPersona_02").val();
    var Nombre = $('#Nombre_02').val();
    var Apellido = $('#Apellido_02').val();
    var FechaNacimiento = $('#FechaNacimiento_02').val();
    var Documento = $('#Documento_02').val();
    var Profesion = $('#Profesion_02').val();
    var Casado = $('#Casaso_02').val();
    var IngresosMensuales = $('#valorreal_02').val();
    var Vehiculo = $('#Vehiculo_02').val();

    console.log(id + "-" + Nombre + "-" + Apellido + "-" + FechaNacimiento + "-" + Documento + "-" + Profesion + "->" + Casado + "<- ->" + IngresosMensuales + "<- ->" + Vehiculo + "<-");
    if (Nombre == "" || Apellido == "" || FechaNacimiento == "" || Documento == "" || Profesion == "" || Casado == "" || IngresosMensuales == "" || Vehiculo == "") {
      Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'Por favor llene los campos',
        showConfirmButton: false,
        timer: 3000
      });

    } else {
      $.ajax({
        url: '<?php echo RUTA_URL ?>/Personal/EditarPersona',
        type: 'POST',
        data: {
          id: id,
          Nombre: Nombre,
          Apellido: Apellido,
          FechaNacimiento: FechaNacimiento,
          Documento: Documento,
          Profesion: Profesion,
          Casado: Casado,
          IngresosMensuales: IngresosMensuales,
          Vehiculo: Vehiculo
        }
      }).done(function() {
        $("#EditarPersona").modal("hide");
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Actualizado con exitosamente',
          showConfirmButton: false,
          timer: 3000
        });
        RefrecarTabla();
      }).fail(function() {
        Swal.fire({
          position: 'center',
          icon: 'error',
          title: 'No se pudo Actualizar',
          showConfirmButton: false,
          timer: 3000
        });
      })
    }
  });

  // funcion para elimanar
  // ****+ ESTA ELIMINACION SE HACE LOGICA*****

  function Eliminar(id) {
    console.log(id);
    Swal.fire({
      title: 'Eliminar?',
      text: "La persona sera eliminada!",
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
          url: '<?php echo RUTA_URL ?>/Personal/EliminarPersona',
          type: 'POST',
          data: {
            id : id
          }
        }).done(function(resp) {
          console.log(resp);
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

  function RefrecarTabla() {
    var DatosNuevos = "";
    $.ajax({
      url: '<?php echo RUTA_URL ?>/Personal/SeleccionarPersonas',
      type: 'POST',
      data: {}
    }).done(function(resp) {
      console.log(resp);
      var data = JSON.parse(resp);
      var count = 1;
      if (data) {
        for (var i = 0; i < data.length; i++) {
          DatosNuevos += "<tr>" + "<td>" + count++ + "</td>" + "<td>" + data[i].Nombres + "</td>" + "<td>" + data[i].Apellidos + "</td>" + "<td>" + data[i].FechaNacimiento + "</td>" + "<td>" + data[i].Identificacion + "</td>" + "<td>" + data[i].Profesion + "</td>" + "<td>" + data[i].Modelo + "</td>" + "<td><div class='CajaBotones'><button onclick='ModalEditar(" + data[i].IdPersona + ")'><i class='bi bi-pencil'></i></button><button onclick='Eliminar(" + data[i].IdPersona + ")'><i class='bi bi-trash'></i></button><span class='d-inline-block' tabindex='0' data-bs-toggle='popover' data-bs-trigger='hover focus' data-bs-content='Historial de veiculos'><button type='button'><i class='bi bi-file-earmark-medical'></i></button></span></div></td>" + "</tr>";
          $("#RefrescarTabla").html(DatosNuevos);
        }
      }

    })
  }
</script>