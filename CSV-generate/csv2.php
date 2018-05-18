<?php 

// $str = 'John Chio - Guy';

// $str = substr($str, 0, strpos($str, '-'));
// echo $str;
// die();

$filename = 'popupcategory.csv';


function outputCsv($fileName, $assocDataArray){
    ob_clean();
    header('Pragma: public');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Cache-Control: private', false);
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=' . $fileName);    
    if(isset($assocDataArray['0'])){
        $fp = fopen('php://output', 'w');
        fputcsv($fp, array_keys($assocDataArray['0']));
        foreach($assocDataArray AS $values){
            fputcsv($fp, $values);
        }
        fclose($fp);
    }
    ob_flush();
}


//read csv file and retrieve
$csv = array_map('str_getcsv', file($filename));

$sizescol = array('XS','S','M','L','XL','XXL',);

$i = 0;
$data = '';
foreach ($csv as $key) {
  
  if ($i == 0) {
    $key[] = 'img1';
    $key[] = 'img2';
    $data[] = $key;
    $i++;
  }else{
    $key[] = 'https://unifyexp.com/wp-content/uploads/2018/03/'.$key[0].''.substr($key[5], 0, 1).'.jpg';
    $key[] = 'https://unifyexp.com/wp-content/uploads/2018/03/'.$key[0].''.substr($key[5], 0, 1).'2.jpg';

    $data[] = array($key[0],'',$key[2],$key[3],$key[4],'','','','',$key[9],'');
    foreach ($sizescol as $key1 => $value1) {
      $key[6] = $value1;
      $data[] = $key;
    }
  }




}



// echo "<pre>";
// print_r($data);
// die();


outputCsv($filename, $data);


die();


$output = '';
$output .= '<table>';

$k = 0;
foreach ($newdata as $key => $value) {
    

    if ($k == 0) {

      $output .= '<tr>';
      foreach ($value as $lastkey => $lastval) {
        $output .= '<td>'.$lastval.'</td>';
      }
      $output .= '</tr>';
      
      $k++;
    }else{

      $output .= '<tr>';
      foreach ($value as $lastkey => $lastval) {
        $output .= '<td>'.$lastval.'</td>';
      }
      $output .= '</tr>';

    }

}



$output .= '</table>';

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=download.xls");
echo $output;



die(); ?>

<h3>PERSONAL INFORMATION</h3>
<table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;">
<tr>
  <th>Participant Full Name:</th><td>'.$padmission_fullname.'</td>
</tr>
<tr style="background-color: #e0e0e0;">
  <th>Date of Birth:</th><td>'.$padmission_date.'</td>
</tr>
</table>


<?php

function price_calculations($price=''){
    if ($price <= 4999) {
        return 299;
    }elseif ($price >= 5000 && $price <= 14999){
        return 399;
    }elseif ($price >= 15000 && $price <= 24999) {
        return 499;
    }elseif ($price >= 25000) {
        return 599;
    }
}


echo price_calculations(0200);

die();

$startdate = "2018-04-18";
$expire = strtotime($startdate. ' + 1 days');
$today = strtotime("today midnight");

if($today >= $expire == false){
    echo "active";
} else {
    echo "expired";
}



die();


printf('%010d', 1);

die();

$data = file_get_contents('https://newsapi.org/v2/top-headlines?sources=espn&apiKey=d0261b1877794a6085b66c81714f273f');
$data = json_decode($data); 
?>

<ul class="newsfeedsgoese">
  <?php foreach ($data->articles as $key): ?>
    <li><a href="<?php echo $key->url;  ?>"><img src="<?php echo $key->urlToImage;  ?>" alt=""><?php echo $key->title;  ?></a></li>
  <?php endforeach ?>
</ul>







<?php 

die();



$cookie_name = "ID";
$cookie_value = 1;

$info = array('11' , '112');

setcookie($cookie_name, serialize($info) , time() + (86400 * 30), "/"); // 86400 = 1 day


if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}



die();
  ?>


<!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post"> -->
 
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="test@test.com">
    <strong>Donation / Contribution? </strong><br />
    <select name="item_name">
      <option value="Donation">Donation</option>
      <option value="Contribution">Contribution</option>
    </select>
 
    <strong>Which tutorial are you donating for?</strong><br />   
    <select name="item_number">
      <option value="PayPal Form Tutorial">The PayPal Form Tutorial</option>
      <option value="Amazon S3 Tutorial">The Amazon S3 Tutorial</option>
      <option value="Some Other Tutorial">Some Other Tutorial</option>
    </select>
 
    <strong>How much do you want to donate?</strong><br />
    $ <input type="text" name="amount">
 
    <input type="hidden" name="no_shipping" value="0">
    <input type="hidden" name="no_note" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="lc" value="AU">
    <input type="hidden" name="bn" value="PP-BuyNowBF">
    <input type="hidden" name="return" value="http://localhost:8088/testwp/return.php">
 
    <br /><br />
    <input type="submit" value="Pay with PayPal!">
 
</form>


<?php 
die();

$string = "2007a";
echo $int = intval(preg_replace('/[^0-9]+/', '', $string), 10);

die();
 ?>


<p class="year-car">
	<?php
	$str = '2007 Nissan Altima 2.5 S';
	echo substr($str, 0 , 5); ?>
</p>