<?php
function title()
{
	return 'dizilab.';
}
function description()
{
	return 'Sevdiğiniz tüm yabancı dizileri tek bir platform üzerinden sosyal olarak izlemenize ve takip etmenize olanak sağlar.';
}
$dizilab_mod = FALSE; # TRUE: Aktif | FALSE: Deaktif
function rand_mesaj()
{
    $val = array();
    #-Person of Interest
    $val[] = '"sevdiğin işi yaparsan hayatın boyunca bir gün bile çalışmış hissetmezsin." -person of interest';
    #-Leyla ile Mecnun
    $val[] = '"herkes biraz yalnızdır... en zenginin bile fakirliğidir yalnızlık... -leyla ile mecnun';
    #-The Walking Dead
    $val[] = '"birinin hayatına öylece girip, onlar için değerli bir hale gelip, sonra da çekip gidemezsin öylece." -the walking dead';
    #-Lost
    $val[] = '"bir lider nereye gittiğini bilmeden, önderlik edemez." -lost';
    echo $val[rand(0,count($val)-1)];
}
function ago($time){
    $periods = array('saniye', 'dakika', 'saat', 'gün', 'hafta', 'ay', 'yıl', 'yıl');
    $lengths = array("60","60","24","7","4.35","12","10");

    $now = time();
    $difference = $now-$time;

    for($j=0;$difference>=$lengths[$j]&&$j<count($lengths)-1;$j++){$difference/=$lengths[$j];}
    $difference = round($difference);

    return $difference." ".$periods[$j]." önce";
}
function assets_url($source) { return base_url('template/assets/'.$source); }
function bolum_url($var1,$var2,$var3) { return base_url($var1.'/sezon-'.$var2.'/bolum-'.$var3); }
if(!$dizilab_mod)
{
    function thumb($source) { return empty($source)?'http://placehold.it/55x55&text=mdxyz':base_url('upload/series/'.$source.'_thumb.png?v=6.4'); }
    function cover($source) { return empty($source)?'http://placehold.it/230x350&text=mdxyz':base_url('upload/series/'.$source.'_cover.png?v=6.4'); }
	function casta($source) { return empty($source)?'http://placehold.it/230x350&text=mdxyz':base_url('upload/actor/'.$source.'.png'); }
}
else
{
    function thumb($source) { return 'http://dizilab.com/upload/series/'.$source.'_thumb.png?v=6.4'; }
    function cover($source) { return 'http://dizilab.com/upload/series/'.$source.'_cover.png?v=6.4'; }
	function casta($source) { return base_url('upload/actor/'.$source.'.png'); }
}
function img_loader() { return base_url('template/assets/images/transparent.png'); }
function avatar($x) 
{
    if(file_exists('C:/xampp/htdocs/upload/avatar/'.$x.'_avatar.png'))
    {
        $source = base_url('upload/avatar/'.$x.'_avatar.png?v=1431713273');
    }
	else
	{
        $source = base_url('template/assets/images/default-avatar.png?v=1');
    }
    return $source;
}
function tag_sirala($source,$x=0,$y=0,$z=0) 
{
    #count($source)
    foreach(explode('|',$source) as $tag) {
        $z++;
        if($z!=$x) {
            $degisken = $tag.', ';
        }else $degisken = $tag;
        if($y < $x){
            echo $degisken;
            $y++;
        }
    }
}
function uye_takip($x,$y,$z) 
{
    if($x != $y){
        if(!$z){
            $cevap = '<a class="follow-btn" href="javascript:;" onclick="follow('.$y.',this)" style="position: relative; left: 15px; top: -3px; "><span class="fa fa-check" style="margin-right: 7px"></span>Takip Et</a>';
        }else $cevap = '<a class="follow-btn" href="javascript:;" onclick="unfollow('.$y.',this)" style="position: relative; left: 15px; top: -3px; "><span class="fa fa-check" style="margin-right: 7px"></span>Takip Ediliyor</a>';
    }else $cevap = null;
    return $cevap;
}

