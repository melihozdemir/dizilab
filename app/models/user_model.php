<?php
class User_model extends CI_Model
{
    function logmein($username)
    {
    	$query = $this->db->select('*')->where('username',$username)->get('uyeler');
		return $query->row();
    }

    public function get_by_username($username){
        $query = $this->db->select('user_id')->where('username',$username)->get('uyeler');
        if($query->num_rows() == 1){
            return $query->row();
        }
        return FALSE;
    }
	
	public function get_usernames($xyz){
        $query = $this->db->select('username')->where('user_id',$xyz)->get('uyeler');
        if($query->num_rows() == 1){
            return $query->row_array();
        }
        return FALSE;
    }
	
	function _list($user_id,$whichever,$type = null,$limit = null)
    {
		switch($whichever)
		{
			case 'watch_time':
			$out = $this->db->select_sum('min')->where('user_id',$user_id)->get('izlediklerim')->row_array();
			#$out = $this->db->query('SELECT SUM(min) as toplam FROM izlediklerim where user_id='.$user_id.'');
			break;
			case 'follow_series':
			$out = $this->db->select('diziler.*')->from('abonelikler,diziler')->where('show_id=diziler.id')->where('user_id',$user_id)->limit($limit)->get()->result_array();
			break;
			case 'last_watched':
			$out = $this->db->select('bolumler.season,bolumler.episode,diziler.title,diziler.permalink,diziler.imdb_rating,diziler.year_started,izlediklerim.date AS tarih')
    					->from('izlediklerim,bolumler')->join('diziler','bolumler.show_id = diziler.id')
    					->where('izlediklerim.user_id',$user_id)
						->where('izlediklerim.target_id=bolumler.id')
						->get()->result_array();
			break;
			case 'watch_later':#https://www.youtube.com/watch?v=R8FOr5RJiLY
			$out = $this->db->select('bolumler.season,bolumler.episode,diziler.title,diziler.permalink,diziler.imdb_rating,diziler.year_started,izleyeceklerim.date,izleyeceklerim.id AS wl_id')
    					->from('izleyeceklerim,bolumler')->join('diziler','bolumler.show_id = diziler.id')
    					->where('izleyeceklerim.user_id',$user_id)
						->where('izleyeceklerim.ep_id=bolumler.id')
						->get()->result_array();
			break;
			case 'user_watched_list':
			$out = $this->db->select('target_id')->from('izlediklerim')->where('user_id',$user_id)->get('')->result_array();
			break;
		}
		if(!$out) return FALSE;
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
			case 'unread_notif':
			$out = $this->db->where('user_id',$user_id)->where('read',0)->get('bildirimler')->num_rows();
			break;
		}
		if(!$out) return FALSE;
        return $out;
    }
	#https://play.spotify.com/track/2V65y3PX4DkRhy1djlxd9p
	function _Ctrl($user_id,$target_id,$whichever,$type = null)
    {
		switch($whichever)
		{
			case 'my_comment':
			$this->db->where('user_id',$user_id)->where('target_id',$target_id)->get('yorumlar');
			if($this->db->affected_rows() > 0) return TRUE;
			break;
			case 'follow':
			$this->db->where('user1',$user_id)->where('user2',$target_id)->get('arkadaslar');
			if($this->db->affected_rows() > 0) return TRUE;
			break;
			case 'watched':
			$this->db->where('user_id',$user_id)->where('target_id',$target_id)->get('izlediklerim');
			#if($out->num_rows() > 0) return TRUE;
			if($this->db->affected_rows() > 0) return TRUE;
			break;
			case 'watch_later':
			$this->db->where('user_id',$user_id)->where('ep_id',$target_id)->get('izleyeceklerim');
			if($this->db->affected_rows() > 0) return TRUE;
			break;
			#
			case 'series_follow':
			$this->db->where('user_id',$user_id)->where('show_id',$target_id)->get('abonelikler');
			if($this->db->affected_rows() > 0) return TRUE;
			break;
			case 'artist_fan':
			$this->db->where('user_id',$user_id)->where('cast_id',$target_id)->get('fanlar');
			if($this->db->affected_rows() > 0) return TRUE;
			break;
			case 'seriesVote':
			$this->db->where('user_id',$user_id)->where('series_id',$target_id)->get('oylar');
			if($this->db->affected_rows() > 0) return TRUE;
			break;
			case 'done':
			$this->db->where('user_id',$user_id)->where('target_id',$target_id)->where('type',$type)->get('yaptiklarim');
			if($this->db->affected_rows() > 0) return TRUE;
			break;
			default:return FALSE;
		}
    }
	
	function get_Notif($me,$limit)
    {
        $query = $this->db->where('user_id',$me)->order_by('date','DESC')->get('bildirimler',$limit);
        return $query->result_array();
    }
	
	public function lau($u)
    {
        $this->db->where('user_id',$u)->update('uyeler',array('last_activity'=>date('Y-m-d H:i:s')));
        if($this->db->affected_rows() > 0){
            return TRUE;
        }
        return FALSE;
    }
	
    public function read($u)
    {
        $this->db->where('user_id',$u)->update('bildirimler',array('read'=>1));
        if($this->db->affected_rows() > 0){
            return TRUE;
        }
        return FALSE;
    }
	
    function update($data){
        $query = $this->db->where('user_id',$_SESSION['user_id'])->update('uyeler',$data);
        if($query > 0){
            return TRUE;
        }
        return FALSE;
    }
}