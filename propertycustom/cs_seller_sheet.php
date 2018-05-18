<?php 
do_action('pro_property_scripts'); 
// Get Rehab Cost from this file
require 'get_rehab_cost.php'; 
if (empty($overal_total)) {
	$overal_total = '';
}

if (!empty($_POST)) {
	if (seller_sheet_insert($_POST)) {
		echo '<div class="alert alert-success">Seller sheet has been created!</div>';		
	}
}
?>



<style>
.card-header {
	font-size: 20px;
	font-weight: 700;
}
</style>


<form action="" method="POST">

<div class="row"><!--Row-->
	<div class="col-md-6">
		<div class="card bg-light mb-3" style="width: 100% !important;max-width: 100%!important;">
			<div class="card-header">Select Property</div>
			<div class="card-body">
				<div class="form-group">
					<label class="col-form-label"><strong>Select Property</strong></label>
					<select id="selectproperty" class="form-control" required="required" name="rehabID">
						
						<?php if (!empty($_GET['id'])): ?>
							<option value="<?php echo $_GET['id']; ?>"><?php echo get_the_title($_GET['id']); ?></option>
						<?php else: ?>
							<option>Select Property</option>
						<?php endif ?>


						<?php 
						$args = array(
						'post_type' => 'properties' //any keyword is for any post type
						);
						$my_posts = new WP_Query($args);
						while ( $my_posts->have_posts() ) : $my_posts->the_post(); ?>
							<option value="<?php echo get_the_ID(); ?>"><?php echo get_the_title(); ?></option>
						<?php endwhile; // end of the loop. ?>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card bg-light mb-3" style="width: 100% !important;max-width: 100%!important;">
			<div class="card-header">+</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-form-label">Market Value:</label>
							<input type="number" class="form-control" id="marketvalue" name="sellersheet[marketvalue]" required="" value="0">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-form-label">Asking Price:</label>
							<input type="text" class="form-control" value="0" id="askingprice" name="sellersheet[askingprice]">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-form-label">Avg. Days on Market:</label>
							<input type="text" class="form-control" id="avgdays" value="0" name="sellersheet[avgdays]">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>

<!-- Second Section -->
<div class="row"><!--Row-->
	<div class="col-md-12">
		<div class="card bg-light mb-3" style="width: 100% !important;max-width: 100%!important;">
			<div class="card-header">Monthly Expenses:</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-form-label">Monthly Taxes:</label>
							<input type="number" id="yearlytaxes" class="form-control" required="required" value="0" name="sellersheet[yearlytaxes]">
						</div>
						<div class="form-group">
							<label class="col-form-label">Monthly Insurance:</label>
							<input type="number" id="yearlyinsurance" class="form-control" required="required" value="0" name="sellersheet[yearlyinsurance]">
						</div>
						<div class="form-group">
							<label class="col-form-label">Monthly PMI:</label>
							<input type="text" class="form-control" required="required" id="MonthlyPMI" name="sellersheet[MonthlyPMI]" value="0">
						</div>
						<div class="form-group">
							<label class="col-form-label">Monthly HOA:</label>
							<input type="text" class="form-control" required="required" id="MonthlyHOA" name="sellersheet[MonthlyHOA]" value="0">
						</div>
						<div class="form-group">
							<label class="col-form-label">Monthly:</label> 
							<input type="text" class="form-control" id="Monthlyexp_show" required="required" readonly="" value="0" name="sellersheet[Monthlyexp_show]">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-form-label">Water Bills:</label>
							<input type="number" id="waterbill" class="form-control" required="required" value="0" name="sellersheet[waterbill]">
						</div>
						<div class="form-group">
							<label class="col-form-label">Gas Bills:</label>
							<input type="number" id="gasbill" class="form-control" required="required" value="0" name="sellersheet[gasbill]">
						</div>
						<div class="form-group">
							<label class="col-form-label">Electric Bills:</label>
							<input type="number" id="Electricbill" class="form-control" required="required" value="0" name="sellersheet[Electricbill]">
						</div>
						<div class="form-group">
							<label class="col-form-label">Yard Maintenance:</label>
							<input type="number" id="yardmaintainance" class="form-control" required="required" value="0" name="sellersheet[yardmaintainance]">
						</div>
						<div class="form-group">
							<label class="col-form-label">Other Bills:</label>
							<input type="number" id="otherbills" class="form-control" required="required" value="0" name="sellersheet[otherbills]">
						</div>
						<div class="form-group">
							<label class="col-form-label">Monthly Utility Bills:</label>
							<input type="text" id="Monthlyutilitybills" class="form-control" required="required" value="0" name="sellersheet[Monthlyutilitybills]" readonly="">
						</div>
					</div>
					<div class="col-md-4"> 
	

						<div class="form-group">
							<label class="col-form-label">PI:</label>
							<input type="text" id="PITI" class="form-control" required="required" value="0" name="sellersheet[PITI]">
						</div>

						<div class="form-group">
							<label class="col-form-label">Total Monthly Expenses:</label>
							<input type="text" id="totalmonthlyexpenses" class="form-control" required="required" value="0" name="sellersheet[totalmonthlyexpenses]" readonly="">
						</div>

						

						<div class="row"><div class="col-md-12"><button id="ADD">+</button></div></div>

						<!-- Append data Here  -->
						<div class="appendhere">

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-form-label">Additional Expenses:</label>
										<input type="text" id="additionalexpensesss" class="form-control" required="required" name="additionexp[name][]">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-form-label">Amount:</label>
										<input type="text" class="form-control addtional_amount" required="required" value="0" name="additionexp[amount][]">
									</div>
								</div>
							</div>

						</div>

						
						<div class="form-group">
							<label class="col-form-label">Total Additional Expenses:</label>
							<input type="text" id="totaladditionalexpenses" class="form-control" value="0" readonly="">
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- 3rd Section to be from here -->

