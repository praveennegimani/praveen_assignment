<!DOCTYPE html>
<html>
<head>
	<title>php</title>

<style>
	table{
		width:100%;
		height:auto;
	}
	h1{
		text-align:center;
		color:green;
	}
</style>
</head>
<body>
<h1>Added Information</h1>
	<table cellpadding="1" cellspacing="1" border="1">
<?php
		$courseType = $_GET['courseType'];
		$id = $_GET['id'];
		$slug = $_GET['slug'];
		$name = $_GET['name'];
		
		$conn = new mysqli("localhost","root","","test");
		if($conn->connect_error){
			echo "cannot connected";
		}
		$sql = "INSERT INTO student(courseType,id,slug,name) VALUES ('$courseType','$id','$slug','$name')";
		if($conn->query($sql)){
			//echo "inserted 1 row";
		}
		echo '<tr><th>No</th><th>courseType</th><th>id</th><th>slug</th><th>name</th></tr>';
		
		$sql2 = "SELECT * FROM student";
		$result = mysqli_query($conn,$sql2);
		while($data = $result->fetch_assoc()){
		echo "<tr>
			<td>".$data['no']."</td>
			<td>".$data['courseType']."</td>
			 <td>".$data['id']."</td>
		 	 <td>".$data['slug']."</td>
	   		 <td>".$data['name']."</td></tr>";
		}	
?>
</table>
</body>
</html>