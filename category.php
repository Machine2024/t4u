<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Türgev/T4U
 * @since Türgev/T4U 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) : ?>

<div class="contact-title">
  <h3><?php echo single_cat_title( '', false ); ?></h3>
  <small>
  <?php if ( category_description() ) : // Show an optional category description ?>
  <div class="archive-meta"><?php echo category_description(); ?></div>
  <?php endif; ?>
  </small> </div>
<!-- .archive-header -->
<br><br>
<div class="container">
  <div class="col-sm-9">
    <?php /* The loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <?php //get_template_part( 'content', get_post_format() ); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row"> 
 <?php if( get_field('news_image') ): ?>
<div class="col-sm-3">
<img src="<?php the_field('news_image'); ?>" class="image_thumb img-responsive img-thumbnail" style="height: auto;margin: 0 15px;width: 100%;"/>
</div>
<?php endif; ?>
<div class="col-sm-9">

      <header class="entry-header">
        <?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
        <div class="entry-thumbnail">
        <a href="<?php the_permalink(); ?>" rel="bookmark">
          <?php //the_post_thumbnail();
		  
			$image = wp_get_attachment_image_src(get_post_thumbnail_id( ), 'blog-image');
			?>
		  
		  
		   <img src="<?php echo $image[0]; ?>" class="img-responsive"></a>
        </div>
        <?php endif; ?>
       

<h4>
<a href="<?php the_permalink(); ?>" rel="bookmark">
<?php the_title(); ?>
</a>
</h4>
<div class="entry-meta">
  <?php t4u_entry_meta(); ?>
  <?php edit_post_link( __( 'Edit', 'turgev-t4u' ), '<i class="fa fa-pencil-square-o fa-lg">&nbsp;', '</i>' ); ?>
</div>

        <!-- .entry-meta --> 
      </header>
      <!-- .entry-header --> 
      
      <div><?php the_excerpt(); ?></div>
      
      
</div>      
</div>
    </article>
    <?php endwhile; ?>
    <?php t4u_paging_nav(); ?>
    <?php else : ?>
    <?php get_template_part( 'content', 'none' ); ?>
    <?php endif; ?>
  </div>
  
  
  <div class="col-sm-3">
    <?php get_sidebar(); ?>
  </div>
  
  
</div>
<?php get_footer(); ?>
