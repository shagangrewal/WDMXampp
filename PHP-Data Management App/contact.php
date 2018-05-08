<?php

$host = 'localhost:3306';
$user = 'root';
$pass = 'root';
$conn = mysqli_connect($host,$user,$pass);

if(! $conn)
{
	die( "can not connect" . mysqli_error());
}
mysqli_select_db($conn,'vet');
?>

<html>
<head>
<link rel="stylesheet" href="fishcreek.css">
<title>Contact US</title>
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
<h2>Contact Fish Creek</h2>
<p>Required Fields are marked with astericks(*).</p>
<form action="contact.php" method="post">
<table>
<tr>
        <td> <label for="name" > *Name: </label> </td>
        <td> <input type="text" name="name" /> </td>
      </tr>
<tr>
        <td> <label for="email"> *Email: </label> </td>
        <td> <input type="email" name="email" /> </td>
      </tr>
<tr>
        <td> <label for="comments" > *Comments: </label> </td>
        <td> <textarea rows="4" cols="35" name="comments" /></textarea> </td>
      </tr>

      <tr> <td></td><td > <input type="submit" name="send_contact" value="Send Now"/>
            </td>
      </tr>
</table>

</form>


<?php

if(isset($_POST['send_contact']))
{
	
$name = $_POST['name'];
$email = $_POST['email'];
$comments = $_POST['comments'];

if(empty($name))
{
	echo "<script type='text/javascript'>";
	echo "alert('* fields are mandatory');";
	echo "</script>";
}
else if(empty($email))
{
	echo "<script type='text/javascript'>";
	echo "alert('* fields are mandatory');";
	echo "</script>";
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	echo "<script type='text/javascript'>";
	echo "alert('Please enter the valid email id!');";
	echo "</script>";
}

else if(empty($comments))
{
	echo "<script type='text/javascript'>";
	echo "alert('* fields are mandatory');";
	echo "</script>";
}
else
{

$sql = " insert into contact (name, email, comments) values ('$name', '$email', '$comments')";
$result=mysqli_query($conn,$sql);
}
}
mysqli_close($conn);
?>

</body>
</div>
</body>
</html>
