<?php

include("dbcon.php");
if(isset($_POST['namn']) && isset($_POST['tel'])) {

	if($conn = connect_db()) {
		// prepare and bind
		$stmt = $conn->prepare("INSERT INTO medlem  VALUES (?, ?, ?)");
		$stmt->bind_param("iss", $id, $namn, $tel);

		// set parameters and execute
		$id = 0;
		$namn = htmlentities($_POST['namn']);
		$tel = htmlentities($_POST['tel']);
		$stmt->execute();

		$id = 0;
		$namn = "En till";
		$tel = "123456";
		$stmt->execute();


		echo "New records created successfully";

		$stmt->close();
		$conn->close();
	}
}
?>

