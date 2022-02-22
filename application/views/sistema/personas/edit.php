<section class="container g-py-10">
  <h1>Edición de persona</h1>

  <?php echo form_open_multipart(' ', array( 'id'=>'form_persona','class'=>'form_new_person g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30', 'method' => 'post'));?>

    <!-- id persona a editar -->
    <input id="id" name="id" type="hidden" value="<?php echo $persona->id;?>">

    <!-- Legajo Input -->
    <div class="form-group row g-mb-10">
      <label class="col-sm-2 col-form-label g-mb-10" for="legajo">Nro. Legajo(*)</label>
      <div class="col-sm-9">
        <input id="legajo" name="legajo" class="form-control u-form-control rounded-0" type="text" placeholder="Ingrese legajo" value="<?php echo $persona->n_legajo ?>" required>
      </div>
    </div>
    <!-- End Legajo Input -->
    <!-- Apellido Input -->
    <div class="form-group row g-mb-10">
      <label class="col-sm-2 col-form-label g-mb-10" for="apellido">Apellido (*)</label>
      <div class="col-sm-9">
        <input id="apellido" name="apellido" class="form-control u-form-control rounded-0" type="text" placeholder="Ingrese apellido" value="<?php echo $persona->apellido ?>" required>
      </div>
    </div>
    <!-- End Apellido Input -->
    <!-- Nombre Input -->
    <div class="form-group row g-mb-10">
      <label class="col-sm-2 col-form-label g-mb-10" for="nombre">Nombre (*)</label>
      <div class="col-sm-9">
        <input id="nombre" name="nombre" class="form-control u-form-control rounded-0" type="text" placeholder="Ingrese nombre" value="<?php echo $persona->nombre ?>" required>
      </div>
    </div>
    <!-- End Nombre Input -->
    <!-- DNI Input -->
    <div class="form-group row g-mb-10">
      <label class="col-sm-2 col-form-label g-mb-10" for="dni">DNI (*)</label>
      <div class="col-sm-3">
        <input id="dni" name="dni" class="form-control u-form-control rounded-0" type="text" placeholder="Ingrese DNI" value="<?php echo $persona->dni ?>" required>
      </div>

        <label class="form-check-inline u-check g-pl-25">
          <!-- Si el dni tiene vencimiento el check queda checkado -->

          <?php if ($persona->dni_tiene_vencimiento): ?>
            <input id="dni_tiene_vencimiento" name="dni_tiene_vencimiento" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" value="<?php echo $persona->dni_tiene_vencimiento ?>" checked>
          <?php else: ?>
            <input id="dni_tiene_vencimiento" name="dni_tiene_vencimiento" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" value="">
          <?php endif ?>
          <div class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
            <i class="fa" data-check-icon="&#xf00c"></i>
          </div>
          Tiene vencimiento
        </label>

        <label for="fecha_vencimiento_dni" class="col-2 col-form-label">Fecha vencimiento</label>
        <div class="col-3">
          <?php if ( $persona->dni_tiene_vencimiento ): ?>
             <input class="form-control rounded-0 form-control-md" type="date" 
                    id="fecha_vencimiento_dni" name="fecha_vencimiento_dni"
                    value="<?php echo date($persona->fecha_vencimiento_dni); ?>">
          <?php else: ?>
            <input class="form-control rounded-0 form-control-md" type="date" 
                   id="fecha_vencimiento_dni" name="fecha_vencimiento_dni"
                   value="">
          <?php endif ?>
        </div>
    </div>

      <div class="form-group mb-0 offset-md-2">
        <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
          <input id="pdf_dni" name="pdf_dni" type="file" >
          <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
          <span class="js-value">Anexar PDF del DNI</span>
        </label>
      </div>

    <!-- End DNI Input -->

    <!-- Nro tramite Input -->
    <div class="form-group row g-mb-10">
      <label class="col-sm-2 col-form-label g-mb-10" for="num_tramite">Num tramite</label>
      <div class="col-sm-9">
        <input id="num_tramite" name="num_tramite" class="form-control u-form-control rounded-0 col-6" type="text" placeholder="Ingrese nro tramite" value="<?php echo $persona->num_tramite; ?>" >
      </div>
    </div>
    <!-- End Nro tramite Input -->

    <!-- CUIL Input -->
    <div class="form-group row g-mb-10">
      <label class="col-sm-2 col-form-label g-mb-10" for="legajo">CUIL (*)</label>
      <div class="col-sm-3">
        <input id="cuil" name="cuil" class="form-control u-form-control rounded-0" type="text" placeholder="XX-XXXXXXXXX-X" data-mask="99-999999999-9" value="<?php echo $persona->cuil; ?>" required>
      </div>

      <!-- PDF CUIL -->
        <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
          <input id="pdf_cuil" name="pdf_cuil" type="file">
          <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
          <span class="js-value">Anexar PDF del CUIL</span>
        </label>
    </div>
    <!-- End CUIL Input -->

    <!-- Fecha inicio actividad laboral -->
    <div class="form-group row g-mb-10">
      <label class="col-sm-2 col-form-label g-mb-10">Alta temprana </label>
      <div class="col-sm-3">
        <input id="fecha_inicio_actividad" name="fecha_inicio_actividad" class="form-control form-control-md " type="date" value="<?php echo date($persona->fecha_inicio_actividad); ?>" >
      </div>
      <!-- pdf alta temprana -->
      <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
        <input id="pdf_alta_temprana" name="pdf_alta_temprana" type="file">
        <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
        <span class="js-value">Anexar PDF alta temprana</span>
      </label>
    </div>
    <!-- End Fecha inicio actividad laboral -->

    <!-- Fecha nacimiento -->
    <div class="form-group row g-mb-10">
      <label class="col-sm-2 col-form-label g-mb-10">Fecha nacimiento (*)</label>
      <div class="col-sm-3">
        <input id="fecha_nacimiento" name="fecha_nacimiento" class="form-control form-control-md " type="date" value="<?php echo date($persona->fecha_nacimiento); ?>" required>
      </div>
    </div>
    <!-- End Fecha nacimiento -->

    <!-- Email Input -->
      <div class="form-group row g-mb-10">
        <label class="col-sm-2 col-form-label g-mb-10" for="email">Email</label>
        <div class="col-sm-9">
          <input id="email" name="email" class="form-control u-form-control rounded-0" type="text" placeholder="Ingrese email" value="<?php echo $persona->email ?>">
        </div>
      </div>
    <!-- End Email Input -->

    <!-- Nacionalidad Input -->
    <div class="form-group row g-mb-10">
      <label class="col-sm-2 col-form-label g-mb-10" for="legajo">Nacionalidad (*)</label>
      <div class="col-sm-9">
        <input id="nacionalidad" name="nacionalidad" class="form-control u-form-control rounded-0" type="text" placeholder="Ingrese nacionalidad" value="<?php echo $persona->nacionalidad; ?>" >
      </div>
    </div>
    <!-- End Nacionalidad Input -->
    <!-- Domicilio Input -->
    <div class="form-group row g-mb-10">
      <label class="col-sm-2 col-form-label g-mb-10" for="legajo">Domicilio (*)</label>
      <div class="col-sm-9">
        <input id="domicilio" name="domicilio" class="form-control u-form-control rounded-0" type="text" placeholder="Ingrese domicilio" value="<?php echo $persona->domicilio; ?>" >
      </div>
    </div>
    <!-- End Domicilio Input -->
    <!-- Telefono Input -->
    <div class="form-group row g-mb-10">
      <label class="col-sm-2 col-form-label g-mb-10" for="legajo">Teléfono (*)</label>
      <div class="col-sm-9">
        <input id="telefono" name="telefono" class="form-control u-form-control rounded-0" type="text" placeholder="Ingrese teléfono" value="<?php echo $persona->telefono ?>" >
      </div>
    </div>
    <!-- End Telefono Input -->
    <!-- Empresa input -->
    <div class="form-group row g-mb-10">
      <label class="col-sm-2 col-form-label g-mb-10">Pertenece a empresa(*)</label>
      <select id="empresa_id" name="empresa_id" class="form-control form-control-md form-control-lg rounded-0 g-mb-10 col-sm-6">
        <option>Seleccione empresa</option>
        <?php foreach ($empresas as $e): ?>
          <?php if ( $e->id == $persona->empresa_id ): ?>
            <option value="<?php echo $e->id;?>" selected ><?php echo $e->nombre;?></option>
          <?php else: ?>
            <option value="<?php echo $e->id;?>"><?php echo $e->nombre;?></option>
          <?php endif ?>

        <?php endforeach ?>
      </select>
    </div>
    <!-- End Empresa input -->


    <button type="submit" id="btnSubmit" class="btn btn-primary g-mr-10 g-mb-15">Grabar cambios</button>
    <a href="<?php echo base_url('Personas');?>" class="btn btn-danger g-mr-10 g-mb-15">Cancelar</a>
  </form>
