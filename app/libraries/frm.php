<?php

class Frm{
    protected $CI = null;

    function __construct()
    {
    	$this->CI = &get_instance();
    }
    /*
    public function get_forum($permalink)
    {
        if ($data = $this->CI->forum_model->get_forum($permalink)) {
            $det1 = $data[0];
            return $det1;
        }
        return false;
    }*/
	public function get_topic($is_at,$thix,$that)
    {
        if ($data = $this->CI->forum_model->get_topic($is_at,$thix,$that)) {
            $det1 = $data[0];
            return $det1;
        }
        return false;
    }
}


if (!defined( 'BASEPATH' )) {
    exit( 'No direct script access allowed' );
}