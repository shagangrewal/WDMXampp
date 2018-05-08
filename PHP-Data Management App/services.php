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
<title>Services | Fish Creek Animal Hospital</title>
</head>
<div class="body">
<body id="wrapper">
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

<div class="column2">
<p>
<ul>
<?php
mysqli_select_db($conn,'vet');
$result=mysqli_query($conn,"select * from service");
$serv_arr = array();
$serv_arr_desc = array();
$no_rows = mysqli_num_rows($result);

while($row = mysqli_fetch_assoc($result))
{	
    array_push($serv_arr, $row["servicename"]);
    array_push($serv_arr_desc, $row["description"]);
	//echo $row["servicename"]; 
}
for ($i = 0; $i < $no_rows; $i++ ){
	echo "<li><strong><span>".$serv_arr[$i]."</span></strong><br></li>".$serv_arr_desc[$i] ;
}
?>

</ul>
<br>
<footer>
Copyright &copy; 2016 Fish Creek Animal Hospital<br>
<a  href="mailto:shagan@grewal.com"><u>shagan@grewal.com</u></a>
</footer>
</p>

</div>
</body>
</div>
</html>