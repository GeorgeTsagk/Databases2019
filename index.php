<html>
	<head>
		<title>Bitb pirate port</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<iframe src="Bitb.mp3" allow="autoplay" style="display:none" id="iframeAudio"></iframe> 
	</head>
	<body>
		<div id="menu">
			<h3>This is the UI for interacting with the database.</h3><br>
		</div>
		<div id="body">
			<h4>Prepare your ship for departure</h4>
			<a id="customButton" onclick='return showCustom()'>Custom form</a>  
			<a id="defaultButton" onclick='return showDefault()'>Select default</a><br>
			<div id="formCustom">
				<form action="submitter.php" method="post">
					<div id="operationType">
					<input type="radio" name="operation" value="Insert" onclick='return hideUpdateField()'> Insert  
					<input type="radio" name="operation" value="Delete" onclick='return hideUpdateField()'> Delete  
					<input type="radio" name="operation" value="Update" onclick='return showUpdateField()'> Update  
					</div>
					<div id="tableSelect" >
					<input type="radio" name="table" value="member" onclick='return showMemberField()'> Members
					<input type="radio" name="table" value="Books" onclick='return showBookField()'> Books
					<input type="radio" name="table" value="Authors" onclick='return showAuthorField()'> Authors
					</div>
					<div class = "inlineBlock" id="normalField">
						<div id="memberField">
						Name<br><input type="text" name="memberName"><br>
						Surname<br><input type="text" name="memberSurname"><br>
						Street<br><input type="text" name="memberStreet"><br>
						Street No.<br><input type="text" name="memberStreetNo"><br>
						Postal Code<br><input type="text" name="memberPostalCode"><br>
						</div>
						<div id="bookField">
						Title<br><input type="text" name="bookTitle"><br>
						Publish Year<br><input type="text" name="bookPublishYear"><br>
						</div>
						<div id="authorField">
						Name<br><input type="text" name="authorName"><br>
						Surname<br><input type="text" name="authorSurname"><br>
						</div>
					</div>
					<div class = "inlineBlock" id = "updateField">
						<div id="memberFieldUpdate">
						New Name<br><input type="text" name="memberNameUpdate"><br>
						New Surname<br><input type="text" name="memberSurnameUpdate"><br>
						New Street<br><input type="text" name="memberStreetUpdate"><br>
						New Street No.<br><input type="text" name="memberStreetNoUpdate"><br>
						New Postal Code<br><input type="text" name="memberPostalCodeUpdate"><br>
						</div>
						<div id="bookFieldUpdate">
						New Title<br><input type="text" name="bookTitleUpdate"><br>
						New Publish Year<br><input type="text" name="bookPublishYearUpdate"><br>
						</div>
						<div id="authorFieldUpdate">
						New Name<br><input type="text" name="authorNameUpdate"><br>
						New Surname<br><input type="text" name="authorSurnameUpdate"><br>
						</div>
					</div>
					<input id="buttonSubmit" type="submit" value="Ahoy!">
				</form>
			</div>
			
			
			<div id="formDefault">
				<form action="defaultSubmitter.php" method="post">
					<input type="radio" name="defaultSelector" value="default1"> Statement1 <br>  
					<input type="radio" name="defaultSelector" value="default2"> Statement2 <br>  
					<input type="radio" name="defaultSelector" value="default3"> Statement3 <br>  
					<input type="radio" name="defaultSelector" value="default4"> Statement4 <br>  
					<input id="buttonSubmit" type="submit" value="Ahoy!">
					
				</form>
			</div>
		</div>
	</body>
</html>
<script>
	function showCustom(){
		var cust = document.getElementById('formCustom');
		var normf = document.getElementById('normalField');
		var def = document.getElementById('formDefault');
		cust.style.display = "inline-block";
		normalField.style.display = "inline-block";
		def.style.display = "none";
	}
	function showDefault(){
		var cust = document.getElementById('formCustom');
		var def = document.getElementById('formDefault');
		var normf = document.getElementById('normalField');
		cust.style.display = "none";
		def.style.display = "inline-block";
		normalField.style.display = "none";
	}
	function showMemberField(){
		var stu_up = document.getElementById('memberFieldUpdate');
		var boo_up = document.getElementById('bookFieldUpdate');
		var aut_up = document.getElementById('authorFieldUpdate');
		var stu = document.getElementById('memberField');
		var boo = document.getElementById('bookField');
		var aut = document.getElementById('authorField');
		stu.style.display = "block";
		boo.style.display = "none";
		aut.style.display = "none";
		stu_up.style.display = "block";
		boo_up.style.display = "none";
		aut_up.style.display = "none";
	}
	function showBookField(){
		var stu_up = document.getElementById('memberFieldUpdate');
		var boo_up = document.getElementById('bookFieldUpdate');
		var aut_up = document.getElementById('authorFieldUpdate');
		var stu = document.getElementById('memberField');
		var boo = document.getElementById('bookField');
		var aut = document.getElementById('authorField');
		stu.style.display = "none";
		boo.style.display = "block";
		aut.style.display = "none";
		stu_up.style.display = "none";
		boo_up.style.display = "block";
		aut_up.style.display = "none";
	}
	function showAuthorField(){
		var stu_up = document.getElementById('memberFieldUpdate');
		var boo_up = document.getElementById('bookFieldUpdate');
		var aut_up = document.getElementById('authorFieldUpdate');
		var stu = document.getElementById('memberField');
		var boo = document.getElementById('bookField');
		var aut = document.getElementById('authorField');
		stu.style.display = "none";
		boo.style.display = "none";
		aut.style.display = "block";
		stu_up.style.display = "none";
		boo_up.style.display = "none";
		aut_up.style.display = "block";
	}
	function showUpdateField(){
		var f = document.getElementById('updateField');
		f.style.display = "inline-block";
	}
	function hideUpdateField(){
		var f = document.getElementById('updateField');
		f.style.display = "none";
	}
</script>
