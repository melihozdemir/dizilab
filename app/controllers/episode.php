<?php
class Episode extends MY_Controller
{
	public function __construct()
	{
        parent::__construct();
        $this->load->model('episode_model');
		$this->load->library('ep');
    }

    function index($permalink,$season,$episode)
    {       
        $data = $this->_data;
        $data['ep'] = $this->ep->get_Episode($permalink,$season,$episode);
        if(empty($data['ep'])) redirect('404', 'refresh');
        $data['title'] = $data['ep']['title'].' '.$data['ep']['season'].'. Sezon '.$data['ep']['episode'].'. Bölüm İzle | '.title();
		
		#$data['seasons'] = $this->series_model->get_seasons($permalink);
        #$data['episodes'] = $this->ep->get_epsodes($permalink,&$data['seasons'],'xyz',$season);
		
        $this->session->set_userdata('epis_id', $data['ep']['id']);
        $data['next_ep'] = $this->episode_model->_Episode($permalink,$season,$episode,'next');
        $data['prev_ep'] = $this->episode_model->_Episode($permalink,$season,$episode,'prev');
		$data['seasons'] = $this->episode_model->_count($data['ep']['show_id'],'seasons','yazdir');
		$data['episodes'] = $this->ep->get_episodes($data['ep']['show_id'],$data['seasons']);
        $data['yorumlar'] = $this->episode_model->Comments($data['ep']['id']);
        $data['yorum_sayisi'] = $this->episode_model->nofcomm($data['ep']['id']);
		$data['forums'] = $this->episode_model->get_Forums($permalink);
		if (!$this->agent->is_mobile()) {
			$this->display(array('header','pages/episode','footer'),$data);
		}else{
			$this->display(array('mobile_header','pages/mobile_episode','mobile_footer'),$data);
		}
    }
}