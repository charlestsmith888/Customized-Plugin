<?php do_action('lms_scripts'); 
$user_id  = get_current_user_id();
?>
<div class="card">
	<h3 class="card-header">Videos</h3>
	<div class="card-body">
		<div class="row"><!--Row Start -->
			<form action="<?php echo get_template_directory_uri(); ?>/custom/script.php" method="POST" role="form">
				<div class="form-group">
					<label for="uploadvideos">Select a Video</label>
					<input type="button" value="Upload" class="form-control-file" id="uploadvideos">
					<!-- <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small> -->
				</div>
				<input type="hidden" name="attachmentID" id="mediaplaceid" value="">
				<p><a href="#" id="mediaprev" target="_blank"></a></p>
			</form>
		</div><!--Row End  -->
	</div>
	<div class="card-footer text-muted">
	</div>
</div>

<div class="card">
	<h3 class="card-header">View All</h3>
	<div class="card-body">
		<div class="row"><!--Row Start -->
			<table class="table table-striped table-hover table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Video Name</th>
						<th>File</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					GLOBAL $post;
					$the_query = new WP_Query( array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'author' => $user_id) );
					if ( $the_query->have_posts() )
						while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<tr>
						<td>1</td>
						<td><?php echo $post->post_title; ?></td>
						<td><?php echo $post->guid; ?></td>
						<td><a href="<?php echo $post->guid; ?>" target="_blank" class="btn btn-default">View</a></td>
					</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</div><!--Row End  -->
</div>
<div class="card-footer text-muted">
</div>
</div>



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
inputField.val(attachment.id);
preview.text('Uploaded...');
preview.attr('href', attachment.url);
});
// Finally, open the modal on click
frame.open();
});
//refrence link
//https://codex.wordpress.org/Javascript_Reference/wp.media
</script>