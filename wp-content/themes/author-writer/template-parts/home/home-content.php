<?php
/**
 * Template part for displaying home page content
 *
 * @package Author Writer
 * @subpackage author_writer
 */

?>

<div id="main-content" class="container py-5">
  	<?php while ( have_posts() ) : the_post(); ?>
  		<?php the_content(); ?>
  	<?php endwhile; // end of the loop. ?>
</div>