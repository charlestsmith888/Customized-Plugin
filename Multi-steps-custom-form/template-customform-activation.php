<?php
/*
* Template Name: Custom FORM Activation Page
*
*/
get_header();
nectar_page_header($post->ID);
//full page
$fp_options = nectar_get_full_page_options(); extract($fp_options); ?>
<style>
ul li,ol li{list-style-position:outside}ul li{list-style-type:disc}.t-center{text-align:center}.item-list ul,.carrier-list{padding:0;margin:0 -15px 1em}.carrier-list li{display:inline-block;vertical-align:top;margin:0 15px 30px!important;text-align:center}.carrier-list .pane2:hover{-webkit-box-shadow:0 3px 15px #b7b6b6;box-shadow:0 3px 15px #b7b6b6}.pane2:hover{border-color:#ababab}.pane2{width:195px;position:relative;text-align:center;background-color:#fff;border:1px solid silver;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;display:block}span.table{height:122px;width:100%;display:table}span.table span.cell{height:122px;width:100%;display:table-cell;vertical-align:middle}.ttl-home{font-size:33px;line-height:33px;color:#2a373d;margin-bottom:30px}.ttl-home  strong{font-weight:900}.ttl-home .num{font-size:16px;line-height:28px;color:#2a373d;border:2px solid #2a373d;-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;height:29px;width:29px;display:inline-block;text-align:center;margin-right:5px;font-weight:700;vertical-align:top}.pane-plan .txt{text-align:center;padding:10px;min-height:110px}.pane2 .txt{font-size:15px;line-height:17px;display:block;color:#2a373d;font-style:normal;text-align:left;padding:10px 15px}.pane2 .price{font-size:36px;font-weight:400;line-height:37px;color:#010101!important;background:#999;display:block;padding:12px 5px 12px;border-radius:5px 5px 0 0}.pane2>a,.pane2>.block{display:block;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;text-decoration:none}.pane2{width:195px;position:relative;text-align:center;background-color:#fff;border:1px solid silver;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;display:block}.view-content h3,.view-header h3{text-align:center!important;margin-bottom:20px}.process-bar,.sim-process-bar{position:relative;height:29px;margin:0 0 35px}.process-bar:before,.sim-process-bar:before{content:'';top:10px;left:0;right:0;height:9px;background:#b2b2b2;position:absolute;z-index:1}.process-bar:after,.sim-process-bar:after{content:'';top:10px;left:0;height:9px;background:#3bc9db;position:absolute;z-index:2}.process-bar.process-one:after{width:33%}.process-bar.process-two:after{width:66%}.process-bar.process-three:after{width:100%}.sim-process-bar.sim-process-one:after{width:25%}.sim-process-bar.sim-process-two:after{width:49%}.sim-process-bar.sim-process-three:after{width:74%}.sim-process-bar.sim-process-four:after{width:100%}.process-bar span,.sim-process-bar span{position:absolute;font-size:16px;line-height:19px;font-weight:700;text-align:center;color:#fff;background:#b2b2b2;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;width:21px;height:21px;top:4px;z-index:5}.process-bar span.disabled,.sim-process-bar span.disabled{background:#3bc9db}.process-bar .num-1,.sim-process-bar .num-1{left:0}.process-bar .num-2{left:33%}.sim-process-bar .num-2{left:24%}.process-bar .num-3{right:33%}.sim-process-bar .num-3{right:49%}.sim-process-bar .num-4{right:24%}.sim-process-bar .num-5{right:0}.process-bar .num-4{right:0}.sim-process-bar span.active{border:4px solid #3bc9db;background:#f0f0f0;color:#3bc9db;top:0}.process-bar span.active{border:4px solid #3bc9db;background:#f0f0f0;color:#3bc9db;font-size:14px;line-height:13px}.center-col{margin:auto;float:none}
.form-item-phone{margin-bottom: 15px;width: 100%;display: block;text-align: left;}.table-summary thead th,#cart-pane thead th,.order-pane thead th{background-color:#3bc9db;color:#fff;font-weight:700;padding:6px 5px;border:0;font-size:16px}.main-content{padding-top:100px}nav.opermenu{float:none}select{background-color:transparent!important;border:1px solid #ccc!important;box-shadow:none!important;-webkit-box-shadow:none!important;font-size:16px!important;-o-box-shadow:none!important;padding:16px!important}a.backbtn{background-color:#333;padding:7px 11px;border:none;color:#fff;cursor:pointer;font-size:12px;border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:2px;-o-border-radius:2px;display:block;width:135px;margin-top:15px;text-align:center}
</style>
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
	if($page_full_screen_rows == 'on') echo '<div id="nectar_fullscreen_rows" data-animation="'.$page_full_screen_rows_animation.'" data-row-bg-animation="'.$page_full_screen_rows_bg_img_animation.'" data-animation-speed="'.$page_full_screen_rows_animation_speed.'" data-content-overflow="'.$page_full_screen_rows_content_overflow.'" data-mobile-disable="'.$page_full_screen_rows_mobile_disable.'" data-dot-navigation="'.$page_full_screen_rows_dot_navigation.'" data-footer="'.$page_full_screen_rows_footer.'" data-anchors="'.$page_full_screen_rows_anchors.'">'; ?>
		<!-- step 1 -->
		<?php if (empty($_GET['step2']) && empty($_GET['step3']) && empty($_GET['cart'])): ?>
			<div class="view-header">
				<h1 class="t-center ttl-home">
					<span class="num">1</span>
					<strong>Choose a Carrier</strong>
				</h1>
			</div>
			<div class="view-content">
				<ul class="carrier-list t-center">
					<?php
					$q = new WP_Query(array('post_type' => array('activation_form'),) ); ?>
					<?php while ($q->have_posts()) : $q->the_post(); ?>
						<?php if (has_post_thumbnail()):
						$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium', true); ?>
						<li class="">
							<div class="pane2 animate" style="margin-top: 0px; margin-bottom: 0px;">
								<div><a href="?step2=true&compid=<?php echo get_the_ID(); ?>"><span class="table"><span class="cell"><img typeof="foaf:Image" src="<?php echo $thumbnail[0]; ?>" width="174" height="87" alt=""></span></span></a></div>
							</div>
						</li>
					<?php else: ?>
					<?php endif ?>
				<?php endwhile; ?>
			</ul>
		</div>
	<?php endif ?>
	<!-- step 2 -->
	<?php if (!empty($_GET['step2']) && $_GET['step2'] == true): ?>
		<div class="content">
			<div class="process-bar process-one">
				<span class="num-1 disabled">1</span>
				<span class="num-2 active">2</span>
				<span class="num-3 ">3</span>
				<span class="num-4 ">4</span>
			</div>
		</div>
		<?php
		$post_thumbnail_id = get_post_thumbnail_id($_GET['compid']);
		$thumbnail = wp_get_attachment_image_src($post_thumbnail_id,'medium', true);
		?>
		<ul class="carrier-list t-center">
			<li>
				<div class="pane2">
					<span class="table">
						<span class="cell">
							<img src="<?php echo $thumbnail[0]; ?>" alt="Simple Mobile">
						</span>
					</span>
				</div>
			</li>
		</ul>
		<div class="view-header">
			<h1 class="t-center ttl-home">
				<span class="num">2</span>
				<strong>Choose A Plan</strong>
			</h1>
			<h3>Unlimited Plans</h3>
		</div>
		<div class="item-list">
			<ul class="carrier-list t-center">
				<?php
				global $wpdb;
				$pkgs = $wpdb->get_results('SELECT * FROM '.$wpdb->postmeta.' WHERE post_id = '.$_GET['compid'].' AND meta_key = "PKG" ORDER BY meta_id ASC ');
				if ($pkgs):
					foreach ($pkgs as $key22):
						$value = get_metadata_by_mid( 'post', $key22->meta_id ); ?>
						<li class="">
							<div class="pane2 animate pane-plan" xmlns="http://www.w3.org/1999/html">
								<a href="?step3=true&select=<?php echo $key22->meta_id; ?>">
									<strong class="price" style="background: #3bc9db;">
										$<?php echo $value->meta_value[0]; ?></strong>
										<em class="txt">
											<div class="field-content"><?php echo $value->meta_value[1]; ?></div>
										</em>
									</a>
								</div>
							</li>
						<?php endforeach; ?>
						
				


				<?php else: ?>


						<form action="" method="GET" class="symbolprice">
							<input placeholder="10—100" type="number" name="amount" value="" size="9" maxlength="9" required="">
							<input type="hidden" name="step3" value="true">
							<input type="hidden" name="select" value="<?php echo $_GET['compid']; ?>">
							<input type="submit" value="Next Step" class="form-submit">
						</form>


						<?php endif; ?>

					</ul>
				</div>
				<div class="col span_12">
					<a class="backbtn" href="https://86huaren.com/activation/" class="link-back">Back</a>
				</div>




			<?php endif ?>










			<!-- step 3 -->
			<?php if (!empty($_GET['step3']) && $_GET['step3'] == true): ?>
				<div class="content">
					<div class="process-bar process-two">
						<span class="num-1 disabled">1</span>
						<span class="num-2 disabled">2</span>
						<span class="num-3 active">3</span>
						<span class="num-4 ">4</span>
					</div>
				</div>
				<h1 class="t-center ttl-home">
					<span class="num">3</span>
					<strong>Get Started</strong>
				</h1>
				<br>
				<br>
				<br>
				<h3 class="t-center"><strong>Your Carrier and Plan</strong></h2>
					<div class="phone-page">
						<?php
						$data = get_metadata_by_mid( 'post', $_GET['select'] );
						$post_thumbnail_id = get_post_thumbnail_id( $data->post_id);
						$thumbnail = wp_get_attachment_image_src($post_thumbnail_id,'medium', true);							
						if (empty($post_thumbnail_id)) {
							$post_thumbnail_id = get_post_thumbnail_id( $_GET['select']);
							$thumbnail = wp_get_attachment_image_src($post_thumbnail_id,'medium', true);
						}

								
						$amount = $data->meta_value[0];
						if (empty($amount)) {
							$amount = $_GET['amount'];
						}

				// $data->meta_id
				// $data->post_id
				// $data->meta_key
				// $data->meta_value
				// echo "<pre>";
					// print_r($post);
						?>
						<nav class="opermenu">
							<ul class="carrier-list t-center">
								<li>
									<div class="pane2">
										<span class="table">
											<span class="cell">
												<img src="<?php echo $thumbnail[0]; ?>" alt="Simple Mobile">
											</span>
										</span>
									</div>
								</li>
							</ul>
							<ul class="carrier-list t-center">
								<li>
									<div class="pane2 pane-plan">
										<a href="javascript:;">
											<strong class="price" style="background: #99cc33;">$<?php echo $amount; ?></strong>
											<?php if (!empty($data->meta_value[1])): ?>
												<em class="txt"><?php echo $data->meta_value[1]; ?></em>
											<?php endif ?>
										</a>
									</div>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col span_5 center-col">
						<form action="?cart=true" method="post" id="prepaid-order-enter-phone-form" accept-charset="UTF-8">
							<label><input type="radio" name="option" value="1" required id="my-opt-1">1. Start A New Number</label>
							<label><input type="radio" name="option" value="2" required id="my-opt-2">2. Port Your Existing Number</label>
							<br><br><br>
							<div style="clear: both;"></div>
							<div id="option1">
								<div class="form-item form-type-telfield form-item-phone">
									<label for="edit-phone">Preferred Zip Code<span class="form-required" title="This field is required.">*</span></label>
									<input type="tel" name="Preferred_Zip_Code">
								</div>
								<div class="form-item form-type-telfield form-item-phone">
									<label for="edit-phone">Preferred area code (not guaranteed)<span class="form-required" title="This field is required.">*</span></label>
									<input type="tel" name="Preferred_area_code">
								</div>
							</div>
							<div id="option2">
								<div class="form-item form-type-telfield form-item-phone">
									<label for="edit-phone">Phone number<span class="form-required" title="This field is required.">*</span></label>
									<input type="tel" name="Phone_number">
								</div>
								<div class="form-item form-type-telfield form-item-phone">
									<label for="edit-phone">Account number <span class="form-required" title="This field is required.">*</span></label>
									<input type="tel" name="Account_number">
								</div>
								<div class="form-item form-type-telfield form-item-phone">
									<label for="edit-phone">Pin number<span class="form-required" title="This field is required.">*</span></label>
									<input type="tel" name="Pin_number">
								</div>
								<div class="form-item form-type-telfield form-item-phone">
									<label for="edit-phone">Zip Code associate with the number<span class="form-required" title="This field is required.">*</span></label>
									<input type="tel" name="Zip_Code_associate_with_the_number">
								</div>
							</div>
							<input type="hidden" name="meteaid" value="<?php echo $_GET['select']; ?>">
							
							<?php if (!empty($_GET['amount'])): ?>
								<input type="hidden" name="amount" value="<?php echo $_GET['amount']; ?>">
							<?php endif ?>
							
							<input class="inpsmb form-submit" type="submit" id="edit-submit" value="Next step">
							<input type="hidden" name="form_id" value="prepaid_order_enter_phone_form">
						</form>
					</div>
					<div class="col span_12">
						<a class="backbtn" href="https://86huaren.com/activation/?step2=true&compid=<?php echo $data->post_id; ?>">Back</a>
					</div>
				<?php endif ?>
				<!-- step 4 -->
				<?php if (!empty($_GET['cart'])):
				if (empty($_POST['option'])) {echo "<script>window.location = 'https://86huaren.com/activation/';</script>";}
				
					$id = $_POST['meteaid']; 

					//echo "<pre>"; print_r($_POST);

					 ?>
					<div class="content">
						<div class="process-bar process-three">
							<span class="num-1 disabled">1</span>
							<span class="num-2 disabled">2</span>
							<span class="num-3 disabled">3</span>
							<span class="num-4 active">4</span>
						</div>
					</div>
					<?php
					$data = get_metadata_by_mid( 'post', $id );
					$post = get_post($data->post_id);
					$postid = $data->post_id;
					$amount = $data->meta_value[0];
					if (empty($amount)) {
						$amount = $_POST['amount'];
						$post = get_post($id);
					}
					$total = $amount; //subtotal

					//Tax Calculations
					$tax = array(0 , 0);
					$taxids = array(379, 380, 382);
					if (in_array($postid, $taxids)) {
						$tax = array(1 , 0); //tax amount (fee, tax)
						$amount = $amount+$tax[0]+$tax[1]; //Grand total
					}

					// Discount Code Work......
					global $wpdb;
					if (isset($_POST['coupon_code'])) {
						$coupon = $wpdb->get_row('SELECT * FROM wp_coupon WHERE couponcode = "'.$_POST['coupon_code'].'" ');
						
						$startdate = $coupon->endDate;
						$expire = strtotime($startdate. ' + 1 days');
						$today = strtotime("today midnight");

						if (!empty($coupon) && $today >= $expire == false) {
							if ($coupon->discounttype == 'flat') { 
								$amount = $amount - $coupon->amount; 
							}else{ 
								$amount = $amount - $amount*($coupon->amount/100); 
							}
							echo '<div class="alert success">Discount has been applied!</div>';
						}else{
							echo '<div class="alert danger">Your Coupon is not valid!</div>';
						}
					}




					?>
					<h1 class="t-center ttl-home">
						<span class="num">4</span>
						<strong>Provide Your Payment Info</strong>
					</h1>

					<div class="my-couponnn">
						<p class="my-ppp">Have a coupon? Click here to enter your code</p>
						<form method="POST" action="">
							<input type="text"  class="input-text" placeholder="Coupon code" name="coupon_code" id="coupon_code" value="">
							<input type="submit" class="button" id="coupon-submittt" value="Apply coupon">


							<input type="hidden" name="option" value="<?php echo $_POST['option']; ?>">
							<input type="hidden" name="meteaid" value="<?php echo $_POST['meteaid']; ?>">
						

						<?php if (condition): ?>
							
						<?php endif ?>
						<?php if ($_POST['option'] == '1'): ?>
							<input type="hidden" name="Preferred_Zip_Code" value="<?php echo $_POST['']; ?>">
							<input type="hidden" name="Preferred_area_code" value="<?php echo $_POST['']; ?>">							
						<?php endif ?>
						<?php if ($_POST['option'] == '2'): ?>
							<input type="hidden" name="Phone_number" value="<?php echo $_POST['Phone_number']; ?>">
							<input type="hidden" name="Account_number" value="<?php echo $_POST['Account_number']; ?>">
							<input type="hidden" name="Pin_number" value="<?php echo $_POST['Pin_number']; ?>">
							<input type="hidden" name="Zip_Code_associate_with_the_number" value="<?php echo $_POST['Zip_Code_associate_with_the_number']; ?>">							
						<?php endif ?>


						</form>
					</div>

					<h3><strong>Order Summary</strong></h3>
					<div class="table-summary">
						<div id="edit-panes-prepaid-cart-prepaid-cart" class="form-item form-type-item">
							<table>
								<thead>
									<tr>
										<th>Detail</th>
										<th class="carrier">Carrier</th>
										<th class="plan">Description</th>
										<th>Amount</th>
										<th>Fee</th>
										<th>Tax</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<tr class="odd">
										<td>
											<?php if ($_POST['option'] == '1'):
											echo 'Preferred Zip Code : '.$_POST['Preferred_Zip_Code'].'<br>';
											echo 'Preferred area code : '.$_POST['Preferred_area_code'].'<br>';
											endif; ?>
											<?php if ($_POST['option'] == '2'):
											echo 'Phone number : '.$_POST['Phone_number'].'<br>';
											echo 'Account number : '.$_POST['Account_number'].'<br>';
											echo 'Pin number : '.$_POST['Pin_number'].'<br>';
											echo 'Zip Code_associate with the number : '.$_POST['Zip_Code_associate_with_the_number'].'<br>';
											endif; ?>
										</td>
										<td><?php echo $post->post_name; ?></td>
										<td><?php echo $data->meta_value[1]; ?></td>
										<td><span class="uc-price">$<?php echo $total; ?></span></td>
										<td><span class="uc-price">$<?php echo $tax[0]; ?></span></td>
										<td><span class="uc-price">$<?php echo $tax[1]; ?></span></td>
										<td><span class="uc-price">$<?php echo $amount; ?></span></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<form action="https://86huaren.com/activation-process/" method="POST">
						<?php
						if ($_POST['option'] == '1') {
							echo '<input type="hidden" name="option1[Preferred_Zip_Code]" value="'.$_POST['Preferred_Zip_Code'].'">';
							echo '<input type="hidden" name="option1[Preferred_area_code]" value="'.$_POST['Preferred_area_code'].'">';
						}
						if ($_POST['option'] == '2') {
							echo '<input type="hidden" name="option2[Phone_number]" value="'.$_POST['Phone_number'].'">';
							echo '<input type="hidden" name="option2[Account_number]" value="'.$_POST['Account_number'].'">';
							echo '<input type="hidden" name="option2[Pin_number]" value="'.$_POST['Pin_number'].'">';
							echo '<input type="hidden" name="option2[Zip_Code_associate_with_the_number]" value="'.$_POST['Zip_Code_associate_with_the_number'].'">';
						}
						?>
						<input type="hidden" name="item[carrier]" value="<?php echo $post->post_name; ?>">
						<input type="hidden" name="item[dsc]" value="<?php echo $data->meta_value[1]; ?>">
						<input type="hidden" name="item[amount]" value="<?php echo $amount; ?>">
						<input type="hidden" name="item[id]" value="<?php echo $id; ?>">
						<input type="hidden" name="billing[billing_phone]" value="<?php echo $_POST['phone']; ?>">
						<div class="col span_6 my-billinggg">
							<h3>Billing information</h3>
							<div class="block">
								<div class="row">
								</div>
								<div class="row">
									<div id="billing-address-pane">
										<div>
											<div class="row">
												<label>First name*:</label>
												<input type="text" name="payment[firstname]" required pattern="[a-zA-Z]+" title="Only Alphabets are allowed">
											</div>
											<div class="row">
												<label>Last name*:</label>
												<input type="text" name="payment[lastname]" required pattern="[a-zA-Z]+" title="Only Alphabets are allowed">
											</div>
											<div class="row">
												<label for="edit-panes-customer-primary-email">E-mail address*:</label>
												<input type="email" name="billing[primary_email]" required>
											</div>
											<div class="row">
												<label>Street address*:</label>
												<input type="text" name="billing[billing_street1]" class="my-shiping-fielddd" required>
												<div class="my-shipinggg" style="display:none">
													<span>Add this address to your shipping address below</span> <input type="checkbox" id="checkbox1"/>
												</div>
											</div>
											<div class="row">
												<label for="edit-panes-billing-billing-city">City*:</label>
												<input type="text" name="billing[billing_city]" required>
											</div>
											<div class="row">
												<label>State/Province*:</label>
												<div>
													<select name="billing[billing_zone]" required="">
														<option value="">Select</option>
														<option value="AL">Alabama</option>
														<option value="AK">Alaska</option>
														<option value="AZ">Arizona</option>
														<option value="AR">Arkansas</option>
														<option value="CA">California</option>
														<option value="CO">Colorado</option>
														<option value="CT">Connecticut</option>
														<option value="DE">Delaware</option>
														<option value="DC">District Of Columbia</option>
														<option value="FL">Florida</option>
														<option value="GA">Georgia</option>
														<option value="HI">Hawaii</option>
														<option value="ID">Idaho</option>
														<option value="IL">Illinois</option>
														<option value="IN">Indiana</option>
														<option value="IA">Iowa</option>
														<option value="KS">Kansas</option>
														<option value="KY">Kentucky</option>
														<option value="LA">Louisiana</option>
														<option value="ME">Maine</option>
														<option value="MD">Maryland</option>
														<option value="MA">Massachusetts</option>
														<option value="MI">Michigan</option>
														<option value="MN">Minnesota</option>
														<option value="MS">Mississippi</option>
														<option value="MO">Missouri</option>
														<option value="MT">Montana</option>
														<option value="NE">Nebraska</option>
														<option value="NV">Nevada</option>
														<option value="NH">New Hampshire</option>
														<option value="NJ">New Jersey</option>
														<option value="NM">New Mexico</option>
														<option value="NY">New York</option>
														<option value="NC">North Carolina</option>
														<option value="ND">North Dakota</option>
														<option value="OH">Ohio</option>
														<option value="OK">Oklahoma</option>
														<option value="OR">Oregon</option>
														<option value="PA">Pennsylvania</option>
														<option value="RI">Rhode Island</option>
														<option value="SC">South Carolina</option>
														<option value="SD">South Dakota</option>
														<option value="TN">Tennessee</option>
														<option value="TX">Texas</option>
														<option value="UT">Utah</option>
														<option value="VT">Vermont</option>
														<option value="VA">Virginia</option>
														<option value="WA">Washington</option>
														<option value="WV">West Virginia</option>
														<option value="WI">Wisconsin</option>
														<option value="WY">Wyoming</option>
													</select>
												</div>
											</div>
											<div class="row">
												<label>Country*:</label>
												<div class="selector fixedWidth" id="uniform-edit-panes-billing-billing-country">
													<select id="edit-panes-billing-billing-country" name="billing[billing_country]" >
														<option value="US" selected="selected">United States</option>
													</select>
												</div>
											</div>
											<div class="row">
												<label>Zip Code*:</label>
												<input type="tel" name="billing[billing_postal_code]" required="" pattern="\d*" required title="only digits are allowed">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col span_6 my-methoddd">
							<style>.m-b{padding-bottom: 0}</style>
							<h3>Shipping Information</h3>
							<div class="row m-b">
								<label>Address*:</label>
								<input type="text" name="shipping[address]" class="street-address" required>
							</div>
							<div class="row m-b">
								<label for="edit-panes-billing-billing-city">City*:</label>
								<input type="text" name="shipping[city]" required="" class="my-shippp">
							</div>
							<div class="row m-b">
								<label>State/Province*:</label>
								<input type="text" name="shipping[city]" required="" class="my-shippp-1">
							</div>
							<div class="row m-b">
								<label>Country*:</label>
								<input type="text" name="shipping[country]" required="" class="my-shippp-2">
							</div>
							<div class="row m-b"">
								<label>Zip Code*:</label>
								<input type="text" name="shipping[postal_code]" required="" class="my-shippp-3">
							</div>

							<h3 style="margin-bottom: 0 !important;" class="my-headdd">Payment method</h3>
							<!---<label class="element-invisible" for="paymentmethod">Payment method <span class="form-required" title="This field is required.">*</span></label>-->
							<div class="form-radios">
								<label class="option" for="edit-panes-payment-payment-method-paypal-wps">
									<input type="radio" checked="checked" name="paymentmethod" value="paypal" class="form-radio ajax-processed">
									<img  src="https://86huaren.com/wp-content/uploads/2018/02/t55_06.png" alt="PayPal" class="uc1-credit-cctype">
								</label>
							</div>
							<div class="form-radios">
								<label class="option" for="paymentmethod">
									<input type="radio" name="paymentmethod" value="authorize" id="my-authorizeee" class="form-radio ajax-processed">
									Credit Card
									<img src="https://86huaren.com/wp-content/uploads/2018/01/gray-cards.jpg" alt="PayPal" class="uc-credit-cctype">
								</label>
							</div>
							<p>Continue with checkout to complete payment.</p>
							<div class="my-credittt">
								<div class="row">
								<label for="edit-panes-payment-details-cc-number">Card number*:</label>
								<input autocomplete="off" type="tel" id="edit-panes-payment-details-cc-number" name="payment[cc_number]" size="20" maxlength="16">
								</div>
								<div class="row">
								<label for="edit-panes-payment-details-cc-cvv">CVV*:</label>
								<input autocomplete="off" type="tel" id="edit-panes-payment-details-cc-cvv" name="payment[cc_cvv]" size="4" maxlength="4">
								</div>
								<div class="row">
								<label for="edit-panes-payment-details-cc-exp-month">Expiration Month*:</label>
								<select id="edit-panes-payment-details-cc-exp-month" name="payment[cc_exp_month]" >
									<option >Select</option>
									<option value="01">01 - January</option>
									<option value="02">02 - February</option>
									<option value="03">03 - March</option>
									<option value="04">04 - April</option>
									<option value="05">05 - May</option>
									<option value="06">06 - June</option>
									<option value="07">07 - July</option>
									<option value="08">08 - August</option>
									<option value="09">09 - September</option>
									<option value="10">10 - October</option>
									<option value="11">11 - November</option>
									<option value="12">12 - December</option>
								</select>
								</Div>
								<div class="row">
								<label for="exp-year">Expiration Year*:</label>
								<select id="exp-year" name="payment[cc_exp_year]" >
									<option >Select</option>
									<option value="2017">2018</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
									<option value="2026">2026</option>
									<option value="2027">2027</option>
									<option value="2028">2028</option>
									<option value="2029">2029</option>
									<option value="2030">2030</option>
									<option value="2031">2031</option>
									<option value="2032">2032</option>
									<option value="2033">2033</option>
									<option value="2034">2034</option>
									<option value="2035">2035</option>
									<option value="2036">2036</option>
									<option value="2037">2037</option>
								</select>
								</div>
							</div>
							<input type="submit" value="Checkout">
						</form>
					</div>
					<div class="col span_12">
						<a class="backbtn" href="https://86huaren.com/activation/?step3=true&select=<?php echo $id; ?>">Back</a>
					</div>
				<?php endif ?>
				<?php
			if($page_full_screen_rows == 'on') echo '</div>'; ?>
		</div><!--/row-->
	</div><!--/container-->
</div><!--/container-wrap-->
<?php get_footer(); ?>
<script>
	jQuery(document).ready(function() {
		jQuery('#option1, #option2').hide();
		jQuery(document).on('change', 'input[name="option"]', function(event) {
			event.preventDefault();
			if (jQuery(this).val() == '1') {
				jQuery('#option2').hide();
				jQuery('#option1').show('swing');
			}else if(jQuery(this).val() == '2'){
				jQuery('#option1').hide();
				jQuery('#option2').show('swing');
			}

		});
		jQuery(".my-shiping-fielddd").keyup(function(){
			jQuery(".my-shipinggg").show();
		});
		jQuery('#checkbox1').change(function(){
			if(this.checked){
				var streetaddress = jQuery('.my-shiping-fielddd').val();
				jQuery('.street-address').val(streetaddress);
			}
		});
		// jQuery(document).on('change', 'input.shipping', function(event) {
		// event.preventDefault();
		// var v = jQuery('input[name="shipping[address]"]').val();
		// if(this.checked) {
		// jQuery('input[name=""]').val();
		// }else{
		// }
		// });
		 jQuery("p.my-ppp").click(function(){
				       jQuery(".my-couponnn form").toggle(1000);
				    });
	});
</script>