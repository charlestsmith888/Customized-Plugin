<?php
/*template name: Register */
get_header();
nectar_page_header($post->ID);
//full page
$fp_options = nectar_get_full_page_options();
extract($fp_options);
?>
<div class="container">
	<div class="stepwizard">
		<div class="stepwizard-row setup-panel">
			<div class="stepwizard-step">
				<a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
				<p>Step 1</p>
			</div>
			<div class="stepwizard-step">
				<a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
				<p>Step 2</p>
			</div>
			<div class="stepwizard-step">
				<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
				<p>Step 3</p>
			</div>
		</div>
	</div>
	<form role="form" class="student_registration" name="student_registration" action="<?php echo site_url('/process'); ?>" method="post" enctype="multipart/form-data">
		<div class="row setup-content" id="step-1">
			<div class="col-xs-12">
				<div class="col-md-12">
					<h3>PERSONAL INFORMATION</h3>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Participant Full Name</label>
							<input maxlength="200" type="text" class="form-control" required="required" name="admission[fullname]"  placeholder="Participant Full Name">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Admission Date</label>
							<input type="date" name="admission[date]" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Address</label>
							<input type="text" name="admission[address]" maxlength="200" placeholder="Address" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">City</label>
							<input type="text" name="admission[city]" placeholder="City" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">State</label>
							<input type="text" name="admission[state]" placeholder="State" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Country</label>
							<input type="text" name="admission[country]" placeholder="country" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Postal Code</label>
							<input type="text" name="admission[postal_code]" placeholder="Postal Code" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">E-mail</label>
							<input type="email" name="admission[email]" placeholder="E-mail" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Phone</label>
							<input type="tel" name="admission[phone]" placeholder="Phone" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="male">Select gender</label>
							<input id="male" type="radio" name="admission[gender]" value="Male" required="required">
							Male
							<label class="control-label" for="female">
								<input id="female" type="radio" name="admission[gender]" value="Female">
								Female
							</label>
						</div>
					</div>
					<h3>EDUCATION BACKGROUND</h3>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">High School</label>
							<input type="text" name="admission[high_school]" placeholder="High School" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Class of</label>
							<input type="text" name="admission[class_of]" placeholder="Class of" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">GPA</label>
							<input type="text" name="admission[gpa]" placeholder="GPA" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">SAT/ACT</label>
							<input type="text" name="admission[SAT_ACT]" placeholder="SAT/ACT" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<h3>FUTURE EDUCATION</h3>
					<h4>Fields of study or academic Majors of</h4>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Interest</label>
							<input type="text" name="admission[interest]" placeholder="Interest" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Do you have a specific college in mind?</label>
							<input type="text" name="admission[specific_college]" placeholder="Do you have a specific college in mind?" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Do you have a preferred city or state?</label>
							<input type="text" name="admission[preferred_city]" placeholder="Do you have a preferred city or state?" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6"></div>
					<h3>SOCCER INFORMATION</h3>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Height</label>
							<input type="email" name="admission[height]" placeholder="Height" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Phone</label>
							<input type="tel" name="admission[phone]" placeholder="Phone" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Dominant Leg: Right</label>
							<input type="text" name="admission[dominant]" placeholder="Dominant Leg: Right" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Left</label>
							<input type="text" name="admission[socrleft]" placeholder="Left" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Both</label>
							<input type="text" name="admission[socrboth]" placeholder="Both" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Enter Your Position</label>
							<input type="text" name="admission[1position]" placeholder="Enter Your Position" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Enter Your Position</label>
							<input type="text" name="admission[2position]" placeholder="Enter Your Position" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Enter Your Position</label>
							<input type="text" name="admission[3position]" placeholder="Enter Your Position" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">How did you learn about College Doorway? (Please describe)</label>
							<textarea name="admission[how_did_you_learn]" rows="5" class="form-control" required="required" placeholder="How did you learn about College Doorway? (Please describe)"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Referred by</label>
							<input type="text" name="admission[referred]" placeholder="Referred by" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
				</div>
			</div>
		</div>
		<div class="row setup-content" id="step-2">
			<div class="col-xs-12">
				<div class="col-md-12">
					<h3> Step 2</h3>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Printed Name</label>
							<input type="text" name="enrollment[name]" placeholder="Printed Name" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Signature</label>
							<input type="text" name="enrollment[signature]" placeholder="Signature" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Date</label>
							<input type="text" name="enrollment[date]" placeholder="Date" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Parent/Guardian Printed Name (if under 18)</label>
							<input type="text" name="enrollment[guardian_name]" placeholder="Parent/Guardian Printed Name (if under 18)" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Parent/Guardian Signature</label>
							<input type="text" name="enrollment[signature]" placeholder="Parent/Guardian Signature" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
				</div>
			</div>
		</div>
		<div class="row setup-content" id="step-3">
			<div class="col-xs-12">
				<div class="col-md-12">

	
					<h3>Select Course:</h3>
						<div class="col-sm-12">
						<?php
						$q = new WP_Query(
							array('post_type' => array('lms_courses'),
								'post_status' => array('publish'),
							));
							?>
							<?php while ($q->have_posts()) : $q->the_post(); ?>
								<label for="corses<?php echo get_the_ID(); ?>">
									<input id="corses<?php echo get_the_ID(); ?>" type="radio" name="course[id]" value="<?php echo get_the_ID(); ?>">
									<?php the_title();
									echo '  $'.get_the_content(); ?>
								</label>
							<?php endwhile; ?>
						</div>



					<h3>Payment Detail:</h3>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">First Name*:</label>
							<input autocomplete="off" type="text" id="payment_firstName" name="payment[firstname]" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Last Name*:</label>
							<input autocomplete="off" type="text" id="payment_lastname" name="payment[lastname]" maxlength="200" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Card number*:</label>
							<input autocomplete="off" type="tel" id="edit-panes-payment-details-cc-number" name="payment[cc_number]" size="20" maxlength="16" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">CVV*:</label>
							<input autocomplete="off" type="tel" id="edit-panes-payment-details-cc-cvv" name="payment[cc_cvv]" size="4" maxlength="4" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Expiration Month*:</label>
							<select id="edit-panes-payment-details-cc-exp-month" name="payment[cc_exp_month]" class="form-control" required="required">
								<option>Select</option>
								<option value="1">01 - January</option>
								<option value="2">02 - February</option>
								<option value="3">03 - March</option>
								<option value="4">04 - April</option>
								<option value="5">05 - May</option>
								<option value="6">06 - June</option>
								<option value="7">07 - July</option>
								<option value="8">08 - August</option>
								<option value="9">09 - September</option>
								<option value="10">10 - October</option>
								<option value="11">11 - November</option>
								<option value="12">12 - December</option>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Expiration Year*:</label>
							<select id="exp-year" name="payment[cc_exp_year]"class="form-control" required="required">
								<option>Select</option>
								<option value="2017">2018</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
								<option value="2024">2024</option>
								<option value="2025">2025</option>
								<option value="2026">2026</option>
								<option value="2027">2027</option>
								<option value="2028">2028</option>
								<option value="2029">2029</option>
								<option value="2030">2030</option>
								<option value="2031">2031</option>
								<option value="2032">2032</option>
								<option value="2033">2033</option>
								<option value="2034">2034</option>
								<option value="2035">2035</option>
								<option value="2036">2036</option>
								<option value="2037">2037</option>
							</select>
						</div>
					</div>
					<button class="btn sub btn-success btn-lg pull-right" type="submit">Submit</button>
				</div>
			</div>
		</div>
	</form>
</div>
<style>
body{
	margin-top:40px;
}
button.btn.sub.btn-success.btn-lg.pull-right {
	font-size: 20px;
	text-transform: uppercase;
	background: #3F2249 !important;
}
button.btn.sub.btn-success.btn-lg.pull-right:hover{
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
body.page-id-162 #ajax-content-wrap{
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