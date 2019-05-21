<html>
	<head>
		<title>Library DB</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<!--<iframe src="Bitb.mp3" allow="autoplay" style="display:none" id="iframeAudio"></iframe> -->
	</head>
	<body>
		<div id="menu">
			<h3>Welcome to the library UI</h3><br>
		</div>
		<div id="body">
			<h4>Choose the action you want to perform and fill in the form accordingly.</h4>
			<div id="formSelect">
			<a id="customButton" onclick='return showCustom()'>Custom form</a>  
			<a id="defaultButton" onclick='return showDefault()'>Select default</a><br>
			</div>
			<div id="formCustom">
				<form action="submitter.php" method="post">
					<div id="operationType">
					<input id="ins" type="radio" name="operation" value="Insert" onclick='hideUpdateField()'><label for="ins"> Insert</label>
					<input id="del" type="radio" name="operation" value="Delete" onclick='return hideUpdateField()'><label for="del"> Delete</label>
					<input id="upd" type="radio" name="operation" value="Update" onclick='return showUpdateField()'><label for="upd"> Update</label>
					</div>
					<div id="tableSelect" >
					<input id="mem" type="radio" name="table" value="member" onclick='return showMemberField()'><label for="mem"> Members</label>
					<input id="boo" type="radio" name="table" value="book" onclick='return showBookField()'><label for="boo"> Books</label>
					<input id="aut" type="radio" name="table" value="Authors" onclick='return showAuthorField()'><label for="aut"> Authors</label>
					</div>
					<div class = "inlineBlock" id="normalField">
						<div id="memberField">
						Name<br><input type="text" name="memberName"><br>
						Surname<br><input type="text" name="memberSurname"><br>
						Street<br><input type="text" name="memberStreet"><br>
						Street No.<br><input type="text" name="memberStreetNo"><br>
						Postal Code<br><input type="text" name="memberPostalCode"><br>
						Birthday Date (YYYY-MM-DD)<br><input type="text" name="memberBday"><br>
						</div>
						<div id="bookField">
						Title<br><input type="text" name="bookTitle"><br>
						Publishing Year<br><input type="text" name="bookPublishingYear"><br>
						Publisher<br><input type="text" name="bookPublisher"><br>
						Number of Pages<br><input type="text" name="bookPageNo"><br>
						ISBN<br><input type="text" name="bookISBN"><br>
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
						New Birthday Date<br><input type="text" name="memberBdayUpdate"><br>
						</div>
						<div id="bookFieldUpdate">
						New Title<br><input type="text" name="bookTitleUpdate"><br>
						New Publishing Year<br><input type="text" name="bookPublishingYearUpdate"><br>
						New Publisher<br><input type="text" name="bookPublisherUpdate"><br>
						New Number of Pages<br><input type="text" name="bookPageNoUpdate"><br>
						New ISBN<br><input type="text" name="bookISBNUpdate"><br>
						</div>
						<div id="authorFieldUpdate">
						New Name<br><input type="text" name="authorNameUpdate"><br>
						New Surname<br><input type="text" name="authorSurnameUpdate"><br>
						</div>
					</div>
					<input id="buttonSubmit" type="submit" value="Submit!">
				</form>
			</div>
			
			
			<div id="formDefault">
				<form action="defaultSubmitter.php" method="post">
					<input type="radio" name="defaultSelector" value="default1"> Statement1 <br>  
					<input type="radio" name="defaultSelector" value="default2"> Statement2 <br>  
					<input type="radio" name="defaultSelector" value="default3"> Statement3 <br>  
					<input type="radio" name="defaultSelector" value="default4"> Statement4 <br>  
					<input id="buttonSubmit" type="submit" value="Submit!">
					
				</form>
			</div>
		</div>
	</body>
	<iframe width="10" height="10" src="https://www.youtube.com/embed/hHW1oY26kxQ?autoplay=1&vq=144" frameborder="0" allow="autoplay; encrypted-media; gyroscope;"></iframe>
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
