<?php
class Auth_model extends CI_Model 
{
    function authorization($username,$password)
	{
		$query = $this->db->select('id,username')->where('username',$username)->where('password',$password)->get('admin');

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			if($this->db->affected_rows() > 0)
				return $row;
		}
		return FALSE;
	}
}