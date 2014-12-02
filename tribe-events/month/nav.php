<?php 
/**
 * Month View Nav Template
 * This file loads the month view navigation.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month/nav.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<?php /*?><?php do_action( 'tribe_events_before_nav' ) ?><?php */?>

<?php /*?><h3 class="tribe-events-visuallyhidden"><?php _e( 'Events List Navigation', 'tribe-events-calendar' ) ?></h3><?php */?>


<ul class="tribe-events-sub-nav">


	<li class="tribe-events-nav-previous">
		<?php tribe_events_the_previous_month_link(); ?>
	</li><!-- .tribe-events-nav-previous -->
	<li class="tribe-events-nav-next">
		<?php tribe_events_the_next_month_link(); ?>
	</li><!-- .tribe-events-nav-next -->
    
    			<?php /*?><li class="tribe-events-nav-previous tribe-events-nav-right tribe-events-past">
			<a href="http://www.turgev.org/faaliyetlerimiz/gecmis/?action=tribe_list&tribe_paged=1" onclick="location.href='http://www.turgev.org/faaliyetlerimiz/gecmis/?action=tribe_list&tribe_paged=1';">Faaliyetlerimiz<span>&raquo;</span></a>
		</li><!-- .tribe-events-nav-previous --><?php */?>
</ul><!-- .tribe-events-sub-nav -->

<?php do_action( 'tribe_events_after_nav' ) ?>
