<?php
/* Template Name: Cart */

get_header();
View::render( 'partials/header' );
?>

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>

				<?php $items = Basket::items(); ?>
				<?php if ( count( $items ) > 0 ): ?>
					<?php foreach ( $items as $pid => $item ): ?>
                        <tr>
                            <td class="cart_product">
                                <a href=""><?php echo get_the_post_thumbnail($pid, 'thumbnail') ?></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href=""><?php echo $item['title']; ?></a></h4>
                                <p>Web ID: <?php echo $pid; ?></p>
                            </td>
                            <td class="cart_price">
                                <p>
									<?php if ( isset( $item['sale_price'] ) ) { ?>
                                        <del class="product_price"><?php echo $item['regular_price']; ?></del>
                                        <ins class="product_price"><?php echo $item['sale_price']; ?></ins>
									<?php } else { ?>
                                        <ins class="product_price"><?php echo $item['regular_price']; ?></ins>
									<?php } ?>
                                </p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href=""> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity"
                                           value="<?php echo $item['count']; ?>" autocomplete="off"
                                           size="2">
                                    <a class="cart_quantity_down" href=""> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
									<?php
									if ( isset( $item['sale_price'] ) ) {
										echo $item['count'] * $item['sale_price'];
									} else {
										echo $item['count'] * $item['regular_price'];
									}

									?>
                                </p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="<?php echo Url::add_args( array(
									'remove_cart_item' => $pid
								) ); ?>"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
					<?php endforeach; ?>
				<?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>$59</span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>$61</span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Update</a>
                    <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

<?php get_footer(); ?>
