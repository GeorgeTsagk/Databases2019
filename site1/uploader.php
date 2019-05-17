<?php
	$name = $_FILES['file']['name'];
	$temp = $_FILES['file']['tmp_name'];
	if(isset($name)){
		echo $temp . " to " . $name . "<br/>";
		echo "Full Path to be pasted at: " . '/var/www/html/site1/uploads/'.$name . "<br/>";
		if(!empty($name)){
			if(move_uploaded_file( $temp, '/var/www/html/site1/uploads/'.$name)){
				echo "Uploaded<br/>";
			}else{
				echo "Not Uploaded<br/>";
			}
		}else{
			echo "<br/> File is empty";
		}
	}
?>
<h3>Choose a file to upload..</h3>
<form action="uploader.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file">
	<br>
	<input type="submit" value="Upload">
</form>
<a href="home.php"><h3>Go back to home</h3></a>
