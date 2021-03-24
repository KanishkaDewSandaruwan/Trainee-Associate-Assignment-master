<?php 
require_once 'connection.php';

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
	if ($con) {
		$email = $_POST["email"];
		$password = $_POST["password"];

		$query = "SELECT * FROM user where email = '$email' AND password = '$password'";
		$res = mysqli_query($con, $query);

		if ($res) {
			if ($row = mysqli_fetch_assoc($res)) {
				$usedata['id'] = $row['id'];

				echo json_encode($usedata);
			}
		}else{
			http_response_code(404);
		}
	}
 ?>