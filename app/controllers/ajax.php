<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax extends MY_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model(array('series_model','episode_model','activity_model','general_model'));
    }
    public function index()
    {
        if(!$this->input->is_ajax_request()) redirect('404', 'refresh');
		$data = $this->_data;
		$result = array();
        if(!isset($_SESSION['login'])){
			if($this->input->post('type'))
			{
                switch ($this->input->post('type'))
				{
					case "login":
					if(!empty($_POST['username']) && !empty($_POST['password']))
					{
						$this->db->select('*')->from('uyeler')->where('username',$this->input->post('username'))->where('password',$this->input->post('password'));
						$query = $this->db->get();
						if ($query->num_rows() == 0)
						{
							$result['error'] = 'Kullanıcı adınız veya şifreniz yanlış. Lütfen tekrar deneyin.';
						}else{
							$this->usr->loginControl($this->input->post('username'),$this->input->post('password'));
							$result['error'] = false;
						}
					}else $result['error'] = 'Tüm alanları doldurup tekrar deneyin.';
					break;
					case "register":
					if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['gender']))
					{
						$data=array(
							'username'=>$this->input->post('username'),
							'email'=>$this->input->post('email'),
							'password'=>$this->input->post('password'),
							'gender'=>$this->input->post('gender'),
							'create_date'=>date('Y-m-d H:i:s')
						);
						if ($this->db->insert('uyeler',$data)) {
							$result['success'] = '<div class="popup-success"><strong>Üyeliğiniz başarıyla oluşturuldu ve son 1 adım kaldı.</strong>E-posta adresinize gelen bilgiler ile hesabınızı onaylayın ve dizilab in tadını çıkarmaya başlayın!</div>';
						}
					}else $result['error'] = 'Tüm alanları doldurup tekrar deneyin.';
					break;
					case "contact":
					$data = array(
						'who'=>$this->input->post('name').'|'.$this->input->post('email'),
						'type'=>$this->input->post('types'),
						'message'=>$this->input->post('text'),
						'date'=>date('Y-m-d H:i:s')
    				);
					if(!$this->input->post('name') || !$this->input->post('email') || $this->input->post('types') == 0 || !$this->input->post('text')) $result['error'] = 'xx';
					if($this->input->post('name') && $this->input->post('email') && !$this->input->post('types') == 0 && $this->input->post('text')) $this->general_model->contact($data);
					if($data) {
						$result['success'] = 'Teşekkürler, mesajın bize ulaştı. En kısa zamanda dönüş yapacağız.';
					}else{
						$result['error'] = 'xx';
					}
					break;
					case "lost_password":
					$result['error'] = 'Girdiğiniz e-posta hatalı görünüyor, kontrol edin!';
					break;
					case "new_password":
					$result['success'] = 'Gönderildi.';
					break;
                }
            }
		}elseif(isset($_SESSION['login']))
		{
            if($this->input->post('id') && $this->input->post('type'))
			{
                switch ($this->input->post('type')) {
                    case "watched":
                    if(!$this->user_model->watched($_SESSION['user_id'],$this->input->post('id'))){ # === FALSE
					   $data = array(
                           'user_id'=>$_SESSION['user_id'],
                           'target_id'=>$this->input->post('id'),
                           'min'=>$this->series_model->get_Duration($this->input->post('id')),
                           'date'=>date("Y-m-d H:i:s")
					   );
					   $izlendi = $this->activity_model->_add($data,'watch');
					   if($izlendi)
					   {
						    $data = array(
							'user_id'=>$_SESSION['user_id'],
							'user_data'=>'{"username":"'.$_SESSION['username'].'"}',
							'target_data'=>$this->episode_model->getEpisodeById($this->input->post('id')),
							'target_type'=>3,
							'date'=>date("Y-m-d H:i:s")
							);
							$this->activity_model->add_Activity($data);	
					   }
					   $result['success'] = 'Bu bölüm izledikleriniz arasına eklendi :)';
				    }
					break;
                    case "series_like":
                    if($this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'done',3)){
						$result['error'] = 'Beğenmediğin bölümü birden beğenmeye mi karar verdin yani? Dostum bu yeni sen, sen değilsin..';
				    }elseif($this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'done',2)){
						$result['error'] = 'Bu bölümü zaten beğendin. Tamam, anladık çok beğendin.';
				    }else{
						$data = array(
							'user_id'=>$_SESSION['user_id'],
							'target_id'=>$this->input->post('id'),
							'type'=>2,
							'wall'=>1,
							'date'=>date("Y-m-d H:i:s")
						);
						$liked = $this->activity_model->_add($data,'done');
						$liked_ep = $this->episode_model->_Activity($this->input->post('id'),'like_ep');
						/*
						if($liked && $liked_ep)
						{
							$data = array(
								'user_id'	=>	$_SESSION['user_id'],
								'user_data'   =>  '{"username":"'.$_SESSION['username'].'"}',
								'target_data'	=>	$this->episode_model->getEpisodeById($this->input->post('id')),
								'target_type'	=>	2,
								'date' => date("Y-m-d H:i:s")
							);
							$this->activity_model->add_Activity($data);
						}
						*/
				    }
                    break;
                    case "series_dislike":
                    if($this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'done',2)){# === TRUE
						$result['error'] = 'Bu diziyi daha önce beğendiğin için artık kararını değiştiremezsin. Beğendin dostum, kabul et artık bunu.';
				    }elseif($this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'done',3)){# === TRUE
						$result['error'] = 'Tamam dostum, anladık. Beğenmedin bu bölümü, ısrar etme artık. Dislike manyağı yaptın bölümü, yazıktır günahtır.';
				    }else{
						$data = array(
							'user_id'=>$_SESSION['user_id'],
        				    'target_id'=>$this->input->post('id'),
        				    'type'=>3,
        				    'wall'=>1,
        				    'date'=>date("Y-m-d H:i:s")
    				    );
						$this->activity_model->_add($data,'done');
						$this->episode_model->_Activity($this->input->post('id'),'dislike_ep');
				    }
                    break;
                    case "comment_like":
                    if($this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'my_comment')){
						$result['error'] = 'Kendi yorumunuzu değerlendiremezsiniz.';
					}elseif($this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'done',6)){
						$result['error'] = 'Bu yorumu zaten beğendin, teşekkürler ilgi ve alakan için.';
					}elseif($this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'done',7)){# === TRUE
						$result['error'] = 'Bu yorumu daha önce beğenmediğin için şimdide beğenmene biz izin vermiyoruz. Bir karar alırsın ve sonuçlarına katlanırsın bro.';
					}else{
						$data = array(
							'user_id'=>$_SESSION['user_id'],
							'target_id'=>$this->input->post('id'),
							'type'=>6,
							'wall'=>1,
							'date'=>date("Y-m-d H:i:s")
						);
						$this->activity_model->_add($data,'done');
						$this->episode_model->_Activity($this->input->post('id'),'like_comment');
					}
                    break;
                    case "comment_dislike":
                    if($this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'my_comment')){
						$result['error'] = 'Kendi yorumunuzu değerlendiremezsiniz.';
					}elseif($this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'done',6)){
						$result['error'] = 'Bu yorumu daha önce beğendiğin için şimdi kararından vazcayamazsın bro.';
					}elseif($this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'done',7)){
						$result['error'] = 'Bu yorumu daha önce beğenmediğini dile getirmişsin, bence artık daha fazla basma. Parmaklarına yazık.';
					}else{
						$data = array(
							'user_id'=>$_SESSION['user_id'],
							'target_id'=>$this->input->post('id'),
							'type'=>7,
							'wall'=>1,
							'date'=>date("Y-m-d H:i:s")
						);
						$this->activity_model->_add($data,'done');
						$this->episode_model->_Activity($this->input->post('id'),'dislike_comment');
					}
                    break;
                    case "add_to_my_watch":
                    if($this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'watched',null)){# === TRUE
						$this->activity_model->_del($_SESSION['user_id'],$this->input->post('id'),'watch');
					}elseif(!$this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'watched')){ # === FALSE
						$data = array(
							'user_id'=>$_SESSION['user_id'],
							'target_id'=>$this->input->post('id'),
							'min'=>$this->series_model->get_Duration($this->input->post('id')),
							'date'=>date("Y-m-d H:i:s")
						);
						$this->activity_model->_add($data,'watch');
					}
                    break;
                    case "add_watch_later":
                    if(!$this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'watch_later',null)){# === FALSE
						$data = array(
							'user_id'=>$_SESSION['user_id'],
							'ep_id'=>$this->input->post('id'),
							'date'=>date("Y-m-d H:i:s")
						);
						$this->activity_model->_add($data,'watch_later');
						$result['success'] = 'Bu bölüm daha sonra izlemek için kayıt edildi.';
					}else $result['error'] = 'Bu diziyi izleyeceklerim listesine eklemişsin zaten. Kendini bu kadar fazla yorma dostum.';
                    break;
					case "remove_watch_later":
                    if($this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'watch_later',null)){
						$this->activity_model->_del($_SESSION['user_id'],$this->input->post('id'),'watch_later');
						/*
						$data = array(
							'user_id'=>$_SESSION['user_id'],
							'target_id'=>$this->input->post('id'),
							'type'=>4,
							'wall'=>1,
							'date'=>date("Y-m-d H:i:s")
						);
						$this->activity_model->_add($data,'watch_later');*/
						$result['success'] = 'Bu bölümü izleyeceklerim listesinden sildik. :)';
					}else $result['error'] = 'Bu bölümü izleyeceklerim listesine eklememişsin zaten.';
                    break;
                    case "follow":
                    if(!$this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'follow',null)){
						$data = array(
							'user1'=>$_SESSION['user_id'],
							'user2'=>$this->input->post('id'),
							'date_added'=>date("Y-m-d H:i:s")
						);
						$likedw = $this->activity_model->_add($data,'follow_User');
						$usr = $this->user_model->get_usernames($this->input->post('id'));
						/*
						if($likedw)
						{
							$data = array(
								'user_id'	=>	$_SESSION['user_id'],
								'user_data'   =>  '{"username":"'.$_SESSION['username'].'"}',
								'target_data'	=>	'{"username":"'.$usr['username'].'"}',
								'target_type'	=>	1,
								'date' => date("Y-m-d H:i:s")
							);
							$this->activity_model->add_Activity($data);
						}
						*/
					}
                    break;
                    case "series_follow":
					if(!$this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'series_follow',null)){
						$data = array(
							'user_id'=>$_SESSION['user_id'],
							'show_id'=>$this->input->post('id'),
							'date'=>date("Y-m-d H:i:s")
						);
						$this->activity_model->_add($data,'follow_Series');
					}
                    break;
					case "artist_fan_add":
					if(!$this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'artist_fan',null)){
						$data = array(
							'user_id'=>$_SESSION['user_id'],
							'show_id'=>$this->input->post('id'),
							'date'=>date("Y-m-d H:i:s")
						);
						$this->activity_model->_add($data,'follow_Series');
					}
                    break;
					case "artist_fan_remove":
					if($this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'artist_fan',null)) $this->activity_model->_del($_SESSION['user_id'],$this->input->post('id'),'artist_Fan');
                    break;
					case "series_unfollow":
					if($this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'series_follow',null)) $this->activity_model->_del($_SESSION['user_id'],$this->input->post('id'),'follow_Series');
                    break;
					case "unfollow":
					if($this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'follow',null)) $this->activity_model->_del($_SESSION['user_id'],$this->input->post('id'),'follow_User');
                    break;
					case "seriesVote":
					if($this->user_model->_Ctrl($_SESSION['user_id'],$this->input->post('id'),'seriesVote',null)){
						$result['error'] = 'Zaten <strong>* saniye önce</strong> bu dizi için 10 üzerinden <strong>*</strong> puan vermişsin.';
					}else{
						$data = array(
							'user_id'=>$_SESSION['user_id'],
							'series_id'=>$this->input->post('id'),
							'vote'=>$this->input->post('vote'),
							'date'=>date("Y-m-d H:i:s")
						);
						$gitti = $this->activity_model->_add($data,'seriesVote');
						if($gitti) $result['success'] = 'Diziyi oyladığınız için teşekkürler.';
					}
                    break;
                    #default: break;
                }
            }
			
			if($this->input->post('yorum') && $this->input->post('type') == 'addcomment'){
				if(!empty($_POST['yorum'])){
				$data = array(
        			'user_id'=>$_SESSION['user_id'],
        			'target_id'=>$_SESSION['epis_id'],
        			'content'=>$this->input->post('yorum'),
        			'spoiler'=>$this->input->post('spoiler'),
        			'tarih'=>date("Y-m-d H:i:s")
    			);
    			
    			$yorum_gitti = $this->activity_model->_add($data,'comment');
				$result['data'] = '<div class="comment" id="yorum" style="">
                                    <span style="">
                                        <img class="avatar" src="'.avatar($_SESSION['user_id']).'" alt=""/>
                                        <div class="c-text">
                                            <div class="c-top">
                                                <a style="" target="_blank" href="/uye/'.$_SESSION['username'].'" data-id="'.$_SESSION['user_id'].'" data-user="'.$_SESSION['username'].'">'.$_SESSION['username'].'</a>
                                                <span class="date"><span>•</span> şimdi</span>
                                            </div>
                                            <p style="display: block">'.$this->input->post('yorum').'</p>
                                            <div class="c-alt">
                                                <a href="javascript:;" onclick="openSubcommentForm(, this)" class="open-subcomment">Yanıtla</a> |
                                                <span class="like" onclick="comment_like()">
                                                    <abbr id="like_">0</abbr>
                                                    <span class="fa fa-thumbs-up"></span>
                                                </span>
                                                <span class="dislike" onclick="comment_dislike()">
                                                    <abbr id="dislike_">0</abbr>
                                                    <span class="fa fa-thumbs-down"></span>
                                                </span>
                                            </div>
                                        </span>
                                        <div id="comment_content_" style="position: relative">
                                            <div class="form-loader"></div>
                                            <div id="comments"></div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>';
                }else $result['error'] = 'aa';
			}
			
			if($this->input->post('yorum') && $this->input->post('type') == 'artist_addcomment'){}
			
			if($this->input->post('yorum') && $this->input->post('type') == 'series_addcomment'){
				if(!empty($_POST['yorum'])){
				$data = array(
        			'user_id'=>$_SESSION['user_id'],
        			'target_id'=>$_SESSION['series_id'],
        			'content'=>$this->input->post('yorum'),
					'type'=>1,
        			'spoiler'=>$this->input->post('spoiler'),
        			'tarih'=>date("Y-m-d H:i:s")
    			);
				$yorum_gitti = $this->activity_model->_add($data,'comment');
				if($yorum_gitti) $result['data'] = '
				<div class="comment" id="yorum369823" style="">
				<span style="">
				<img class="avatar" src="'.avatar($_SESSION['user_id']).'" alt=""/>
				<div class="c-text">
				<div class="c-top">
				<a style="" target="_blank" href="/uye/'.$_SESSION['username'].'" data-id="'.$_SESSION['user_id'].'" data-user="'.$_SESSION['username'].'"> '.$_SESSION['username'].' </a>
				<span class="date">
				<span>•</span> şimdi </span>
				</div>
				<div class="spoiler-text" style="display: none">Bu yorum dizi hakkında spoiler içermektedir. <span>Okumak istiyorsanız tıklayın.</span></div>
				<p style="display: block"> '.$this->input->post('yorum').' </p>
				<div class="c-alt">
				<span class="like" onclick="comment_like(369823)">
				<abbr id="like_369823">0</abbr>
				<span class="fa fa-thumbs-up"></span>
				</span>
				<span class="dislike" onclick="comment_dislike(369823)">
				<abbr id="dislike_369823">0</abbr>
				<span class="fa fa-thumbs-down"></span>
				</span>
				</div>
				</div>
				<div class="clear"></div></div>';
                }else $result['error'] = 'aa';
			}
		}
		if($this->input->post('yorum') && $this->input->post('type') == 'forum_addcomment'){}

		if($this->input->post('type'))
		{
            switch ($this->input->post('type'))
			{
                case "read_notification":
				$result['text'] = $this->user_model->read($_SESSION['user_id']);
                break;
					case "update_profile":
					$data = array(
        				'adsoyad'=>$this->input->post('uye_adsoyad'),
        				'konum'=>$this->input->post('uye_adsoyad'),
        				'info'=>$this->input->post('uye_hakkinda'),
        				'facebook'=>$this->input->post('uye_facebook_url'),
        				'twitter'=>$this->input->post('uye_twitter_url')
    				);
					$this->user_model->update($data);
					$result['success'] = 'Profil bilgileriniz güncellendi.';
					break;
					case "new_added":
					break;
					case "last_watched":
					break;
					case "followed_series":
					break;
					case "contact":
					$data = array(
						'who'=>$_SESSION['user_id'],
        				#'name'=>$this->input->post('name'),
        				#'email'=>$this->input->post('email'),
						'type'=>$this->input->post('types'),
						'message'=>$this->input->post('text'),
						'date'=>date('Y-m-d H:i:s')
    				);
					if($this->input->post('types') == 0 || !$this->input->post('text')) $result['error'] = 'err';
					if(!$this->input->post('types') == 0 && $this->input->post('text')) $this->general_model->contact($data);
					if($data) $result['success'] = 'Teşekkürler, mesajın bize ulaştı. En kısa zamanda dönüş yapacağız.';
					break;
					case "season_watch":
					if($this->input->post('season') && $this->input->post('series_url')){
						if($this->series_model->get_EpontheSeason($this->input->post('season'),$this->input->post('series_url'))){
							$result['success'] = 'succ';
						}else{
							$result['error'] = 'err';
						}
					}
					break;
            }
        }
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
}