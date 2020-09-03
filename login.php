<?php session_start(); ?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "isdpdb";

$conn = new mysqli($servername, $username, $password, $database);
	if ($conn -> connect_error){
		die("Connection Failed: ".$conn -> connect_error);
	}
	echo nl2br("Database Connected Successfully \n \n");

//echo nl2br("Username: ".$_POST["username"]);

//echo "<br> <br>";

$user = $_POST["username"];
$userpw = $_POST["userpw"];

$_SESSION["user"] = $user; 

$numberquery = "SELECT MAX(Number) FROM user_login";
$result = $conn->query($numberquery);

while ($row = $result->fetch_assoc()) {
    $number = $row['MAX(Number)'] + 0;
}

//echo "Max number: ".$number;

$sql = "SELECT Username,Pass FROM user_login WHERE Username='".$user."' AND Pass='".$userpw."';";
$result = $conn->query($sql);

if ($result->num_rows == 0){
    echo "<script>invalidlogin()</script>";
}
	
if ($result->num_rows == 1)
	header("Location: user tracking.php"); 

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Login</title>

    <style>
        body{
            background-image:url("wallpaper2.jpg");
            background-repeat: no-repeat;
            background-size:cover;
            background-position: center;
            background-attachment: fixed; 
        }

        #login {
            background-color: rgba(50, 50, 50, 0.75);
            padding: 50px;
            width: 300px;
            height: 570px;
            margin-top: 5%;
            margin-bottom: 5%;
        }

        label {
            color: white; 
            font-size: 25px;
            padding: 10px; 
            font-family: 'Agency FB';            
        }

        input.field {
            border: none;
            border-bottom: 3px solid darkred;
            padding: 5px;
            background-color: rgba(0,0,0,0);
            box-sizing: border-box;
            font-size: 15px;
        }

        input.field:focus {
            background-color: rgba(200,200,200,0.85);
            border: none;
            font-size: 15px;
            border-bottom: 5px solid indigo;
            outline: none;
        }

        input.button{
            padding: 15px;
            background-color: rgba(0,0,0,0);
            border: 3px solid white;
            border-radius: 5px;
            color: white;
            font-family: 'Agency FB';
            font-size: 20px;
        }

        input.button:hover, input.button:active {
            padding: 15px;
            background-color: darkgrey;
            border: 3px solid grey;
            border-radius: 5px;
            color: black;
            font-family: 'Agency FB';
            font-weight: bold;
        }

        p.title {
            font-size: 30px;
            font-family: 'Agency FB';
            text-align: center;
            color: white; 
        }

        #wronginfo{
            padding: 5px;
            font-size: 20px;
            font-family: 'Agency FB';
            text-align: center;
            color: red; 
            border: 2px solid darkred;
            display: none; 
        }

        @media(max-width:600px) {
            body {
                background-image: url(yukka/2.jpg);
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment: fixed;
            }
        }


    </style>

</head>

<body>
    <center>
        <div id="login">
            <p class="title">SMART Headband</p>
            <p class="title">User Login</p>
            <p id="wronginfo">Invalid Username or Password</p>
            <form method="post" action="login.php">
                <br /> <br />
                <label for="username" id="label1">Username: </label> <br /> <br />
                <input class="field" type="text" id="username" name="username" placeholder="e.g. sirius4597" /> <br /> <br /> <br /> <br />
                <label for="userpw" id="label2">Password: </label> <br /> <br />
                <input class="field " type="password" id="userpw" name="userpw" />
                <img src="reveal.png" style="width: 20px;" onclick="togglepw()" />
                <br /><br /> <br /> <br /> <br />
                <center><input class="button" type="submit" value="SUBMIT" /></center>
            </form>
            <br /> <br />
            <a href="main.html">Go Back</a>
        </div>
    </center>


</body>

</html>


<script>
    function togglepw() {
      var x = document.getElementById("userpw");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
        }
    }

    function invalidlogin() {
        document.getElementById("wronginfo").style.display = "block";
        document.getElementById("login").style.height = "620px";
    }
</script>

<?php

if ($result->num_rows == 0){
    echo "<script>invalidlogin()</script>";
}
	
if ($result->num_rows == 1)
	header("Location: user tracking.php"); 

?>