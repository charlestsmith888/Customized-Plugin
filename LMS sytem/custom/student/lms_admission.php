<?php do_action('lms_scripts'); 
if (!empty($_GET['post'])) {
	$pst = get_post($_GET['post']);
	$user_id  = $pst->post_author;
}else{
	$user_id  = get_current_user_id();
}
$enrolment = get_user_meta( $user_id, 'user_admission', true );
$data = json_decode( $enrolment, $assoc_array = false );
?>



<div class="card">
	<h3 class="card-header">Admission Form</h3>
	<div class="card-body">
		<div class="row">
			<?php foreach ($data as $key => $value): ?>
				<div class="col-md-4">
					<div class="form-group">
						<label><?php echo strtoupper($key); ?></label>
						<input type="text" class="form-control" value="<?php echo $value; ?>" readonly>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<div class="card-footer text-muted">
		</div>
	</div>
</div>	