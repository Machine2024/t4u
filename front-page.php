<?php
/**
 * This home page template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Türgev/T4U
 * @since Türgev/T4U 1.0
 */
get_header('frontpage');
?>

<section class="main">
    <div class="latest_acts">
        <div class="">
            <div id="carousel-frontpage" class="carousel slide" data-interval="5000" data-pause="hover"> 
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-frontpage" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-frontpage" data-slide-to="1"></li>
                    <li data-target="#carousel-frontpage" data-slide-to="2"></li>
                    <li data-target="#carousel-frontpage" data-slide-to="1"></li>
                    <li data-target="#carousel-frontpage" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php
                    // WP_Query arguments
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'Published',
                        'category_name' => 'anasayfa',
                        'pagination' => false,
                        'order' => 'ASC',
                        'orderby' => 'date',
                        'numberposts' => -1
                    );

                    // The Query
                    $query = new WP_Query($args);

                    // The Loop
                    if ($query->have_posts()) {
                        $loopvar = 0;
                        while ($query->have_posts()) {

                            $classactive = ($loopvar == 0) ? 'active' : NULL;
                            $query->the_post();

                            $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'post-thumbnails');
                            $image[0] = ($image != false) ? $image[0] : get_template_directory_uri() . "/images/dorm-treenoimage.png";
                            ?>
                            <div class="item <?php echo $classactive; ?>" style="background-image: url('<?php echo $image[0]; ?>')"> <span class="swipe"></span>
                                <div class="news">
                                    <div class="col-xs-8 col-xs-offset-2 col-md-3 carousel-caption">
                                        <h4><a href="<?php the_permalink(); ?>" target="_self"><?php print get_the_title(); ?></a></h4>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $loopvar ++;
                        }
                    } else {
                        // no posts found
                    }

                    // Restore original Post Data

                    wp_reset_postdata();
                    ?>
                </div>

                <!-- Controls --> 
                <a class="left carousel-control" href="#carousel-frontpage" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control" href="#carousel-frontpage" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
        </div>
    </div>
    <div class="milestone visible-sm visible-md visible-lg">
        <div class="main-menu">
            <div class="main-logo"> <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/turgev-logo.png" alt=""/></a> </div>
            <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'turgev-right-menu', 'depth' => 2, 'container' => 'ul')); ?>
            <div class="row btntoslide">
                <div class="btn-bg fa fa-angle-left"></div> <br/>Özetle Türgev
            </div>
            <address class="address">
                <strong>Türgev, Genel Merkez</strong><br>
                Akşemsettin Mah. Albay Cemil Sakarya <br>
                Sokak No: 3/4 Fatih / İSTANBUL<br>
                Tel: +90 212 532 1996 (pbx)<br>
                Faks: +90 212 533 1996<br>
                E-posta: bilgi@turgev.org
            </address>
        </div>
        <div class="milestone-cntnt">
            <div class="col-md-10 col-md-offset-1 bref">TÜRGEV - Türkiye Gençlik ve Eğitime Hizmet Vakfı olarak 1996 yılında ilk yurdumuzu açarak başladığımız hizmet yolculuğuna yurtlarının sayısını artırarak ve eğitimin diğer alanlarında da çalışmalar yaparak devam etmekteyiz.
                <hr>
            </div>
            <div class="col-md-10 col-md-push-1">
                <div class="row">
                    <div class="col-md-4 stats"><span class="nums count1"> </span><br>
                        <span class="unit">Yurt</span><br>
                        Aile sıcaklığında güvenli ve huzurlu yurtlarımız.</div>
                    <div class="col-md-4 stats"><span class="nums count2"> </span><br>
                        <span class="unit">misafirhane</span><br>
                        Tüm imkanlara sahip yurtlarımız Modern mimarisi ve rahat çalışma ortamına sahiptir.</div>
                    <div class="col-md-4 stats"><span class="nums count3"> </span><br>
                        <span class="unit">Öğrenci</span><br>
                        Kuruluşundan bugüne binlerce öğrenciyi ev sahipliği yaptık ve her geçen gün öğrenci sayımız çoğalmakta.</div>
                </div>
            </div>
            <div class="col-md-10 col-md-push-1">
                <h5>Türkiye’nin bir çok noktasında TÜRGEV</h5>
                <br>
                <div class="col-md-9"><img src="<?php echo get_template_directory_uri(); ?>/images/map.png"  alt=""/></div>
                <div class="col-md-3" style="font-size: 90%; background: url(<?php echo get_template_directory_uri(); ?>/images/fullList-ver.png) center left no-repeat; padding-left: 18px;">Kurulusundan bugune binlerce ogrenciye ev sahipligi yapan Turgev <?php echo $yurt ?> tam donanimli yurtlariyla hizmet vermeye devam ediyor.<br>
                    <br>
                    <a class="btn btn-default orange" href="<?php echo esc_url(home_url('/')) . "yurtlarimiz"; ?>" role="button">Yurt Listesi</a> </div>
            </div>
        </div>
    </div>
