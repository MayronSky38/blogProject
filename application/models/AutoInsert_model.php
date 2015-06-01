<?php
class AutoInsert_model extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}

	public function autoInserts(){

		$userData = array(
			array(
				"idUser" => 0,
				"nickName" => "Mayron",
				"passUser" => sha1("12345"),
				"typeUser" => "Admin"
				),
			array(
				"idUser" => 1,
				"nickName" => "User",
				"passUser" => sha1("12345"),
				"typeUser" => "User"
				)
			);
		//$this->db->insert_batch("user", $userData);


		$topicData = array(
			array(
				"idTopic" => 0, 
				"name" => "Main",
				"description" => "The main topic of this blog."
			),
			array(
				"idTopic" => 1, 
				"name" => "Gaming",
				"description" => "The perfect topic for gamers!"
			),
			array(
				"idTopic" => 2, 
				"name" => "Programing",
				"description" => "Programing issues and tutorials."
			),
			array(
				"idTopic" => 3, 
				"name" => "Art",
				"description" => "Here you can share your art with everyone!"
			),
			array(
				"idTopic" => 4, 
				"name" => "Off Topic",
				"description" => "In here goes everything else."
			)
		);
		$this->db->insert_batch("topic", $topicData);

		$postData = array(); //"idPost" "title" "content" "publicDate" "fk_idUser" "banned" "fk_idTopic"
		$postCounter = 0;
		for($i = 0; $i < count($topicData); $i++){
			$array = array();		
			for($j = 0; $j < 3; $j++){
			$array["idPost"] = $postCounter;			
				switch ($j){
					case 0:
						$array["title"] = "First post for ". $topicData[$i]["name"] .".";
						$array["content"] = "This is the content of my first post.";
						$array["publicDate"] = "2015-05-29 10:".$j.$i.":00";
						$array["fk_idTopic"] = $i;
						$array["fk_idUser"] = 0;
					break;

					case 1:
						$array["title"] = "Second post for ". $topicData[$i]["name"] .".";
						$array["content"] = "This is the content of my second post.";
						$array["publicDate"] = "2015-05-29 10:".$j.$i.":00";
						$array["fk_idTopic"] = $i;
						$array["fk_idUser"] = 0;
					break;

					case 2:
						$array["title"] = "Third post for ". $topicData[$i]["name"] .".";
						$array["content"] = "This is the content of my third post.";
						$array["publicDate"] = "2015-05-29 10:".$j.$i.":00";
						$array["fk_idTopic"] = $i;
						$array["fk_idUser"] = 1;
					break;
				}
				$postCounter++;
				array_push($postData, $array);
			}
			
		}
		$this->db->insert_batch("post", $postData);

		$comentData = array(); // idComent, fk_idPost, content, publicDate, fk_iduser, banned
		$comentCounter = 0;
		for($i = 0; $i < count($postData); $i++){
			$array = array();
			for($j = 0; $j < 4; $j++){
				$array["idComent"] = $comentCounter;			
				switch ($j){
					case 0:
					$array["fk_idPost"] = $postData[$i]["idPost"];
					$array["content"] = "This is the very first comment on this " . $postData[$i]["title"];
					$array["publicDate"] = "2015-05-29 10:".$j.$i.":00";
					$array["fk_idUser"] = 0; 
					break;

					case 1:
					$array["fk_idPost"] = $postData[$i]["idPost"];
					$array["content"] = "This is the second comment on this " . $postData[$i]["title"];
					$array["publicDate"] = "2015-05-29 10:".$j.$i.":00";
					$array["fk_idUser"] = 1; 
					break;

					case 2:
					$array["fk_idPost"] = $postData[$i]["idPost"];
					$array["content"] = "This is the third comment on this " . $postData[$i]["title"];
					$array["publicDate"] = "2015-05-29 10:".$j.$i.":00";
					$array["fk_idUser"] = 0; 
					break;

					case 3:
					$array["fk_idPost"] = $postData[$i]["idPost"];
					$array["content"] = "This is the fourth comment on this " . $postData[$i]["title"];
					$array["publicDate"] = "2015-05-29 10:".$j.$i.":00";
					$array["fk_idUser"] = 1; 
					break;
				}
			$comentCounter++;
			array_push($comentData, $array);
			}
			 
		}
		$this->db->insert_batch("coment", $comentData);

		return true;
	}
}