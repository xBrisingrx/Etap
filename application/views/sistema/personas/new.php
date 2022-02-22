<section class="container g-py-10">
  <h1>Alta de persona</h1>

  <?php echo $error;?>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success fade in">
        <strong><i class="icon-custom rounded-x icon-color-grey fa fa-thumbs-up"></i></strong> <?php echo $this->session->flashdata('success'); ?>
    </div>
  <?php endif ?>

  <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger fade in">
        <strong><i class="fa fa-exclamation-circle"></i></strong> <?php echo $this->session->flashdata('error'); ?>
    </div>
  <?php endif ?>

  <?php echo form_open_multipart('Personas/create', array( 'id'=>'form_persona','class'=>'form_new_person g-brd-around g-brd-gray-light-v4 g-pa-10 g-mb-30', 'method' => 'post'));?>
  <!-- Legajo Input -->
  <div class="form-group row g-mb-10">
    <label class="col-sm-2 col-form-label g-mb-10" for="legajo">Nro. Legajo(*)</label>
    <div class="col-sm-9">
      <input id="legajo" name="legajo" class="form-control u-form-control rounded-0" type="text" placeholder="Ingrese legajo" value="<?php echo ( empty(set_value('legajo')) ? $ultimo_legajo : set_value('legajo') );?>" required>
      <small class="text-danger error-legajo"></small>
    </div>
    <?php echo form_error('legajo');?>
  </div>
  <!-- End Legajo Input -->

  <!-- Apellido Input -->
  <div class="form-group row g-mb-10">
    <label class="col-sm-2 col-form-label g-mb-10" for="apellido">Apellido (*)</label>
    <div class="col-sm-9">
      <input id="apellido" name="apellido" value="<?php echo set_value('apellido');?>" class="form-control u-form-control rounded-0" type="text" placeholder="Ingrese apellido" required>
       <?php echo form_error('apellido');?>
    </div>
  </div>
  <!-- End Apellido Input -->
  <!-- Nombre Input -->
  <div class="form-group row g-mb-10">
    <label class="col-sm-2 col-form-label g-mb-10" for="nombre">Nombre (*)</label>
    <div class="col-sm-9">
      <input id="nombre" name="nombre" class="form-control u-form-control rounded-0" type="text" placeholder="Ingrese nombre" required>
    </div>
  </div>
  <!-- End Nombre Input -->

  <!-- DNI Input -->
  <div class="form-group row g-mb-10">
    <label class="col-sm-2 col-form-label g-mb-10" for="dni">DNI (*)</label>
    <div class="col-sm-3">
      <input id="dni" name="dni" class="form-control u-form-control rounded-0" type="text" placeholder="Ingrese DNI" required>
    </div>

      <label class="form-check-inline u-check g-pl-25">
        <input id="dni_tiene_vencimiento" name="dni_tiene_vencimiento" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" value="">
        <div class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
          <i class="fa" data-check-icon="&#xf00c"></i>
        </div>
        Tiene vencimiento
      </label>

      <label for="fecha_vencimiento_dni" class="col-2 col-form-label">Fecha vencimiento</label>
      <div class="col-3">
        <input class="form-control rounded-0 form-control-md" type="date" id="fecha_vencimiento_dni" name="fecha_vencimiento_dni">
      </div>
  </div>

    <div class="form-group mb-0 offset-md-2">
      <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
        <input id="pdf_dni" name="pdf_dni" type="file" value="<?php echo set_value('pdf_dni');?>">
        <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
        <span class="js-value">Anexar PDF del DNI</span>
      </label>
    </div>

  <!-- End DNI Input -->

  <!-- Nro tramite Input -->
  <div class="form-group row g-mb-10">
    <label class="col-sm-2 col-form-label g-mb-10" for="num_tramite">Num tramite</label>
    <div class="col-sm-9">
      <input id="num_tramite" name="num_tramite" class="form-control u-form-control rounded-0 col-6" type="text" placeholder="Ingrese nro tramite" required>
    </div>
  </div>
  <!-- End Nro tramite Input -->

  <!-- CUIL Input -->
  <div class="form-group row g-mb-10">
    <label class="col-sm-2 col-form-label g-mb-10" for="legajo">CUIL (*)</label>
    <div class="col-sm-3">
      <input id="cuil" name="cuil" class="form-control u-form-control rounded-0" type="text" placeholder="XX-XXXXXXXXX-X" data-mask="99-999999999-9" required>
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
      <input id="fecha_inicio_actividad" name="fecha_inicio_actividad" class="form-control form-control-md " type="date" >
    </div>
  <!-- PDF alta temprana -->
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
      <input id="fecha_nacimiento" name="fecha_nacimiento" class="form-control form-control-md " type="date" required>
    </div>
  </div>
  <!-- End Fecha nacimiento -->

  <!-- Email Input -->
    <div class="form-group row g-mb-10">
      <label class="col-sm-2 col-form-label g-mb-10" for="nombre">Email</label>
      <div class="col-sm-9">
        <input id="email" name="email" class="form-control u-form-control rounded-0" type="email" placeholder="Ingrese email">
      </div>
    </div>
  <!-- End Email Input -->

  <!-- Nacionalidad Input -->
  <div class="form-group row g-mb-10">
    <label class="col-sm-2 col-form-label g-mb-10" for="legajo">Nacionalidad (*)</label>
    <div class="col-sm-9">
      <input id="nacionalidad" name="nacionalidad" class="form-control u-form-control rounded-0" type="text" placeholder="Ingrese nacionalidad" >
    </div>
  </div>
  <!-- End Nacionalidad Input -->
  <!-- Domicilio Input -->
  <div class="form-group row g-mb-10">
    <label class="col-sm-2 col-form-label g-mb-10" for="legajo">Domicilio (*)</label>
    <div class="col-sm-9">
      <input id="domicilio" name="domicilio" class="form-control u-form-control rounded-0" type="text" placeholder="Ingrese domicilio" >
    </div>
  </div>
  <!-- End Domicilio Input -->
  <!-- Telefono Input -->
  <div class="form-group row g-mb-10">
    <label class="col-sm-2 col-form-label g-mb-10" for="legajo">Teléfono (*)</label>
    <div class="col-sm-9">
      <input id="telefono" name="telefono" class="form-control u-form-control rounded-0" type="text" placeholder="Ingrese teléfono" >
    </div>
  </div>
  <!-- End Telefono Input -->
  <!-- Empresa input -->
  <div class="form-group row g-mb-10">
    <label class="col-sm-2 col-form-label g-mb-10">Pertenece a empresa(*)</label>
    <select id="empresa_id" name="empresa_id" class="form-control form-control-md form-control-lg rounded-0 g-mb-10 col-sm-6">
      <option>Seleccione empresa</option>
      <?php foreach ($empresas as $e): ?>
        <?php if ($e->nombre == 'Etap'): ?>
          <option value="<?php echo $e->id;?>" selected><?php echo $e->nombre;?></option>
        <?php else: ?>
          <option value="<?php echo $e->id;?>"><?php echo $e->nombre;?></option>
        <?php endif ?>
      <?php endforeach ?>
    </select>
  </div>
  <!-- End Empresa input -->
    <button type="submit" id="btnSubmit" class="btn btn-primary g-mr-10 g-mb-15">Grabar persona</button>
    <a href="<?php echo base_url('Personas');?>" class="btn btn-danger g-mr-10 g-mb-15">Cancelar</a>
  </form>