function dizi_takip($x,$y,$z) 
{
    if(!$z){
        $cevap = '<a class="follow-btn" href="javascript:;" onclick="series_follow('.$y.', this)"><span class="fa fa-plus"></span>Abone Ol</a>';
    }else $cevap = '<a class="follow-btn" href="javascript:;" onclick="series_unfollow('.$y.', this)"><span class="fa fa-plus"></span>Aboneliği İptal Et</a>';
    return $cevap;
}

function last_watched($source)
{
    foreach ($source as $val) 
	{
        echo '<li id="9039">
		<a href="'.bolum_url($val['permalink'],$val['season'],$val['episode']).'">
		<img data-load-image="'.thumb($val['permalink']).'" src="'.img_loader().'" alt="">
		<span class="title">'.$val['title'].'</span>
		<span class="alt-title">'.$val['season'].'. sezon '.$val['episode'].'. bölüm</span>
		</a>
		</li>';
    }
}
function user_url($source, $gender ='m') 
{ 
    if(empty($source)){
        return ($gender=='m') ? base_url().'uploads/users/men.png':base_url().'uploads/users/women.png';
    }
    else{
        return base_url().'assets/pictures/'.$source;
    }
}
function score_calculate($score, $total_score)
{
    if($total_score == 0) return 0;
    return substr(($score/$total_score) * 100, 0, 5);
}

function date_tr($f, $zt = 'now'){
    $z = date("$f", strtotime($zt));
    $donustur = array(
        'Monday'    => 'Pazartesi',
        'Tuesday'   => 'Salı',
        'Wednesday' => 'Çarşamba',
        'Thursday'  => 'Perşembe',
        'Friday'    => 'Cuma',
        'Saturday'  => 'Cumartesi',
        'Sunday'    => 'Pazar',
        'January'   => 'Ocak',
        'February'  => 'Şubat',
        'March'     => 'Mart',
        'April'     => 'Nisan',
        'May'       => 'Mayıs',
        'June'      => 'Haziran',
        'July'      => 'Temmuz',
        'August'    => 'Ağustos',
        'September' => 'Eylül',
        'October'   => 'Ekim',
        'November'  => 'Kasım',
        'December'  => 'Aralık',
        'Mon'       => 'Pts',
        'Tue'       => 'Sal',
        'Wed'       => 'Çar',
        'Thu'       => 'Per',
        'Fri'       => 'Cum',
        'Sat'       => 'Cts',
        'Sun'       => 'Paz',
        'Jan'       => 'Oca',
        'Feb'       => 'Şub',
        'Mar'       => 'Mar',
        'Apr'       => 'Nis',
        'Jun'       => 'Haz',
        'Jul'       => 'Tem',
        'Aug'       => 'Ağu',
        'Sep'       => 'Eyl',
        'Oct'       => 'Eki',
        'Nov'       => 'Kas',
        'Dec'       => 'Ara',
    );
    foreach($donustur as $en => $tr){
        $z = str_replace($en, $tr, $z);
    }
    if(strpos($z, 'Mayıs') !== false && strpos($f, 'F') === false) $z = str_replace('Mayıs', 'May', $z);
    return $z;
}

function is_serialized( $data ) {
    if ( !is_string( $data ) )
        return false;
    $data = trim( $data );
    if ( 'N;' == $data )
        return true;
    if ( !preg_match( '/^([adObis]):/', $data, $badions ) )
        return false;
    switch ( $badions[1] ) {
        case 'a' :
        case 'O' :
        case 's' :
            if ( preg_match( "/^{$badions[1]}:[0-9]+:.*[;}]\$/s", $data ) )
                return true;
            break;
        case 'b' :
        case 'i' :
        case 'd' :
            if ( preg_match( "/^{$badions[1]}:[0-9.E-]+;\$/", $data ) )
                return true;
            break;
    }
    return false;
}

