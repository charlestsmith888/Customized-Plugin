<?php
global $wpdb;
$query11 = $wpdb->get_results("SELECT * FROM wp_payments_2 ORDER BY id DESC"); 
if(isset($_GET['userdel_id']) &!empty($_GET['userdel_id'])){
	$ids = $_GET['userdel_id'];
//echo $ids;
	$table = 'wp_payments_2';
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
			<th>iteminfo</th>
			<th>Activation</th>
			<th>Shipping</th>
			<th>Billing address</th>
			<th>Billing</th>
			
			<th>Status</th>
			<th>Transcition ID</th>
			<th>Source</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$i = count($query11);
		foreach ($query11 as $hari): 
			
			$content1 = json_decode($hari->content);
			$content2 = json_decode($hari->content2);





		?>
		<tr>
			<td><?= $i; $i--; ?></td>
			<td><?php echo $hari->id; ?></td>
			<td>
				<?php 
				foreach ($content2->iteminfo as $key1 => $value1) {
					echo '<strong>'.$key1.'</strong>'.' : '.$value1.'&nbsp;';
				}
				?>

			</td>
			<td>
				<?php 
				foreach ($content2->option as $key2 => $value2) {
					echo '<strong>'.$key2.'</strong>'.' : '.$value2.'&nbsp;';
				}
				?>
			</td>
			<td>
				<?php 
				foreach ($content1->shipping as $key3 => $value3) {
					echo '<strong>'.$key3.'</strong>'.' : '.$value3.'&nbsp;';
				}
				?>					
			</td>			
			<td>
				<?php 
				foreach ($content1->billing as $key3 => $value3) {
					echo '<strong>'.$key3.'</strong>'.' : '.$value3.'&nbsp;';
				}
				?>					
			</td>
			<td>
				<?php 
				foreach ($content2->option as $key4 => $value4) {
					echo '<strong>'.$key4.'</strong>'.' : '.$value4.'&nbsp;';
				}
				?>				
			</td>
				



				

				<td><?=$hari->status; ?></td>
				<td><?=$hari->TRANSACTIONID; ?></td>
				<td><?=$hari->source; ?></td>
				<td><a href="<?php echo get_site_url();?>/wp-admin/admin.php?page=activation_listing_setting&userdel_id=<?php echo $hari->id;?>"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</a> </td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>