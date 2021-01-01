<?php
define('server','localhost');// defining hostname
define('username','root'); // defining username
define('password' ,''); // defining Password
define('databasename', 'chat');// defining database name
class Database_Connection
{
function __construct()
{
$connection = mysqli_connect(server,username,password,databasename);
$this->dbhost=$connection;
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
}
public function hari($name,$username)
{
	$viewing = mysqli_query($this->dbhost,"insert into adding(A,B) values('$name','$username')");
		return $viewing;
}
public function add($name,$username)
{
	$viewing = mysqli_query($this->dbhost,"insert into friends(A,B) values('$name','$username')");
	$viewing = mysqli_query($this->dbhost,"insert into friends(A,B) values('$username','$name')");
	return $viewing;
}
public function removing($name,$username)
{
	$viewing = mysqli_query($this->dbhost,"DELETE FROM adding where B ='$name' and A ='$username' ");
	return $viewing;
}
public function signup($name,$username,$useremail,$userpassword)
{
$adding=mysqli_query($this->dbhost,"insert into signupid(Name,Username,Email,Password) values('$name','$username','$useremail','$userpassword')");
return $adding;
}
public function friends($name)
{
	$view = mysqli_query($this->dbhost,"select * from friends where A ='$name'");
	return $view;
}
public function seemessage($name,$user)
{
	$view = mysqli_query($this->dbhost,"select * from chat where (A ='$name' AND B ='$user') OR (A ='$user' AND B='$name')");
	return $view;
}
public function savemessage($name,$user,$message)
{
	$view = mysqli_query($this->dbhost,"insert into chat(A,B,chat) values('$name','$user','$message')");
	return $view;
}
public function friendsaccept($name)
{
	$view = mysqli_query($this->dbhost,"select * from adding where B ='$name' ");
	return $view;
}

public function viewall($username)
{
    $viewing = mysqli_query($this->dbhost,"select * from signupid where NOT (Name = '$username')
    ");
    return $viewing;
}
// here is the function for signin which we will callout when we do login
public function signin($username,$userpassword)
{
$seeing=mysqli_query($this->dbhost,"select Name from signupid where Name='$username' and Password='$userpassword'");
return $seeing;
}
public function checking($username)
{
	$viewing = mysqli_query($this->dbhost,"select * from signupid where Name = '$username' ");
return $viewing;
}
}
?>