</section>


<script type="text/javascript">
  var form_person = $('#form_persona')
  const pdf_dni = $('#pdf_dni')
  const pdf_cuil = $('#pdf_cuil')
  const pdf_alta_temp = $('#pdf_alta_temprana')

  var name_pdf_dni = 'falta_pdf'
  var name_pdf_cuil =  'falta_pdf'
  var name_pdf_alta =  'falta_pdf'
  // string random que uso para el nombre de los archivos subidos
  const r_string = Math.random().toString(36).substring(7)

 $(document).on('ready', function () {
  $('#empresa_id').select2( { theme: 'bootstrap4', width: '70%' } )
  
  $.validator.addMethod("alfanumOespacio", function(value, element) {
          return /^[ a-záéíóúüñ]*$/i.test(value);
      }, "Ingrese sólo letras.");

  form_person.validate({
                rules: {
                  'nombre': {
                    required: true,
                    minlength: 4,
                    alfanumOespacio: true
                  },
                  'apellido': {
                    required: true,
                    minlength: 3,
                  },
                  'fecha_vencimiento_dni': {
                    // Si esta check el vencimiento dni es requerido ingresar la fecha
                    required: function (element){
                      return $('#dni_tiene_vencimiento').is(':checked');
                    }
                  },
                  'dni': {
                    required: true,
                    number: true
                  },
                  'cuil': {
                    required: true
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
                   extension: 'Este archivo no es PDF o archivo de imagen'
                  },
                  'pdf_cuil': {
                   extension: 'Este archivo no es PDF o archivo de imagen'
                  },
                  'pdf_alta_temprana': {
                   extension: 'Este archivo no es PDF o archivo de imagen'
                  }
                }
              })

  $( "#form_persona" ).on( "submit", function(e){ 
    e.preventDefault()
    e.stopPropagation()
    if ( form_person.valid() ) {
      if ( (pdf_dni.val() != '') ) {
        let extension_archivo = pdf_dni.val().split('.')
        name_pdf_dni = $('#legajo').val() + '_dni_' + r_string + '.'+ extension_archivo[extension_archivo.length - 1]
        name_pdf_dni.toLowerCase().replace(" ", "_")
        upload_pdf(pdf_dni, name_pdf_dni, 'DNI')
      }

      if ( (pdf_cuil.val() != '') ) {
        let extension_archivo = pdf_cuil.val().split('.')
        name_pdf_cuil = $('#legajo').val() + '_constancia_cuil_' + r_string + '.'+ extension_archivo[extension_archivo.length - 1]
        name_pdf_cuil.toLowerCase().replace(" ", "_")
        upload_pdf(pdf_cuil, name_pdf_cuil, 'CUIL')
      }

      if (pdf_alta_temp.val() != '') {
        let extension_archivo = pdf_alta_temp.val().split('.')
        name_pdf_alta = $('#legajo').val() + '_alta_temprana_' + r_string + '.'+ extension_archivo[extension_archivo.length - 1]
        name_pdf_alta.toLowerCase().replace(" ", "_")
        upload_pdf(pdf_alta_temp, name_pdf_alta, 'alta temprana')
      }
      // start ajax add person
      $.ajax({
        url: `${base_url}/Personas/create`,
        type: 'POST',
        data: agruparDatos(),
        dataType: 'JSON',
        success: function(resp) {
          window.location.href = base_url
        },
        error: function(resp) {
          noty_alert('error','error al agregar a la persona')
        }
      })
      // end ajax
    }
  } ) // end on click btnSubmit

  function upload_pdf(element, pdf_name, pdf) {
    var file_data = element.prop('files')[0]
    var form_data = new FormData()
    form_data.append('file', file_data)
    form_data.append('nombre', pdf_name)

    $.ajax({
      url: '<?php echo base_url("Personas/subir_pdf");?>',
      type: 'POST',
      dataType: 'text',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      success: function(resp){
      	if (resp === 'success') {
      		console.log(`${pdf} subio`)
      	} else {
      		alert( `El pdf ${pdf} no se pudo subir: ${resp}` )
      		return
      	}
      },
      error: function(jqXHR, textStatus, errorThrown){
        alert( `El pdf ${pdf} no se pudo subir` )
        return
      }
    })
  }


  function agruparDatos() {
    person = {
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

  })

</script>

