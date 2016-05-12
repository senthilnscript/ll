<?php
/***

Add a record for Class Table 

**/
if(isset($_POST['id'],$_POST['mark'])&&$_POST['id']!=''&&$_POST['mark']!='')
{
$id=$_POST['id'];
$encoded = urlencode('mark='.$_POST['mark'].'&student_id='.$_POST['student_id'].'&subject_id='.$_POST['subject_id']);
 $url ='http://localhost:8012/laravel/ll/public/mark/'.$id;
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
<label>Mark <input type="text" name="mark" /></label>
<label>Student <input type="text" name="student_id" /></label>
<label>Subject <input type="text" name="subject_id" /></label>
<label><input type="submit" /></label>
</form>