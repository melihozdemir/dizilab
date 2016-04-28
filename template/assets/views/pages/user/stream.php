<div class="dashboard-head">
    <h1 class="username" style="padding-top: 17px"><?=$i['username']?> <span class="fa fa-star"></span></h1><img class="image" data-load-image="<?=avatar($i['user_id'])?>" src="<?=img_loader()?>" alt="">
    <div class="alt">
        <ul>
            <li>TAKİP ETTİĞİN DİZİLER<span><?=number_format($dizi_takip)?></span></li>
            <li>İZLEDİĞİN BÖLÜMLER<span><?=number_format($izledikleri)?></span></li>
            <li>YORUMLARIN<span><?=number_format($yorum_say)?></span></li>
            <li>TAKİP ETTİKLERİN<span><?=number_format($uye_takip)?></span></li>
            <li>TAKİP EDENLER<span><?=number_format($takip_edenler)?></span></li>
        </ul>
    </div>
</div>
<div class="dashboard-inner">
    <div class="social-timeline">
        <h3 class="title"><span class="blue big-font">dizilab. sosyal akışın</span></h3>
        <ul class="timeline" style="margin-top: 20px"><span class="line"></span>
            <?foreach ($activity as $val):?>
            <li id="2114294">
                <a href="/uye/<?=$val['user_data']['username']?>"><img data-load-image="<?=avatar($val['user_id'])?>" src="<?=avatar($val['user_id'])?>" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="/uye/<?=$val['user_data']['username']?>"><strong><?=$val['user_data']['username']?></strong></a>, <a href="http://dizilab.com/supernatural/sezon-2/bolum-7">Supernatural</a> 2. sezon, 7. bölümü izliyor.</span></span><span class="date">16 dakika önce</span></span>
            </li>
            <?endforeach?>
        </ul>
    </div>
    <div class="submit-btn empty" onclick="load_social()" style="margin-top: 25px;">
        <button type="submit">Daha fazlasını göster.</button>
    </div>
</div>
<div class="clear"></div>
</div>