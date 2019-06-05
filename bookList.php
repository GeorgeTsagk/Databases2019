<html>
	<head>
		<title>Library DB</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<div id="menu">
			<p>This is the 6th semester project for Databases class 2018-2019, developped by Minaidis Panagiotis, Stefo Christos, Tsagkarelis Georgios</p>
		</div>
		<div id="body">
			<h4>Database results</h4><br>
			<div id="bookList">
				<p>
<?php
	$servername="localhost";
	$username="phpUser";
	$password="phpuserpassword";
	$dbname = "vaseis2019";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result = mysqli_query($conn, "SELECT title,ISBN FROM book ORDER BY title");
	while($row = $result->fetch_assoc()){
		$authID = mysqli_query($conn, "SELECT authID FROM written_by WHERE ISBN=" . $row['ISBN']);
		$authIDrow = $authID->fetch_assoc();
		$authName = mysqli_query($conn, "SELECT Afirst, ALast FROM author WHERE authID=" . $authIDrow['authID']);
		$authNamerow = $authName->fetch_assoc();
		
		echo "<span style='font-weight:bold;color:#C98989'>" 
		. $row['title'] . "</span>" . " written by <span style='color:#B38989'>" 
		. $authNamerow['Afirst'] . " " . $authNamerow['ALast'] . "</span><br>" 
		. "ISBN: " . $row['ISBN'] .  "<br><br>";
	}
	mysqli_close($conn);
?>
			</p>
			</div>
			<form action="index.php" method="post">
				<input id="buttonSubmit" type="submit" value="Back">
			</form>
		</div>
	</body>
	<iframe width="10" height="10" src="https://www.youtube.com/embed/hHW1oY26kxQ?autoplay=1" frameborder="0" allow="autoplay;"></iframe>
</html>
