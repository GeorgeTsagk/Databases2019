<html>
	<head>
		<title>Library DB</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<!-- <iframe src="Bitb.mp3" allow="autoplay" style="display:none" id="iframeAudio"></iframe> -->
	</head>
	<body>
		<div id="menu">
			<h3>Welcome to the library UI</h3><br>
		</div>
		<div id="body">
			<h4>Database results</h4><br>
			<div id="phpResults">
				<p>
<?php
	//Init state data
	$operation = $_POST['operation'];
	$table = $_POST['table'];
	$sentence = '';
	//load fields for selected table (update fields too if update operation is selected)
	switch ( $table ) {
		case 'member':
			$memberName = $_POST['memberName'];
			$memberSurname = $_POST['memberSurname'];
			$memberStreet = $_POST['memberStreet'];
			$memberStreetNo = $_POST['memberStreetNo'];
			$memberPostalCode = $_POST['memberPostalCode'];
			$memberBday = $_POST['memberBday'];
			if($operation=='Update'){
				$memberNameUpdate = $_POST['memberNameUpdate'];
				$memberSurnameUpdate = $_POST['memberSurnameUpdate'];
				$memberStreetUpdate = $_POST['memberStreetUpdate'];
				$memberStreetNoUpdate = $_POST['memberStreetNoUpdate'];
				$memberPostalCodeUpdate = $_POST['memberPostalCodeUpdate'];
				$memberBdayUpdate = $_POST['memberBdayUpdate'];
			}
			break;
		case 'book':
			$bookTitle = $_POST['bookTitle'];
			$bookPublishingYear = $_POST['bookPublishingYear'];
			$bookPublisher = $_POST['bookPublisher'];
			$bookPageNo = $_POST['bookPageNo'];
			$bookISBN = $_POST['bookISBN'];
			if($operation=='Update'){
				$bookTitleUpdate = $_POST['bookTitleUpdate'];
				$bookPublishingYearUpdate = $_POST['bookPublishingYearUpdate'];
				$bookPublisherUpdate = $_POST['bookPublisherUpdate'];
				$bookPageNoUpdate = $_POST['bookPageNoUpdate'];
				$bookISBNUpdate = $_POST['bookISBNUpdate'];
			}
			break;
		case 'Authors':
			
			break;
	}
	//sentence prefix according to operation and table
	switch ( $operation ) {
		case 'Insert':
			$sentence = "INSERT INTO " . $table;
		break;
		case 'Delete':
			$sentence = "DELETE FROM " . $table;
		break;
		case 'Update':
			$sentence = "UPDATE " . $table ;
		break;
	}
	//SET fields for Update
	if($operation=='Update'){
		$sentence = $sentence . " SET ";
		switch($table){
			case 'member':
			if(!empty($memberNameUpdate)){
				$sentence = $sentence . "Mfirst='" . $memberNameUpdate . "' ";
				if((!empty($memberSurnameUpdate))||
					(!empty($memberStreetUpdate))||
					(!empty($memberStreetNoUpdate))||
					(!empty($memberPostalCodeUpdate))||
					(!empty($memberBdayUpdate))
				){
					$sentence = $sentence . ", ";
				}
			}
			if(!empty($memberSurnameUpdate)){
				$sentence = $sentence . "MLast='" . $memberSurnameUpdate . "' ";
				if(	(!empty($memberStreetUpdate))||
					(!empty($memberStreetNoUpdate))||
					(!empty($memberPostalCodeUpdate))||
					(!empty($memberBdayUpdate))
				){
					$sentence = $sentence . ", ";
				}
			}
			if(!empty($memberStreetUpdate)){
				$sentence = $sentence . "Street='" . $memberStreetUpdate . "' ";
				if(	(!empty($memberStreetNoUpdate))||
					(!empty($memberPostalCodeUpdate))||
					(!empty($memberBdayUpdate))
				){
					$sentence = $sentence . ", ";
				}
			}
			if(!empty($memberStreetNoUpdate)){
				$sentence = $sentence . "number=" . $memberStreetNoUpdate . " ";
				if((!empty($memberPostalCodeUpdate))||
					(!empty($memberBdayUpdate))
				){
					$sentence = $sentence . ", ";
				}
			}
			if(!empty($memberPostalCodeUpdate)){
				$sentence = $sentence . "postalCode=" . $memberPostalCodeUpdate . " ";
				if(!empty($memberBdayUpdate)){
					$sentence = $sentence . ", ";
				}
			}
			if(!empty($memberBdayUpdate)){
				$sentence = $sentence . "Mbirthdate='" . $memberBdayUpdate . "')";
			}
			break;
			case 'book':
			if(!empty($bookTitleUpdate)){
				$sentence = $sentence . "title='" . $bookTitleUpdate . "' ";
				if((!empty($bookPublishingYearUpdate))||
					(!empty($bookPublisherUpdate))||
					(!empty($bookPageNoUpdate))||
					(!empty($bookISBNUpdate))){
						$sentence = $sentence . ", ";
					}
			}
			if(!empty($bookPublishingYearUpdate)){
				$sentence = $sentence . "pubYear=" . $bookPublishingYearUpdate . " ";
				if((!empty($bookPageNoUpdate))||
					(!empty($bookPublisherUpdate))||
					(!empty($bookISBNUpdate))){
						$sentence = $sentence . ", ";
					}
			}
			if(!empty($bookPublisherUpdate)){
				$sentence = $sentence . "pubName=" . $bookPublisherUpdate . " ";
				if( (!empty($bookPageNoUpdate))||
					(!empty($bookISBNUpdate))
					){
						$sentence = $sentence . ", ";
					}
			}
			if(!empty($bookPageNoUpdate)){
				$sentence = $sentence . "numpages=" . $bookPageNoUpdate . " ";
				if(!empty($bookISBNUpdate)){
						$sentence = $sentence . ", ";
					}
			}
			if(!empty($bookISBNUpdate)){
				$sentence = $sentence . "ISBN=" . $bookISBNUpdate . " ";
			}
			break;
			case 'Authors':
			
			break;
		}
	}
	
	//Values Field for Insert
	if($operation=='Insert'){
		switch($table){
			case 'member':
			$sentence = $sentence . " (Mfirst, MLast, Street, number, postalCode, Mbirthdate) "
			. "VALUES('" . $memberName ."', '" . $memberSurname . "', '" . $memberStreet 
			. "', " . $memberStreetNo . " , " . $memberPostalCode . ", '" . $memberBday . "')";
			break;
			case 'book':
			$sentence = $sentence . " (title, pubYear, pubName, numpages, ISBN) "
			. "VALUES('" . $bookTitle . "' , " 
			. $bookPublishingYear . " , '"
			. $bookPublisher . "', "
			. $bookPageNo . " , " 
			. $bookISBN . " )";
			break;
			case 'Authors':
			
			break;
			
		}
	}
	
	//fill WHERE filters for Delete / Update
	if(($operation=='Delete')||($operation=='Update')){
		$sentence = $sentence . " WHERE ";
		switch($table){
			case 'member':
			if(!empty($memberName)){
				$sentence = $sentence . "Mfirst='" . $memberName . "' ";
				if((!empty($memberSurname))||
					(!empty($memberStreet))||
					(!empty($memberStreetNo))||
					(!empty($memberPostalCode))||
					(!empty($memberBday))
				){
					$sentence = $sentence . "AND ";
				}
			}
			if(!empty($memberSurname)){
				$sentence = $sentence . "MLast='" . $memberSurname . "' ";
				if((!empty($memberStreet))||
					(!empty($memberStreetNo))||
					(!empty($memberPostalCode))||
					(!empty($memberBday))
				){
					$sentence = $sentence . "AND ";
				}
			}
			if(!empty($memberStreet)){
				$sentence = $sentence . "Street='" . $memberStreet . "' ";
				if((!empty($memberStreetNo))||
					(!empty($memberPostalCode))||
					(!empty($memberBday))
				){
					$sentence = $sentence . "AND ";
				}
			}
			if(!empty($memberStreetNo)){
				$sentence = $sentence . "number=" . $memberStreetNo . " ";
				if((!empty($memberPostalCode))||
					(!empty($memberBday))
				){
					$sentence = $sentence . "AND ";
				}
			}
			if(!empty($memberPostalCode)){
				$sentence = $sentence . "postalCode=" . $memberPostalCode . " ";
				if(!empty($memberBday)){
					$sentence = $sentence . "AND ";
				}
			}
			if(!empty($memberBday)){
				$sentence = $sentence . "Mbirthdate=" . $memberBday . " ";
			}
			break;
			case 'book':
			if(!empty($bookTitle)){
				$sentence = $sentence . "title='" . $bookTitle . "' ";
				if((!empty($bookPublishingYear))||
					(!empty($bookPublisher))||
					(!empty($bookPageNo))||
					(!empty($bookISBN))){
						$sentence = $sentence . "AND ";
					}
			}
			if(!empty($bookPublishingYear)){
				$sentence = $sentence . "pubYear=" . $bookPublishingYear . " ";
				if((!empty($bookPageNo))||
					(!empty($bookPublisher))||
					(!empty($bookISBN))){
						$sentence = $sentence . "AND ";
					}
			}
			if(!empty($bookPublisher)){
				$sentence = $sentence . "pubName='" . $bookPublisher . "' ";
				if( (!empty($bookPageNo))||
					(!empty($bookISBN))
					){
						$sentence = $sentence . "AND ";
					}
			}
			if(!empty($bookPageNo)){
				$sentence = $sentence . "numpages=" . $bookPageNo . " ";
				if(!empty($bookISBN)){
						$sentence = $sentence . "AND ";
					}
			}
			if(!empty($bookISBN)){
				$sentence = $sentence . "ISBN=" . $bookISBN . " ";
			}
			break;
			case 'Authors':
			
			break;
		}
	}
	
	$servername="localhost";
	$username="phpUser";
	$password="phpuserpassword";
	$dbname = "vaseis2019";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
	echo "<span style='color:green'>Connected</span> to Database." . '<br><br>';
	
	echo "Attempting query." . '<br><br>';
	echo $sentence . '<br><br>';
	$result = mysqli_query($conn, $sentence);
	
	if(!empty($result)){
		echo "Query was <span style='color:green'>Succesfull</span>";
	}else{
		echo "Query <span style='color:red'>failed</span>: Make sure to put correct values for each field 
		depending on query type." . '<br>';
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
	<iframe width="200" height="200" src="https://www.youtube.com/embed/hHW1oY26kxQ?autoplay=1" frameborder="0" allow="autoplay;"></iframe>
</html>

