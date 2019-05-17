<?php
	//Init state data
	$operation = $_POST['operation'];
	$table = $_POST['table'];
	$sentence = '';
	//load fields for selected table (update fields too if update operation is selected)
	switch ( $table ) {
		case 'Students':
			$studentName = $_POST['studentName'];
			$studentSurname = $_POST['studentSurname'];
			$studentAge = $_POST['studentAge'];
			$studentCardID = $_POST['studentCardID'];
			if($operation=='Update'){
				$studentNameUpdate = $_POST['studentNameUpdate'];
				$studentSurnameUpdate = $_POST['studentSurnameUpdate'];
				$studentAgeUpdate = $_POST['studentAgeUpdate'];
				$studentCardIDUpdate = $_POST['studentCardIDUpdate'];
			}
			break;
		case 'Books':
			echo "Books case";
			break;
		case 'Authors':
			echo "Authors case";
			break;
	}
	//prepare sentence according to operation and table
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
	
	if($operation=='Update'){
		$sentence = $sentence . " SET ";
		switch($table){
			case 'Students':
			if(!empty($studentNameUpdate)){
				$sentence = $sentence . "studentName='" . $studentNameUpdate . "' ";
				if((!empty($studentSurnameUpdate))||(!empty($studentAgeUpdate))){
					$sentence = $sentence . ", ";
				}
			}
			if(!empty($studentSurnameUpdate)){
				$sentence = $sentence . "studentSurname='" . $studentSurnameUpdate . "' ";
				if(!empty($studentAgeUpdate)){
					$sentence = $sentence . ", ";
				}
			}
			if(!empty($studentAgeUpdate))
				$sentence = $sentence . "studentAge='" . $studentAgeUpdate . "' ";
			break;
			case 'Books':
			
			break;
			case 'Authors':
			
			break;
		}
	}
	
	//fill WHERE filters
	$sentence = $sentence . " WHERE ";
	switch($table){
		case 'Students':
		if(!empty($studentName)){
			$sentence = $sentence . "studentName='" . $studentName . "' ";
			if((!empty($studentSurname))||(!empty($studentAge))){
				$sentence = $sentence . "AND ";
			}
		}
		if(!empty($studentSurname)){
			$sentence = $sentence . "studentSurname='" . $studentSurname . "' ";
			if(!empty($studentAge)){
				$sentence = $sentence . "AND ";
			}
		}
		if(!empty($studentAge))
			$sentence = $sentence . "studentAge='" . $studentAge . "' ";
		break;
		case 'Books':
		
		break;
		case 'Authors':
		
		break;
	}
	echo $sentence . '<br>';
?>
<br>
<a href="index.php">Click</a>
