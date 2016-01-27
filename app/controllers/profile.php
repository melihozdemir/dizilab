<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->library('www');
		$this->load->model('profile_model');
	}

	public function user($username = NULL)
	{
		$data = $this->_data;
		$data['user'] = $this->www->get_Member($username);
        if(empty($data['user'])) redirect('404', 'refresh');
		$data['title'] = 'üye - '.$data['user']['username'].' | '.title();
		$data['activity'] = $this->www->get_Stream(5,$data['user']['usaid'],$friends=null);
		$data['last_watched'] = $this->usr->last_activity($data['user']['usaid'],3,1);
		#$data['izledikleri'] = $this->profile_model->_count($data['user']['usaid'],'izlediklerim',null);
		$data['izledikleri'] = $this->user_model->_count($data['user']['usaid'],'watch',null);
		$data['dizi_takip'] = $this->profile_model->_count($data['user']['usaid'],'subscriptions',null);
		$data['uye_takip'] = $this->profile_model->_count($data['user']['usaid'],'follow',null);
		$data['takip_edenler'] = $this->profile_model->_count($data['user']['usaid'],'followers',null);
		$data['yorum_say'] = $this->profile_model->_count($data['user']['usaid'],'comments',null);
		$data['follow_series'] = $this->profile_model->_list($data['user']['usaid'],'follow_series',8);
		$data['follows'] = $this->profile_model->_list($data['user']['usaid'],'follows',8);
		$data['followers'] = $this->profile_model->_list($data['user']['usaid'],'followers',8);
		$data['min'] = $this->user_model->_list($data['user']['usaid'],'watch_time',null);
		if(isset($_SESSION['login'])) $data['takipcim'] = $this->user_model->_Ctrl($data['i']['user_id'],$data['user']['usaid'],'follow');
		$this->display(array('header','pages/profile/user','sidebar','footer'),$data);
	}
	
	public function comments($username = NULL)
	{
        $data = $this->_data;
		$data['user'] = $this->www->get_Member($username);
        if(empty($data['user'])) redirect('404', 'refresh');
		$data['title'] = 'üye - '.$data['user']['username'].' | '.title();
		$data['last_watched'] = $this->usr->last_activity($data['user']['usaid'],3,1);
		$data['izledikleri'] = $this->user_model->_count($data['i']['user_id'],'watch',null);
		$data['dizi_takip'] = $this->profile_model->_count($data['user']['usaid'],'subscriptions',null);
		$data['uye_takip'] = $this->profile_model->_count($data['user']['usaid'],'follow',null);
		$data['takip_edenler'] = $this->profile_model->_count($data['user']['usaid'],'followers',null);
		$data['yorum_say'] = $this->profile_model->_count($data['user']['usaid'],'comments',null);
		$data['follows'] = $this->profile_model->_list($data['user']['usaid'],'follows',8);
		$data['followers'] = $this->profile_model->_list($data['user']['usaid'],'followers',8);
		$data['min'] = $this->user_model->_list($data['user']['usaid'],'watch_time',null);
		$this->display(array('header','pages/profile/comments','sidebar','footer'),$data);
	}
	
	public function cast($name = NULL)
	{
        $data = $this->_data;
		$data['cast'] = $this->www->get_cast($name);
        if(empty($data['cast'])) redirect('404', 'refresh');
		$data['title'] = $data['cast']['name'].' | '.title();
		$data['description'] = $data['cast']['name'].' hakkında, '.$data['cast']['name'].' rol aldığı diziler ve daha fazlası..';
		$this->display(array('header','pages/profile/cast','sidebar','footer'),$data);
	}
}