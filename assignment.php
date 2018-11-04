<!DOCTYPE html>
<html>
<head>
	<title>php</title>

<style>
	a{
		border: 1px solid white;
		background-color:green;
		color:white;
		width: 10px 30px;
		padding:5px 20px;
		text-decoration:none;
		padding-top:1px;
		padding-bottom:1px;
	}
	h1{
		text-align:center;
		color:green;
	}
	a:visited {
    color: red;
    }
</style>
</head>
<body>
<h1>Student Information</h1>
<table border="1" cellpadding="1">
<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://api.coursera.org/api/courses.v1');
$result = curl_exec($ch);
curl_close($ch);

$obj = json_decode($result,true);


	echo '<tr><th>courseType</th><th>id</th><th>slug</th><th>name</th><th></th></tr>';
	foreach($obj['elements'] as $elements){
		echo '<tr><td>'.$elements['courseType']."</td><td>"
						.$elements['id']."</td><td>"
						.$elements['slug']."</td><td>"
						.$elements['name']."</td><td>
						<a href='add.php?courseType=$elements[courseType]&id=$elements[id]&slug=$elements[slug]&name=$elements[name]'>ADD</a>
						</td></tr>";
		
	
	}
	



?>
</body>
</html>