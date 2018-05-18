<?php do_action('lms_scripts'); 
$user_id  = get_current_user_id();
$data = get_user_meta( $user_id, 'user_notificaitons', false );
?>


<?php if (!isset($_GET['view'])): ?>
<div class="card">
	<h3 class="card-header">View All Notifications</h3>
	<div class="card-body">
		<div class="row"><!--Row Start -->
			<table class="table table-striped table-hover table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Date</th>
						<th>Notification</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

	<?php foreach ($data as $key): $pst = get_post($key); ?>
		
					<tr>
						<td>1</td>
						<td><?php echo $pst->post_date; ?></td>
						<td><?php echo $pst->post_title; ?></td>
						<td><a href="?page=lms_notifications&view=<?php echo $pst->ID; ?>" class="btn btn-primary btn-sm">View</a></td>
					</tr>


	<?php endforeach ?>
				</tbody>
			</table>
		</div><!--Row End  -->
	</div>
	<div class="card-footer text-muted">
	</div>
</div>

<?php else: 
$pstaa = get_post($_GET['view']);
?>

<button type="button" class="btn btn-default" onclick="window.history.back();">Back</button>
<div class="card">
<h3 class="card-header">View Notification <span style="float: right;"><?php echo $pstaa->post_date; ?></span></h3>
<div class="card-body">
<div class="row"><!--Row Start -->
		<div class="col-md-12">
			<h3><?php echo $pstaa->post_title; ?></h3>
			<?php echo $pstaa->post_content; ?>
		</div>
</div><!--Row End  -->
</div>
<div class="card-footer text-muted">
</div>
</div>

<?php endif ?>