<?php
include('config.php');
$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

/*if(mysql_select_db( 'letslearn', $connection )){
#echo "lol";
}*/


if(isset($_GET['phone']))
{

	$phone = $_GET['phone'];
	
		
	$reg_array = array();
	
	$sql="SELECT user.* from user
where mobile='$phone'";

	$result=mysqli_query($conn,$sql);
	
	if(mysqli_num_rows($result)>0)
	$reg_array['success']=0;
	else
		$reg_array['success']=1;
	
	echo json_encode($reg_array);
			
}

else if(isset($_GET['uname']))
{

	$phone = $_GET['uname'];
	
		
	$reg_array = array();
	
	$sql="SELECT user.* from user
     where uname='$phone'";

	$result=mysqli_query($conn,$sql);
	
	if(mysqli_num_rows($result)>0)
	$reg_array['success']=0;
	else
		$reg_array['success']=1;
	
	echo json_encode($reg_array);
			
}
else
{
	echo "not set";
}
?>
