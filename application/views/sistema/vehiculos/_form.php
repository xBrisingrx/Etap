<!-- Input numero interno -->
	  <div class="form-group row g-mb-10">
	    <label class="col-sm-2 col-form-label g-mb-10" for="interno">Interno(*)</label>

	    <div id="input_interno" class="col-sm-9">
	      <input id="interno" name="interno" class="form-control u-form-control rounded-0" placeholder="Ingrese interno" type="text"  value="" >
	    </div>
	  </div>
	  <!-- End Input numero interno -->

	  <!-- Input numero dominio -->
	  <div class="form-group row g-mb-10">
	    <label class="col-sm-2 col-form-label g-mb-10" for="dominio">Dominio(*)</label>

	    <div class="col-sm-9">
	      <input id="dominio" name="dominio" class="form-control u-form-control rounded-0" placeholder="Ingrese dominio" type="text" required >
	    </div>
	  </div>
	  <!-- End Input numero dominio -->

	  <!-- Input numero año -->
	  <div class="form-group row g-mb-10">
	    <label class="col-sm-2 col-form-label g-mb-10" for="anio">Año(*)</label>
	    <div class="col-sm-9">
	      <input id="anio" name="anio" class="form-control u-form-control rounded-0" placeholder="Ingrese año" type="text" required>
	    </div>
	  </div>
	  <!-- End Input numero año -->
	  <!-- Input patentamiento -->
	  <div class="form-group row g-mb-10">
	    <label class="col-sm-2 col-form-label g-mb-10" for="patentamiento">Patentamiento </label>
	    <div class="col-sm-9">
	      <input id="patentamiento" name="patentamiento" class="form-control u-form-control rounded-0" placeholder="Lugar de patentamiento" type="text">
	    </div>
	  </div>
	  <!-- End Input patentamiento -->

	  <!-- Select marca vehiculo -->
	  <div class="form-group row g-mb-10">
		  <label class="col-sm-2 col-form-label g-mb-10" for="marca">Marca(*)</label>
		  <div class="col-sm-6">
			  <select class="custom-select sm-9" id="marca" name="marca" required>
			  	<option value="" disabled selected >Seleccione marca</option>
			  	<!-- populate with ajax -->
			  </select>
		  </div>
		  <a href="javascript:void(0)" class="btn btn-md u-btn-darkgray g-mr-10 btn-crud" onclick="modal_crud_attr('marca')"> Editar marcas </a>
	  </div>
	  <!-- End Select marca vehiculo -->

	  <!-- Select modelo vehiculo -->
	  <div class="form-group row g-mb-10">
		  <label class="col-sm-2 col-form-label g-mb-10" for="modelo">Modelo(*)</label>
		  <div class="col-sm-6">
			  <select class="custom-select sm-9" id="modelo" name="modelo" required>
			  	<option value="" disabled selected >Seleccione modelo</option>
			   <!-- populate with ajax -->
			  </select>
		  </div>
		  <a href="javascript:void(0)" class="btn btn-md u-btn-darkgray g-mr-10 btn-crud" onclick="modal_crud_attr('modelo')"> Editar modelos </a>
	  </div>
	  <!-- End Select modelo vehiculo -->

	  <!-- Select tipo vehiculo -->
	  <div class="form-group row g-mb-10">
		  <label class="col-sm-2 col-form-label g-mb-10" for="tipo">Tipo(*)</label>
		  <div class="col-sm-6">
			  <select class="custom-select sm-9" id="tipo" name="tipo" required>
			  	<option value="" disabled selected >Seleccione tipo</option>
			    <!-- populate with ajax -->
			  </select>
		  </div>
		  <a href="javascript:void(0)" class="btn btn-md u-btn-darkgray g-mr-10 btn-crud" onclick="modal_crud_attr('tipo')"> Editar tipos </a>
	  </div>
	  <!-- End Select tipo vehiculo -->

	  <!-- Input numero chasis -->
	  <div class="form-group row g-mb-10">
	    <label class="col-sm-2 col-form-label g-mb-10" for="chasis">Nro. chasis(*)</label>
	    <div class="col-sm-9">
	      <input id="chasis" name="chasis" class="form-control u-form-control rounded-0" placeholder="Ingrese número de chasis" type="text" >
	    </div>
	  </div>
	  <!-- End Input numero chasis -->

	  <!-- Input numero motor -->
	  <div class="form-group row g-mb-10">
	    <label class="col-sm-2 col-form-label g-mb-10" for="motor">Nro. motor(*)</label>

	    <div class="col-sm-9">
	      <input id="motor" name="motor" class="form-control u-form-control rounded-0" placeholder="Ingrese número de motor" type="text" >
	    </div>
	  </div>
	  <!-- End Input numero motor -->

	  <!-- Input numero asientos -->
	  <div class="form-group row g-mb-10">
	    <label class="col-sm-2 col-form-label g-mb-10" for="asientos">Cant asientos(*)</label>

	    <div class="col-sm-9">
	      <input id="asientos" name="asientos" class="form-control u-form-control rounded-0" placeholder="Ingrese cantidad de asientos" type="text" >
	    </div>
	  </div>
	  <!-- End Input numero asientos -->

	  <!-- Select empresa -->
	  <div class="form-group row g-mb-10">
		  <label class="col-sm-2 col-form-label g-mb-10" for="empresa">Pertenece a empresa(*)</label>
		  <div class="col-sm-6">
			  <select class="custom-select sm-9" id="empresa" name="empresa" >
			    <option selected=""> Seleccione empresa </option>
			    <?php foreach ($empresas as $e): ?>
			    	<?php if ($e->nombre == 'Etap'): ?>
              <option value="<?php echo $e->id;?>" selected><?php echo $e->nombre;?></option>
            <?php else: ?>
              <option value="<?php echo $e->id;?>"><?php echo $e->nombre;?></option>
            <?php endif ?>
			    <?php endforeach ?>
			  </select>
		  </div>
	  </div>
	  <!-- End Select empresa -->

	  <div class="form-group row g-mb-10 asignacion-select">
		  <label class="col-sm-2 col-form-label g-mb-10" for="asignacion">Asignar: </label>
		  <div class="col-4">
			  <select class="custom-select sm-6" id="asignacion" name="asignacion">
			  	<option value="" selected >Asignar unidad</option>
			  	<?php foreach ($asignaciones as $a): ?>
			    	<option value="<?php echo $a->id;?>"><?php echo $a->nombre;?></option>
			    <?php endforeach ?>
			  </select>
		  </div>
		 	<label for="fecha_alta_asignacion" class="col-2 col-form-label">Fecha alta</label>
      <div class="col-3">
        <input class="form-control rounded-0 form-control-md" type="date" id="fecha_alta_asignacion" name="fecha_alta_asignacion">
      </div>
	  </div>

	  <!-- Textarea observaciones -->
	  <div class="form-group row g-mb-10">
	    <label class="col-sm-2 col-form-label g-mb-10" for="observaciones">Observaciones</label>
	    <div class="col-sm-9">
	    	<textarea id="observaciones" name="observaciones" class="form-control form-control-md u-textarea-expandable rounded-0" 
	    						rows="3" placeholder="Observaciones" value="">
	    	</textarea>
	    </div>
	  </div>
  <!-- End Textarea observaciones -->

  <!-- Plain File Input -->
  <div class="form-group row mb-0">
    <p class="col-sm-2 ">Imagenes</p>
    <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
      <input id="imagenes" name="imagenes[]" type="file" multiple>
      <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
      <span class="js-value">Agregar imagenes</span>
    </label>
  </div>
  <!-- End Plain File Input -->