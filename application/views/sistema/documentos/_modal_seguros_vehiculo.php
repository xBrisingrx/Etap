<div class="modal fade" id="modal_seguros_vehiculo" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Seguros del vehiculo </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<!-- Si el cargar el formulario retorna errores los imprimo en este div -->
      	<div id="msg-errors"></div>
				<?php echo form_open('', array( 'class' => 'g-brd-around g-brd-gray-light-v4 g-pa-10 g-mb-20',
																				'id' => 'form_seguro_vehiculo', 'enctype' =>"multipart/form-data" )) ?>

      		<input type="hidden" id="vehiculo_id" value="">
          <!-- Input nombre atributo -->
          <div class="form-group row g-mb-10">
            <label class="col-sm-3 col-form-label g-mb-10" for="nombre_attr">Aseguradora</label>
            <div class="col-sm-9">
              <select id="aseguradora_id" name="aseguradora_id" class="form-control form-control-md form-control-lg rounded-0 g-mb-10 col-sm-6" required>
					      <option value='0'>Seleccione aseguradora</option>
					      <?php foreach ($aseguradoras as $a): ?>
					        <option value="<?php echo $a->id;?>"><?php echo $a->nombre;?></option>
					      <?php endforeach ?>
					    </select>
            </div>
          </div>
          <!-- End Input nombre atributo -->
          <div class="form-group row g-mb-10">
            <label class="col-sm-2 col-form-label g-mb-10" for="poliza">Poliza</label>
            <div class="col-sm-9">
              <input id="poliza" name="poliza" class="form-control u-form-control rounded-0" type="text" value="" required>
            </div>
          </div>

				  <!-- Fecha de renovacion atributo -->
				  <div class="row form-group g-mb-10">
				    <label for="fecha_alta_seguro_vehiculo" class="col-sm-3 col-md-3 col-form-label">Fecha alta (*)</label>
				    <div class="col-md-6 col-sm-6">
				      <input id="fecha_alta_seguro_vehiculo" name="fecha_alta_seguro_vehiculo" class="form-control form-control-md rounded-0" type="date" required>
				    </div>
				  </div>
				  <!-- End Fecha de renovacion atributo -->

				  <!-- Fecha de vencimiento atributo -->
				  <div class="row form-group g-mb-10">
				    <label for="fecha_vencimiento_seguro_vehiculo" class="col-sm-3 col-md-3 col-form-label">Fecha vencimiento (*)</label>
				    <div class="col-md-6 col-sm-6">
				      <input id="fecha_vencimiento_seguro_vehiculo" name="fecha_vencimiento_seguro_vehiculo" class="form-control form-control-md rounded-0" type="date" required>
				    </div>
				  </div>
				  <!-- End Fecha de vencimiento atributo -->

				  <!-- Anexar PDF Atributo -->
			    <div class="form-group mb-0 offset-md-2">
			      <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
			        <input id="archivos_seguro" name="archivos_seguro[]" type="file" multiple required>
			        <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
			        <span class="js-value">Anexar documentos seguro</span>
			      </label>
			    </div>
			     <!-- End Anexar PDF Atributo -->
					<button id="btnSaveRenovacion" type="submit" class="btn btn-primary">Cargar</button>

      	<?php echo form_close() ?>

				<!-- Tabla seguros vehiculo -->
				<table id="tabla_seguros_vehiculo" class="table table-hover u-table--v1 mb-0 w-100 mt-2">
		      <thead>
		        <tr>
		        	<th>Aseguradora</th>
		        	<th>Poliza</th>
		          <th>Fecha alta</th>
		          <th>Fecha vencimiento</th>
		          <th>Archivos</th>
              <?php if ($this->session->userdata('rol') == 1): ?>
		           <th>Acciones</th>
              <?php endif ?>
		        </tr>
		      </thead>

		      <tbody>
		      	<!-- Ajax call -->
		      </tbody>
		    </table>
				<!-- End tabla renovaciones atributo -->
        <button type="button" class="btn u-btn-red mt-2" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>