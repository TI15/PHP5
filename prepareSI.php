<?php

include("dbcon.php");
if(isset($_GET['id'])) {
	if($conn = connect_db()) {
		// prepare and bind
		$stmt = $conn->prepare("SELECT namn from medlem where medlemsnummer = ?");
		$stmt->bind_param("i",$id);

		// set parameters and execute
		$id = htmlentities($_GET['id']);
		$stmt->execute();

		$stmt->bind_result($namn);

		while($stmt->fetch()) {
			echo "<p>Hej $namn</p>";
		}


		$stmt->close();
		$conn->close();
	}
}
?>