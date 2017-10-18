<?php
/**
 * Customer outbid email
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
$product_data = wc_get_product(  $product_id );

?>

<?php do_action('woocommerce_email_header', $email_heading); ?>

<!-- <p><?php //printf( __( "Hi there. You have placed bid for item <a href='%s'>%s</a>", 'wc_simple_auctions' ),, $product_data->get_title(), wc_price($product_data->get_curent_bid())); ?></p> -->

<p>Hi,<br>
	<br>
	Thank you for placing your bid. Please, You have placed bid for item <a href="<?php echo get_permalink($product_id);  ?>"><?php echo $product_data->get_title();  ?></a>, review the attchment document and follow the instructions mentioned to get your bid reviewed and approved. <br>
	<br><br>
	Should you have any questions, feel free to inquire and we'll be glad to assist you. <br>
	<br>
	Best Regards,<br> 
	Sharee - Support Team<br><br><br>
	<a href="<?php echo site_url().'/Shear-Ree-Auction-Bank-Letter-G.docx' ?>">attachment link</a>
</p>

<?php do_action('woocommerce_email_footer'); ?>