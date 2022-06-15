<?php
	include 'includes/conn.php';
	session_start();
	$_SESSION['admin']="admin";
	if(isset($_SESSION['admin'])){
		header('location: admin/home.php');
	}

	if(isset($_SESSION['user'])){
		$conn = $pdo->open();
		header('location: admin/home.php');

		try{
			$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
			$stmt->execute(['id'=>$_SESSION['user']]);
			$user = $stmt->fetch();
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

		$pdo->close();
	}
?>