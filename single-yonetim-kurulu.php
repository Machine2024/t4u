<?php
/*
Template Name Posts: Yönetim Kurulu
*/
/*
 * The template for displaying donation post template
 *
 * @package WordPress
 * @subpackage Türgev/T4U
 * @since Türgev/T4U 1.0
 */
 
 get_header();
?>
<?php /* The loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>

<div class="contact-title">
  <h3> Yönetim Kurulu </h3>
</div>
<br>
<br>
<div class="container mob"  id="post-<?php the_ID(); ?>">
  <div class="row">
    <div class="col-sm-3 text-center">
      <?php $image = wp_get_attachment_image_src(get_field('image'), 'student-profile');
	  if(!$image){
		$image[0] = get_template_directory_uri()."/images/member-no-img.png";
		}
	  ?>
      <img src="<?php print $image[0]; ?>"  alt="<?php the_title(); ?>" class="img-circle" /> <br>
      
      <!--
      <a href="<?php print get_field('linkedin'); ?>"><i class="fa fa-linkedin"></i></a>&nbsp;&nbsp;&nbsp;<a href="<?php print get_field('twitter'); ?>"><i class="fa fa-twitter"></i></a>
      -->
      
      </div>
    <div class="col-sm-9">
      <h4>
        <?php the_title(); ?>
      </h4>
      <small><?php print get_field('postion'); ?></small>
      <div>
        <?php the_content(); ?>
      </div>
    </div>
  </div>
  <div class="entry-meta pull-right">
    <?php edit_post_link( __( 'Edit', 'turgev-t4u' ), '<i class="fa fa-pencil-square-o fa-lg">&nbsp;', '</i>' ); ?>
  </div>
  <br>
  <br>
</div>
<?php endwhile; ?>
<?php
get_footer();
?>
