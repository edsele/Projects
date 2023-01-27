<?php

include_once 'connection.php';

if (isset($_POST['company_id'])) {
	$query = "SELECT * FROM departments where status='1' AND c_id=".$_POST['company_id'];
	$result = $conn->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">None</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['id'].'>'.$row['DepartmentName'].'</option>';
		 }
	}else{

		echo '<option>None</option>';
	}

}

?>
