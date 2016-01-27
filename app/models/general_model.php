<?php
class General_model extends CI_Model 
{
    public function get_News()
	{
    	$query = $this->db->order_by('date_added','DESC')->get('haberler', 3);
    	return $query->result_array();
	}
	
	public function get_top_series()
	{
    	$query = $this->db->order_by('imdb_rating','DESC')->get('diziler', 10);
    	return $query->result_array();
	}
	
	function contact($data)
	{
        $query = $this->db->insert('istekler',$data);
        if($query > 0) return TRUE;
        return FALSE;
    }
	
	function get_last_episodes($day=NULL)
	{
		if($day == 7) $query = $this->db->query('SELECT diziler.title,diziler.permalink,bolumler.episode,bolumler.season,bolumler.subtitle FROM bolumler,diziler WHERE bolumler.show_id=diziler.id AND diziler.type=1 AND YEARWEEK(date_added) = YEARWEEK(CURRENT_DATE)');
		if($day == 14) $query = $this->db->query('SELECT diziler.title,diziler.permalink,bolumler.episode,bolumler.season,bolumler.subtitle FROM bolumler,diziler WHERE bolumler.show_id=diziler.id AND diziler.type=1 AND YEARWEEK(date_added) = YEARWEEK(CURRENT_DATE - INTERVAL 7 DAY)');

		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return FALSE;
	}
	
	public function get_Stream($limit=20,$user_id = null, $friends = array())
    {
		$where = array();
		if ($user_id && is_numeric($user_id)){
			if (count($friends)){
				$friends[] = $user_id;
				foreach($friends as $k => $v){
					$friends[$k] = $this->db->escape_str($v);
				}
				$where[] = "user_id IN (".implode(",",$friends).")";
			} else {
				$where[] = "user_id='".$this->db->escape_str($user_id)."'";
			}
		}
		
		if (count($where)){
			$where = "".implode(" AND ",$where);
		}
		
		
		$query = $this->db->select('*')
				 ->from('aktiviteler')
				 ->where($where)
				 ->order_by('id','DESC')->limit($limit)->get();
		return $query->result_array();
	}
}