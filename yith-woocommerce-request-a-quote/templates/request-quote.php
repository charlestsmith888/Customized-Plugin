<?php
/**
 * Request A Quote pages template; load template parts
 *
 * @package YITH Woocommerce Request A Quote
 * @since   1.0.0
 * @author  Yithemes
 */

global $wpdb, $woocommerce;


if( function_exists( 'wc_print_notices' ) ) {
    yith_ywraq_print_notices();
}
?>
<div class="woocommerce ywraq-wrapper">
	<div id="yith-ywraq-message"></div>

	<?php wc_get_template( 'request-quote-' . $template_part . '.php', $args, YITH_YWRAQ_DIR, YITH_YWRAQ_DIR );  ?>

    <?php if(WC()->cart->get_cart_contents_count() != 0): ?>

        <?php wc_get_template( 'request-quote-form.php', $args, YITH_YWRAQ_DIR, YITH_YWRAQ_DIR );  ?>

    <?php endif ?>
</div>