<!-- Second Section -->
<div class="row"><!--Row-->
	<div class="col-md-12">
		<div class="card bg-light mb-3" style="width: 100% !important;max-width: 100%!important;">
			<div class="card-header">Selling Expenses:</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label class="col-form-label">Average Offer:</label>
							<input type="text" class="form-control" id="averageoffer" placeholder="Amount in %" name="sellersheet[averageoffer]">
							<span id="averageoffershow">$0</span>
						</div>						
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="col-form-label">Realtor Comission:</label>
							<input type="tel" class="form-control" value="0.3" readonly="" name="sellersheet[Realtor_Comission]" id="Realtor_Comission">
							<span id="Realtor_Comission_show">$0</span>
						</div>						
					</div>
				<div class="col-md-3">
					<div class="form-group">
						<label class="col-form-label">Closing Costs (2-3%):</label>
						<input type="text" class="form-control" id="closing_costs" value="0" name="sellersheet[closing_costs]" readonly="">
					</div>						
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label class="col-form-label">Holding Costs:</label>
						<input type="text" class="form-control" id="holding_cost" value="0" name="sellersheet[holding_cost]" readonly="">
					</div>						
				</div>				
				</div>
			</div>
		</div>
	</div>
</div>


<!-- 4th Section to be from here -->

<!-- Second Section -->
<div class="row"><!--Row-->
	<div class="col-md-12">
		<div class="card bg-light mb-3" style="width: 100% !important;max-width: 100%!important;">
			<div class="card-header">Delinquent Bills:</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-form-label">Property Taxes:</label>
							<input type="text" class="form-control" id="property_taxes" value="0" name="sellersheet[property_taxes]">
						</div>	
						<div class="form-group">
							<label class="col-form-label">Water Bills:</label>
							<input type="text" class="form-control" id="waterbills" value="0" name="sellersheet[waterbills]">
						</div>	
						<div class="form-group">
							<label class="col-form-label">Gas Bills:</label>
							<input type="text" class="form-control" id="gasbills" value="0" name="sellersheet[gasbills]">
						</div>	
						<div class="form-group">
							<label class="col-form-label">Electric Bills:</label>
							<input type="text" class="form-control" id="Electricbills" value="0" name="sellersheet[Electricbills]">
						</div>	
						<div class="form-group">
							<label class="col-form-label">Total Delinquent Bills:</label>
							<input type="text" class="form-control" readonly="" id="totaldelinquentbilss" value="0" name="sellersheet[totaldelinquentbilss]">
						</div>						
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-form-label">Rehab Costs:</label>
							<input type="text" class="form-control" readonly="" id="rehabcost1" name="sellersheet[rehabcost1]" value="<?php echo $overal_total; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




