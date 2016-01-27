<?php
class Admin
{
    protected $CI = null;
    public function __construct()
    {
        $this->CI = & get_instance();
    }
	function login($username,$password)
    {
        $this->CI->load->model('admin/auth_model');
    	if($user = $this->CI->auth_model->authorization($username,$password))
    	{
    		$this->CI->session->set_userdata(
				array(
				'admin'=>1,
				'root_id'=>$user->id,
				'root_name'=>$user->username
				)
			);
    		return TRUE;
    	}
    	return FALSE;
    }
}