<?php
/**
 * HTML Template Email
 *
 * @package YITH Woocommerce Request A Quote
 * @since   1.0.0
 * @author  Yithemes
 */
?>

<?php do_action( 'woocommerce_email_header', $email_heading ); ?>

<p><?php printf( __( 'You received a quote request from %s. The request is the following:', 'yith-woocommerce-request-a-quote' ), $raq_data['user_name'] ); ?></p>

<?php do_action( 'yith_ywraq_email_before_raq_table', $raq_data ); ?>

<h2><?php _e('Request Quote', 'yith-woocommerce-request-a-quote') ?></h2>


<table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #eee;" border="1" bordercolor="#eee">
    <thead>
        <tr>
            <th class="product-remove" style="display: none;">&nbsp;</th>
            <th class="product-thumbnail" style="display: none;">&nbsp;</th>
            <th class="product-name" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Product', 'woocommerce' ); ?></th>
            <th style="display: none;" class="product-price"><?php _e( 'Price', 'woocommerce' ); ?></th>
            <th class="product-quantity" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
            <th class="product-subtotal" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Total', 'woocommerce' ); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php do_action( 'woocommerce_before_cart_contents' ); ?>

        <?php

        global $woocommerce;

        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
            $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                ?>
                <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                        <td class="product-remove" style="display: none;">
                            <?php
                                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                    '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                    esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
                                    __( 'Remove this item', 'woocommerce' ),
                                    esc_attr( $product_id ),
                                    esc_attr( $_product->get_sku() )
                                ), $cart_item_key );
                            ?>
                        </td>

                        <td class="product-thumbnail" style="display: none;">
                            <?php
                                $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                if ( ! $product_permalink ) {
                                    echo $thumbnail;
                                } else {
                                    printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
                                }
                            ?>
                        </td>

                        <td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                            <?php
                                if( $woocommerce && version_compare( $woocommerce->version, "3.0", ">=" ) ) {
                                    if ( ! $product_permalink ) {
                                        echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
                                    } else {
                                        echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
                                    }

                                    // Meta data
                                    echo WC()->cart->get_item_data( $cart_item );

                                    // Backorder notification
                                    if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                        echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
                                    }
                                } else {
                                    //pre 3.0

                                    if ( ! $_product->is_visible() )
                                        echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                                    else
                                        echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', $_product->get_permalink(), $_product->get_title() ), $cart_item, $cart_item_key );

                                    // Meta data
                                    echo WC()->cart->get_item_data( $cart_item );

                                    // Backorder notification
                                    if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
                                        echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
                                }
                            ?>
                        </td>

                        <td style="display: none;" class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                            <?php
                                echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                            ?>
                        </td>

                        <td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                            <?php
                                if ( $_product->is_sold_individually() ) {
                                    $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                } else {
                                    $product_quantity = woocommerce_quantity_input( array(
                                        'input_name'  => "cart[{$cart_item_key}][qty]",
                                        'input_value' => $cart_item['quantity'],
                                        'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                                        'min_value'   => '0',
                                    ), $_product, false );
                                }

                                echo $cart_item['quantity'];
                                //echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
                            ?>
                        </td>

                                            <td class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
                                            <?php
                                            echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                                            ?>
                                            </td>
                </tr>
                <?php
            }
        }

        do_action( 'woocommerce_cart_contents' );
        ?>
        
        <?php do_action( 'woocommerce_after_cart_contents' ); ?>
    </tbody>
</table>





<?php do_action( 'yith_ywraq_email_after_raq_table', $raq_data ); ?>
<?php if( ! empty( $raq_data['user_message']) ): ?>
<h2><?php _e( 'Customer message', 'yith-woocommerce-request-a-quote' ); ?></h2>
    <p><?php echo $raq_data['user_message'] ?></p>
<?php endif ?>
<h2><?php _e( 'Customer details', 'yith-woocommerce-request-a-quote' ); ?></h2>

<p><strong><?php _e( 'Name:', 'yith-woocommerce-request-a-quote' ); ?></strong> <?php echo $raq_data['user_name'] ?></p>
<p><strong><?php _e( 'Email:', 'yith-woocommerce-request-a-quote' ); ?></strong> <a href="mailto:<?php echo $raq_data['user_email']; ?>"><?php echo $raq_data['user_email']; ?></a></p>

<?php do_action( 'woocommerce_email_footer' ); ?>