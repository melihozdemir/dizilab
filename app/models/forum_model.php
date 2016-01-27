<?php
class Forum_model extends CI_Model 
{
	function get_all($limit)
	{
		$query = $this->db
					  ->select('diziler.permalink,diziler.title,forumlar.*')
					  ->from('diziler,forumlar')
					  ->where('forumlar.series=diziler.id')
					  ->order_by('date','DESC')
					  ->get('');

		if($query->num_rows() > 0)
		{	
			return $query->result_array();
		}
		return FALSE;
	}
	function get_forum($thix,$limit)
    {
        $query = $this->db
		->select('diziler.permalink,diziler.title,forumlar.*')
		->from('diziler,forumlar')
		->where('diziler.permalink',$thix)
		->where('forumlar.series=diziler.id')
		->order_by('date','DESC')
		->get('',$limit);
        return $query->result_array();
    }
	function get_topic($dizi,$konu,$id)
    {
        $query = $this->db
		->select('diziler.permalink,diziler.title,forumlar.*')
		->from('diziler,forumlar')
			->where('diziler.permalink',$dizi)
			->where('forumlar.link',$konu)
			->where('forumlar.id',$id)
			->where('forumlar.series=diziler.id')
		->get('');
        return $query->result_array();
    }
	function get_comments($thix,$limit)
    {
        $query = $this->db
		->select('y.*,u.username,u.user_id AS usaid')
		->from('yorumlar y')
		->where('f.link',$thix)
		#->where('y.type',99)
		->join('forumlar f','f.id=y.target_id','left')
		->join('uyeler u','u.user_id = y.user_id','LEFT')
		->order_by('tarih','DESC')
		->get('',$limit);
			return $query->result_array();
    }
}