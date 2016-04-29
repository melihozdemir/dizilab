<div class="forum-head">
<a href="<?=base_url('forum')?>">
<img data-load-image="http://dizilab.com/upload/series/ _thumb.png?v=5.8" src="./Forum_dizilab_files/mr-robot_thumb.png" alt="" class="forum-logo">
</a>
 
<h1>xxx <span style="color: rgba(255,255,255,.3)">tartışma forumu</span></h1>
<div class="footer-alt-menu">
<ul>
<li>
<span>TOPLAM KONU</span>
114 </li>
<li>
<span>TOPLAM MESAJ</span>
687 </li>
</ul>
</div>
</div>
<div class="right-inner" style="padding: 15px 28px">
 
<h3 class="title">
<span class="blue big-font">mr. robot tartışma forumları.</span>
</h3>
<div class="topic-sort">
<a class="new-thread" href="http://dizilab.com/mr-robot/forum/yeni">
<span class="fa fa-plus-square"></span>
yeni başlık aç
</a>
</div>
<ul class="topics">
<? foreach($forum as $val):?>
<li>
<a href="/<?=$val['permalink']?>/forum/<?=$val['link']?>-<?=$val['id']?>">
<img data-load-image="<?=avatar($val['member'])?>?v=1450717687" src="" alt="">
<span class="topic-content">
<span class="comment-count">
1 </span>
<span class="title">
<?=$val['name']?> </span>
<span class="description">
<?=$val['content']?> </span>
<span class="alt" style="position: relative">
<img data-load-image="<?=avatar($val['member'])?>?v=1450717687" src="" alt="" style="position: absolute;top: -16px;left: -45px;width: 30px;height: 30px;">
Son mesaj <strong>fraksiyon</strong> tarafından <span><?=ago(strtotime($val['date']));?></span> gönderildi.
</span>
</span>
</a>
</li>
<? endforeach ?>
</ul>
 
<div class="pagination space">
<ul class="pagination"><li><a href="http://dizilab.com/mr-robot/forum?sayfa=1">İlk Sayfa</a></li><li class="active"><a href="http://dizilab.com/mr-robot/forum?sayfa=1">1</a></li><li class=""><a href="http://dizilab.com/mr-robot/forum?sayfa=2">2</a></li><li class=""><a href="http://dizilab.com/mr-robot/forum?sayfa=3">3</a></li><li class=""><a href="http://dizilab.com/mr-robot/forum?sayfa=4">4</a></li><li class=""><a href="http://dizilab.com/mr-robot/forum?sayfa=5">5</a></li><li class=""><a href="http://dizilab.com/mr-robot/forum?sayfa=6">6</a></li><li><a href="http://dizilab.com/mr-robot/forum?sayfa=11">Son Sayfa</a></li></ul> </div>
</div>
<div class="clear"></div>
</div>