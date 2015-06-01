<?php

class Coment_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function getComents($idPost){
		$query = $this->db->query(
			"SELECT coment.idComent, coment.content, coment.publicDate, user.nickName
			FROM coment
			INNER JOIN user ON coment.fk_idUser = user.idUser
			WHERE coment.fk_idPost = $idPost"
			);
        return $query->result_array();
	}
}
?>