<?php do_action('pro_property_scripts');
if (!empty($_GET['post'])) {
	$varrr = get_post_meta( $_GET['post'], 'customfiels', true);
	$metaexterior = get_post_meta( $_GET['post'], 'metaexterior', true);
	$metainterior = get_post_meta( $_GET['post'], 'metainterior', true);
	$metagarage = get_post_meta( $_GET['post'], 'metagarage', true);
}
$exterior 	= get_option( 'Default_exterior');
$garage 	= get_option( 'Default_garage');
$interior 	= get_option( 'Default_interior');
?>
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label class="col-form-label" for="inputDefault">Property Address</label>
			<input type="text" class="form-control" name="customfiels[Property_Address]" value="<?php if(!empty($varrr)){ echo $varrr['Property_Address']; } ?>">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label class="col-form-label" for="inputDefault">City</label>
			<input type="text" class="form-control" name="customfiels[City]" value="<?php if(!empty($varrr)){ echo $varrr['City']; } ?>">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label class="col-form-label" for="inputDefault">Country</label>
			<input type="text" class="form-control" value="<?php if(!empty($varrr)){ echo $varrr['Country']; } ?>" name="customfiels[Country]">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label class="col-form-label" for="inputDefault">Zip</label>
			<input type="text" class="form-control" value="<?php if(!empty($varrr)){ echo $varrr['Zip']; } ?>" name="customfiels[Zip]">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label class="col-form-label" for="inputDefault">State</label>
			<input type="text" class="form-control" value="<?php if(!empty($varrr)){ echo $varrr['State']; } ?>" name="customfiels[State]">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label class="col-form-label" for="inputDefault">Bedrooms</label>
			<input type="text" class="form-control" value="<?php if(!empty($varrr)){ echo $varrr['Bedrooms']; } ?>" name="customfiels[Bedrooms]">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label class="col-form-label" for="inputDefault">Baths</label>
			<input type="text" class="form-control" value="<?php if(!empty($varrr)){ echo $varrr['Baths']; } ?>" name="customfiels[Baths]">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label class="col-form-label" for="inputDefault">Garage Stalls</label>
			<input type="text" class="form-control" value="<?php if(!empty($varrr)){ echo $varrr['Garage_Stalls']; } ?>" name="customfiels[Garage_Stalls]">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label class="col-form-label" for="inputDefault">Style</label>
			<input type="text" class="form-control" value="<?php if(!empty($varrr)){ echo $varrr['Style']; } ?>" name="customfiels[Style]">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label class="col-form-label" for="inputDefault">Finished Sq Ft</label>
			<input type="text" class="form-control" value="<?php if(!empty($varrr)){ echo $varrr['Finished_Sq_Ft']; } ?>" name="customfiels[Finished_Sq_Ft]">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label class="col-form-label" for="inputDefault">Above Ground Finished Sq Ft</label>
			<input type="text" class="form-control" value="<?php if(!empty($varrr)){ echo $varrr['Above_Ground_Finished_Sq_Ft']; } ?>" name="customfiels[Above_Ground_Finished_Sq_Ft]">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h3>Rehab / Repair Estimate Worksheet</h3>
	</div>
	<div class="col-md-6">
		<div class="card bg-light mb-3" style="width: 100% !important;max-width: 100%!important;">
			<div class="card-header">Exterior</div>
			<div class="card-body">
				<table class="table table-condensed table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Yes/No</th>
							<th>QTY</th>
							<th>Repair Cost</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$int_total = 0 ;
						foreach ($exterior['name'] as $key => $value):
						//echo "string"; print_r(expression); ?>
						<tr>
							<td><?php echo $exterior['name'][$key]; ?></td>
							<td>
								<input type="checkbox" name="metaexterior[<?php echo $exterior['key'][$key] ?>][isyes]" <?php if (!empty($metaexterior[$exterior['key'][$key]]['isyes'])) {if ($metaexterior[$exterior['key'][$key]]['isyes'] == 'on') {echo "checked";} } ?>>
							</td>
							<td>
								<?php if ($exterior['isqty'][$key] == 'yes'): ?>
									<select onchange="qtymultiply(this)" name="metaexterior[<?php echo $exterior['key'][$key] ?>][qty]">
										<?php if (!empty($metaexterior[$exterior['key'][$key]]['qty'])): ?>
											<option value="<?php echo $metaexterior[$exterior['key'][$key]]['qty']; ?>"><?php echo $metaexterior[$exterior['key'][$key]]['qty']; ?></option>
										<?php endif ?>
										<option>0</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
									</select>
								<?php endif ?>
							</td>
							<td>
								<input type="hidden" class="form-control" name="metaexterior[<?php echo $exterior['key'][$key] ?>][key]" value="<?php echo $exterior['key'][$key] ?>">
								<?php
								$amountcalc = 0;
								if (!empty($metaexterior[$exterior['key'][$key]]['isyes'])) {
									$getvalue = get_option($metaexterior[$exterior['key'][$key]]['key']);
									if (!empty($metaexterior[$exterior['key'][$key]]['qty'])) {
										$amountcalc = $getvalue[0]*$metaexterior[$exterior['key'][$key]]['qty'];
									}else{
										$amountcalc = $getvalue[0];
									}
								}
								$int_total += $amountcalc;
								?>
								<input type="hidden" name="rate" value="<?php echo $getvalue[0]; ?>">
								<input type="text" class="form-control totalexterior" value="<?php echo $amountcalc; ?>" readonly >
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="card bg-light mb-3" style="width: 100% !important;max-width: 100%!important;">
		<div class="card-header">Interior</div>
		<div class="card-body">
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Yes/No</th>
						<th>QTY</th>
						<th>Repair Cost</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$ext_total = 0;
					foreach ($interior['name'] as $key => $value):
						//echo "string"; print_r(expression); ?>
						<tr>
							<td><?php echo $interior['name'][$key]; ?></td>
							<td>
								<input type="checkbox" name="metainterior[<?php echo $interior['key'][$key] ?>][isyes]" <?php if (!empty($metainterior[$interior['key'][$key]]['isyes'])) {if ($metainterior[$interior['key'][$key]]['isyes'] == 'on') {echo "checked";} } ?>>
							</td>
							<td>
								<?php if ($interior['isqty'][$key] == 'yes'): ?>
									<select onchange="qtymultiply(this)" name="metainterior[<?php echo $interior['key'][$key] ?>][qty]">
										<?php if (!empty($metainterior[$interior['key'][$key]]['qty'])): ?>
											<option value="<?php echo $metainterior[$interior['key'][$key]]['qty']; ?>"><?php echo $metainterior[$interior['key'][$key]]['qty']; ?></option>
										<?php endif ?>
										<option>0</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
									</select>
								<?php endif ?>
							</td>
							<td>
								<input type="hidden" class="form-control" name="metainterior[<?php echo $interior['key'][$key] ?>][key]" value="<?php echo $interior['key'][$key] ?>">
								<?php
								$amountcalc = 0;
								if (!empty($metainterior[$interior['key'][$key]]['isyes'])) {
									$getvalue = get_option($metainterior[$interior['key'][$key]]['key']);
									if (!empty($metainterior[$interior['key'][$key]]['qty'])) {
										$amountcalc = $getvalue[0]*$metainterior[$interior['key'][$key]]['qty'];
									}else{
										$amountcalc = $getvalue[0];
									}
								}
								$ext_total += $amountcalc;
								?>
								<input type="hidden" name="rate" value="<?php echo $getvalue[0]; ?>">
								<input type="text" class="form-control totalinterior" value="<?php echo $amountcalc; ?>" readonly>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="card bg-light mb-3" style="width: 100% !important;max-width: 100%!important;">
		<div class="card-header">Garage</div>
		<div class="card-body">
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Yes/No</th>
						<th>QTY</th>
						<th>Repair Cost</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$garage_total = 0;
					foreach ($garage['name'] as $key => $value):
						//echo "string"; print_r(expression); ?>
						<tr>
							<td><?php echo $garage['name'][$key]; ?></td>
							<td>
								<input type="checkbox" name="metagarage[<?php echo $garage['key'][$key] ?>][isyes]" <?php if (!empty($metagarage[$garage['key'][$key]]['isyes'])) {if ($metagarage[$garage['key'][$key]]['isyes'] == 'on') {echo "checked";} } ?>>
							</td>
							<td>
								<?php if ($garage['isqty'][$key] == 'yes'): ?>
									<select onchange="qtymultiply(this)" name="metagarage[<?php echo $garage['key'][$key] ?>][qty]">
										<?php if (!empty($metagarage[$garage['key'][$key]]['qty'])): ?>
											<option value="<?php echo $metagarage[$garage['key'][$key]]['qty']; ?>"><?php echo $metagarage[$garage['key'][$key]]['qty']; ?></option>
										<?php endif ?>
										<option>0</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
									</select>
								<?php endif ?>
							</td>
							<td>
								<input type="hidden" class="form-control" name="metagarage[<?php echo $garage['key'][$key] ?>][key]" value="<?php echo $garage['key'][$key] ?>">
								<?php
								$amountcalc = 0;
								if (!empty($metagarage[$garage['key'][$key]]['isyes'])) {
									$getvalue = get_option($metagarage[$garage['key'][$key]]['key']);
									if (!empty($metagarage[$garage['key'][$key]]['qty'])) {
										$amountcalc = $getvalue[0]*$metagarage[$garage['key'][$key]]['qty'];
									}else{
										$amountcalc = $getvalue[0];
									}
								}
								$garage_total += $amountcalc;
								?>
								<input type="hidden" name="rate" value="<?php echo $getvalue[0]; ?>">
								<input type="text" class="form-control garagetotal" value="<?php echo $amountcalc; ?>" readonly>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Total -->
