<?php
/*
Template Name Posts: Bağiş
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

<div class="donation-title">
  <h3>
    <?php the_title(); ?>
  </h3>
</div>
<div class="container donation-page">
  <?php /*?><div style="display: none;" class="col-xs-4 col-sm-3">
    <div class="right-nav">
      <ul>
        <?php
if ( is_single() ) {
  $categories = get_the_category();
  if ($categories) {
    foreach ($categories as $category) {
      $cat = $category->cat_ID;
      $args=array(
        'cat' => $cat,
        'posts_per_page'=>-1,
        'caller_get_posts'=>1
      );
      $my_query = null;
      $my_query = new WP_Query($args);
      if( $my_query->have_posts() ) {
        
        while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
          <?php the_title(); ?>
          </a></li>
        <?php
         
        endwhile;
      } //if ($my_query)
    } //foreach ($categories
  } //if ($categories)
  wp_reset_query();  // Restore global post data stomped by the_post().
} //if (is_single())
?>
      </ul>
    </div>
  </div><?php */?>
  
  <!-- display sub pages-->
  
  <div class="container" id="post-<?php the_ID(); ?>">
    <div class="entry-content">
      <?php the_content( ); ?>
    </div>
    <!-- .entry-content -->
    
   
    <!-- .entry-meta --> 
    
  </div>
   <div class="entry-meta pull-right">
      <?php //t4u_entry_meta(); ?>
      <?php edit_post_link( __( 'Edit', 'turgev-t4u' ), '<i class="fa fa-pencil-square-o fa-lg">&nbsp;', '</i>' ); ?>
    </div>
  <!-- display containts--> 
  
</div>
<?php endwhile; ?>
<?php

get_footer();

?>
