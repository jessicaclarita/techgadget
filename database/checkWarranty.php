<?php
$servername='localhost';
$username="root";
$password="";
 
try
{
    $con=new PDO("mysql:host=$servername;dbname=techgadget",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo "Success to connect to MySQL. ";
}
catch(PDOException $e)
{
    echo '<br>'.$e->getMessage();
    echo "Failed to connect to MySQL. ";
	exit();
}
     
?>