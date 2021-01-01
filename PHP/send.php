<?php
session_start();
include_once('pdo1.php');
$logindata=new Database_Connection();
$name = $_SESSION['name'];
$user=$_GET['a']; 
$sql = $logindata->hari($name,$user);
if($sql)
{
echo "<script>window.location.href='dashboard.php'</script>";
}
else
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='dashboard.php'</script>";
}
?>