<?php

class Atributo_model extends CI_Model {

  // Tipo atributo: 1 para personal 2 para vehiculos
  protected $table = 'atributos';
  function __construct() {
    parent::__construct();
  }

  function get($attr = null, $valor = null) {
    $this->db->select('*')
              ->from($this->table)
                ->where('atributos.activo', true);
    if($attr != null and $valor != null) {
      $this->db->where('atributos.'.$attr, $valor);
    }
    $this->db->order_by('nombre', 'asc');
    return $this->db->get()->result();
  }

  function insert_entry($attribute) {
    return $this->db->insert('atributos', $attribute);
  }

  function update_entry($id, $perfil) {
    $this->db->where('id', $id);
    return $this->db->update('atributos', $perfil);
  }

  function existe( $name, $tipo, $atributo_id = null ) {
    $this->db->select('id, nombre, tipo')
                ->from($this->table)
                  ->where('nombre', $name)
                  ->where('tipo', $tipo);
    if ($atributo_id != null) {
      $this->db->where('id !=', $atributo_id);
    }
    $query = $this->db->get();
    return ( $query->num_rows() > 0 );
  }
}