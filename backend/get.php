<?php
include('config.php');
$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

/*if(mysql_select_db( 'letslearn', $connection )){
#echo "lol";
}*/


if(isset($_GET['id']))
{

	$id = $_GET['id'];
	
		
	$reg_array = array();
	
	$sql="SELECT user.*,learn.topic
FROM  `user`,`learn`
where user.id=learn.id ";

	$result=mysqli_query($conn,$sql);
	
	
	
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
		#echo $r;   
	$rj=array("name"=>$r['uname'],"email"=>$r['email'],"mobile"=>$r['mobile'],"topic"=>$r['topic'],"lat"=>$r['lat'],"long"=>$r['longt']);
$rows[]= $rj;
}

#echo json_encode($rows);

	$reg_array['success']=1;
	$reg_array['learn']=$rows;
	$sql="SELECT user.*,teach.topic 
FROM  `user` , `teach` 
WHERE user.id = teach.id";
	$result=mysqli_query( $conn,$sql);
	
	
	
$ros = array();
while($r = mysqli_fetch_assoc($result)) {
#echo $r;
	$rj=array("name"=>$r['uname'],"email"=>$r['email'],"mobile"=>$r['mobile'],"topic"=>$r['topic'],"lat"=>$r['lat'],"long"=>$r['longt']);
$ros[]= $rj;
}
	$reg_array['teach']=$ros;
	echo json_encode($reg_array);
			
		
	
	

	}
else
{
	echo "not set";
}
?>
