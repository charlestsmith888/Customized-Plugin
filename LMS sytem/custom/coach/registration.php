<?php do_action('lms_scripts'); 

$args = array('role' => 'student',); 
$users = get_users( $args ); 
?>


<?php if (!isset($_GET['view'])): ?>



	<div class="card">
		<h3 class="card-header">Students Registration</h3>
		<div class="card-body">
			<div class="row"><!--Row Start -->

				<table class="table table-striped table-hover table-bordered">
					<thead class="thead-dark">
						<tr>
							<th>#</th>
							<th>Student Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>


						<?php $i = 1; foreach ($users as $key): ?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $key->data->display_name; ?></td>
								<td><a href="?page=lms_registrations&view=<?php echo $key->data->ID; ?>" class="btn btn-primary btn-sm">View</a></td>
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

$user_id  = get_current_user_id();
$enrolment = get_user_meta( $_GET['view'], 'user_admission', true );
$data = json_decode( $enrolment, $assoc_array = false );
?>


	<button type="button" class="btn btn-default" onclick="window.history.back();">Back</button>

	<div class="card">
		<h3 class="card-header">View Student Registration</h3>
		<div class="card-body">
			<div class="row"><!--Row Start -->

				<?php if ($data): ?>
					<?php foreach ($data as $key => $value): ?>
						<div class="col-md-4">
							<div class="form-group">
								<label><?php echo strtoupper($key); ?></label>
								<input type="text" class="form-control" value="<?php echo $value; ?>" readonly>
							</div>
						</div>
					<?php endforeach ?>
				<?php endif ?>
				
			</div><!--Row End  -->
		</div>
		<div class="card-footer text-muted">
		</div>
	</div>

<?php endif ?>


