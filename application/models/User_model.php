<?php


class User_model extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}


	public function getUser($idUser = FALSE){
		if ($idUser === FALSE)
        {
                $query = $this->db->get('user');
                return $query->result_array();
        }

		$query = $this->db->get_where('user', array('idUser' => $idUser));
        return $query->row_array();
	}


	public function validateUser($nickName, $password){
		$query = $this->db->query ("SELECT * FROM user WHERE nickName = '$nickName' AND passUser = '$password' ");	 
	 
	    if($query -> num_rows() == 1)
	    {
	      return $query->row_array();
	    }
	    else
	    {
	      return false;
	    }
	}

}