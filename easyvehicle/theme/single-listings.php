<?php 
global $buyer, $wpdb, $obj;
get_header(); ?>

<?php get_template_part('partials/page_bg'); ?>
<?php get_template_part('partials/title_box'); ?>

    <div class="stm-single-car-page">
        <?php if (stm_is_motorcycle()) {
            get_template_part('partials/single-car-motorcycle/tabs');
        } ?>

        <?php
        $recaptcha_enabled = get_theme_mod('enable_recaptcha', 0);
        $recaptcha_public_key = get_theme_mod('recaptcha_public_key');
        $recaptcha_secret_key = get_theme_mod('recaptcha_secret_key');
        if (!empty($recaptcha_enabled) and $recaptcha_enabled and !empty($recaptcha_public_key) and !empty($recaptcha_secret_key)) {
            wp_enqueue_script('stm_grecaptcha');
        }
        ?>

        <div class="container">
            <?php if (have_posts()) :

                $template = 'partials/single-car/car-main';
                if (stm_is_listing()) {
                    $template = 'partials/single-car-listing/car-main';
                } elseif (stm_is_boats()) {
                    $template = 'partials/single-car-boats/boat-main';
                } elseif (stm_is_motorcycle()) {
                    $template = 'partials/single-car-motorcycle/car-main';
                }

                while (have_posts()) : the_post();

                    $vc_status = get_post_meta(get_the_ID(), '_wpb_vc_js_status', true);

                    if ($vc_status != 'false' && $vc_status == true) {
                        the_content();
                    } else {
                        get_template_part($template);
                    } ?>



<?php 
$get = $obj->getRows($wpdb->prefix.'auction_activity' , ['where' =>['prod_id' => get_the_ID() , 'status' => 'winner'] , 'return_type' => 'single'  ]);
if ($get): 
$proid  = $get->prod_id;
$pro_price  = $get->bid_amount;
$mscprice   = $buyer->price_calculate($pro_price);
$fee        = 99; 
$shipping   = 70;
$total = $pro_price+$mscprice+$fee+$shipping; ?> 
<h3 style="color: #e41615;">Congratulation! <?php echo $obj->get_user_name($get->user_id); ?> has won the Bid</h3>
<table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;">
    <tr><th>Bid Price:</th><td>$<?php echo $pro_price; ?></td></tr>
    <tr style="background-color: #e0e0e0;"><th>Documentation Fee:</th><td>$<?php echo $fee; ?></td></tr>
    <tr><th>Easy Vehicle Auction Fee:</th><td>$<?php echo $mscprice; ?></td></tr>
    <tr style="background-color: #e0e0e0;"><th>Shipping Release Fee:</th><td>$<?php echo $shipping; ?></td></tr>
    <tr><th>Total:</th><td>$<?php echo $total; ?></td></tr>
</table>
<?php endif; ?>


<?php 
$active  = get_post_meta( get_the_ID(), 'ev_auc_active', true );
$price  = get_post_meta( get_the_ID(), 'ev_auc_price', true );
if (!empty($active)): 

if (!empty($price)): ?>
    <h1>Starting bid amount: $<?php echo $price;  ?> </h1> 
<?php endif ?>


<h2>Auction History</h2>

<table class="auction-history-table">
    <tbody>
        <tr>
            <td class="date"><?php $ev_auc_start_date  = get_post_meta( get_the_ID(), 'ev_auc_start_date', true ); echo $ev_auc_start_date; ?> TO <?php $ev_auc_end_date  = get_post_meta( get_the_ID(), 'ev_auc_end_date', true ); echo $ev_auc_end_date; ?></td>
            <td colspan="4" class="started">Auction started</td>
        </tr>
    </tbody>
</table>

<table class="auction-history-table">
        <tr>
            <th>Date</th>
            <th>Name</th>
            <th>Bid Amount</th>
            <th>Status</th>
        </tr>
    
    <tbody class="appendtobehere">
<?php $getbids = $obj->getRows($wpdb->prefix.'auction_activity' , ['where' =>['prod_id' => get_the_ID()] , 'order_by' =>'id DESC']); //pr( $getbids); ?>
  
  <?php if ($getbids): 
        foreach ($getbids as $getbidskey): ?>
        <tr class="<?php echo $getbidskey->status; ?>">
            <td><?php echo $getbidskey->date; ?></td>
            <td><?php echo $obj->get_user_name($getbidskey->user_id); ?></td>
            <td><?php echo ev_price($getbidskey->bid_amount); ?></td>
            <td><?php echo strtoupper($getbidskey->status); ?></td>
        </tr>
        <?php endforeach;
        endif ?>



    </tbody>
</table>


<?php 
$checkwinner = $obj->getRows($wpdb->prefix.'auction_activity' , ['where' =>['prod_id' => get_the_ID(), 'status' => 'winner'] ]);
if (!$checkwinner): ?>
<div class="messageappend"></div>
<form action="" method="POST" id="submitbid">
    <input type="hidden" name="prod_id" value="<?php echo get_the_ID(); ?>">
    <input type="number" name="bid_amount" value="<?php echo $buyer->ev_highest_bid(get_the_ID()); ?>" min="<?php echo $buyer->ev_highest_bid(get_the_ID()); ?>" step="any" size="8" title="bid" class="input-text qty  bid text left">
    <button type="submit" class="bid_button button alt">Bid</button>
</form>
<?php endif ?>

    
<?php endif; ?>





               <?php endwhile;

            endif; ?>

            <div class="clearfix">
                <?php /*
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				} */
                ?>
            </div>
        </div> <!--cont-->
    </div> <!--single car page-->
<?php get_footer(); ?>

<script>
    jQuery(document).ready(function() {


        jQuery('#submitbid').submit(function(event){
            event.preventDefault();

            var t = jQuery(this);
            var formData = new FormData(jQuery(this)[0]);
            jQuery.ajax({
                type: 'post',  
                url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=ev_submit_bid',  
                dataType: 'json',
                contentType: false,
                processData: false,
                data: formData,
            })
            .done(function(value) {
                // jQuery('.errrrrrr').remove();
                // if (value.class == 'isa_error isa_sucess') {
                //     form.trigger('reset');
                //     jQuery('.loader-css').hide();
                // }
                // jQuery('.loader-css').hide();
                jQuery('.messageappend').html('<div class="'+value.class+'">'+value.msg+'</div>');
                jQuery('.appendtobehere').prepend('<tr><td>'+value.bid.date+'</td><td>'+value.bid.user_id+'</td><td>$'+value.bid.bid_amount+'</td><td>'+value.bid.status+'</td></tr>');
                t.trigger('reset');
            })
            .fail(function() {
                // jQuery('.loader-css').hide();
                console.log("error");
            });



        });



    });
</script>
