<?php 

global $wpdb;
if (isset($_POST['status'])): 
global $wpdb;
$wpdb->insert('wp_coupon', $_POST);
echo '<div class="notice notice-success is-dismissible">Inserted!</div>';
endif; 


if (isset($_GET['Delete'])): 
global $wpdb;
$wpdb->delete('wp_coupon', array( 'id' => $_GET['id'] ));
echo '<div class="notice notice-success is-dismissible">Deleted!</div>';
endif;

?>




<form action="" method="POST">
	<input type="hidden" name="status" value="active">
	<table class="form-table">
		<tr>
			<th scope="row"><label for="blogname">Discount Type</label></th>
			<td>
				<select name="discounttype">
					<option value="">Select</option>
					<option value="flat">Flat Discount</option>
					<option value="percent">Percentage %</option>
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="blogname">Discount Code</label></th>
			<td><input name="couponcode" type="text"></td>
		</tr>
		<tr>
			<th scope="row"><label for="blogname">Amount</label></th>
			<td><input name="amount" type="number"></td>
		</tr>
		<tr>
			<th scope="row"><label for="blogname">End Date</label></th>
			<td><input name="endDate" type="date"></td>
		</tr>
	</table>	
<p class="submit"><input type="submit" class="button button-primary" value="Submit"></p>
</form>


<table class="form-table">
	<thead>
		<tr>
			<td>#</td>
			<td>Discount Type</td>
			<td>Coupon</td>
			<td>Amount</td>
			<td>End Date</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
	
	<?php $data  = $wpdb->get_results('SELECT * FROM wp_coupon'); 

	if ($data): 
		$i = 1;
	foreach ($data as $key): ?>
		<tr>
			<td><?php echo $i; $i++; ?></td>
			<td><?php echo $key->discounttype; ?></td>
			<td><?php echo $key->couponcode; ?></td>
			<td><?php echo $key->amount; ?></td>
			<td><?php echo $key->endDate; ?></td>
			<td><a href="?page=cs_coupons_addding&id=<?php echo $key->id; ?>&Delete=True" class="button button-primary">Delete</a></td>
		</tr>
			
		<?php endforeach;
		endif ?>



	</tbody>
</table>

