<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller 
{
	public function __construct()
    {
        parent::__construct();
		$this->load->library('www');
		$this->load->model('series_model');
    }
    public function index()
	{
		$data = $this->_data;
        if(empty($data['i']['user_id'])) redirect('/', 'refresh');
        $data['title'] = 'Profil | '.title();
        $data['activity'] = $this->www->get_Stream(4,$user_id=null,$friends=null);
        $data['last_watched'] = $this->usr->last_activity($data['i']['user_id'],3,5);
        $data['izledikleri'] = $this->user_model->_count($data['i']['user_id'],'watch',null);
        $data['dizi_takip'] = $this->user_model->_count($data['i']['user_id'],'subscriptions',null);
        $data['uye_takip'] = $this->user_model->_count($data['i']['user_id'],'follow',null);
        $data['takip_edenler'] = $this->user_model->_count($data['i']['user_id'],'followers',null);
        $data['yorum_say'] = $this->user_model->_count($data['i']['user_id'],'comments',null);
		$data['yorumlarin'] = $this->user_model->_count($data['i']['user_id'],'comments','yazdir');
        $data['popular_series'] = $this->series_model->_List(null,'popular_series',$limit = 5);
		$this->display(array('header','pages/user/home','sidebar','footer'),$data);
	}
	public function custom()
	{
		$data = $this->_data;
        if(empty($data['i']['user_id'])) redirect('/', 'refresh');
        $data['title'] = 'Profil | '.title();
		$this->display(array('header','pages/user/custom','sidebar','footer'),$data);
	}
	public function last_watched()
	{
		$data = $this->_data;
        if(empty($data['i']['user_id'])) redirect('/', 'refresh');
        $data['title'] = 'Son İzlediklerim | '.title();
        $data['izledikleri'] = $this->user_model->_count($data['i']['user_id'],'watch',null);
        $data['dizi_takip'] = $this->user_model->_count($data['i']['user_id'],'subscriptions',null);
        $data['uye_takip'] = $this->user_model->_count($data['i']['user_id'],'follow',null);
        $data['takip_edenler'] = $this->user_model->_count($data['i']['user_id'],'followers',null);
        $data['yorum_say'] = $this->user_model->_count($data['i']['user_id'],'comments',null);
        $data['last_watched'] = $this->user_model->_list($data['i']['user_id'],'last_watched',null,null);
		$this->display(array('header','pages/user/watched','sidebar','footer'),$data);
	}
	public function watchlist()
	{
		$data = $this->_data;
        if(empty($data['i']['user_id'])) redirect('/', 'refresh');
        $data['title'] = 'İzleme Listesi | '.title();
        $data['izledikleri'] = $this->user_model->_count($data['i']['user_id'],'watch',null);
        $data['dizi_takip'] = $this->user_model->_count($data['i']['user_id'],'subscriptions',null);
        $data['uye_takip'] = $this->user_model->_count($data['i']['user_id'],'follow',null);
        $data['takip_edenler'] = $this->user_model->_count($data['i']['user_id'],'followers',null);
        $data['yorum_say'] = $this->user_model->_count($data['i']['user_id'],'comments',null);
        $data['watch_later'] = $this->user_model->_list($data['i']['user_id'],'watch_later',null,null);
		$this->display(array('header','pages/user/watchlist','sidebar','footer'),$data);
	}
	public function followed_series()
    {
        $data = $this->_data;
        if(empty($data['i']['user_id'])) redirect('/', 'refresh');
        $data['title'] = 'Takip ettiklerim | '.title();
        $data['izledikleri'] = $this->user_model->_count($data['i']['user_id'],'watch',null);
        $data['dizi_takip'] = $this->user_model->_count($data['i']['user_id'],'subscriptions',null);
        $data['uye_takip'] = $this->user_model->_count($data['i']['user_id'],'follow',null);
        $data['takip_edenler'] = $this->user_model->_count($data['i']['user_id'],'followers',null);
        $data['yorum_say'] = $this->user_model->_count($data['i']['user_id'],'comments',null);
        $data['follow_series'] = $this->user_model->_list($data['i']['user_id'],'follow_series',null,50);
        $this->display(array('header','pages/user/followed','sidebar','footer'),$data);
    }
    public function social_stream()
    {
        $data = $this->_data;
        if(empty($data['i']['user_id'])) redirect('/', 'refresh');
        $data['title'] = 'Sosyal akış | '.title();
        $data['activity'] = $this->www->get_Stream($limit=7,$data['i']['user_id'],$friends=null);
		$data['izledikleri'] = $this->user_model->_count($data['i']['user_id'],'watch',null);
        $data['dizi_takip'] = $this->user_model->_count($data['i']['user_id'],'subscriptions',null);
        $data['uye_takip'] = $this->user_model->_count($data['i']['user_id'],'follow',null);
        $data['takip_edenler'] = $this->user_model->_count($data['i']['user_id'],'followers',null);
        $data['yorum_say'] = $this->user_model->_count($data['i']['user_id'],'comments',null);
        $this->display(array('header','pages/user/stream','sidebar','footer'),$data);
    }
	function logout()
	{
		$redirect_url = ($this->agent->is_referral())?$this->agent->referrer():base_url();
		$this->usr->logout();
		redirect($redirect_url);
	}
}
