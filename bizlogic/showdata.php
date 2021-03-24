<?php 
require_once 'connection.php';

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
	if ($con) {
		$id = $_POST["id"];

		$query = "SELECT * FROM user where id = '$id'";
		$res = mysqli_query($con, $query);

		if ($res) {
			if ($row = mysqli_fetch_assoc($res)) {
				$usedata['id'] = $row['id'];
				$usedata['name'] = $row['name'];
				$usedata['username'] = $row['username'];
				$usedata['email'] = $row['email'];

				echo json_encode($usedata);
			}
		}else{
			http_response_code(404);
		}
	}
 ?>