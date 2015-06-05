<?php

class Coment_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}


	public function getComents($idPost){
		$query = $this->db->query(
			"SELECT coment.idComent, coment.content, coment.publicDate, coment.banned, user.nickName
			FROM coment
			INNER JOIN user ON coment.fk_idUser = user.idUser
			WHERE coment.fk_idPost = $idPost"
			);
        return $query->result_array();
	}


	public function countComentRows($idPost){
		$query = $this->db->query(
			"SELECT coment.idComent, coment.content, coment.publicDate, coment.banned, user.nickName
			FROM coment
			INNER JOIN user ON coment.fk_idUser = user.idUser
			WHERE coment.fk_idPost = $idPost"
			);
        return $query->num_rows();
	}


	public function getComentInfo($idPost, $idComent){
		$query = $this->db->query(
			"SELECT coment.idComent, coment.content, coment.banned, coment.publicDate, post.title, post.idPost, user.nickName
			FROM coment
			INNER JOIN user ON coment.fk_idUser = user.idUser
			INNER JOIN post ON coment.fk_idPost = post.idPost
			WHERE coment.fk_idPost = $idPost AND coment.idComent = $idComent"
			);
        return $query->row_array();	
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


	public function deleteComent($idPost, $idComent){
		$this->db->delete("coment", array("fk_idPost" => $idPost, "idComent" => $idComent));
		if($this->db->affected_rows() > 0)
		{    
			return true; 
		}
	}


	public function banComent($idPost, $idComent, $banned){
		$this->db->where('fk_idPost', $idPost);
		$this->db->where('idComent', $idComent);
		$this->db->update('coment', array("banned" => $banned));  
		return true; 
	}


	public function editComent($idPost, $idComent, $newContent){
		$this->db->where('fk_idPost', $idPost);
		$this->db->where('idComent', $idComent);
		$this->db->update('coment', array("content" => $newContent));
		return true;
	}

}
?>