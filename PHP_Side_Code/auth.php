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
 $pass=$_POST['password1'];

 $q="select * from login where Username='$name' && Password='$pass'";

 $result=mysqli_query($con,$q);
 $res=mysqli_fetch_assoc($result);
 $num=mysqli_num_rows($result);
 
 if ($num==1)
 {

     if ($res['Username']=='admin') 
     {
         header("location:teacher.php");
         
     }
     else
     {
         header('location:dash.php');
    }
}
else
{
    $_SESSION['error']="error";
    header('location:login.php');

}

?>