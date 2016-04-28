<div class="forum-head">
<a href="<?=base_url($topic['permalink'].'/forum')?>">
<img data-load-image="http://dizilab.com/upload/series/<?=$topic['permalink']?>_thumb.png?v=5.8" src="" alt="" class="forum-logo">
</a>
 
<h1><?=$topic['title']?> <span style="color: rgba(255,255,255,.3)">tartışma forumu</span></h1>
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
 
<div class="breadcrumb">
<a href="<?=base_url('forum')?>">tartışma forumları</a> &gt;
<span><?=$topic['title']?> forum</span>
</div>
<div class="notice">
<div class="icon">
<span></span>
</div>
<a href="<?=base_url('forum')?>">
Tüm Forumlar
</a> &gt;
<a href="<?=base_url($topic['permalink'].'/forum')?>">
<?=$topic['title']?> </a> &gt;
<span><?=$topic['name']?></span>
</div>
<h3 class="title">
<a class="new-thread" href="<?=base_url($topic['permalink'].'/forum/yeni')?>" style="float: right; position: relative; top: -4px;">
yeni konu aç
</a>
<span class="blue big-font">
<?=$topic['name']?> </span>
</h3>
<div style="margin-top: 15px" class="forum-thread-left">
<div class="forum-messages">
<div class="line"></div>
<div class="forum-message">
<div class="image">
<img src="<?=avatar($topic['member'])?>" alt="">
</div>
<div class="message-content">
<div class="top">
<a target="_blank" href="http://dizilab.com/uye/boba-fett">
<?=$topic['member']?> </a>
<span style="float: right">
<?=ago(strtotime($topic['date']));?> </span>
</div>
<p class="spoiler-text" style="line-height: 38px;background-color: #1A1D1F;text-align: center;font-size: 12px;color: #dfe4e6;cursor: pointer; display: block">
Bu yorum dizi hakkında spoiler içermektedir.
<span style="color: #edce7b;text-decoration: underline;">
Okumak istiyorsanız tıklayın.
</span>
</p>
<p style="display: none">
<?=$topic['content']?> </p>
</div>
</div>
<style type="text/css">.message-content a{color:#c1ac87;}.message-content a:hover{text-decoration:underline;}</style>
<div id="comments">
<? foreach($comments as $val):?>
<div class="forum-message ">
<div class="image">
<img src="<?=avatar($val['usaid'])?>" alt="">
</div>
<div class="message-content">
<div class="top">
<a href="http://dizilab.com/uye/fraksiyon"><?=$val['username']?></a> <span style="padding-left: 10px; float: right"> <?=ago(strtotime($val['tarih']));?></span>
</div>
<p class="spoiler-text" style="line-height: 38px; background-color: #1A1D1F; text-align: center; font-size: 12px; color: #dfe4e6; cursor: pointer; display: none">
Bu yorum dizi hakkında spoiler içermektedir. <span style="color: #edce7b;text-decoration: underline;">Okumak istiyorsanız tıklayın.</span>
</p>
<p style="display: block"><?=$val['content']?></p>
<div class="alt">
<div class="alt-right">
<a href="javascript:;" class="like" onclick="comment_like(362391)">
<span class="fa fa-heart" style="font-size: 15px;"></span>
</a>
 
<a href="javascript:;" onclick="comment_complain(362391)">
<span class="fa fa-warning" style="font-size: 15px;"></span> <span style="font-size: 12px; position: relative; top: -1px;">Şikayet Et</span>
</a>
</div>
<span class="like-count"><abbr id="like_362391"><?=$val['liked']?></abbr> beğeni</span>
</div>
</div>
</div>
<? endforeach ?>
</div>
<div class="new-topic-content forum-reply" id="add-comment">
<div id="addcomment">
<div class="loader-ajax"></div>
<div class="formm">
<div class="user-reply">
<? if(isset($i['login'])):?>
<img src="<?=avatar($i['user_id'])?>" alt="">
<? else:?>
<img src="<?=avatar(-1)?>" alt="">
<? endif;?>
</div>
<ul class="form">
<li>
<textarea name="yorum_text" id="" cols="30" rows="10" placeholder="Birşeyler yazın.."></textarea>
<div class="alt">
<button type="submit" onclick="forum_addcomment()">Gönder</button>
 
<label class="cb checkbox2">
<input type="checkbox" name="spoiler" value="1">
Bu başlık bir şey hakkında <em>spoiler</em> içeriyor mu?
</label>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="forum-alt-link" style="border-top: 1px solid rgba(255,255,255,.05); padding-top: 20px">
<a href="<?=base_url($topic['permalink'].'/forum')?>">
<span class="fa fa-mail-reply"></span>
foruma geri dön
</a>
<a href="#" id="page-up">
<span class="fa fa-arrow-up"></span>
en yukarı çık
</a>
</div>
</div>
<div style="margin-top: 15px" class="forum-thread-right">
<h3 class="title">
<span class="orange">konuya abone kullanıcılar</span>
<em class="count-box">1</em>
</h3>
<ul class="user-list">
<li>
<a target="_blank" title="fraksiyon" href="http://dizilab.com/uye/fraksiyon">
<img data-load-image="<?=avatar(-1)?>" src="./dizilabForumkonusu_files/102801_avatar.png" alt="">
</a>
</li>
</ul>
 
</div>
</div>
<div class="clear"></div>
</div>