<?php

class DButil_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  function get( $table, $filtros ) {
  	if($attr != null and $valor != null) {
  		return $this->db->get_where($this->table, array( $filtros ))->result();
  	} else {
    	 return $this->db->get($this->table)->result();
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

}