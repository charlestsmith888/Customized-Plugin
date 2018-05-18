<?php do_action('lms_scripts'); 
$args = array('role' => 'student',); 
$users = get_users( $args ); 
?>

<?php if (!empty($_POST)): 
$i = 0;
foreach ($_POST['email']['users'] as $key => $value) {
	$user = get_user_by( 'ID', $value);
	$to          = $user->user_email;
	$subject     = $_POST['email']['subject'];
	$headers = 'From: '.$user->display_name.' <no-reply@test.in>' . "\r\n";
	$msg = $_POST['email']['textarea'];
	$attachment = str_replace(get_option('siteurl').'/wp-content', WP_CONTENT_DIR, $_POST['email']['attachment']);
	if (!empty($_POST['email']['attachment'])) {
		wp_mail($to, $subject, $msg, $headers,$attachment); 	
	}else{
		wp_mail($to, $subject, $msg); 	
	}

	// saving data in array
	$_POST['email']['users'][$i]  = $to;
	$i++;
	$data['data'] = $_POST; 
}


$historydata = json_encode($data['data']);
$postarr = array(
	'post_content' 	=> $historydata, 
	'post_title' 	=> $_POST['email']['subject'], 
	'post_type' 	=> 'email_history', 
);
wp_insert_post( $postarr, false );
?>
<div class="wrap">
	<div class="notice notice-success is-dismissible">
		<p><?php _e( 'Email Has been Sent...', 'sample-text-domain' ); ?></p>
	</div>
</div>
<?php endif ?>




<div class="card">
	<h3 class="card-header">Send Email to the users</h3>
	<div class="card-body">
		<div class="row"><!--Row Start -->
			<form method="POST">
				<?php foreach ($users as $key):
				$wpstatus = get_user_meta( $key->ID, 'pw_user_status', false );
				$status = '';
				if (empty($wpstatus[0])) {
					$status = 'approved';
				}else{
					$status = $wpstatus[0];
				} ?>
				<label class="btn btn-primary">
					<input name="email[users][]" type="checkbox" class="form-group" value="<?php echo $key->ID; ?>"> <?php echo $key->display_name.'('.$status.')';  ?>
				</label>
			<?php endforeach ?>
			
			<div class="form-group">
				<label for="uploadvideos">Select a File for attachment</label>
				<input type="button" value="Upload" class="form-control-file" id="uploadvideos">
				<!-- <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small> -->
			</div>
			<input type="hidden" name="email[attachment]" id="mediaplaceid" value="">
			<p><a href="#" id="mediaprev" target="_blank"></a></p>
			<input type="text" placeholder="Subject" name="email[subject]" class="form-control" required="required">
			<br>
			<textarea name="email[textarea]" id="input" class="form-control" rows="10" required="required">Message</textarea>
			<br>
			<button type="Submit" class="btn btn-primary">Submit</button>
		</form>
	</div><!--Row End  -->
</div>
<div class="card-footer text-muted">
</div>
</div>



<?php if (!isset($_GET['view'])): ?>
	<div class="card">
		<h3 class="card-header">View All</h3>
		<div class="card-body">
			<div class="row">
				<table class="table table-striped table-hover table-bordered">
					<thead class="thead-dark">
						<tr>
							<th>#</th>
							<th>Subject</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$q = new WP_Query(
							array('post_type' => array('email_history'),
								'post_status' => array('draft'),
							)
						);
						?>
						<?php 
						$i = 1;
						while ($q->have_posts()) : $q->the_post(); ?>
							<tr>
								<td><?php echo $i;$i++; ?></td>
								<td><?php the_title(); ?></td>
								<td><a href="?post_type=lms_students&page=send_email&view=<?php echo get_the_ID(); ?>" class="btn btn-default">View</a></td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="card-footer text-muted">
		</div>
	</div>
<?php else: ?>	


<br>
<button type="button" class="btn btn-default" onclick="window.history.back();">Back</button>

<?php 
$args = array(
  'p'         => $_GET['view'],
  'post_type' => array('email_history'),
  'post_status' => array('draft'),
);
$my_posts = new WP_Query($args);
while ( $my_posts->have_posts() ) : $my_posts->the_post(); ?>



<div class="card">
	<h3 class="card-header">View Email History<span style="float: right;"><?php the_date(); ?></span></h3>
	<div class="card-body">
		<div class="row"><!--Row Start -->
		<div class="col-md-12">
			<?php $data = json_decode(get_the_content()); //echo "<pre>";print_r($data); ?>
			<h3><strong>To :</strong> <?php foreach ($data->email->users as $key => $value): ?>
				<label class="btn btn-primary"><?php echo $value; ?></label>&nbsp;
			<?php endforeach ?>
			</h3>
			<h3><strong>Subject :</strong> <?php the_title( ); ?></h3>
			<h3><strong>Attachment :</strong><?php echo $data->email->attachment; ?></h3>
			<h3><strong>Message :</strong> <?php echo $data->email->textarea; ?></h3>
		</div>
		</div><!--Row End  -->
	</div>
	<div class="card-footer text-muted">
	</div>
</div>

<?php endwhile; // end of the loop. ?>



<?php endif ?>


<script>
// ADD IMAGE LINK
jQuery(document).on('click', '#uploadvideos', function( event ){
	event.preventDefault();
	var inputField = jQuery('#mediaplaceid');
	var preview = jQuery('#mediaprev');
// Create a new media frame
frame = wp.media({
	title: 'Select or Upload Media',
	button: {
		text: 'Use this media'
	},
multiple: false  // Set to true to allow multiple files to be selected
});
// When an image is selected in the media frame...
frame.on( 'select', function() {
// Get media attachment details from the frame state
var attachment = frame.state().get('selection').first().toJSON();
// console.log(attachment);
// attachment.id; //89
// attachment.title; //osts57yu7em91yaeazvq
// attachment.filename; //osts57yu7em91yaeazvq.jpg
// attachment.url; //http://localhost/testwp/wp-content/uploads/2017/09/osts57yu7em91yaeazvq.jpg
// attachment.link; //http://localhost/testwp/obituary/obituary-for-dorothy-ann-leslie/osts57yu7em91yaeazvq/
console.log(attachment);
inputField.val(attachment.url);
preview.text('Uploaded...');
preview.attr('href', attachment.url);
});
// Finally, open the modal on click
frame.open();
});
//refrence link
//https://codex.wordpress.org/Javascript_Reference/wp.media
</script>