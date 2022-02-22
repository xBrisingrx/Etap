<section class="container-fluid g-py-10">
  <h1>Personas registradas en el sistema</h1>
    <?php if ($this->session->userdata('rol') == 1) { ?>
      <a href="<?php echo base_url('Personas/new');?>" class="btn btn-success justify-content-end mb-2">Nueva persona</a>
    <?php } ?>
    <a href="<?php echo base_url('Personas_Inactivas');?>" class="btn btn-info justify-content-start mb-2">Ver personal inactivo</a>
    <button type="button" class="btn btn-primary justify-content-start mb-2" data-toggle="modal" data-target="#modal_excel" > Exportar a excel </button>

  <div class="card g-brd-darkpurple rounded-0 g-mb-30">
    <h3 class="card-header g-bg-darkpurple g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-2">
      <i class="fa fa-gear g-mr-5"></i>
      Personas registradas
    </h3>

    <div class="px-2">
      <table id="tabla_personas" class="table table-hover dt-responsive w-100">
        <thead>
          <tr>
            <th>Nro. Legajo</th>
            <th>Apellido</th>
            <th>Nombre</th>
            <th>DNI</th>
            <th>PDF DNI</th>
            <th>Num tramite</th>
            <th>Vence DNI</th>
            <th>Fecha vencimiento</th>
            <th>Cuil</th>
            <th>PDF CUIL</th>
            <th>Fecha nacimiento</th>
            <th>PDF Alta</th>
            <th>Nacionalidad</th>
            <th>Domicilio</th>
            <th>Telefono</th>
            <th>Empresa</th>
            <th>Alta</th>
            <?php if ($this->session->userdata('rol') == 1 ): ?>
              <th>Acciones</th>
            <?php endif ?>
          </tr>
        </thead>
          <tbody>
            <?php foreach ($personas as $key => $p): ?>
              <tr>
                <td><?php echo $p->n_legajo;?></td>
                <td><?php echo $p->apellido;?></td>
                <td><?php echo $p->nombre;?></td>
                <td><?php echo $p->dni;?></td>
                <td>
                  <?php if ($p->dni_pdf_path != 'falta_pdf'): ?>
                    <a href="<?php echo base_url('assets/uploads/personas/').$p->dni_pdf_path;?>"
                      target="_blank" class="text-center">
                      <i class="fa fa-file-pdf-o fa-2x"></i>
                    </a>
                  <?php else: ?>
                    <a
                      title = 'No se cargo pdf'
                      class="text-center text-danger">
                      <i class="fa fa-file-pdf-o fa-2x"></i>
                    </a>
                  <?php endif ?>
                </td>
                <td><?php echo $p->num_tramite;?></td>
                <?php if ($p->dni_tiene_vencimiento): ?>
                  <td> Si </td>
                  <td><?php echo date('d-m-Y', strtotime($p->fecha_vencimiento_dni));?></td>
                <?php else: ?>
                  <td> No </td>
                  <td> </td>
                <?php endif ?>
                <td><?php echo $p->cuil;?></td>
                <td>
                  <?php if ($p->cuil_pdf_path != 'falta_pdf'): ?>
                    <a href="<?php echo base_url('assets/uploads/personas/').$p->cuil_pdf_path;?>"
                      target="_blank" class="text-center">
                      <i class="fa fa-file-pdf-o fa-2x"></i>
                    </a>
                  <?php else: ?>
                    <a
                      title = 'No se cargo pdf'
                      class="text-center text-danger">
                      <i class="fa fa-file-pdf-o fa-2x"></i>
                    </a>
                  <?php endif ?>
                </td>

                <td><?php echo date('d-m-Y', strtotime($p->fecha_nacimiento));?></td>
                <td>
                  <?php if ($p->alta_pdf_path != 'falta_pdf'): ?>
                    <a href="<?php echo base_url('assets/uploads/personas/').$p->alta_pdf_path;?>"
                      target="_blank" class="text-center">
                      <i class="fa fa-file-pdf-o fa-2x"></i>
                    </a>
                  <?php else: ?>
                    <a
                      title = 'No se cargo pdf'
                      class="text-center text-danger">
                      <i class="fa fa-file-pdf-o fa-2x"></i>
                    </a>
                  <?php endif ?>
                </td>
                <td><?php echo $p->nacionalidad;?></td>
                <td><?php echo $p->domicilio;?></td>
                <td><?php echo $p->telefono;?></td>
                <td><?php echo $p->nombre_empresa;?></td>
                <td>
                  <?php if ($p->fecha_inicio_actividad != '0000-00-00'): ?>
                    <?php echo date('d-m-Y', strtotime($p->fecha_inicio_actividad));?>
                  <?php else: ?>
                    -
                  <?php endif ?>
                </td>
                <?php if ($this->session->userdata('rol') == 1): ?>
                  <td>
                    <a href="<?php echo base_url( 'Personas/edit/'.$p->id );?>"
                       type="button"
                       class="btn btn-sm u-btn-primary mr-2"
                       title="Editar">
                      <i class="fa fa-edit"></i>
                    </a>
                    <button class="btn btn-sm u-btn-red"
                            title="Eliminar"
                            onclick="modal_delete('<?php echo $p->id;?>')">
                            <i class="fa fa-trash-o"></i>
                    </button>
                  </td>
                <?php endif ?>
              </tr>
            <?php endforeach ?>
            </tr>
          </tbody>
      </table>
    </div>
  </div>
