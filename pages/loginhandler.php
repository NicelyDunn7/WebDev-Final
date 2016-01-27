<?php
	$command = empty($_POST['command']) ? false : $_POST['command'];
	if($command == 'login'){
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
		if ($username == 'test' && $password == 'pass') {
			setcookie('userid', $username);
			$response = 'Successful Log In. Welcome ' . $username;
		}
		else {
			$response = 'Incorrect Username or Password';
		}
		print $response;
	}
	if($command == 'get'){
		$userid = empty($_COOKIE['userid']) ? '' : $_COOKIE['userid'];
		if ($userid=='test') {
			$servername = "dbhost-mysql.cs.missouri.edu";
			$username = "dpdbp7";
			$password = "qd9ASY8cWs";
			$dbname = "dpdbp7";
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			$sql = "SELECT * from rushes ORDER BY lname";
			$result = $conn->query($sql);
			echo '<h1 id="rdb">Rush Database</h1>
				<table id="rushes">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Hometown</th>
						<th>High School</th>
						<th>Email Address</th>
					</tr>
				</thead>';
				while($row = mysqli_fetch_array($result)){
					/*$response += '
						<tr>
							<td>' . $row["fname"] . '</td>
							<td>' . $row["lname"] . '</td>
							<td>' . $row["hometown"] . '</td>
							<td>' . $row["highschool"] . '</td>
							<td>' . $row["email"] . '</td>
						</tr>';*/

					?>
						<tr>
							<td><?php echo $row['fname']?></td>
							<td><?php echo $row['lname']?></td>
							<td><?php echo $row['hometown']?></td>
							<td><?php echo $row['highschool']?></td>
							<td><?php echo $row['email']?></td>
						</tr>
					<?php
				}
				echo '</table>';
		}
		else {
			$response = 'Please Log In To View The Rush Database';
		}
		print $response;
	}
	if($command == 'logout'){
		setcookie('userid', '', 1);
		print 'Successful Log Out';
	}
?>
