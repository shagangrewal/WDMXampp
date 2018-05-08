<?php
$host = 'localhost:3306';
$user = 'root';
$pass = 'root';
$conn = mysqli_connect($host,$user,$pass);

if(! $conn)
{
	die( "can't connect" . mysqli_error());
}

?>

<html>

<head>
<link rel="stylesheet" href="fishcreek.css">
<title>Ast the Vet | Fish Creek Animal Hospital</title>
</head>
<div class="body">
<body id="wrapper" >
<h1>Fish Creek Animal Hospital</h1>

<div class="column1">
<nav>
<table>
<tr>
<td><a  href="index.php">Home</a></td></tr>
<td><a  href="services.php">Services</a></td></tr>
<td><a  href="askvet.php">Ask the Vet</a></td></tr>
<td><a  href="subscribe.php">Subscribe</a></td></tr>
<td><a  href="contact.php">Contact</a></td></tr>
</tr>
</table>
</nav>
</div>

<div class="column2" >
<p><a  href="contact.php">Contact</a> us if you have a question that you would like asnwered here<br>
<?php
mysqli_select_db($conn,'vet');
$result=mysqli_query($conn,"select * from questions");
$question_array = array();
$question_array_desc = array();
$no_rows = mysqli_num_rows($result);

while($row = mysqli_fetch_assoc($result))
{	
    array_push($question_array, $row["question"]);
    array_push($question_array_desc, $row["answer"]);
	 
}
for ($i = 0; $i < $no_rows; $i++ ){
	echo "<dl><dt><span>".$question_array[$i]."</span></dt>	<dd>".$question_array_desc[$i]."</dd><dl>" ;
}
?><footer>
Copyright &copy; 2016 Fish Creek Animal Hospital<br>
<a  href="mailto:shagan@grewal.com">shagan@grewal.com</a>
</footer>
</p>
</div>
</body>


</div>
</html>