</section>

<div class="modal fade" id="modal_eliminar_persona" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">¿ Esta seguro de eliminar esta persona ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="hidden" id="id_person_delete" name="id_person_delete" value="">
          <form action="" id="form_baja_persona" >
            <!-- motivo baja input -->
            <div class="form-group row g-mb-10">
              <label class="col-sm-2 col-form-label g-mb-10">Motivo baja(*)</label>
              <select id="motivo_baja_id" name="motivo_baja_id" class="form-control form-control-md form-control-lg rounded-0 g-mb-10 col-sm-6 select_baja_persona">
                <option selected disabled value="0">Motivo de la baja</option>
                <?php foreach ($motivos_baja as $m): ?>
                  <option value="<?php echo $m->id ?>"> <?php echo $m->motivo ?> </option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="form-group row g-mb-10">
              <label class="col-sm-2 col-form-label g-mb-10">Fecha baja (*)</label>
              <div class="col-sm-6">
                <input id="fecha_baja" name="fecha_baja" class="form-control form-control-md " type="date" value="<?php date('d-m-Y') ?>">
              </div>
            </div>
            <!-- End motivo baja input -->
            <!-- Textarea Expandable -->
            <div class="form-group g-mb-20">
              <label class="g-mb-10" for="detalle_baja_persona">Detalle (*)</label>
              <textarea id="detalle_baja_persona" name="detalle_baja_persona" class="form-control form-control-md u-textarea-expandable rounded-0" rows="3" placeholder="" required></textarea>
            </div>
            <!-- End Textarea Expandable -->
            <p id="error-motivo" class="text-red"></p>
            <button type="submit" class="btn u-btn-red" >Eliminar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </form>
      </div>
    </div>
  </div>
</div>



<!-- Modal exportar a Excel -->
<div class="modal fade" id="modal_excel" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Seleccione los filtros </h5>     
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="form_descargar_excel" method="POST" action="<?php echo base_url('Informes/excel_personas');?>">
            <!-- motivo baja input -->
            <div class="form-group row g-mb-5">
              <label class="col-sm-2 col-form-label g-mb-5">Estado </label>
              <select id="estado_persona" name="estado_persona" class="form-control">
                <option value="1">Activos</option>
