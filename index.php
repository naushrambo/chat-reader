<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>



</head>

<body>
<style>
table { border: none; border-collapse: collapse; }
table td { border: 1px solid #000; }
table td:first-child { border-left: none; }
</style>
<?php 

$myfile = fopen("chat2.txt", "r") or die("Unable to open file!");
$i = "5";


?>


<?php

$crr = array();
while(!feof($myfile)) {
$crr[$i] = fgets($myfile);
 $i++;
// echo $i." ".fgets($myfile)."</br>";
} 

fclose($myfile);
$i = "0";
//print_r($crr);
$n="0";
$chats_arr = array();
$chats_arr[$n]['chat'] = "";

foreach($crr as $k){
	$date = "";
	
	$k = explode(',', $k);
	$time = array_shift($k);
	$chats_arr[$i]['time'] = $time;
	$k = implode(" ",$k);
	
	
	
	$k = explode('-', $k);
	$cnt = count($k);
	$date .= " ".array_shift($k);
	if($cnt > '2'){
		
	$date .= " ".array_shift($k);
		$date .= " ".array_shift($k);
	}elseif($cnt = '2'){
		$date .= " 2015";
		
		
		}
	$chats_arr[$i]['date'] = $date;
	$k = implode(" ",$k);
	
	
	$k = explode(':', $k);
	$name = array_shift($k);
	$chats_arr[$i]['name'] = $name;
	$k = implode(" ",$k);
	//$chats_arr[$n]['chat'] = "";
	if($k == ""){
		
		$k = $time;
		$chats_arr[$i]['time'] = $chats_arr[$i]['date'] = $chats_arr[$i]['name'] = ""; 
	//	$chats_arr[$i-1]['chat'] = $n."+++ ".$k;
		
		}
		$chats_arr[$i]['chat'] = $k;
		
	
	//echo "<tr><th>$i - </th><td>$time  - </td><td>$date - </td><td>$name - </td><td>$k - </td><tr>";
	$i++;
	//echo $time." ".$date."</br>";
	
	/*$date = array_shift(explode('-', $k));
	$name = array_shift(explode(':', $k));
	$chat = $k;
	echo "<tr><th>$i</th><td>$time</td><td>$date</td><td>$name</td><td>$chat</td><tr>";
	$i++;*/
	
	}
	
	
	
	$i = "0";
//print_r($crr);
$n="0";
$chats_org_arr = array();

	
	foreach($chats_arr as $k){
		
		$chats_org_arr[$i]['time'] = $k['time'];
		$chats_org_arr[$i]['date'] = $k['date'];
		$chats_org_arr[$i]['name'] = $k['name'];
		$chats_org_arr[$i]['chat'] = $k['chat'];
		
		if($k['time'] == ""){
			
			$chats_org_arr[$i-1]['chat'] .= $k['chat'];
			}else{
		$i++;
			}
		}
	
//	print_r($chats_org_arr);
	
// $foo = array_shift(explode(':', $foo));




//print_r($chats_arr);
$i = "1";
echo "<table><tr><th>S.no</th><th>Time</th><th>Date</th><th>Name</th><th>Chat</th><tr>";
foreach($chats_org_arr as $k){

//echo $k;
echo "<tr><th>$i</th><td>".$k['time']."</td><td>".$k['date']."</td><td>".$k['name']."</td><td>".$k['chat']."</td><tr>";
$i++;
}
echo "</table>";

?>


</body>
</html>
