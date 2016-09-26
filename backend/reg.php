<?php

include('config.php');
$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

/*if(mysql_select_db( 'letslearn', $connection )){
#echo "lol";
}*/

if(isset($_POST['password'])&&isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['mobile'])&& isset($_POST['llist'])&& isset($_POST['tlist']))
{
$uname=$_POST['uname'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$llist=$_POST['llist'];
$tlist=$_POST['tlist'];

$password=$_POST['password'];
#$password=password_hash($password, PASSWORD_DEFAULT);
$reg_array = array();
	
	

	
	
	$sql="INSERT INTO user(uname,email,password,mobile) VALUES ('$uname','$email','$password','$mobile')";
	#echo $sql;
	

	$result=mysqli_query($conn,$sql);
$reg_array = array();
	
	

	
	
	//$sql="INSERT INTO user(uname,email,password,mobile) VALUES ('$uname','$email','$password','$mobile')";


//$result=mysql_query( $sql, $connection );
	
			 
			if($result)
			{
				$reg_array['success'] = 1;
				$reg_array['message']="registartion Successful";
				#echo "inserted";
				
					$sql="select id from user where uname='$uname'";
					$result=mysqli_query($conn,$sql);
					$row = mysqli_fetch_array($result, MYSQL_ASSOC);
						$id=$row['id'];

$tok = strtok($llist, ",");
	
	while ($tok !== false) {
//echo $tok;
    $sql="insert into learn(id,topic) values ($id,'$tok')";
$result=mysqli_query($conn,$sql);
    $tok = strtok(",");
}
$tok = strtok($tlist, ",");
	
	while ($tok !== false) {
    $sql="insert into teach(id,topic) values ($id,'$tok')";
$result=mysqli_query($conn,$sql);
    $tok = strtok(",");
}

}
else{
				$reg_array['success'] = 0;
				$reg_array['message']="registartion Failed";

			}
		echo json_encode($reg_array);
		
	




	



}else{
echo "not set";
}


?>
