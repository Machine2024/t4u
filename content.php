<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Türgev/T4U
 * @since Türgev/T4U 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
    <div class="entry-thumbnail">
      <?php the_post_thumbnail(); ?>
    </div>
    <?php endif; ?>
    <?php if ( is_single() ) : ?>


    
    <div class="contact-title">
    <h3>
      <?php the_title(); ?>
    </h3>
    </div><br><br>
    <?php else : ?>
    <h1 class="entry-title"> <a href="<?php the_permalink(); ?>" rel="bookmark">
      <?php the_title(); ?>
      </a> </h1>
      
      <div class="entry-meta">
      <?php t4u_entry_meta(); ?>
      <?php edit_post_link( __( 'Edit', 'turgev-t4u' ), '<i class="fa fa-pencil-square-o fa-lg">&nbsp;', '</i>' ); ?>
    </div>
    <!-- .entry-meta -->
    
    <?php endif; // is_single() ?>
     
  </header>
  <!-- .entry-header -->
  
  <?php if ( is_search() ) : // Only display Excerpts for Search ?>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
  <!-- .entry-summary -->
  <?php else : ?>
  
  
  <div class="entry-content container">
    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'turgev-t4u' ) ); ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'turgev-t4u' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
  </div>
  <!-- .entry-content -->
   
   
  <?php endif; ?>
  <footer class="entry-meta">
    <?php if ( comments_open() && ! is_single() ) : ?>
    <div class="comments-link">
      <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'turgev-t4u' ) . '</span>', __( 'One comment so far', 'turgev-t4u' ), __( 'View all % comments', 'turgev-t4u' ) ); ?>
    </div>
    <!-- .comments-link -->
    <?php endif; // comments_open() ?>
    <?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
    <?php get_template_part( 'author-bio' ); ?>
    <?php endif; ?>
  </footer>
  <!-- .entry-meta --> 
</article>
<!-- #post -->