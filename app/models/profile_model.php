<?php
class Profile_model extends CI_Model
{
	function get_Member($username)
	{
		$query = $this->db->select('uyeler.*,uyeler.user_id as usaid')->where('username',$username)->get('uyeler');
		if($query->num_rows() > 0) return $query->result_array();
		return FALSE;
	}
	
	function _list($user_id,$whichever,$limit)
    {
		switch($whichever)
		{
			case 'follows':
			$out = $this->db->select('uyeler.*')->from('arkadaslar,uyeler')->where('user2=uyeler.user_id')->where('user1',$user_id)->limit($limit)->get()->result_array();
			break;
			case 'followers':
			$out = $this->db->select('uyeler.*')->from('arkadaslar,uyeler')->where('user1=uyeler.user_id')->where('user2',$user_id)->limit($limit)->get()->result_array();
			break;
			case 'follow_series':
			$out = $this->db->select('diziler.*')->from('abonelikler,diziler')->where('show_id=diziler.id')->where('user_id',$user_id)->limit($limit)->get()->result_array();
			break;
		}
		return $out;
    }
	
	function _count($user_id,$whichever,$type)
    {	
		switch($whichever)
		{
			case 'watch':
			$out = $this->db->where('user_id',$user_id)->get('izlediklerim')->num_rows();
			break;
			case 'subscriptions':
			$out = $this->db->where('user_id',$user_id)->get('abonelikler')->num_rows();
			break;
			case 'follow':
			$out = $this->db->where('user1',$user_id)->get('arkadaslar')->num_rows();
			break;
			case 'followers':
			$out = $this->db->where('user2',$user_id)->get('arkadaslar')->num_rows();
			break;
			case 'comments':
			if($type == 'yazdir')
			{
				$out = $this->db->where('user_id',$user_id)->get('yorumlar',4)->result_array();
			}
			else
			{
				$out = $this->db->where('user_id',$user_id)->get('yorumlar')->num_rows();
			}
			break;
			default: return FALSE;
		}
		return $out;
    }
	
	function get_Cast($name)
	{
		$query = $this->db->select('oyuncular.*')->from('oyuncular')->where('bermalink',$name)->get('');
		if($query->num_rows() > 0)
		{	
			return $query->result_array();
		}
		return FALSE;
	}
}