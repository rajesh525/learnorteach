<?php
include('config.php');
$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);


/*if(mysql_select_db( 'letslearn', $connection )){
#echo "lol";
}*/


if(isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['long']) && isset($_POST['lat']))
{

	$id = $_POST['uname'];
	$lat=$_POST['long'];
	$long=$_POST['lat'];

	$password=$_POST['password'];
	#$password=password_hash($password, PASSWORD_DEFAULT);
		
	$reg_array = array();
	
	$sql="SELECT * from user where uname='$id' and password='$password'";
	$result=mysqli_query($conn,$sql);
	
	if(mysqli_num_rows($result)!= 0){
	
	$reg_array['success']=1;
	$reg_array['message']="Login Successful";
	$sql="SELECT * from user where uname='$id'";
	$result=mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result, MYSQL_ASSOC);
	$reg_array['id']=$row['id'];
	echo $lat.",".$long.",".$id;
	
	$sql="UPDATE user SET lat='$lat',longt='$long' WHERE uname='$id'";
	$result=mysqli_query($conn,$sql);

	if($result)
	echo json_encode($reg_array);
			
		
	
	}else{
	$reg_array['success']=0;
	$reg_array['message']="Incorrect username or password or user does not exist";
echo json_encode($reg_array);
}

	}
else
{
	echo "not set";
}
?>
