<?php
/***

Add a record for Class Table 

**/
if(isset($_POST['id'],$_POST['name'])&&$_POST['id']!=''&&$_POST['name']!='')
{
$id=$_POST['id'];
$encoded = urlencode('name='.$_POST['name'].'&description='.$_POST['description']);
 $url ='http://20.0.0.153:8012/laravel/ll/public/class/'.$id;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_POSTFIELDS,  $encoded);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $result;
}
?>
<form method="post" action="">
<label>id <input type="text" name="id" /></label>
<label>Name <input type="text" name="name" /></label>
<label>Description <textarea  name="description" ></textarea></label>
<label><input type="submit" /></label>
</form>