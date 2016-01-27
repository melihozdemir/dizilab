<?php

class WWW
{
    protected $CI = null;
    protected $config = null;

    function __construct() 
	{
        $this->CI = &get_instance();
		$this->CI->load->model('general_model');
    }
	
	public function get_Member($username)
    {
        if ($data = $this->CI->profile_model->get_Member($username)) {
            $det1 = $data[0];
            return $det1;
        }
        return false;
    }
	
	public function get_Cast($name)
    {
        if ($data = $this->CI->profile_model->get_Cast($name)) {
            $det1 = $data[0];
            return $det1;
        }
        return false;
    }
	
    public function get_Stream($limit,$user_id,$friends)
    {
        $stream = $this->CI->general_model->get_Stream($limit,$user_id,$friends);
        $array1 = array();
        foreach($stream as $val)
        {
            $val['user_data'] = json_decode($val['user_data'],true);
            $val['target_data'] = json_decode($val['target_data'],true);
            $array1[$val['id']] = $val;
        }
        return $array1;
    }
}