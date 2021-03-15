<?php
$user = 'root';
$password = 'root';
$db = 'user_info';
$host = 'localhost';
$port = 3306;

$key = $_GET["key"];
$hwid = $_GET["hwid"];

$conn = new mysqli($user, $password, $db, $host, $port);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$ips = getUserIpAddr();

$sql = "UPDATE whitelistbot SET hwid = '$hwid', ip = '$ips' WHERE userkey = '$key'";

if ($key and $hwid) {
if ($conn->query($sql) === TRUE) {
  echo "Hi Guys!";
}

?>
