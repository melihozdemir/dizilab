<div class="right-inner" style="padding: 15px 28px">
 
<h3 class="title" style="margin-top: 15px">
<span class="blue big-font">dizilab. tartışma forumları.</span>
</h3>
<div class="topic-sort">
 
</div>
<ul class="topics">
<? foreach($forum as $val):?>
<a href="<?=$val['permalink']?>/forum">
<img class="forum-series-image" src="<?=thumb($val['permalink'])?>" alt="">
<span class="forum-title"><?=$val['title']?></span>
</a>
<li>
<a href="<?=$val['permalink']?>/forum/<?=$val['link']?>-<?=$val['id']?>">
<img src="<?=avatar($val['member'])?>" alt="">
<span class="topic-content">
<span class="comment-count">
1 </span>
<span class="title">
<?=$val['name']?> <span class="forum-time"><?=ago(strtotime($val['date']));?></span>
</span>
<span class="description">
<?=$val['content']?> </span>
<span class="alt" style="position: relative">
<img src="<?=avatar(1)?>" alt="" style="position: absolute;top: -16px;left: -45px;width: 30px;height: 30px;">
Son mesaj <strong>selen14</strong> tarafından <span><?=ago(strtotime($val['date']));?></span> gönderildi.
</span>
</span>
</a>
</li>
<? endforeach ?>
</ul>
<style>.forum-series-image{float:left;height:15px;margin-right:10px;}.forum-title{display:block;font-size:11px;color:rgba(255,255,255,.4);padding-bottom:7px;line-height:15px;}.forum-time{font-size:12px;color:rgba(255,255,255,.3);padding-left:15px;border-left:1px solid rgba(255,255,255,.1);margin-left:15px;font-weight:normal;}</style>
 
<div class="pagination space">
<ul class="pagination"><li><a href="forum?sayfa=1">İlk Sayfa</a></li><li class="active"><a href="forum?sayfa=1">1</a></li><li class=""><a href="forum?sayfa=2">2</a></li><li class=""><a href="forum?sayfa=3">3</a></li><li class=""><a href="forum?sayfa=4">4</a></li><li class=""><a href="forum?sayfa=5">5</a></li><li class=""><a href="forum?sayfa=6">6</a></li><li><a href="forum?sayfa=395">Son Sayfa</a></li></ul> </div>
</div>
<div class="clear"></div>
</div>
 