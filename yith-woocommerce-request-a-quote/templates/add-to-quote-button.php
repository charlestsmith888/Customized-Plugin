<?php
/**
 * Add to Quote button template
 *
 * @package YITH Woocommerce Request A Quote
 * @since   1.0.0
 * @author  Yithemes
 */


?>

<!-- <a href="#" class="<?php echo $class ?>" data-product_id="<?php echo $product_id ?>" data-wp_nonce="<?php echo $wpnonce ?>">
    <?php echo $label ?>
</a> -->


<!-- <button type="submit" class="<?php echo $class ?>"><?php echo $label ?></button> -->

<button type="submit" class="single_add_to_cart_button button alt <?php echo $class ?>"><?php echo $label ?></button>


<img src="<?php echo esc_url( YITH_YWRAQ_ASSETS_URL.'/images/wpspin_light.gif' ) ?>" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />