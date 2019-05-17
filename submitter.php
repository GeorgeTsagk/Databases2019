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
			if($operation=='Update'){
				$memberNameUpdate = $_POST['memberNameUpdate'];
				$memberSurnameUpdate = $_POST['memberSurnameUpdate'];
				$memberStreetUpdate = $_POST['memberStreetUpdate'];
				$memberStreetNoUpdate = $_POST['memberStreetNoUpdate'];
				$memberPostalCodeUpdate = $_POST['memberPostalCodeUpdate'];
			}
			break;
		case 'Books':
			
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
					(!empty($memberPostalCodeUpdate))
				){
					$sentence = $sentence . ", ";
				}
			}
			if(!empty($memberSurnameUpdate)){
				$sentence = $sentence . "MLast='" . $memberSurnameUpdate . "' ";
				if(	(!empty($memberStreetUpdate))||
					(!empty($memberStreetNoUpdate))||
					(!empty($memberPostalCodeUpdate))
				){
					$sentence = $sentence . ", ";
				}
			}
			if(!empty($memberStreetUpdate)){
				$sentence = $sentence . "Street='" . $memberStreetUpdate . "' ";
				if(	(!empty($memberStreetNoUpdate))||
					(!empty($memberPostalCodeUpdate))
				){
					$sentence = $sentence . ", ";
				}
			}
			if(!empty($memberStreetNoUpdate)){
				$sentence = $sentence . "number=" . $memberStreetNoUpdate . " ";
				if((!empty($memberPostalCodeUpdate))
				){
					$sentence = $sentence . ", ";
				}
			}
			if(!empty($memberPostalCodeUpdate)){
				$sentence = $sentence . "postalCode=" . $memberPostalCodeUpdate . " ";
			}
			break;
			case 'Books':
			
			break;
			case 'Authors':
			
			break;
		}
	}
	
	//Values Field for Insert
	if($operation=='Insert'){
		switch($table){
			case 'member':
			$sentence = $sentence . " (Mfirst, MLast, Street, number, postalCode) "
			. "VALUES('" . $memberName ."', '" . $memberSurname . "', '" . $memberStreet 
			. "', " . $memberStreetNo . " , " . $memberPostalCode . ")";
			break;
			case 'Books':
			
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
					(!empty($memberPostalCode))){
					$sentence = $sentence . "AND ";
				}
			}
			if(!empty($memberSurname)){
				$sentence = $sentence . "MLast='" . $memberSurname . "' ";
				if((!empty($memberStreet))||
					(!empty($memberStreetNo))||
					(!empty($memberPostalCode))){
					$sentence = $sentence . "AND ";
				}
			}
			if(!empty($memberStreet)){
				$sentence = $sentence . "Street='" . $memberStreet . "' ";
				if((!empty($memberStreetNo))||
					(!empty($memberPostalCode))){
					$sentence = $sentence . "AND ";
				}
			}
			if(!empty($memberStreetNo)){
				$sentence = $sentence . "number=" . $memberStreetNo . " ";
				if((!empty($memberPostalCode))){
					$sentence = $sentence . "AND ";
				}
			}
			if(!empty($memberPostalCode)){
				$sentence = $sentence . "postalCode=" . $memberPostalCode . " ";
			}
			break;
			case 'Books':
			
			break;
			case 'Authors':
			
			break;
		}
	}
	echo $sentence . '<br>';
?>
<br>
<a href="index.php">Click</a>
