<?php

global $wpdb;


if (!empty($_GET['paypal']) & !empty($_GET['activation'])) {
	$dataaa = array(
		'status' => 'Completed', 
	);
	$wpdb->update('wp_payments_2', $dataaa, ['id' => $_GET['paypal'] ]);

$getdata =  $wpdb->get_row('SELECT * FROM wp_payments WHERE id = '.$_GET['paypal'].' ');


$headers = array('Content-Type: text/html; charset=UTF-8');
$message = '
<div style="display: inline-block; padding: 16px 32px 13px 37px !important; color: #fff !important; font-size: 18px !important;  width: 55%; display: table; text-align: center; margin:0px auto;">
<h3 style="background-color: #eeeeefad; padding: 16px; text-transform: uppercase; color: #4CCCDB;">Dear Admin,</h3>
<span style="text-transform: uppercase; font-weight: bold !important; color: #000;">Billing Information are as follows: </span>
<table style="font-size: 12px;line-height: 20px;">
<thead>
<tr>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Order Id</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Carrier</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Description</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Amount</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Wireless number</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">First Name</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Last Name</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Street Address</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">City</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Zip Code </th>
<th style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Country </th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Phone Number</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Email</th>
</tr>
</thead>
<tbody>
<tr>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->id.'</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->carrier.'</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->dsc.'</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->amount.'</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->billing_phone.'</th>
<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->firstname.'</td>
<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->lastname.'</td>
<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->billing_street.'</td>
<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->billing_city.'</td>
<td style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;" >'.$getdata->billing_postal_code.'</td>
<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->billing_country.'</td>
<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->billing_phone.'</td>
<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->primary_email.'</td>
</tr>
</tbody>
</table>
</div>
';
// simonchen@silkroadtradinginc.com
wp_mail('simonchen@silkroadtradinginc.com', 'Billing Information ', $message, $headers);	

}elseif (!empty($_GET['paypal'])) {
	$dataaa = array(
		'status' => 'Completed', 
	);
	$wpdb->update('wp_payments', $dataaa, ['id' => $_GET['paypal'] ]);


$getdata =  $wpdb->get_row('SELECT * FROM wp_payments WHERE id = '.$_GET['paypal'].' ');
$headers = array('Content-Type: text/html; charset=UTF-8');
$message = '
<div style="display: inline-block; padding: 16px 32px 13px 37px !important; color: #fff !important; font-size: 18px !important;  width: 55%; display: table; text-align: center; margin:0px auto;">
<h3 style="background-color: #eeeeefad; padding: 16px; text-transform: uppercase; color: #4CCCDB;">Dear Admin,</h3>
<span style="text-transform: uppercase; font-weight: bold !important; color: #000;">Billing Information are as follows: </span>
<table style="font-size: 12px;line-height: 20px;">
<thead>
<tr>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Order Id</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Carrier</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Description</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Amount</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Wireless number</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">First Name</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Last Name</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Street Address</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">City</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Zip Code </th>
<th style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Country </th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Phone Number</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Email</th>
</tr>
</thead>
<tbody>
<tr>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->id.'</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->carrier.'</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->dsc.'</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->amount.'</th>
<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->billing_phone.'</th>
<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->firstname.'</td>
<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->lastname.'</td>
<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->billing_street.'</td>
<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->billing_city.'</td>
<td style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;" >'.$getdata->billing_postal_code.'</td>
<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->billing_country.'</td>
<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->billing_phone.'</td>
<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$getdata->primary_email.'</td>
</tr>
</tbody>
</table>
</div>
';
wp_mail('asadaly111@gmail.com', 'Billing Information ', $message, $headers);


}else{
	// nothing
}

get_header();
nectar_page_header($post->ID);
//full page
$fp_options = nectar_get_full_page_options();
extract($fp_options);
?>
<div class="container-wrap">
	<div class="<?php if($page_full_screen_rows != 'on') echo 'container'; ?> main-content">
		<div class="row">
			<?php
			//breadcrumbs
			if ( function_exists( 'yoast_breadcrumb' ) && !is_home() && !is_front_page() ){ yoast_breadcrumb('<p id="breadcrumbs">','</p>'); }
			//buddypress
			global $bp;
			if($bp && !bp_is_blog_page()) echo '<h1>' . get_the_title() . '</h1>';
			//fullscreen rows
			if($page_full_screen_rows == 'on') echo '<div id="nectar_fullscreen_rows" data-animation="'.$page_full_screen_rows_animation.'" data-row-bg-animation="'.$page_full_screen_rows_bg_img_animation.'" data-animation-speed="'.$page_full_screen_rows_animation_speed.'" data-content-overflow="'.$page_full_screen_rows_content_overflow.'" data-mobile-disable="'.$page_full_screen_rows_mobile_disable.'" data-dot-navigation="'.$page_full_screen_rows_dot_navigation.'" data-footer="'.$page_full_screen_rows_footer.'" data-anchors="'.$page_full_screen_rows_anchors.'">';
			if(have_posts()) : while(have_posts()) : the_post();
				the_content();
			endwhile; endif;
		if($page_full_screen_rows == 'on') echo '</div>'; ?>
	</div><!--/row-->
</div><!--/container-->
</div><!--/container-wrap-->
<?php get_footer(); ?>
