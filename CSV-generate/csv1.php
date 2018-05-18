<?php 

die();

// $str = 'John Chio - Guy';

// $str = substr($str, 0, strpos($str, '-'));
// echo $str;
// die();

$filename = 'csv/Winter-Essential-Basic-Tops-part-2-for-marc.csv';


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
$data = '';
$newdata = '';
$i = 0;
foreach ($csv as $key1) {
  if ($i == 0) {
    $key1[8] = 'sizes';
    unset($key1[5]);
    $key1[91] = 'img1';
    $key1[92] = 'img2';
    $key1[93] = 'img3';
    $key1[94] = 'gallery';
    $key1[95] = 'dsc_main';
    $newdata[] = $key1;
    $i++;
  }else{
    $exp1 =  explode('<br>', $key1[5]);
    $count[] = count($exp1);



    $key1[] = 'http://dev6.onlinetestingserver.com/unifyex/wp-content/uploads/img/'.$key1[2].'-a.jpg';
    $key1[] = 'http://dev6.onlinetestingserver.com/unifyex/wp-content/uploads/img/'.$key1[2].'-b.jpg';
    $key1[] = 'http://dev6.onlinetestingserver.com/unifyex/wp-content/uploads/img/'.$key1[2].'-c.jpg';
    $key1[] = $key1[91].','.$key1[92].','.$key1[93];
    $key1[] = 'Type: '.$key1[12].'<br> Style: '.$key1[14].'<br> Knit: '.$key1[15].'<br> Style: '.$key1[16];
    unset($key1[5]);
    
    $newdata[] = array('', $key1[1],$key1[2],$key1[3],'','Select','','Select','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',$key1[90],$key1[91],$key1[92],$key1[93],$key1[94], $key1[95]);

    if (!empty($exp1)) {
      foreach ($exp1 as $key => $value) {
        $key1[8]  = $exp1[$key];
        $newdata[] = $key1;
      }
    } else {
        $newdata[] = $key1;
    }
    



  }
}


// $newdata

// echo "<pre>";
// print_r($newdata);
// die();


outputCsv($filename, $newdata);


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