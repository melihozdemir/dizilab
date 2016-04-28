<a href="javascript:;" id="notification-btn" style="display: none; text-align: center; background: #007790; padding: 10px 0; color: #a4cfd8; font-size: 13px;">
<span class="fa fa-bell" style="margin-right: 6px"></span>
Yeni bölümler eklendiğinde <strong>bildirim</strong> almak için tıklayın!
</a>
<script type="text/rocketscript">
				document.getElementById("notification-btn").addEventListener('click', function(){
					OneSignal.push(["registerForPushNotifications", {modalPrompt: true}]);
				});
			</script>
<div class="right-inner">
 
<div class="tv-series-profile-head">
<div class="tv-series-image" style="position: relative">
<img src="<?=cover($series['permalink'])?>" alt=""/>
<div style="position: absolute; bottom: 12px; left: 11px; width: 194px; line-height: 18px; padding: 10px; text-align: center; background: rgba(0,0,0,.8); font-weight: bold; font-size: 14px;">
<?php if($series['type'] == 1):?><span style="color: rgb(231, 189, 98)">Devam Ediyor</span>
<?php elseif($series['type'] == 2):?><span style="color: rgb(98, 137, 240)">Sezon Finali Yaptı</span>
<?php elseif($series['type'] == 3):?><span style="color: rgb(92, 203, 131)">Final Yaptı</span>
<?php elseif($series['type'] == 4):?><span style="color: rgb(219, 72, 72)">İptal Edildi!</span><?php endif;?></div>
</div>
<div class="tv-series-right-content">
<div class="series-vote">
<span class="total">
?.? <span>1 kişi</span>
</span>
<a class="vote" href="#">
Puan Ver
</a>
</div>
<div class="add-vote">
<div class="vote-form">
<p><?=$series['title']?> dizisi 10 üzerinden kaç puan hak ediyor?</p>
<div class="vote-text">
Puan:
</div>
<div class="vote-select">
<select class="selectbox" name="vote">
<option value="10">10 Puan</option>
<option value="9">9 Puan</option>
<option value="8">8 Puan</option>
<option value="7">7 Puan</option>
<option value="6">6 Puan</option>
<option value="5">5 Puan</option>
<option value="4">4 Puan</option>
<option value="3">3 Puan</option>
<option value="2">2 Puan</option>
<option value="1">1 Puan</option>
</select>
</div>
<a class="vote-btn" href="javascript:;" onclick="<?if(isset($_SESSION['login'])):?>seriesVote(this)<?else:?>alert('Bu işlem için üye girişi yapın.');<?endif;?>" data-series-id="<?=$series['id']?>">
Oyla
</a>
</div>
<div class="success-vote">
<span class="fa fa-check"></span>
Diziyi değerlendirdiğiniz için teşekkürler.
</div>
</div>
<style>.success-vote{display:none;overflow:hidden;color:#cedbdf;font-size:13px;line-height:30px;}.success-vote .fa{color:green;font-size:20px;float:left;position:relative;top:5px;margin-right:6px;}.add-vote{display:none;background:#22282B;padding:12px;border:1px solid rgb(52,60,63);border-radius:3px;margin-bottom:13px;margin-right:90px;overflow:hidden;}.add-vote .vote-text{float:left;line-height:29px;font-size:12px;margin-right:10px;color:#cedbdf;}.add-vote .vote-select{float:left;}.add-vote .vote-select select{width:80px;}.add-vote .vote-btn{float:left;margin-left:10px;line-height:29px;padding:0 10px;font-size:12px;background:green;color:#fff;border-radius:3px;}.add-vote p{font-size:12px;color:#cedbdf;margin-bottom:15px;}.series-vote{position:absolute;top:0;right:0;width:72px;}.series-vote .total span{display:block;font-size:9px;font-weight:normal;opacity:.6;}.series-vote .total{line-height:21px;font-size:18px;font-weight:bold;color:#BEC8CB;background:#444F53;display:block;border-radius:3px 3px 0 0;text-align:center;padding-top:3px;}.series-vote .vote{display:block;line-height:24px;background:green;color:#fff;border-radius:0 0 3px 3px;padding:0 10px;font-size:11px;}</style>
<h3>
<?=$series['title']?> <?if(isset($i['login'])):?><?=dizi_takip($i['user_id'],$series['id'],$series_follow)?><?endif;?>
</h3>
<ul class="tv-series-detail-menu">
<li>
<span class="fa fa-clock-o"></span>
Ortalama <?=$series['min']?> dakika
</li>
<li>
<span class="fa fa-heart"></span>
<?=tag_sirala($series['tags'],$x=2)?> </li>
</ul>
<div class="tv-series-story">
<div style="height: 218px; overflow: hidden">
<div><?=$series['description']?></div>
</div>
<a class="read-more" href="#">
Hikayenin devamını oku
</a>
</div>
</div>
</div>
<div class="clear"></div>
<?if($casts):?>
<div class="series-cast">
<ul>
<?foreach($casts as $val):?>
<li>
<a href="/oyuncu/<?=$val['bermalink']?>">
<img src="/upload/actor/<?=$val['bermalink']?>.png" alt=""/>
<span class="title">
<?=$val['name']?> </span>
<span class="alt-title">
<?=$val['nick']?> </span>
</a>
</li>
<?endforeach?>
</ul>
</div>
<style>.series-cast{background:#1b2022;overflow:hidden;margin-top:-20px;}.series-cast ul{overflow:hidden;}.series-cast ul li{width:11%;float:left;}.series-cast ul li a{display:block;padding:10px;}.series-cast ul li a img{width:100%;opacity:.7;}.series-cast ul li a .title{display:block;font-size:12px;color:#fff;line-height:16px;padding-top:10px;}.series-cast ul li a .alt-title{color:#adb3b6;font-size:11px;display:block;padding-top:3px;}</style>
<?endif;?>
<div class="tv-series-profile-bottom">
<ul>
<li>
<a href="#">
ÜLKE
<span><?=$series['country'];?></span>
</a>
</li>
<li>
<a href="#">
YAPIM YILI
<span><?=$series['year_started']?></span>
</a>
</li>
<li>
<a href="#">
SEZON SAYISI
<span><?=$season_count?></span>
</a>
</li>
<li>
<a href="#">
BÖLÜM SAYISI
<span><?=$episode_count?></span>
</a>
</li>
<li>
<a href="#">
TAKİPÇİLERİ
<span><?=$subscribers?></span>
</a>
</li>
<li>
<a href="#">
IMDB PUANI
<span><?=$series['imdb_rating']?> / 10</span>
</a>
</li>
</ul>
</div>
<div class="detail-right">
<?if($latest_episode):?>
<?foreach($latest_episode as $val):?>
<a class="tv-series-last-episode" href="<?=bolum_url($val['permalink'],$val['season'],$val['episode'])?>">
<img src="<?=thumb($val['permalink'])?>" alt=""/>
<span class="title">Dizinin yayınlanan en son bölümü.</span>
<span class="alt-title">
<font id="season"><?=$val['season']?>. Sezon</font>, <font id="chapter"><?=$val['episode']?>. Bölüm</font> <span id="date">(<?php echo date_tr('d F Y', $val['date_added'])?>)</span>
</span>
<span class="episode-name" id="episode-name"><?php if($val['description'] == ''){echo 'Episode #'.$val['season'].'.'.$val['episode'];}{echo $val['description'];}?></span>
</a>
<?endforeach?>
<?endif;?>
<div class="last-forum-topics">
<h3>Dizinin forumundan son başlıklar</h3>
<?php if($forums):?>
<ul>
<?php foreach($forums as $val):?>
<li>
<a href="<?=base_url($series['permalink'].'/forum/'.$val['link'].'-'.$val['forum_id'])?>">
<span><?=$val['name']?></span>
Yanıt yok/<?=$val['username']?>, <?=ago(strtotime($val['date']));?> </a>
</li>
<?php endforeach?>
</ul>
<?php else:?>
<div style="padding: 10px; font-size: 12px; color: #999; border-bottom: 1px solid rgba(255,255,255,.1); line-height: 18px">Bu dizi için hiç forum konusu bulunmuyor.<br>Sen bir tane <a style="color: #c1ac87; text-decoration: underline" href="/<?=$series['permalink']?>/forum/yeni">oluştur!</a></div>
<?php endif;?>
<a class="topic-more" href="/<?=$series['permalink']?>/forum">
<span>Forumdan diğer başlıklar</span>
5 başlık, mesaj
</a>
</div>

<?if($episode_count>5):?>
<div tab2=""> 
    <div class="most-tab">
        <h3>dizinin en bölümleri.</h3>
        <ul tab2-list="">
            <li class="active"><a href="#">En popüler bölümler</a></li>
            <li><a href="#">En kötü bölümler</a></li>
        </ul>
    </div>
    <div class="most-tab-list style1" tab2-content="" style="display: block;">
        <ul>
            <?php $b=1; foreach ($good_episodes as $val): ?>
            <li><a href="<?=bolum_url($val['permalink'],$val['season'],$val['episode'])?>?ref=populer_tabs"><span class="fa fa-eye"></span><span class="position"><?=$b?></span><span class="info"><img data-load-image="<?=thumb($val['permalink'])?>" src="<?=img_loader()?>" alt=""><span class="title"><?=$val['showtitle']?></span><span class="category">Sezon <?=$val['season']?>, Bölüm <?=$val['episode']?></span></span></a></li>
            <?php $b++; ?>
            <?php endforeach ?>
        </ul>
    </div>
    <div class="most-tab-list style1" tab2-content="" style="display: none;">
        <ul>
            <?php $c=1; foreach ($bad_episodes as $val): ?>
            <li><a href="<?=bolum_url($val['permalink'],$val['season'],$val['episode'])?>?ref=dislike_tabs"><span class="fa fa-eye"></span><span class="position"><?=$c?></span><span class="info"><img data-load-image="<?=thumb($val['permalink'])?>" src="<?=img_loader()?>" alt=""><span class="title"><?=$val['showtitle']?></span><span class="category">Sezon <?=$val['season']?>, Bölüm <?=$val['episode']?></span></span></a></li>
            <?php $c++; ?>
            <?php endforeach ?>
        </ul>
    </div>
</div>
<?endif;?>

</div>
<div class="detail-left">
<div tab>
<?php if($seasons):?>
<div class="tv-series-seasons" tab-list>
<?php $i = 0;
foreach($seasons as $val){?>
<a href="sezon"<?php if($i < 1) { ?> class=" active" <?php } ?>>
<?php echo $val->season;?>. Sezon
</a>
<?php $i++; }?>
</div>
<script>
                $(function(){
                    var tabs = $('.episode-tab .tv-series-episodes');
                    tabs.each(function(){
                        var watchBtn = $('.watch-btn', this),
                            items = $('ul li:not(.title)', this),
                            watchItems = items.filter('.active');
                        if ( items.length == watchItems.length ){
                            watchBtn.addClass('active');
                        }
                    });
                });
            </script>
<style>.watch-btn.active span{background:#d95e40!important;color:#15191a!important;}</style>
<div class="episode-tab">
<?php foreach($seasons as $season){ ?>
<div class="tv-series-episodes" style="border-radius: 5px; overflow: hidden; position:relative;" tab-content>
<div style="position:absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,.7); display: none; color: #fff; text-align: center;" class="episode-loader">
<h3 style="font-size: 20px; font-weight: bold; padding-top: 40px;">Birazcık bekleticem, senin için çalışıyorum şuan....</h3>
</div>
<?php if($episodes[$season->season]):?>
<a href="javascript:;" onclick="season_watch(<?=$season->season?>, '<?=$series['id']?>', this)" style="display: block; padding: 10px 16px; font-size: 13px; color: #96a0a4; background: rgba(0,0,0,.2); line-height: 21px" class="watch-btn">
"<?=$season->season?>. sezonun tüm bölümlerini izledim" olarak işaretle <span class="fa fa-check" style="color: #111; width: 21px; height: 21px; display: inline-block; border-radius: 100%; float: left; text-align: center; line-height: 21px; margin-right: 15px; margin-left: 9px; background: #111; font-size: 16px"></span>
</a>
<ul>
<li class="title">
<span>DURUM</span>
<span>SEZON</span>
<span>BÖLÜM</span>
<span>BÖLÜM ADI</span>
<span>YAYINLANMA TARİHİ</span>
</li>
<?php foreach($episodes[$season->season] as $val){ ?>
<li style="" class="<?=watched_list($val['epid'],$user_watched_list);?>">
<span>
<?php if(isset($_SESSION['login'])): ?>
<span style="cursor: pointer" onclick="add_to_my_watch(<?=$val['epid']?>, this)" class="radius<?=watched_list($val['epid'],$user_watched_list);?>">
<span class="fa fa-check"></span>
</span>
<?php else:?>
<span style="cursor: pointer" onclick="add_to_my_watch(<?=$val['epid']?>, this)" class="radius">
<span class="fa fa-check"></span>
</span>
<?php endif;?>
</span>
<span>
<a class="season" href="/<?=$series['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>">
<?=$val['season']?>. Sezon
</a>
</span>
<span>
<a class="episode" href="/<?=$series['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>">
<?=$val['episode']?>. Bölüm
</a>
</span>
<span>
<a class="episode-name" href="/<?=$series['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>">
<?php if($val['description'] == ''){echo 'Episode #'.$val['season'].'.'.$val['episode'];}{if (strlen($val['description']) > 20) {$detay = substr($val['description'],0,20) . "..";}else{$detay = $val['description'];} echo $detay;}?> </a>
</span>
<span>
<span class="date">
<?=date_tr('d F Y', $val['date_added']);?> </span>
</span>
</li>
<?php } ?>
</ul>
<?else:?>
<div style="padding: 15px; font-size: 13px; color: #999">
Henüz bu sezona ait bölümler eklenmedi. Yakın zamanda arşivimize ekleyeceğiz.
</div>
<?endif;?>
</div>
<?php }?>
</div>
<?else:?>
<div style="padding: 15px; font-size: 13px; color: #999">
Henüz bu diziye ait bölümler eklenmedi. Yakın zamanda arşivimize ekleyeceğiz.
</div>
<?endif;?>
</div>

<div class="add-comment">
<h3>Dizi hakkında ne diyorlar?</h3>
<?if(isset($_SESSION['login'])):?>
<form action="" onsubmit="return false;" id="addcomment">
<div class="loader-ajax"></div>
<div class="formm">
<img src="<?=avatar($i['user_id'])?>" alt=""/>
<div class="add-comment-form">
<div>
<textarea name="yorum_text" id="" cols="30" rows="10" placeholder="Bu dizi hakkındaki düşüncelerinizi paylaşın."></textarea>
<div class="alt">
<button type="submit" onclick="series_addcomment()">Gönder</button>
<label class="cb checkbox2">
<input type="checkbox" name="spoiler" value="1"/> Bu yorum dizi hakkında <strong>bilgi - ipucu - detay</strong> içeriyor mu?
</label>
</div>
</div>
</div>
</div>
</form>
<?else:?>
<div class="no-comment" style="padding-bottom: 1px; font-size: 14px; color: #999">
Yorum yazmak için <u style="cursor: pointer" data-open="#login-form">üye girişi</u> yapmanız gerekiyor.
</div>
<?endif;?>
</div>

<div id="comments">
<div id="yorumlar">
<?if($popular_comments):?>
<h3 class="title">
<span class="blue">Popüler yorumlar (2)</span>
</h3>
<div class="popular-comments">
<div class="comment" id="yorum98812" style=""> <span style=""> <img class="avatar" src="http://dizilab.com/upload/avatar/15_avatar.png?v=1452894812" alt=""/> <div class="c-text"> <div class="c-top"> <a style="" target="_blank" href="http://dizilab.com/uye/erbilen" data-id="15" data-user="erbilen"> erbilen </a> <span class="date"> <span>•</span> 12 ay önce </span> </div> <div class="spoiler-text" style="display: none"> Bu yorum dizi hakkında spoiler içermektedir. <span>Okumak istiyorsanız tıklayın.</span> </div> <p style="display: block"> Efsane bir dizi.. İlk bölümünü izlediğimde devamını getiremeyeceğimi düşünmüştüm ama ilk bölümden sonra öyle bir açıldılar ki, final yapamadığına mı üzülelim, finalin o harika bitişine mi bilemedim.. </p> <div class="c-alt"> <span class="like" onclick="comment_like(98812)"> <abbr id="like_98812">96</abbr> <span class="fa fa-thumbs-up"></span> </span> <span class="dislike" onclick="comment_dislike(98812)"> <abbr id="dislike_98812">26</abbr> <span class="fa fa-thumbs-down"></span> </span> </div> </div> <div class="clear"></div></div><div class="comment" id="yorum156978" style=""> <span style=""> <img class="avatar" src="http://dizilab.com/upload/avatar/77128_avatar.png?v=1452894812" alt=""/> <div class="c-text"> <div class="c-top"> <a style="" target="_blank" href="http://dizilab.com/uye/berkkilicoglu" data-id="77128" data-user="berkkılıçoğlu"> berkkılıçoğlu </a> <span class="date"> <span>•</span> 7 ay önce </span> </div> <div class="spoiler-text" style="display: none"> Bu yorum dizi hakkında spoiler içermektedir. <span>Okumak istiyorsanız tıklayın.</span> </div> <p style="display: block"> Türk dizisi diye ön yargınız varsa izleyin. </p> <div class="c-alt"> <span class="like" onclick="comment_like(156978)"> <abbr id="like_156978">66</abbr> <span class="fa fa-thumbs-up"></span> </span> <span class="dislike" onclick="comment_dislike(156978)"> <abbr id="dislike_156978">1</abbr> <span class="fa fa-thumbs-down"></span> </span> </div> </div> <div class="clear"></div></div> 
</div>
<?endif;?>
<style type="text/css">.popular-comments .comment:last-child{border-bottom:none!important;padding-bottom:10px!important;}</style>
<h3 class="title">
<span class="blue"><?if($popular_comments):?>Diğer <?endif;?><?=$yorum_sayisi?> yorum</span>
</h3>
<?php if($yorumlar):?>
<div class="comments">
<?foreach($yorumlar as $val):?>
<div class="comment<?if($val['spoiler'] == 1):?> spoiler<?endif;?>" id="yorum<?=$val['comment_id']?>" style="">
<span style="">
<img class="avatar" src="<?=avatar($val['user_id'])?>" alt=""/>
<div class="c-text">
<div class="c-top">
<a style="" target="_blank" href="/uye/<?=$val['username']?>" data-id="91356" data-user="<?=$val['username']?>"> <?=$val['username']?> </a>
<span class="date"> <span>•</span> <?=ago(strtotime($val['tarih']));?> </span>
</div>
<div class="spoiler-text" style="display: <?if($val['spoiler'] == 1):?>block<?else:?>none<?endif;?>"> Bu yorum dizi hakkında spoiler içermektedir. <span>Okumak istiyorsanız tıklayın.</span> </div>
<p style="display: <?if($val['spoiler'] == 1):?>none<?else:?>block<?endif;?>"> <?=$val['content']?> </p>
<div class="c-alt">
<span class="like" onclick="comment_like(<?=$val['comment_id']?>)">
<abbr id="like_<?=$val['comment_id']?>"><?=$val['liked']?></abbr>
<span class="fa fa-thumbs-up"></span>
</span>
<span class="dislike" onclick="comment_dislike(<?=$val['comment_id']?>)">
<abbr id="dislike_<?=$val['comment_id']?>"><?=$val['unliked']?></abbr>
<span class="fa fa-thumbs-down"></span>
</span>
</div>
</div>
<div class="clear"></div>
</div>
<?endforeach?>
</div>
<?else:?>
<div class="no-comment" style="padding-bottom: 1px; font-size: 14px; color: #999">
Bu dizi için <u style="cursor: pointer">ilk yorumu</u> siz yazın!
</div>
<?endif;?>
</div>
</div>

<div class="pagination right"><!--
<ul class="pagination">
<li class="active"><a href="/leyla-ile-mecnun?sayfa=1">1</a></li>
<li class=""><a href="/leyla-ile-mecnun?sayfa=2">2</a></li>
</ul>-->
</div>

</div>
</div>
<div class="clear"></div>
</div>
 
