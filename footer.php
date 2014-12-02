<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Türgev/T4U
 * @since Türgev/T4U 1.0
 */
?>
<div>
<div class="colored_strips"></div>
<section class="footer">
  <div class="container">
    <div class="col-xs-6 col-sm-3"> Genel Merkez<br>
      <br>
      Adres :Akşemsettin Mah. Albay Cemil Sakarya Sokak No: 3/4 Fatih / İSTANBUL <br>
      Tel :+90 212 532 1996 (pbx)<br>
      Faks :+90 212 533 1996<br>
      E-posta :bilgi@turgev.org </div>
<?php /*?>    <div class="col-sm-3 list">
      <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
    </div><?php */?>
    <div class="col-xs-6 col-sm-6">
      <h5>Bağlantılar</h5>
      <br>
      <div class="col-sm-4"><a href="http://paletmontessori.com"><img src="<?php echo get_template_directory_uri(); ?>/images/palet_logo.png"  alt="paletmontessori.com" width="100"/></a><br/><a href="http://vimeo.com/100085916">Tanıtım Videosu</a></div>
      <div class="col-sm-4"><a href="http://edepmerkezi.org/"><img src="<?php echo get_template_directory_uri(); ?>/images/edep_logo.png"  alt="edepmerkezi.org" width="100"/></a></div>
      <div class="col-sm-4"><a href="http://www.turkenfoundation.org/"><img src="<?php echo get_template_directory_uri(); ?>/images/turken_logo.png"  alt="turkenfoundation.org" width="100"/></a></div>
      </div>
    <div class="col-xs-6 col-sm-3">
      <ul class="fa-ul">
        <li><a href="https://twitter.com/turgev"><i class="fa-li fa fa-twitter"></i>Twitter</a></li>
        <li><a href="https://www.facebook.com/turgev"><i class="fa-li fa fa-facebook"></i>Facebook</a></li>
        <li><i class="fa-li fa fa-google-plus"></i>Google+</li>
      </ul>
      <br>
      Copyright &copy; 1996 - 2014 TÜRGEV <br>
      <br>
      <a href="http://t4u.com.tr/TR/" target="_blank"><span style="font-size: 10px;">Web by T4U Bilişim Çözümleri</span></a>
      
      </div>
  </div>
</section>
 </div>
 
  
<div class="container-fluid navbar-fixed-bottom hidden-xs donate"><a href="<?php print home_url()."/bagis/zekat" ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/bagis_logo.png"  alt=""/></a></div>


<?php /*?><div class="container-fluid navbar-fixed-bottom hidden-xs donate"><a href="<?php print home_url()."/bagis/kurban-bagis" ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/bagis_logo.png"  alt=""/></a></div><?php */?>

<div class="container-fluid navbar-fixed-bottom hidden-xs formu"><a href="<?php print home_url()."/basvuru-formu" ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/basvuru_formu.png"  alt=""/></a></div>



<?php wp_footer(); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){      
       //change read more link
       $(".more-link").html('Devamını oku'); 
       
       //fix slider indicators      
       var sliderNum = $(".carousel-inner > div").length;//count how many sliders we have to add indicators for them 
       var indicators = '';
       for ( var i = 1; i < sliderNum; i++ ) {
            indicators = indicators + '<li data-slide-to="'+i+'" data-target="#carousel-frontpage"></li>';
       } 
       indicators = '<li class="active" data-slide-to="0" data-target="#carousel-frontpage"></li>' + indicators;
       $(".carousel-indicators").html(indicators);

       //add % to numbers in home page slider
       var counter = 1;
        $.each($(".col-md-4"),function(element){
                if(counter == 2){
                    var numHtml = $(this).html();
                    numHtml = "<span style='color: #3e3e3e;font-family: Arial;font-size: 350%;font-weight: bold;'></span>" + numHtml;
                    $(this).html(numHtml);
                    return false;                    
                }
                counter++;             
        });
       

        //filter cities and subcities
        //sub cities
        $("select[id=ninja_forms_field_75] option").filter(function() {
            return $(this).val() == '0';
        }).prop('selected', true);
        $("#ninja_forms_field_75").prop('disabled', true);
        
        //cities
        $("select[id=ninja_forms_field_72] option").filter(function() {
            return $(this).val() == '0';
        }).prop('selected', true); 
            
            
        $("#ninja_forms_field_72").change(function(){
            var selectedVal = $(this).val();
            if( selectedVal != 0 ){
                $("#ninja_forms_field_75").prop('disabled', false);
            }else{
                $("#ninja_forms_field_75").prop('disabled', true);
            }
            
            //
             $.each($("select[id=ninja_forms_field_75] option"),function(element){
                    var LoopVal = $(this).val();
                   if (LoopVal.indexOf(selectedVal) >= 0){
                         if( $(this).parent('span.toggleOption').length) $(this).unwrap( );
                     var newVal = LoopVal.replace(selectedVal+"/", "");
                     $(this).val(newVal);
                     $(this).html(newVal);
                     $(this).prop('selected', true);
                   }else{
                     if($(this).parent( 'span.toggleOption' ).length == 0) $(this).wrap( '<span class="toggleOption" style="display: none;" />');
                   }
             });
        });
        
        
        //replace yeni pattern
        var replaced = $("#menu-main-meun-2").html().replace(/#Yeni#/g,'<span style="color:#222222;">(Yeni)</span>');
        $("#menu-main-meun-2").html(replaced);
        
        var replaced = $("#menu-main-meun").html().replace('#Yeni#</a>','<span style="color:#222222;">(Yeni)</span></a>');
        $("#menu-main-meun").html(replaced);
        
    });
</script>
</body></html>