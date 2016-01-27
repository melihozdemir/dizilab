<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('www');
		$this->load->model(array('general_model','series_model'));
	}
	
	function index(){
		#if(isset($_SESSION['user_perm']) < 1) redirect('404', 'refresh');
		#if(!isset($_SESSION['admin'])) redirect('yp/auth', 'refresh');
		$data = $this->_data;
		$data['this_week_eps'] = $this->general_model->get_last_episodes(7);
		$data['last_week_eps'] = $this->general_model->get_last_episodes(14);
		$data['news'] = $this->general_model->get_News();
		$data['activity'] = $this->www->get_Stream($limit=4,$user_id=null,$friends=null);
		$data['popular_series'] = $this->series_model->_list(null,'popular_series',$limit = 5);
		$data['featured_series'] = $this->series_model->_list(null,'featured_series',$limit = 4);
		if (!$this->agent->is_mobile()) {
			$this->display(array('header','pages/home','sidebar','footer'),$data);
		}else{
			$this->display(array('mobile_header','pages/mobile_home','mobile_footer'),$data);
		}
	}
}