</section>
<section class="visible-xs">
    <div class="milestoness">
        <div class="milestone-cntntss">
            <div class="col-md-10 col-md-offset-1 bref">TÜRGEV -Türkiye Gençlik ve Eğitime Hizmet Vakfı olarak 1996 yılında ilk yurdumuzu açarak başladığımız hizmet yolculuğuna yurtlarının sayısını artırarak ve eğitimin diğer alanlarında da çalışmalar yaparak devam etmekteyiz.
                <hr>
            </div>
            <div class="col-md-10 col-md-push-1">
                <div class="row">
                    <div class=" stats"><span class="nums count1"></span><br>
                        <span class="unit">Yurt</span><br>
                        Aile sıcaklığında güvenli ve huzurlu yurtlarımız.</div>
                    <div class=" stats"><span class="nums count2"></span><br>
                        <span class="unit">misafirhane </span><br>
                        Tüm imkanlara sahip yurtlarımız Modern mimarisi ve rahat çalışma ortamına sahiptir.</div>
                    <div class=" stats"><span class="nums count3"></span><br>
                        <span class="unit">Öğrenci</span><br>
                        Kuruluşundan bugüne binlerce öğrenciyi ev sahipliği yaptık ve her geçen gün öğrenci sayımız çoğalmakta.</div>
                </div>
            </div>
            <div class="container">
                <h5>Türkiye’nin bir çok noktasında TÜRGEV</h5>
                <br>
                <div class="text-center"><img src="<?php echo get_template_directory_uri(); ?>/images/map.png" id="map" alt=""/></div>
                <div style="font-size: 90%;">Kurulusundan bugune binlerce ogrenciye ev sahipligi yapan Turgev 19 tam donanimli yurtlariyla hizmet vermeye devam ediyor.<br>
                    <br>
                    <a class="btn btn-default orange" href="#" role="button">Yurt Listesi</a> </div>
            </div>
        </div>
    </div>
    <br>
    <br>
</section>
<section class="about_vid">
    <div class="about_over">
        <div class="container"> <a href="#" data-toggle="modal" data-target="#aboutVid"><i class="fa fa-play-circle-o fa-5x white-trans"></i></a> <a href="#" data-toggle="modal" data-target="#aboutVid">
                <h2>Tanıtım Filmi <br>
                    <small>Türkiye Gençlik ve Eğitime Hizmet Vakfı</small></h2>
            </a> <img src="<?php echo get_template_directory_uri(); ?>/images/turgev-small-white-logo.png" class="white-smalllogo"  alt=""/> </div>
    </div>


    <div class="modal fade" id="aboutVid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <iframe width="640" height="390" src="" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>


</section>
<section class="history">
    <div class="text-center" style="color:rgba(255,255,255,1);">
        <h3>TARİHÇE</h3> 
    </div>
    <?php
    // WP_Query arguments
    $args = array(
        'post_type' => 'yurtlarimiz',
        'pagination' => false,
'posts_per_page' => '50',
        'order' => 'ASC',
        'orderby' => 'date',
    );

    // The Query
    $query = new WP_Query($args);

