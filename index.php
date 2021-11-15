<?php
$insert=false;
if(isset($_POST['name']))
{
 $server="remotemysql.com";
 $username="u02Z5d2Bvu";
 $password="jPBHyoiqdP";

 $con=mysqli_connect($server,$username,$password);

 if(!$con){
 	die("Connection failed due to " . mysqli_connect_error());
 }

 $name=mysqli_real_escape_string($con, $_POST['name']);
 $age=mysqli_real_escape_string($con, $_POST['age']); 
 $gender=mysqli_real_escape_string($con, $_POST['gender']); 
 $email=mysqli_real_escape_string($con, $_POST['email']); 
 $phone=mysqli_real_escape_string($con, $_POST['phone']); 
 $desc=mysqli_real_escape_string($con, $_POST['desc']);


 $sql="INSERT INTO u02Z5d2Bvu.trip (name, age, gender, email, phone, other, dt) VALUES ('$name', '$age', '$gender', '$email', '$phone','$desc', current_timestamp());";
 if($con->query($sql) == true){
 	$insert = true;
 }

 else{
 	echo "ERROR: $sql <br> $con->error";
 }

 mysqli_close($con);
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Trip Form</title>
	<style>

		*{
			margin:0px;
			padding:0px;
			box-sizing: border-box;
			font-family: Times New Roman;
				}
		body{
		background-image: url(pexels-photo-346885.jpeg);
		background-position: center;
  		background-repeat: no-repeat;
  		background-size: cover;
		}

		.container{
			padding-top:8px; 
    			margin: auto 3%;
    			display: flex;
		}
		.container h2,p{
			text-align: center;
		}

		p{
			margin-top: 10px;
		}

		input,textarea,select{
			width: 80%;
		    margin: 8px auto;
		    padding: 10px;
		    font-size: 13px;
		    border: 2px solid black;
		    border-radius: 5px;
		    outline: none;
		}
		
		form{
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
		}
		.btn{
			    color: white;
			    background: #325288;
			    padding: 5px 25px;
			    font-size: 22px;
			    border: 2px solid white;
			    border-radius: 11px;
		}
		.btn:hover{
			background: blue;
			cursor: pointer;
		}
		#fm{
			margin: 0px 81px;
	    	background-color: rgba(0,0,0,0.1);
	    	padding: 17px;	
	    }
	    #fm div{
			margin: 5px 2px;
		    padding: 17px;	}
	</style>
</head>
<body>
	<div class="container">
		<div>
			<img src="moolya.jpeg" alt="moolyaLogo">	
		</div>
		<div id="fm">
			<h2>Welcome to Moolya Software Testing Private Limited Trip form</h2>
			<p>Enter your details and submit this form to confirm your participation in the trip</p>
			<div style="text-align: center;font-weight: bold;font-size: unset;color: darkblue;"></style>
				<?php
				if($insert == true){
				echo '<strong> \' '. $name . '\'</strong>, Entered data with email id \''. $email .'\' and phone number \'' . $phone . '\' has been <strong>Successfully!</strong> stored.' ; }
				?>
			</div>
				<form action="index.php" method="post">
				<input required="" type="text" name="name" id="name" placeholder="Enter your name">
				<input required="" type="text" name="age" id="age" placeholder="Enter your age">
				<select name="gender">
					<option>Gender</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Others">Others</option>
				</select>
				 <input required="" type="email" name="email" id="email" placeholder="Enter your email">
				<input required="" type="phone" name="phone" id="phone" placeholder="Enter your phone number">
				<textarea name="desc" id="desc" cols="30" rows="5" placeholder="Enter any other information here"></textarea>
				<button class="btn">Submit</button>
			</form>
		</div>
	</div>
</body>
</html>
