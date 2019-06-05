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
	$defaultOp = $_POST['defaultSelector'];
	//query assignment
	switch($defaultOp){
		case 'default1':
		$sentence = "SELECT ISBN,COUNT(*) as howManyCopies FROM copies GROUP BY ISBN HAVING COUNT(*) > 4 ORDER BY COUNT(*) DESC;";
		$result = mysqli_query($conn, $sentence);
		while($row = $result->fetch_assoc()){
			echo "<span style='font-weight:bold;color:#C98989'>" 
			. $row['ISBN'] . ' ' . "</span>" . $row['howManyCopies'] . '<br>';
		}
		break;
		case 'default2':
		$sentence="select title,pubName, Afirst as FirstName ,Alast as LastName,categoryName from book,author, belongs_to where (authID,book.ISBN) in (select authID,ISBN from written_by where belongs_to.ISBN=written_by.ISBN);";
		$result = mysqli_query($conn, $sentence);
		while($row = $result->fetch_assoc()){
			echo "<span style='font-weight:bold;color:#C98989'>" 
			. $row['title'] . ' ' . "</span>" . "Written by " . $row['FirstName'] . ' ' . $row['LastName'] . '<br>'
			. "Published by: " . $row['pubName'] 
			. '<br>' . "Category: " . $row['categoryName'] . '<br><br>';
		}
		break;
		case 'default3':
		
		$sentence="select title,borrowedFreq from ( select ISBN, count(*) as borrowedFreq from borrows GROUP BY ISBN ORDER BY COUNT(*) DESC LIMIT 3) Borrowed,book where Borrowed.ISBN=book.ISBN;";
		$result = mysqli_query($conn, $sentence);
		while($row = $result->fetch_assoc()){
			echo "<span style='font-weight:bold;color:#C98989'>" 
			. $row['title'] . ' ' . "</span>" . "borrowed " . $row['borrowedFreq'] . " acetimes." . '<br><br>';
		}
		
		break;
		case 'default4':
		$sentence="select categoryName, HowMany FROM( select supCatID,count(*) as HowMany from hasSupercategory GROUP BY supCatID ORDER BY COUNT(*) DESC LIMIT 1) supCategories,category where catID=supCatID;";
		$result = mysqli_query($conn, $sentence);
		while($row = $result->fetch_assoc()){
			echo "<span style='font-weight:bold;color:#C98989'>" 
			. $row['categoryName'] . ' ' . "</span>" . "borrowed " . $row['HowMany'] . " times". '<br><br>';
		}
		break;
		case 'default5':
		$sentence="select avg(bor) borrowsPerMember from (select count(*) bor from borrows GROUP BY memberID) borrows;";
		$result = mysqli_query($conn, $sentence);
		while($row = $result->fetch_assoc()){
			echo "<span style='font-weight:bold;color:#C98989'>" 
			. $row['borrowsPerMember'] . ' ' . "</span>" . " average borrows per member" . '<br><br>';
		}
		break;
		case 'default6':
		$sentence="select perm/temp as Permanent_over_Temporary_Empolyees from (select count(*) as perm from permanent_employee) numPermanent, (select count(*) as temp from temporary_employee ) numTemporary;";
		$result = mysqli_query($conn, $sentence);
		while($row = $result->fetch_assoc()){
			echo "<span style='font-weight:bold;color:#C98989'>" 
			. $row['Permanent_over_Temporary_Empolyees'] . ' ' . "</span>" . " Permanent/Temporary employees" . '<br><br>';
		}
		break;
		case 'default7':
		$sentence="select categoryName,count(*) as HowManyBorrowed from belongs_to where ISBN in (select ISBN from borrows) GROUP BY categoryName ORDER BY COUNT(*) DESC LIMIT 3;";
		$result = mysqli_query($conn, $sentence);
		while($row = $result->fetch_assoc()){
			echo "<span style='font-weight:bold;color:#C98989'>" 
			. $row['categoryName'] . ' ' . "</span>" . "borrows: " . $row['HowManyBorrowed'] . '<br><br>';
		}
		break;
	}
	/*
	$result = mysqli_query($conn, "SELECT * from memberDetails ORDER BY Mlast");
	while($row = $result->fetch_assoc()){
		echo "<span style='font-weight:bold;color:#C98989'>" 
		. $row['MLast'] . ' ' .$row['Mfirst'] . "</span>" . " born <span style='color:#B38989'>" 
		. $row['Mbirthdate'] . "</span><br>" 
		. "ID: " . $row['number'] .  "<br><br>";
	}
	mysqli_close($conn);
	*/
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


