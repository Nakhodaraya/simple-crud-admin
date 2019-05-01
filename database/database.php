<?php 
//Connect to database
$host           =   "localhost";
$dbusername     =   "root";
$dbpassword     =   "";
$dbname         =   "crud";

$dbconnect  =   mysqli_connect($host,$dbusername,$dbpassword,$dbname);

//Check connection to database
if(!$dbconnect)
{
    die("Connection Status: Failed").mysqli_error();
}
?>
