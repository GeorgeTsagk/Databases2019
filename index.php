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
			<h4>Choose the action you want to perform and fill in the form accordingly.</h4>
			<div id="formSelect">
			<a id="customButton" onclick='return showCustom()'>CUSTOM</a>  
			<a id="defaultButton" onclick='return showDefault()'>DEFAULT</a>
			<a id="bookListButton" href="bookList.php">LIST BOOKS</a><br>
			</div>
			<div id="formCustom">
				<form action="submitter.php" method="post">
					Select query type
					<div id="operationType">
					<input id="ins" type="radio" name="operation" value="Insert" onclick='hideUpdateField()'><label for="ins"> Insert</label>
					<input id="del" type="radio" name="operation" value="Delete" onclick='return hideUpdateField()'><label for="del"> Delete</label>
					<input id="upd" type="radio" name="operation" value="Update" onclick='return showUpdateField()'><label for="upd"> Update</label>
					</div>
					Choose table
					<div id="tableSelect" >
					<input id="mem" type="radio" name="table" value="member" onclick='return showMemberField()'><label for="mem"> Members</label>
					<input id="boo" type="radio" name="table" value="book" onclick='return showBookField()'><label for="boo"> Books</label>
					<input id="bor" type="radio" name="table" value="borrows" onclick='return showAuthorField()'><label for="bor"> Borrow</label>
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
						<div id="borrowsField">
						Member ID<br><input type="text" name="borrowsID"><br>
						Book ISBN<br><input type="text" name="borrowsISBN"><br>
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
						<div id="borrowsFieldUpdate">
						New Member ID<br><input type="text" name="borrowsIDUpdate"><br>
						New Book ISBN<br><input type="text" name="borrowsISBNUpdate"><br>
						</div>
					</div>
					<input id="buttonSubmit" type="submit" value="Submit!">
				</form>
			</div>
			
			
			<div id="formDefault">
				<form action="defaultSubmitter.php" method="post">
					<input id="def1" type="radio" name="defaultSelector" value="default1"><label for="def1"> Statement1 </label><br>  
					<input id="def2" type="radio" name="defaultSelector" value="default2"><label for="def2"> Statement2 </label><br>  
					<input id="def3" type="radio" name="defaultSelector" value="default3"><label for="def3"> Statement3 </label><br>  
					<input id="def4" type="radio" name="defaultSelector" value="default4"><label for="def4"> Statement4 </label><br>  
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
		var aut_up = document.getElementById('borrowsFieldUpdate');
		var stu = document.getElementById('memberField');
		var boo = document.getElementById('bookField');
		var aut = document.getElementById('borrowsField');
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
		var aut_up = document.getElementById('borrowsFieldUpdate');
		var stu = document.getElementById('memberField');
		var boo = document.getElementById('bookField');
		var aut = document.getElementById('borrowsField');
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
		var aut_up = document.getElementById('borrowsFieldUpdate');
		var stu = document.getElementById('memberField');
		var boo = document.getElementById('bookField');
		var aut = document.getElementById('borrowsField');
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
