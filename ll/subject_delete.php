<?php
/***

Add a record for Class Table 

**/

$id=1;
 $url ='http://20.0.0.153:8012/laravel/ll/public/subject/'.$id;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $result;
?>
