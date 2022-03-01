<?php

class DButil_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  function get( $table, $filtros = null) {
  	if($filtros != null) {
  		return $this->db->get_where($table, $filtros )->result();
  	} else {
    	 return $this->db->get($table)->result();
    }
  }

  function get_for_id($table, $id){
    return $this->db->get_where($table, array('id'=>$id))->row();
  }

  public function insert_entry($table, $entry) {
  	return $this->db->insert($table, $entry);
  }

  public function update_entry($table, $id, $entry) {
    $this->db->where('id', $id);
    return $this->db->update($table, $entry);
  }

  function destroy_entry($table, $id) {
    $entry = $this->db->get_where($table, array('id'=>$id))->row();
    $entry->activo = false;
    $entry->updated_at = date('Y-m-d H:i:s');
    $entry->user_last_updated_id = $this->session->userdata('id');
    $this->db->where('id', $id);
    return $this->db->update($table, $entry);
  }

  function existe($table, $col, $value, $id = null){
    $this->db->select("id, $col")
                ->from($table)
                  ->where( $col, $value );
    if ($id != null) {
      $this->db->where('id !=', $id);
    }
    $query = $this->db->get();
    return ( $query->num_rows() > 0 );
  }

}