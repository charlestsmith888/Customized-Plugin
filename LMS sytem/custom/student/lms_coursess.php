<?php do_action('lms_scripts'); 
if (!empty($_GET['post'])) {
	$pst = get_post($_GET['post']);
	$user_id  = $pst->post_author;
}else{
	$user_id  = get_current_user_id();
}
$Courses = get_user_meta( $user_id, 'user_corses', false );
?>



<div class="card">
	<h3 class="card-header">Courses</h3>
	<div class="card-body">
		<div class="row"><!--Row Start -->
			<table class="table table-striped table-hover table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Course Name</th>
						<th>Course Fees</th>
						<th>Course Payment Status</th>
					</tr>
				</thead>
				<tbody>
					<?php $i =1; foreach ($Courses as $key): $data = json_decode($key); ?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $data->course; ?></td>
						<td>$<?php echo $data->amount; ?></td>
						<td><?php echo strtoupper($data->paymentstatus); ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div><!--Row End  -->
</div>
<div class="card-footer text-muted">
</div>
</div>