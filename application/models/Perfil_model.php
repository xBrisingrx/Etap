<?php 

class Perfil_model extends CI_Model {
// Tipo perfil: 1 para personal 2 para vehiculos
  protected $table = 'perfiles';
  function __construct() {
    parent::__construct();
  }

  function get($attr = null, $valor = null) {
    if($attr != null and $valor != null) {
      $query = $this->db->select('*')
                          ->from($this->table)
                            ->where('perfiles.'.$attr, $valor)
                              ->where('perfiles.activo', true)
                                ->order_by('nombre', 'asc')
                                  ->get();
      if ($query->num_rows() == 1 ) {
        return $query->row();
      } else {
        return $query->result();
      }
    } else {
      return $this->db->get('perfiles')->result();
    }
  } // end GET 

  function insert_entry($perfil) {
    return $this->db->insert('perfiles', $perfil);
  }

  function update_entry($id, $perfil) {
    $this->db->where('id', $id);
    return $this->db->update('perfiles', $perfil);
  }

  // function destroy($id) {
  //     $perfil = $this->db->get_where('perfiles', array('id' => $id))->row();
  //     $perfil->activo = false;
  //     $perfil->update_at = date('Y-m-d H:i:s');

  //     $this->db->where('id', $id);
  //     return $this->db->update('perfiles', $perfil);
  // }

    function existe($name, $tipo) {
    return $this->db->get_where(
                          $this->table,
                          array('nombre' => $name, 'tipo' => $tipo))->row();
  }
  
}
