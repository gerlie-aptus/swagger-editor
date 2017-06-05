<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$base_url = "https://api.customeruat.visplite.iseek.com.au/api/v1";
//echo base64_encode('2sg-customeruat:peamUlWilAjVokAnkib6');
// $url = $base_url.'/service/'.$_GET['sid'];
// $url = $base_url.'/accounts';
$url = $base_url.'/service/1/usage?start=2017-05-22T00:00:00Z&end=2017-05-22T23:59:59Z';


function get_data($url) {
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

   // curl_setopt($ch, CURLOPT_POST, 1);
   // curl_setopt($ch, CURLOPT_POSTFIELDS, "account=002&username=reyes&password=test&supplier_billing_reference=2sg");

    curl_setopt($ch, CURLOPT_USERPWD, "2sg-customeruat:peamUlWilAjVokAnkib6");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $data = curl_exec($ch);


    if(curl_error($ch))
    {
        return 'error:' . curl_error($ch);
    }

    curl_close($ch);
    return $data;
}

$returned_content = get_data($url);



echo "<pre>data : " . print_r($returned_content, 1) . "</pre>";

exit;

?>
<!--<iframe src="https://api.customeruat.visplite.iseek.com.au/doc?url=/doc/api/v1/swagger.yaml" frameborder="0"></iframe>-->