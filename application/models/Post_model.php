<?php

class Post_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function getPosts($idTopic){
		$query = $this->db->get_where("post", array("fk_idTopic" => $idTopic) );
		return $query->result_array();
	}

	public function getAllInfo($idPost){
		$query = $this->db->query(
			"SELECT coment.idComent, coment.fk_idPost, coment.content, coment.publicDate, 
			coment.banned, user.nickName, topic.idTopic, topic.name, post.idPost, post.title
			FROM coment
			INNER JOIN post ON coment.fk_idPost = post.idPost
			INNER JOIN topic ON topic.idTopic = post.fk_idTopic
			INNER JOIN user ON coment.fk_idUser = user.idUser
			WHERE coment.fk_idPost = $idPost"
			);
        return $query->result_array();
	}

	public function getLastPostId(){
		$query = $this->db->query("SELECT MAX(idPost)+1 as lastId from post");
		return $query->row_array();
	}
}

?>