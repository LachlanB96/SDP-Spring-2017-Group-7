
<?php

$conn = new mysqli('localhost', 'root', 'mysql', 'localdb');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$conn->close();
?>


?><!-- echo 'Connected to MySQL';
$result = db_conn("SELECT DISTINCT from_city FROM flights ORDER BY from_city"); ?>
						<select class="btn btn-default btn-block" name="flight_source"> 
							<?php while ($a_row = mysqli_fetch_assoc($result)) { ?>
							<option value="<?=$a_row[from_city]?>"> <?=$a_row[from_city]?></option>
							<?php } ?>
						</select>
					</tr>
?> -->


<!-- 
CREATING A USER
$sql = "INSERT INTO users (username, password, ts, anything)
VALUES ('test', 'pass', 'Tuesday', 'today')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} -->