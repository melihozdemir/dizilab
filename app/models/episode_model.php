<?php
class Episode_model extends CI_Model
{
	function get_Episode($permalink,$season,$episode)
	{
		$query = $this->db->select('diziler.permalink,diziler.title,bolumler.*')
					  ->from('diziler,bolumler')
					  ->where('diziler.type>',0)
					  ->where('bolumler.show_id=diziler.id')
					  ->where('diziler.permalink',$permalink)
					  ->where('bolumler.season',$season)
					  ->where('bolumler.episode',$episode)
					  ->get('');

		if($query->num_rows() > 0)
		{	
			return $query->result_array();
		}
		return FALSE;
	}
	
	public function getEpisodeById($id){
    	$query = $this->db->select('bolumler.season,bolumler.episode,diziler.title,diziler.permalink AS perma')
				 ->from('bolumler,diziler')
				 ->where('bolumler.show_id=diziler.id')
				 ->where('bolumler.id',$id)->get();
    	    $ep = array();
			$ep = $query->row_array();
		//	$ep = array();
			extract($ep);
        return $ep;
    }
	
	function _Episode($permalink,$season,$episode,$whichever)
	{
		switch($whichever)
		{
			case 'next':
			$query = $this->db->select('diziler.permalink,bolumler.season,bolumler.episode')->from('diziler,bolumler')
        	->where('bolumler.season',$season)->where('bolumler.episode>',$episode)->or_where('bolumler.season>',$season)->where('bolumler.episode<',$episode)
        	->where('bolumler.season',$season)->where('diziler.permalink',$permalink)->where('bolumler.show_id=diziler.id')
        	->order_by('bolumler.season','ASC')->order_by('bolumler.episode','ASC')->get('', 1);
			break;
			case 'prev':
			$query = $this->db->select('diziler.permalink,bolumler.season,bolumler.episode')->from('diziler,bolumler')
        	->where('bolumler.season',$season)->where('bolumler.episode<',$episode)->or_where('bolumler.season<',$season)->where('bolumler.episode>',$episode)
        	->where('bolumler.season',$season)->where('diziler.permalink',$permalink)->where('bolumler.show_id=diziler.id')
        	->order_by('bolumler.season','DESC')->order_by('bolumler.episode','DESC')->get('', 1);
			break;
			default:return FALSE;
		}
        if($query->num_rows() > 0){
			return $query->result_array();
		}
		return FALSE;
    }
	
	function _Activity($id,$type)
	{
		switch($type)
		{
			case 'view_ep':
			$this->db->set('views','views +1',FALSE)->where('id',$id)->update('bolumler');
			if($this->db->affected_rows() > 0) return TRUE;
			break;
			case 'like_ep':
			$this->db->set('liked','liked +1',FALSE)->where('id',$id)->update('bolumler');
			if($this->db->affected_rows() > 0) return TRUE;
			break;
			case 'dislike_ep':
			$this->db->set('unliked','unliked +1',FALSE)->where('id',$id)->update('bolumler');
			if($this->db->affected_rows() > 0) return TRUE;
			break;
			case 'like_comment':
			$this->db->set('liked','liked +1',FALSE)->where('id',$id)->update('yorumlar');
			if($this->db->affected_rows() > 0) return TRUE;
			break;
			case 'dislike_comment':
			$this->db->set('unliked','unliked +1',FALSE)->where('id',$id)->update('yorumlar');
			if($this->db->affected_rows() > 0) return TRUE;
			break;
			default:return FALSE;
		}
	}
	
	public function comments($id){
    	$query = $this->db->select('yorumlar.*,uyeler.*')->from('yorumlar,uyeler')->where('target_id',$id)->where('yorumlar.user_id=uyeler.user_id')->where('yorumlar.type',0)->order_by('tarih','DESC')->get();
        return $query->result_array();
    }
	
    public function nofcomm($show_id)
	{
		return $this->db->select('target_id')->from('yorumlar')->where('target_id',$show_id)->where('type',0)->get('')->num_rows();
	}
	
	public function _count($show_id,$whichever,$type)
	{
		switch($whichever)
		{
			case 'seasons':
			if($type == 'yazdir')
			{
				$out = $this->db->distinct()->select('id,show_id,season,episode,date_added')->where('show_id',$show_id)->group_by('season')->get('bolumler')->result();
			}
			else
			{
				$out = $this->db->distinct()->select('season')->where('show_id',$show_id)->get('bolumler')->num_rows();
			}
			break;
		}
		return $out;
	}
	
	function get_episodes($category_id){
		$query = $this->db->select('bolumler.id AS video_id,bolumler.season,bolumler.episode,bolumler.description')
				->from('bolumler')
				->where('bolumler.show_id',$category_id)
				->get('');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return FALSE;
	}
	
	public function get_Forums($perma)
	{
		$query = $this->db->select('f.id as forum_id,f.link,f.name,f.date,u.username')
			->from('forumlar f')
			->where('d.permalink',$perma)
			->join('diziler d','f.series=d.id','left')
			->join('uyeler u','u.user_id = f.member','LEFT')
			->get('',5);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return FALSE;  
	}
}