function insertCookie($cookie_name, $value){
    $CI =& get_instance();
    if($prev_data  = $CI->input->cookie($cookie_name)){
        $prev_data = unserialize($prev_data);
        //exist any prev cookie
        if(!in_array($value, $prev_data)){
            $cookie_data = serialize(array_merge($prev_data, array($value)));
        }
        else{
            $cookie_data = serialize($prev_data);
        }
    }
    else{
        $cookie_data = serialize(array($value));
    }

    $cookie = array(
        'name'   => $cookie_name,
        'value'  => $cookie_data,
        'expire' => time() + 60 * 60 * 24 * 30
    );
    $CI->input->set_cookie($cookie); 
}

function existCookie($cookie_name, $value){
    $CI =& get_instance();
    $cookie = $CI->input->cookie($cookie_name);
    if(!empty($cookie) && is_serialized($cookie)){
        if(in_array($value, unserialize($cookie))){
            return TRUE;
        }
    }
    return FALSE;
}

function br2nl( $input ) {
    return preg_replace('/<br(\s+)?\/?>|<p(?:\s+[^>]*)?>|<\/p>/i', "\n", $input);
}

function meta_clean($str){
    return str_replace('"',"'",$str);
}
function pre($data,$exit=FALSE)
{

    echo '<pre>';
    print_r($data);
    echo '</pre>';
    if($exit==TRUE)
        exit(0);
}
function watched_list($target_id=0,$wathced_list=array()){
    $list = array();
    if(!empty($wathced_list)){
        foreach($wathced_list as $w_list){
            $list[] = $w_list['target_id'];
        }
    }
    if(in_array($target_id,$list)){
        return ' active';
    }
    else{
        return null;
    }
}
	function generateRandomString($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++)
		{
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		
		return $randomString;
	}
	
	function BBCode($deger)
	{
		$bul = array(
			'/\[b\](.*?)\[\/b\]/is',
			'/\[i\](.*?)\[\/i\]/is',
			'/\[center\](.*?)\[\/center\]/is',
			'/\[color\=(.*?)\](.*?)\[\/color\]/is',
			'/\[img\](.*?)\[\/img\]/is',
		);
		
		$degistir = array(
			'<strong>$1</strong>',
			'<em>$1</em>',
			'<div style="text-align: center;">$1</div>',
			'<span style="color: $1;">$2</span>',
			'<img src="$1" class="resized" />'
		);
		
		return preg_replace($bul, $degistir, $deger);
	}
	
	function DateDifference($date)
	{
		$time_difference = time() - $date;
		$second          = round( $time_difference );
		$minute          = round( $time_difference/60 );
		$hour            = round( $time_difference/3600 );
		$day             = round( $time_difference/86400 );
		$week            = round( $time_difference/604800 );
		$month           = round( $time_difference/2419200 );
		$year            = round( $time_difference/29030400 );

		if( $second <= 59 ){
			if( $second == 0 ){
				return 'Şimdi';
			}else{
				return $second . ' saniye önce';
			}
		}else if( $minute <= 59 ){
			return $minute . ' dakika önce';
		}else if( $hour <= 23 ){
			return $hour . ' saat önce';
		}else if( $day <= 6 ){
			return $day . ' gün önce';
		}else if( $week <= 3 ){
			return $week . ' hafta önce';
		}else if( $month <= 11 ){
			return $month . ' ay önce';
		}else{
			return $year . ' yıl önce';
		}
	}
	
function whtime($minutes)
{
	$month = floor($minutes / (3600*24*30));
	$day = floor ($minutes / 1440);
	$hour = floor (($minutes - $day * 1440) / 60);
	$min = $minutes - ($day * 1440) - ($hour * 60);
	if(!$min){
		return $out = $min.' dakika';
	}else if($hour){
		return $out = $hour.' saat, '.$min.' dakika';
	}else if($day){
		return $out = $day.' gün, '.$hour.' saat, '.$min.' dakika';
	}else if($month){
		return $out = $month.' ay, '.$day.' gün, '.$hour.' saat, '.$min.' dakika';
	}else $out = 'Henüz yok.';
	return $out;
}



