<?php


$con=mysqli_connect('localhost','root');

if ($con) 
  {
		echo "connection successful";
  }
else
	{
		echo "no connection";
	}

 mysqli_select_db($con,'edi_project');

 $name=$_POST['username1'];
 $pass=$_POST['pass1'];
 $email=$_POST['email1'];
 $dept=$_POST['dept1'];

$q="INSERT INTO `login`(`Username`, `Password`, `Email`, `Department`) VALUES ('$name','$pass','$email','$dept')";

$result=mysqli_query($con,$q);


if ($result==TRUE)
{
	header("location:login.php");
}
?>