<?php  

function validation(){
	global  $conn;
	global  $email;
	global  $password;
	global  $dir;
	

try{

	$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email = :email");
	$stmt->execute(['email'=>$email]);
	$row = $stmt->fetch();
	if($row['numrows'] > 0){
		if($row['status']){
			if(password_verify($password, $row['password'])){
				if($row['type']){
					print_r( $dir['type']);
					$_SESSION['admin'] = $row['id'];
				}
				else{
					$_SESSION['user'] = $row['id'];
				}
			}
			else{
				$_SESSION['error'] = 'Incorrect Password';
			}
		}
		else{
			$_SESSION['error'] = 'Account not activated.';
		}
	}
	else{
		$_SESSION['error'] = 'Email not found';
	}
}
catch(PDOException $e){
	echo "There is some problem in connection: " . $e->getMessage();
}
}