<!-- 5th Section to be from here -->

<!-- Second Section -->
<div class="row"><!--Row-->
	<div class="col-md-12">
		<div class="card bg-light mb-3" style="width: 100% !important;max-width: 100%!important;">
			<div class="card-header">Total Selling Expenses:</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-form-label">Sales Price:</label>
							<input type="text" class="form-control" id="salespriceshow" readonly="" name="sellersheet[salespriceshow]" value="0">
						</div>	
						<div class="form-group">
							<label class="col-form-label">Your Total Cost to Sell:</label>
							<input type="text" class="form-control" readonly="" id="totalcosttosell" name="sellersheet[totalcosttosell]" value="0">
						</div>	

						<div class="form-group">
							<label class="col-form-label">Project cost:</label>
							<input type="text" class="form-control" readonly="" id="project_cost" name="sellersheet[project_cost]" value="0">
						</div>							
						<div class="form-group">
							<label class="col-form-label">MOA:</label>
							<input type="text" class="form-control" readonly="" id="MOA" name="sellersheet[MOA]" value="0">
						</div>		
						<div class="form-group">
							<label class="col-form-label">Grand Total expenses:</label>
							<input type="text" class="form-control" readonly="" id="grand_total_expenses" name="sellersheet[grand_total_expenses]" value="0">
						</div>	
						<div class="form-group">
							<label class="col-form-label">Investor Profit:</label>
							<input type="text" class="form-control" readonly="" id="investor_profit" name="sellersheet[investor_profit]" value="0">
						</div>								

					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-form-label">Delinquent Bills:</label>
							<input type="text" class="form-control" readonly="" id="Delinquent_bills_show" name="sellersheet[Delinquent_bills_show]" value="0">
						</div>	
						<div class="form-group">
							<label class="col-form-label">Rehab Costs:</label>
							<input type="text" class="form-control" value="<?php echo $overal_total; ?>">
						</div>	
						<div class="form-group">
							<label class="col-form-label">Additional Expenses:</label>
							<input type="text" class="form-control" id="Additionalexpenses" name="sellersheet[Additionalexpenses]" readonly="" value="0">
						</div>	
						<div class="form-group">
							<label class="col-form-label">Investor Profits:</label>
							<input type="text" class="form-control" id="inventorProfies" name="sellersheet[inventorProfies]" value="0">
							<span id="InvestorProfits_show"></span>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<button type="submit" class="btn btn-sm btn-default">Save</button>


</form>

