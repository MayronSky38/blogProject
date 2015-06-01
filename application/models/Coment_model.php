<?php

class Coment_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function getComents($idPost){
		$query = $this->db->get_where("coment", array("fk_idPost" => $idPost));
		return $query->result_array();
	}
}
?>