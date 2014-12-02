<?php
/**
 * The template for displaying post in Yurtlarımız post format
 *
 * @package WordPress
 * @subpackage Türgev/T4U
 * @since Türgev/T4U 1.0
 */
?>
<?php get_header(); ?>

<div class="dorms-title">
  <h3>Yurtlarımız</h3>
</div>
<?php if ( have_posts() ) : ?>
<?php /* The loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php $image = wp_get_attachment_image_src(get_field('cover'), 'dorm-list');
$image[0] = ($image != false)? $image[0]: get_template_directory_uri()."/images/dorm-no-cover.png";
?>
<div class="container" id="post-<?php the_ID(); ?>">
  <div class="dorm-cover" style="background-image: url(<?php print $image[0]; ?>)">
    <div class="col-md-3 detailes">
      <h4><?php echo the_title(); ?></h4>
      <hr>
      <?php echo get_field('s_title'); ?> <br>
      <br>
          <i class="fa fa-refresh fa-lg">
            <a href="<?php echo get_field('link_to_yurt_fotograflari'); ?>" style="margin-left: -18px;opacity: 0;" target="_blank">link</a>
          </i> 
          <i class="fa fa-picture-o fa-lg">
            <a href="<?php echo get_field('link_to_photo_gallary'); ?>" style="margin-left: -18px;opacity: 0;" target="_blank">link</a>
          </i> 
      
       <span> <i class="fa fa-phone fa-lg dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;"></i>
          <div class="dropdown-menu qcontactinlist">
            <address>
            <div class="col-xs-3">Adres:</div>
            <div class="col-xs-9"><?php echo get_field('address').' '.get_field('district').', '.get_field('city'); ?></div>
            <br>
            <br>
            <div class="col-xs-3">Tel:</div>
            <div class="col-xs-9"><?php echo get_field('tel1'); ?></div>
            <br>
            <br>
            <?php if( get_field('tel2') ) { ?>
            <div class="col-xs-3">Tel:</div>
            <div class="col-xs-9"><?php echo get_field('tel2'); ?></div>
            <br>
            <br>
            <?php } ?>
            <?php if( get_field('fax') ) { ?>
            <div class="col-xs-3">Faks:</div>
            <div class="col-xs-9"><?php echo get_field('fax'); ?></div>
            <br>
            <br>
            <?php } ?>
            <div class="col-xs-3">E-posta:</div>
            <div class="col-xs-9"><?php echo get_field('email'); ?></div>
            </address>
          </div>
          </span> <br>
      <br>
          <?php if(get_field('new_dorm')) { ?>
                <span class="blink"><?php echo get_field('new_dorm'); ?></span><br/><br/> 
          <?php } ?>
    </div>
  </div>
  <br>
  <div class="col-md-8">
    <?php the_content() ?>
  </div>
  <div class="col-md-4 dorm quick-contact">
    <address>
    <div class="col-xs-3">Adres:</div>
    <div class="col-xs-9"><?php echo get_field('address').' '.get_field('district').', '.get_field('city'); ?></div>
    <br>
    <br>
    <div class="col-xs-3">Tel:</div>
    <div class="col-xs-9"><?php echo get_field('tel1'); ?></div>
    <br>
    <br>
    <?php if( get_field('tel2') ) { ?>
    <div class="col-xs-3">Tel:</div>
    <div class="col-xs-9"><?php echo get_field('tel2'); ?></div>
    <br>
    <br>
    <?php } ?>
    <div class="col-xs-3">Faks:</div>
    <div class="col-xs-9"><?php echo get_field('fax'); ?></div>
    <br>
    <br>
    <div class="col-xs-3">E-posta:</div>
    <div class="col-xs-9"><?php echo get_field('email'); ?></div>
    </address>
  </div>
   <div class="col-md-4 dorm" style="padding-top: 17px;">
      <a target="_blank" href="<?php echo get_field('link_to_photo_gallary'); ?>">
        <img class="my_icon1" src="<?php echo get_template_directory_uri(); ?>/images/360.png"/>
      </a>
      <a target="_blank" href="<?php echo get_field('link_to_yurt_fotograflari'); ?>">
        <img class="my_icon2" src="<?php echo get_template_directory_uri(); ?>/images/gallery1.jpg"/>
      </a>
  </div> 
</div>
<br>
<br>
<div id="googlemap">
  <?php $location = get_field('map'); ?>
</div>
<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7"></script> 
<script src="<?php echo get_template_directory_uri(); ?>/js/maplace.min.js"></script> 
<script type="text/javascript">
var LocsA = [
    {
        lat: <?php print $location['lat']?>,
        lon: <?php print $location['lng']?>,
        title: '<?php echo the_title(); ?>',
       	icon: '<?php echo get_template_directory_uri(); ?>/images/turgev-logo-map.png',
		html: [
            '<?php print $location['address']?>, <?php print get_field('district').', '.get_field('city'); ?><br>',
			'Tel: <?php print get_field('tel1');?><br>E-posta: <?php print get_field('email')?>'
        ].join(''),
        zoom: 17
    }
];
(function($){

	new Maplace({
		map_div: '#googlemap',
		locations: LocsA,
		controls_on_map: false
	}).Load();
})(jQuery);
</script>
<div class="container">
  <div id="map-filter" class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
    <div class="form-holder">
      <form class="form-horizontal" role="form">
        <div class="col-xs-10 col-xs-offset-1 text-center"> YURTLARIMIZ HAKKINDA DAHA DETAYLI BİLGİ ALMAK İÇİN AŞAĞIDAKİ ALANDAN SEÇİNİZ </div>
        <br>
        <div class="form-group">
          <div class="col-xs-10 col-xs-offset-1">
            <select name="city" class="form-control" id="city">
              <option value="0">TÜM ŞEHİRLER</option>
              <?php
 
 
$field = get_field_object('city');
$values = $field['choices'];

if($values)
{
	foreach($values as $value)
	{
		$selected = ($value == get_field('city')) ? ' selected': NULL;	
		echo '<option value="' . $value . '"'.$selected.'>' . $value . '</option>';
	}
}
?>
            </select>
            
            
             <script>
			(function($){
            
			$('#city').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
	
	window.location.replace("<?php echo esc_url( home_url( '/' ) )."yurtlarimiz?city="; ?>" + valueSelected);
   
});

})
(jQuery);

            
            </script> 
            
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-10 col-xs-offset-1">

            <select class="form-control">
              <option>TÜM İLÇELER</option>
              
              
              
              
              <?php
 
 
$field = get_field_object('district');
$values = $field['choices'];

if($values)
{
	foreach($values as $value)
	{
		$selected = ($value == get_field('district')) ? ' selected': NULL;	
		echo '<option value="' . $value . '"'.$selected.'>' . $value . '</option>';
	}
}
?>
              
            </select>
            
            <script>
			(function($){
            
			$('#district').on('change', function (e) {
	
	
	
	var citySelected = $('#city').find(":selected").val();
	var type = $('#type').find(":selected").val();
				
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
	
	
	
	window.location.replace("<?php echo esc_url( home_url( '/' ) )."yurtlarimiz?"; ?>city="+citySelected+"&district=" + valueSelected+"&type=" + type);
   
});

})
(jQuery);

            
            </script> 
            
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-10 col-xs-offset-1">
            <select class="form-control" id="type" name="type">
              <option value="0">TÜM</option>
              <option value="1">LİSE </option>
              <option value="2">ÜNİVERSİTE</option>
              </select>
              
              <script>
			(function($){
				
				<?php $type = (!$_GET['type'])? 0 : esc_html($_GET['type']) ;?>
            
			 $("#type").val('<?php print $type;?>');
			$('#type').on('change', function (e) {
		
		
		var citySelected = $('#city').find(":selected").val();
		var districtSelected = $('#district').find(":selected").val();
				
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
	
	
	
	window.location.replace("<?php echo esc_url( home_url( '/' ) )."yurtlarimiz?"; ?>city="+citySelected+"&district=" + districtSelected+"&type=" + valueSelected);
   
});

})
(jQuery);

            
            </script> 
              
              
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endwhile; ?>
<br>
<br>
<div class="container entry-meta pull-right">
  <?php //t4u_entry_meta(); ?>
  <?php edit_post_link( __( 'Edit', 'turgev-t4u' ), '<i class="fa fa-pencil-square-o fa-lg">&nbsp;', '</i>' ); ?>
</div>
<?php endif; ?>
<br>
<br>
<?php get_footer(); ?>