<script>

	<?php 	$getdata  = get_post_meta( @$_GET['id'], 'pro_seller_sheet', true);
			$getdata2  = get_post_meta( @$_GET['id'], 'pro_seller_sheet_additional', true);
			if (!empty($getdata)): ?>
				var json_ob = <?php echo $getdata ?>;
				for(x in json_ob){
					jQuery('#'+x).val(json_ob[x]);
				}
			<?php endif ?>
			
			<?php if (!empty($getdata2 )): ?>
			var getdata2 = <?php echo $getdata2 ?>;
			
				jQuery('.appendhere').html('');
				for(y in getdata2.name){
					jQuery('.appendhere').append('<div class="row"><div class="col-md-6"><div class="form-group"><label class="col-form-label">Additional Expenses:</label><input type="text" id="additionalexpensesss" class="form-control" required="required" value="'+getdata2.name[y]+'" name="additionexp[name][]"></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label">Amount:</label><button id="REMOVE" style="float:right;">-</button><input type="text" id="additionalexpensesssamount" class="form-control addtional_amount" required="required" value="'+getdata2.amount[y]+'" name="additionexp[amount][]"></div></div></div>');
				}


				jQuery(document).ready(function() {
					
					additional_amount_total();
					average_offer_function();
					realtor_commission_function();
					investorprofitsshow();
					grand_total_expenses();
					investor_profit();
				});

			<?php endif ?>





	jQuery(document).ready(function() {
		jQuery('#selectproperty').change(function(event) {
			jQuery('#avgdays').attr('placeholder', 'Default is 90 Days');
			var v = jQuery(this).val(); 
			window.location = '<?php echo site_url(); ?>/wp-admin/edit.php?post_type=properties&page=seller_net_sheet&id='+v;
		});
	});

	jQuery(document).on('keyup', '#yearlytaxes , #yearlyinsurance, #MonthlyPMI, #MonthlyHOA', function(event) {
		event.preventDefault();
		var t =  parseInt(jQuery('#yearlytaxes').val());
		var i =  parseInt(jQuery('#yearlyinsurance').val());
		var u =  parseInt(jQuery('#MonthlyPMI').val());
		var v =  parseInt(jQuery('#MonthlyHOA').val());
		var cal  = t+i+u+v;
		jQuery('#Monthlyexp_show').val(cal);
		totalsales();
		total_cost_to_sale();
	});

	jQuery(document).on('keyup', '#waterbill , #gasbill , #Electricbill , #yardmaintainance, #otherbills', function(event) {
		event.preventDefault();
		var w =  parseInt(jQuery('#waterbill').val());
		var g =  parseInt(jQuery('#gasbill').val());
		var e =  parseInt(jQuery('#Electricbill').val());
		var y =  parseInt(jQuery('#yardmaintainance').val());
		var o =  parseInt(jQuery('#otherbills').val());
		var cal  = w+g+e+y+o;
		jQuery('#Monthlyutilitybills').val(cal);
		totalsales()
		total_cost_to_sale();
	});

	jQuery(document).on('keyup', '#averageoffer', function(event) {
		event.preventDefault();

		average_offer_function();


		closing_costs_calculations();
		salesprice();
		total_cost_to_sale();

	});


function average_offer_function() {
	var w =  parseInt(jQuery('#marketvalue').val());
	var t =  parseFloat(jQuery('#averageoffer').val());

	var cal  = w*t;
	jQuery('#averageoffershow').text(priceformat(cal));
}



	jQuery(document).on('keyup', '#Realtor_Comission', function(event) {
		event.preventDefault();

		realtor_commission_function();

		closing_costs_calculations();
		holding_cost();
		total_cost_to_sale();
	});


