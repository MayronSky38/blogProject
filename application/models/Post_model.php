<?php

class Post_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}


	public function listAllPosts($limit, $start){
		$query = $this->db->query(
			"SELECT post.*, 
			(SELECT MAX(c1.idComent) FROM coment c2 WHERE c1.idComent = c2.idComent GROUP BY c1.fk_idPost) as lastComent,
            CASE 
				WHEN (SELECT MAX(c1.publicDate) FROM coment c3 WHERE c1.idComent = c3.idComent GROUP BY c1.fk_idPost) is null THEN post.publicDate
                ELSE (SELECT MAX(c1.publicDate) FROM coment c3 WHERE c1.idComent = c3.idComent GROUP BY c1.fk_idPost)
			END as lastDate
			FROM post 
            LEFT JOIN coment c1
            ON c1.fk_idPost = post.idPost
			GROUP BY fk_idPost
            ORDER BY lastDate DESC
            LIMIT $start, $limit"
			);
		return $query->result_array();
	}

	public function countPostRows(){
		$query = $this->db->query(
			"SELECT post.*, 
			(SELECT MAX(c1.idComent) FROM coment c2 WHERE c1.idComent = c2.idComent GROUP BY c1.fk_idPost) as lastComent,
            (SELECT MAX(c1.publicDate) FROM coment c3 WHERE c1.idComent = c3.idComent GROUP BY c1.fk_idPost) as lastDate
			FROM coment c1
            INNER JOIN post
            ON c1.fk_idPost = post.idPost
			GROUP BY fk_idPost
            ORDER BY lastDate DESC"
			);
		return $query->num_rows();
	}

	public function getPosts($idTopic){
		$query = $this->db->query(
		"SELECT post.*,     
		CASE 
			WHEN user.idUser IS NULL THEN post.fk_idUser
	        ELSE user.idUser
		END AS user,
	    (SELECT MAX(c1.idComent) FROM coment c2 WHERE c1.idComent = c2.idComent GROUP BY c1.fk_idPost) as lastComent
	    FROM post 
		LEFT JOIN coment c1
		ON post.idPost = c1.fk_idPost
		LEFT JOIN user
		ON c1.fk_idUser = user.idUser
		WHERE post.fk_idTopic = $idTopic 
		GROUP BY idPost;"
		);
		return $query->result_array();
	}
/*
"SELECT post.*, user.nickName, c1.publicDate  FROM post 
			INNER JOIN coment c1
			ON post.idPost = c1.fk_idPost
			INNER JOIN user
            ON c1.fk_idUser = user.idUser
			WHERE idComent IN (SELECT MAX(idComent) FROM coment c2 WHERE c1.fk_idPost = c2.fk_idPost GROUP BY fk_idPost)
			AND post.fk_idTopic = $idTopic
			ORDER BY c1.publicDate DESC;"
*/

	public function getPostInfo($idPost){
		$query = $this->db->query(
			"SELECT post.idPost, post.title, post.content, post.publicDate, post.banned, 
			user.nickName, topic.idTopic, topic.name
			FROM post
			INNER JOIN topic ON topic.idTopic = post.fk_idTopic
			INNER JOIN user ON post.fk_idUser = user.idUser
			WHERE post.idPost = $idPost"
			);
        return $query->row_array();
	}


	public function getByPostTopicInfo($idPost){
		$query = $this->db->query(
			"SELECT topic.idTopic, topic.name
			FROM post
			INNER JOIN topic ON topic.idTopic = post.fk_idTopic
			WHERE post.idPost = $idPost"
			);
        return $query->row_array();
	}


	public function getLastPostId(){
		$query = $this->db->query("SELECT MAX(idPost)+1 as lastId from post");
		return $query->row_array();
	}


	public function createPost($idPost, $title, $content, $publicDate, $idUser, $idTopic){
		$data = array(
			'idPost' => $idPost,
			'title' => $title,
			'content' => $content,
			'publicDate' => $publicDate,
			'fk_idUser' => $idUser,
			'fk_idTopic' => $idTopic
			);
		$this->db->insert('post', $data);
		if($this->db->affected_rows() > 0)
		{    
			return true; 
		}
	}


	public function deletePost($idPost){
		$this->db->delete("post", array("idPost" => $idPost));
		if($this->db->affected_rows() > 0)
		{    
			$this->db->delete("coment", array("fk_idPost" => $idPost));
			return true; 
		}
	}

	public function banPost($idPost, $banned){
		$this->db->where('idPost', $idPost);
		$this->db->update('post', array("banned" => $banned));  
		$this->db->where('fk_idPost', $idPost);
		$this->db->update('coment', array("banned" => $banned));
		return true; 
	}


	public function editPost($idPost, $newContent){
		$this->db->where('idPost', $idPost);
		$this->db->update('post', array("content" => $newContent));
		return true;
	}


}

?>