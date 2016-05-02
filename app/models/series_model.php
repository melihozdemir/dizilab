<?php
class Series_model extends CI_Model
{
	function get_Series($permalink)
	{
		$query = $this->db
					  ->select('diziler.*,diziler.id AS dizid')
					  ->from('diziler')
					  ->where('type>',0)
					  ->where('permalink',$permalink)
					  ->get('');

		if($query->num_rows() > 0)
		{	
			return $query->result_array();
		}
		return FALSE;
	}
	
	public function _List($id = null,$whichever,$limit = null)
	{
		switch($whichever)
		{
			case 'popular_series':
			$out = $this->db->select('diziler.title,diziler.permalink,diziler.imdb_rating,diziler.tags')
				 ->from('diziler')->where('diziler.type>',0)->where('diziler.imdb_rating >=','8.0')
				 ->order_by('diziler.imdb_rating','DESC')->limit($limit)->get()->result_array();
			break;
			case 'featured_series':
			$out = $this->db->select('diziler.*,diziler.title,diziler.permalink')
				 ->from('diziler')->where('diziler.type>',0)->where('diziler.imdb_rating >=','7.5')
				 ->order_by('rand()')->limit($limit)->get()->result_array();
			break;
			case 'good_episodes':
			$out = $this->db->select('diziler.permalink, diziler.title as showtitle, bolumler.episode, bolumler.season')->from('bolumler,diziler')->where('bolumler.show_id=diziler.id')->where('bolumler.show_id',$id)->order_by('bolumler.liked','DESC')->get('', $limit)->result_array();
			break;
			case 'bad_episodes':
			$out = $this->db->select('diziler.permalink, diziler.title as showtitle, bolumler.episode, bolumler.season')->from('bolumler,diziler')->where('bolumler.show_id=diziler.id')->where('bolumler.show_id',$id)->order_by('bolumler.unliked','DESC')->get('', $limit)->result_array();
			break;
			case 'last_episode':
			$out = $this->db->select('diziler.permalink, bolumler.episode, bolumler.season, bolumler.description, bolumler.date_added')->from('bolumler,diziler')->where('bolumler.show_id=diziler.id')->where('bolumler.show_id',$id)->order_by('bolumler.date_added','DESC')->get('', $limit)->result_array();
			break;
			case 'casts':
			$out = $this->db->select('oyuncular.*')->where('series',$id)->order_by('name','ASC')->get('oyuncular', $limit)->result_array();
			break;
		}
		return $out;
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
			case 'episodes':
			$out = $this->db->select('episode')->from('bolumler')->where('show_id',$show_id)->get('')->num_rows();
			break;
			case 'followers':
			$out = $this->db->where('show_id',$show_id)->get('abonelikler')->num_rows();
			break;
		}
		return $out;
	}
	
	function get_episodes($category_id){
		$query = $this->db->select('bolumler.id AS epid,bolumler.season,bolumler.episode,bolumler.description,bolumler.date_added')
				->from('bolumler')
				->where('bolumler.show_id',$category_id)
				->get('');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return FALSE;
	}
	
	public function comments($id){
    	$query = $this->db->select('yorumlar.id AS comment_id,yorumlar.content,yorumlar.liked,yorumlar.unliked,yorumlar.spoiler,yorumlar.tarih,uyeler.user_id,uyeler.username')->from('yorumlar,uyeler')
		->where('yorumlar.target_id',$id)
		->where('yorumlar.user_id=uyeler.user_id')
		->where('yorumlar.type',1)
		->order_by('yorumlar.tarih','DESC')
		->get();
        return $query->result_array();
    }
	
	public function nofcomm($show_id)
	{
		return $this->db->select('target_id')->from('yorumlar')->where('target_id',$show_id)->where('type',1)->get('')->num_rows();
	}
	
	public function get_Forums($perma){

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
	
	public function get_Duration($id)
	{
		$query = $this->db->select('diziler.min')->from('bolumler,diziler')->where('bolumler.show_id=diziler.id')->where('bolumler.id',$id)->get()->row_array();
		return; $query['min'];
	}
	public function get_EpontheSeason($series,$season)
	{
		return $this->db->select('bolumler.id')
				->where('show_id',$series)
				->where('season',$season)
				->get('bolumler')->result_array();
	}
}