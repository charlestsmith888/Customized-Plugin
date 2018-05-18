<?php
global $wpdb;
$query11 = $wpdb->get_results("SELECT * FROM wp_payments ORDER BY id DESC"); 
if(isset($_GET['userdel_id']) &!empty($_GET['userdel_id'])){
	$ids = $_GET['userdel_id'];
//echo $ids;
	$table = 'wp_payments';
	$where= array('id'=>$ids);
	$query2 = $wpdb->delete($table,$where);
	if($query2){
		echo '<div class="notice notice-success is-dismissible"><p>Deleted!</p></div>';
	}
	else{
		echo '<div class="notice notice-error is-dismissible"><p>Something went wrong!</p></div>';
	}
}
?>
<style>
.table-bordered {
    border: 1px solid #eceeef;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 1rem;
}
table {
    border-collapse: collapse;
    background-color: transparent;
}
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #eceeef;
}
.table-bordered td, .table-bordered th {
    border: 1px solid #eceeef;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #eceeef;
}
table#lis {
	margin-top: 45px !important;
}
</style>
<table id="lis" class="table table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Order ID</th>
			<th>Carrier</th>
			<th>Dsc</th>
			<th>Amount</th>
			<th>Billing Phone</th>
			<th>Primary Email</th>
			<th>Billing Street</th>
			<th>Billing City</th>
			<th>Billing Zone</th>
			<th>Billing Country</th>
			<th>Billing Postal Code</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Status</th>
			<th>Transcition ID</th>
			<th>Source</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$i = count($query11);
		foreach ($query11 as $hari): ?>
			<tr>
				<td><?= $i; $i--; ?></td>
				<td><?=$hari->id; ?></td>
				<td><?=$hari->carrier; ?></td>
				<td><?=$hari->dsc; ?></td>
				<td>$<?=$hari->amount; ?></td>
				<td><?=$hari->billing_phone; ?></td>
				<td><?=$hari->primary_email; ?></td>
				<td><?=$hari->billing_street; ?></td>
				<td><?=$hari->billing_city; ?></td>
				<td><?=$hari->billing_zone; ?></td>
				<td><?=$hari->billing_country; ?></td>
				<td><?=$hari->billing_postal_code; ?></td>
				<td><?=$hari->firstname; ?></td>
				<td><?=$hari->lastname; ?></td>
				<td><?=$hari->status; ?></td>
				<td><?=$hari->TRANSACTIONID; ?></td>
				<td><?=$hari->source; ?></td>
				<td><a href="<?php echo get_site_url();?>/wp-admin/admin.php?page=listing_setting&userdel_id=<?php echo $hari->id;?>"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</a> </td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>