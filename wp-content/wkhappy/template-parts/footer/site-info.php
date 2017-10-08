<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="site-info">
<?php

if ( ! is_active_sidebar( 'leftbar-1' ) ) {
	return;
} 
dynamic_sidebar( 'leftbar-1' ); ?>
</div><!-- .site-info -->
