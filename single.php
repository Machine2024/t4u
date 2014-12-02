<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Türgev/T4U
 * @since Türgev/T4U 1.0
 */

get_header(); ?>
<?php /* The loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'content', get_post_format() ); ?>
<?php //t4u_post_nav(); ?>
<?php //comments_template(); ?>
<?php endwhile; ?>
<br>
<br>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
