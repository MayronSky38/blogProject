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


	public function getLastComentId($idPost){
		$query = $this->db->query("SELECT MAX(idComent)+1 as lastId FROM coment WHERE fk_idPost = $idPost");
		return $query->row_array();
	}


	public function createComent($idComent, $idPost, $content, $publicDate, $idUser){
		$data = array(
			'idComent' => $idComent,
			'fk_idPost' => $idPost,
			'content' => $content,
			'publicDate' => $publicDate,
			'fk_idUser' => $idUser
			);
		$this->db->insert('coment', $data);
		if($this->db->affected_rows() > 0)
		{    
			return true; 
		}
	}
}
?>