<?php
/**
 * Displays footer site info
 *
 * @package Author Writer
 * @subpackage author_writer
 */

?>
<div class="site-info">
    <div class="container">
        <p><?php author_writer_credit();?> <?php echo esc_html(get_theme_mod('author_writer_footer_text',__('By Themespride','author-writer'))); ?></p>
    </div>
</div>

