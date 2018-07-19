<?php

$user="root";
$pass="tabaibo";
$host="localhost";
$db="asd";

//$_POST["query"]="login";


$connection= new mysqli($host,$user,$pass,$db);

if($connection->connect_error){
	echo "db offline \n";
}else{
	
	switch($_POST["query"]){
	case"login":{
		$check_email="SELECT email FROM data WHERE email=\"".$_POST["email"]."\";";
		$check_result=$connection->query($check_email);
		if(!$check_result){
			echo "fail\n";
			break;
		}
		$check_pass="SELECT pass FROM data WHERE email=\"".$_POST["pass"]."\";";
		$check_result=$connection->query($check_pass);
		if(!$check_result){
			echo "fail\n";
	
		}else{
			echo "success\n";		
		}
		break;
		
	}

	case"signup":{
		$check_email="SELECT email FROM data WHERE email=\"".$_POST["email"]."\";";
		$check_result=$connection->query($check_email);
		if($check_result){
			echo "fail\n";
			break;
		}
		
		
		$query="INSERT INTO data(pass, email, name, birth, weight, height, mass, val_fitness, val_strength, val_cardio, goal_perc) VALUES(\"".$_POST["pass"]."\",\"".$_POST["email"]."\",\"".$_POST["name"]."\",\"".$_POST["birth"]."\",".$_POST["weight"].",".$_POST["height"].",".$_POST["mass"].",0,0,0,0);";
		$result=$connection->query($query);
		if(!$result){
			echo "fail\n";			
		}
		else{
			echo "success\n";					
		}

		break;
	}
	case"update":{
		$update="UPDATE data SET pass=\"".$_POST["pass"]."\",name=\"".$_POST["name"]."\",birth=\"".$_POST["birth"]."\",weight=".$_POST["weight"].",height=".$_POST["height"].",mass=".$_POST["mass"].",val_fitness=".$_POST["val_fitness"].",val_strength=".$_POST["val_strength"].",val_cardio=".$_POST["val_cardio"].",goal_perc=".$_POST["goal_perc"]." WHERE email=\"".$_POST["email"]."\";";
		$result=$connection->query($update);
		if(!$result){
			echo "fail\n";
								
		}
		else{
			echo "success\n";
		}

		break;
	}
	case"fetch":{
		$check="SELECT * FROM data WHERE email=\"".$_POST["email"]."\";";
		$result=$connection->query($check);
		if(!$result){
			echo "fail\n";					
		}
		else{
			echo "name:";
			echo $result->fetch_assoc()['name'];
			echo "|birth:";
			echo $result->fetch_assoc()['birth'];
			echo "|weight:";
			echo $result->fetch_assoc()['weight'];
			echo "|height:";
			echo $result->fetch_assoc()['height'];
			echo "|mass:";			
			echo $result->fetch_assoc()['mass'];
			echo "|val_fitness:";			
			echo $result->fetch_assoc()['val_fitness'];
			echo "|val_strength:";			
			echo $result->fetch_assoc()['val_strength'];
			echo "|val_cardio:";			
			echo $result->fetch_assoc()['val_cardio'];
			echo "|goal_perc:";
			echo $result->fetch_assoc()['goal_perc'];
		}
		
	}
	}//switch
}





?>

