<?php
do_action('pro_property_scripts');




if (!empty($_POST)) {
// Interior update Defaults
	update_option( 'Default_garage', $_POST['Garage']);
// Interior update Defaults
	update_option( 'Default_interior', $_POST['Interior']);
// Exterior update Defaults
	update_option( 'Default_exterior', $_POST['Exterior']);

	// echo "<pre>"; print_r($_POST['Exterior']);
	// die();

	unset($_POST['Exterior'],$_POST['Interior'],$_POST['Garage']);
	foreach ($_POST as $key => $value) {
		$value[] = $key;
		update_option( $key, $value);
	}
	echo '<br><div class="notice notice-success is-dismissible"><p>Options has been updated</p></div><br>';
}
$exterior 	= get_option( 'Default_exterior');
$garage 	= get_option( 'Default_garage');
$interior 	= get_option( 'Default_interior');
?>
<form method="post">
	<h2><strong>Exterior</strong></h2>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th></th>
				<th>State Average</th>
				<th>Is Qty /Sq Feet/ - Yes/No</th>
			</tr>
		</thead>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Exterior[name][]" value="Roof">
				<input type="hidden" name="Exterior[key][]" value="ext_Roof">
			</th>
			<td><input type="text" name="ext_Roof[]" value="<?php $ext_Roof = get_option('ext_Roof'); if(!empty($ext_Roof)){echo $ext_Roof[0];} ?>" /></td>
			<td><input type="text" name="ext_Roof[]" value="<?php $ext_Roof = get_option('ext_Roof'); if(!empty($ext_Roof)){echo $ext_Roof[1];} ?>" /></td>
			<td>
				<select name="Exterior[isqty][]">
					<option value="<?php if (!empty($exterior['isqty'])) { echo $exterior['isqty'][0]; }else{echo "no";} ?>"><?php if (!empty($exterior['isqty'])) { echo $exterior['isqty'][0]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Exterior[name][]" value="Doors">
				<input type="hidden" name="Exterior[key][]" value="ext_Doors">
			</th>
			<td><input type="text" name="ext_Doors[]" value="<?php $ext_Doors = get_option('ext_Doors'); if(!empty($ext_Doors)){echo $ext_Doors[0];} ?>" /></td>
			<td><input type="text" name="ext_Doors[]" value="<?php $ext_Doors = get_option('ext_Doors'); if(!empty($ext_Doors)){echo $ext_Doors[1];} ?>" /></td>
			<td>
				<select name="Exterior[isqty][]">
					<option value="<?php if (!empty($exterior['isqty'])) { echo $exterior['isqty'][1]; }else{echo "no";} ?>"><?php if (!empty($exterior['isqty'])) { echo $exterior['isqty'][1]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Exterior[name][]" value="Patio Doors">
				<input type="hidden" name="Exterior[key][]" value="ext_Patio_Doors">
			</th>
			<td><input type="text" name="ext_Patio_Doors[]" value="<?php $ext_Patio_Doors = get_option('ext_Patio_Doors'); if(!empty($ext_Patio_Doors)){echo $ext_Patio_Doors[0];} ?>" /></td>
			<td><input type="text" name="ext_Patio_Doors[]" value="<?php $ext_Patio_Doors = get_option('ext_Patio_Doors'); if(!empty($ext_Patio_Doors)){echo $ext_Patio_Doors[1];} ?>" /></td>
			<td>
				<select name="Exterior[isqty][]">
					<option value="<?php if (!empty($exterior['isqty'])) { echo $exterior['isqty'][2]; }else{echo "no";} ?>"><?php if (!empty($exterior['isqty'])) { echo $exterior['isqty'][2]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Exterior[name][]" value="Paint">
				<input type="hidden" name="Exterior[key][]" value="ext_Paint">
			</th>
			<td><input type="text" name="ext_Paint[]" value="<?php $ext_Paint = get_option('ext_Paint'); echo $ext_Paint[0]; ?>" /></td>
			<td><input type="text" name="ext_Paint[]" value="<?php $ext_Paint = get_option('ext_Paint'); echo $ext_Paint[1]; ?>" /></td>
			<td>
				<select name="Exterior[isqty][]">
					<option value="<?php if (!empty($exterior['isqty'])) { echo $exterior['isqty'][3]; }else{echo "no";} ?>"><?php if (!empty($exterior['isqty'])) { echo $exterior['isqty'][3]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Exterior[name][]" value="Siding">
				<input type="hidden" name="Exterior[key][]" value="ext_Siding">
			</th>
			<td><input type="text" name="ext_Siding[]" value="<?php $ext_Siding = get_option('ext_Siding'); if(!empty($ext_Siding)){echo $ext_Siding[0];} ?>" /></td>
			<td><input type="text" name="ext_Siding[]" value="<?php $ext_Siding = get_option('ext_Siding'); if(!empty($ext_Siding)){echo $ext_Siding[1];} ?>" /></td>
			<td>
				<select name="Exterior[isqty][]">
					<option value="<?php if (!empty($exterior['isqty'])) { echo $exterior['isqty'][4]; }else{echo "no";} ?>"><?php if (!empty($exterior['isqty'])) { echo $exterior['isqty'][4]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Exterior[name][]" value="Driveway">
				<input type="hidden" name="Exterior[key][]" value="ext_Driveway">
			</th>
			<td><input type="text" name="ext_Driveway[]" value="<?php $ext_Driveway = get_option('ext_Driveway'); echo $ext_Driveway[0]; ?>" /></td>
			<td><input type="text" name="ext_Driveway[]" value="<?php $ext_Driveway = get_option('ext_Driveway'); echo $ext_Driveway[1]; ?>" /></td>
			<td>
				<select name="Exterior[isqty][]">
					<option value="<?php if (!empty($exterior['isqty'])) { echo $exterior['isqty'][5]; }else{echo "no";} ?>"><?php if (!empty($exterior['isqty'])) { echo $exterior['isqty'][5]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Exterior[name][]" value="windows">
				<input type="hidden" name="Exterior[key][]" value="ext_windows">
			</th>
			<td><input type="text" name="ext_windows[]" value="<?php $ext_windows = get_option('ext_windows'); echo $ext_windows[0]; ?>" /></td>
			<td><input type="text" name="ext_windows[]" value="<?php $ext_windows = get_option('ext_windows'); echo $ext_windows[1]; ?>" /></td>
			<td>
				<select name="Exterior[isqty][]">
					<option value="<?php if (!empty($exterior['isqty'])) { echo $exterior['isqty'][6]; }else{echo "no";} ?>"><?php if (!empty($exterior['isqty'])) { echo $exterior['isqty'][6]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>		
	</table>


	<!-- Interior -->

	<h2><strong>Interior</strong></h2>
	<table>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Interior[name][]" value="Paint">
				<input type="hidden" name="Interior[key][]" value="int_Paint">
			</th>
			<td><input type="text" name="int_Paint[]" value="<?php $int_Paint = get_option('int_Paint'); echo $int_Paint[0]; ?>" /></td>
			<td><input type="text" name="int_Paint[]" value="<?php $int_Paint = get_option('int_Paint'); echo $int_Paint[1]; ?>" /></td>
			<td>
				<select name="Interior[isqty][]">
					<option value="<?php if (!empty($interior['isqty'])) { echo $interior['isqty'][0]; }else{echo "no";} ?>"><?php if (!empty($interior['isqty'])) { echo $interior['isqty'][0]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Interior[name][]" value="Doors">
				<input type="hidden" name="Interior[key][]" value="int_Doors">
			</th>
			<td><input type="text" name="int_Doors[]" value="<?php $int_Doors = get_option('int_Doors'); if(!empty($int_Doors)){echo $int_Doors[0];} ?>" /></td>
			<td><input type="text" name="int_Doors[]" value="<?php $int_Doors = get_option('int_Doors'); if(!empty($int_Doors)){echo $int_Doors[1];} ?>" /></td>
			<td>
				<select name="Interior[isqty][]">
					<option value="<?php if (!empty($interior['isqty'])) { echo $interior['isqty'][1]; }else{echo "no";} ?>"><?php if (!empty($interior['isqty'])) { echo $interior['isqty'][1]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Interior[name][]" value="Carpet / Flooring">
				<input type="hidden" name="Interior[key][]" value="int_Carpet_Flooring">
			</th>
			<td><input type="text" name="int_Carpet_Flooring[]" value="<?php $int_Carpet_Flooring = get_option('int_Carpet_Flooring'); if(!empty($int_Carpet_Flooring)){echo $int_Carpet_Flooring[0];} ?>" /></td>
			<td><input type="text" name="int_Carpet_Flooring[]" value="<?php $int_Carpet_Flooring = get_option('int_Carpet_Flooring'); if(!empty($int_Carpet_Flooring)){echo $int_Carpet_Flooring[1];} ?>" /></td>
			<td>
				<select name="Interior[isqty][]">
					<option value="<?php if (!empty($interior['isqty'])) { echo $interior['isqty'][2]; }else{echo "no";} ?>"><?php if (!empty($interior['isqty'])) { echo $interior['isqty'][2]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Interior[name][]" value="Kitchen">
				<input type="hidden" name="Interior[key][]" value="int_Kitchen">
			</th>
			<td><input type="text" name="int_Kitchen[]" value="<?php $int_Kitchen = get_option('int_Kitchen'); if(!empty($int_Kitchen)){echo $int_Kitchen[0];} ?>" /></td>
			<td><input type="text" name="int_Kitchen[]" value="<?php $int_Kitchen = get_option('int_Kitchen'); if(!empty($int_Kitchen)){echo $int_Kitchen[1];} ?>" /></td>
			<td>
				<select name="Interior[isqty][]">
					<option value="<?php if (!empty($interior['isqty'])) { echo $interior['isqty'][3]; }else{echo "no";} ?>"><?php if (!empty($interior['isqty'])) { echo $interior['isqty'][3]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Interior[name][]" value="Electrical Panel">
				<input type="hidden" name="Interior[key][]" value="int_Electrical_Panel">
			</th>
			<td><input type="text" name="int_Electrical_Panel[]" value="<?php $int_Electrical_Panel = get_option('int_Electrical_Panel'); if(!empty($int_Electrical_Panel)){echo $int_Electrical_Panel[0];} ?>" /></td>
			<td><input type="text" name="int_Electrical_Panel[]" value="<?php $int_Electrical_Panel = get_option('int_Electrical_Panel'); if(!empty($int_Electrical_Panel)){echo $int_Electrical_Panel[1];} ?>" /></td>
			<td>
				<select name="Interior[isqty][]">
					<option value="<?php if (!empty($interior['isqty'])) { echo $interior['isqty'][4]; }else{echo "no";} ?>"><?php if (!empty($interior['isqty'])) { echo $interior['isqty'][4]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Interior[name][]" value="Electrical Wiring">
				<input type="hidden" name="Interior[key][]" value="int_Electrical_Wiring">
			</th>
			<td><input type="text" name="int_Electrical_Wiring[]" value="<?php $int_Electrical_Wiring = get_option('int_Electrical_Wiring'); if(!empty($int_Electrical_Wiring)){echo $int_Electrical_Wiring[0];} ?>" /></td>
			<td><input type="text" name="int_Electrical_Wiring[]" value="<?php $int_Electrical_Wiring = get_option('int_Electrical_Wiring'); if(!empty($int_Electrical_Wiring)){echo $int_Electrical_Wiring[1];} ?>" /></td>
			<td>
				<select name="Interior[isqty][]">
					<option value="<?php if (!empty($interior['isqty'])) { echo $interior['isqty'][5]; }else{echo "no";} ?>"><?php if (!empty($interior['isqty'])) { echo $interior['isqty'][5]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Interior[name][]" value="Baths">
				<input type="hidden" name="Interior[key][]" value="int_Baths">
			</th>
			<td><input type="text" name="int_Baths[]" value="<?php $int_Baths = get_option('int_Baths'); if(!empty($int_Baths)){echo $int_Baths[0];} ?>" /></td>
			<td><input type="text" name="int_Baths[]" value="<?php $int_Baths = get_option('int_Baths'); if(!empty($int_Baths)){echo $int_Baths[1];} ?>" /></td>
			<td>
				<select name="Interior[isqty][]">
					<option value="<?php if (!empty($interior['isqty'])) { echo $interior['isqty'][6]; }else{echo "no";} ?>"><?php if (!empty($interior['isqty'])) { echo $interior['isqty'][6]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Interior[name][]" value="Furnace">
				<input type="hidden" name="Interior[key][]" value="int_Furnace">
			</th>
			<td><input type="text" name="int_Furnace[]" value="<?php $int_Furnace = get_option('int_Furnace'); if(!empty($int_Furnace)){echo $int_Furnace[0];} ?>" /></td>
			<td><input type="text" name="int_Furnace[]" value="<?php $int_Furnace = get_option('int_Furnace'); if(!empty($int_Furnace)){echo $int_Furnace[1];} ?>" /></td>
			<td>
				<select name="Interior[isqty][]">
					<option value="<?php if (!empty($interior['isqty'])) { echo $interior['isqty'][7]; }else{echo "no";} ?>"><?php if (!empty($interior['isqty'])) { echo $interior['isqty'][7]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Interior[name][]" value="AC">
				<input type="hidden" name="Interior[key][]" value="int_AC">
			</th>
			<td><input type="text" name="int_AC[]" value="<?php $int_AC = get_option('int_AC'); if(!empty($int_AC)){echo $int_AC[0];} ?>" /></td>
			<td><input type="text" name="int_AC[]" value="<?php $int_AC = get_option('int_AC'); if(!empty($int_AC)){echo $int_AC[1];} ?>" /></td>
			<td>
				<select name="Interior[isqty][]">
					<option value="<?php if (!empty($interior['isqty'])) { echo $interior['isqty'][8]; }else{echo "no";} ?>"><?php if (!empty($interior['isqty'])) { echo $interior['isqty'][8]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Interior[name][]" value="Water Heater">
				<input type="hidden" name="Interior[key][]" value="int_Water_Heater">
			</th>
			<td><input type="text" name="int_Water_Heater[]" value="<?php $int_Water_Heater = get_option('int_Water_Heater'); if(!empty($int_Water_Heater)){echo $int_Water_Heater[0];} ?>" /></td>
			<td><input type="text" name="int_Water_Heater[]" value="<?php $int_Water_Heater = get_option('int_Water_Heater'); if(!empty($int_Water_Heater)){echo $int_Water_Heater[1];} ?>" /></td>
			<td>
				<select name="Interior[isqty][]">
					<option value="<?php if (!empty($interior['isqty'])) { echo $interior['isqty'][9]; }else{echo "no";} ?>"><?php if (!empty($interior['isqty'])) { echo $interior['isqty'][9]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Interior[name][]" value="Misc Items">
				<input type="hidden" name="Interior[key][]" value="int_Misc_Items">
			</th>
			<td><input type="text" name="int_Misc_Items[]" value="<?php $int_Misc_Items = get_option('int_Misc_Items'); if(!empty($int_Misc_Items)){echo $int_Misc_Items[0];} ?>" /></td>
			<td><input type="text" name="int_Misc_Items[]" value="<?php $int_Misc_Items = get_option('int_Misc_Items'); if(!empty($int_Misc_Items)){echo $int_Misc_Items[1];} ?>" /></td>
			<td>
				<select name="Interior[isqty][]">
					<option value="<?php if (!empty($interior['isqty'])) { echo $interior['isqty'][10]; }else{echo "no";} ?>"><?php if (!empty($interior['isqty'])) { echo $interior['isqty'][10]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Interior[name][]" value="MAO Formula">
				<input type="hidden" name="Interior[key][]" value="int_MAO_Formula">
			</th>
			<td><input type="text" name="int_MAO_Formula[]" value="<?php $int_MAO_Formula = get_option('int_MAO_Formula'); if(!empty($int_MAO_Formula)){echo $int_MAO_Formula[0];} ?>" /></td>
			<td><input type="text" name="int_MAO_Formula[]" value="<?php $int_MAO_Formula = get_option('int_MAO_Formula'); if(!empty($int_MAO_Formula)){echo $int_MAO_Formula[1];} ?>" /></td>
			<td>
				<select name="Interior[isqty][]">
					<option value="<?php if (!empty($interior['isqty'])) { echo $interior['isqty'][11]; }else{echo "no";} ?>"><?php if (!empty($interior['isqty'])) { echo $interior['isqty'][11]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Interior[name][]" value="Kitchen Cabinets">
				<input type="hidden" name="Interior[key][]" value="int_Kitchen_Cabinets">
			</th>
			<td><input type="text" name="int_Kitchen_Cabinets[]" value="<?php $int_Kitchen_Cabinets = get_option('int_Kitchen_Cabinets'); if(!empty($int_Kitchen_Cabinets)){echo $int_Kitchen_Cabinets[0];} ?>" /></td>
			<td><input type="text" name="int_Kitchen_Cabinets[]" value="<?php $int_Kitchen_Cabinets = get_option('int_Kitchen_Cabinets'); if(!empty($int_Kitchen_Cabinets)){echo $int_Kitchen_Cabinets[1];} ?>" /></td>
			<td>
				<select name="Interior[isqty][]">
					<option value="<?php if (!empty($interior['isqty'])) { echo $interior['isqty'][12]; }else{echo "no";} ?>"><?php if (!empty($interior['isqty'])) { echo $interior['isqty'][12]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>		
	</table>


	<h2><strong>Garage</strong></h2>
	<table>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Garage[name][]" value="Roof">
				<input type="hidden" name="Garage[key][]" value="gar_Roof">
			</th>
			<td><input type="text" name="gar_Roof[]" value="<?php $gar_Roof = get_option('gar_Roof'); if(!empty($gar_Roof)){echo $gar_Roof[0];} ?>" /></td>
			<td><input type="text" name="gar_Roof[]" value="<?php $gar_Roof = get_option('gar_Roof'); if(!empty($gar_Roof)){echo $gar_Roof[1];} ?>" /></td>
			<td>
				<select name="Garage[isqty][]">
					<option value="<?php if (!empty($garage['isqty'])) { echo $garage['isqty'][0]; }else{echo "no";} ?>"><?php if (!empty($garage['isqty'])) { echo $garage['isqty'][0]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Garage[name][]" value="Paint">
				<input type="hidden" name="Garage[key][]" value="gar_Paint">
			</th>
			<td><input type="text" name="gar_Paint[]" value="<?php $gar_Paint = get_option('gar_Paint'); if(!empty($gar_Paint)){echo $gar_Paint[0];} ?>" /></td>
			<td><input type="text" name="gar_Paint[]" value="<?php $gar_Paint = get_option('gar_Paint'); if(!empty($gar_Paint)){echo $gar_Paint[1];} ?>" /></td>
			<td>
				<select name="Garage[isqty][]">
					<option value="<?php if (!empty($garage['isqty'])) { echo $garage['isqty'][1]; }else{echo "no";} ?>"><?php if (!empty($garage['isqty'])) { echo $garage['isqty'][1]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Garage[name][]" value="Siding">
				<input type="hidden" name="Garage[key][]" value="gar_Siding">
			</th>
			<td><input type="text" name="gar_Siding[]" value="<?php $gar_Siding = get_option('gar_Siding'); if(!empty($gar_Siding)){echo $gar_Siding[0];} ?>" /></td>
			<td><input type="text" name="gar_Siding[]" value="<?php $gar_Siding = get_option('gar_Siding'); if(!empty($gar_Siding)){echo $gar_Siding[1];} ?>" /></td>
			<td>
				<select name="Garage[isqty][]">
					<option value="<?php if (!empty($garage['isqty'])) { echo $garage['isqty'][2]; }else{echo "no";} ?>"><?php if (!empty($garage['isqty'])) { echo $garage['isqty'][2]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Garage[name][]" value="Garage Doors">
				<input type="hidden" name="Garage[key][]" value="gar_Garage_Doors">
			</th>
			<td><input type="text" name="gar_Garage_Doors[]" value="<?php $gar_Garage_Doors = get_option('gar_Garage_Doors'); if(!empty($gar_Garage_Doors)){echo $gar_Garage_Doors[0];} ?>" /></td>
			<td><input type="text" name="gar_Garage_Doors[]" value="<?php $gar_Garage_Doors = get_option('gar_Garage_Doors'); if(!empty($gar_Garage_Doors)){echo $gar_Garage_Doors[1];} ?>" /></td>
			<td>
				<select name="Garage[isqty][]">
					<option value="<?php if (!empty($garage['isqty'])) { echo $garage['isqty'][3]; }else{echo "no";} ?>"><?php if (!empty($garage['isqty'])) { echo $garage['isqty'][3]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
		<tr>
			<th style="width: 200px;">
				<input type="text" name="Garage[name][]" value="Service Door">
				<input type="hidden" name="Garage[key][]" value="gar_Service_Door">
			</th>
			<td><input type="text" name="gar_Service_Door[]" value="<?php $gar_Service_Door = get_option('gar_Service_Door'); if(!empty($gar_Service_Door)){echo $gar_Service_Door[0];} ?>" /></td>
			<td><input type="text" name="gar_Service_Door[]" value="<?php $gar_Service_Door = get_option('gar_Service_Door'); if(!empty($gar_Service_Door)){echo $gar_Service_Door[1];} ?>" /></td>
			<td>
				<select name="Garage[isqty][]">
					<option value="<?php if (!empty($garage['isqty'])) { echo $garage['isqty'][4]; }else{echo "no";} ?>"><?php if (!empty($garage['isqty'])) { echo $garage['isqty'][4]; }else{echo "NO";} ?></option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					<option value="sqft">sqft</option>
				</select>
			</td>
		</tr>
	</table>
	<p class="submit" style="text-align:left"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
</form>