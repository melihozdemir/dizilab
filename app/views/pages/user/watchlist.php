<div class="dashboard-head">
<h1 class="username" style="padding-top: 17px">
<?=$i['username']?> <span class="fa fa-star"></span>
</h1>
<img class="image" data-load-image="<?=avatar($i['user_id'])?>" src="<?=img_loader()?>" alt="">
<div class="alt">
<ul>
<li>
TAKİP ETTİĞİN DİZİLER
<span><?=number_format($dizi_takip)?></span>
</li>
<li>
İZLEDİĞİN BÖLÜMLER
<span><?=number_format($izledikleri)?></span>
</li>
<li>
YORUMLARIN
<span><?=number_format($yorum_say)?></span>
</li>
<li>
TAKİP ETTİKLERİN
<span><?=number_format($uye_takip)?></span>
</li>
<li>
TAKİP EDENLER
<span><?=number_format($takip_edenler)?></span>
</li>
</ul>
</div>
</div>
<div class="dashboard-inner">
<h3 class="title">
<span class="big-font orange">dizi izleme listesi.</span>
</h3>
<?if($watch_later):?>
<ul class="watch-list">
<li class="title">
<span>&nbsp;</span>
<span style="width: 250px; text-align: left">DİZİ ADI</span>
<span>İZLENECEK BÖLÜM</span>
<span>EKLENME ZAMANI</span>
<span>&nbsp;</span>
</li>
<?foreach($watch_later as $val):?>
<li style="position: relative">
<span>
<img data-load-image="/upload/series/<?=$val['permalink']?>_thumb.png?v=6.4" src="<?=img_loader()?>" alt=""/>
</span>
<span style="width: 250px">
<a href="/<?=$val['permalink']?>">
<span class="series-name"><?=$val['title']?></span>
<span class="series-detail">
IMDB: <?=$val['imdb_rating']?>/10 - <?=$val['year_started']?> </span>
</a>
</span>
<span>
<a href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>">
<span class="chapter"><?=$val['season']?>. sezon <?=$val['episode']?>. bölüm</span>
</a>
</span>
<span>
<span class="time"><?=ago(strtotime($val['date']));?></span>
</span>
<span>
<a style="padding-top: 10px;" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>">Şimdi İzle >></a>
</span>
<span style="width: 50px; text-align: center; line-height: 36px">
<a title="İzleneceklerden kaldır." href="javascript:;" onclick="remove_watch_later(<?=$val['wl_id']?>, this)" style="font-size: 16px; color: #fff">
<span class="fa fa-times"></span>
</a>
</span>
<div class="form-loader"></div>
</li>
<?endforeach?>
</ul>
<?else:?>
<div style="color: #999; padding: 15px; text-align: center; line-height: 22px; font-size: 14px;">
Daha sonra izlemek üzere hiçbir bölümü eklemediniz. <br>Demek ki herşey yolunda gidiyor.
</div>
<?endif;?>
</div>
<div class="clear"></div>
</div>