<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personas extends CI_Controller {
	
	function __construct() {
	  parent::__construct();
	  date_default_timezone_set('America/Argentina/Buenos_Aires');
	  $this->load->model(array('Empresa_model', 'Persona_model','Motivos_baja_model', 'Perfil_model'));
    $this->load->library('upload');
    if ( empty( $this->session->nombre_usuario ) ) {
	  	redirect('Login');
	  }
	}

	function index() {
		$title['title'] = 'Personas';
		$data = array(
				'personas' => $this->Persona_model->getData('activo', true),
				'empresas' => $this->Empresa_model->get('tipo', 1),
				'motivos_baja' => $this->Motivos_baja_model->get('tipo', 1),
				'perfiles' => $this->Perfil_model->get('tipo', 1)
		);
		$this->load->view('layout/header',$title);
		$this->load->view('layout/nav');
		$this->load->view('sistema/personas/index',$data);
		$this->load->view('layout/footer');
		// $this->backup_semanal();
	}

	function show($id){ 
		echo json_encode( $this->DButil->get_for_id('personas', $id) );
	}

	function new( $error = null ) {
		if ($this->session->userdata('rol') != 1) {
			$this->index();
		} else {
			$title['title'] = 'Alta de persona';
			$data['empresas'] = $this->Empresa_model->get('tipo', 1);
			// Le mando el legajo sugerido , seria el ultimo + 1
			$ultimo_legajo = $this->Persona_model->get_ultimo_legajo() + 1;
			$data['ultimo_legajo'] = $ultimo_legajo;
			$data['error'] = $error;
			$this->load->view('layout/header',$title);
			$this->load->view('layout/nav');
			$this->load->view('sistema/personas/new',$data);
			$this->load->view('layout/footer');
		}
	}

	function create() {
		if ($this->session->userdata('rol') != 1) {
			$this->index();
		} else {
			// Rules
			$this->form_validation->set_rules('n_legajo', 'Legajo', 'required');
			$this->form_validation->set_rules('nombre', 'Nombre', 'min_length[3]|required');
			$this->form_validation->set_rules('dni', 'DNI', 'required');
			$this->form_validation->set_rules('apellido', 'Apellido', 'required');

			// Valores seteados
			set_value('legajo');
			set_value('nombre');
			set_value('apellido');
			set_value('DNI');
			set_value('telefono');
			set_value('domicilio');
			set_value('cuit');
			set_value('pdf_dni');
			set_value('num_tramite');

			// Mensajes personalizados

			if ( $this->form_validation->run() == FALSE ) {
				// $errors = validation_errors();
				echo json_encode( validation_errors() );
				// redirect('Personas/new');
			} else {
				$persona = array(
					'n_legajo' => $this->input->post('n_legajo'),
					'apellido' => $this->input->post('apellido'),
					'nombre'   => $this->input->post('nombre'),
					'email'   => $this->input->post('email'),
					'dni' 		 => $this->input->post('dni'),
					'dni_tiene_vencimiento' => ( $this->input->post('dni_tiene_vencimiento') == 'true' ) ? true : false,
					'fecha_vencimiento_dni' => $this->input->post('fecha_vencimiento_dni'),
					'dni_pdf_path' => $this->input->post('dni_pdf_path'),
					'num_tramite' => $this->input->post('num_tramite'),
					'cuil' => $this->input->post('cuil'),
					'cuil_pdf_path' => $this->input->post('cuil_pdf_path'),
					'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
					'alta_pdf_path' => $this->input->post('alta_pdf_path'),
					'nacionalidad' => $this->input->post('nacionalidad'),
					'domicilio' => $this->input->post('domicilio'),
					'telefono' => $this->input->post('telefono'),
					'empresa_id' => $this->input->post('empresa_id'),
					'fecha_inicio_actividad' => $this->input->post('fecha_inicio_actividad'),
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'user_created_id' => $this->session->userdata('id'),
					'user_last_updated_id' => $this->session->userdata('id')
				);
				$persona = $this->security->xss_clean($persona);
				if ($this->Persona_model->insert_entry($persona)) {
					echo json_encode( array( 'status' => 'success', 'msg' => 'Persona registrada con exito' ) );
				} else {
					echo json_encode( array( 'status' => 'error','msg' => 'No se pudo registrar la informacion' ) );
				}
			}
		}
	}

	function edit( $id ) {
		if ($this->session->userdata('rol') != 1) {
			$this->index();
		} else {
			$persona = $this->Persona_model->get('id',$id);
			$title['title'] = 'Edición de persona';
			$data['persona'] = $persona[0];
			$data['empresas'] = $this->Empresa_model->get('tipo', 1);
			$this->load->view('layout/header',$title);
			$this->load->view('layout/nav');
			$this->load->view('sistema/personas/edit',$data);
			$this->load->view('layout/footer');
		}
	}

	function update() {
		if ($this->session->userdata('rol') != 1) {
			$this->index();
		} else {
			$id = $this->input->post('id');
			$persona = array(
				'n_legajo' =>  $this->input->post('n_legajo'),
				'apellido' =>  $this->input->post('apellido'),
				'nombre' =>  $this->input->post('nombre'),
				'dni' =>  $this->input->post('dni'),
				'dni_tiene_vencimiento' =>  ( $this->input->post('dni_tiene_vencimiento') == 'true' ) ? true : false,
				'fecha_vencimiento_dni' =>  $this->input->post('fecha_vencimiento_dni'),
				'cuil' =>  $this->input->post('cuil'),
				'fecha_nacimiento' =>  $this->input->post('fecha_nacimiento'),
				'nacionalidad' =>  $this->input->post('nacionalidad'),
				'telefono' =>  $this->input->post('telefono'),
				'domicilio' =>  $this->input->post('domicilio'),
				'empresa_id' =>  $this->input->post('empresa_id'),
				'fecha_inicio_actividad' => $this->input->post('fecha_inicio_actividad'),
				'dni_pdf_path' => $this->input->post('dni_pdf_path'),
				'cuil_pdf_path' => $this->input->post('cuil_pdf_path'),
				'alta_pdf_path' => $this->input->post('alta_pdf_path'),
				'updated_at' =>  date('Y-m-d H:i:s'),
				'num_tramite' => $this->input->post('num_tramite'),
				'email'   => $this->input->post('email'),
				'user_last_updated_id' => $this->session->userdata('id')
			);
			$persona = $this->security->xss_clean($persona);
			if ($this->Persona_model->update_entry($id, $persona)) {
				echo json_encode( array( 'status' => 'success', 'data' => $persona ) );
			} else {
				echo json_encode( array( 'status' => 'error','msg' => 'No se pudieron actualizar los datos') );
			}
		}
	}

	function subir_pdf() {
		$ruta = 'assets/uploads/personas';
		if (!file_exists($ruta)) {
			if (!mkdir($ruta, 0777, true)) {
				$response['status'] = false;
				$response['msg'] = 'Error al crear la carpeta => '.$ruta;
				return $response;
			}
		}
		$config['upload_path']  	= $ruta;
		$config['allowed_types']	= 'pdf|jpg|png|jpeg';
		$config['max_size']     	= 30024;
		$config['overwrite']			= true;
		$config['file_name']			= $_POST['nombre'];

		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('file')) {
			echo json_encode( $this->upload->display_errors() );
		}
		else {
			echo 'success';
		}
	}

	function destroy() {
    $this->form_validation->set_rules('motivo_baja_id', 'Motivo', 'required');
    $this->form_validation->set_rules('persona_id', 'Persona', 'required');
    $this->form_validation->set_rules('detalle', 'Detalle', 'required|min_length[5]');
    if ($this->form_validation->run() == FALSE) {
      echo json_encode( array( 'status' => 'error', 'msg'  => 'Faltan datos') );
    } else {
      $entry = array(
	      'persona_id' => $this->input->post('persona_id'),
	      'motivo_baja_id' => $this->input->post('motivo_baja_id'),
	      'detalle' => $this->input->post('detalle'),
	      'fecha_baja' => $this->input->post('fecha_baja'),
	      'user_created_id' => $this->session->userdata('id'),
	      'user_last_updated_id' => $this->session->userdata('id'),
	      'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
      );
      $entry = $this->security->xss_clean($entry);
      if ($this->Persona_model->destroy($entry)) {
        echo json_encode( array( 'status' => 'success', 'msg'  => 'Persona dada de baja') );
      } else {
        echo json_encode( array( 'status' => 'error', 'msg'  => 'Ocurrio un error al eliminar el registro') );
      }
    } // end if form_validation
  } // end destroy

  
}