<!--                 <option value="0">Inactivos</option>
                <option value="2">Inactivos sin motivo</option> -->
              </select>
            </div>

            <div class="form-group row g-mb-5">
              <label class="col-sm-2 col-form-label g-mb-5 w-80">Empresa </label>
              <select id="empresa_persona" name="empresa_persona" class="custom-select  w-80 col-sm-8">
                <option value="0"> Todas las empresas </option>
                <?php foreach ($empresas as $e): ?>
                  <option value="<?php echo $e->id ?>" > <?php echo $e->nombre ?> </option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="form-group row g-mb-5">
              <label class="col-sm-2 col-form-label g-mb-5 w-80">Perfil </label>
              <select id="perfil_persona" name="perfil_persona" class="custom-select  w-80 col-sm-8">
                <option value="0"> Todos los perfiles </option>
                <?php foreach ($perfiles as $p): ?>
                  <option value="<?php echo $p->id ?>" > <?php echo $p->nombre ?> </option>
                <?php endforeach ?>
              </select>
            </div>

            <button type="submit" class="btn u-btn-primary" >Descargar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- Fin modal exportar a excel -->
<script type="text/javascript">
  var form_baja_persona = $('#form_baja_persona')

  $(document).ready(function() {

    form_baja_persona.validate({
                        rules: {
                          motivo_baja_id: { required: true },
                          fecha_baja: { required: true },
                        }
                  })

    $.validator.addMethod("no_cero", function(value, element) {
            return value != 0
        }, "Ingrese sólo letras.")
    
    $('#tabla_personas').DataTable({
      language: { url: "<?php echo base_url('assets/vendor/datatables/spanish.json');?>" },
      order: false
    })

    $('.select_baja_persona').select2( { theme: 'bootstrap4', width: '70%' } )
    $('#estado_persona').select2({ theme: 'bootstrap4', width: '70%' })
    $('#empresa_persona').select2({ theme: 'bootstrap4', width: '70%' })
    $('#perfil_persona').select2({ theme: 'bootstrap4', width: '70%' })

  })

    $('#form_baja_persona').submit(function(event){
      event.preventDefault()
      if ( form_baja_persona.valid() ) {
        destroy()
      }
    })

  function modal_delete(id) {
    $('.select_baja_persona').val(0).trigger('change')
    $('#id_person_delete').val(id)
    $('#error-motivo').text('')
    $('#modal_eliminar_persona').modal('show')
  }

  function destroy() {
    $.ajax({
      url: '<?php echo base_url("Personas/destroy");?>',
      type: 'POST',
      data: {
        persona_id: $('#id_person_delete').val(),
        motivo_baja_id: $('#motivo_baja_id').val(),
        fecha_baja: $('#fecha_baja').val(),
        detalle: $('#detalle_baja_persona').val()
      },
      dataType: 'JSON',
      success: function(response) {
        (response.status === 'success') ? window.location.href = base_url : alert('Error al eliminar a la persona')
      },
      error: function() {
        noty_alert(response.status, response.msg)
      }
    })
  } // End destroy method

  function exportar_excel()
  {
    $.ajax({
      url: '<?php echo base_url("Personas/exportar_excel");?>',
      type: 'POST',
      data: {
        activas : $('#estado_persona').val(),
        empresa : $('#empresa_persona').val(),
        perfil : $('#perfil_persona').val()
      },
      success: function( msg ) {
        alert('ajax')
        $('#modal_excel').modal('hide')
        console.log(msg)
        noty_alert( 'success' , 'Excel generado con exito' )
      },
      error: function( msg ) {
        $('#modal_excel').modal('hide')
        noty_alert( 'error' , 'No se pudo generar el excel' )
      }
    })
  }

    $( "#submit_form_excel" ).on('click', function( e ) {
      $.ajax({
        url: '<?php echo base_url("Personas/exportar_excel");?>',
        type: 'POST',
        data: {
          activas : $('#estado_persona').val(),
          empresa : $('#empresa_persona').val(),
          perfil : $('#perfil_persona').val()
        },
        success: function( msg ) {
          
          $('#modal_excel').modal('hide')
          noty_alert( 'success' , 'Excel generado con exito' )
        },
        error: function( msg ) {
          $('#modal_excel').modal('hide')
          noty_alert( 'error' , 'No se pudo generar el excel' )
        }
      })
      e.preventDefault();
    })
</script>