<div class="col-md-6">
	<div class="card bg-light mb-3" style="width: 100% !important;max-width: 100%!important;">
		<div class="card-header">Total</div>
		<div class="card-body">
			<table class="table table-condensed table-hover">
				<tbody>
					<tr>
						<td><strong>Exterior</strong></td>
						<td>
							<p id="totalexterior"><?php
							$overal_total = 0;
							$overal_total += $int_total;
							echo $int_total; ?></p>
						</td>
					</tr>
					<tr>
						<td><strong>Interior</strong></td>
						<td>
							<p id="totalinterior"><?php echo $ext_total; $overal_total +=$ext_total; ?></p>
						</td>
					</tr>
					<tr>
						<td><strong>Garage</strong></td>
						<td>
							<p id="totalgarbage"><?php echo $garage_total; $overal_total += $garage_total; ?></p>
						</td>
					</tr>
					<tr>
						<td><strong>Total</strong></td>
						<td>
							<p id="overalltotal"><?php echo $overal_total; ?></p>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div><!-- End of the row -->
<script>
	function totalexterior(){
		var e = 0;
		jQuery('.totalexterior').each(function(index, el) {
			e += new Number(jQuery(this).val());
		});
		jQuery('#totalexterior').text(e);
		return e;
	}
	function totalinterior(){
		var i = 0;
		jQuery('.totalinterior').each(function(index, el) {
			i += new Number(jQuery(this).val());
		});
		jQuery('#totalinterior').text(i);
		return i;
	}
	function totalgarage(){
		var g = 0;
		jQuery('.garagetotal').each(function(index, el) {
			g += new Number(jQuery(this).val());
		});
		jQuery('#totalgarbage').text(g);
		return g;
	}
	function overalltotal(){
		var a = Number(totalexterior());
		var b = Number(totalinterior());
		var c = Number(totalgarage());
		var calc = a+b+c;
		jQuery('#overalltotal').text(calc);
	}
	function qtymultiply(t){
		var rate = jQuery(t).closest('tr').find('td input[name="rate"]').val();
		var qty  = jQuery(t).val();
		var cal = rate*qty;
		jQuery(t).closest('tr').find('td input.totalexterior , td input.totalinterior , td input.garagetotal').val(cal);
		overalltotal();
	}
</script>