<?php

class Topic_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function getTopics(){
		$query = $this->db->get('topic');
        return $query->result_array();
	}

	public function getTopic($idTopic){
		$this->db->select("name");
		$this->db->where("idTopic", $idTopic);
		$query = $this->db->get("topic");
        return $query->row_array();
	}

	public function getIdTopic($topicName){
		$this->db->select("idTopic");
		$this->db->where("name", $topicName);
		$query = $this->db->get("topic");
        return $query->row_array();
	}

}

?>