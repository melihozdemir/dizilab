<div class="dashboard-head">
<ul class="user-social" style="float: right; padding: 25px">
<?if(!empty($user['facebook'])):?>
                        <li style="float: left; margin-left: 10px;"><a style="font-size: 25px; color: #eee" target="_blank" href="https://facebook.com/<?=$user['facebook']?>"><span class="fa fa-facebook"></span></a></li>
                        <?endif;?>
                        <?if(!empty($user['twitter'])):?>
                        <li style="float: left; margin-left: 10px;"><a style="font-size: 25px; color: #eee" target="_blank" href="https://twitter.com/<?=$user['twitter']?>"><span class="fa fa-twitter"></span></a></li>
                        <?endif;?>
</ul>
<h1 class="username">
<?=$user['username']?>
<span class="fa fa-male" style="font-size: 22px; color: #373F42;"></span>
</h1>
<div class="last-watch" style="position: absolute; left: 160px; top: 65px; font-size: 12px; color: #adb3b6; width: 728px;">
<?if($last_watched):?>En son <?foreach ($last_watched as $val):?><a href="/<?=$val['target_data']['perma']?>/sezon-<?=$val['target_data']['season']?>/bolum-<?=$val['target_data']['episode']?>" style="color: #b8a676"><?=$val['target_data']['title']?></a>, <?=$val['target_data']['season']?>. sezon, <?=$val['target_data']['episode']?>. bölümünü izledi.<span style="padding-left: 20px; color: #485053; font-style: oblique"></span><?endforeach?><?else:?>Henüz hiçbirşey izlememiş.<?endif;?>
</div>
<img class="image" data-load-image="<?=avatar($user['usaid'])?>" src="<?=img_loader()?>" alt="">
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
<div class="user-profile-right dashboard-left" style="float: right; width: 585px; padding-right: 0; margin-top: 0; border-right: none;">
<div class="social-timeline">
<ul class="tline-tab" style="padding-top: 0; width: 342px;">
<li class="active" style="width: 114px">
<a href="#">Bölüm yorumları</a>
</li>
<li class="" style="width: 114px;">
<a href="/uye/finngriffcoll/yorumlar?tip=dizi" style="border-right: none; border-left: none; border-radius: 0">Dizi yorumları</a>
</li>
<li class="" style="width: 114px">
<a href="/uye/finngriffcoll/yorumlar?tip=forum">Forum yorumları</a>
</li>
</ul>
</div>
<h3 class="title">
<span class="orange"><?=$user['username']?>'un yorumları</span>
</h3>
<div class="user-messages">
<ul>
<li>
<a href="http://dizilab.com/fear-the-walking-dead/sezon-1/bolum-2">
<span class="image">
<img src="./yorumlari_dizilab_files/fear-the-walking-dead_thumb.png" alt="">
</span>
<span class="m-content">
<p>@Ece_Nefsgldi, ban kalkmış krdş hayırlı olsun</p>
<span class="alt">
4 ay önce - <span>Fear the Walking Dead</span> 1. sezon 2. bölümü için yazdı.
</span>
</span>
</a>
</li>
<li>
<a href="http://dizilab.com/mr-robot/sezon-1/bolum-7">
<span class="image">
<img src="./yorumlari_dizilab_files/mr-robot_thumb.png" alt="">
</span>
<span class="m-content">
<p>@DeanStiles, vay amg biz olsak direkt banlanmıştık maximillian admin hesabı sanırım</p>
<span class="alt">
5 ay önce - <span>Mr. Robot</span> 1. sezon 7. bölümü için yazdı.
</span>
</span>
</a>
</li>
<li>
<a href="http://dizilab.com/the-last-ship/sezon-2/bolum-1">
<span class="image">
<img src="./yorumlari_dizilab_files/the-last-ship_thumb.png" alt="">
</span>
<span class="m-content">
<p>@tardis06, saqin ol saqin ol sinirlerine haqim ol</p>
<span class="alt">
7 ay önce - <span>The Last Ship</span> 2. sezon 1. bölümü için yazdı.
</span>
</span>
</a>
</li>
<li>
<a href="http://dizilab.com/dark-matter/sezon-1/bolum-2">
<span class="image">
<img src="./yorumlari_dizilab_files/dark-matter_thumb.png" alt="">
</span>
<span class="m-content">
<p>mamma mia</p>
<span class="alt">
7 ay önce - <span>Dark Matter</span> 1. sezon 2. bölümü için yazdı.
</span>
</span>
</a>
</li>
<li>
<a href="http://dizilab.com/game-of-thrones/sezon-5/bolum-10">
<span class="image">
<img src="./yorumlari_dizilab_files/game-of-thrones_thumb.png" alt="">
</span>
<span class="m-content">
<p>Sonraki sezonu en çok Khaleesi ve Tyrion için bekliyorum. Umarım bölümün son sahnesi kalıcı değildir /</p>
<span class="alt">
7 ay önce - <span>Game of Thrones</span> 5. sezon 10. bölümü için yazdı.
</span>
</span>
</a>
</li>
<li>
<a href="http://dizilab.com/humans/sezon-1/bolum-1">
<span class="image">
<img src="./yorumlari_dizilab_files/humans_thumb.png" alt="">
</span>
<span class="m-content">
<p>@Turuncu, krdş bebeler işte ne beklion</p>
<span class="alt">
7 ay önce - <span>Humans</span> 1. sezon 1. bölümü için yazdı.
</span>
</span>
</a>
</li>
<li>
<a href="http://dizilab.com/dark-matter/sezon-1/bolum-1">
<span class="image">
<img src="./yorumlari_dizilab_files/dark-matter_thumb.png" alt="">
</span>
<span class="m-content">
<p>iyi gibi hadi hayırlısı</p>
<span class="alt">
7 ay önce - <span>Dark Matter</span> 1. sezon 1. bölümü için yazdı.
</span>
</span>
</a>
</li>
<li>
<a href="http://dizilab.com/izombie/sezon-1/bolum-13">
<span class="image">
<img src="./yorumlari_dizilab_files/izombie_thumb.png" alt="">
</span>
<span class="m-content">
<p>@TheConqueror, k</p>
<span class="alt">
7 ay önce - <span>iZombie</span> 1. sezon 13. bölümü için yazdı.
</span>
</span>
</a>
</li>
<li>
<a href="http://dizilab.com/arrow/sezon-2/bolum-14">
<span class="image">
<img src="./yorumlari_dizilab_files/arrow_thumb.png" alt="">
</span>
<span class="m-content">
<p>wowowowowow</p>
<span class="alt">
8 ay önce - <span>Arrow</span> 2. sezon 14. bölümü için yazdı.
</span>
</span>
</a>
</li>
<li>
<a href="http://dizilab.com/arrow/sezon-2/bolum-10">
<span class="image">
<img src="./yorumlari_dizilab_files/arrow_thumb.png" alt="">
</span>
<span class="m-content">
<p>sebastian monroe geldi aklıma :d</p>
<span class="alt">
8 ay önce - <span>Arrow</span> 2. sezon 10. bölümü için yazdı.
</span>
</span>
</a>
</li>
</ul>
<div class="pagination">
<ul class="pagination"><li class="active"><a href="http://dizilab.com/uye/finngriffcoll/yorumlar?sayfa=1&amp;tip=">1</a></li><li class=""><a href="http://dizilab.com/uye/finngriffcoll/yorumlar?sayfa=2&amp;tip=">2</a></li><li class=""><a href="http://dizilab.com/uye/finngriffcoll/yorumlar?sayfa=3&amp;tip=">3</a></li><li class=""><a href="http://dizilab.com/uye/finngriffcoll/yorumlar?sayfa=4&amp;tip=">4</a></li></ul> </div>
<style type="text/css">.pagination{padding-top:10px;}.pagination ul li a{padding:0 10px!important;}</style>
</div>
</div>
<div class="user-profile-left">
<h3 class="title">
<span class="blue">Laboratuvar Analizi</span>
</h3>
<ul class="user-about">
<?if(!empty($user['info'])):?><li><span>Hakkında</span><?=$user['info']?></li><?endif;?>
<li><span>Kayıt Tarihi</span><?=ago(strtotime($user['create_date']));?></li>
<li><span>Dizi İzleme Süresi</span><?=whtime($min['min'])?></li>
</ul>
<h3 class="title">
<span>Takip Ettikleri (<?=number_format($uye_takip)?>)</span>
</h3>
<ul class="user-fav-list">
<?if($follows):
                            foreach($follows as $val):?>
                            <li>
                                <a title="<?=$val['username']?>" href="/uye/<?=$val['username']?>"><img data-load-image="<?=avatar($val['user_id'])?>" src="<?=img_loader()?>" alt=""></a>
                            </li>
                            <?endforeach?>
                            <li class="more"><a href="#"><span><span class="fa fa-ellipsis-h"></span></span></a></li>
                            <?else:?>
                            <div style="padding-top: 5px; font-size: 14px; color: #999">
                                Takip edilen kimse yok.
                            </div>
                            <?endif;?>
</ul>
<h3 class="title">
<span class="orange">Takipçileri (<?=number_format($takip_edenler)?>)</span>
</h3>
<ul class="user-fav-list">
<?if($followers):
                            foreach($followers as $val):?>
                            <li>
                                <a title="<?=$val['username']?>" href="/uye/<?=$val['username']?>"><img data-load-image="<?=avatar($val['user_id'])?>" src="<?=img_loader()?>" alt=""></a>
                            </li>
                            <?endforeach?>
                            <li class="more"><a href="#"><span><span class="fa fa-ellipsis-h"></span></span></a></li>
                            <?else:?>
                            <div style="padding-top: 5px; font-size: 14px; color: #999">
                                Takip eden kimse yok.
                            </div>
                            <?endif;?>
</ul>
</div>
</div>
<div class="clear"></div>
</div>