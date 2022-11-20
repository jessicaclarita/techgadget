<?php
session_start();
define('Server','localhost');
define('User','root');
define('Password' ,'');
define('Name', 'techgadget');
$con = mysqli_connect(Server, User, Password, Name);
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>