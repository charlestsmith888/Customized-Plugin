<?php 
/*template name: Coach */



if (!empty($_POST)) {
	echo "Submiting...";
	$metaary = array(
		'gender' => $_POST['coach']['gender'],
		'school_they_represent' => $_POST['coach']['school_they_represent'],
		'phone' => $_POST['coach']['phone'],
	);
	$pass = wp_generate_password( 8, false );
	$userdata = array(
		'user_login'  =>  $_POST['coach']['email'],
		'user_email' => $_POST['coach']['email'],
		'user_pass'   =>  $pass, //need to be changed later
		'first_name' => $_POST['coach']['first_name'],
		'last_name' => $_POST['coach']['last_name'],
		'role' => 'coach',
);
	if (email_exists($userdata['user_email']) == false) {
		$user_id = wp_insert_user( $userdata );
		add_user_meta( $user_id, 'coachmeta', $metaary, false );
		$message = '
		Dear '.$_POST['coach']['first_name'].',
		Your account has been created succesfully. Here are the account login credentials
		loign :  '.$_POST['coach']['email'].'
		Password :  '.$pass.'
		';
		wp_mail( $_POST['coach']['email'], 'Registration Completed - Account Credentials', $message);
		echo "<script>window.location = '?user_created=true';</script>";
	}else{
		echo "<script>window.location = '?user_created=false';</script>";
	}
	die();
}



get_header();
nectar_page_header($post->ID);
//full page
$fp_options = nectar_get_full_page_options();
extract($fp_options);
?>

<div class="container">
	<form role="form" class="student_registration" name="student_registration" method="post" enctype="multipart/form-data">
<div class="col-xs-12">
	<div class="col-md-12">
	
		<?php if (!empty($_GET['user_created']) and $_GET['user_created'] == 'true'): ?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Registration is Successfully completed...
			</div>
		<?php endif ?>

		<?php if (!empty($_GET['user_created']) and $_GET['user_created'] == 'false'): ?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Your account is already exist...
			</div>
		<?php endif ?>


		<h3>Coach Registration</h3>
		<div class="col-sm-12">
			<div class="form-group">
				<strong>Select gender</strong>

				<label class="control-label" for="male">Male
					<input id="male" type="radio" name="coach[gender]" value="Male" checked="">
				</label>

				<label class="control-label" for="female">Female
					<input id="female" type="radio" name="coach[gender]" value="Female">
				</label>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label class="control-label">First Name</label>
				<input maxlength="200" type="text" class="form-control" required="required" name="coach[first_name]"  placeholder="First Name">
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label class="control-label">Last Name</label>
				<input maxlength="200" type="text" class="form-control" required="required" name="coach[last_name]"  placeholder="Last Name">
			</div>
		</div>		
		<div class="col-sm-6">
			<div class="form-group">
				<label class="control-label">school they represent</label>
				<input type="text" name="coach[school_they_represent]" placeholder="School they represent" class="form-control" required="required">
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label class="control-label">E-mail</label>
				<input type="email" name="coach[email]" placeholder="E-mail" maxlength="200" class="form-control" required="required">
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label class="control-label">Phone</label>
				<input type="tel" name="coach[phone]" placeholder="Phone" maxlength="200" class="form-control" required="required">
			</div>
		</div>
		<div class="col-md-12">
			<button class="btn sub btn-success btn-lg pull-left" type="submit">Submit</button>
		</div>
	</div>
</div>
			
	</form>
</div>



<style>
body{
	margin-top:40px;
}
button.btn.sub.btn-success.btn-lg.pull-left {
	font-size: 20px;
	text-transform: uppercase;
	background: #3F2249 !important;
	margin-bottom: 50px;
}
button.btn.sub.btn-success.btn-lg.pull-left:hover{
	background: #5EC24C !important;
}
.stepwizard-step p {
	margin-top: 10px;
}
.stepwizard-row {
	display: table-row;
}
.stepwizard {
	display: table;
	width: 100%;
	position: relative;
}
.stepwizard-step button[disabled] {
	opacity: 1 !important;
	filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
	top: 14px;
	bottom: 0;
	position: absolute;
	content: " ";
	width: 100%;
	height: 1px;
	background-color: #ccc;
	z-order: 0;
}
.stepwizard-step {
	display: table-cell;
	text-align: center;
	position: relative;
}
.btn-circle {
	width: 30px;
	height: 30px;
	text-align: center;
	padding: 6px 0;
	font-size: 12px;
	line-height: 1.428571429;
	border-radius: 15px;
}
.student_registration h3{
	clear:both !important;
	text-align:center !important;
	color: #54B736;
	text-shadow: 1px 1px 1px;
	letter-spacing: 1px;
	padding-bottom: 20px;
}
.student_registration h4{
	clear:both !important;
	text-align:center !important;
	color: #54B736;
	text-shadow: 1px 1px 1px;
	letter-spacing: 1px;
	padding-bottom: 10px;
}
.student_registration button.btn {
	clear: both !important;
}
.stepwizard {
	display: none;
}
body.page-id-162 {
	background: #fff !important;
}
form.student_registration {
	padding-top: 25px;
}
.student_registration label.control-label {
	color: #000 !important;
	font-size: 16px;
	text-transform: capitalize !important;
}
.student_registration input, .student_registration textarea {
	padding: 20px 0 20px 15px  !important;
	font-size: 15px !important;
	border:1px solid #61446b !important;
}
.form-group.has-error label {
	color: red !important;
}
.form-group.has-error input {
	color: red !important;
}
.student_registration select {
	font-size: 15px !important;
	border:1px solid #61446b !important;
	padding: 10px 0 10px 15px !important;
	height: 48px;
}
div#step-3 {
	padding-bottom: 60px !important;
}
</style>
<script>
	$(document).ready(function () {
		var navListItems = $('div.setup-panel div a'),
		allWells = $('.setup-content'),
		allNextBtn = $('.nextBtn');
		allWells.hide();
		navListItems.click(function (e) {
			e.preventDefault();
			var $target = $($(this).attr('href')),
			$item = $(this);
			if (!$item.hasClass('disabled')) {
				navListItems.removeClass('btn-primary').addClass('btn-default');
				$item.addClass('btn-primary');
				allWells.hide();
				$target.show();
				$target.find('input:eq(0)').focus();
			}
		});
		allNextBtn.click(function(){
			var curStep = $(this).closest(".setup-content"),
			curStepBtn = curStep.attr("id"),
			nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
			curInputs = curStep.find("input[type='text'],input[type='url']"),
			isValid = true;
			$(".form-group").removeClass("has-error");
			for(var i=0; i<curInputs.length; i++){
				if (!curInputs[i].validity.valid){
					isValid = false;
					$(curInputs[i]).closest(".form-group").addClass("has-error");
				}
			}
			if (isValid)
				nextStepWizard.removeAttr('disabled').trigger('click');
		});
		$('div.setup-panel div a.btn-primary').trigger('click');
	});
</script>
<?php get_footer(); ?>