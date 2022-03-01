<?php

class Vehiculo_model extends CI_Model {

	protected $table = 'vehiculos';

  function __construct() {
    parent::__construct();
  }

  function get($attr = null, $value = null){
	  if($attr != null and $value != null) {
	    return $this->db->get_where('vehiculos', array($attr => $value, 'activo' => true))->result();
	  } else {
	      $this->db->select('vehiculos.id,vehiculos.interno, vehiculos.dominio, vehiculos.anio,marcas_vehiculos.nombre as marca,
	                         modelos_vehiculos.nombre as modelo, tipos_vehiculos.nombre as tipo, vehiculos.n_chasis,
	                         vehiculos.n_motor, vehiculos.cant_asientos, empresas.nombre as empresa, vehiculos.observaciones, vehiculos.patentamiento')
	                  ->from($this->table)
	                    ->join('marcas_vehiculos', 'marcas_vehiculos.id = vehiculos.marca_id')
	                    ->join('modelos_vehiculos', 'modelos_vehiculos.id = vehiculos.modelo_id')
	                    ->join('tipos_vehiculos', 'tipos_vehiculos.id = vehiculos.tipo_id')
	                    ->join('empresas', 'empresas.id = vehiculos.empresa_id')
	                      ->where('vehiculos.activo', true)
	                        ->order_by('interno', 'ASC');
	      return $this->db->get()->result();
	  }
  }

  function insert_entry($table, $value) {
    return $this->db->insert($table, $value);
  }

  function update_entry( $id, $entry ) {
    $this->db->where('id', $id);
    return $this->db->update($this->table, $entry);
  }

  function destroy($vehiculo) {
    // Dejamos el vehiculo inactivo y registramos el moviniento en tabla vehiculos_inactivos
    $entry = $this->db->get_where('vehiculos', array('id' => $vehiculo['vehiculo_id']))->row();
    $entry->activo = false;
    $entry->updated_at = date('Y-m-d H:i:s');
    $entry->user_last_updated_id = $this->session->userdata('id');
    $this->db->where('id', $vehiculo['vehiculo_id']);
    return ( $this->db->update('vehiculos', $entry) ) && ( $this->db->insert('vehiculos_inactivos', $vehiculo) );
  }

	function get_motivos_baja() {
    return $this->db->select('id, motivo')
                      ->from('motivos_baja')
                        ->where( array('tipo' => 2, 'activo' => true) )
                          ->order_by('motivo', 'ASC')
                            ->get()->result();
  }


/* Operaciones de marca/modelo/tipo vehiculo */ 
	function get_attr($table, $attr = null, $value = null) {
    if ($attr != null and $value != null) {
      return $this->db->select('*')->from($table)->where( array($attr => $value, 'activo' => 1) )->order_by('nombre', 'ASC')->get()->result();
    } else {
        if ($table == 'modelos_vehiculos') {
          $this->db->select('modelos_vehiculos.id AS id, modelos_vehiculos.nombre as nombre,marcas_vehiculos.nombre as nombre_marca')
                      ->from($table)
                        ->join('marcas_vehiculos', 'marcas_vehiculos.id = modelos_vehiculos.marca_vehiculo_id')
                          ->where('modelos_vehiculos.activo', true)
                            ->order_by('nombre', 'ASC');
          return $this->db->get()->result();
        } else {
          return $this->db->select('*')->from($table)->where( array('activo' => 1) )->order_by('nombre', 'ASC')->get()->result();
      }
    }
  }

  function modelo_vehiculo_unico($marca_id,$name) {
    // Si retorna 0 es que el valor no se encuentra en la BD
    $query = $this->db->select('*')
                ->from('modelos_vehiculos')
                  ->join('marcas_vehiculos', 'marcas_vehiculos.id = modelos_vehiculos.marca_vehiculo_id')
                    ->where(array('modelos_vehiculos.nombre' => $name, 'modelos_vehiculos.marca_vehiculo_id' => $marca_id))
                      ->get();
    if ( $query->num_rows() > 0 ) {
      return false;
    } else {
      return true;
    }
  }

  function get_last_id() {
    $query = $this->db->select('*')
                        ->from('vehiculos')
                          ->limit(1)
                            ->order_by('id', 'DESC')
                              ->get()->row();
    if (!empty( $query )) {
      return $query->id;
    } else {
      return 0;
    }
  }


}