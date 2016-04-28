                <div class="dashboard-head">
                    <h1 class="username" style="padding-top: 17px"><?=$i['username']?> <span class="fa fa-star"></span></h1><img class="image" data-load-image="<?=avatar($i['user_id'])?>" src="<?=avatar($i['user_id'])?>" alt="">
                    <div class="alt">
                        <ul>
                            <li>TAKİP ETTİĞİ DİZİLER<span><?=number_format($dizi_takip)?></span></li>
                            <li>İZLEDİĞİ BÖLÜMLER<span><?=number_format($izledikleri)?></span></li>
                            <li><a href="/uye/root/yorumlar" style="color: #6a7889">YORUMLARI<span><?=number_format($yorum_say)?></span></a></li>
                            <li>TAKİP ETTİKLERİ<span><?=number_format($uye_takip)?></span></li>
                            <li>TAKİP EDENLER<span><?=number_format($takip_edenler)?></span></li>
                        </ul>
                    </div>
                </div>
                <div class="dashboard-inner">
                    <h3 class="title"><span class="big-font">dizi izleme geçmişi.</span></h3>
					<?if($last_watched):?>
                    <ul class="watch-list">
                        <li class="title"><span>&nbsp;</span><span>DİZİ ADI</span><span>SON İZLENİLEN BÖLÜM</span><span>İZLENME ZAMANI</span><span>DEVAM ET</span></li>
                        <?php foreach ($last_watched as $val): ?>
                        <li><span><img data-load-image="<?=thumb($val['permalink'])?>" src="<?=img_loader()?>" alt=""></span><span><a href="/<?=$val['permalink']?>"><span class="series-name"><?=$val['title']?></span><span class="series-detail">IMDB: <?=$val['imdb_rating']?>/10 - <?=$val['year_started']?></span></a>
                            </span><span><a href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><span class="chapter"><?=$val['season']?>. sezon <?=$val['episode']?>. bölüm</span></a>
                            </span><span><span class="time"><?=$val['tarih']?></span></span><span><a href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>?islem=sonraki_bolum">İzlemeye devam et</a></span></li>
                        <?php endforeach ?>
                    </ul>
					<?else:?>
					<div style="color: #999; padding: 15px; text-align: center; line-height: 22px; font-size: 14px;">
					Henüz hiçbir şey izlememişsin. <br>Yolunda gitmeyen bir şeyler mi var?
					</div>
					<?endif;?>
                    <div class="pagination" style="margin-top: -15px;">
						<!--
                        <ul class="pagination">
                            <li><a href="/pano/son-izlediklerim?sayfa=1">İlk Sayfa</a></li>
                            <li class="active"><a href="/pano/son-izlediklerim?sayfa=1">1</a></li>
                            <li class=""><a href="/pano/son-izlediklerim?sayfa=2">2</a></li>
                            <li><a href="/pano/son-izlediklerim?sayfa=122">Son Sayfa</a></li>
                        </ul>
						-->
                    </div>
                </div>
                <div class="clear"></div>
            </div>