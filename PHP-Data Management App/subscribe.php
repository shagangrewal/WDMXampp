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
<title>Susbscribe | Fish Creek Animal Hospital</title>
</head>

<div class="body">
<body id="wrapper">
<h1>
Fish Creek Animal Hospital
</h1>

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
<h2>Subscribe Fish Creek</h2>
<p>Required Fields are marked with astericks(*).</p>

<form action="subscribe.php" method="post"> 
<table>
<tr>
        <td> <label for="name" > *Client Full Name: </label> </td>
        <td> <input type="text" name="fullname" /> </td>
      </tr>
<tr>
        <td> <label for="address"> *address: </label> </td>
        <td> <input type="text" name="address" /> </td>
      </tr>
<tr >
        <td> <label for="email"> *Email: </label> </td>
        <td> <input type="text" name="email" /> </td>
      </tr>
<tr >
        <td> <label for="phone"> *Phone: </label> </td>
        <td> <input type="text" name="phone" /> </td>
      </tr>
<tr >
        <td> <label for="password"> *Password: </label> </td>
        <td> <input type="password" name="password" /> </td>
      </tr>
<tr >
        <td> <label for="servicetype"> *Type of Service: </label> </td>
        <td> 
		
<?php

$sql="select * from service";
$result=mysqli_query($conn,$sql);
$serv_arr = array();
$no_rows = mysqli_num_rows($result);

while($row = mysqli_fetch_assoc($result))
{
    array_push($serv_arr, $row["servicename"]);	
}
echo '<select name = "service_name">' ;
for ($i = 0; $i < $no_rows; $i++ ){
	echo "<option>".$serv_arr[$i]."</option>";
}
echo "</select>"
?>


</td>
      </tr>

<tr >
        <td> <label for="pet"> *Pet: </label> </td>
        <td> 

		
<?php

$sql2="select * from pet";
$result2=mysqli_query($conn,$sql2);
$pet_array = array();
$no_rows_pet = mysqli_num_rows($result2);

while($row2 = mysqli_fetch_assoc($result2))
{
	
    array_push($pet_array, $row2["petname"]);	
	 
	
}


echo '<select name = "pet_name">' ;
for ($i = 0; $i < $no_rows_pet; $i++ ){
	echo "<option>".$pet_array[$i]."</option>";
}
 
 
echo "</select>"

?> </td>
      </tr>
<tr> <td></td> 
	<td> <input type="submit" name="send_button" value="Send Now"/>
           </td>
      </tr>

	  
	  
</table>
</form>

<?php
$service_name = "Medical Service";
$pet_name = "Dog";

if(isset($_POST['service_name'])){
	$service_name = $_POST['service_name'];
}
if(isset($_POST['pet_name'])){
$pet_name = $_POST['pet_name'];
}

$sql4 = "select serviceid from service where servicename = '$service_name' ";
$result4 = mysqli_query($conn,$sql4);
$row4 = mysqli_fetch_array($result4,MYSQLI_ASSOC);
$serviceid_tbi = $row4['serviceid'];

$sql5 = "select petid from pet where petname = '$pet_name' ";
$result5 = mysqli_query($conn,$sql5);
$row5 = mysqli_fetch_array($result5,MYSQLI_ASSOC);
$petid_tbi = $row5['petid'];

if(isset($_POST['send_button']))
{
	$fullname = $_POST['fullname'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$service_name = $_POST['service_name'];
$pet_name = $_POST['pet_name'];
if(empty($fullname))
{
	echo "<script type='text/javascript'>";
	echo "alert('* fields are mandatory, Enter Name!');";
	echo "</script>";
}
else if(empty($address))
{
	echo "<script type='text/javascript'>";
	echo "alert('* fields are mandatory, Address empty!');";
	echo "</script>";
}
else if(empty($email))
{
	echo "<script type='text/javascript'>";
	echo "alert('* fields are mandatory, email empty!');";
	echo "</script>";
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	echo "<script type='text/javascript'>";
	echo "alert('Please enter the valid email id, incorrect id entered!');";
	echo "</script>";
}

else if(empty($phone))
{
	echo "<script type='text/javascript'>";
	echo "alert('* fields are mandatory, enter phone number!');";
	echo "</script>";
}
else if(empty($phone))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Phone number must be must be properly filled, incorrect value entered!');";
			echo "</script>";
		}
else if(!preg_match("/^[0-9]{10}$/", $phone))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Phone number must contain be 10 digits!');";
		echo "</script>";
}


else if(empty($password))
{
	echo "<script type='text/javascript'>";
	echo "alert('* fields are mandatory, enter Password!');";
	echo "</script>";
}
else if (strlen($password) < '8') 
{
	echo "<script type='text/javascript'>";
	echo "alert('Password Must be At Least 8 Characters!');";
    echo "</script>";
}

else if (strlen($password) > '16') 
{
	echo "<script type='text/javascript'>";
	echo "alert('Password must exceed 16 Characters!');";
	echo "</script>";
   
}

elseif(!preg_match("#[0-9]+#",$password)) {
	echo "<script type='text/javascript'>";
	echo "alert('Password must contain at Least 1 Numeric digit!');";
	echo "</script>";
}
elseif(!preg_match("#[A-Z]+#",$password)) {
	echo "<script type='text/javascript'>";
	echo "alert('Password must have at Least 1 capital alphabet!');";
	echo "</script>";
	
}
elseif(!preg_match("#[a-z]+#",$password)) {
	echo "<script type='text/javascript'>";
	echo "alert('Password must have at least 1 lowercase alphabet!');";
	echo "</script>";
}

	$password = md5($password);
	
	$sql = "select clientid from client where email ='$email'";	
	$result=mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	$sql_email = "select email from client where email = '$email'";
	$result_email= mysqli_query($conn,$sql_email);
	$row_email = mysqli_fetch_array($result_email,MYSQLI_ASSOC);


if ($row_email['email'] != $email)
	{
	$sql2 = " insert into client (name, address, phone, email, password) values ('$fullname', '$address', '$phone','$email','$password')";
	$result2 = mysqli_query($conn,$sql2);
	

	$sql3 = "select clientid from client where email = '$email' ";
	$result3 = mysqli_query($conn,$sql3);
	$row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
	$clientid_tbi = $row3['clientid'];

	$sql6 = "insert into subscription (clientid, serviceid, petid, date) values ($clientid_tbi,$serviceid_tbi,$petid_tbi,curdate()) ";
	$result6 = mysqli_query($conn,$sql6);


	}
	else{
		
	$sql3 = "select clientid from client where email = '$email' ";
	$result3 = mysqli_query($conn,$sql3);
	$row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
	$clientid_tbi = $row3['clientid'];


	$sql6 = "insert into subscription (clientid, serviceid, petid, date) values ($clientid_tbi,$serviceid_tbi,$petid_tbi,curdate()) ";
	$result6 = mysqli_query($conn,$sql6);

	}
}
mysqli_close($conn);
?>



<br>

<footer> 	
Copyright &copy; 2016 Fish Creek Animal Hospital<br>
<a  href="mailto:shagan@grewal.com"><u>shagan@grewal.com</u></a>
</footer>

</div>
</body>
</div>
</html>