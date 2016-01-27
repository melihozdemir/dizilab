            <!-- footer -->
            <div class="footer">
			
            <div class="disclaimer">
            <br><p>sitemizde yer alan tüm diziler “<a href="#">video paylaşım siteleri</a>” aracılığıyla paylaşılmaktadır. f kendi sunucularında herhangi bir video içeriği barındırmadığından bu konuda bir telif hakkı sorumluluğu kabul etmemektedir.</p>
                <p>“halkın kendisine hizmet etmesi için görevlendirdiği kurumlar hadlerini aşıp halka neye izleyip izlemeyeceğini bilmeyen cahil cühela muamelesi edemezler. web siteleri kullanıcıların istekleri doğrultusunda bağlandıkları yerlerdir." -ekşi sözlük</p>
            </div>
            <!-- logo -->
            <div class="footer-logo"><!--<a href="" class="logo-dark">dizilab</a>-->
				<a href="#" class="logo-dark">dizilab</a>
			</div>
            <!-- bottom -->
                  <div class="bottom">
                  <ul>
                        <li><a href="">yabancı dizi izle</a></li>
                        <!--<li><a href="#">HAKKIMIZDA</a></li><li><a href="#">YASAL UYARI</a></li>-->
                        <li><a href="/{elapsed_time}" target="_blank">imdb dizileri</a></li>
                        <li class="feedback"><a href="" target="_blank">geri bildirim</a></li>
                        <li><a href="" target="_blank">bağış yap</a></li>
                        <li><a href="">reklam/iletişim</a></li>
                  </ul>
                  <p>© 2014-2015 <a href="#">dizilab</a>. tüm hakları mahfuzdur ve mahfuz acı verir. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
            </div>
      </div>
</div>
</div>
<script>var url = "<?=base_url();?>", request_url = url + 'request/php/', VERSION = 6.4;</script>
	<script src="<?=base_url('compress_js?v=6.4');?>"></script>
	<script src="<?=assets_url('plugins/jquery.modal/jquery.modal.min.js');?>"></script>
	<script src="<?=assets_url('plugins/spectrum/spectrum.js');?>"></script>
	<link rel="stylesheet" href="<?=assets_url('plugins/jquery.modal/jquery.modal.css');?>"/>
<script>

    $(document).ready(function(){
        var total = $('[data-load-image]').length,
            current = 0;
        function load_image(eq){
            $('[data-load-image]:eq(' + eq + ')').attr('src', $('[data-load-image]:eq(' + eq + ')').data('load-image')).load(function(){
                 if ( current < total )
                    current += 1;
                    load_image(current);
            }).error(function(){
                if ( current < total )
                    current += 1;
                load_image(current);
            });
        }
        load_image(current);
		$(window).on('resize', function(){
			console.log( $(this).width() < 1280 );
			if ( $(this).width() < 1280 ){
				$('a.banner').css('background-image', 'url(http://savoy.storage.cubecdn.net/ps/dizilab/page.jpg)');
			} else {
				$('a.banner').css('background-image', 'url(http://savoy.storage.cubecdn.net/ps/dizilab/page.jpg)');
			}
		});
		if ( $(window).width() < 1280 ){
			$('a.banner').css('background-image', 'url(http://savoy.storage.cubecdn.net/ps/dizilab/page.jpg)');
		} else {
			$('a.banner').css('background-image', 'url(http://savoy.storage.cubecdn.net/ps/dizilab/page.jpg)');
		}
        /*
        $('[data-load-image]').each(function(){
            var image = $(this).data('load-image');
            $(this).attr('src', image);
        });
        */
    });

    today_watchs('.rating-tab-container', 'e');

</script>
</body>
</html>
<?php if(@$controller == 'series'):?>
<script>
    var height = $('.tv-series-story >div').height(),
        inner_height = $('.tv-series-story >div >div').height();

    if ( inner_height < height ){
        $('.read-more').remove();
    }
    $('.read-more').on('click', function(e){
        $(this).remove();
        $('.tv-series-story >div').animate({
            height: inner_height + 'px'
        }, 1000);
        e.preventDefault();
    });

    var last = $('.tv-series-episodes:last ul li:last');
    var season = last.find('>span:eq(1)').text();
    var chapter = last.find('>span:eq(2)').text();
    var chapter_name = last.find('>span:eq(3)').text();
    var date = last.find('>span:eq(4)').text();
    var url = last.find('a').attr('href');

    $('#season').text(season);	$('#chapter').text(chapter);
    $('#episode-name').text(chapter_name);
    $('#date').text('(' + date + ')');
    $('.tv-series-last-episode').attr('href', url);
	
    if ( season == '' ){
        $('.tv-series-last-episode').hide();
    }
</script>
<?php endif;?>