<?php
class Activity_model extends CI_Model 
{
	public function add_Activity($data)
	{
		$keys = array();
		$values = array();
		foreach($data as $key => $val){
			if (is_array($val)){
				$values[] = "'".$this->db->escape_str(json_encode($val))."'";
			} else {
				$values[] = "'".$this->db->escape_str($val)."'";
			}
			$keys[] = "`$key`";
		}
		$this->db->query("INSERT INTO aktiviteler (".implode(",",$keys).") VALUES (".implode(",",$values).")");
		return $this->db->insert_id();
	}
	
	public function _add($data,$whichever)
	{
		
		$keys = array();
		$values = array();
		foreach($data as $key => $val){
			$values[] = "'".$this->db->escape_str($val)."'";
			$keys[] = "`$key`";
		}
		switch($whichever)
		{
			case 'comment':
			$this->db->query("INSERT INTO yorumlar (".implode(",",$keys).") VALUES (".implode(",",$values).")");
			$this->db->insert_id();
			break;
			case 'watch':
			$this->db->query("INSERT INTO izlediklerim (".implode(",",$keys).") VALUES (".implode(",",$values).")");
			$this->db->insert_id();
			break;
			case 'watch_later':
			$this->db->query("INSERT INTO izleyeceklerim (".implode(",",$keys).") VALUES (".implode(",",$values).")");
			$this->db->insert_id();
			break;
			case 'follow_User':
			$this->db->query("INSERT INTO arkadaslar (".implode(",",$keys).") VALUES (".implode(",",$values).")");
			$this->db->insert_id();
			break;
			case 'follow_Series':
			$this->db->query("INSERT INTO abonelikler (".implode(",",$keys).") VALUES (".implode(",",$values).")");
			$this->db->insert_id();
			break;
			case 'seriesVote':
			$this->db->query("INSERT INTO oylar (".implode(",",$keys).") VALUES (".implode(",",$values).")");
			$this->db->insert_id();
			break;
			case 'done':
			$this->db->query("INSERT INTO yaptiklarim (".implode(",",$keys).") VALUES (".implode(",",$values).")");
			$this->db->insert_id();
			break;
		}
		return TRUE;
	}
	
	public function _del($user_id,$target_id,$whichever)
	{
		if(!$user_id && !$target_id && !$whichever) return FALSE;
		switch($whichever)
		{
			case 'watch':
			$this->db->where('user_id',$user_id)->where('target_id',$target_id)->delete('izlediklerim');
			break;
			case 'watch_later':
			$this->db->where('user_id',$user_id)->where('ep_id',$target_id)->delete('izleyeceklerim');
			break;
			case 'follow_User':
			$this->db->where('user1',$user_id)->where('user2',$target_id)->delete('arkadaslar');
			break;
			case 'follow_Series':
			$this->db->where('user_id',$user_id)->where('show_id',$target_id)->delete('abonelikler');
			break;
			case 'artist_fan':
			$this->db->where('user_id',$user_id)->where('cast_id',$target_id)->delete('fanlar');
			break;
		}
		return $this->db->insert_id();
	}
	
	public function last_activity($user_id = null,$target_type = null,$limit)
	{
		$query = $this->db->select('*')
				 ->from('aktiviteler')
				 ->where('user_id',$user_id)
				 ->where('target_type',$target_type)
				 ->order_by('date','DESC')->limit($limit)->get();
		return $query->result_array();
	}
}