</section>

<script type="text/javascript">
  var form_person = $('#form_persona')
  const pdf_dni = $('#pdf_dni')
  const pdf_cuil = $('#pdf_cuil')
  const pdf_alta_temp = $('#pdf_alta_temprana')
  var name_pdf_dni = '<?php echo $persona->dni_pdf_path; ?>'
  var name_pdf_cuil = '<?php echo $persona->cuil_pdf_path; ?>'
  var name_pdf_alta = '<?php echo $persona->alta_pdf_path; ?>'
  const r_string = Math.random().toString(36).substring(7)

  $(document).on('ready', function () {

    $('#empresa_id').select2( { theme: 'bootstrap4', width: '70%' } )

    $.validator.addMethod("alfanumOespacio", function(value, element) {
              return /^[ a-záéíóúüñ]*$/i.test(value);
          }, "Ingrese sólo letras.")

    form_person.validate({
                    rules: {
                      'nombre': {
                        required: true,
                        minlength: 4,
                        alfanumOespacio: true
                      },
                      'apellido': {
                        required: true,
                        minlength: 4,
                      },
                      'fecha_vencimiento_dni': {
                        // Si esta check el vencimiento dni es requerido ingresar la fecha
                        required: function (element){
                          return $('#dni_tiene_vencimiento').is(':checked');
                        }
                      },
                      'legajo': {
                        required: true,
                      },
                      'dni': {
                        required: true,
                      },
                      'cuil': {
                        required: true,
                      },
                      'pdf_dni': {
                       extension: "pdf|jpg|png"
                      },
                      'pdf_cuil': {
                       extension: "pdf|jpg|png"
                      },
                      'pdf_alta_temprana': {
                       extension: "pdf|jpg|png"
                      }
                    },
                    messages: {
                      'pdf_dni': {
                       extension: 'Este archivo no es PDF'
                      },
                      'pdf_cuil': {
                       extension: 'Este archivo no es PDF'
                      },
                      'pdf_alta_temp': {
                       extension: 'Este archivo no es PDF'
                      },
                      'legajo': {
                        remote: 'Este número de legajo pertenece a otra persona'
                      },
                      'dni': {
                        remote: 'Este número de dni pertenece a otra persona'
                      },
                      'cuil': {
                        remote: 'Este número de cuil pertenece a otra persona'
                      }
                    }
                  })

    $('#form_persona').on('submit', function(event){
      event.preventDefault()

      if (form_person.valid()) {

        if ( (pdf_dni.val() != '') ) {
          let extension_archivo = pdf_dni.val().split('.')
          name_pdf_dni = $('#legajo').val() + '_dni_' + r_string + '.'+ extension_archivo[extension_archivo.length - 1]
          upload_pdf(pdf_dni, name_pdf_dni, 'PDF DNI')
        }
        if ( (pdf_cuil.val() != '') ) {
          let extension_archivo = pdf_cuil.val().split('.')
          name_pdf_cuil = $('#legajo').val()+'_constancia_cuil_'+r_string+'.'+ extension_archivo[extension_archivo.length - 1]
          upload_pdf(pdf_cuil, name_pdf_cuil, 'PDF CUIL')
        }

        if (pdf_alta_temp.val() != '') {
          let extension_archivo = pdf_alta_temp.val().split('.')
          name_pdf_alta =  $('#legajo').val()+'_alta_temprana_'+r_string+'.'+ extension_archivo[extension_archivo.length - 1]
          upload_pdf(pdf_alta_temp, name_pdf_alta, 'PDF Alta temprana')
        }

        // start ajax add person
        $.ajax({
          url: '<?php echo base_url('Personas/update');?>',
          type: 'POST',
          data: agruparDatos(),
          dataType: 'JSON',
          success: function(resp){
            if (resp.status == 'success') {
              window.location.href = base_url
            } else {
              noty_alert('error', resp.msg)
            }
          },
          error: function(resp){
            noty_alert('error', 'No se pudieron actualizar los datos')
          }
        })
        // end ajax
      }

    })

  function upload_pdf(element, name, pdf)
  {
    let file_data = element.prop('files')[0]
    let form_data = new FormData()
    form_data.append('file', file_data)
    form_data.append('nombre', name)

    $.ajax({
      url: '<?php echo base_url("Personas/subir_pdf");?>',
      dataType: 'text',
      type: 'POST',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      success: function(resp){
        console.log(`resp =>>> ${resp}`)
        if (resp === 'success') {
          console.log(`${pdf} subio`)
        } else {
           alert( `El pdf ${pdf} no se pudo subir` )
        }
      },
      error: function(jqXHR, textStatus, errorThrown){
        alert( `El pdf ${pdf} no se pudo subir` )
      }
    })
  }

  function agruparDatos( )
  {
    person = {
      'id' : $('#id').val(),
      'n_legajo': $('#legajo').val(),
      'apellido': $('#apellido').val(),
      'nombre': $('#nombre').val(),
      'dni': $('#dni').val(),
      'dni_tiene_vencimiento': $('#dni_tiene_vencimiento').is(':checked'),
      'fecha_vencimiento_dni': $('#fecha_vencimiento_dni').val(),
      'cuil': $('#cuil').val(),
      'fecha_nacimiento': $('#fecha_nacimiento').val(),
      'nacionalidad': $('#nacionalidad').val(),
      'domicilio': $('#domicilio').val(),
      'telefono': $('#telefono').val(),
      'empresa_id': $('#empresa_id').val(),
      'fecha_inicio_actividad': $('#fecha_inicio_actividad').val(),
      'dni_pdf_path': name_pdf_dni,
      'cuil_pdf_path': name_pdf_cuil,
      'alta_pdf_path': name_pdf_alta,
      'email': $('#email').val(),
      'num_tramite': $('#num_tramite').val()
    }
    return person;
  }

  });
</script>
