<?php
class Series_model extends CI_Model 
{
    function get_Series($limit)
	{
		$this->db->select('y.content,d.title,d.permalink,u.username,u.user_id AS usaid')
		->from('yorumlar y')
		->join('diziler d', 'd.id=y.target_id')
		->join('uyeler u','y.user_id=u.user_id');
		#->order_by('y.tarih','desc');
		if($status!=='all')
		{
			$this->db->where('y.type',$status);
		}
		$this->db->order_by('y.tarih','DESC');

		$query = $this->db->get('',$limit);

		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return FALSE;

	}
}