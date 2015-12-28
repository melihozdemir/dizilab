<?php
class Forum_model extends CI_Model 
{
	function get_all($limit)
	{
		$query = $this->db
					  ->select('diziler.permalink,diziler.title,forum_konular.*')
					  ->from('diziler,forum_konular')
					  ->where('forum_konular.series=diziler.id')
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
		->select('diziler.permalink,diziler.title,forum_konular.*')
		->from('diziler,forum_konular')
		->where('diziler.permalink',$thix)
		->where('forum_konular.series=diziler.id')
		->order_by('date','DESC')
		->get('',$limit);
        return $query->result_array();
    }
	function get_topic($dizi,$konu,$id)
    {
        $query = $this->db
		->select('diziler.permalink,diziler.title,forum_konular.*')
		->from('diziler,forum_konular')
			->where('diziler.permalink',$dizi)
			->where('forum_konular.link',$konu)
			->where('forum_konular.id',$id)
			->where('forum_konular.series=diziler.id')
		->get('');
        return $query->result_array();
    }
}