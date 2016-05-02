<?php
class Series extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->library('srs');
        $this->load->model('series_model');
    }
    function index($permalink = NULL)
    {
        $data = $this->_data;
        if(($data['series'] = $this->srs->get_Series($permalink)) === FALSE) redirect('404', 'refresh');
        $data['title'] = $data['series']['title'].' | '.title();
		$this->session->set_userdata('series_id', $data['series']['dizid']);
		$data['controller'] = 'series';
		$data['latest_episode'] = $this->series_model->_list($data['series']['dizid'],'last_episode',1);
        $data['good_episodes'] = $this->series_model->_list($data['series']['dizid'],'good_episodes',5);
        $data['bad_episodes'] = $this->series_model->_list($data['series']['dizid'],'bad_episodes',5);
		$data['season_count'] = $this->series_model->_count($data['series']['dizid'],'seasons',null);
        $data['episode_count'] = $this->series_model->_count($data['series']['dizid'],'episodes',null);
        $data['subscribers'] = $this->series_model->_count($data['series']['dizid'],'followers',null);
		$data['popular_comments'] = false;
		$data['yorumlar'] = $this->series_model->Comments($data['series']['dizid']);
        $data['yorum_sayisi'] = $this->series_model->nofcomm($data['series']['dizid']);
		$data['casts'] = $this->series_model->_List($data['series']['dizid'],'casts',9);
        #$data['seasons'] = $this->series_model->_count($data['series']['dizid'],'seasons','yazdir');
        #$data['ep_season1'] = $this->series_model->of_the_season($data['series']['dizid'],1); #,2,3.....
        #$data['ep_season2'] = $this->series_model->of_the_season($data['series']['dizid'],2); #		gibi
		$data['seasons'] = $this->series_model->_count($data['series']['dizid'],'seasons','yazdir');
		$data['episodes'] = $this->srs->get_episodes($data['series']['dizid'],$data['seasons']);
		$data['forums'] = $this->series_model->get_Forums($data['series']['permalink']);
        if(isset($_SESSION['login']) == TRUE){
			$data['series_follow'] = $this->user_model->_Ctrl($_SESSION['user_id'],$data['series']['dizid'],'series_follow',null);
			$data['user_watched_list'] = $this->user_model->_list($data['i']['user_id'],'user_watched_list');
		}
		if (!$this->agent->is_mobile()) {
			$this->display(array('header','pages/series','sidebar','footer'),$data);
		}else{
			$this->display(array('mobile_header','pages/mobile_series','mobile_footer'),$data);
		}
    }
}
