<?php

//print_r($_POST['amount']);
//die();

$errors = array();



function getAll() {
    /*
    $endpoint = 'convert';
    $access_key = '2c636a4bf99fba1fead898ea4e674296';
    
    $from = 'USD';
    $to = 'EUR';
    $amount = 10;
    //$ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'&from='.$from.'&to='.$to.'&amount='.$amount.'');
    */
    
    $data = json_decode(file_get_contents('http://data.fixer.io/api/latest?access_key=2c636a4bf99fba1fead898ea4e674296'));
    //print_r($data);
    //die();
    /*curl_setopt($data, CURLOPT_RETURNTRANSFER, true);

    // get the (still encoded) JSON data:
    $json = curl_exec($data);
    curl_close($data);

    // Decode JSON response:
    $conversionResult = json_decode($json, true);
    print_r($conversionResult);
    die();

    // access the conversion result
    echo $conversionResult['result'];
    */
    return $data;
}

function usdtolkr($amount) {
    $out = getAll();
    //print_r($data);
    //die();
    $usd = $out->rates->USD;
    $lkr = $out->rates->LKR;
    $result = $amount * ($lkr / $usd);
    return $result;
}

function usdtosgd($amount) {
    $out = getAll();
    //print_r($data);
    //die();
    $usd = $out->rates->USD;
    $sgd = $out->rates->SGD;
    $result = $amount * ($sgd / $usd);
    return $result;
}

if(isset($_POST['convert_currency']))
{   
    ///print_r('sdfsd');
    //die();
    unset($_POST['convert_currency']);
   
        //print_r('lk');
        //die();
        //unset($_POST['amount']);
        //unset($_POST['convert_from']);
        //unset($_POST['convert_to']);
        //array_push($errors, "please fill the details to perform the transaction");
      
    
    //print_r('k');
    //die();
    
   
 $amount=$_POST['amount'];
 $from=$_POST['convert_from'];
 $to=$_POST['convert_to'];
//print_r($amount);
if(empty($amount) || empty($from) || empty($to)) {
    //print_r('sdf');
    //die();
    array_push($errors, "please fill the details to perform the transaction");
}
       
            if($from == 'USD') {
                if ($to == 'LKR') {
                    $rawData = usdtolkr($amount);
                    
                    $_SESSION['rawData'] = $rawData;
                }elseif ($to == 'SGD') {
                    $rawData = usdtosgd($amount);
                    $_SESSION['rawData'] = $rawData;
                }
            }
   

 //print_r($amount);
 //print_r($from);
 //print_r($to);
 //die();


}

?>