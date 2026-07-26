<?php
$pid = $_GET['pid'];
if(file_exists("paid_$pid.txt")){ echo json_encode(["status"=>"paid"]); } 
else { echo json_encode(["status"=>"pending"]); }
?>