function realtor_commission_function() {
		var w =  parseInt(jQuery('#askingprice'). val());
		var t =  0.03;//parseFloat(jQuery('#Realtor_Comission').val());

		var cal  = w*t;
		jQuery('#Realtor_Comission_show').text(priceformat(cal));
}




	jQuery(document).on('keyup', '#property_taxes , #waterbills, #gasbills , #Electricbills ', function(event) {
		event.preventDefault();
		var a =  parseInt(jQuery('#property_taxes').val());
		var b =  parseInt(jQuery('#waterbills').val());
		var c =  parseInt(jQuery('#gasbills').val());
		var d =  parseInt(jQuery('#Electricbills').val());
		var cal  = a+b+c+d;
		jQuery('#totaldelinquentbilss').val(priceformat(cal));
		total_cost_to_sale();
		Delinquent_Bills_show();
	});

	jQuery(document).on('keyup', '#PITI', function(event) {
		event.preventDefault();
		totalsales();
		holding_cost();
	});


	function totalsales() {
		var me =  parseInt(jQuery('#Monthlyexp_show').val());
		var mu =  parseInt(jQuery('#Monthlyutilitybills').val());
		var PITI =  parseInt(jQuery('#PITI').val());
		var cal  = me+mu+PITI;
		jQuery('#totalmonthlyexpenses').val(cal);
	}
	function priceformat(price='') {
		var v  = '$'+price;
		return v;
	}
	function clearpriceformat(price='') {
		var v  = price.replace('$', '');
		return v;
	}
	function closing_costs_calculations() {
		var t =  parseFloat(jQuery('#askingprice').val());
		var cal  = t*0.03;
		jQuery('#closing_costs').val(priceformat(cal));
	}
	function holding_cost() {
		var h = jQuery('#totalmonthlyexpenses').val();
		var cal = h*4;
		jQuery('#holding_cost').val(cal);
	}
	function salesprice() {
		var h = jQuery('#marketvalue').val();
		jQuery('#salespriceshow').val(h);
	}
	function total_cost_to_sale() {
		
		var r =  parseFloat(clearpriceformat(jQuery('#Realtor_Comission_show').text()));
		var c =  parseFloat(clearpriceformat(jQuery('#closing_costs').val()));
		var h =  parseFloat(clearpriceformat(jQuery('#holding_cost').val()));
		
		
		var uuuu =  parseFloat(jQuery('#marketvalue').val());
		var cal2  = uuuu*0.06;

		var cal  = r+c+h+cal2;
		jQuery('#totalcosttosell').val(cal);
	}
	function Delinquent_Bills_show() {
		var h = jQuery('#totaldelinquentbilss').val();
		jQuery('#Delinquent_bills_show').val(h);
	}

	jQuery('#ADD').click(function(event) {
		event.preventDefault();
		jQuery('.appendhere').append('<div class="row"><div class="col-md-6"><div class="form-group"><label class="col-form-label">Additional Expenses:</label><input type="text" id="additionalexpensesss" class="form-control" required="required" name="additionexp[name][]"></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label">Amount:</label><button id="REMOVE" style="float:right;">-</button><input type="text" id="additionalexpensesssamount" class="form-control addtional_amount" required="required" value="0" name="additionexp[amount][]"></div></div></div>');
		additional_amount_total();
	});

	jQuery(document).on('click', '#REMOVE', function(event) {
		event.preventDefault();
		jQuery(this).parent().parent().parent().remove();
		additional_amount_total();
	});



	jQuery(document).on('keyup', '.addtional_amount', function(event) {
		event.preventDefault();
		additional_amount_total();
	});


	function additional_amount_total() {
		var v = 0;
		jQuery('.addtional_amount').each(function(index, el) {
			 v += parseFloat(jQuery(this).val());
		});
		jQuery('#totaladditionalexpenses').val(v);
		jQuery('#Additionalexpenses').val(v);
	}


jQuery(document).on('keyup', '#inventorProfies', function(event) {
	event.preventDefault();
	investorprofitsshow();
});

	function investorprofitsshow() {
		var t = parseFloat(clearpriceformat(jQuery('#salespriceshow').val()));		
		var w = parseFloat(jQuery('#inventorProfies').val());
		var cal = t*w;
		if (!cal) {
			cal = 0;
		}
		jQuery('#InvestorProfits_show').text(priceformat(cal));		
	}



	

	jQuery(document).on('keyup', '#askingprice', function(event) {
		event.preventDefault();
		Project_cost_calculations();
		realtor_commission_function()
	});


	jQuery(document).on('keyup', '#marketvalue', function(event) {
		event.preventDefault();
		var v = jQuery(this).val();
		var cal = v*0.7;
		jQuery('#MOA').val(cal); 
		investor_profit();
		salesprice();
	});

	function Project_cost_calculations() {
		var a 	=  parseFloat(jQuery('#askingprice').val());
		var b 	=  parseFloat(jQuery('#rehabcost1').val());
		var cal =  a+b;
		jQuery('#project_cost').val(cal);
	}


	function grand_total_expenses() {
		var a 	=  parseFloat(clearpriceformat(jQuery('#Delinquent_bills_show').val()));
		var b 	=  parseFloat(jQuery('#rehabcost1').val());
		var c 	=  parseFloat(jQuery('#Additionalexpenses').val());
		var d 	=  parseFloat(jQuery('#totalcosttosell').val());
		var cal = a+b+c+d;
		jQuery('#grand_total_expenses').val(cal);
	}



	function investor_profit() {
		var a 	=  parseFloat(jQuery('#marketvalue').val());
		var b 	=  parseFloat(jQuery('#grand_total_expenses').val());		
		var cal = a+b;
		jQuery('#investor_profit').val(cal);
		grand_total_expenses();
	}

	

</script>


