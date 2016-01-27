<?php

class Frm
{
    protected $CI = null;
    function __construct()
    {
    	$this->CI = &get_instance();
    }
    
    public function get_Forum($permalink)
    {
        if ($data = $this->CI->forum_model->get_Forum($permalink)) {
            $det1 = $data[0];
            return $det1;
        }
        return false;
    }
	public function get_Topic($is_at,$thix,$that)
    {
        if ($data = $this->CI->forum_model->get_Topic($is_at,$thix,$that)) {
            $det1 = $data[0];
            return $det1;
        }
        return false;
    }
}