//    print_r($query);

    $clsid = ($query->post_count > 6) ? $query->post_count : 6;

    $clswidth = 230 * ($clsid + 1.5);
    ?>
    <div class="content mCustomScrollbar _mCS_<?php echo $clsid; ?>">
        <div class="mCustomScrollBox mCS-light mCSB_horizontal" id="mCSB_<?php echo $clsid; ?>" style="position:relative; height:100%; overflow:hidden; max-width:100%;">
            <div class="mCSB_container" style="position: relative; left: 0px; width: <?php echo $clswidth . 'px'; ?>;">
                <div class="images_container">
                    
                    
                    <?php /*?><div style="height:350px; width: 120px;position: relative;float: left;"> &nbsp;&nbsp; </div><?php */?>
                    
                    <?php
                    // The Loop
                    if ($query->have_posts()) {
                        $loopvar = 0;
                        while ($query->have_posts()) {
                            $query->the_post();
                            
                            ?>
                            <div class="dorm-h-cntn" onClick="location.href = '<?php echo the_permalink() ?>'">
                                <div class="dorm-date"><strong><?php echo the_time('Y'); ?></strong></div>
                                <div class="dorm-title">
                                    <h4><?php print get_the_title(); ?></h4>
                                    <?php print get_field('s_title'); ?></div>
                                <div class="dorm-over"></div>
                                <div class="dorm-tree">
                                    <?php
                                    $image = wp_get_attachment_image_src(get_field('cover'), 'dorm-tree');
                                    $image[0] = ($image != false) ? $image[0] : get_template_directory_uri() . "/images/dorm-treenoimage.png";

                                    echo '<img src="' . $image[0] . '">';
                                    ?>
                                </div>
                            </div>
                            <?php
                            $loopvar ++;
                        }
                    } else {
                        // no posts found
                    }

                    // Restore original Post Data
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="mCSB_draggerRail"></div>
</div>
</div>
</div>
</div>
</section>
<script>
    (function($) {
        $(window).load(function() {
            $(".mCustomScrollbar").mCustomScrollbar({
                horizontalScroll: true,
				mouseWheel:{ enable: false },
				mouseWheel:{ axis: "x" }
            });
			$('.main,#carousel-frontpage,#carousel-frontpage .carousel-inner > .item,#carousel-frontpage .carousel-inner .news').css({'height':(($(window).height()))+'px'});
        });
		$(window).resize(function(){ // On resize
		$('.main,#carousel-frontpage,#carousel-frontpage .carousel-inner > .item,#carousel-frontpage .carousel-inner .news').css({'height':(($(window).height()))+'px'});
		});
    })(jQuery);

(function($) {
    $.fn.animateNumbers = function(stop, commas, duration, ease) {
        return this.each(function() {
            var $this = $(this);
            var start = parseInt($this.text().replace(/,/g, ""));
			commas = (commas === undefined) ? true : commas;
            $({value: start}).animate({value: stop}, {
            	duration: duration == undefined ? 1000 : duration,
            	easing: ease == undefined ? "swing" : ease,
            	step: function() {
            		$this.text(Math.floor(this.value));
					if (commas) { $this.text($this.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); }
            	},
            	complete: function() {
            	   if (parseInt($this.text()) !== stop) {
            	       $this.text(stop);
					   if (commas) { $this.text($this.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); }
            	   }
            	}
            });
        });
};
<?php 
$yurt = get_field('yurt', 1147);
$musafer = get_field('musafer', 1147);
$orng = get_field('orng', 1147);
?>
	
$( ".btntoslide, .menu-item-120 > a" ).click(function() {
  
  
if($(".btn-bg").hasClass("fa-angle-right")){
	$(".milestone").animate({
	marginLeft: '80%'
	}, 500);
	
	$(".btn-bg").addClass("fa-angle-left");
	$(".btn-bg").removeClass("fa-angle-right");
	$(".changeBtn").html('Başarılarımız<br>Hedeflerimiz');
	
	$(".count1").text('');
	$(".count2").text('');
	$(".count3").text('');
}else{
	$(".milestone").animate({marginLeft: '20%'}, 500);
	$(".btn-bg").addClass("fa-angle-right");
	$(".btn-bg").removeClass("fa-angle-left");
	$(".changeBtn").html('<div class="faaliyet" style="padding-top:10px">Faaliyetler</div>');
	$(".count1").animateNumbers(<?php echo $yurt ?>, false, 300, "linear");
	$(".count2").animateNumbers(<?php echo $musafer ?>, false, 400, "linear");
	$(".count3").animateNumbers(<?php echo $orng ?>, false, 500, "linear");
	}
});
	
	var target = $(".milestoness").offset().top;
var interval = setInterval(function() {
if ($(window).scrollTop() >= target-350 && $(window).width() < 768) {
$(".count1").animateNumbers(<?php echo $yurt ?>, false, 300, "linear");
$(".count2").animateNumbers(<?php echo $musafer ?>, false, 400, "linear");
$(".count3").animateNumbers(<?php echo $orng ?>, false, 500, "linear");
}
}, 250);

$('#aboutVid').on('hidden.bs.modal', function (e) {
    var $iFrame = $('#aboutVid iframe');
    $('#aboutVid iframe').removeAttr('src');
});

$('#aboutVid').on('shown.bs.modal', function (e) {
    var src = '//www.youtube.com/embed/Q5j04ZXQXKw';
    var $iFrame = $('#aboutVid iframe');
    $iFrame.attr('src', src);
});




$(window).scroll(function() {
    if ($(window).scrollTop() > 100) {
        $('#stickyNav').show('slow');
    }
    else {
        $('#stickyNav').hide('fast');
    }
});


})(jQuery);

</script>
<?php get_footer(); ?>